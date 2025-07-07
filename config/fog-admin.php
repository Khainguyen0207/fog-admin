<?php

return [
    'auth' => [
        'provider' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', \Fog\FogAdmin\Models\Customer::class),
        ],
        'guard' => [
            'driver' => 'session',
            'provider' => 'customer',
        ],
    ],
];
