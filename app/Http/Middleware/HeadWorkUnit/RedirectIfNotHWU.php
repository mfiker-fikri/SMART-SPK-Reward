<?php

namespace App\Http\Middleware\HeadWorkUnit;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotHWU
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
            if (!Auth::guard($guard)->check()) {
                return $next($request);
            }
            return redirect('/headworkunit/dashboard');
        } catch (\Exception $exception) {
            return $exception;
        } catch (\Error $error) {
            return $error;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
