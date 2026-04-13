<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\Image;
use App\EquipmentType;
use App\EquipmentBundle;

class EquipmentController extends Controller
{

    public function index($typeSlug)
    {
        $typesEquipment = EquipmentType::all();
        $type = EquipmentType::where('slug', $typeSlug)->first();
        if (!$type)
            return abort(404);

        $equipments = $type->equipments()->standalone()->get();
        $bundles = EquipmentBundle::all();

        return view('pages.equipment.index', compact('equipments', 'type', 'typesEquipment', 'bundles'));
    }

    public function show($slugName)
    {
        $typesEquipment = EquipmentType::all();
        $equipment = Equipment::where('name_slug', $slugName)->first();
        $randomEquipments = Equipment::standalone()->get();
        $randomEquipments = $randomEquipments->count() >= 5 ? $randomEquipments->random(5) : $randomEquipments;

        if (!$equipment)
            return abort(404);

        return view('pages.equipment.show', compact('typesEquipment', 'equipment', 'randomEquipments'));
    }

    public function showBundle($slug)
    {
        $typesEquipment = EquipmentType::all();
        $bundle = EquipmentBundle::where('slug', $slug)->first();
        $randomEquipments = Equipment::standalone()->get();
        $randomEquipments = $randomEquipments->count() >= 5 ? $randomEquipments->random(5) : $randomEquipments;

        if (!$bundle)
            return abort(404);

        return view('pages.equipment.bundle', compact('typesEquipment', 'bundle', 'randomEquipments'));
    }
}