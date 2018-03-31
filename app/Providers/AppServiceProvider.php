<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share("provider_test","asdfasdfasdf");        //为所有的视图提供公共的数据

        // View::composer(
        //     'profile','App\Http\ViewComposers\ProfileComposer'
        // );

        // Blade::component('zhihu.common.alert','alert');


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
