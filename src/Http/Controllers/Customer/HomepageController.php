<?php

namespace Fog\FogAdmin\Http\Controllers\Customer;

use Fog\FogAdmin\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        return view('theme.pages.homepage.index');
    }
}
