<?php

namespace App\Http\Middleware;

use Closure;

class ClientAuth
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
        if (session()->exists('token') && session()->exists('token_type')) {
            return $next($request);    
        }
         
        return redirect()->route('login');    
    }
}
