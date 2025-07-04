<?php

namespace Fog\FogAdmin\Http\Controllers\Admin;

class APIController
{
    public function index()
    {
        $histories = file_get_contents(storage_path('logs/api.log'));
        $histories = explode("\n", $histories);

        return admin_template_basic_view('api.history', [
            'title' => 'API History',
            'histories' => $histories,
        ]);
    }
}
