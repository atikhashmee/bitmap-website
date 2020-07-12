<?php

use Illuminate\Database\Seeder;
 use App\AppSetting;
class AppInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AppSetting::class)->make();
    }
}
