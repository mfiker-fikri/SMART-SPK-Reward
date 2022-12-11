<?php

namespace App\Http\Controllers\Pegawai\Teladan;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormTeladan;
use App\Models\RewardTeladan;
use Illuminate\Http\Request;
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
            // Get id Employee
            $id     =   Auth::guard('employees')->user()->id;
            // Get Timer Countdown
            $timer  =  CountdownTimerFormTeladan::first();
            return view('layouts.pegawai.content.teladan.teladan_index', compact('timer'));
        } catch (\Throwable $th) {
            throw $th;
        }
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
            return view('layouts.pegawai.content.teladan.teladan_create');
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
                return redirect()->back()->with('message-form-inovation-error', 'Gagal Update Form Teladan. Lengkapi Data Profil Terlebih Dahulu di "My Profile"!');
            }

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
                return redirect()->back()->with('message-form-inovation-error', 'Gagal Upload Form Teladan')->withErrors($validate)->withInput($request->all());
            }

            // Check File Upload
            if ($request->hasFile('uploadFile') && $request->hasFile('uploadPhoto') && $request->hasFile('uploadVideo')) {
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
                $file->storeAs('public/employees/documents/requirementsEmployeesRewardTeladans/' . $employee, $fileName);
                $photo->storeAs('public/employees/images/requirementsEmployeesRewardTeladans/' . $employee, $photoName);
                $video->storeAs('public/employees/videos/requirementsEmployeesRewardTeladans/' . $employee, $videoName);

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
                    return redirect()->back();
                } else {
                    alert()->error('Gagal Upload Persyaratan Penghargaan Teladan!', 'Upload Gagal')->autoclose(25000);
                    return redirect()->back();
                }
            }

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
