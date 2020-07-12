<?php

use Illuminate\Database\Seeder;
use App\TeamMembers;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( TeamMembers::class, 10)->create()->each( function(){
             factory(TeamMembers::class)->make();
        });
    }
}
