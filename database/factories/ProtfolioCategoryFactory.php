<?php

use Faker\Generator as Faker;
use App\ProtfolioCategory;

$factory->define(ProtfolioCategory::class, function (Faker $faker) {
    return [
        "category_name" => $faker->title(),
        "description"   => $faker->text($maxNbChars = 200),
    ];
});
