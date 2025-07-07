<?php

namespace Fog\FogAdmin\Http\Controllers\Customer;

use Fog\FogAdmin\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        return view('fog-admin::theme.pages.homepage.index');
    }
}
