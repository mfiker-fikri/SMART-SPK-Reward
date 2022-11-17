<?php

namespace App\Http\Middleware\Admin;

use Closure;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Filesystem\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LastAdminActivity
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
        if (Auth::guard('admins')->check()) {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('admin-is-online-' . Auth::guard('admins')->user()->id, true, $expiresAt);
            //
            $admin = Admin::find(auth()->guard('admins')->id());
            // dd($admin);
            // DB::table('admins')->
            // $update = Admin::where('id', $admin)->update(['last_seen' => Carbon::now()]);
            // dd($update);
            // $arrayOfId[] = (string)$parsedArray['id'];
            // Admin::where('id', (string)Auth::guard('admins')->id())->update(array('last_seen' => Carbon::now()));
            Admin::where('id', (string)Auth::guard('admins')->user()->id)->update([
                'last_seen' => (new \DateTime())->format("Y-m-d H:i:s"),
                'last_status' => carbon::now()->format('Y-m-d'),
            ]);

        }
        return $next($request);
    }
}
