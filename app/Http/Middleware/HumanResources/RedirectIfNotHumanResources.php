<?php

namespace App\Http\Middleware\HumanResources;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotHumanResources
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = 'human_resources')
    {
        try {
            if (!Auth::guard('human_resources')->check()) {
                // if (!Auth::guard($guard)->user()->role == 1) {
                //     // return redirect('/sdm/kepala-biro-SDM/dashboard');
                //     return $next($request);
                // }
                // if (!Auth::guard($guard)->user()->role == 2) {
                //     return $next($request);
                //     // return redirect('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard');
                // }
                // if (!Auth::guard($guard)->user()->role == 3) {
                //     return $next($request);
                //     // return redirect('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard');
                // }
                return $next($request);
            } else {
                // return back();
                if (Auth::guard('human_resources')->user()->role == 1) {
                    return redirect('/sdm/kepala-biro-SDM/dashboard');
                }
                elseif (Auth::guard('human_resources')->user()->role == 2) {
                    return redirect('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard');
                } else {
                    return redirect('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard');
                }
            }
            // return $next($request);
            // return redirect('/sdm/dashboard');
        } catch (\Exception $exception) {
            return $exception;
        } catch (\Error $error) {
            return $error;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
