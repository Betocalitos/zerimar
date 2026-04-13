<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Equipment;
use App\EquipmentType;
use App\EquipmentBundle;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $stats = [
            'equipment_count' => Equipment::standalone()->count(),
            'bundle_count' => EquipmentBundle::count(),
            'type_count' => EquipmentType::count(),
            'trashed_count' => Equipment::onlyTrashed()->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}