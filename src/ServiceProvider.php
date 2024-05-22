<?php

namespace VoyagerInc\QuoteReplace;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->registerServices();
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/quote_replace.php' => config_path('quote_replace.php'),
        ], 'quote-replace');

        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            \VoyagerInc\QuoteReplace\Console\InstallExample::class,
        ]);
    }

    protected function registerServices()
    {
        $this->app->bind(\VoyagerInc\QuoteReplace\Contracts\ConfigDataServiceInterface::class, function () {
            return new \VoyagerInc\QuoteReplace\Services\ConfigDataService();
        });

        $this->app->bind(\VoyagerInc\QuoteReplace\Contracts\QuoteReplaceServiceInterface::class, function ($app) {
            return new \VoyagerInc\QuoteReplace\Services\QuoteReplaceService($app->make(\VoyagerInc\QuoteReplace\Contracts\ConfigDataServiceInterface::class));
        });
    }
}
