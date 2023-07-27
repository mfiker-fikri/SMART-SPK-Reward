<?php

namespace App\Http\Controllers\TeamAssessment;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\CountdownTimerFormTeladan;
use App\Models\FinalResultRewardInovation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('team_assessment.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        try {
            //
            $timerInovasi                  =   CountdownTimerFormInovation::first();

            //
            $timerTeladan                  =   CountdownTimerFormTeladan::first();

            if ($timerInovasi == null && $timerTeladan == null) {
                return view('layouts.teamAssessment.content.dashboard.dashboard', compact('timerInovasi', 'timerTeladan'));
            }
            elseif ($timerInovasi != null && $timerTeladan == null) {
                $dateTimeOpenInovasi           =   new Carbon($timerInovasi->date_time_open_appraisment);

                $dateOpenInovasi                      =   $dateTimeOpenInovasi->toDateString();
                $dateOpenTimeInovasi                  =   $dateTimeOpenInovasi->toDateTimeString();

                $dateTimeExpiredInovasi        =   new Carbon($timerInovasi->date_time_expired_form_inovation);

                $dateExpiredInovasi                   =   $dateTimeExpiredInovasi->toDateString();
                $dateExpiredTimeInovasi               =   $dateTimeExpiredInovasi->toDateTimeString();

                return view('layouts.teamAssessment.content.dashboard.dashboard', compact('timerInovasi', 'timerTeladan'));
            }
            elseif ($timerInovasi == null && $timerTeladan != null) {
                $dateTimeOpenTeladan           =   new Carbon($timerTeladan->date_time_open_form_teladan);

                $dateOpenTeladan               =   $dateTimeOpenTeladan->toDateString();
                $dateOpenTimeTeladan           =   $dateTimeOpenTeladan->toDateTimeString();

                $dateTimeExpiredTeladan        =   new Carbon($timerTeladan->date_time_expired_form_teladan);

                $dateExpiredTeladan            =   $dateTimeExpiredTeladan->toDateString();
                $dateExpiredTimeTeladan        =   $dateTimeExpiredTeladan->toDateTimeString();

                return view('layouts.teamAssessment.content.dashboard.dashboard', compact('timerInovasi', 'timerTeladan'));
            }
            elseif ($timerInovasi != null && $timerTeladan != null) {
                $dateTimeOpenInovasi           =   new Carbon($timerInovasi->date_time_open_appraisment);

                $dateOpenInovasi                      =   $dateTimeOpenInovasi->toDateString();
                $dateOpenTimeInovasi                  =   $dateTimeOpenInovasi->toDateTimeString();

                $dateTimeExpiredInovasi        =   new Carbon($timerInovasi->date_time_expired_form_inovation);

                $dateExpiredInovasi                   =   $dateTimeExpiredInovasi->toDateString();
                $dateExpiredTimeInovasi               =   $dateTimeExpiredInovasi->toDateTimeString();

                return view('layouts.teamAssessment.content.dashboard.dashboard', compact('timerInovasi', 'timerTeladan'));
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hallo()
    {
        // try {

        // } catch (\Throwable $th) {
        //     throw $th;
        // }
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
