<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Equipment;
use App\EquipmentType;
use App\ExtraFeature;
use App\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipment::with(['type', 'images'])->standalone();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('brand', 'like', '%' . $request->search . '%')
                  ->orWhere('model', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('type')) {
            $query->where('equipment_type_id', $request->type);
        }

        $withTrashed = $request->filled('trashed');
        if ($withTrashed) {
            $query->withTrashed();
        }

        $equipment = $query->orderBy('name')->paginate(15)->appends($request->all());
        $types = EquipmentType::orderBy('name')->get();

        return view('admin.equipment.index', compact('equipment', 'types', 'withTrashed'));
    }

    public function create()
    {
        $types = EquipmentType::orderBy('name')->get();
        return view('admin.equipment.create', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'series' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'capacity' => 'nullable|string|max:255',
            'motor' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price_sale' => 'nullable|numeric',
            'price_rent' => 'nullable|numeric',
            'exchange' => 'nullable|string|max:3',
            'equipment_type_id' => 'required|exists:equipment_types,id',
            'charger' => 'nullable|boolean',
            'battery' => 'nullable|boolean',
            'max_height' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'is_bundle_member' => 'nullable|boolean',
        ], [
            'name.required' => 'El nombre del equipo es obligatorio.',
            'equipment_type_id.required' => 'Debe seleccionar una categoría.',
            'equipment_type_id.exists' => 'La categoría seleccionada no existe.',
            'price_sale.numeric' => 'El precio de venta debe ser un número.',
            'price_rent.numeric' => 'El precio de renta debe ser un número.',
            'year.integer' => 'El año debe ser un número entero.',
        ]);

        $data['name_slug'] = $this->generateUniqueSlug($data['name']);

        $equipment = Equipment::create($data);

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imageService = app(ImageService::class);
            foreach ($request->file('images') as $index => $file) {
                $imageService->upload($file, $equipment->id, $index);
            }
        }

        return redirect()->route('admin.equipment.show', $equipment)
            ->with('success', 'Equipo creado correctamente.');
    }

    public function show(Equipment $equipment)
    {
        $equipment->load(['type', 'images', 'features', 'bundles']);
        return view('admin.equipment.show', compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
        $equipment->load('features');
        $types = EquipmentType::orderBy('name')->get();
        return view('admin.equipment.edit', compact('equipment', 'types'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'series' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'capacity' => 'nullable|string|max:255',
            'motor' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price_sale' => 'nullable|numeric',
            'price_rent' => 'nullable|numeric',
            'exchange' => 'nullable|string|max:3',
            'equipment_type_id' => 'required|exists:equipment_types,id',
            'charger' => 'nullable|boolean',
            'battery' => 'nullable|boolean',
            'max_height' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'is_bundle_member' => 'nullable|boolean',
        ], [
            'name.required' => 'El nombre del equipo es obligatorio.',
            'equipment_type_id.required' => 'Debe seleccionar una categoría.',
            'equipment_type_id.exists' => 'La categoría seleccionada no existe.',
            'price_sale.numeric' => 'El precio de venta debe ser un número.',
            'price_rent.numeric' => 'El precio de renta debe ser un número.',
            'year.integer' => 'El año debe ser un número entero.',
        ]);

        $data['name_slug'] = $this->generateUniqueSlug($data['name'], $equipment->id);

        $equipment->update($data);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $imageService = app(ImageService::class);
            $nextOrder = $equipment->images()->max('sort_order') + 1;
            foreach ($request->file('images') as $file) {
                $imageService->upload($file, $equipment->id, $nextOrder++);
            }
        }

        return redirect()->route('admin.equipment.show', $equipment)
            ->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('admin.equipment.index')
            ->with('success', 'Equipo eliminado (soft delete).');
    }

    public function uploadImages(Request $request, Equipment $equipment)
    {
        $request->validate([
            'images' => 'required|array|max:10',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:max_width=1920,max_height=1372',
        ], [
            'images.required' => 'Debe seleccionar al menos una imagen.',
            'images.max' => 'No se pueden subir más de 10 imágenes a la vez.',
            'images.*.image' => 'Cada archivo debe ser una imagen.',
            'images.*.mimes' => 'Las imágenes deben ser de tipo: jpg, jpeg, png o webp.',
            'images.*.max' => 'Cada imagen no debe pesar más de 2 MB.',
            'images.*.dimensions' => 'Las imágenes no deben exceder 1920x1372 píxeles.',
        ]);

        $imageService = app(ImageService::class);
        $nextOrder = $equipment->images()->max('sort_order') + 1;
        $uploadedImages = [];

        foreach ($request->file('images') as $file) {
            $image = $imageService->upload($file, $equipment->id, $nextOrder++);
            $uploadedImages[] = [
                'id' => $image->id,
                'path' => $image->url,
                'thumb' => $image->thumbnailUrl('sm'),
                'sort_order' => $image->sort_order,
            ];
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Imagen(es) subida(s) correctamente.',
                'images' => $uploadedImages,
            ]);
        }

        return back()->with('success', 'Imágenes subidas correctamente.');
    }

    public function deleteImage(Request $request, Image $image)
    {
        app(ImageService::class)->deleteSingleImage($image->id);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Imagen eliminada correctamente.',
            ]);
        }

        return back()->with('success', 'Imagen eliminada correctamente.');
    }

    public function reorderImages(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:images,id',
        ], [
            'ids.required' => 'Debe proporcionar el orden de las imágenes.',
            'ids.*.integer' => 'Los identificadores deben ser números enteros.',
            'ids.*.exists' => 'Una de las imágenes seleccionadas no existe.',
        ]);

        $equipmentImageIds = $equipment->images()->pluck('id')->toArray();

        foreach ($data['ids'] as $order => $id) {
            if (in_array($id, $equipmentImageIds)) {
                Image::where('id', $id)->update(['sort_order' => $order]);
            }
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Orden actualizado.',
            ]);
        }

        return back()->with('success', 'Orden actualizado.');
    }

    public function addFeature(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ], [
            'name.required' => 'El nombre de la característica es obligatorio.',
            'value.required' => 'El valor de la característica es obligatorio.',
        ]);

        $feature = ExtraFeature::create([
            'name' => $data['name'],
            'value' => $data['value'],
            'equipment_id' => $equipment->id,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Característica agregada correctamente.',
                'feature' => ['id' => $feature->id, 'name' => $feature->name, 'value' => $feature->value],
            ]);
        }

        return back()->with('success', 'Característica agregada correctamente.');
    }

    public function deleteFeature(Request $request, ExtraFeature $feature)
    {
        $feature->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Característica eliminada correctamente.',
            ]);
        }

        return back()->with('success', 'Característica eliminada correctamente.');
    }

    /**
     * Generate a unique slug for equipment.
     * If the slug already exists (excluding the current model), append a suffix.
     * Uses withTrashed() to avoid conflicts with soft-deleted records.
     */
    private function generateUniqueSlug(string $name, ?int $excludeId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $count = 2;

        $query = Equipment::withTrashed()->where('name_slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        while ($query->exists()) {
            $slug = $original . '-' . $count;
            $count++;
            $query = Equipment::withTrashed()->where('name_slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
        }

        return $slug;
    }
}