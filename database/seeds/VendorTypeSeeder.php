<?php

use App\Models\VendorType;
use Illuminate\Database\Seeder;

class VendorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VendorType::class, 10)->create()->each(function() {
            factory(VendorType::class)->make();
        });
    }
}
