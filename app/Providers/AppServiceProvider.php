<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\TheLoai;
use App\Slide;
use App\tintuc;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        View::composer('*', function ($view) {
            $theloaiShare= TheLoai::all();
            $tintucShare = tintuc::all()->take(17);
            $view->with(['theloaiShare' => $theloaiShare,'tintucShare'=>$tintucShare]);
        });
        View::composer('layout/slides', function ($view) {
            
        });

        
    }
}
