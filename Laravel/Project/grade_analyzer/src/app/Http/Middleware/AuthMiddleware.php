<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        // Check if user_id and role are present in session
        if (!session()->has('user_id') || !session()->has('role')) {
            // Return a JSON response with error message
            return redirect('/');
        }

        // Proceed with the next request if logged in
        return $next($request);
    }
}
