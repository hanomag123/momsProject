<?php

namespace App\Providers;

use App\Models\Navbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

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
      View::composer('*', function($view)
      {
          $navbars = Navbar::orderBy('ordering')->get();
          $view->with('navbars', $navbars);

          Paginator::defaultView('vendor.pagination.bootstrap-5');
      });
    }
}
