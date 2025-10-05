<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = 'vi'; // Default locale
        
        // Check if locale is in URL (e.g., /en/page)
        $segments = $request->segments();
        if (!empty($segments) && in_array($segments[0], ['en', 'vi'])) {
            $locale = $segments[0];
        }
        
        // Set application locale
        App::setLocale($locale);
        Session::put('locale', $locale);
        
        return $next($request);
    }
}
