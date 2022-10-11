<?php
namespace Tschope\IPTVCore\Dashs;

use Tschope\IPTVCore\Helpers\IPTVDashBase;

class ConfigDash extends IPTVDashBase{

    public static  $title = "Info";

    public static function view(){
        return view('IPTV::config_dash');
    }

}
