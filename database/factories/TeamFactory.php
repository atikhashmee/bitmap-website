<?php

use Faker\Generator as Faker;
use App\TeamMembers;

$factory->define(TeamMembers::class, function (Faker $faker) {
    return [
           
                "team_types_id" => mt_rand(1,10),
                "member_name"  => $faker->titleMale()." ".$faker->name(),
                "designation"  =>  $faker->text($maxNbChars = 200),
                "description"  => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
                "memberimage"  => $faker->imageUrl($width = 200, $height = 150),
    ];
});
