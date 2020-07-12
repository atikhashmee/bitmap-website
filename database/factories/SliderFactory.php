<?php

use Faker\Generator as Faker;
use App\HomeSlider;

$factory->define(HomeSlider::class, function (Faker $faker) {
    return [
        'slider_Title' => $faker->text($maxNbChars = 200),
        'slider_Description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'project_url' => $faker->url,
        'project_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'image_link' =>   $faker->imageUrl($width = 740, $height = 480)
    ];
});
