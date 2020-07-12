<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MybuldServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $he = "hello world";
        return $he;
    }
}
