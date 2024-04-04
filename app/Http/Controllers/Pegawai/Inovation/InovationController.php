<?php

namespace App\Http\Controllers\Pegawai\Inovation;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\HeadWorkUnit;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Pegawai;
use App\Models\RewardInovation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class InovationController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInovationFormList()
    {
        //
        try {
            $id = Auth::guard('employees')->user()->id;
            // ddd($id);
            // Search id
            // $rewardInovation            =       RewardInovation::
            // where([
            //     // 'employee_id', '=', $id,
            //     'status_process', '=', '2',
            // ])
            // // ->where(['status_process', '=', 2,])
            // ->latest()
            // ->get();
            // ddd($rewardInovation);

            // Get Timer Countdown
            $timer                  =   CountdownTimerFormInovation::first();

            // If Timer Not Null
            if ($timer != null) {
                // ddd($timer);
                // ddd($timer->date_time_open_form_innovation);

                // Get Timer Countdown
                $timer                  =   CountdownTimerFormInovation::first();

                $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
                // ddd($dateTimeOpen);
                $dateOpen               =   $dateTimeOpen->toDateString();
                $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
                // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

                $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
                // ddd($dateTimeExpired);
                $dateExpired            =   $dateTimeExpired->toDateString();
                $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

                // Get id Employee
                $id                         =       Auth::guard('employees')->user()->id;
                // ddd($id);

                $rewardInovation = RewardInovation::where([
                            'employee_id' => $id,
                        ])
                        ->where(['status_process' => 2])
                        ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                        ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                        ->latest();

                // 0=Reject
                $rewardInovationReject = RewardInovation::where([
                            'employee_id' => $id,
                        ])
                        ->where(['status_process' => 0])
                        ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                        ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                        ->latest();

                // 1=Back
                $rewardInovationBack = RewardInovation::where([
                            'employee_id' => $id,
                        ])
                        ->where(['status_process' => 1])
                        ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                        ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                        ->latest();

                // 3=Process
                $rewardInovationProcess = RewardInovation::where([
                            'employee_id' => $id,
                        ])
                        ->where(['status_process' => 3])
                        ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                        ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                        ->latest();

                // Button Create
                $rewardInovationCreate = RewardInovation::
                    where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['employee_id', '=', Auth::guard('employees')->user()->id],
                        // ['status_process', '!=', 0],
                        // ['status_process', '=', 1],
                        // ['status_process', '=', 2],
                    ])
                    // ->orWhere(['status_process' => 1])
                    // ->orWhere(['status_process' => 2])
                    // ->orWhere(['status_process' => 3])
                    ->where(function ($query) {
                        $query->where('status_process', 'LIKE', 1)
                            ->orWhere('status_process', 'LIKE', 2)
                            ->orWhere('status_process', 'LIKE', 3);
                    })
                    ->latest()
                    // ->first();
                    ->get();
                // ddd($rewardInovationCreate);

                // Button Create Reject
                $rewardInovationCreateReject = RewardInovation::
                    where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['employee_id', '=', Auth::guard('employees')->user()->id],
                        // ['status_process', '=', 0],
                        // ['status_process', '!=', 1],
                        // ['status_process', '!=', 2],
                    ])
                    // ->orWhere(['status_process' => 0])
                    ->where(function ($query) {
                        $query->where('status_process', 'LIKE', 0);
                    })
                    ->latest()
                    // ->first();
                    ->get();
                // ddd($rewardInovationCreateReject);

                // Button Accept
                $rewardInovationAccept = RewardInovation::
                    where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['employee_id', '==', Auth::guard('employees')->user()->id],
                    ])
                    ->orWhere(['status_process' => 3])
                    ->latest()
                    ->get();

                // Button Create Null
                $rewardInovationCreateNull = RewardInovation::
                    where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['employee_id', '==', Auth::guard('employees')->user()->id],
                        ['status_process', '==', null],
                        // ['status_process', '!=', 1],
                        // ['status_process', '!=', 2],
                        // ['status_process', '!=', 3],
                    ])
                    // ->whereNull('status_process')
                    ->latest()
                    ->first();

                    // ddd($rewardInovationCreateNull);

                    return view('layouts.pegawai.content.inovation.inovation_index', compact('timer', 'rewardInovation', 'rewardInovationReject', 'rewardInovationBack', 'rewardInovationProcess', 'rewardInovationCreateReject', 'rewardInovationCreate', 'rewardInovationCreateNull', 'rewardInovationAccept'));

            } elseif($timer == null) {
                // Get Timer Countdown
                $timer                  =   CountdownTimerFormInovation::first();

                return view('layouts.pegawai.content.inovation.inovation_index', compact('timer'));
            }

        } catch (\Exception $exception) {
            return $exception;
        }
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Reject
     */
    public function getInovationFormDataReject()
    {
        // Get id Employee
        $id                         =       Auth::guard('employees')->user()->id;

        //
        $timer                  =   CountdownTimerFormInovation::first();
        // ddd($timer->date_time_open_form_innovation);

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
        // ddd($dateTimeOpen);
        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
        // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
        // ddd($dateTimeExpired);
        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

        $data = RewardInovation::where([
                ['created_at', '>=', $dateOpenTime],
                ['created_at', '<=', $dateExpiredTime],
                ['updated_at', '>=', $dateOpenTime],
                ['updated_at', '<=', $dateExpiredTime],
                ['employee_id', '=', Auth::guard('employees')->user()->id],
                ['status_process', '=', 0],
            ])
            ->latest()
            ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = '';
                // 0=ditolak
                if($row->status_process == 0) {
                    $status = '<span>Ditolak</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 0=ditolak
                if ($row->status_process == 0) {
                    $actionBtn =
                    '
                        <span>Ditolak</span>
                    ';
                }

                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Back
     */
    public function getInovationFormDataBack()
    {
        // Get id Employee
        $id                         =       Auth::guard('employees')->user()->id;

        //
        $timer                  =   CountdownTimerFormInovation::first();
        // ddd($timer->date_time_open_form_innovation);

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
        // ddd($dateTimeOpen);
        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
        // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
        // ddd($dateTimeExpired);
        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

        $data = RewardInovation::where([
                ['created_at', '>=', $dateOpenTime],
                ['created_at', '<=', $dateExpiredTime],
                ['updated_at', '>=', $dateOpenTime],
                ['updated_at', '<=', $dateExpiredTime],
                ['employee_id', '=', Auth::guard('employees')->user()->id],
                ['status_process', '=', 1],
            ])
            ->latest()
            ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = '';
                // 0=dikembalikan
                if($row->status_process == 1) {
                    $status = '<span>Dikembalikan</span>';
                }
                if($row->status_process == 3) {
                    $status = '<span>Disetujui</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 0=dikembalikan
                if ($row->status_process == 1) {
                    $actionBtn =
                    '
                        <a href="' . route('pegawai.getInovationIdView.View.Pegawai', $row->id) . '"  class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-eye mx-auto me-1"></i> Lihat
                        </a>
                        <a href="' . route('pegawai.getInovationIdUpdate.Update.Pegawai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                    ';
                }

                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * waiting
     */
    public function getInovationFormData()
    {
        //
        // Get id Employee
        $id                         =       Auth::guard('employees')->user()->id;
        // Search id
        // $rewardInovation            =       RewardInovation::where('employee_id', '=', $id)->first();
        // ddd($rewardInovation);
        //
        //
        $timer                  =   CountdownTimerFormInovation::first();
        // ddd($timer->date_time_open_form_innovation);

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
        // ddd($dateTimeOpen);
        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
        // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
        // ddd($dateTimeExpired);
        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

        // $data = RewardInovation::where([
        //         'employee_id' => $id
        //     ])
        //     ->where(['status_process' => 2])
        //     // ->where(['status_process' => 0])
        //     // ->orWhere(['status_process' => 1])
        //     // ->orWhere(['status_process' => 2])
        //     // ->orWhere(['status_process' => 3])
        //     ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
        //     ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
        //     // ->orWhere(['created_at', '>=', $dateOpenTime])
        //     // ->orWhere(['created_at', '<=', $dateExpiredTime])
        //     // ->orWhere(['updated_at', '>=', $dateOpenTime])
        //     // ->orWhere(['updated_at', '<=', $dateExpiredTime])
        //     ->first();
        //     // ->get();

        $data = RewardInovation::
            where([
                ['created_at', '>=', $dateOpenTime],
                ['created_at', '<=', $dateExpiredTime],
                ['updated_at', '>=', $dateOpenTime],
                ['updated_at', '<=', $dateExpiredTime],
                ['employee_id', '=', Auth::guard('employees')->user()->id],
                ['status_process', '=', 2],
            ])
            ->latest()
            ->get();
            // ddd($data);
        // $id    =   Auth::guard('head_work_units')->user()->id;
        // $cache =   Cache::has('head_work_units-is-online-' . $id);
        // ddd($id);


        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = '';
                // 2=menunggu
                if($row->status_process == 2) {
                    $status = '<span>Sedang Tahap Menunggu</span>';
                }
                if($row->status_process == 3) {
                    $status = '<span>Disetujui</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 2=menunggu
                if($row->status_process == 2) {
                    if (Auth::guard('head_work_units')->check()) {
                        if (Cache::has('head_work_units-is-online-' . Auth::guard('head_work_units')->user()->id)) {
                            $actionBtn = '<span class="text-success">Online</span>';
                        }
                    } else {
                        $actionBtn =
                        '
                            <a href="' . route('pegawai.getInovationIdView.View.Pegawai', $row->id) . '"  class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                                <i class="fa-solid fa-eye mx-auto me-1"></i> Lihat
                            </a>
                            <a href="' . route('pegawai.getInovationIdUpdate.Update.Pegawai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                                <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                            </a>
                            <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteFormInovationId" data-id="' . $row->id . '">
                                <i class="fa-solid fa-trash-can mx-auto me-1"></i> Hapus
                            </a>
                        ';
                    }

                    // $actionBtn =
                    // '
                    //     <a href="' . route('pegawai.getInovationIdUpdate.Update.Pegawai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                    //         <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                    //     </a>
                    //     <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteFormInovationId" data-id="' . $row->id . '">
                    //         <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                    //     </a>
                    // ';
                }
                // 3=diproses
                elseif ($row->status_process == 3) {
                    $actionBtn =
                    '
                        <span>Sedang Tahap Di Proses</span>
                    ';
                }

                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Process
     */
    public function getInovationFormDataProcess()
    {
        //
        // Get id Employee
        $id                     =   Auth::guard('employees')->user()->id;

        //
        $timer                  =   CountdownTimerFormInovation::first();
        // ddd($timer->date_time_open_form_innovation);

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
        // ddd($dateTimeOpen);
        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
        // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
        // ddd($dateTimeExpired);
        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

        $data = RewardInovation::
            where([
                ['created_at', '>=', $dateOpenTime],
                ['created_at', '<=', $dateExpiredTime],
                ['updated_at', '>=', $dateOpenTime],
                ['updated_at', '<=', $dateExpiredTime],
                ['employee_id', '=' , Auth::guard('employees')->user()->id],
                ['status_process', '=', 3],
            ])
            ->latest()
            ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = '';
                // =menunggu
                if($row->status_process == 2) {
                    $status = '<span>Sedang Tahap Menunggu</span>';
                }
                if($row->status_process == 3) {
                    $status = '<span>Disetujui</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 2=menunggu
                if($row->status_process == 2) {
                    $actionBtn =
                    '
                        <a href="' . route('pegawai.getInovationIdView.View.Pegawai', $row->id) . '"  class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                                <i class="fa-solid fa-eye mx-auto me-1"></i> Lihat
                            </a>
                        <a href="' . route('pegawai.getInovationIdUpdate.Update.Pegawai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                        <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteFormInovationId" data-id="' . $row->id . '">
                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Hapus
                        </a>
                    ';
                }
                // 3=diproses
                elseif ($row->status_process == 3) {
                    $actionBtn =
                    '
                        <span>Sedang Tahap Di Proses</span>
                    ';
                }

                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInovationFormCreate()
    {
        //
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();
            // ddd($timer->date_time_open_form_innovation);

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
            // ddd($dateTimeOpen);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
            // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
            // ddd($dateTimeExpired);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();
            // ddd(Carbon::now()->toDateTimeString() <= $dateExpiredTime);

            // ddd($timer->date_time_open_form_innovation >= Carbon::now() && Carbon::now() <= $timer->date_time_expired_form_innovation);

            // Button Create Reject
            $rewardInovationCreateReject = RewardInovation::
            where([
                ['created_at', '>=', $dateOpenTime],
                ['created_at', '<=', $dateExpiredTime],
                ['updated_at', '>=', $dateOpenTime],
                ['updated_at', '<=', $dateExpiredTime],
                ['employee_id', '=', Auth::guard('employees')->user()->id],
                // ['status_process', '=', 0],
                // ['status_process', '!=', 1],
                // ['status_process', '!=', 2],
            ])
            // ->orWhere(['status_process' => 0])
            ->where(function ($query) {
                $query->where('status_process', 'LIKE', 0);
            })
            ->latest()
            // ->first();
            ->get();

            // Button Create
            $rewardInovationCreate = RewardInovation::
            where([
                ['created_at', '>=', $dateOpenTime],
                ['created_at', '<=', $dateExpiredTime],
                ['updated_at', '>=', $dateOpenTime],
                ['updated_at', '<=', $dateExpiredTime],
                ['employee_id', '=', Auth::guard('employees')->user()->id],
                // ['status_process', '!=', 0],
                // ['status_process', '=', 1],
                // ['status_process', '=', 2],
            ])
            // ->orWhere(['status_process' => 1])
            // ->orWhere(['status_process' => 2])
            // ->orWhere(['status_process' => 3])
            ->where(function ($query) {
                $query->where('status_process', 'LIKE', 1)
                    ->orWhere('status_process', 'LIKE', 2)
                    ->orWhere('status_process', 'LIKE', 3);
            })
            ->latest()
            // ->first();
            ->get();

            // return view('layouts.pegawai.content.inovation.inovation_create');
            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {
                if ($rewardInovationCreateReject->isNotEmpty() || $rewardInovationCreate->isEmpty()) {
                    return view('layouts.pegawai.content.inovation.inovation_create', compact('timer'));
                }
            }
            return redirect()->back();

        } catch (\Throwable $th) {
            throw $th;
        }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postInovationFormCreate(Request $request)
    {
        // Check Data
        if (Auth::guard('employees')->user()->nip === null || Auth::guard('employees')->user()->pendidikan_terakhir === null ||
            Auth::guard('employees')->user()->pangkat === null || Auth::guard('employees')->user()->golongan_ruang === null ||
            Auth::guard('employees')->user()->sk_cpns === null || Auth::guard('employees')->user()->jabatan_terakhir === null ||
            Auth::guard('employees')->user()->unit_kerja === null
        ) {
            // ddd('sukses');
            alert()->error('Gagal Upload Berkas Inovasi!', 'Lengkapi Data Akun Terlebih Dahulu di Halaman "Data Diri"!')->autoclose(25000);
            return redirect()->back()->with('message-failed-form-inovation', 'Gagal Update Berkas Inovasi. Lengkapi Data Akun Terlebih Dahulu di Halaman "Data Diri"!');
        }

        // Get Timer
        $timer                  =   CountdownTimerFormInovation::first();
        // ddd($timer->date_time_open_form_innovation);

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
        // ddd($dateTimeOpen);
        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
        // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
        // ddd($dateTimeExpired);
        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();
        // ddd(Carbon::now()->toDateTimeString() <= $dateExpiredTime);

        // ddd(Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime);

        if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {
            // Data Validation
            $validate = Validator::make(
                $request->all(),
                [
                    'uploadFile'                            =>      'required|mimes:pdf|max:3072',
                    'uploadPhoto'                           =>      'required|image|mimes:jpg,jpeg,png|max:5120',
                    'uploadVideo'                           =>      'required|mimes:flv,mp4,3gp,mov,avi,wmv|max:1024000',
                ],
                [
                    'uploadFile.required'                   =>      'File Wajib Diupload!',
                    'uploadPhoto.required'                  =>      'Foto Wajib Diupload!',
                    'uploadVideo.required'                  =>      'Video Wajib Diupload!',
                    //
                    'uploadFile.mimes'                      =>      'Extension File Harus Berupa pdf!',
                    'uploadPhoto.mimes'                     =>      'Extension Foto Harus Berupa jpg / jpeg / png!',
                    'uploadVideo.mimes'                     =>      'Extension Video Harus Berupa flv / jpeg, png!',
                    //
                    'uploadPhoto.image'                     =>      'Diupload Harus Berupa Foto!',
                    //
                    'uploadFile.max'                        =>      'Maksimal Upload File 3Mb (3072 Kb)!',
                    'uploadPhoto.max'                       =>      'Maksimal Upload Foto 5Mb (5120 Kb)!',
                    'uploadVideo.max'                       =>      'Maksimal Upload Video 1Gb (1024000 Kb)!',
                ]
            );

            // Check Validation Failed
            if ($validate->fails()) {
                alert()->error('Gagal Upload Berkas Inovasi!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-failed-form-inovation', 'Gagal Upload Berkas Inovasi')->withErrors($validate)->withInput($request->all());
            }

            // $id                         =       Auth::guard('employees')->user()->id;
            // $employee                   =       Pegawai::find($id);

            // if (
            //     $employee->nip == null && $employee->pendidikan == null && $employee->pangkat == null &&
            //     $employee->gol == null && $employee->gol == null
            // ) {
            //     alert()->error('Gagal Upload Berkas Inovasi!', 'Harap Isi Biodata Secara Lengkap Di Menu Profile')->autoclose(25000);
            //     return redirect()->back();
            // }

            // Jika Ada Upload
            if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
                // // Get id Employee
                // $id                         =       Auth::guard('employees')->user()->id;
                // // Search id
                // $rewardInovation            =       RewardInovation::where('employee_id', '=', $id)->get();
                // Jika Ada File,Foto, dan video Sebelumnya
                if ($request->oldFile && $request->oldPhoto && $request->oldVideo) {
                    // Delete File Before Previous
                    // Storage::delete($request->oldFile);
                    // Delete Photo Before Previous
                    // Storage::delete($request->oldPhoto);
                    // Delete Video Before Previous
                    // Storage::delete($request->oldVideo);

                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;

                    // $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);

                    $file   =   storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $request->oldFile;
                    $photo  =   storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $request->oldPhoto;
                    $video  =   storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $request->oldVideo;

                    if (file_exists($file) && file_exists($photo) && file_exists($video)) {
                        unlink($file);
                        unlink($photo);
                        unlink($video);
                    }


                    // Get File
                    $file                       =       $request->file('uploadFile');
                    // Get Photo
                    $photo                      =       $request->file('uploadPhoto');
                    // Get Video
                    $video                      =       $request->file('uploadVideo');

                    // Get Original Extension
                    $fileExtension              =       $file->getClientOriginalExtension();
                    // Get Original Extension
                    $photoExtension             =       $photo->getClientOriginalExtension();
                    // Get Original Extension
                    $videoExtension             =       $video->getClientOriginalExtension();

                    // Get Id Auth Employee
                    $id                         =       Auth::guard('employees')->user()->id;

                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;

                    // File Name
                    $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;
                    // Photo Name
                    $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;
                    // Video Name
                    $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                    // Save Folder
                    // $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                    // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                    // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

                    $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);
                    $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);
                    $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);


                    // Find Auth Employee Active storage_path($folder)
                    $id                         =       Auth::guard('employees')->user()->id;
                    // $employee                   =       Pegawai::find($id);
                    // ddd($id);

                    // Save Upload To Database
                    $rewardInovation = RewardInovation::create([
                        'id'                            =>  Str::uuid(),
                        'upload_file_short_description' =>  $fileName,
                        'upload_file_image_support'     =>  $photoName,
                        'upload_file_video_support'     =>  $videoName,
                        'employee_id'                   =>  $id,

                    ]);

                    if ($rewardInovation) {
                        alert()->success('Berhasil Upload Berkas Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Upload Berkas Penghargaan Inovasi');
                    } else {
                        alert()->error('Gagal Upload Berkas Penghargaan Inovasi!', 'Upload Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-failed-form-inovation', 'Gagal Upload Berkas Penghargaan Inovasi');
                    }
                }

                // Get File
                $file                       =       $request->file('uploadFile');
                // Get Photo
                $photo                      =       $request->file('uploadPhoto');
                // Get Video
                $video                      =       $request->file('uploadVideo');

                // Get Original Extension
                $fileExtension              =       $file->getClientOriginalExtension();
                // Get Original Extension
                $photoExtension             =       $photo->getClientOriginalExtension();
                // Get Original Extension
                $videoExtension             =       $video->getClientOriginalExtension();

                // Get Id Auth Employee
                $id                         =       Auth::guard('employees')->user()->id;

                // Get Employee Username
                $employee                   =       Auth::guard('employees')->user()->username;

                // File Name
                $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;
                // Photo Name
                $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;
                // Video Name
                $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                // Save Folder
                // $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

                $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);
                $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);
                $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);


                // Find Auth Employee Active storage_path($folder)
                $id                         =       Auth::guard('employees')->user()->id;
                // $employee                   =       Pegawai::find($id);
                // ddd($id);

                // Save Upload To Database
                $rewardInovation = RewardInovation::create([
                    'id'                            =>  Str::uuid(),
                    'upload_file_short_description' =>  $fileName,
                    'upload_file_image_support'     =>  $photoName,
                    'upload_file_video_support'     =>  $videoName,
                    'employee_id'                   =>  $id,

                ]);

                // ddd($rewardInovation);

                if ($rewardInovation) {
                    alert()->success('Berhasil Upload Berkas Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Upload Berkas Penghargaan Inovasi');
                } else {
                    alert()->error('Gagal Upload Berkas Penghargaan Inovasi!', 'Upload Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-failed-form-inovation', 'Gagal Upload Berkas Penghargaan Inovasi');
                }
            }
        }

        alert()->error('Gagal Upload Berkas Inovasi!', 'Formulir Inovasi Sudah Ditutup')->autoclose(25000);
        return redirect()->back()->with('message-failed-form-inovation', 'Gagal Upload Berkas Inovasi')->withErrors($validate)->withInput($request->all());

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
    public function getInovationIdView($id)
    {
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();
            // ddd($timer->date_time_open_form_innovation);

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
            // ddd($dateTimeOpen);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
            // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
            // ddd($dateTimeExpired);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();
            // ddd(Carbon::now()->toDateTimeString() <= $dateExpiredTime);

            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {
                // Find id Reward
                $id_employee        =    Auth::guard('employees')->user()->id;
                $rewardInovation    =    RewardInovation::where([
                    'id' => $id,
                    'employee_id' => $id_employee
                    ])->first();
                // ddd($rewardInovation);
                return view('layouts.pegawai.content.inovation.inovation_view',compact('rewardInovation', 'timer'));
            }
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getInovationIdUpdate($id)
    {
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();
            // ddd($timer->date_time_open_form_innovation);

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
            // ddd($dateTimeOpen);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
            // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
            // ddd($dateTimeExpired);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();
            // ddd(Carbon::now()->toDateTimeString() <= $dateExpiredTime);

            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {
                // Find id Reward
                $id_employee        =    Auth::guard('employees')->user()->id;
                $rewardInovation    =    RewardInovation::where([
                    'id' => $id,
                    'employee_id' => $id_employee
                    ])->first();
                // ddd($rewardInovation);
                return view('layouts.pegawai.content.inovation.inovation_update',compact('rewardInovation', 'timer'));
            }
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postInovationIdUpdate(Request $request, $id)
    {
        //
        $timer                  =   CountdownTimerFormInovation::first();
        // ddd($timer->date_time_open_form_innovation);

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_innovation);
        // ddd($dateTimeOpen);
        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
        // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_innovation);
        // ddd($dateTimeExpired);
        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();
        // ddd(Carbon::now()->toDateTimeString() <= $dateExpiredTime);

        if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {

            // Find id Reward
            $rewardInovation            =       RewardInovation::find($id);

            if($rewardInovation) {
                $validate = null;

                // Jika upload sama
                if($request['uploadFileUpdate'] === $rewardInovation->upload_file_short_description || $request['uploadPhotoUpdate'] === $rewardInovation->upload_file_image_support || $request['uploadVideoUpdate'] === $rewardInovation->upload_file_video_support)
                {
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'uploadFile'                                  =>      'mimes:pdf|max:3072',
                            // 'uploadFileUpdate'                            =>      'required',
                            'uploadPhoto'                                 =>      'mimes:jpg,jpeg,png|image|max:5120',
                            // 'uploadPhotoUpdate'                           =>      'required',
                            'uploadVideo'                                 =>      'mimes:flv,mp4,3gp,mov,avi,wmv|max:1024000',
                            // 'uploadVideoUpdate'                           =>      'required'
                        ],
                        [
                            // 'uploadFileUpdate.required'                   =>      'File Wajib Diupload!',
                            // 'uploadPhotoUpdate.required'                  =>      'Foto Wajib Diupload!',
                            // 'uploadVideoUpdate.required'                  =>      'Video Wajib Diupload!',
                            //
                            'uploadFile.mimes'                            =>      'Extension File Harus Berupa pdf!',
                            'uploadPhoto.mimes'                           =>      'Extension Foto Harus Berupa jpg / jpeg / png!',
                            'uploadVideo.mimes'                           =>      'Extension Video Harus Berupa flv / mp4 / 3gp / mov / avi / wmv!',
                            //
                            'uploadPhoto.image'                           =>      'Diupload Harus Berupa Foto!',
                            //
                            'uploadFile.max'                              =>      'Maksimal Upload File 3Mb (3072 Kb)!',
                            'uploadPhoto.max'                             =>      'Maksimal Upload Foto 5Mb (5120 Kb)!',
                            'uploadVideo.max'                             =>      'Maksimal Upload Video 1Gb (1024000 Kb)!',
                        ]
                    );
                } else
                {
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'uploadFile'                                  =>      'mimes:pdf|max:3072',
                            'uploadFileUpdate'                            =>      'required',
                            'uploadPhoto'                                 =>      'mimes:jpg,jpeg,png|image|max:5120',
                            'uploadPhotoUpdate'                           =>      'required',
                            'uploadVideo'                                 =>      'mimes:flv,mp4,3gp,mov,avi,wmv|max:1024000',
                            'uploadVideoUpdate'                           =>      'required'
                        ],
                        [
                            'uploadFileUpdate.required'                   =>      'File Wajib Diupload!',
                            'uploadPhotoUpdate.required'                  =>      'Foto Wajib Diupload!',
                            'uploadVideoUpdate.required'                  =>      'Video Wajib Diupload!',
                            //
                            'uploadFile.mimes'                            =>      'Extension File Harus Berupa pdf!',
                            'uploadPhoto.mimes'                           =>      'Extension Foto Harus Berupa jpg / jpeg / png!',
                            'uploadVideo.mimes'                           =>      'Extension Video Harus Berupa flv / mp4 / 3gp / mov / avi / wmv!',
                            //
                            'uploadPhoto.image'                           =>      'Diupload Harus Berupa Foto!',
                            //
                            'uploadFile.max'                              =>      'Maksimal Upload File 3Mb (3072 Kb)!',
                            'uploadPhoto.max'                             =>      'Maksimal Upload Foto 5Mb (5120 Kb)!',
                            'uploadVideo.max'                             =>      'Maksimal Upload Video 1Gb (1024000 Kb)!',
                        ]
                    );
                }

                //
                if ($validate->fails()) {
                    alert()->error('Gagal Update Berkas Inovasi!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-form-inovation-error', 'Gagal Update Berkas Inovasi')->withErrors($validate)->withInput($request->all());
                }

                if ($request['status_process'] === '1') {
                    //  1. Jika Diganti File
                    if ($request->hasFile('uploadFile')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link                       =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;

                        // Delete File
                        if (file_exists($link)) {
                            unlink($link);
                            $rewardInovation->update(['upload_file_short_description' => '']);
                        }

                        // Get File
                        $file                       =       $request->file('uploadFile');

                        // Get Original Extension
                        $fileExtension              =       $file->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // File Name
                        $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;

                        // Save Folder
                        // $file->storeAs('app/public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);

                        // Update Database File
                        $rewardInovation->upload_file_short_description     =   $fileName;
                        $rewardInovation->status_process                    =   '2';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 2. Jika Diganti Image
                    if ($request->hasFile('uploadPhoto')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link                       =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;

                        // Delete Image
                        if (file_exists($link)) {
                            unlink($link);
                            $rewardInovation->update(['upload_file_image_support' => '']);
                        }

                        // Get Image
                        $photo                      =       $request->file('uploadPhoto');

                        // Get Original Extension
                        $photoExtension             =       $photo->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Image Name
                        $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;

                        // Save Folder
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);

                        // Update Database Image
                        $rewardInovation->upload_file_image_support         =   $photoName;
                        $rewardInovation->status_process                    =   '2';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 3. Jika Diganti Video
                    if ($request->hasFile('uploadVideo')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link                       =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

                        // Delete Video
                        if (file_exists($link)) {
                            unlink($link);
                            $rewardInovation->update(['upload_file_video_support' => '']);
                        }

                        // Get Video
                        $video                      =       $request->file('uploadVideo');

                        // Get Original Extension
                        $videoExtension             =       $video->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Video Name
                        $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                        // Save Folder
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);

                        // Update Database Video
                        $rewardInovation->upload_file_video_support     =   $videoName;
                        $rewardInovation->status_process                =   '2';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }


                    // 4. Jika Diganti File dan Image
                    if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;
                        $link2                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;

                        // Delete File dan Image
                        if (file_exists($link1) && file_exists($link2)) {
                            unlink($link1);
                            unlink($link2);
                            $rewardInovation->update(['upload_file_short_description' => '']);
                            $rewardInovation->update(['upload_file_image_support' => '']);
                        }

                        // Get File
                        $file                       =       $request->file('uploadFile');
                        // Get Photo
                        $photo                      =       $request->file('uploadPhoto');

                        // Get Original Extension
                        $fileExtension              =       $file->getClientOriginalExtension();
                        // Get Original Extension
                        $photoExtension             =       $photo->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // File Name
                        $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;
                        // Photo Name
                        $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;

                        // Save Folder
                        // $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);

                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);
                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);

                        // Update Database File dan Image
                        $rewardInovation->upload_file_short_description     =   $fileName;
                        $rewardInovation->upload_file_image_support         =   $photoName;
                        $rewardInovation->status_process                    =   '2';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 5. Jika Diganti File dan Video
                    if ($request->hasFile('uploadFile') && $request->hasFile('uploadVideo')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;
                        $link2                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

                        // Delete File dan Video
                        if (file_exists($link1) && file_exists($link2)) {
                            unlink($link1);
                            unlink($link2);
                            $rewardInovation->update(['upload_file_short_description' => '']);
                            $rewardInovation->update(['upload_file_video_support' => '']);
                        }

                        // Get File
                        $file                       =       $request->file('uploadFile');
                        // Get Video
                        $video                      =       $request->file('uploadVideo');

                        // Get Original Extension
                        $fileExtension              =       $file->getClientOriginalExtension();
                        // Get Original Extension
                        $videoExtension             =       $video->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // File Name
                        $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;
                        // Video Name
                        $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                        // Save Folder
                        // $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);

                        // Update Database File dan Video
                        $rewardInovation->upload_file_short_description     =   $fileName;
                        $rewardInovation->upload_file_video_support         =   $videoName;
                        $rewardInovation->status_process                    =   '2';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 6. Jika Diganti Image dan Video
                    if ($request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link1                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;
                        $link2                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

                        // Delete Image dan Video
                        if (file_exists($link1) && file_exists($link2)) {
                            unlink($link1);
                            unlink($link2);
                            $rewardInovation->update(['upload_file_image_support' => '']);
                            $rewardInovation->update(['upload_file_video_support' => '']);
                        }

                        // Get Photo
                        $photo                      =       $request->file('uploadPhoto');
                        // Get Video
                        $video                      =       $request->file('uploadVideo');

                        // Get Original Extension
                        $photoExtension             =       $photo->getClientOriginalExtension();
                        // Get Original Extension
                        $videoExtension             =       $video->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Photo Name
                        $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;
                        // Video Name
                        $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                        // Save Folder
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);

                        // Update Database Image dan Video
                        $rewardInovation->upload_file_image_support         =   $photoName;
                        $rewardInovation->upload_file_video_support         =   $videoName;
                        $rewardInovation->status_process                    =   '2';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 7. Jika Diganti File, Image, dan Video
                    if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;
                        $link2                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;
                        $link3                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

                        // Delete Image dan Video
                        if (file_exists($link1) && file_exists($link2) && file_exists($link3)) {
                            unlink($link1);
                            unlink($link2);
                            unlink($link3);
                            $rewardInovation->update(['upload_file_short_description' => '']);
                            $rewardInovation->update(['upload_file_image_support' => '']);
                            $rewardInovation->update(['upload_file_video_support' => '']);
                        }

                        // Get File
                        $file                       =       $request->file('uploadFile');
                        // Get Photo
                        $photo                      =       $request->file('uploadPhoto');
                        // Get Video
                        $video                      =       $request->file('uploadVideo');

                        // Get Original Extension
                        $fileExtension              =       $file->getClientOriginalExtension();
                        // Get Original Extension
                        $photoExtension             =       $photo->getClientOriginalExtension();
                        // Get Original Extension
                        $videoExtension             =       $video->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // File Name
                        $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;
                        // Photo Name
                        $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;
                        // Video Name
                        $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                        // Save Folder
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);
                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);

                        // Update Database File, Image dan Video
                        $rewardInovation->upload_file_short_description     =   $fileName;
                        $rewardInovation->upload_file_image_support         =   $photoName;
                        $rewardInovation->upload_file_video_support         =   $videoName;
                        $rewardInovation->status_process                    =   '2';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // $rewardInovation->status_process                    =   '2';
                    // $rewardInovation->save();
                    // alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    // return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');

                    alert()->error('Gagal Update Berkas Inovasi!', 'File harus diganti')->autoclose(25000);
                    return redirect()->back()->with('message-failed-form-inovation', 'File harus diganti')->withInput($request->all());

                } elseif ($request['status_process'] === '2') {

                    //  1. Jika Diganti File
                    if ($request->hasFile('uploadFile')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link                       =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;

                        // Delete File
                        if (file_exists($link)) {
                            unlink($link);
                            $rewardInovation->update(['upload_file_short_description' => '']);
                        }

                        // Get File
                        $file                       =       $request->file('uploadFile');

                        // Get Original Extension
                        $fileExtension              =       $file->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // File Name
                        $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;

                        // Save Folder
                        // $file->storeAs('app/public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);

                        // Update Database File
                        $rewardInovation->upload_file_short_description     =   $fileName;
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 2. Jika Diganti Image
                    if ($request->hasFile('uploadPhoto')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link                       =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;

                        // Delete Image
                        if (file_exists($link)) {
                            unlink($link);
                            $rewardInovation->update(['upload_file_image_support' => '']);
                        }

                        // Get Image
                        $photo                      =       $request->file('uploadPhoto');

                        // Get Original Extension
                        $photoExtension             =       $photo->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Image Name
                        $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;

                        // Save Folder
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);

                        // Update Database Image
                        $rewardInovation->upload_file_image_support         =   $photoName;
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 3. Jika Diganti Video
                    if ($request->hasFile('uploadVideo')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link                       =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

                        // Delete Video
                        if (file_exists($link)) {
                            unlink($link);
                            $rewardInovation->update(['upload_file_video_support' => '']);
                        }

                        // Get Video
                        $video                      =       $request->file('uploadVideo');

                        // Get Original Extension
                        $videoExtension             =       $video->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Video Name
                        $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                        // Save Folder
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);

                        // Update Database Video
                        $rewardInovation->upload_file_video_support     =   $videoName;
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }


                    // 4. Jika Diganti File dan Image
                    if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;
                        $link2                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;

                        // Delete File dan Image
                        if (file_exists($link1) && file_exists($link2)) {
                            unlink($link1);
                            unlink($link2);
                            $rewardInovation->update(['upload_file_short_description' => '']);
                            $rewardInovation->update(['upload_file_image_support' => '']);
                        }

                        // Get File
                        $file                       =       $request->file('uploadFile');
                        // Get Photo
                        $photo                      =       $request->file('uploadPhoto');

                        // Get Original Extension
                        $fileExtension              =       $file->getClientOriginalExtension();
                        // Get Original Extension
                        $photoExtension             =       $photo->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // File Name
                        $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;
                        // Photo Name
                        $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;

                        // Save Folder
                        // $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);

                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);
                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);

                        // Update Database File dan Image
                        $rewardInovation->upload_file_short_description     =   $fileName;
                        $rewardInovation->upload_file_image_support         =   $photoName;
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 5. Jika Diganti File dan Video
                    if ($request->hasFile('uploadFile') && $request->hasFile('uploadVideo')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;
                        $link2                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

                        // Delete File dan Video
                        if (file_exists($link1) && file_exists($link2)) {
                            unlink($link1);
                            unlink($link2);
                            $rewardInovation->update(['upload_file_short_description' => '']);
                            $rewardInovation->update(['upload_file_video_support' => '']);
                        }

                        // Get File
                        $file                       =       $request->file('uploadFile');
                        // Get Video
                        $video                      =       $request->file('uploadVideo');

                        // Get Original Extension
                        $fileExtension              =       $file->getClientOriginalExtension();
                        // Get Original Extension
                        $videoExtension             =       $video->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // File Name
                        $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;
                        // Video Name
                        $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                        // Save Folder
                        // $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);

                        // Update Database File dan Video
                        $rewardInovation->upload_file_short_description     =   $fileName;
                        $rewardInovation->upload_file_video_support         =   $videoName;
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 6. Jika Diganti Image dan Video
                    if ($request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link1                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;
                        $link2                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

                        // Delete Image dan Video
                        if (file_exists($link1) && file_exists($link2)) {
                            unlink($link1);
                            unlink($link2);
                            $rewardInovation->update(['upload_file_image_support' => '']);
                            $rewardInovation->update(['upload_file_video_support' => '']);
                        }

                        // Get Photo
                        $photo                      =       $request->file('uploadPhoto');
                        // Get Video
                        $video                      =       $request->file('uploadVideo');

                        // Get Original Extension
                        $photoExtension             =       $photo->getClientOriginalExtension();
                        // Get Original Extension
                        $videoExtension             =       $video->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Photo Name
                        $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;
                        // Video Name
                        $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                        // Save Folder
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);

                        // Update Database Image dan Video
                        $rewardInovation->upload_file_image_support         =   $photoName;
                        $rewardInovation->upload_file_video_support         =   $videoName;
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    // 7. Jika Diganti File, Image, dan Video
                    if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // Find Reward Id
                        $rewardInovation            =       RewardInovation::find($id);

                        // Link
                        $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;
                        $link2                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;
                        $link3                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

                        // Delete Image dan Video
                        if (file_exists($link1) && file_exists($link2) && file_exists($link3)) {
                            unlink($link1);
                            unlink($link2);
                            unlink($link3);
                            $rewardInovation->update(['upload_file_short_description' => '']);
                            $rewardInovation->update(['upload_file_image_support' => '']);
                            $rewardInovation->update(['upload_file_video_support' => '']);
                        }

                        // Get File
                        $file                       =       $request->file('uploadFile');
                        // Get Photo
                        $photo                      =       $request->file('uploadPhoto');
                        // Get Video
                        $video                      =       $request->file('uploadVideo');

                        // Get Original Extension
                        $fileExtension              =       $file->getClientOriginalExtension();
                        // Get Original Extension
                        $photoExtension             =       $photo->getClientOriginalExtension();
                        // Get Original Extension
                        $videoExtension             =       $video->getClientOriginalExtension();

                        // Get Id Auth Employee
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        // File Name
                        $fileName                   =       $id . '_' . $employee . '_' . date('d-m-Y') . $fileExtension;
                        // Photo Name
                        $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;
                        // Video Name
                        $videoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $videoExtension;

                        // Save Folder
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardInovations/' . $employee), $fileName);
                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardInovations/' . $employee), $photoName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardInovations/' . $employee), $videoName);

                        // Update Database File, Image dan Video
                        $rewardInovation->upload_file_short_description     =   $fileName;
                        $rewardInovation->upload_file_image_support         =   $photoName;
                        $rewardInovation->upload_file_video_support         =   $videoName;
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }

                    $rewardInovation->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-innovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }

                // $rewardInovation->upload_file_image_support         =   $request['uploadPhoto'];
                // $rewardInovation->upload_file_video_support         =   $request['uploadVideo'];

                // 'upload_file_short_description' =>  $fileName,
                // 'upload_file_image_support'     =>  $photoName,
                // 'upload_file_video_support'     =>  $videoName,

                // alert()->error('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                // return redirect()->back()->with('message-failed-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');

                alert()->error('Gagal Update Berkas Inovasi!', 'File harus diganti')->autoclose(25000);
                return redirect()->back()->with('message-failed-form-inovation', 'File harus diganti')->withInput($request->all());
                // return redirect('form-inovation/list');
                // ->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
            }

        }

        alert()->error('Gagal Update Berkas Inovasi!', 'Berkas Sudah Ditutup')->autoclose(25000);
        return redirect()->back()->with('message-failed-form-inovation', 'Berkas Sudah Ditutup')->withInput($request->all());

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postInovationIdDelete(Request $request, $id)
    {
        // Find id Reward
        $rewardInovation            =       RewardInovation::find($id);


        if($rewardInovation) {
            // Get Employee Username
            $employee                   =       Auth::guard('employees')->user()->username;

            // Find Reward Id
            $rewardInovation            =       RewardInovation::find($id);

            // Link
            $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_short_description;
            $link2                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_image_support;
            $link3                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardInovations/') . $employee . '/' . $rewardInovation->upload_file_video_support;

            // Delete Document, Image dan Video
            if (file_exists($link1) && file_exists($link2) && file_exists($link3)) {
                unlink($link1);
                unlink($link2);
                unlink($link3);
                // $rewardInovation->update(['upload_file_short_description' => '']);
                // $rewardInovation->update(['upload_file_image_support' => '']);
                // $rewardInovation->update(['upload_file_video_support' => '']);
            }
            // if (Storage::exists('public/employees/documents/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_short_description) && Storage::exists('public/employees/images/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_image_support) && Storage::exists('public/employees/videos/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_video_support))
            // {
                // Storage::delete('public/employees/documents/requirementsEmployeesRewardInovations'. $employee.'/'. $rewardInovation->upload_file_short_description);
                // Storage::delete('public/employees/images/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_image_support);
                // Storage::delete('public/employees/videos/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_video_support);
                // unlink(storage_path('app/public/requirementsEmployeesRewardInovations/employees/documents/' . $employee, $rewardInovation->upload_file_short_description));
                // unlink(storage_path('app/public/requirementsEmployeesRewardInovations/employees/photos/' . $employee, $rewardInovation->upload_file_image_support));
                // unlink(storage_path('app/public/requirementsEmployeesRewardInovations/employees/videos/' . $employee, $rewardInovation->upload_file_video_support));
            // }

            $rewardInovation->delete();
            alert()->success('Berhasil Hapus Berkas Inovation')->autoclose(25000);
            return redirect()->back()->with('message-failed-form-inovation', 'Berhasil Hapus Berkas Inovation');
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->back();
        //
    }
}
