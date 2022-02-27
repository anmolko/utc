<?php

namespace App\Http\Middleware;

use Closure;

class Customer
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
       
        if (@$request->user()->user_type == 'customer'){
            return $next($request);
        } else {
            if (@$request->user()->user_type == 'general'){
                return redirect('/auth/dashboard');
            }else if(@$request->user()->user_type == 'admin'){
                return redirect('/auth/dashboard');
            }else{
                return redirect('/user-login');
            }
        }
    }
}
