<?php

use Illuminate\Database\Seeder;

class HomeStyelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_styles')->insert([
            "home_style_title" => "default_home",
            "status" => 0,
            "created_at" => now()
        ]);

        DB::table('home_styles')->insert([
            "home_style_title" => "home2",
            "status" => 0,
            "created_at" => now()
        ]);
        DB::table('home_styles')->insert([
            "home_style_title" => "home5",
            "status" => 0,
            "created_at" => now()
        ]);
        DB::table('home_styles')->insert([
            "home_style_title" => "home6",
            "status" => 0,
            "created_at" => now()
        ]);

        DB::table('home_styles')->insert([
            "home_style_title" => "home8",
            "status" => 0,
            "created_at" => now()
        ]);
        
    }
}
