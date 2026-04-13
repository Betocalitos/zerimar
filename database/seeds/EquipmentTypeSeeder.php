<?php

use Illuminate\Database\Seeder;
use App\EquipmentType;
use Illuminate\Support\Str;

class EquipmentTypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['Eléctrico', 'Gas L.P.', 'Diesel', 'Gasolina', 'Pallet Jack', 'Implementos', 'Refacciones', 'Otros'];

        foreach ($types as $name) {
            EquipmentType::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}