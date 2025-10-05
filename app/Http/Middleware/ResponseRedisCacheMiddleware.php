<?php

namespace App\Http\Middleware;

use App\Helpers\LoggerHelpers;
use App\Helpers\UserInterfaceHelper;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ResponseRedisCacheMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $response = $next($request);
        return $response;

    }
}
