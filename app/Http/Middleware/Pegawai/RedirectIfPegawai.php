<?php

namespace App\Http\Middleware\Pegawai;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfPegawai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = 'employees')
    {
        try {
            if (Auth::guard($guard)->check()) {
                if (Auth::guard($guard)->user()->status_active == 1 && Auth::guard($guard)->user()->status_id == 1) {
                    return $next($request);
                }
            }
            return redirect('/');
        } catch (\Exception $exception) {
            return $exception;
        } catch (\Error $error) {
            return $error;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
