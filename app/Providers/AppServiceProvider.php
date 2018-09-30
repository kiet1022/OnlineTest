<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\NewsType;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $newstype = NewsType::all();
            $view->with('newstype',$newstype);
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
