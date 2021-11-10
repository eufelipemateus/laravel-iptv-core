<?php
namespace DummyNamespace ;

use FelipeMateus\IPTVCore\Class\IPTVDashBase;

class DummyClass extends IPTVDashBase {

    public static  $title = "Example Dash";

    public static function view(){
        return parent::view();
    }

}
