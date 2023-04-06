<?php

namespace App\Http\Middleware\HeadWorkUnit;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfHWU
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = 'hwus')
    {
        try {
            if (Auth::guard($guard)->check()) {
                if (Auth::guard($guard)->user()->status_active == 1 && Auth::guard($guard)->user()->status_id == 1) {
                    return $next($request);
                }
            }
            return redirect('/headworkunit');
        } catch (\Exception $exception) {
            return $exception;
        } catch (\Error $error) {
            return $error;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
