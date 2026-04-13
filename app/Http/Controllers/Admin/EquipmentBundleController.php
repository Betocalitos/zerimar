<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\EquipmentBundle;
use App\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EquipmentBundleController extends Controller
{
    public function index(Request $request)
    {
        $bundles = EquipmentBundle::withCount('equipments')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.bundles.index', compact('bundles'));
    }

    public function create()
    {
        $standaloneEquipment = Equipment::standalone()->orderBy('name')->get();
        return view('admin.bundles.create', compact('standaloneEquipment'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:equipment_bundles,slug',
            'description' => 'nullable|string',
            'price_sale' => 'nullable|numeric',
            'exchange' => 'nullable|string|max:3',
            'equipment_ids' => 'nullable|array',
            'equipment_ids.*' => 'exists:equipment,id',
        ], [
            'name.required' => 'El nombre del paquete es obligatorio.',
            'slug.unique' => 'Este slug ya está en uso. Intente con otro.',
            'price_sale.numeric' => 'El precio de venta debe ser un número.',
            'equipment_ids.*.exists' => 'Uno de los equipos seleccionados no existe.',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $equipmentIds = $data['equipment_ids'] ?? [];
        unset($data['equipment_ids']);

        $bundle = EquipmentBundle::create($data);
        $bundle->equipments()->sync($equipmentIds);

        // Mark equipment as bundle members
        Equipment::whereIn('id', $equipmentIds)->update(['is_bundle_member' => true]);

        return redirect()->route('admin.bundles.show', $bundle)
            ->with('success', 'Paquete creado correctamente.');
    }

    public function show(EquipmentBundle $bundle)
    {
        $bundle->load('equipments.type', 'equipments.images');
        return view('admin.bundles.show', compact('bundle'));
    }

    public function edit(EquipmentBundle $bundle)
    {
        $bundle->load('equipments');
        $standaloneEquipment = Equipment::standalone()->orderBy('name')->get();
        $selectedIds = $bundle->equipments->pluck('id')->toArray();

        return view('admin.bundles.edit', compact('bundle', 'standaloneEquipment', 'selectedIds'));
    }

    public function update(Request $request, EquipmentBundle $bundle)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:equipment_bundles,slug,' . $bundle->id,
            'description' => 'nullable|string',
            'price_sale' => 'nullable|numeric',
            'exchange' => 'nullable|string|max:3',
            'equipment_ids' => 'nullable|array',
            'equipment_ids.*' => 'exists:equipment,id',
        ], [
            'name.required' => 'El nombre del paquete es obligatorio.',
            'slug.unique' => 'Este slug ya está en uso. Intente con otro.',
            'price_sale.numeric' => 'El precio de venta debe ser un número.',
            'equipment_ids.*.exists' => 'Uno de los equipos seleccionados no existe.',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $equipmentIds = $data['equipment_ids'] ?? [];
        unset($data['equipment_ids']);

        // Unmark previously selected equipment
        $oldIds = $bundle->equipments->pluck('id')->toArray();
        Equipment::whereIn('id', $oldIds)->update(['is_bundle_member' => false]);

        $bundle->update($data);
        $bundle->equipments()->sync($equipmentIds);

        // Mark new selections
        Equipment::whereIn('id', $equipmentIds)->update(['is_bundle_member' => true]);

        return redirect()->route('admin.bundles.show', $bundle)
            ->with('success', 'Paquete actualizado correctamente.');
    }

    public function destroy(EquipmentBundle $bundle)
    {
        // Unmark equipment members
        $oldIds = $bundle->equipments->pluck('id')->toArray();
        Equipment::whereIn('id', $oldIds)->update(['is_bundle_member' => false]);

        $bundle->delete();

        return redirect()->route('admin.bundles.index')
            ->with('success', 'Paquete eliminado correctamente.');
    }
}