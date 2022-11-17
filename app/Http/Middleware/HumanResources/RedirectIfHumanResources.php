<?php

namespace App\Http\Middleware\HumanResources;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfHumanResources
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, $guard = 'human_resources', $role)
    public function handle(Request $request, Closure $next, $role)
    {
        try {
            if (Auth::guard('human_resources')->check()) {
                // if (  (Auth::guard($guard)->user()->status_active == 1 && Auth::guard($guard)->user()->status_id == 1)
                //         && Auth::guard($guard)->user()->role == 1 ) {
                //     return $next($request);
                // }

                // elseif (  (Auth::guard($guard)->user()->status_active == 1 && Auth::guard($guard)->user()->status_id == 1)
                //         && Auth::guard($guard)->user()->role == 2 ) {
                //     return $next($request);
                // }

                // elseif (  (Auth::guard($guard)->user()->status_active == 1 && Auth::guard($guard)->user()->status_id == 1)
                //         && Auth::guard($guard)->user()->role == 3 ) {
                //     return $next($request);
                // }
                if(Auth::guard('human_resources')->user()->role == $role) {
                    if(Auth::guard('human_resources')->user()->status_active == 1 && Auth::guard('human_resources')->user()->status_id == 1) {
                        return $next($request);
                    } else {
                        return redirect('/sdm');
                    }
                }
                // if ( Auth::guard($guard)->user()->status_active == 1 && Auth::guard($guard)->user()->status_id == 1 ) {
                //     if(Auth::guard($guard)->user()->role == $role) {
                //         return $next($request);
                //     }
                //     // elseif(Auth::guard($guard)->user()->role == $role) {
                //     //     return $next($request);
                //     // }else{
                //     //     return $next($request);
                //     // }
                //     // return $next($request);
                // }

                else {
                    return redirect('/sdm');
                }
            } else {
                // abort(403);
                return redirect('/sdm');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        // return $next($request);
    }
}
