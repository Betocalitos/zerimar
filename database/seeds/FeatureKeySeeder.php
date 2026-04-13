<?php

use Illuminate\Database\Seeder;
use App\FeatureKey;

class FeatureKeySeeder extends Seeder
{
    public function run()
    {
        $keys = [
            'Llantas', 'Rines', 'Amortiguadores', 'Orquillas',
            'Spacer', 'Lift Kit Delantero', 'Extra',
            'Sencillo', 'Importado',
            'Desplazador lateral', 'Código ambar', 'Mástil de 3 secciones',
            'Altura de elevación',
        ];

        foreach ($keys as $name) {
            FeatureKey::create(['name' => $name]);
        }
    }
}