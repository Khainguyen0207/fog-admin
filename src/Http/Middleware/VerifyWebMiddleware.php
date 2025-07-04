<?php

namespace Fog\FogAdmin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyWebMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->acceptsHtml()) {
            abort(404);
        }

        log_api($request);

        return $next($request);
    }
}
