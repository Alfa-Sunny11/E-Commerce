<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->role_as == '0')
            {
                return redirect('/')->with('status','Logged in successfully');
            }
            else
            {
                return redirect('/home')->with('status','Login Failed ');
            }
        }
        else
        {
            return redirect('/home')->with('status','Please Login First');
        }
    }
}
