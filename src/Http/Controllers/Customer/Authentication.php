<?php

namespace Fog\FogAdmin\Http\Controllers\Customer;

use Fog\FogAdmin\src\Http\Requests\Customer\RegisterRequest;
use Fog\FogAdmin\src\Models\Customer;

class Authentication
{
    public function login()
    {

    }

    public function register()
    {

    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        Customer::query()->create($data);

        return response()->json([
            'message' => 'Tạo tài khoản thành công',
            'nextUrl' => route('auth.login.index')
        ])->setStatusCode(200);
    }
}
