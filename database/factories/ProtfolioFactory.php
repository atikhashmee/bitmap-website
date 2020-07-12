<?php

use Faker\Generator as Faker;
use App\Protfolio;

$factory->define(Protfolio::class, function (Faker $faker) {
    return [
        "protfolio_categories_id" =>  mt_rand(1,10),
        "project_title"  => str_random(10),
        "about_project"  => $faker->text($maxNbChars = 200),
        "description_project"  => $faker->text($maxNbChars = 200),
        "date"  => $faker->dateTime($max = 'now', $timezone = null),
        "client_name"  => $faker->name(),
        "project_location" => $faker->streetAddress,
        "video_url"  =>  "https://www.youtube.com/watch?v=_Ecl_XEETEA",
        "video_description"  => $faker->text($maxNbChars = 200),
        "project_cover_photo" => $faker->imageUrl($width = 200, $height = 200),

    ];
});
