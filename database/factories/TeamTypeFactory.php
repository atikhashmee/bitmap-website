<?php

use Faker\Generator as Faker;
use App\TeamType;

$factory->define(TeamType::class, function (Faker $faker) {
    return [
        "category_title" => $faker->title(),
        "description"   => $faker->text($maxNbChars = 200),
    ];
});
