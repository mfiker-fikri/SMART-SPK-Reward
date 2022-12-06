<?php

namespace App\Http\Controllers\Pegawai\Inovation;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Pegawai;
use App\Models\RewardInovation;

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
            // Get id Employee
            $id                         =       Auth::guard('employees')->user()->id;
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

            $timer = CountdownTimerFormInovation::first();
            return view('layouts.pegawai.content.inovation.inovation_index', compact('timer'));
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
        $data = RewardInovation::where([
                'employee_id' => $id,
            ])
            ->where(['status_process' => 0])
            ->orWhere(['status_process' => 1])
            ->orWhere(['status_process' => 2])
            ->orWhere(['status_process' => 3])
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
                // 3=diproses
                elseif ($row->status_process == 3) {
                    $status = '<span>Sedang Tahap Di Proses</span>';
                }
                // 1=dikembalikan
                elseif ($row->status_process == 1) {
                    $status = '<span>Dikembalikan</span>';
                }
                // 0=ditolak
                else {
                    $status = '<span>Ditolak</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 2=menunggu || 1=dikembalikan || 0=ditolak
                if($row->status_process == 2 || $row->status_process == 1 || $row->status_process == 0) {
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
        return view('layouts.pegawai.content.inovation.inovation_create');
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
        if (Auth::guard('employees')->user()->nip === null || Auth::guard('employees')->user()->pendidikan === null ||
        Auth::guard('employees')->user()->pangkat === null || Auth::guard('employees')->user()->gol === null ||
        Auth::guard('employees')->user()->sk_cpns === null || Auth::guard('employees')->user()->jabatan === null ||
        Auth::guard('employees')->user()->unit_kerja === null
        ) {
            alert()->error('Gagal Upload Form Inovasi!', 'Lengkapi Data Profil Terlebih Dahulu!')->autoclose(25000);
            return redirect()->back()->with('message-form-inovation-error', 'Gagal Update Form Inovasi. Lengkapi Data Profil Terlebih Dahulu di "My Profile"!');
        }

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

        // dd($validate);
        if ($validate->fails()) {
            alert()->error('Gagal Upload Form Inovasi!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-form-inovation-error', 'Gagal Upload Form Inovasi')->withErrors($validate)->withInput($request->all());
        }

        // $id                         =       Auth::guard('employees')->user()->id;
        // $employee                   =       Pegawai::find($id);

        // if (
        //     $employee->nip == null && $employee->pendidikan == null && $employee->pangkat == null &&
        //     $employee->gol == null && $employee->gol == null
        // ) {
        //     alert()->error('Gagal Upload Form Inovasi!', 'Harap Isi Biodata Secara Lengkap Di Menu Profile')->autoclose(25000);
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
                Storage::delete($request->oldFile);
                // Delete Photo Before Previous
                Storage::delete($request->oldPhoto);
                // Delete Video Before Previous
                Storage::delete($request->oldVideo);



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
                $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);


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
                    alert()->success('Berhasil Upload Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect()->back();
                } else {
                    alert()->error('Gagal Upload Persyaratan Penghargaan Inovasi!', 'Upload Gagal')->autoclose(25000);
                    return redirect()->back();
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
            $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
            $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
            $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);

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
                alert()->success('Berhasil Upload Persyaratan Penghargaan Inovasi')->autoclose(25000);
                return redirect('form-inovation/list')->with('message-success-form-inovation', 'Berhasil Upload Persyaratan Penghargaan Inovasi');
            } else {
                alert()->error('Gagal Upload Persyaratan Penghargaan Inovasi!', 'Upload Gagal')->autoclose(25000);
                return redirect()->back();
            }
        }

        // Jika Ada Upload Foto
        // if ($request->hasFile('uploadPhoto')) {
        // }

        // Jika Ada Upload Video
        // if ($request->hasFile('uploadVideo')) {
        // }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getInovationIdUpdate($id)
    {
        try {
            // Find id Reward
            $id_employee        =    Auth::guard('employees')->user()->id;
            $rewardInovation    =    RewardInovation::where([
                'id' => $id,
                'employee_id' => $id_employee
                ])->first();
            // ddd($rewardInovation);
            return view('layouts.pegawai.content.inovation.inovation_update',compact('rewardInovation'));
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
        // Find id Reward
        $rewardInovation            =       RewardInovation::find($id);

        if($rewardInovation) {
            $validate = null;

            // Jika upload sama
            if($request['uploadFileUpdate'] === $rewardInovation->upload_file_short_description || $request['uploadPhoto'] === $rewardInovation->upload_file_image_support || $request['uploadVideo'] === $rewardInovation->upload_file_video_support)
            {
                $validate = Validator::make(
                    $request->all(),
                    [
                        'uploadFile'                                  =>      'mimes:pdf|max:3072',
                        'uploadFileUpdate'                            =>      'required',
                        // 'uploadPhoto'                                 =>      'required|image|mimes:jpg,jpeg,png|max:5120',
                        // 'uploadVideo'                           =>      'required|mimes:flv,mp4,3gp,mov,avi,wmv|max:1024000',
                    ],
                    [
                        'uploadFileUpdate.required'                   =>      'File Wajib Diupload!',
                        // 'uploadPhoto.required'                  =>      'Foto Wajib Diupload!',
                        // 'uploadVideo.required'                  =>      'Video Wajib Diupload!',
                        //
                        'uploadFile.mimes'                      =>      'Extension File Harus Berupa pdf!',
                        // 'uploadPhoto.mimes'                     =>      'Extension Foto Harus Berupa jpg / jpeg / png!',
                        // 'uploadVideo.mimes'                     =>      'Extension Video Harus Berupa flv / jpeg, png!',
                        //
                        // 'uploadPhoto.image'                     =>      'Diupload Harus Berupa Foto!',
                        //
                        'uploadFile.max'                        =>      'Maksimal Upload File 3Mb (3072 Kb)!',
                        // 'uploadPhoto.max'                       =>      'Maksimal Upload Foto 5Mb (5120 Kb)!',
                        // 'uploadVideo.max'                       =>      'Maksimal Upload Video 1Gb (1024000 Kb)!',
                    ]
                );
            } else
            {
                $validate = Validator::make(
                    $request->all(),
                    [
                        'uploadFile'                                  =>      'mimes:pdf|max:3072',
                        'uploadFileUpdate'                            =>      'required',
                        'uploadPhoto'                                 =>      'image|mimes:jpg,jpeg,png|max:5120',
                        'uploadPhotoUpdate'                           =>      'required',
                        'uploadVideo'                                 =>      'mimes:flv,mp4,3gp,mov,avi,wmv|max:1024000',
                        'uploadVideoUpdate'                           =>      'required'
                    ],
                    [
                        'uploadFileUpdate.required'                   =>      'File Wajib Diupload!',
                        'uploadPhotoUpdate.required'                  =>      'Foto Wajib Diupload!',
                        // 'uploadVideo.required'                  =>      'Video Wajib Diupload!',
                        //
                        'uploadFile.mimes'                            =>      'Extension File Harus Berupa pdf!',
                        'uploadPhoto.mimes'                           =>      'Extension Foto Harus Berupa jpg / jpeg / png!',
                        // 'uploadVideo.mimes'                     =>      'Extension Video Harus Berupa flv / jpeg, png!',
                        //
                        'uploadPhoto.image'                           =>      'Diupload Harus Berupa Foto!',
                        //
                        'uploadFile.max'                              =>      'Maksimal Upload File 3Mb (3072 Kb)!',
                        'uploadPhoto.max'                             =>      'Maksimal Upload Foto 5Mb (5120 Kb)!',
                        // 'uploadVideo.max'                       =>      'Maksimal Upload Video 1Gb (1024000 Kb)!',
                    ]
                );
            }

            //
            if ($validate->fails()) {
                alert()->error('Gagal Update Form Inovasi!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-form-inovation-error', 'Gagal Update Form Inovasi')->withErrors($validate)->withInput($request->all());
            }

            // Jika Diganti File
            if ($request->hasFile('uploadFile')) {
                // Get Employee Username
                $employee                   =       Auth::guard('employees')->user()->username;

                Storage::delete('public/employees/documents/requirementsEmployeesRewardInovations'. $employee.'/'. $rewardInovation->upload_file_short_description);

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
                $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);

                // Update Database File
                $rewardInovation->upload_file_short_description     =   $fileName;
                $rewardInovation->save();
                alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                return redirect('form-inovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
            }

            // Jika Diganti Image
            if ($request->hasFile('uploadPhoto')) {
                // Get Photo
                $photo                      =       $request->file('uploadPhoto');

                // Get Original Extension
                $photoExtension             =       $photo->getClientOriginalExtension();

                // Get Id Auth Employee
                $id                         =       Auth::guard('employees')->user()->id;

                // Get Employee Username
                $employee                   =       Auth::guard('employees')->user()->username;

                // Photo Name
                $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;

                $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);

                // Update Database File
                $rewardInovation->upload_file_image_support         =   $photoName;
                $rewardInovation->save();
                alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                return redirect('form-inovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
            }

            // Jika Diganti Video
            if ($request->hasFile('uploadVideo')) {
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

                $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);
            }


            // Jika Diganti File dan Image
            if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto')) {
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
                $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
            }

            // Jika Diganti File dan Video
            if ($request->hasFile('uploadFile') && $request->hasFile('uploadVideo')) {
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
                $file->storeAs('public/employees/documents/requirementsEmployeesRewardInovations/' . $employee, $fileName);
                $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);
            }

            // Jika Diganti Image dan Video
            if ($request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
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
                $photo->storeAs('public/employees/images/requirementsEmployeesRewardInovations/' . $employee, $photoName);
                $video->storeAs('public/employees/videos/requirementsEmployeesRewardInovations/' . $employee, $videoName);
            }

            // Jika Diganti File, Image, dan Video
            // if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto')) {

            // }

            // $rewardInovation->upload_file_image_support         =   $request['uploadPhoto'];
            // $rewardInovation->upload_file_video_support         =   $request['uploadVideo'];

            // 'upload_file_short_description' =>  $fileName,
            // 'upload_file_image_support'     =>  $photoName,
            // 'upload_file_video_support'     =>  $videoName,

            // alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
            return redirect('form-inovation/list');
            // ->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
        }
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
            if (Storage::exists('public/employees/documents/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_short_description) && Storage::exists('public/employees/images/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_image_support) && Storage::exists('public/employees/videos/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_video_support))
            {
                Storage::delete('public/employees/documents/requirementsEmployeesRewardInovations'. $employee.'/'. $rewardInovation->upload_file_short_description);
                Storage::delete('public/employees/images/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_image_support);
                Storage::delete('public/employees/videos/requirementsEmployeesRewardInovations/'. $employee.'/'. $rewardInovation->upload_file_video_support);
                // unlink(storage_path('app/public/requirementsEmployeesRewardInovations/employees/documents/' . $employee, $rewardInovation->upload_file_short_description));
                // unlink(storage_path('app/public/requirementsEmployeesRewardInovations/employees/photos/' . $employee, $rewardInovation->upload_file_image_support));
                // unlink(storage_path('app/public/requirementsEmployeesRewardInovations/employees/videos/' . $employee, $rewardInovation->upload_file_video_support));
            }

            $rewardInovation->delete();
            alert()->success('Berhasil Hapus Form Inovation')->autoclose(25000);
            return redirect()->back()->with('message-failed-form-inovation', 'Berhasil Hapus Form Inovation');
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->back();
        //
    }
}
