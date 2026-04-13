<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Equipment;
use Faker\Generator as Faker;

$factory->define(Equipment::class, function (Faker $faker) {
    $name = $faker->unique()->words(2, true);

    return [
        'name' => strtoupper($name),
        'name_slug' => \Illuminate\Support\Str::slug($name),
        'brand' => $faker->company,
        'model' => $faker->bothify('??-####'),
        'description' => $faker->optional()->paragraph(),
        'capacity' => $faker->optional()->randomElement(['3,000 LBS', '5,000 LBS', '8,000 LBS']),
        'motor' => $faker->optional()->bothify('?.? V6'),
        'price_sale' => $faker->optional()->randomFloat(2, 1000, 50000),
        'exchange' => $faker->randomElement(['USD', 'MXN']),
        'equipment_type_id' => function () {
            return factory(App\EquipmentType::class)->create()->id;
        },
        'is_bundle_member' => false,
    ];
});

$factory->state(Equipment::class, 'electric', [
    'charger' => true,
    'battery' => true,
    'max_height' => '186"',
    'nationality' => 'Nacional',
]);

$factory->state(Equipment::class, 'bundle_member', [
    'is_bundle_member' => true,
]);