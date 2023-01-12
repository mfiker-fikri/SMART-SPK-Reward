<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = 'admins')
    {
        try {
            if (!Auth::guard($guard)->check()) {
                return $next($request);
            }
            return redirect('/admin/dashboard');
            // else if (Auth::guard($guard)->check()) {
            //     return redirect('/admin/dashboard');
            // }
        } catch (\Exception $exception) {
            return $exception;
        } catch (\Error $error) {
            return $error;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
