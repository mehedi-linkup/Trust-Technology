<?php

namespace App\Providers;

use App\Models\CompanyProfile;
use App\Models\BackBanner;
use App\Models\Category;
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
        view()->share('content', CompanyProfile::first());
        view()->share('backimage', BackBanner::first());
        view()->share('category', Category::where('status', 1)->latest()->get());
    }
}
