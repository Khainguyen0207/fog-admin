<?php

namespace Fog\FogAdmin\Http\Requests\Admin;

use Fog\FogAdmin\Enums\CustomerStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($this->customer)
            ],
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'nullable|in:male,female,other',
            'cash' => 'numeric|min:0',
            'address' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'avatar' => 'nullable|image|max:2048',
            'is_partner' => 'nullable|boolean',
            'status' => ['nullable', Rule::in(CustomerStatusEnum::cases())]
        ];

        if ($this->method() !== 'POST') {
            $rules['password'] = ['nullable', 'string', 'min:6', 'confirmed'];
        }

        return $rules;
    }
}
