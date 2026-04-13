<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->truncateTables([
            'equipment_types',
            'equipment',
            'feature_keys',
            'extra_features',
            'images',
            'equipment_bundles',
            'bundle_equipment',
        ]);

        $this->call([
            EquipmentTypeSeeder::class,
            FeatureKeySeeder::class,
            EquipmentSeeder::class,
            AdminUserSeeder::class,
        ]);
    }

    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}