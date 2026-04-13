<?php

namespace App\Services;

use App\Image;
use Intervention\Image\Facades\Image as ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageService
{
    const DISK = 'equipments';

    const THUMBNAIL_SIZES = [
        'sm' => ['width' => 320, 'height' => 240],
        'md' => ['width' => 550, 'height' => 413],
    ];

    const WEBP_QUALITY = 80;
    const JPG_QUALITY = 85;

    /**
     * Upload and process an image for an equipment item.
     * Generates thumbnails and WebP version.
     *
     * @param UploadedFile $file
     * @param int $equipmentId
     * @param int $sortOrder
     * @return Image
     */
    public function upload(UploadedFile $file, $equipmentId, $sortOrder = 0)
    {
        $filename = $this->generateFilename($file);

        // Store original
        $file->storeAs('', $filename, self::DISK);

        // Generate thumbnails
        $this->generateThumbnails($filename);

        // Generate WebP
        $this->convertToWebp($filename);

        // Create DB record
        return Image::create([
            'path' => $filename,
            'equipment_id' => $equipmentId,
            'sort_order' => $sortOrder,
        ]);
    }

    /**
     * Generate thumbnail versions of an image.
     *
     * @param string $filename
     * @return void
     */
    public function generateThumbnails($filename)
    {
        $disk = Storage::disk(self::DISK);
        $originalPath = $disk->path($filename);

        if (!file_exists($originalPath)) {
            return;
        }

        try {
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            foreach (self::THUMBNAIL_SIZES as $suffix => $dimensions) {
                $thumbName = $this->getThumbnailName($filename, $suffix);

                ImageManager::make($originalPath)
                    ->fit($dimensions['width'], $dimensions['height'], function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save($disk->path($thumbName), self::JPG_QUALITY);

                // Also create WebP thumbnail
                $this->convertToWebp($thumbName);
            }
        } catch (\Exception $e) {
            \Log::error("Error al generar thumbnails para {$filename}: " . $e->getMessage());
            throw new \RuntimeException('No se pudieron procesar las imágenes. Verifique que el servidor tenga soporte para procesamiento de imágenes (GD con JPEG).');
        }
    }

    /**
     * Convert an image to WebP format.
     *
     * @param string $filename
     * @return string|null The WebP filename, or null if conversion failed.
     */
    public function convertToWebp($filename)
    {
        $disk = Storage::disk(self::DISK);
        $sourcePath = $disk->path($filename);

        if (!file_exists($sourcePath)) {
            return null;
        }

        $webpFilename = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
        $webpPath = $disk->path($webpFilename);

        try {
            ImageManager::make($sourcePath)
                ->save($webpPath, self::WEBP_QUALITY, 'webp');

            return $webpFilename;
        } catch (\Exception $e) {
            \Log::warning("Error al convertir {$filename} a WebP: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Delete all images for an equipment item (files + DB records).
     *
     * @param int $equipmentId
     * @return void
     */
    public function deleteImages($equipmentId)
    {
        $images = Image::where('equipment_id', $equipmentId)->get();

        foreach ($images as $image) {
            $this->deleteSingleImageFiles($image->path);
        }

        Image::where('equipment_id', $equipmentId)->delete();
    }

    /**
     * Delete a single image (files + DB record).
     *
     * @param int $imageId
     * @return void
     */
    public function deleteSingleImage($imageId)
    {
        $image = Image::find($imageId);

        if (!$image) {
            return;
        }

        $this->deleteSingleImageFiles($image->path);
        $image->delete();
    }

    /**
     * Delete all file variants (original, thumbnails, WebP) for an image path.
     *
     * @param string $filename
     * @return void
     */
    protected function deleteSingleImageFiles($filename)
    {
        $disk = Storage::disk(self::DISK);
        $basename = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // Delete original
        $disk->delete($filename);

        // Delete thumbnails
        foreach (array_keys(self::THUMBNAIL_SIZES) as $suffix) {
            $thumbName = $basename . "-{$suffix}." . $extension;
            $disk->delete($thumbName);
            $disk->delete($basename . "-{$suffix}.webp");
        }

        // Delete WebP version of original
        $disk->delete($basename . '.webp');
    }

    /**
     * Get the full URL for an image path.
     *
     * @param string $path
     * @return string
     */
    public function url($path)
    {
        return Storage::disk(self::DISK)->url($path);
    }

    /**
     * Generate a unique filename for an uploaded file.
     *
     * @param UploadedFile $file
     * @return string
     */
    protected function generateFilename(UploadedFile $file)
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $slug = \Str::slug($originalName);
        $extension = $file->getClientOriginalExtension() ?: 'jpg';

        $filename = $slug . '.' . $extension;
        $counter = 1;

        while (Storage::disk(self::DISK)->exists($filename)) {
            $filename = $slug . '-' . $counter . '.' . $extension;
            $counter++;
        }

        return $filename;
    }

    /**
     * Get the thumbnail filename from an original filename.
     *
     * @param string $filename
     * @param string $suffix
     * @return string
     */
    public function getThumbnailName($filename, $suffix)
    {
        $basename = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        return $basename . "-{$suffix}." . $extension;
    }

    /**
     * Get the thumbnail URL for an image path.
     *
     * @param string $path
     * @param string $size Thumbnail size suffix ('sm' or 'md')
     * @return string
     */
    public function thumbnailUrl($path, $size = 'sm')
    {
        $thumbName = $this->getThumbnailName($path, $size);
        return Storage::disk(self::DISK)->url($thumbName);
    }
}