<?php

namespace  FelipeMateus\IPTVCore\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use FelipeMateus\IPTVCore\Model\IPTVCdn;
use FelipeMateus\IPTVCore\Model\IPTVConfig;
use FelipeMateus\IPTVCore\Class\Locale;

class ConfigController extends CoreController
{
    /**
     * Show config page.
     *
     * @return view -> IPTV::config
     */
	public function config(){

        $data["config_list"] = IPTVConfig::getAllBoleanSettings();
        $data['locales'] = Locale::getList();
        $data["current_locate"] = IPTVConfig::get('CURRENT_LOCALE','br');

		return view("IPTV::config", $data);
	}

    /**
     * Update config .
     *
     * @return redirect -> show configs
     */
    public function configSave(Request $request ){
        $configs = IPTVConfig::getAllBoleanSettings();
        foreach($configs as $config){
            IPTVConfig::set($config['name'], $request->boolean($config['name']),'bool');
        }

        IPTVConfig::set('CURRENT_LOCALE',$request->input('CURRENT_LOCALE'));
        return redirect()->route('config');
    }
}
