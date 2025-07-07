<?php

namespace Fog\FogAdmin\Models;

use Fog\FogAdmin\Enums\CustomerStatusEnum;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = 'customers';

    protected $fillable = [
        'id',
        'name',
        'password',
        'email',
        'cash',
        'status',
        'birthday',
        'phone',
        'email_verified_at',
        'remember_token',
        'is_verified',
        'last_login_at',
        'gender',
        'address',
        'is_partner',
    ];

    protected $casts = [
        'birthday' => 'datetime',
        'cash' => 'integer',
        'status' => CustomerStatusEnum::class,
        'password' => 'hashed',
    ];

    protected $hidden = ['password'];
}
