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
    public function handle($request, Closure $next)
    {
        if(Sentinel::check()){
            if(Sentinel::check()->hasAccess(['Addcourse'])){
                return $next($request);
            }
        }
        else{
            return redirect()->route('welcome');
          }
        }
}
