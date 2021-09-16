<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            // enforce https, solving issue on production at heroku that asset(), etc still using http
            // source -> https://stackoverflow.com/questions/34378122/load-blade-assets-with-https-in-laravel
            \URL::forceScheme('https');
        }
    }
}
