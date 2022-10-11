<?php

namespace Tschope\IPTVCore;

use Illuminate\Routing\Router;
use Tschope\IPTVCore\Helpers\IPTVProviderBase;
use Tschope\IPTVCore\Middleware\PublicCdnMiddleware;
use Tschope\IPTVCore\Middleware\IPTVLocaleMiddleware;
use Tschope\IPTVCore\Dashs\ConfigDash;
use Tschope\IPTVCore\Commands\MakeDashCommand;

class IPTVProvider extends IPTVProviderBase {


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){
        $this->registerMidleware();
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
        $this->loadJSONTranslationsFrom(__DIR__.'/resources/translations');
		$this->loadViewsFrom(__DIR__.'/resources/views', 'IPTV');
		$this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMenusFrom(__DIR__.'/resources/menu');
        $this->registerDashboard();

        $this->publishes([
            __DIR__.'/resources/assets' => public_path('assets'),
        ],"public");

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeDashCommand::class,
            ]);
        }
    }



    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('iptv-menu', function(){
            return new \Tschope\IPTVCore\Helpers\IPTVMenu;
        });
        $this->app->singleton('iptv-dashboard', function(){
            return new \Tschope\IPTVCore\Helpers\IPTVDashboard;
        });
    }

    /**
     * Register Midleware
     *
     * @return void
     */
    private function registerMidleware(){
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('iptv_locale', IPTVLocaleMiddleware::class);
    }

    /**
     * Regoster Dashboard card
     *
     * @return void
     */
    private function registerDashboard(){
        $this->loadDashFrom(ConfigDash::class);
    }

}
