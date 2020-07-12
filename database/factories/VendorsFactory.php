<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Vendor::class, function (Faker $faker) {
    return [
        'vendor_name' => $faker->name,
        'address' => $faker->address,
        'vendor_type_id' => mt_rand(1,10),
        'contact_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'specification' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
