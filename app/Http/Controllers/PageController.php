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
        return view("pages.home", compact('typesEquipment'));
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

    public function equipment($slug)
    {
        $typesEquipment = TypeEquipment::all();
        return $slug;
    }
}
