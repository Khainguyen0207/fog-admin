<?php


return [
    'providers' => [
        'customer' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', \Fog\FogAdmin\Models\Customer::class),
        ],
    ],

    'guards' => [
        'customer' => [
            'driver' => 'session',
            'provider' => 'customer',
        ],
    ],
];
