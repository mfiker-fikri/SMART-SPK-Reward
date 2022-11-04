<?php

namespace App\Http\Middleware\Admin;

use Closure;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class LastPegawaiActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('employees')->check()) {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('pegawai-is-online-' . Auth::guard('employees')->user()->id, true, $expiresAt);
            // 
            $employee = Pegawai::find(auth()->guard('employees')->id());
            Pegawai::where('id', (string)Auth::guard('employees')->user()->id)->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }
        return $next($request);
    }
}
