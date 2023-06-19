<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\CountdownTimerFormTeladan;
use App\Models\FinalResultRewardInovation;
use App\Models\FinalResultRewardTeladan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Pegawai;
use App\Models\RewardInovation;
use App\Models\RewardTeladan;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pegawai.auth');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employees');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        try{
            //
            $pegawai = Pegawai::first();

            //
            $timerInovasi                  =   CountdownTimerFormInovation::first();
            //
            $timerTeladan                  =   CountdownTimerFormTeladan::first();

            if ($timerInovasi == null && $timerTeladan == null) {
                return view('layouts.pegawai.content.dashboard.dashboard', compact('pegawai', 'timerInovasi', 'timerTeladan'));
            }
            elseif ($timerInovasi != null && $timerTeladan == null) {
                $dateTimeOpenInovasi           =   new Carbon($timerInovasi->date_time_open_form_innovation);

                $dateOpenInovasi                      =   $dateTimeOpenInovasi->toDateString();
                $dateOpenTimeInovasi                  =   $dateTimeOpenInovasi->toDateTimeString();

                $dateTimeExpiredInovasi        =   new Carbon($timerInovasi->date_time_expired_form_innovation);

                $dateExpiredInovasi                   =   $dateTimeExpiredInovasi->toDateString();
                $dateExpiredTimeInovasi               =   $dateTimeExpiredInovasi->toDateTimeString();

                return view('layouts.pegawai.content.dashboard.dashboard', compact('pegawai', 'timerInovasi', 'timerTeladan'));
            }
            elseif ($timerInovasi == null && $timerTeladan != null) {
                $dateTimeOpenTeladan           =   new Carbon($timerTeladan->date_time_open_form_teladan);

                $dateOpenTeladan               =   $dateTimeOpenTeladan->toDateString();
                $dateOpenTimeTeladan           =   $dateTimeOpenTeladan->toDateTimeString();

                $dateTimeExpiredTeladan        =   new Carbon($timerTeladan->date_time_expired_form_teladan);

                $dateExpiredTeladan            =   $dateTimeExpiredTeladan->toDateString();
                $dateExpiredTimeTeladan        =   $dateTimeExpiredTeladan->toDateTimeString();

                return view('layouts.pegawai.content.dashboard.dashboard', compact('pegawai', 'timerInovasi', 'timerTeladan'));
            }
            elseif ($timerInovasi != null && $timerTeladan != null) {
                $dateTimeOpenInovasi           =   new Carbon($timerInovasi->date_time_open_form_innovation);

                $dateOpenInovasi                      =   $dateTimeOpenInovasi->toDateString();
                $dateOpenTimeInovasi                  =   $dateTimeOpenInovasi->toDateTimeString();

                $dateTimeExpiredInovasi        =   new Carbon($timerInovasi->date_time_expired_form_innovation);

                $dateExpiredInovasi                   =   $dateTimeExpiredInovasi->toDateString();
                $dateExpiredTimeInovasi               =   $dateTimeExpiredInovasi->toDateTimeString();

                $data = RewardInovation::
                    where([
                        ['created_at', '>=', $dateOpenTimeInovasi],
                        ['created_at', '<=', $dateExpiredTimeInovasi],
                        ['updated_at', '>=', $dateOpenTimeInovasi],
                        ['updated_at', '<=', $dateExpiredTimeInovasi],
                        ['employee_id', '=' ,Auth::guard('employees')->user()->id],
                    ])
                    ->latest()
                    ->get();

                // ddd($data);
                return view('layouts.pegawai.content.dashboard.dashboard', compact('pegawai', 'timerInovasi', 'timerTeladan'));
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
    public function getInovationFormData()
    {
        try{
            //
            // Get id Employee
            $id                     =   Auth::guard('employees')->user()->id;

            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = RewardInovation::
                where([
                    ['created_at', '>=', $dateOpenTime],
                    ['created_at', '<=', $dateExpiredTime],
                    ['updated_at', '>=', $dateOpenTime],
                    ['updated_at', '<=', $dateExpiredTime],
                    ['employee_id', '=', Auth::guard('employees')->user()->id],
                ])
                ->latest()
                ->get();

                // ddd($data);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '';

                    $timer                  =   CountdownTimerFormInovation::first();

                    $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);

                    $dateOpen               =   $dateTimeOpen->toDateString();
                    $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

                    $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);

                    $dateExpired            =   $dateTimeExpired->toDateString();
                    $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

                    // 0=ditolak
                    if (
                        ($row->created_at >= $dateOpenTime && $row->created_at <= $dateExpiredTime) ||
                        ($row->updated_at >= $dateOpenTime && $row->updated_at <= $dateExpiredTime)
                        ) {
                        if($row->status_process == 0) {
                            $status = '<span>Ditolak</span>';
                        }
                        // 0=dikembalikan
                        if($row->status_process == 1) {
                            $status = '<span>Dikembalikan</span>';
                        }
                        // 2=menunggu
                        if($row->status_process == 2) {
                            $status = '<span>Sedang Tahap Menunggu</span>';
                        }
                        if($row->status_process == 3) {
                            $status = '<span>Diterima</span>';
                        }
                    }
                    if (
                        (Carbon::now()->toDateTimeString() > $dateExpiredTime)
                        ) {
                        $status = 'Tunggu Waktu Pembukaan';
                    }
                    return $status;
                })
                ->rawColumns(['status'])
                ->make(true);

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * waiting
     */
    public function getTeladanFormData()
    {
        try {
            // Get id Employee
            $id                     =   Auth::guard('employees')->user()->id;

            //
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_teladan);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_teladan);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();


            $data = RewardTeladan::
                where([
                    ['created_at', '>=', $dateOpenTime],
                    ['created_at', '<=', $dateExpiredTime],
                    ['updated_at', '>=', $dateOpenTime],
                    ['updated_at', '<=', $dateExpiredTime],
                    ['employee_id', '=', Auth::guard('employees')->user()->id],
                ])
                ->latest()
                ->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '';

                    $timer                  =   CountdownTimerFormInovation::first();

                    $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);

                    $dateOpen               =   $dateTimeOpen->toDateString();
                    $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

                    $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);

                    $dateExpired            =   $dateTimeExpired->toDateString();
                    $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

                    if (
                        ($row->created_at >= $dateOpenTime && $row->created_at <= $dateExpiredTime) ||
                        ($row->updated_at >= $dateOpenTime && $row->updated_at <= $dateExpiredTime)
                        )
                        {
                            // 0=ditolak
                            if($row->status_process == 0) {
                                $status = '<span>Ditolak</span>';
                            }
                            // 0=dikembalikan
                            if($row->status_process == 1) {
                                $status = '<span>Dikembalikan</span>';
                            }
                            // 2=menunggu
                            if($row->status_process == 2) {
                                $status = '<span>Sedang Tahap Menunggu</span>';
                            }

                    }
                    if (
                        (Carbon::now()->toDateTimeString() > $dateExpiredTime)
                        ) {
                        $status = 'Tunggu Waktu Pembukaan';
                    }
                    return $status;
                })
                ->rawColumns(['status'])
                ->make(true);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * waiting
     */
    public function getDashboardRewardInovationData()
    {
        try {
            // Get id Employee
            $id                     =   Auth::guard('employees')->user()->id;

            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_signature_human_resource_1);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_signature_human_resource_1);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();


            $data = FinalResultRewardInovation::
                leftJoin('reward_innovation', 'final_result_reward_innovation.reward_innovation_id', '=', 'reward_innovation.id')
                ->select(
                    'final_result_reward_innovation.id',
                    'final_result_reward_innovation.score_final_result',
                    'final_result_reward_innovation.score_final_result_description',
                    'final_result_reward_innovation.created_at',
                    'final_result_reward_innovation.updated_at',
                    'final_result_reward_innovation.reward_innovation_id',
                    'final_result_reward_innovation.verify_head_of_the_human_resources_bureau'
                    //
                    // 'reward_representative.upload_file_short_description',
                    // 'reward_representative.upload_file_image_support',
                    // 'reward_representative.upload_file_video_support',
                )
                ->where([
                    // ['created_at', '>=', $dateOpenTime],
                    // ['created_at', '<=', $dateExpiredTime],
                    // ['updated_at', '>=', $dateOpenTime],
                    // ['updated_at', '<=', $dateExpiredTime],
                    ['final_result_reward_innovation.created_at', '>=', $dateExpiredTime],
                    ['final_result_reward_innovation.updated_at', '>=', $dateExpiredTime],
                    ['final_result_reward_innovation.verify_head_of_the_human_resources_bureau', '!=', null],
                    ['reward_innovation.employee_id', '=', $id],
                ])
                ->latest()
                ->get();


            return DataTables::of($data)
                // ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '';

                    $timer                  =   CountdownTimerFormInovation::first();

                    $dateTimeOpen           =   new Carbon($timer->date_time_open_signature_human_resource_1);

                    $dateOpen               =   $dateTimeOpen->toDateString();
                    $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

                    $dateTimeExpired        =   new Carbon($timer->date_time_expired_signature_human_resource_1);

                    $dateExpired            =   $dateTimeExpired->toDateString();
                    $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

                    if ($dateOpenTime != null && $dateExpiredTime != null) {
                        if (Carbon::now()->toDateTimeString() > $dateExpiredTime) {
                            if($row->score_final_result > 0.75 && $row->score_final_result <= 0.85) {
                                $status = '<span>Dapat Penghargaan (Baik)</span>';
                            }
                            if($row->score_final_result > 0.85 && $row->score_final_result <= 1.00) {
                                $status = '<span>Dapat Penghargaan (Terbaik)</span>';
                            }
                        }
                    }
                    if ($dateOpenTime == null && $dateExpiredTime == null) {
                        $status = '<span>Tunggu Jadwal Waktu Pemberian Tanda Tangan SDM</span>';
                    }
                    return $status;
                })
                ->rawColumns(['status'])
                ->make(true);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * waiting
     */
    public function getDashboardRewardRepresentativeData()
    {
        try {
            // Get id Employee
            $id                     =   Auth::guard('employees')->user()->id;

            //
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_signature_human_resource_1);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_signature_human_resource_1);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = FinalResultRewardTeladan::
                leftJoin('reward_representative', 'final_result_reward_representative.reward_representative_id', '=', 'reward_representative.id')
                ->select(
                    'final_result_reward_representative.id',
                    'final_result_reward_representative.score_final_result',
                    'final_result_reward_representative.score_final_result_description',
                    'final_result_reward_representative.created_at',
                    'final_result_reward_representative.updated_at',
                    'final_result_reward_representative.reward_representative_id',
                    'final_result_reward_representative.verify_head_of_the_human_resources_bureau'
                    //
                    // 'reward_representative.upload_file_short_description',
                    // 'reward_representative.upload_file_image_support',
                    // 'reward_representative.upload_file_video_support',
                )
                ->where([
                    ['final_result_reward_representative.created_at', '>=', $dateExpiredTime],
                    ['final_result_reward_representative.updated_at', '>=', $dateExpiredTime],
                    ['final_result_reward_representative.verify_head_of_the_human_resources_bureau', '!=', null],
                    ['reward_representative.employee_id', '=', $id],
                ])
                ->latest()
                ->get();


            return DataTables::of($data)
                // ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '';
                    if($row->score_final_result > 0.75 && $row->score_final_result <= 0.85) {
                        $status = '<span>Dapat Penghargaan (Baik)</span>';
                    }
                    if($row->score_final_result > 0.85 && $row->score_final_result <= 1.00) {
                        $status = '<span>Dapat Penghargaan (Terbaik)</span>';
                    }
                    return $status;
                })
                ->rawColumns(['status'])
                ->make(true);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


}
