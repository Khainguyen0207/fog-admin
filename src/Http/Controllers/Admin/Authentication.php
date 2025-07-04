<?php

namespace Fog\FogAdmin\Http\Controllers\Admin;


use Fog\FogAdmin\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    public function login() {
        return admin_template_basic_view('auth.login');
    }

    public function authenticate(LoginRequest $request) {
        $data = $request->validated();

        if(Auth::guard('customer')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors( 'Tài khoản or mật khẩu không chính xác');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect()->route('admin.login');
    }
}
