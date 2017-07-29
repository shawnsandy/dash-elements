<?php

namespace ShawnSandy\DashElements;

use Illuminate\Support\ServiceProvider;

/**
 * Class Provider
 * @package ShawnSandy\DashElements
 */
class DashElementsServicesProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {


        /**
         * Package views
         */
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'dashelements');
        $this->publishes(
            [
                __DIR__ . '/resources/views' => resource_path('views/vendor/dashelements'),
            ], 'dashelements-views'
        );

        /**
         * Package assets
         */
        $this->publishes(
            [
                __DIR__.'/resources/assets/js/' => public_path('assets/dashelements/js/')
            ], 'dashelements-assets'
        );


        /**
         * Package resources to resources
         */
        $this->publishes(
            [
                __DIR__.'/resources/assets/' => resource_path('assets/dashelements/'),
            ], 'dashelements-resources'
        );

        /**
         * Package config
         */
        $this->publishes(
            [__DIR__ . '/config/config.php' => config_path('dashelements.php')],
            'dashelements-config'
        );

        if (!$this->app->runningInConsole()) :
            include_once __DIR__ . '/Helpers/helper.php';
        endif;

        include_once __DIR__."/components.php";




    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

       $this->mergeConfigFrom(
            __DIR__ . '/config/config.php', 'dashelements'
        );

        $this->app->bind(
        'Dashelements', function () {
        return new Dashelements();
        }
        );
    }


}
