<?php

namespace App\Http\Middleware;

use Closure;
use App\Course;
use Sentinel;

class Checkprivilege
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
        if(Course::find($request->id)->user_id != Sentinel::getUser()->id){
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}
