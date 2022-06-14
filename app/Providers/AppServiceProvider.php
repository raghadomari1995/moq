<?php

namespace App\Providers;

use App\Advertising;
use App\Category;
use App\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        view()->share([
            'all_cats'=> Category::all(),
            'home_cats'=> Category::where('in_home',1)->get(),
            'ads'=> Advertising::where('status','1')->get(),
            'adss'=> Advertising::where('status','1')->get(),
            'settings'=> Setting::all(),
        ]);
    }
}
