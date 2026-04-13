<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EquipmentType;
use App\Equipment;

class PageController extends Controller
{

    public function index()
    {
        $typesEquipment = EquipmentType::all();
        $standalone = Equipment::standalone()->get();
        $randomEquipments1 = $standalone->count() >= 3 ? $standalone->random(3) : $standalone;
        $randomEquipments2 = $standalone->count() >= 5 ? $standalone->random(5) : $standalone;
        return view("pages.home", compact('typesEquipment', 'randomEquipments1', 'randomEquipments2'));
    }

    public function about()
    {
        $typesEquipment = EquipmentType::all();
        return view('pages.about', compact('typesEquipment'));
    }

    public function contact()
    {
        $typesEquipment = EquipmentType::all();
        return view('pages.contact', compact('typesEquipment'));
    }
}