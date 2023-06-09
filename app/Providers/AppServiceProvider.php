<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

<<<<<<< HEAD
=======
        // Enlazando y haciendo a que sea por medio de http
        if ($this->app->environment('production')) {
            # code...
            URL::forceScheme('https');
        }
>>>>>>> deployment
    }
}
