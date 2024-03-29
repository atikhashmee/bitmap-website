<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Schema::defaultStringLength(191);
        
        // Relation::morphMap([
        //     'client'  => 'App\ClientsLists',
        //     'account' => 'App\Models\Accounts\Treasures',
        //     'project' => 'App\Models\Project\Project'
        // ]);

        // view()->share('global',availableTaka());

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->singleton('foo',function(){
            return new \App\Acme\FooBar();
        });

        
    }

    


}
