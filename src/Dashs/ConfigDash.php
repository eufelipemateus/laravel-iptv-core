<?php
namespace FelipeMateus\IPTVCore\Dashs;

use FelipeMateus\IPTVCore\Class\IPTVDashBase;

class ConfigDash extends IPTVDashBase{

    public static  $title = "Info";

    public static function view(){
        return view('IPTV::config_dash');
    }

}
