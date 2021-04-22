<?php

namespace Junges\TrackableJobsUi\Providers;

use Illuminate\Support\ServiceProvider;

class TrackableJobsUiServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->publishes([
            __DIR__."/../../config/trackable-jobs-ui.php" => config_path('trackable-jobs-ui.php')
        ], 'trackabel-jobs-ui-config');

        $this->loadTranslationsFrom(__DIR__."/../../resources/lang", 'trackable-jobs');
        $this->publishes([
            __DIR__."/../../resources/lang" => resource_path('lang/vendor/trackable-jobs')
        ], 'trackable-jobs-translations');

        $this->loadViewsFrom(__DIR__."/../../resources/views", 'trackable-jobs');
        $this->publishes([
            __DIR__."/../../resources/views" => resource_path('views/vendor/junges/trackable-jobs')
        ], 'trackable-jobs-views');
    }
}