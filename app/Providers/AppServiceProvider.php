<?php

namespace App\Providers;


use App\Helper\Cart;
use Illuminate\Pagination\Paginator;
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
        // phân trang lấy links()
        Paginator::useBootstrap();

        //share data cho cac view khac
        view()->composer("*", function($view){
            $view->with(
                [
                    'cart' => new Cart()
                ]
                );
        });
    }
}
