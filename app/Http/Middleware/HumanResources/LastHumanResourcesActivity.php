<?php

namespace App\Http\Middleware\HumanResources;

use Closure;
use App\Models\HumanResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class LastHumanResourcesActivity
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
        if (Auth::guard('human_resources')->check()) {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('humanResource-is-online-' . Auth::guard('human_resources')->user()->id, true, $expiresAt);
            //
            $human_resources = HumanResource::find(auth()->guard('human_resources')->id());
            HumanResource::where('id', (string)Auth::guard('human_resources')->user()->id)->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }
        return $next($request);
    }
}
