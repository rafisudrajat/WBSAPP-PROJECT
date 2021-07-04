<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('UserLogged') && ($request->path() != '/' && $request->path() != 'register')) {
            return redirect('/')->with('fail', 'Must login first!!!');
        }
        if (session()->has('UserLogged') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }
        return $next($request);
    }
}
