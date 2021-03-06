<?php

namespace Eon\Dario;

use Illuminate\Support\ServiceProvider;

class XmlOutputServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(realpath(__DIR__ .'/views'), 'dario');

        $this->publishes([
            __DIR__ .'/views' => base_path('resources/views/eon/dario'),
        ], 'views');

        $this->publishes([
            __DIR__.'/public' => public_path('js/eon/dario'),
        ], 'public');

        $this->publishes([
            __DIR__.'/config.xml' => config_path('/../public/config.xml'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        require __DIR__ .'/routes.php';
        $this->app->make('Eon\Dario\XmlOutputController');
    }
}
