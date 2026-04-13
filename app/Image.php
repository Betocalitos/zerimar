<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['path', 'equipment_id', 'sort_order'];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Get the full URL for the image using the configured disk.
     */
    public function getUrlAttribute()
    {
        return Storage::disk('equipments')->url($this->path);
    }

    /**
     * Get the thumbnail URL for a given size.
     */
    public function thumbnailUrl($size = 'sm')
    {
        $basename = pathinfo($this->path, PATHINFO_FILENAME);
        $extension = pathinfo($this->path, PATHINFO_EXTENSION);
        $thumbName = $basename . "-{$size}." . $extension;

        return Storage::disk('equipments')->url($thumbName);
    }
}