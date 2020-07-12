<?php

use Illuminate\Database\Seeder;
use App\ProtfolioCategory;

class ProtfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProtfolioCategory::class,10)->create()->each(function () {
            factory( ProtfolioCategory::class)->make();
         });
    }
}
