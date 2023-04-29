<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MultiAuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if(auth()->user()->type == $userType) {
            return $next($request);
        }

        // return response()->json(['You do not have permission to acces for this page']);
         return response()->view('errors.check-permission'); 
    }
}
