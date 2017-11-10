<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\DataCollection;

class DataCollectionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(DataCollection::class, function ($app) {
            return new DataCollection();
        });
    }
}
