<?php

namespace Fog\FogAdmin\Support;

use Illuminate\Support\Str;

class PathHelper
{
    public static function getRootPath(): string
    {
        return Str::between(__DIR__, self::class, '/src');
    }
}
