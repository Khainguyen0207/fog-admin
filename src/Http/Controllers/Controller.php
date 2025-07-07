<?php

namespace Fog\FogAdmin\Http\Controllers;


use Fog\FogAdmin\src\Http\Controllers\Base\BaseHttpResponse;

abstract class Controller
{
    public function httpResponse(): BaseHttpResponse
    {
        return BaseHttpResponse::make();
    }
}
