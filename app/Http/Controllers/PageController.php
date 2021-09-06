<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeEquipment;
use App\Equipment;

class PageController extends Controller
{

    public function index()
    {
        $typesEquipment = TypeEquipment::all();
        $randomEquipments1 = Equipment::all()->random(3);
        $randomEquipments2 = Equipment::all()->random(5);
        return view("pages.home", compact('typesEquipment', 'randomEquipments1', 'randomEquipments2'));
    }

    public function about()
    {
        $typesEquipment = TypeEquipment::all();
        return view('pages.about', compact('typesEquipment'));
    }

    public function contact()
    {
        $typesEquipment = TypeEquipment::all();
        return view('pages.contact', compact('typesEquipment'));
    }
}
