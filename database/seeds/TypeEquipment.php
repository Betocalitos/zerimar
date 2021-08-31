<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeEquipment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_equipment')->insert([
            'name' => 'Eléctrico',
            'slug' => Str::slug('Eléctrico')
        ]);

        DB::table('type_equipment')->insert([
            'name' => 'Gas L.P.',
            'slug' => Str::slug('Gas L.P.')
        ]);

        DB::table('type_equipment')->insert([
            'name' => 'Diesel',
            'slug' => Str::slug('Diesel')
        ]);

        DB::table('type_equipment')->insert([
            'name' => 'Gasolina',
            'slug' => Str::slug('Gasolina')
        ]);

        DB::table('type_equipment')->insert([
            'name' => 'Pallet Jack',
            'slug' => Str::slug('Pallet Jack')
        ]);

        DB::table('type_equipment')->insert([
            'name' => 'Implementos',
            'slug' => Str::slug('Implementos')
        ]);

        DB::table('type_equipment')->insert([
            'name' => 'Refacciones',
            'slug' => Str::slug('Refacciones')
        ]);

        DB::table('type_equipment')->insert([
            'name' => 'Otros',
            'slug' => Str::slug('Otros')
        ]);
    }
}
