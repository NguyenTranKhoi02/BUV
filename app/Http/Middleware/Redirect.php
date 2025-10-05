<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Redirect
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
        // Thêm logic redirect ở đây nếu cần
        // Hiện tại chỉ cho phép request tiếp tục
        return $next($request);
    }
}
