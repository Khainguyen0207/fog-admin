<?php

namespace Fog\FogAdmin\Http\Controllers\Admin;


use Fog\FogAdmin\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return admin_template_basic_view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }
}
