<?php

use Illuminate\Database\Seeder;
use App\Equipment;
use Illuminate\Support\Str;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //equipo 1
        Equipment::create([
            'name_slug' => 'clark-cj55',
            'brand' => 'CLARK',
            'model' => 'CJ55',
            'capacity' => '5,500 LBS',
            'price_sale' => 450,
            'exchange'   => 'DLLS',
            'type_equipment_id' => 5
        ]);
    }
}
