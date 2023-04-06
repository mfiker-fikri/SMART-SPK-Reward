<?php

namespace App\Http\Controllers\TeamAssessment\Penilaian\Teladan;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CountdownTimerFormTeladan;
use App\Models\Criteria;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ManageAppraismentTeladanController extends Controller
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
    public function getAppraisment()
    {
        try {
            // Get Timer Countdown
            $timer                      =   CountdownTimerFormTeladan::first();

            if ($timer != null) {
                $timer                  =   CountdownTimerFormTeladan::first();

                // Option Select Inovation
                $selectOptionCategory = Category::where('id', '=', 2)->get();
                $selectOptionCriteria = Criteria::where('categorie_id', '=', 2)->get();
                $selectOptionParameter1 = Parameter::where('criteria_id', '=', 7)->get();
                $selectOptionParameter2 = Parameter::where('criteria_id', '=', 8)->get();
                $selectOptionParameter3 = Parameter::where('criteria_id', '=', 9)->get();
                $selectOptionParameter4 = Parameter::where('criteria_id', '=', 10)->get();
                $selectOptionParameter5 = Parameter::where('criteria_id', '=', 11)->get();
                $selectOptionParameter6 = Parameter::where('criteria_id', '=', 12)->get();

                return view('layouts.teamAssessment.content.penilaianTeladan.penilaianTeladan_index', compact('timer', 'selectOptionParameter1',
                'selectOptionParameter2', 'selectOptionParameter3', 'selectOptionParameter4', 'selectOptionParameter5', 'selectOptionParameter6'));
            } else {
                $timer                  =   CountdownTimerFormTeladan::first();

                // Option Select Inovation
                $selectOptionCategory = Category::where('id', '=', 2)->get();
                $selectOptionCriteria = Criteria::where('categorie_id', '=', 2)->get();
                $selectOptionParameter1 = Parameter::where('criteria_id', '=', 7)->get();
                $selectOptionParameter2 = Parameter::where('criteria_id', '=', 8)->get();
                $selectOptionParameter3 = Parameter::where('criteria_id', '=', 9)->get();
                $selectOptionParameter4 = Parameter::where('criteria_id', '=', 10)->get();
                $selectOptionParameter5 = Parameter::where('criteria_id', '=', 11)->get();
                $selectOptionParameter6 = Parameter::where('criteria_id', '=', 12)->get();

                // $reward     =   RewardInovation::latest()->get();
                return view('layouts.teamAssessment.content.penilaianTeladan.penilaianTeladan_index', compact('timer', 'selectOptionParameter1',
                'selectOptionParameter2', 'selectOptionParameter3', 'selectOptionParameter4', 'selectOptionParameter5', 'selectOptionParameter6'));
            }
        } catch (\Throwable $th) {
            //throw $th;
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
