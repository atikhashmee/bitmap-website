<?php

use Faker\Generator as Faker;
use App\AppSetting;

$factory->define(AppSetting::class, function (Faker $faker) {
    return [
        'logo'=> "logo" ,
        'fevicon' => "fevicon",
        'title' => "Studiobitmap || You deserve a good design",
        'short_description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'facebook' => "studiobitmaps",
        'twitter' => "studiobitmap",
        'instagram' => "studiobitmap"
    ];
});
