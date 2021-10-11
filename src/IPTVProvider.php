<?php

namespace FelipeMateus\IPTVCore;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use  FelipeMateus\IPTVCore\Middleware\PublicCdnMiddleware;
use  FelipeMateus\IPTVCore\Middleware\IPTVLocaleMiddleware;

class IPTVProvider extends ServiceProvider {


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){
        $this->registerMidleware();
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
        $this->loadJSONTranslationsFrom(__DIR__.'/translations');
		$this->loadViewsFrom(__DIR__.'/views', 'IPTV');
		$this->loadRoutesFrom(__DIR__.'/routes.php');
    }



    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
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

}
