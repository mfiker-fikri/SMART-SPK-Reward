<?php

namespace App\Http\Middleware\TeamAssessment;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfTA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = 'team_assessments')
    {
        // return $next($request);
        try {
            if (Auth::guard($guard)->check()) {
                if (Auth::guard($guard)->user()->status_active == 1 && Auth::guard($guard)->user()->status_id == 1) {
                    return $next($request);
                }
            }
            return redirect('/penilai');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
