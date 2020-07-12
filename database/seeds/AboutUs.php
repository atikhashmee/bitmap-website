<?php

use Illuminate\Database\Seeder;

class AboutUs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'abouts')->insert([
                "id" => 1
        ]);
    }
}
