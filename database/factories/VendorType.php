<?php

use Faker\Generator as Faker;

$factory->define(App\Models\VendorType::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'details' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
