<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Project\Project::class, function (Faker $faker) {
    return [
        'project_title' => $faker->name." title --",
        'client_name' => $faker->name,
        'location' => $faker->address,
        'contact_number' => $faker->phoneNumber,
        'status' => '0',
        'budget' => 10000,
    ];
});
