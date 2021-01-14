<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\PreClosingChecklist;
use App\Models\Property;
use App\Observers\ClientObserver;
use App\Observers\PreClosingObserver;
use App\Observers\PropertyLogObserver;
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
        $this->registerObserver();
    }


    private function registerObserver(){

        Client::observe(ClientObserver::class);
        Property::observe(PropertyLogObserver::class);
        PreClosingChecklist::observe(PreClosingObserver::class);
    }
}
