<?php

namespace App\Providers;

use App\Models\Berita;
use App\Models\Carousel;
use Illuminate\Pagination\Paginator;
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
        //
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
        Paginator::useBootstrap();
        date_default_timezone_set('Asia/Makassar');

        view()->composer('*', function ($view){
            $carousel = Carousel::all();
            $berita = Berita::orderBy('created_at', 'desc')->limit(3)->get();
            return $view->with('carousel', $carousel)->with('terkini', $berita);
        });
    }
}
