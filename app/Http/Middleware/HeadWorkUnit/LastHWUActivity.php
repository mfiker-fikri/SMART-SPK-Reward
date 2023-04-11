<?php

namespace App\Http\Middleware\HeadWorkUnit;

use App\Models\HeadWorkUnit;
use Carbon\Carbon as CarbonCarbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastHWUActivity
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
        if (Auth::guard('head_work_units')->check()) {
            $expiresAt = CarbonCarbon::now()->addMinutes(1);
            Cache::put('head_work_units-is-online-' . Auth::guard('head_work_units')->user()->id, true, $expiresAt);
            //
            $employee = HeadWorkUnit::find(auth()->guard('head_work_units')->id());
            HeadWorkUnit::where('id', (string)Auth::guard('head_work_units')->user()->id)->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }
        return $next($request);
    }
}
