<?php

namespace App\Http\Controllers\Pegawai\Teladan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CountdownTimerFormTeladan;
use Yajra\DataTables\DataTables;
use App\Models\RewardTeladan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TeladanController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeladanFormList()
    {
        try {
            // Get Timer Countdown
            $timer  =  CountdownTimerFormTeladan::first();

            // If Timer Not Null
            if ($timer != null) {
                $timer                  =   CountdownTimerFormTeladan::first();
                // ddd($timer->date_time_open_form_teladan);

                $dateTimeOpen           =   new Carbon($timer->date_time_open_form_teladan);

                $dateOpen               =   $dateTimeOpen->toDateString();
                $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

                $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_teladan);

                $dateExpired            =   $dateTimeExpired->toDateString();
                $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

                // Get id Employee
                $id                         =       Auth::guard('employees')->user()->id;

                $data = RewardTeladan::
                    where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['employee_id', '=', Auth::guard('employees')->user()->id],
                        ['status_process', '=', 1],
                    ])
                    ->latest()
                    ->get();
                // ddd($data);

                $rewardTeladan = RewardTeladan::where([
                        'employee_id' => $id,
                    ])
                    ->where(['status_process' => 2])
                    ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                    ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                    ->latest();

                // 0=Reject
                $rewardTeladanReject = RewardTeladan::where([
                        'employee_id' => $id,
                    ])
                    ->where(['status_process' => 0])
                    ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                    ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                    ->latest();

                // 1=Back
                $rewardTeladanBack = RewardTeladan::where([
                        'employee_id' => $id,
                    ])
                    ->where(['status_process' => 1])
                    ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                    ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                    ->latest();

                // 3=Process
                $rewardTeladanProcess = RewardTeladan::where([
                        'employee_id' => $id,
                    ])
                    ->where(['status_process' => 3])
                    ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                    ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                    ->latest();

                return view('layouts.pegawai.content.teladan.teladan_index', compact('timer', 'rewardTeladan', 'rewardTeladanReject', 'rewardTeladanBack', 'rewardTeladanProcess'));

            } elseif($timer == null) {
                // Get Timer Countdown
                $timer                  =   CountdownTimerFormTeladan::first();

                return view('layouts.pegawai.content.teladan.teladan_index', compact('timer'));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Reject
     */
    public function getTeladanFormDataReject()
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

        $data = RewardTeladan::where([
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
    public function getTeladanFormDataBack()
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

        $data = RewardTeladan::where([
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
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 0=dikembalikan
                if ($row->status_process == 1) {
                    $actionBtn =
                    '
                        <a href="' . route('pegawai.getInovationIdUpdate.Update.Pegawai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                        <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteFormInovationId" data-id="' . $row->id . '">
                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
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
                ['status_process', '=', 2],
            ])
            ->latest()
            ->get();


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = '';
                // 2=menunggu
                if($row->status_process == 2) {
                    $status = '<span>Sedang Tahap Menunggu</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 2=menunggu
                if($row->status_process == 2) {
                    $actionBtn =
                    '
                        <a href="' . route('pegawai.getTeladanIdUpdate.Update.Pegawai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                        <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteFormTeladanId" data-id="' . $row->id . '">
                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Process
     */
    public function getTeladanFormDataProcess()
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
                ['status_process', '=', 3],
            ])
            ->latest()
            ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = '';
                // 2=menunggu
                if($row->status_process == 2) {
                    $status = '<span>Sedang Tahap Menunggu</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 2=menunggu
                if($row->status_process == 2) {
                    $actionBtn =
                    '
                        <a href="' . route('pegawai.getInovationIdUpdate.Update.Pegawai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                        <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteFormInovationId" data-id="' . $row->id . '">
                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeladanFormCreate()
    {
        //
        try {
            // Get Timer Countdown
            $timer  =  CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_teladan);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_teladan);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {
                return view('layouts.pegawai.content.teladan.teladan_create');
            }
            return back();

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
    public function postTeladanFormCreate(Request $request)
    {
        try {
            // Check Data
            if (Auth::guard('employees')->user()->nip === null || Auth::guard('employees')->user()->pendidikan_terakhir === null ||
                Auth::guard('employees')->user()->pangkat === null || Auth::guard('employees')->user()->golongan_ruang === null ||
                Auth::guard('employees')->user()->sk_cpns === null || Auth::guard('employees')->user()->jabatan_terakhir === null ||
                Auth::guard('employees')->user()->unit_kerja === null
            ) {
                alert()->error('Gagal Upload Form Teladan!', 'Lengkapi Data Profil Terlebih Dahulu!')->autoclose(25000);
                return redirect()->back()->with('message-form-representative-error', 'Gagal Update Form Teladan. Lengkapi Data Profil Terlebih Dahulu di "My Profile"!');
            }

            // Get Timer Countdown
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_teladan);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_teladan);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

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
                    alert()->error('Gagal Upload Form Teladan!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-failed-form-representative', 'Gagal Upload Form Teladan')->withErrors($validate)->withInput($request->all());
                }

                // Check File Upload
                if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
                    // Jika Ada File,Foto, dan video Sebelumnya
                    if ($request->oldFile && $request->oldPhoto && $request->oldVideo) {
                        // Get Employee Username
                        $employee                   =       Auth::guard('employees')->user()->username;

                        $file   =   storage_path('app/public/employees/documents/requirementsEmployeesRewardTeladans/') . $employee . '/' . $request->oldFile;
                        $photo  =   storage_path('app/public/employees/images/requirementsEmployeesRewardTeladans/') . $employee . '/' . $request->oldPhoto;
                        $video  =   storage_path('app/public/employees/videos/requirementsEmployeesRewardTeladans/') . $employee . '/' . $request->oldVideo;

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
                        // $file->storeAs('public/employees/documents/requirementsEmployeesRewardTeladans/' . $employee, $fileName);
                        // $photo->storeAs('public/employees/images/requirementsEmployeesRewardTeladans/' . $employee, $photoName);
                        // $video->storeAs('public/employees/videos/requirementsEmployeesRewardTeladans/' . $employee, $videoName);

                        $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardTeladans/' . $employee), $fileName);
                        $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardTeladans/' . $employee), $photoName);
                        $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardTeladans/' . $employee), $videoName);

                        // Find Auth Employee Active storage_path($folder)
                        $id                         =       Auth::guard('employees')->user()->id;

                        // Save Upload To Database
                        $rewardTeladan = RewardTeladan::create([
                            'id'                            =>  Str::uuid(),
                            'upload_file_short_description' =>  $fileName,
                            'upload_file_image_support'     =>  $photoName,
                            'upload_file_video_support'     =>  $videoName,
                            'employee_id'                   =>  $id,

                        ]);

                        if ($rewardTeladan) {
                            alert()->success('Berhasil Upload Persyaratan Penghargaan Teladan')->autoclose(25000);
                            return redirect('form-representative/list')->with('message-success-form-representative', 'Berhasil Tambah Persyaratan Penghargaan Teladan');
                        } else {
                            alert()->error('Gagal Upload Persyaratan Penghargaan Teladan!', 'Upload Gagal')->autoclose(25000);
                            return redirect()->back()->with('message-failed-form-representative', 'Gagal Tambah Persyaratan Penghargaan Teladan');
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
                    // $file->storeAs('public/employees/documents/requirementsEmployeesRewardTeladans/' . $employee, $fileName);
                    // $photo->storeAs('public/employees/images/requirementsEmployeesRewardTeladans/' . $employee, $photoName);
                    // $video->storeAs('public/employees/videos/requirementsEmployeesRewardTeladans/' . $employee, $videoName);

                    $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardTeladans/' . $employee), $fileName);
                    $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardTeladans/' . $employee), $photoName);
                    $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardTeladans/' . $employee), $videoName);

                    // Find Auth Employee Active storage_path($folder)
                    $id                         =       Auth::guard('employees')->user()->id;

                    // Save Upload To Database
                    $rewardTeladan = RewardTeladan::create([
                        'id'                            =>  Str::uuid(),
                        'upload_file_short_description' =>  $fileName,
                        'upload_file_image_support'     =>  $photoName,
                        'upload_file_video_support'     =>  $videoName,
                        'employee_id'                   =>  $id,

                    ]);

                    if ($rewardTeladan) {
                        alert()->success('Berhasil Upload Persyaratan Penghargaan Teladan')->autoclose(25000);
                        return redirect('form-representative/list')->with('message-success-form-representative', 'Berhasil Tambah Persyaratan Penghargaan Teladan');
                    } else {
                        alert()->error('Gagal Upload Persyaratan Penghargaan Teladan!', 'Upload Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-failed-form-representative', 'Gagal Tambah Persyaratan Penghargaan Teladan');
                    }
                }


            }

            alert()->error('Gagal Upload Form Teladan!', 'Formulir Teladan Sudah Ditutup')->autoclose(25000);
            return redirect()->back()->with('message-failed-form-representative', 'Gagal Upload Form teladan')->withErrors($validate)->withInput($request->all());


        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function getTeladanIdUpdate($id)
    {
        try {
            // Get Timer Countdown
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_teladan);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_teladan);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {
                // Find id Reward
                $id_employee        =    Auth::guard('employees')->user()->id;
                $rewardTeladan    =    RewardTeladan::where([
                    'id' => $id,
                    'employee_id' => $id_employee
                    ])->first();
                // ddd($rewardTeladan);
                return view('layouts.pegawai.content.teladan.teladan_update', compact('rewardTeladan', 'timer'));
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
    public function postTeladanIdUpdate(Request $request, $id)
    {
        // Get Timer Countdown
        $timer                  =   CountdownTimerFormTeladan::first();

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_teladan);

        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_teladan);

        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

        if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {

            // Find id Reward
            $rewardTeladan            =       RewardTeladan::find($id);

            if($rewardTeladan) {
                $validate = null;

                // Jika upload sama
                if($request['uploadFileUpdate'] === $rewardTeladan->upload_file_short_description || $request['uploadPhotoUpdate'] === $rewardTeladan->upload_file_image_support || $request['uploadVideoUpdate'] === $rewardTeladan->upload_file_video_support)
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
                    alert()->error('Gagal Update Form Teladan!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-form-inovation-error', 'Gagal Update Form Inovasi')->withErrors($validate)->withInput($request->all());
                }

                // 1. Jika Diganti File
                if ($request->hasFile('uploadFile')) {
                    // Get Employee Username
                    $employee                 =       Auth::guard('employees')->user()->username;

                    // Find Reward Id
                    $rewardTeladan            =       RewardTeladan::find($id);

                    // Link
                    $link                       =       storage_path('app/public/employees/documents/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_short_description;

                    // Delete File
                    if (file_exists($link)) {
                        unlink($link);
                        $rewardTeladan->update(['upload_file_short_description' => '']);
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
                    // $file->storeAs('app/public/employees/documents/requirementsEmployeesRewardTeladans/' . $employee, $fileName);
                    $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardTeladans/' . $employee), $fileName);

                    // Update Database File
                    $rewardTeladan->upload_file_short_description     =   $fileName;
                    $rewardTeladan->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-representative/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }

                // 2. Jika Diganti Image
                if ($request->hasFile('uploadPhoto')) {
                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;

                    // Find Reward Id
                    $rewardTeladan            =       RewardTeladan::find($id);

                    // Link
                    $link                       =       storage_path('app/public/employees/images/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_image_support;

                    // Delete Image
                    if (file_exists($link)) {
                        unlink($link);
                        $rewardTeladan->update(['upload_file_image_support' => '']);
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
                    // $photo->storeAs('public/employees/images/requirementsEmployeesRewardTeladans/' . $employee, $photoName);
                    $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardTeladans/' . $employee), $photoName);

                    // Update Database Image
                    $rewardTeladan->upload_file_image_support         =   $photoName;
                    $rewardTeladan->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-representative/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }

                // 3. Jika Diganti Video
                if ($request->hasFile('uploadVideo')) {
                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;

                    // Find Reward Id
                    $rewardTeladan            =       RewardTeladan::find($id);

                    // Link
                    $link                       =       storage_path('app/public/employees/videos/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_video_support;

                    // Delete Video
                    if (file_exists($link)) {
                        unlink($link);
                        $rewardTeladan->update(['upload_file_video_support' => '']);
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
                    // $video->storeAs('public/employees/videos/requirementsEmployeesRewardTeladans/' . $employee, $videoName);
                    $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardTeladans/' . $employee), $videoName);

                    // Update Database Video
                    $rewardTeladan->upload_file_video_support     =   $videoName;
                    $rewardTeladan->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-representative/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }


                // 4. Jika Diganti File dan Image
                if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto')) {
                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;

                    // Find Reward Id
                    $rewardTeladan            =       RewardTeladan::find($id);

                    // Link
                    $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_short_description;
                    $link2                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_image_support;

                    // Delete File dan Image
                    if (file_exists($link1) && file_exists($link2)) {
                        unlink($link1);
                        unlink($link2);
                        $rewardTeladan->update(['upload_file_short_description' => '']);
                        $rewardTeladan->update(['upload_file_image_support' => '']);
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
                    // $file->storeAs('public/employees/documents/requirementsEmployeesRewardTeladans/' . $employee, $fileName);
                    // $photo->storeAs('public/employees/images/requirementsEmployeesRewardTeladans/' . $employee, $photoName);

                    $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardTeladans/' . $employee), $fileName);
                    $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardTeladans/' . $employee), $photoName);

                    // Update Database File dan Image
                    $rewardTeladan->upload_file_short_description     =   $fileName;
                    $rewardTeladan->upload_file_image_support         =   $photoName;
                    $rewardTeladan->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-representative/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }

                // 5. Jika Diganti File dan Video
                if ($request->hasFile('uploadFile') && $request->hasFile('uploadVideo')) {
                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;

                    // Find Reward Id
                    $rewardTeladan            =       RewardTeladan::find($id);

                    // Link
                    $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_short_description;
                    $link2                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_video_support;

                    // Delete File dan Video
                    if (file_exists($link1) && file_exists($link2)) {
                        unlink($link1);
                        unlink($link2);
                        $rewardTeladan->update(['upload_file_short_description' => '']);
                        $rewardTeladan->update(['upload_file_video_support' => '']);
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
                    // $file->storeAs('public/employees/documents/requirementsEmployeesRewardTeladans/' . $employee, $fileName);
                    // $video->storeAs('public/employees/videos/requirementsEmployeesRewardTeladans/' . $employee, $videoName);

                    $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardTeladans/' . $employee), $fileName);
                    $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardTeladans/' . $employee), $videoName);

                    // Update Database File dan Video
                    $rewardTeladan->upload_file_short_description     =   $fileName;
                    $rewardTeladan->upload_file_video_support         =   $videoName;
                    $rewardTeladan->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-representative/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }

                // 6. Jika Diganti Image dan Video
                if ($request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;

                    // Find Reward Id
                    $rewardTeladan            =       RewardTeladan::find($id);

                    // Link
                    $link1                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_image_support;
                    $link2                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_video_support;

                    // Delete Image dan Video
                    if (file_exists($link1) && file_exists($link2)) {
                        unlink($link1);
                        unlink($link2);
                        $rewardTeladan->update(['upload_file_image_support' => '']);
                        $rewardTeladan->update(['upload_file_video_support' => '']);
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
                    // $photo->storeAs('public/employees/images/requirementsEmployeesRewardTeladans/' . $employee, $photoName);
                    // $video->storeAs('public/employees/videos/requirementsEmployeesRewardTeladans/' . $employee, $videoName);

                    $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardTeladans/' . $employee), $photoName);
                    $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardTeladans/' . $employee), $videoName);

                    // Update Database Image dan Video
                    $rewardTeladan->upload_file_image_support         =   $photoName;
                    $rewardTeladan->upload_file_video_support         =   $videoName;
                    $rewardTeladan->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-representative/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }

                // 7. Jika Diganti File, Image, dan Video
                if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;

                    // Find Reward Id
                    $rewardTeladan            =       RewardTeladan::find($id);

                    // Link
                    $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_short_description;
                    $link2                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_image_support;
                    $link3                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_video_support;

                    // Delete Image dan Video
                    if (file_exists($link1) && file_exists($link2) && file_exists($link3)) {
                        unlink($link1);
                        unlink($link2);
                        unlink($link3);
                        $rewardTeladan->update(['upload_file_short_description' => '']);
                        $rewardTeladan->update(['upload_file_image_support' => '']);
                        $rewardTeladan->update(['upload_file_video_support' => '']);
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
                    // $photo->storeAs('public/employees/images/requirementsEmployeesRewardTeladans/' . $employee, $photoName);
                    // $video->storeAs('public/employees/videos/requirementsEmployeesRewardTeladans/' . $employee, $videoName);

                    $file->move(public_path('storage/employees/documents/requirementsEmployeesRewardTeladans/' . $employee), $fileName);
                    $photo->move(public_path('storage/employees/images/requirementsEmployeesRewardTeladans/' . $employee), $photoName);
                    $video->move(public_path('storage/employees/videos/requirementsEmployeesRewardTeladans/' . $employee), $videoName);

                    // Update Database File, Image dan Video
                    $rewardTeladan->upload_file_short_description     =   $fileName;
                    $rewardTeladan->upload_file_image_support         =   $photoName;
                    $rewardTeladan->upload_file_video_support         =   $videoName;
                    $rewardTeladan->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-representative/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }

                // $rewardTeladan->upload_file_image_support         =   $request['uploadPhoto'];
                // $rewardTeladan->upload_file_video_support         =   $request['uploadVideo'];

                // 'upload_file_short_description' =>  $fileName,
                // 'upload_file_image_support'     =>  $photoName,
                // 'upload_file_video_support'     =>  $videoName,

                alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                return redirect()->back()->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                // return redirect('form-representative/list');
                // ->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
            }

        }

        alert()->error('Gagal Update Form Inovasi!', 'Form Sudah Ditutup')->autoclose(25000);
        return redirect()->back()->with('message-form-inovation-error', 'Form Sudah Ditutup')->withInput($request->all());

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
    public function postTeladanIdDelete(Request $request, $id)
    {
        // Find id Reward
        $rewardTeladan            =       RewardTeladan::find($id);


        if($rewardTeladan) {
            // Get Employee Username
            $employee                 =       Auth::guard('employees')->user()->username;

            // Find Reward Id
            $rewardTeladan            =       RewardTeladan::find($id);

            // Link
            $link1                      =       storage_path('app/public/employees/documents/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_short_description;
            $link2                      =       storage_path('app/public/employees/images/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_image_support;
            $link3                      =       storage_path('app/public/employees/videos/requirementsEmployeesRewardTeladans/') . $employee . '/' . $rewardTeladan->upload_file_video_support;

            // Delete Document, Image dan Video
            if (file_exists($link1) && file_exists($link2) && file_exists($link3)) {
                unlink($link1);
                unlink($link2);
                unlink($link3);
            }

            $rewardTeladan->delete();
            alert()->success('Berhasil Hapus Form Teladan')->autoclose(25000);
            return redirect()->back()->with('message-failed-form-representative', 'Berhasil Hapus Form Teladan');
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->back();
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
