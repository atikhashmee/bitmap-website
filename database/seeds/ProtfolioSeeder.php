<?php

use Illuminate\Database\Seeder;
use App\Protfolio;

class ProtfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Protfolio::class, 20)->create()->each(function(){
              factory(Protfolio::class)->make();
        });
    }
}
