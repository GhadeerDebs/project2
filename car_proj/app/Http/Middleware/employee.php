<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class employee
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
        if(Auth::check()){
             if ( Auth::user()->type == 'employee'){
                 return $next($request);
            } else {
                 Auth::user()->tokens()->delete();
              return redirect(RouteServiceProvider::EmployeeHOME);

             }
        }   
         return $next($request);

    }
}