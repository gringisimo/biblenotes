<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\publication;

use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view){
            
                $user = Auth::user();
                $publications = publication::get();
                $view->with('publications',$publications);
            
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
