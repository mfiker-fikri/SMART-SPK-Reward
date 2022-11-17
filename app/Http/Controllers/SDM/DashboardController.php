<?php

namespace App\Http\Controllers\SDM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('human_resources.auth');
    // }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('human_resources');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // Kepala Biro SDM

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardKepalaBiroSDM()
    {
        try {
            // ddd('1');
            return view('layouts.sdm.content.dashboard.dashboard_1');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // Kepala Bagian Penghargaan Disiplin dan Tata Usaha

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardKepalaBagianPenghargaanDisiplindanTataUsaha()
    {
        try {
            // ddd('2');
            return view('layouts.sdm.content.dashboard.dashboard_2');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // Kepala Kepala Subbagian Penghargaan Disiplin dan Pensiun

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardKepalaSubbagianPenghargaanDisiplindanPensiun()
    {
        try {
            // ddd('3');
            return view('layouts.sdm.content.dashboard.dashboard_3');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
