<?php

namespace FelipeMateus\IPTVCore\Class;

class IPTVDashboard {

    private $dashs = [];


    public function add($dash){
        array_push($this->dashs,$dash);
    }

    public function view(){
        return view('IPTV::dash', ['dashs' =>  $this->dashs]);
    }

}