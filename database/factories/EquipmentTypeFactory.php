<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EquipmentType;
use Faker\Generator as Faker;

$factory->define(EquipmentType::class, function (Faker $faker) {
    $name = $faker->unique()->words(2, true);

    return [
        'name' => ucfirst($name),
        'slug' => \Illuminate\Support\Str::slug($name),
        'description' => $faker->optional()->sentence(),
    ];
});