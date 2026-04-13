<?php

use Illuminate\Database\Seeder;
use App\Equipment;
use App\Image;
use App\ExtraFeature;
use App\EquipmentBundle;
use Illuminate\Support\Str;

class EquipmentSeeder extends Seeder
{
    public function run()
    {
        // --- Equipo 1: CLARK CJ55 (Pallet Jack) ---
        $e1 = Equipment::create([
            'name' => 'CLARK CJ55',
            'name_slug' => 'clark-cj55',
            'brand' => 'CLARK',
            'model' => 'CJ55',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'capacity' => '5,500 LBS',
            'price_sale' => 450,
            'exchange' => 'USD',
            'equipment_type_id' => 5,
        ]);

        Image::create(['path' => 'clark-cj55-1.jpg', 'equipment_id' => $e1->id, 'sort_order' => 0]);
        Image::create(['path' => 'clark-cj55-2.jpg', 'equipment_id' => $e1->id, 'sort_order' => 1]);

        // --- Equipo 2: TOYOTA 7BWS10 (Pallet Jack, con charger/battery) ---
        $e2 = Equipment::create([
            'name' => 'TOYOTA 7BWS10',
            'name_slug' => 'toyota-7bws10',
            'brand' => 'TOYOTA',
            'model' => '7BWS10',
            'series' => '7BWS10-41388',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'year' => 2010,
            'capacity' => '5,500 LBS',
            'price_sale' => 3000,
            'exchange' => 'USD',
            'equipment_type_id' => 5,
            'charger' => true,
            'battery' => true,
        ]);

        for ($i = 1; $i <= 4; $i++) {
            Image::create(['path' => 'toyota-7BWS10-' . $i . '.jpg', 'equipment_id' => $e2->id, 'sort_order' => $i - 1]);
        }

        // --- Equipo 3: CROWN 1A348664 (Eléctrico, con lift_truck fields) ---
        $e3 = Equipment::create([
            'name' => 'CROWN 1A348664',
            'name_slug' => 'crown-1a348664',
            'brand' => 'CROWN',
            'model' => '1A348664',
            'capacity' => '3,000 LBS',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'price_sale' => 6500,
            'exchange' => 'USD',
            'equipment_type_id' => 1,
            'charger' => true,
            'battery' => true,
            'nationality' => 'Nacional',
        ]);

        ExtraFeature::create(['name' => 'Desplazador lateral', 'value' => 'Si', 'equipment_id' => $e3->id]);
        ExtraFeature::create(['name' => 'Código ambar', 'value' => 'Si', 'equipment_id' => $e3->id]);
        ExtraFeature::create(['name' => 'Mástil de 3 secciones', 'value' => 'Si', 'equipment_id' => $e3->id]);

        for ($i = 1; $i <= 11; $i++) {
            Image::create(['path' => 'crown-1A348664-' . $i . '.jpg', 'equipment_id' => $e3->id, 'sort_order' => $i - 1]);
        }

        // --- Paquete: 6 montacargas agrupados en bundle ---
        $bundle = EquipmentBundle::create([
            'name' => 'Montacargas Paquete',
            'slug' => 'montacargas-electricos-paquete',
            'description' => 'Paquete de 6 montacargas eléctricos',
            'price_sale' => 22000,
            'exchange' => 'USD',
        ]);

        $bundleEquipment = [
            ['model' => 'RC5540-40TT208', 'year' => 2008, 'battery' => false],
            ['model' => 'RC5540-40TT208', 'year' => 2008, 'battery' => false],
            ['model' => 'RC5535-30', 'year' => 2009, 'battery' => false],
            ['model' => 'RC5535-30', 'year' => 2009, 'battery' => true],
            ['model' => 'RR-5220.45', 'year' => 2003, 'battery' => true],
            ['model' => 'RR-5225-45', 'year' => null, 'battery' => false],
        ];

        foreach ($bundleEquipment as $idx => $data) {
            $eq = Equipment::create([
                'name' => 'CROWN ' . $data['model'] . ' #' . ($idx + 1),
                'name_slug' => Str::slug('CROWN ' . $data['model'] . ' ' . ($idx + 1)),
                'brand' => 'CROWN',
                'model' => $data['model'],
                'year' => $data['year'],
                'exchange' => 'USD',
                'equipment_type_id' => 1,
                'battery' => $data['battery'],
                'is_bundle_member' => true,
            ]);
            $bundle->equipments()->attach($eq->id);
        }

        // Assign existing images to all bundle equipment (only paquete-1 and paquete-2 exist on disk)
        $bundleItems = $bundle->equipments()->get();
        foreach ($bundleItems as $bItem) {
            Image::create(['path' => 'montacargas-electricos-paquete-1.jpg', 'equipment_id' => $bItem->id, 'sort_order' => 0]);
            Image::create(['path' => 'montacargas-electricos-paquete-2.jpg', 'equipment_id' => $bItem->id, 'sort_order' => 1]);
        }

        // --- Equipo 5: CHEVROLET SILVERADO (Otros) ---
        $e5 = Equipment::create([
            'name' => 'CHEVROLET SILVERADO',
            'name_slug' => 'chevrolet-silverado',
            'brand' => 'CHEVROLET',
            'model' => 'SILVERADO',
            'motor' => '4.3 V6',
            'price_sale' => 15000,
            'exchange' => 'USD',
            'description' => 'Aqui debe ir una descripción del equipo, para dar el cliente un poco mas de información extra que ayude a complementar aún mas los datos del equipo',
            'equipment_type_id' => 8,
        ]);

        ExtraFeature::create(['name' => 'Sencillo', 'value' => '4x2', 'equipment_id' => $e5->id]);
        ExtraFeature::create(['name' => 'Importado', 'value' => 'Fronterizo', 'equipment_id' => $e5->id]);
        ExtraFeature::create(['name' => 'Llantas', 'value' => 'BFGOODRICH 285/70/17', 'equipment_id' => $e5->id]);
        ExtraFeature::create(['name' => 'Rines', 'value' => 'KMC', 'equipment_id' => $e5->id]);
        ExtraFeature::create(['name' => 'Amortiguadores', 'value' => 'BILSTEIN', 'equipment_id' => $e5->id]);
        ExtraFeature::create(['name' => 'Orquillas', 'value' => 'ROUGH COUNTRY', 'equipment_id' => $e5->id]);
        ExtraFeature::create(['name' => 'Spacer', 'value' => '2"', 'equipment_id' => $e5->id]);
        ExtraFeature::create(['name' => 'Lift Kit Delantero', 'value' => '3" Supreme Suspension', 'equipment_id' => $e5->id]);
        ExtraFeature::create(['name' => 'Extra', 'value' => 'Reprogramación en computadora', 'equipment_id' => $e5->id]);

        for ($i = 1; $i <= 4; $i++) {
            Image::create(['path' => 'chevrolet-silverado-' . $i . '.jpg', 'equipment_id' => $e5->id, 'sort_order' => $i - 1]);
        }
    }
}