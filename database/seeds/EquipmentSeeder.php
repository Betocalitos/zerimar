<?php

use Illuminate\Database\Seeder;
use App\Equipment;
use App\Images;
use App\ExtraFeatures;
use App\LiftTruck;
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
        $equipment = Equipment::create([
            'name' => 'CLARK CJ55',
            'name_slug' => 'clark-cj55',
            'brand' => 'CLARK',
            'model' => 'CJ55',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'capacity' => '5,500 LBS',
            'price_sale' => 450,
            'exchange'   => 'DLLS',
            'type_equipment_id' => 5
        ]);

        Images::create([
            'path' => 'img/equipment/clark-cj55-1.jpg',
            'equipment_id' => $equipment->id
        ]);

        Images::create([
            'path' => 'img/equipment/clark-cj55-2.jpg',
            'equipment_id' => $equipment->id
        ]);

        //equipo 2
        $equipment = Equipment::create([
            'name'  => 'TOYOTA 7BWS10',
            'name_slug' => 'toyota-7BWS10',
            'brand' => 'TOYOTA',
            'model' => '7BWS10',
            'series' => '7BWS10-41388',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'year'   => '2010',
            'capacity' => '5,500 LBS',
            'price_sale' => 3000,
            'exchange'   => 'DLLS',
            'type_equipment_id' => 5
        ]);

        ExtraFeatures::create([
            'name'  => 'Cargador',
            'value' => 'si',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Bateria',
            'value' => 'Nuevas',
            'equipment_id' => $equipment->id
        ]);

        for ($i = 1; $i <= 4; $i++) {

            Images::create([
                'path' => 'img/equipment/toyota-7BWS10-' . $i . '.jpg',
                'equipment_id' => $equipment->id
            ]);
        }

        //equipo 3
        $equipment = Equipment::create([
            'name' => 'CROWN 1A348664',
            'name_slug' => 'crown-1A348664',
            'brand' => 'CROWN',
            'model' => '1A348664',
            'capacity' => '3,000 LBS',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'price_sale' => 6500,
            'exchange'   => 'DLLS',
            'type_equipment_id' => 1
        ]);

        ExtraFeatures::create([
            'name'  => 'Desplazador lateral',
            'value' => 'Si',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Código ambar',
            'value' => 'Si',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Mástil de 3 secciones',
            'value' => 'Si',
            'equipment_id' => $equipment->id
        ]);

        LiftTruck::create([
            'charger' => true,
            'battery' => true,
            'nationality' => 'Nacional',
            'equipment_id' => $equipment->id

        ]);

        for ($i = 1; $i <= 11; $i++) {

            Images::create([
                'path' => 'img/equipment/crown-1A348664-' . $i . '.jpg',
                'equipment_id' => $equipment->id
            ]);
        }

        //equipo 4
        $equipment = Equipment::create([
            'name' => 'Montacargas Paquete',
            'name_slug' => 'montacargas-electricos-paquete',
            'price_sale' => 22000,
            'exchange'   => 'DLLS',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'type_equipment_id' => 1
        ]);

        LiftTruck::create([
            'equipment_id' => $equipment->id

        ]);

        ExtraFeatures::create([
            'name'  => 'Modelo',
            'value' => 'RC5540-40TT208',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'   => 'Año',
            'value' => '2008',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Batería',
            'value' => 'No',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Modelo',
            'value' => 'RC5540-40TT208',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'   => 'Año',
            'value' => '2008',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Batería',
            'value' => 'No',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Modelo',
            'value' => 'RC5535-30',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'   => 'Año',
            'value' => '2009',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Batería',
            'value' => 'No',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Modelo',
            'value' => 'RC5535-30',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'   => 'Año',
            'value' => '2009',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Batería',
            'value' => 'Si',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Modelo',
            'value' => 'RR-5220.45',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'   => 'Año',
            'value' => '2003',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Batería',
            'value' => 'Si',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Modelo',
            'value' => 'RR-5225-45',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Batería',
            'value' => 'No',
            'equipment_id' => $equipment->id
        ]);

        for ($i = 1; $i <= 2; $i++) {

            Images::create([
                'path' => 'img/equipment/montacargas-electricos-paquete-' . $i . '.jpg',
                'equipment_id' => $equipment->id
            ]);
        }

        //equipo 5
        $equipment = Equipment::create([
            'name' => 'CHEVROLET SILVERADO',
            'name_slug' => 'chevrolet-silverado',
            'brand' => 'CHEVROLET',
            'model' => 'SILVERADO',
            'motor' => '4.3 V6',
            'price_sale' => 15000,
            'exchange'   => 'DLLS',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'type_equipment_id' => 8
        ]);

        ExtraFeatures::create([
            'name'  => 'Sencillo',
            'value' => ' 4x2',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Importado',
            'value' => 'Fronterizo',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Llantas',
            'value' => 'BFGOODRICH 285/70/17',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Rines',
            'value' => 'KMC',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Amortiguadores',
            'value' => 'BILSTEIN',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Orquillas',
            'value' => 'ROUGH COUNTRY',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Spacer',
            'value' => '2"',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Lift Kit Delantero',
            'value' => '3" Supreme Suspension',
            'equipment_id' => $equipment->id
        ]);

        ExtraFeatures::create([
            'name'  => 'Extra',
            'value' => 'Reprogramación en computadora',
            'equipment_id' => $equipment->id
        ]);

        for ($i = 1; $i <= 4; $i++) {

            Images::create([
                'path' => 'img/equipment/chevrolet-silverado-' . $i . '.jpg',
                'equipment_id' => $equipment->id
            ]);
        }
    }
}
