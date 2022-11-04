<?php

namespace App\Http\Middleware\Pegawai;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotPegawai
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
        return $next($request);

        try {
            if (!Auth::guard($guard)->check()) {
                return $next($request);
            }
            return redirect('/dashboard');
        } catch (\Exception $exception) {
            return $exception;
        }
        // catch (\Throwable $th) {
        //     throw $th;
        // }
    }
}
