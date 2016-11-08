<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
class Admin
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
        if(Sentinel::check()){
            $role = Sentinel::getUser()->roles->first()->name;
        }
        if(!(Sentinel::check() && ($role == 'Admin' || $role == 'Reception'|| $role == 'Business'|| $role == 'Support'))){
         return redirect()->route('welcome');   
        }
        return $next($request);
    }
}
