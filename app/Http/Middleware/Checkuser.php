<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
class Checkuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!(Sentinel::check() && Sentinel::getUser()->roles->first()->name == $role)){
         return redirect()->route('welcome');   
        }
        return $next($request);
}
}
