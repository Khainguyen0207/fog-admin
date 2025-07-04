<?php

Route::group([
    'prefix' => '/',
    'namespace' => 'Fog\FogAdmin\Http\Controllers\Customer',
], function () {
    Route::get('/', 'HomepageController@index')->name('homepage');
});
