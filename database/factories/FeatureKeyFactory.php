<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FeatureKey;
use Faker\Generator as Faker;

$factory->define(FeatureKey::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word(),
    ];
});