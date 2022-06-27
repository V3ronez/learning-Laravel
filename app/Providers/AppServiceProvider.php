<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// criando paginação padrao laravel 7x
use Illuminate\Pagination\Paginator;

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
        //criando a pagincao padrao do laravel 7x
        Paginator::useBootstrap();
    }
}
