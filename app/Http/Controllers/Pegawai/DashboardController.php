<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\CountdownTimerFormTeladan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Pegawai;
use App\Models\RewardInovation;
use App\Models\RewardTeladan;
use Carbon\Carbon;
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
            $dateTimeOpenInovasi           =   new Carbon($timerInovasi->date_time_open_form_inovation);

            $dateOpenInovasi                      =   $dateTimeOpenInovasi->toDateString();
            $dateOpenTimeInovasi                  =   $dateTimeOpenInovasi->toDateTimeString();

            $dateTimeExpiredInovasi        =   new Carbon($timerInovasi->date_time_expired_form_inovation);

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
            $dateTimeOpenInovasi           =   new Carbon($timerInovasi->date_time_open_form_inovation);

            $dateOpenInovasi                      =   $dateTimeOpenInovasi->toDateString();
            $dateOpenTimeInovasi                  =   $dateTimeOpenInovasi->toDateTimeString();

            $dateTimeExpiredInovasi        =   new Carbon($timerInovasi->date_time_expired_form_inovation);

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

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInovationFormData()
    {
        //
        // Get id Employee
        $id                     =   Auth::guard('employees')->user()->id;

        //
        $timer                  =   CountdownTimerFormInovation::first();

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

        $data = RewardInovation::
            where([
                ['created_at', '>=', $dateOpenTime],
                ['created_at', '<=', $dateExpiredTime],
                ['updated_at', '>=', $dateOpenTime],
                ['updated_at', '<=', $dateExpiredTime],
                ['employee_id', '=' ,Auth::guard('employees')->user()->id],
            ])
            ->latest()
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = '';
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
                return $status;
            })
            ->rawColumns(['status'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * waiting
     */
    public function getTeladanFormData()
    {
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
                return $status;
            })
            ->rawColumns(['status'])
            ->make(true);
    }
}
