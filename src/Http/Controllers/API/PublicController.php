<?php

namespace Fog\FogAdmin\Http\Controllers\API;

use Fog\FogAdmin\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController
{

    public function customers()
    {
        $response = Customer::query()->get();

        return response()->json([
            'error' => false,
            'data' => $response,
            'message' => 'success'
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {

            return response()->json([
                'error' => false,
                'data' => Auth::user(),
                'message' => 'success'
            ]);
        }


        return response()->json([
            'error' => true,
            'data' => [],
            'message' => 'Account not found'
        ]);
    }

    public function getApiHistory()
    {

        $res = file_get_contents(storage_path('logs/api.log'));
        $res = explode("\n", $res);

        foreach ($res as $key => $value) {
            $res[$key] = json_decode($value);
        }

        return response()->json([
            'error' => false,
            'data' => $res,
            'message' => 'success'
        ]);
    }
}
