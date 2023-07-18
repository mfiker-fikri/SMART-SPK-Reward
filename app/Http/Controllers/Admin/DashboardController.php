<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;
use App\Models\HumanResource;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
// use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admins');
    }

    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        try {
            $sumAdmin       =   Admin::count();
            $sumSDM         =   HumanResource::count();
            $sumSDM1        =   HumanResource::where('role', '=', 1)->count();
            $sumSDM2        =   HumanResource::where('role', '=', 2)->count();
            $sumSDM3        =   HumanResource::where('role', '=', 3)->count();
            $sumEmployee    =   Pegawai::count();


            // dd($admin);
            return view('layouts.admin.content.dashboard.dashboard', compact('sumAdmin', 'sumSDM', 'sumSDM1', 'sumSDM2', 'sumSDM3' ,'sumEmployee'));
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardStatusOnlineOffline(Request $request)
    {

        try {
            $date = Carbon::now();
            // ->format('Y-m-d');
            // ddd($date);
            // $date = Carbon::now();
            $data = Admin::where([
                    // 'last_seen'     =>  date("Y-m-d"),
                    // 'last_status'     =>  $date,
                    'last_seen'     =>  $date,
                    // 'last_seen'     =>  date_format(from_unixtime($date),),
                    'status_id'     =>  1,
                ])
                ->orderBy('last_seen', 'ASC')
                ->get();
                // ->first();
                // ->paginate(3);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    // $status = '';
                    if (Cache::has('admin-is-online-' . $row->id)) {
                        $status = '<span class="text-success">Online</span>';
                        return $status;
                    } else {
                        $status = '<span class="text-secondary">Offline</span>';
                        return $status;
                    }
                })
                ->addColumn('lastSeen', function ($row) {
                    if (Cache::has('admin-is-online-' . $row->id)) {
                        $status = '<span class="text-success">Online</span>';
                        return $status;
                    } else {
                        $status = '<span class="text-secondary">' . \Carbon\Carbon::parse($row->last_seen)->diffForHumans() . '</span>';
                        return $status;
                    }
                })
                ->rawColumns(['status','lastSeen'])
                // ->orderColumn('status')
                // ->orderColumn('status', '-status $1')
                ->make(true);
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
