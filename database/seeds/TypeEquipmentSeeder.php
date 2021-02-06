<?php

use Illuminate\Database\Seeder;
use App\TypeEquipment;
use Illuminate\Support\Str;

class TypeEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new TypeEquipment();

        $type->name = "Eléctrico";
        $type->slug = Str::slug($type->name);
        $type->save();

        $type = new TypeEquipment();
        $type->name = "Gas L.P.";
        $type->slug = Str::slug($type->name);
        $type->save();

        $type = new TypeEquipment();
        $type->name = "Disel";
        $type->slug = Str::slug($type->name);
        $type->save();

        $type = new TypeEquipment();
        $type->name = "Gasolina";
        $type->slug = Str::slug($type->name);
        $type->save();

        $type = new TypeEquipment();
        $type->name = "Pallet Jack";
        $type->slug = Str::slug($type->name);
        $type->save();

        $type = new TypeEquipment();
        $type->name = "Implementos";
        $type->slug = Str::slug($type->name);
        $type->save();

        $type = new TypeEquipment();
        $type->name = "Refacciones";
        $type->slug = Str::slug($type->name);
        $type->save();

        $type = new TypeEquipment();
        $type->name = "Otros";
        $type->slug = Str::slug($type->name);
        $type->save();
    }
}
