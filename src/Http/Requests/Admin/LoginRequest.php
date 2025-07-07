<?php

namespace Fog\FogAdmin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|min:6',
        ];
    }
}
