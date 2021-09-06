<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\Images;
use App\TypeEquipment;

class EquipmentController extends Controller
{

    public function index($typeSlug)
    {
        $typesEquipment = TypeEquipment::all();
        $type = TypeEquipment::where('slug', $typeSlug)->first();
        if (!$type)
            return abort(404);

        $equipments = $type->equipments;

        return view('pages.equipment.index', compact('equipments', 'type', 'typesEquipment'));
    }

    public function show($slugName)
    {
        $typesEquipment = TypeEquipment::all();
        $equipment = Equipment::where('name_slug', $slugName)->first();
        $randomEquipments = Equipment::all()->random(5);

        if (!$equipment)
            return abort(404);

        return view('pages.equipment.show', compact('typesEquipment', 'equipment', 'randomEquipments'));
    }
}
