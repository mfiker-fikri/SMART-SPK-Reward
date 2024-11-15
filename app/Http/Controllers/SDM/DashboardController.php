<?php

namespace App\Http\Controllers\SDM;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CountdownTimerFormInovation;
use App\Models\CountdownTimerFormTeladan;
use App\Models\Criteria;
use App\Models\FinalResultRewardInovation;
use App\Models\FinalResultRewardTeladan;
use App\Models\Parameter;
use App\Models\TeamAssessment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
            //
            $timerInovasi                  =   CountdownTimerFormInovation::first();
            //
            $timerTeladan                  =   CountdownTimerFormTeladan::first();
            //

            $sumBasedYearInovation         =   FinalResultRewardInovation::where([
                                                //
                                                ['signature_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                                ['verify_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                                //
                                                ['score_final_result', '>', 0.75],
                                            ])
                                            ->latest()
                                            ->orderBy('score_final_result', 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y')"), 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(updated_at, '%Y')"), 'DESC')
                                            ->get();
                                            // ddd($sumBasedYearInovation);

            return view('layouts.sdm.content.dashboard.dashboard_1', compact('timerInovasi', 'timerTeladan'));
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
            //
            $timerInovasi                  =   CountdownTimerFormInovation::first();
            //
            $timerTeladan                  =   CountdownTimerFormTeladan::first();
            //
            return view('layouts.sdm.content.dashboard.dashboard_2', compact('timerInovasi', 'timerTeladan'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // Kepala Kepala Subbagian Penghargaan Disiplin dan Pensiun
    // Kepala Kepala Subbagian Penghargaan Disiplin dan Pensiun
    // Kepala Kepala Subbagian Penghargaan Disiplin dan Pensiun
    // Kepala Kepala Subbagian Penghargaan Disiplin dan Pensiun
    // Kepala Kepala Subbagian Penghargaan Disiplin dan Pensiun
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
            $categories =   Category::count();
            $criterias  =   Criteria::count();
            $parameters =   Parameter::count();

            //
            $timerInovasi                  =   CountdownTimerFormInovation::first();
            //
            $timerTeladan                  =   CountdownTimerFormTeladan::first();


            $sumBasedYearInovation         =   FinalResultRewardInovation::where([
                                                //
                                                // ['signature_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                                // ['verify_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                                //
                                                ['score_final_result', '>', 0.75],
                                            ])
                                            ->select(DB::raw("COUNT(*) as count"), DB::raw("DATE_FORMAT(created_at, '%Y') as year"))
                                            ->latest()
                                            ->orderBy('score_final_result', 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y')"), 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(updated_at, '%Y')"), 'DESC')
                                            ->get();
                                            // ddd($sumBasedYearInovation);
            $labels1  = $sumBasedYearInovation->keys();
            $datas1  = $sumBasedYearInovation->values();

            $sumBasedYearTeladan1         =   FinalResultRewardTeladan::
                                            leftjoin('reward_representative', 'reward_representative.id', '=', 'final_result_reward_representative.reward_representative_id')
                                            ->select(DB::raw('reward_representative.employee_id as REI'), DB::raw("COUNT(*) as count"), DB::raw("DATE_FORMAT(final_result_reward_representative.created_at, '%Y') as year"))
                                            ->distinct('REI')
                                            // ->unique('REI')
                                            // ->latest()
                                            ->orderBy('final_result_reward_representative.score_final_result', 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(final_result_reward_representative.created_at, '%Y')"), 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(final_result_reward_representative.updated_at, '%Y')"), 'DESC')
                                            // ->get();
                                            ->pluck('count', 'year');

            $sumBasedYearTeladan2         =   FinalResultRewardTeladan::
                                            with('resultFinalRepresentatives')
                                            ->where([
                                                //
                                                // ['signature_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                                // ['verify_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                                //
                                                ['score_final_result', '>', 0.75],
                                            ])
                                            ->select(DB::raw("COUNT(*) as count"), DB::raw("DATE_FORMAT(created_at, '%Y') as year"))
                                            ->latest()
                                            ->orderBy('score_final_result', 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y')"), 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(updated_at, '%Y')"), 'DESC')
                                            // ->get();
                                            ->distinct()
                                            ->pluck('count', 'year');

            $sumBasedYearTeladan3         =   FinalResultRewardTeladan::
                                            with('resultFinalRepresentatives')
                                            ->where([
                                                //
                                                // ['signature_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                                // ['verify_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                                //
                                                ['score_final_result', '<', 0.75],
                                            ])
                                            ->select(DB::raw("COUNT(*) as count"), DB::raw("DATE_FORMAT(created_at, '%Y') as year"))
                                            ->latest()
                                            ->orderBy('score_final_result', 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y')"), 'DESC')
                                            ->orderBy(DB::raw("DATE_FORMAT(updated_at, '%Y')"), 'DESC')
                                            // ->get();
                                            ->distinct()
                                            ->pluck('count', 'year');

            $labels1  = $sumBasedYearTeladan1->keys();
            $datas1   = $sumBasedYearTeladan1->values();

            $labels2  = $sumBasedYearTeladan2->keys();
            $datas2   = $sumBasedYearTeladan2->values();

            $labels3  = $sumBasedYearTeladan2->keys();
            $datas3   = $sumBasedYearTeladan3->values();
            // ddd($sumBasedYearTeladan3);

            if ($timerInovasi == null && $timerTeladan == null) {
                return view('layouts.sdm.content.dashboard.dashboard_3',
                compact('categories', 'criterias', 'parameters', 'timerInovasi', 'timerTeladan', 'sumBasedYearInovation', 'labels1', 'datas1', 'sumBasedYearTeladan1', 'labels1', 'datas1', 'sumBasedYearTeladan2', 'labels2', 'datas2', 'sumBasedYearTeladan3', 'labels3', 'datas3'));
            }
            elseif ($timerInovasi != null && $timerTeladan == null) {
                $dateTimeOpenInovasi           =   new Carbon($timerInovasi->date_time_open_form_inovation);

                $dateOpenInovasi                      =   $dateTimeOpenInovasi->toDateString();
                $dateOpenTimeInovasi                  =   $dateTimeOpenInovasi->toDateTimeString();

                $dateTimeExpiredInovasi        =   new Carbon($timerInovasi->date_time_expired_form_inovation);

                $dateExpiredInovasi                   =   $dateTimeExpiredInovasi->toDateString();
                $dateExpiredTimeInovasi               =   $dateTimeExpiredInovasi->toDateTimeString();

                return view('layouts.sdm.content.dashboard.dashboard_3',
                compact('categories', 'criterias', 'parameters', 'timerInovasi', 'timerTeladan', 'sumBasedYearInovation', 'labels1', 'datas1', 'sumBasedYearTeladan1', 'labels1', 'datas1', 'sumBasedYearTeladan2', 'labels2', 'datas2', 'sumBasedYearTeladan3', 'labels3', 'datas3'));
            }
            elseif ($timerInovasi == null && $timerTeladan != null) {
                $dateTimeOpenTeladan           =   new Carbon($timerTeladan->date_time_open_form_teladan);

                $dateOpenTeladan               =   $dateTimeOpenTeladan->toDateString();
                $dateOpenTimeTeladan           =   $dateTimeOpenTeladan->toDateTimeString();

                $dateTimeExpiredTeladan        =   new Carbon($timerTeladan->date_time_expired_form_teladan);

                $dateExpiredTeladan            =   $dateTimeExpiredTeladan->toDateString();
                $dateExpiredTimeTeladan        =   $dateTimeExpiredTeladan->toDateTimeString();

                return view('layouts.sdm.content.dashboard.dashboard_3',
                compact('categories', 'criterias', 'parameters', 'timerInovasi', 'timerTeladan', 'sumBasedYearInovation', 'labels1', 'datas1', 'sumBasedYearTeladan1', 'labels1', 'datas1', 'sumBasedYearTeladan2', 'labels2', 'datas2', 'sumBasedYearTeladan3', 'labels3', 'datas3'));
            }
            elseif ($timerInovasi != null && $timerTeladan != null) {
                $dateTimeOpenInovasi                  =   new Carbon($timerInovasi->date_time_open_form_inovation);

                $dateOpenInovasi                      =   $dateTimeOpenInovasi->toDateString();
                $dateOpenTimeInovasi                  =   $dateTimeOpenInovasi->toDateTimeString();

                $dateTimeExpiredInovasi               =   new Carbon($timerInovasi->date_time_expired_form_inovation);

                $dateExpiredInovasi                   =   $dateTimeExpiredInovasi->toDateString();
                $dateExpiredTimeInovasi               =   $dateTimeExpiredInovasi->toDateTimeString();

                return view('layouts.sdm.content.dashboard.dashboard_3',
                compact('categories', 'criterias', 'parameters', 'timerInovasi', 'timerTeladan', 'sumBasedYearInovation', 'labels1', 'datas1', 'sumBasedYearTeladan1', 'labels1', 'datas1', 'sumBasedYearTeladan2', 'labels2', 'datas2', 'sumBasedYearTeladan3', 'labels3', 'datas3'));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardKepalaSubbagianPenghargaanDisiplindanPensiunStatusOnlineOfflineTA(Request $request)
    {

        try {
            $date = Carbon::now()->format('Y-m-d');
            $data = TeamAssessment::where([
                    // 'last_seen'     =>  $date,
                    // 'last_status'     =>  $date,
                    // 'last_seen'     =>  date_format(from_unixtime($date),),
                    'status_id'     =>  1,
                ])
                ->orderBy('last_seen', 'ASC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '';
                    if (Cache::has('TA-is-online-' . $row->id)) {
                        $status = '<span class="text-success">Online</span>';
                        // return $status;
                    } elseif ($row->last_seen == null) {
                        $status = '<span class="text-secondary">Not Login</span>';
                    } else {
                        $status = '<span class="text-secondary">Offline</span>';
                    }
                    return $status;
                })
                ->addColumn('lastSeen', function ($row) {
                    $status = '';
                    if (Cache::has('TA-is-online-' . $row->id)) {
                        $status = '<span class="text-success">Online</span>';
                        // return $status;
                    } elseif ($row->last_seen == null) {
                        $status = '<span class="text-secondary">Not Login</span>';
                    } else {
                        $status = '<span class="text-secondary">' . \Carbon\Carbon::parse($row->last_seen)->diffForHumans() . '</span>';
                    }
                    return $status;
                })
                ->rawColumns(['status','lastSeen'])
                ->make(true);
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
