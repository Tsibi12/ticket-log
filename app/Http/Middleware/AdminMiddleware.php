<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Checking if logged in user is admin
        // if(auth()->check() && auth()->user()->is_admin == 1)
        if (!Auth::check() || (Auth::check() && Auth::user()->is_admin !== 1)) {
            return redirect('home');
        }
        
        return $next($request);
    }
}
