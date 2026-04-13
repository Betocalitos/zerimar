<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\EquipmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EquipmentTypeController extends Controller
{
    public function index(Request $request)
    {
        $query = EquipmentType::withCount('equipments');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $withTrashed = $request->filled('trashed');
        if ($withTrashed) {
            $query->withTrashed();
        }

        $types = $query->orderBy('name')->paginate(15);

        return view('admin.equipment-types.index', compact('types', 'withTrashed'));
    }

    public function create()
    {
        return view('admin.equipment-types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:equipment_types,slug',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'slug.unique' => 'Este slug ya está en uso. Intente con otro.',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        EquipmentType::create($data);

        return redirect()->route('admin.equipment-types.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function show(EquipmentType $equipmentType)
    {
        $equipmentType->load('equipments');
        return view('admin.equipment-types.show', compact('equipmentType'));
    }

    public function edit(EquipmentType $equipmentType)
    {
        return view('admin.equipment-types.edit', compact('equipmentType'));
    }

    public function update(Request $request, EquipmentType $equipmentType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:equipment_types,slug,' . $equipmentType->id,
            'description' => 'nullable|string',
        ], [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'slug.unique' => 'Este slug ya está en uso. Intente con otro.',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $equipmentType->update($data);

        return redirect()->route('admin.equipment-types.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(EquipmentType $equipmentType)
    {
        if ($equipmentType->equipments()->count() > 0) {
            return back()->with('error', 'No se puede eliminar una categoría que tiene equipos asignados.');
        }

        $equipmentType->delete();

        return redirect()->route('admin.equipment-types.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}