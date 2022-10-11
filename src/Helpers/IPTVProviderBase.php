<?php

namespace Tschope\IPTVCore\Helpers;

use Illuminate\Support\ServiceProvider;
use Tschope\IPTVCore\Facades\IPTVMenu;
use Tschope\IPTVCore\Facades\IPTVDashboard;

class IPTVProviderBase extends ServiceProvider {

    protected function loadMenusFrom($path){
        $json = $path.".json";
        $menu = json_decode(file_get_contents($json), true);
        IPTVMenu::add($menu);
    }

    protected function loadDashFrom($dash){
        IPTVDashboard::add($dash);
    }
}
