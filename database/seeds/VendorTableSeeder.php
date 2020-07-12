<?php

use Illuminate\Database\Seeder;
use App\Models\Vendor;


class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vendor::class, 50)->create()->each(function() {
            factory(Vendor::class)->make();
        });
    }
}
