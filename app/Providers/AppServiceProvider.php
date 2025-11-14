<?php

namespace App\Providers;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Spatie\Activitylog\Models\Activity;
use App\Models\{GeneralSetting};

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
        View::composer('*', function($view){
            $this->data['generalSettingData'] = GeneralSetting::first();
            view()->share($this->data);
        });
    }
}