<?php

use Illuminate\Database\Seeder;
use App\HomeSlider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HomeSlider::class,5)->create()->each(function () {
              factory( HomeSlider::class)->make();
        });
    }
}
