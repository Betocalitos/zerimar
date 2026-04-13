<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EquipmentBundle;
use Faker\Generator as Faker;

$factory->define(EquipmentBundle::class, function (Faker $faker) {
    $name = 'Paquete ' . $faker->unique()->words(2, true);

    return [
        'name' => ucfirst($name),
        'slug' => \Illuminate\Support\Str::slug($name),
        'description' => $faker->optional()->sentence(),
        'price_sale' => $faker->optional()->randomFloat(2, 5000, 100000),
        'exchange' => 'USD',
    ];
});