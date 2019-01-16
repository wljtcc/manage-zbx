<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\VWListHostIP;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $inativo = VWListHostIP::where('available', 0)->count();
        $online = VWListHostIP::where('available', 1)->count();
        $offline = VWListHostIP::where('available', 2)->count();

        view()->share('inativo', $inativo);
        view()->share('online', $online);
        view()->share('offline', $offline);
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
