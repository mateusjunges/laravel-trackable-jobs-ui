<?php

namespace Junges\TrackableJobsUi\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Junges\TrackableJobsUi\Http\Livewire\JobStatus;
use Junges\TrackableJobsUi\View\Components\Status;
use Livewire\Livewire;

class TrackableJobsUiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->afterResolving(BladeCompiler::class, function () {
            if (class_exists(Livewire::class)) {
                Livewire::component('trackable-jobs-job-status', JobStatus::class);
            }
        });
    }

    public function boot()
    {
        $this->registerComponents();

        $this->publishes([
            __DIR__."/../../config/trackable-jobs-ui.php" => config_path('trackable-jobs-ui.php')
        ], 'trackable-jobs-ui-config');

        $this->loadTranslationsFrom(__DIR__."/../../resources/lang", 'trackable-jobs');
        $this->publishes([
            __DIR__."/../../resources/lang" => resource_path('lang/vendor/trackable-jobs')
        ], 'trackable-jobs-translations');

        $this->loadViewsFrom(__DIR__."/../../resources/views", 'trackable-jobs');
        $this->publishes([
            __DIR__."/../../resources/views" => resource_path('views/vendor/junges/trackable-jobs')
        ], 'trackable-jobs-views');

        $this->publishes([
            __DIR__ . "/../../public/" => public_path('vendor/trackable-jobs-ui')
        ], 'trackable-jobs-ui-assets');

        $this->loadViewComponentsAs('trackable-jobs', [
            Status::class
        ]);
    }

    public function registerComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('status');
            $this->registerComponent('job-status', 'livewire');
        });
    }

    /**
     * Register the given component.
     *
     * @param string $component
     * @param string $namespace
     * @return void
     */
    protected function registerComponent(string $component, string $namespace = 'components')
    {
        Blade::component('trackable-jobs::'.$namespace.'.'.$component, 'trackable-jobs-'.$component);
    }

}
