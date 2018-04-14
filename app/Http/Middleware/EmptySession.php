<?php

namespace App\Http\Middleware;

use Closure;

class EmptySession
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
        if($request->session()->has('adminName')){
            return Redirect('/admin/home');
        }
        return $next($request);
    }
}
