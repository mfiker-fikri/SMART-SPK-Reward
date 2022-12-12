<?php

namespace App\Http\Middleware\TeamAssessment;

use App\Models\TeamAssessment;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastTeamAssessmentActivity
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

        if (Auth::guard('team_assessments')->check()) {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('TA-is-online-' . Auth::guard('team_assessments')->user()->id, true, $expiresAt);
            //
            $ta = TeamAssessment::find(auth()->guard('team_assessments')->id());
            TeamAssessment::where('id', (string)Auth::guard('team_assessments')->user()->id)->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }
        return $next($request);
    }
}
