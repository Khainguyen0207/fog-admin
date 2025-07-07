<?php

use Fog\FogAdmin\Http\Middleware\VerifyWebMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/api/v1',
    'namespace' => 'Fog\FogAdmin\Http\Controllers\API',
    'middleware' => VerifyWebMiddleware::class
], function () {
    Route::group([
        'middleware' => ['api'],
    ], function () {
        Route::get('customers', 'PublicController@customers');
    });

    Route::post('login', 'PublicController@login');
    Route::get('getApiHistory', 'PublicController@getApiHistory');
});
