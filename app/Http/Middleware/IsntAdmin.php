<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsntAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::check() && !Auth::user()->is_admin)
        //     return $next($request);
        
        if (Auth::guard($guard)->check() /* Auth::check() */ && !Auth::user()->is_admin) {
            // if ((Auth::user()->username != 'E2022027') && (Auth::user()->username != 'E2022085')) {
            //     return redirect()->route('thanks');
            // }

            return $next($request);
        }
        
        return redirect('/')->with('error','No tienes los suficientes permisos.');
    }
}
