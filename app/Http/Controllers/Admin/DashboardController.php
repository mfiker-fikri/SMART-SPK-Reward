<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;
use App\Models\Pegawai;

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
            $sumEmployee    =   Pegawai::count();
            // dd($admin);
            return view('layouts.admin.content.dashboard.dashboard', compact('sumAdmin', 'sumEmployee'));
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
