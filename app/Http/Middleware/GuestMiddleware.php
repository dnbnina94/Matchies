<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guest() ) {
             return $next($request);

        }


        if (!Auth::guest() && Auth::user()->type == 1 ) {
             return redirect()->route('admin');

        }

        if (!Auth::guest() && Auth::user()->type == 2 ) {
           return redirect()->route('moderator');

        }

        if (!Auth::guest() && Auth::user()->type == 3 ) {
           return redirect()->route('home');

        }

        return redirect('/');

    }
}
