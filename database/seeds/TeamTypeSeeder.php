<?php

use Illuminate\Database\Seeder;
use App\TeamType;


class TeamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(TeamType::class,10)->create()->each(function () {
                factory(TeamType::class)->make();
         } );
    }
}
