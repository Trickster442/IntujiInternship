<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CityCheck
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
        if ($request->city != 'Kathmandu') {
            die("You cannot visit this page outside Kathmandu");
        }
        return $next($request);
    }
}
