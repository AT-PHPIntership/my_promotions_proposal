<?php
namespace App\Repositories\Business;

use Illuminate\Support\ServiceProvider;

class BusinessRepoServiceProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Business\BusinessInterface', 'App\Repositories\Business\BusinessRepository');
    }
}
