<?php
Route::group([
    'middleware' => ['web', 'iptv_locale'],
	],
    function(){
        Route::get('dashboard', 'Tschope\IPTVCore\Controllers\DashboardController@view')->name('dashboard');
        Route::get('iptv/config', 'Tschope\IPTVCore\Controllers\ConfigController@config')->name('config');
        Route::post('iptv/config','Tschope\IPTVCore\Controllers\ConfigController@configSave')->name('config_save');
    }
);
