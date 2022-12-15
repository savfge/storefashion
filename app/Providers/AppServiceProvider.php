<?php

namespace App\Providers;

use App\Models\Barnd;
use App\Models\Commper;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;
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
        Blade::if('lang',function($langage){
           return App()->isLocale($langage);
        });
        $use = Paginator::useTailwind();
        View::composer('*',function($view){
            $view->with('cartcontenns',Cart::instance('cart')->content());
            $view->with('cartubtotal',Cart::instance('cart')->subtotal());
            $view->with('carttotal',Cart::instance('cart')->total());
            $view->with('cartwishlist',Cart::instance('wishlist')->content());
            $view->with('barndsall',Barnd::all());
            $view->with('commperalls',Commper::all());
            $view->with('commpercount',Commper::count());
            
        });
    }
}
