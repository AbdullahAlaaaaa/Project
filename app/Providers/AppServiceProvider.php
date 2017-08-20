<?php

namespace App\Providers;
use Schema;
use Illuminate\Support\ServiceProvider;

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


           // view()->share('user', $users->id);
//            view()->composer('*', function($view){
//   $view->with('user', Auth::user()->admin);
// });

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
