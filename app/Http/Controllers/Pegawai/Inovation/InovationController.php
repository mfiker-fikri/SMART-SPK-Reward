<?php

namespace App\Http\Controllers\Pegawai\Inovation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function getInovationForm()
    {
        // 

        // 
        // Get id Employee
        $id                         =       Auth::guard('employees')->user()->id;
        // Search id
        $rewardInovation            =       RewardInovation::where('employee_id', '=', $id)->first();
        // ddd($rewardInovation);
        // 
        return view('layouts.pegawai.content.inovation.inovation_index', compact('rewardInovation'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postInovationFormCreate(Request $request)
    {
        //
        $validate = Validator::make(
            $request->all(),
            [
                'uploadFile'                            =>      'required|mimes:pdf,doc,docx|max:3072',
                'uploadPhoto'                           =>      'required|image|mimes:jpg,jpeg,png|max:5120',
                'uploadVideo'                           =>      'required|mimes:flv,mp4,3gp,mov,avi,wmv|max:1024000',
            ],
            [
                'uploadFile.required'                   =>      'File Wajib Diupload!',
                'uploadPhoto.required'                  =>      'Foto Wajib Diupload!',
                'uploadVideo.required'                  =>      'Video Wajib Diupload!',
                // 
                'uploadFile.mimes'                      =>      'Extension File Harus Berupa pdf / doc / docx',
                'uploadPhoto.mimes'                     =>      'Extension Foto Harus Berupa jpg / jpeg / png',
                'uploadVideo.mimes'                     =>      'Extension Video Harus Berupa flv / jpeg, png',
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
                $file->storeAs('requirementsEmployeesRewardInovations/employees/documents/' . $employee, $fileName);
                $photo->storeAs('requirementsEmployeesRewardInovations/employees/photos/' . $employee, $photoName);
                $video->storeAs('requirementsEmployeesRewardInovations/employees/videos/' . $employee, $videoName);


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
            $file->storeAs('requirementsEmployeesRewardInovations/employees/documents/' . $employee, $fileName);
            $photo->storeAs('requirementsEmployeesRewardInovations/employees/photos/' . $employee, $photoName);
            $video->storeAs('requirementsEmployeesRewardInovations/employees/videos/' . $employee, $videoName);


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
                return redirect()->back();
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
