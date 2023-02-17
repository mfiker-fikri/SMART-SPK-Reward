<?php

namespace App\Http\Controllers\SDM;

use App\Http\Controllers\Controller;
use App\Models\HumanResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class SDMController extends Controller
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
     * Kepala Biro SDM
     * Kepala Biro SDM
     * Kepala Biro SDM
     *
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfileKepalaBiroSDM()
    {
        try {
            return view('layouts.sdm.content.profile.profile');
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
    public function postProfileKepalaBiroSDM(Request $request)
    {
        try {
            // Get Id SDM
            $id = Auth::guard('human_resources')->user()->id;
            $sdm = HumanResource::find($id);

            if($sdm) {
                $validate = null;
                if ($request['email'] === Auth::guard('human_resources')->user()->email && $request['username'] === Auth::guard('human_resources')->user()->username) {
                    // Validasi Update
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                     =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                            'email'                         =>      'required|string|email',
                        ],
                        [
                            'full_name.required'            =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'             =>      'Username Wajib Diisi!',
                            'email.required'                =>      'Email Wajib Diisi!',
                            //
                            'full_name.min'                 =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                  =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                 =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                  =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                   =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
                            //
                            'full_name.regex'               =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                            'username.regex'                =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                            //
                        ]
                    );
                } else {
                    // Validasi Update
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                     =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/|unique:admins,username',
                            'email'                         =>      'required|string|email|unique:admins,email',
                        ],
                        [
                            'full_name.required'            =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'             =>      'Username Wajib Diisi!',
                            'email.required'                =>      'Email Wajib Diisi!',
                            //
                            'full_name.min'                 =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                  =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                 =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                  =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                   =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
                            //
                            'username.unique'               =>      'Username Sudah Ada',
                            'email.unique'                  =>      'Alamat Email Sudah Ada',
                            //
                            'full_name.regex'               =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                            'username.regex'                =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                            //
                        ]
                    );
                }

                if ($validate->fails()) {
                    alert()->error('Gagal Update Profile!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-profile-error', 'Gagal Update Profile')->withErrors($validate)->withInput($request->all());
                }

                $sdm->full_name   = $request['full_name'];
                $sdm->username    = $request['username'];
                $sdm->email       = $request['email'];

                $sdm->save();

                alert()->success('Berhasil Update Profile')->autoclose(25000);
                return redirect()->back()->with('message-update-profile-success', 'Berhasil Update Profile');
            } else {
                alert()->error('Gagal Update Profile!')->autoclose(25000);
            }
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
    public function postImageUploadKepalaBiroSDM(Request $request)
    {
        try {
            // Validasi Image
            $validate = Validator::make(
                $request->all(),
                [
                    'photo_profile'                 =>      'required|image|mimes:jpg,jpeg,png|max:2048',
                ],
                [
                    'photo_profile.required'        =>      'Foto Wajib Diisi!',
                    'photo_profile.image'           =>      'Diupload Harus Berupa Foto!',
                    'photo_profile.mimes'           =>      'Extension Foto Harus Berupa jpg, jpeg, png',
                    'photo_profile.max'             =>      'Maksimal Foto Upload 2Mb (2048 Kb). Jika Foto Tetap Diupload, Cobalah Untuk Memperkecil Resolusi Foto Dibawah 2MB',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Update Foto Profile!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-update-photo-error', 'Gagal Update Foto Profile')->withErrors($validate)->withInput($request->all());
            }

            if ($request->hasFile('photo_profile')) {
                if ($request->oldImage) {
                    // Get SDM Username
                    $sdm = Auth::guard('human_resources')->user()->username;

                    // if (Storage::exists('public/sdm/headOfHumanResources/photos/photoProfile/'. $sdm.'/'. $request->oldImage)) {
                    //     // Delete
                    //     Storage::delete('public/sdm/headOfHumanResources/photos/photoProfile/'. $sdm.'/'. $request->oldImage);
                    // }
                    $file = storage_path('app/public/sdm/headOfHumanResources/photos/photoProfile/') . $sdm . '/' . $request->oldImage;
                    if (file_exists($file)) {
                        unlink($file);
                    }

                    // Get File Image
                    $photoProfile       =   $request->file('photo_profile');
                    // Get Original Name
                    // $photoName      =   $photoProfile->getClientOriginalName();
                    // Get Original Extension
                    $photoExtension     =   $photoProfile->getClientOriginalExtension();

                    // Get Id Auth SDM
                    $id                 =   Auth::guard('human_resources')->user()->id;
                    // Get SDM Username
                    $sdm                =   Auth::guard('human_resources')->user()->username;
                    // Photo Name
                    $photoName          =   $id . '_' . $sdm . '_' . date('d-m-Y') . $photoExtension;

                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();

                    // Kepala Biro SDM
                    if (Auth::guard('human_resources')->user()->role == 1) {
                        // $photoProfile->storeAs('public/sdm/headOfHumanResources/photos/photoProfile/' . $sdm, $photoName);
                        $photoProfile->move(public_path('storage/sdm/headOfHumanResources/photos/photoProfile/' . $sdm), $photoName);
                    }

                    // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
                    if (Auth::guard('human_resources')->user()->role == 2) {
                        $photoProfile->move(public_path('storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/' . $sdm), $photoName);
                    }

                    // Find Auth SDM Active storage_path($folder)
                    $id         =   Auth::guard('human_resources')->user()->id;
                    $sdm        =   HumanResource::find($id);

                    // Save Photo To Database
                    $sdm->photo_profile = $photoName;
                    $sdm->save();

                    alert()->success('Berhasil Update Foto')->autoclose(25000);
                    return redirect()->back()->with('message-update-photo-success', 'Berhasil Update Foto Profile');
                }

                // Get File Image
                $photoProfile       =   $request->file('photo_profile');
                // Get Original Name
                // $photoName      =   $photoProfile->getClientOriginalName();
                // Get Original Extension
                $photoExtension     =   $photoProfile->getClientOriginalExtension();

                // Get Id Auth SDM
                $id                 =   Auth::guard('human_resources')->user()->id;
                // Get SDM Username
                $sdm                =   Auth::guard('human_resources')->user()->username;
                // Photo Name
                $photoName          =   $id . '_' . $sdm . '_' . date('d-m-Y') . $photoExtension;

                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                // Kepala Biro SDM
                if (Auth::guard('human_resources')->user()->role == 1) {
                    // $photoProfile->storeAs('public/sdm/headOfHumanResources/photos/photoProfile/' . $sdm, $photoName);
                    $photoProfile->move(public_path('storage/sdm/headOfHumanResources/photos/photoProfile/' . $sdm), $photoName);
                }

                // Find Auth SDM Active storage_path($folder)
                $id = Auth::guard('human_resources')->user()->id;
                $sdm = HumanResource::find($id);

                // Save Photo To Database
                $sdm->photo_profile = $photoName;
                $sdm->save();

                alert()->success('Berhasil Update Foto')->autoclose(25000);
                return redirect()->back()->with('message-update-photo-success', 'Berhasil Update Foto Profile');
            }

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
    public function postSignatureUploadKepalaBiroSDM(Request $request)
    {
        try {
            // Validasi Image
            $validate = Validator::make(
                $request->all(),
                [
                    'signature'                 =>      'required|image|mimes:jpg,jpeg,png|max:2048',
                ],
                [
                    'signature.required'        =>      'Foto Tanda Tangan Wajib Diisi!',
                    'signature.image'           =>      'Diupload Harus Berupa Foto Tanda Tangan!',
                    'signature.mimes'           =>      'Extension Foto Tanda Tangan Harus Berupa jpg, jpeg, png',
                    'signature.max'             =>      'Maksimal Foto Tanda Tangan Upload 2Mb (2048 Kb). Jika Foto Tanda Tangan Tetap Diupload, Cobalah Untuk Memperkecil Resolusi Foto Tanda Tangan Dibawah 2MB',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Update Tanda Tangan!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-update-photo-error', 'Gagal Update Tanda Tangan')->withErrors($validate)->withInput($request->all());
            }

            if ($request->hasFile('signature')) {
                if ($request->oldSignature) {
                    // Get SDM Username
                    $sdm = Auth::guard('human_resources')->user()->username;

                    $file = storage_path('app/public/sdm/headOfHumanResources/signature/') . $request->oldSignature;

                    if (file_exists($file)) {
                        unlink($file);
                    }

                    // Get File Image
                    $photoProfile       =   $request->file('signature');
                    // Get Original Name
                    // $photoName      =   $photoProfile->getClientOriginalName();
                    // Get Original Extension
                    $photoExtension     =   $photoProfile->getClientOriginalExtension();

                    // Get Id Auth SDM
                    $id                 =   Auth::guard('human_resources')->user()->id;
                    // Get SDM Username
                    $sdm                =   Auth::guard('human_resources')->user()->username;
                    // Photo Name
                    $photoName          =   $sdm . '/' . $sdm;

                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();

                    // Kepala Biro SDM
                    if (Auth::guard('human_resources')->user()->role == 1) {
                        $photoProfile->move(public_path('storage/sdm/headOfHumanResources/signature/' . $sdm), $photoName);
                    }

                    // Find Auth SDM Active storage_path($folder)
                    $id         =   Auth::guard('human_resources')->user()->id;
                    $sdm        =   HumanResource::find($id);

                    // Save Photo To Database
                    $sdm->signature = $photoName;
                    $sdm->save();

                    alert()->success('Berhasil Update Tanda Tangan')->autoclose(25000);
                    return redirect()->back()->with('message-update-photo-success', 'Berhasil Update Tanda Tangan');
                }

                // Get File Image
                $photoProfile       =   $request->file('signature');
                // Get Original Name
                // $photoName      =   $photoProfile->getClientOriginalName();
                // Get Original Extension
                $photoExtension     =   $photoProfile->getClientOriginalExtension();

                // Get Id Auth SDM
                $id                 =   Auth::guard('human_resources')->user()->id;
                // Get SDM Username
                $sdm                =   Auth::guard('human_resources')->user()->username;
                // Photo Name
                $photoName          =   $sdm . '/' . $sdm;

                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                // Kepala Biro SDM
                if (Auth::guard('human_resources')->user()->role == 1) {
                    $photoProfile->move(public_path('storage/sdm/headOfHumanResources/signature/' . $sdm), $photoName);
                }

                // Find Auth SDM Active storage_path($folder)
                $id = Auth::guard('human_resources')->user()->id;
                $sdm = HumanResource::find($id);

                // Save Photo To Database
                $sdm->signature = $photoName;
                $sdm->save();

                alert()->success('Berhasil Update Tanda Tangan')->autoclose(25000);
                return redirect()->back()->with('message-update-photo-success', 'Berhasil Update Tanda Tangan');
            }

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
    public function postImageDeleteKepalaBiroSDM(Request $request)
    {
        try {
            $id = Auth::guard('human_resources')->user()->id;
            $photo = HumanResource::find($id);

            if($photo) {
                $sdm = Auth::guard('human_resources')->user()->username;
                $file = storage_path('app/public/sdm/headOfHumanResources/photos/photoProfile/') . $sdm . '/' . $photo->photo_profile;

                if (file_exists($file) && $photo->photo_profile != null) {
                    unlink($file);
                }

                DB::table('human_resources')->where('id', $id)->update(['photo_profile' => null]);
                alert()->success('Berhasil Hapus Foto')->autoclose(25000);
                return redirect()->back()->with('message-update-photo-success', 'Berhasil Hapus Foto Profile');
            }
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
    public function postSignatureUploadDeleteKepalaBiroSDM(Request $request)
    {
        try {
            $id = Auth::guard('human_resources')->user()->id;
            $photo = HumanResource::find($id);

            if($photo) {
                $sdm = Auth::guard('human_resources')->user()->username;
                $file = storage_path('app/public/sdm/headOfHumanResources/signature/') . $photo->signature;

                if (file_exists($file) && $photo->signature != null) {
                    unlink($file);
                }

                DB::table('human_resources')->where('id', $id)->update(['signature' => null]);
                alert()->success('Berhasil Hapus Tanda Tangan')->autoclose(25000);
                return redirect()->back()->with('message-update-photo-success', 'Berhasil Hapus Tanda Tangan');
            }
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
    public function changePasswordUpdateKepalaBiroSDM(Request $request)
    {
        // Validasi Change Password
        $validate = Validator::make(
            $request->all(),
            [
                'oldPassword'                           =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/',
                'password'                              =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed|different:oldPassword',
                'password_confirmation'                 =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
            ],
            [
                'oldPassword.required'                  =>      'Password Sekarang Wajib Diisi!',
                'password.required'                     =>      'Password Baru Wajib Diisi!',
                'password_confirmation.required'        =>      'Konfirmasi Password Baru Wajib Diisi!',
                //
                'oldPassword.min'                       =>      'Password Sekarang Minimal 6 Karakter!',
                'password.min'                          =>      'Password Baru Minimal 6 Karakter!',
                'password_confirmation.min'             =>      'Konfirmasi Password Baru Minimal 6 Karakter!',
                //
                'oldPassword.max'                       =>      'Password Sekarang Maksimal 100 Karakter!',
                'password.max'                          =>      'Password Baru Maksimal 100 Karakter!',
                'password_confirmation.max'             =>      'Konfirmasi Password Baru Maksimal 100 Karakter!',
                //
                'password.confirmed'                    =>      'Password Baru Tidak Sama Dengan Konfirmasi Password Baru!',
                //
                'password_confirmation.same'            =>      'Konfirmasi Password Baru Harus Sama Dengan Password Baru!',
                //
                'oldPassword.regex'                     =>      'Format Password Sekarang Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                'password.regex'                        =>      'Format Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                'password_confirmation.regex'           =>      'Format Konfirmasi Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                //
                'password.different'                    =>      'Password Baru Harus Berbeda Dari Password Sekarang!',
            ]
        );

        if ($validate->fails()) {
            alert()->error('Gagal Update Password!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-update-password-error', 'Gagal Update Password')->withErrors($validate)->withInput($request->all());
        }

        $currentPassword        =       Auth::guard('human_resources')->user()->password;
        $oldPassword            =       request('oldPassword');

        if (Hash::check($oldPassword, $currentPassword)) {
            Auth::guard('human_resources')->user()->update([
                'password' => Hash::make($request['password'])
            ]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect()->back()->with('message-update-password-success', 'Berhasil Update Password');
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


    /**
     * Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
     * Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
     * Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
     *
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfileKepalaBagianPenghargaanDisiplindanTataUsaha()
    {
        try {
            return view('layouts.sdm.content.profile.profile');
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
    public function postProfileKepalaBagianPenghargaanDisiplindanTataUsaha(Request $request)
    {
        try {
            // Get Id SDM
            $id = Auth::guard('human_resources')->user()->id;
            $sdm = HumanResource::find($id);

            if($sdm) {
                $validate = null;
                if ($request['email'] === Auth::guard('human_resources')->user()->email || $request['username'] === Auth::guard('human_resources')->user()->username) {
                    // Validasi Update
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                     =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                            'email'                         =>      'required|string|email',
                        ],
                        [
                            'full_name.required'            =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'             =>      'Username Wajib Diisi!',
                            'email.required'                =>      'Email Wajib Diisi!',
                            //
                            'full_name.min'                 =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                  =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                 =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                  =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                   =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
                            //
                        ]
                    );
                } else {
                    // Validasi Update
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                     =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/|unique:admins,username',
                            'email'                         =>      'required|string|email|unique:admins,email',
                        ],
                        [
                            'full_name.required'            =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'             =>      'Username Wajib Diisi!',
                            'email.required'                =>      'Email Wajib Diisi!',
                            //
                            'full_name.min'                 =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                  =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                 =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                  =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                   =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
                            //
                            'username.unique'               =>      'Username Sudah Ada',
                            'email.unique'                  =>      'Alamat Email Sudah Ada',
                            //
                            'full_name.regex'               =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                            'username.regex'                =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                            //
                        ]
                    );
                }

                if ($validate->fails()) {
                    alert()->error('Gagal Update Profile!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-profile-error', 'Gagal Update Profile')->withErrors($validate)->withInput($request->all());
                }

                $sdm->full_name   = $request['full_name'];
                $sdm->username    = $request['username'];
                $sdm->email       = $request['email'];

                $sdm->save();

                alert()->success('Berhasil Update Profile')->autoclose(25000);
                return redirect()->back()->with('message-profile-success', 'Berhasil Update Profile');
            } else {
                alert()->error('Gagal Update Profile!')->autoclose(25000);
            }
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
    public function postImageUploadKepalaBagianPenghargaanDisiplindanTataUsaha(Request $request)
    {
        try {
            // Validasi Image
            $validate = Validator::make(
                $request->all(),
                [
                    'photo_profile'                 =>      'required|image|mimes:jpg,jpeg,png|max:2048',
                ],
                [
                    'photo_profile.required'        =>      'Foto Wajib Diisi!',
                    'photo_profile.image'           =>      'Diupload Harus Berupa Foto!',
                    'photo_profile.mimes'           =>      'Extension Foto Harus Berupa jpg, jpeg, png',
                    'photo_profile.max'             =>      'Maksimal Foto Upload 2Mb (2048 Kb). Jika Foto Tetap Diupload, Cobalah Untuk Memperkecil Resolusi Foto Dibawah 2MB',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Update Foto Profile!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-photo-error', 'Gagal Update Foto Profile')->withErrors($validate)->withInput($request->all());
            }

            if ($request->hasFile('photo_profile')) {
                if ($request->oldImage) {
                    // Get SDM Username
                    $sdm = Auth::guard('human_resources')->user()->username;

                    $file = storage_path('app/public/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/') . $sdm . '/' . $request->oldImage;
                    if (file_exists($file)) {
                        unlink($file);
                    }

                    // Get File Image
                    $photoProfile = $request->file('photo_profile');
                    // Get Original Name
                    // $photoName      =   $photoProfile->getClientOriginalName();
                    // Get Original Extension
                    $photoExtension =   $photoProfile->getClientOriginalExtension();

                    // Get Id Auth SDM
                    $id = Auth::guard('human_resources')->user()->id;
                    // Get SDM Username
                    $sdm = Auth::guard('human_resources')->user()->username;
                    // Photo Name
                    $photoName = $id . '_' . $sdm . '_' . date('d-m-Y') . $photoExtension;

                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();

                    // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
                    if (Auth::guard('human_resources')->user()->role == 2) {
                        $photoProfile->move(public_path('storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/' . $sdm), $photoName);
                    }

                    // Find Auth SDM Active storage_path($folder)
                    $id = Auth::guard('human_resources')->user()->id;
                    $sdm = HumanResource::find($id);

                    // Save Photo To Database
                    $sdm->photo_profile = $photoName;
                    $sdm->save();

                    alert()->success('Berhasil Update Foto')->autoclose(25000);
                    return redirect()->back()->with('message-photo-success', 'Berhasil Update Foto Profile');
                }

                // Get File Image
                $photoProfile = $request->file('photo_profile');
                // Get Original Name
                // $photoName      =   $photoProfile->getClientOriginalName();
                // Get Original Extension
                $photoExtension =   $photoProfile->getClientOriginalExtension();

                // Get Id Auth SDM
                $id = Auth::guard('human_resources')->user()->id;
                // Get SDM Username
                $sdm = Auth::guard('human_resources')->user()->username;
                // Photo Name
                $photoName = $id . '_' . $sdm . '_' . date('d-m-Y') . $photoExtension;

                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
                if (Auth::guard('human_resources')->user()->role == 2) {
                    $photoProfile->move(public_path('storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/' . $sdm), $photoName);
                }

                // Find Auth SDM Active storage_path($folder)
                $id = Auth::guard('human_resources')->user()->id;
                $sdm = HumanResource::find($id);

                // Save Photo To Database
                $sdm->photo_profile = $photoName;
                $sdm->save();

                alert()->success('Berhasil Update Foto')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Update Foto Profile');
            }

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
    public function postSignatureUploadKepalaBagianPenghargaanDisiplindanTataUsaha(Request $request)
    {
        try {
            // Validasi Image
            $validate = Validator::make(
                $request->all(),
                [
                    'signature'                 =>      'required|image|mimes:jpg,jpeg,png|max:2048',
                ],
                [
                    'signature.required'        =>      'Foto Wajib Diisi!',
                    'signature.image'           =>      'Diupload Harus Berupa Foto!',
                    'signature.mimes'           =>      'Extension Foto Harus Berupa jpg, jpeg, png',
                    'signature.max'             =>      'Maksimal Foto Upload 2Mb (2048 Kb). Jika Foto Tetap Diupload, Cobalah Untuk Memperkecil Resolusi Foto Dibawah 2MB',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Update Tanda Tangan!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-photo-error', 'Gagal Update Tanda Tangan')->withErrors($validate)->withInput($request->all());
            }

            if ($request->hasFile('signature')) {
                if ($request->oldSignature) {
                    // Get SDM Username
                    $sdm = Auth::guard('human_resources')->user()->username;

                    $file = storage_path('app/public/sdm/headOfDisciplinaryAwardsAndAdministration/signature/') . $request->oldSignature;

                    if (file_exists($file)) {
                        unlink($file);
                    }

                    // Get File Image
                    $photoProfile = $request->file('signature');
                    // Get Original Name
                    // $photoName      =   $photoProfile->getClientOriginalName();
                    // Get Original Extension
                    $photoExtension =   $photoProfile->getClientOriginalExtension();

                    // Get Id Auth SDM
                    $id         =   Auth::guard('human_resources')->user()->id;
                    // Get SDM Username
                    $sdm        =   Auth::guard('human_resources')->user()->username;
                    // Photo Name
                    $photoName  =   $sdm . '/' . $sdm;

                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();

                    // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
                    if (Auth::guard('human_resources')->user()->role == 2) {
                        $photoProfile->move(public_path('storage/sdm/headOfDisciplinaryAwardsAndAdministration/signature/' . $sdm), $photoName);
                    }

                    // Find Auth SDM Active storage_path($folder)
                    $id = Auth::guard('human_resources')->user()->id;
                    $sdm = HumanResource::find($id);

                    // Save Photo To Database
                    $sdm->signature = $photoName;
                    $sdm->save();

                    alert()->success('Berhasil Update Tanda Tangan')->autoclose(25000);
                    return redirect()->back()->with('message-photo-success', 'Berhasil Update Tanda Tangan');
                }

                // Get File Image
                $photoProfile = $request->file('signature');
                // Get Original Name
                // $photoName      =   $photoProfile->getClientOriginalName();
                // Get Original Extension
                $photoExtension =   $photoProfile->getClientOriginalExtension();

                // Get Id Auth SDM
                $id         =   Auth::guard('human_resources')->user()->id;
                // Get SDM Username
                $sdm        =   Auth::guard('human_resources')->user()->username;
                // Photo Name
                $photoName  =   $sdm . '/' . $sdm;

                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
                if (Auth::guard('human_resources')->user()->role == 2) {
                    $photoProfile->move(public_path('storage/sdm/headOfDisciplinaryAwardsAndAdministration/signature/' . $sdm), $photoName);
                }

                // Find Auth SDM Active storage_path($folder)
                $id = Auth::guard('human_resources')->user()->id;
                $sdm = HumanResource::find($id);

                // Save Photo To Database
                $sdm->signature = $photoName;
                $sdm->save();

                alert()->success('Berhasil Update Tanda Tangan')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Update Tanda Tangan');
            }

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
    public function postImageDeleteKepalaBagianPenghargaanDisiplindanTataUsaha(Request $request)
    {
        try {
            $id = Auth::guard('human_resources')->user()->id;
            $photo = HumanResource::find($id);

            if($photo) {
                $sdm = Auth::guard('human_resources')->user()->username;
                $file = storage_path('app/public/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/') . $sdm . '/' . $photo->photo_profile;

                if (file_exists($file) && $photo->photo_profile != null) {
                    unlink($file);
                }

                DB::table('human_resources')->where('id', $id)->update(['photo_profile' => null]);
                alert()->success('Berhasil Hapus Foto')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Hapus Foto Profile');
            }
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
    public function postSignatureUploadDeleteKepalaBagianPenghargaanDisiplindanTataUsaha(Request $request)
    {
        try {
            $id = Auth::guard('human_resources')->user()->id;
            $photo = HumanResource::find($id);

            if($photo) {
                $sdm = Auth::guard('human_resources')->user()->username;
                $file = storage_path('app/public/sdm/headOfDisciplinaryAwardsAndAdministration/signature/') . $photo->signature;

                if (file_exists($file) && $photo->signature != null) {
                    unlink($file);
                }

                DB::table('human_resources')->where('id', $id)->update(['signature' => null]);
                alert()->success('Berhasil Hapus Tanda Tangan')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Hapus Tanda Tangan');
            }
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
    public function changePasswordUpdateKepalaBagianPenghargaanDisiplindanTataUsaha(Request $request)
    {
        // Validasi Change Password
        $validate = Validator::make(
            $request->all(),
            [
                'oldPassword'                           =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/',
                'password'                              =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed|different:oldPassword',
                'password_confirmation'                 =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
            ],
            [
                'oldPassword.required'                  =>      'Password Sekarang Wajib Diisi!',
                'password.required'                     =>      'Password Baru Wajib Diisi!',
                'password_confirmation.required'        =>      'Konfirmasi Password Baru Wajib Diisi!',
                //
                'oldPassword.min'                       =>      'Password Sekarang Minimal 6 Karakter!',
                'password.min'                          =>      'Password Baru Minimal 6 Karakter!',
                'password_confirmation.min'             =>      'Konfirmasi Password Baru Minimal 6 Karakter!',
                //
                'oldPassword.max'                       =>      'Password Sekarang Maksimal 100 Karakter!',
                'password.max'                          =>      'Password Baru Maksimal 100 Karakter!',
                'password_confirmation.max'             =>      'Konfirmasi Password Baru Maksimal 100 Karakter!',
                //
                'password.confirmed'                    =>      'Password Baru Tidak Sama Dengan Konfirmasi Password Baru!',
                //
                'password_confirmation.same'            =>      'Konfirmasi Password Baru Harus Sama Dengan Password Baru!',
                //
                'oldPassword.regex'                     =>      'Format Password Sekarang Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                'password.regex'                        =>      'Format Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                'password_confirmation.regex'           =>      'Format Konfirmasi Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                //
                'password.different'                    =>      'Password Baru Harus Berbeda Dari Password Sekarang!',
            ]
        );

        if ($validate->fails()) {
            alert()->error('Gagal Update Password!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-error-password', 'Gagal Update Password')->withErrors($validate)->withInput($request->all());
        }

        $currentPassword        =       Auth::guard('human_resources')->user()->password;
        $oldPassword            =       request('oldPassword');

        if (Hash::check($oldPassword, $currentPassword)) {
            Auth::guard('human_resources')->user()->update([
                'password' => Hash::make($request['password'])
            ]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect()->back()->with('message-update-success', 'Berhasil Update Password');
        }
    }


    /**
     * Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
     * Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
     * Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
     *
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfileKepalaSubbagianPenghargaanDisiplindanPensiun()
    {
        try {
            return view('layouts.sdm.content.profile.profile');
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
    public function postProfileKepalaSubbagianPenghargaanDisiplindanPensiun(Request $request)
    {
        try {
            // Get Id SDM
            $id = Auth::guard('human_resources')->user()->id;
            $sdm = HumanResource::find($id);

            if($sdm) {
                $validate = null;
                if ($request['email'] === Auth::guard('human_resources')->user()->email && $request['username'] === Auth::guard('human_resources')->user()->username) {
                    // Validasi Update
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                     =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                            'email'                         =>      'required|string|email',
                        ],
                        [
                            'full_name.required'            =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'             =>      'Username Wajib Diisi!',
                            'email.required'                =>      'Email Wajib Diisi!',
                            //
                            'full_name.min'                 =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                  =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                 =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                  =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                   =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
                            //
                            'full_name.regex'               =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                            'username.regex'                =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                            //
                        ]
                    );
                } else {
                    // Validasi Update
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                     =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/|unique:admins,username',
                            'email'                         =>      'required|string|email|unique:admins,email',
                        ],
                        [
                            'full_name.required'            =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'             =>      'Username Wajib Diisi!',
                            'email.required'                =>      'Email Wajib Diisi!',
                            //
                            'full_name.min'                 =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                  =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                 =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                  =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                   =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
                            //
                            'username.unique'               =>      'Username Sudah Ada',
                            'email.unique'                  =>      'Alamat Email Sudah Ada',
                            //
                            'full_name.regex'               =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                            'username.regex'                =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                            //
                        ]
                    );
                }

                if ($validate->fails()) {
                    alert()->error('Gagal Update Profile!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-profile-error', 'Gagal Update Profile')->withErrors($validate)->withInput($request->all());
                }

                $sdm->full_name   = $request['full_name'];
                $sdm->username    = $request['username'];
                $sdm->email       = $request['email'];

                $sdm->save();

                alert()->success('Berhasil Update Profile')->autoclose(25000);
                return redirect()->back()->with('message-update-profile-success', 'Berhasil Update Profile');
            } else {
                alert()->error('Gagal Update Profile!')->autoclose(25000);
            }
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
    public function postImageUploadKepalaSubbagianPenghargaanDisiplindanPensiun(Request $request)
    {
        try {
            // Validasi Image
            $validate = Validator::make(
                $request->all(),
                [
                    'photo_profile'                 =>      'required|image|mimes:jpg,jpeg,png|max:2048',
                ],
                [
                    'photo_profile.required'        =>      'Foto Wajib Diisi!',
                    'photo_profile.image'           =>      'Diupload Harus Berupa Foto!',
                    'photo_profile.mimes'           =>      'Extension Foto Harus Berupa jpg, jpeg, png',
                    'photo_profile.max'             =>      'Maksimal Foto Upload 2Mb (2048 Kb). Jika Foto Tetap Diupload, Cobalah Untuk Memperkecil Resolusi Foto Dibawah 2MB',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Update Foto Profile!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-photo-error', 'Gagal Update Foto Profile')->withErrors($validate)->withInput($request->all());
            }

            if ($request->hasFile('photo_profile')) {
                if ($request->oldImage) {
                    // Get SDM Username
                    $sdm = Auth::guard('human_resources')->user()->username;

                    $file = storage_path('app/public/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/') . $sdm . '/' . $request->oldImage;
                    if (file_exists($file)) {
                        unlink($file);
                    }

                    // Get File Image
                    $photoProfile = $request->file('photo_profile');
                    // Get Original Name
                    // $photoName      =   $photoProfile->getClientOriginalName();
                    // Get Original Extension
                    $photoExtension =   $photoProfile->getClientOriginalExtension();

                    // Get Id Auth SDM
                    $id = Auth::guard('human_resources')->user()->id;
                    // Get SDM Username
                    $sdm = Auth::guard('human_resources')->user()->username;
                    // Photo Name
                    $photoName = $id . '_' . $sdm . '_' . date('d-m-Y') . $photoExtension;

                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();


                    // Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
                    if (Auth::guard('human_resources')->user()->role == 3) {
                        $photoProfile->move(public_path('storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/' . $sdm), $photoName);
                    }

                    // Find Auth SDM Active storage_path($folder)
                    $id = Auth::guard('human_resources')->user()->id;
                    $sdm = HumanResource::find($id);

                    // Save Photo To Database
                    $sdm->photo_profile = $photoName;
                    $sdm->save();

                    alert()->success('Berhasil Update Foto')->autoclose(25000);
                    return redirect()->back()->with('message-photo-success', 'Berhasil Update Foto Profile');
                }

                // Get File Image
                $photoProfile = $request->file('photo_profile');
                // Get Original Name
                // $photoName      =   $photoProfile->getClientOriginalName();
                // Get Original Extension
                $photoExtension =   $photoProfile->getClientOriginalExtension();

                // Get Id Auth SDM
                $id = Auth::guard('human_resources')->user()->id;
                // Get SDM Username
                $sdm = Auth::guard('human_resources')->user()->username;
                // Photo Name
                $photoName = $id . '_' . $sdm . '_' . date('d-m-Y') . $photoExtension;

                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();


                // Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
                if (Auth::guard('human_resources')->user()->role == 3) {
                    $photoProfile->move(public_path('storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/' . $sdm), $photoName);
                }

                // Find Auth SDM Active storage_path($folder)
                $id = Auth::guard('human_resources')->user()->id;
                $sdm = HumanResource::find($id);

                // Save Photo To Database
                $sdm->photo_profile = $photoName;
                $sdm->save();

                alert()->success('Berhasil Update Foto')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Update Foto Profile');
            }

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
    public function postSignatureUploadKepalaSubbagianPenghargaanDisiplindanPensiun(Request $request)
    {
        try {
            // Validasi Image
            $validate = Validator::make(
                $request->all(),
                [
                    'signature'                 =>      'required|image|mimes:jpg,jpeg,png|max:2048',
                ],
                [
                    'signature.required'        =>      'Foto Tanda Tangan Wajib Diisi!',
                    'signature.image'           =>      'Diupload Harus Berupa Foto Tanda Tangan!',
                    'signature.mimes'           =>      'Extension Foto Tanda Tangan Harus Berupa jpg, jpeg, png',
                    'signature.max'             =>      'Maksimal Foto Tanda Tangan Upload 2Mb (2048 Kb). Jika Foto Tanda Tangan Tetap Diupload, Cobalah Untuk Memperkecil Resolusi Foto Tanda Tangan Dibawah 2MB',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Update Tanda Tangan!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-photo-error', 'Gagal Update Tanda Tangan')->withErrors($validate)->withInput($request->all());
            }

            if ($request->hasFile('signature')) {
                if ($request->oldSignature) {
                    // Get SDM Username
                    $sdm = Auth::guard('human_resources')->user()->username;

                    $file = storage_path('app/public/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/') . $request->oldSignature;

                    if (file_exists($file)) {
                        unlink($file);
                    }

                    // Get File Image
                    $photoProfile = $request->file('signature');
                    // Get Original Name
                    // $photoName      =   $photoProfile->getClientOriginalName();
                    // Get Original Extension
                    $photoExtension =   $photoProfile->getClientOriginalExtension();

                    // Get Id Auth SDM
                    $id         =   Auth::guard('human_resources')->user()->id;
                    // Get SDM Username
                    $sdm        =   Auth::guard('human_resources')->user()->username;
                    // Photo Name
                    $photoName  =   $sdm . '/' . $sdm;

                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();

                    // Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
                    if (Auth::guard('human_resources')->user()->role == 3) {
                        $photoProfile->move(public_path('storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/' . $sdm), $photoName);
                    }

                    // Find Auth SDM Active storage_path($folder)
                    $id = Auth::guard('human_resources')->user()->id;
                    $sdm = HumanResource::find($id);

                    // Save Photo To Database
                    $sdm->signature = $photoName;
                    $sdm->save();

                    alert()->success('Berhasil Update Tanda Tangan')->autoclose(25000);
                    return redirect()->back()->with('message-photo-success', 'Berhasil Update Tanda Tangan');
                }

                // Get File Image
                $photoProfile   =   $request->file('signature');
                // Get Original Name
                // $photoName      =   $photoProfile->getClientOriginalName();
                // Get Original Extension
                $photoExtension =   $photoProfile->getClientOriginalExtension();

                // Get Id Auth SDM
                $id             =   Auth::guard('human_resources')->user()->id;
                // Get SDM Username
                $sdm            =   Auth::guard('human_resources')->user()->username;
                // Photo Name
                $photoName      =   $sdm . '/' . $sdm;

                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();


                // Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
                if (Auth::guard('human_resources')->user()->role == 3) {
                    $photoProfile->move(public_path('storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/' . $sdm), $photoName);
                }

                // Find Auth SDM Active storage_path($folder)
                $id = Auth::guard('human_resources')->user()->id;
                $sdm = HumanResource::find($id);

                // Save Photo To Database
                $sdm->signature = $photoName;
                $sdm->save();

                alert()->success('Berhasil Update Foto')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Update Foto Profile');
            }

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
    public function postImageDeleteKepalaSubbagianPenghargaanDisiplindanPensiun(Request $request)
    {
        try {
            $id = Auth::guard('human_resources')->user()->id;
            $photo = HumanResource::find($id);

            if($photo) {
                $sdm = Auth::guard('human_resources')->user()->username;
                $file = storage_path('app/public/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/') . $sdm . '/' . $photo->photo_profile;
                if (file_exists($file) && $photo->photo_profile != null) {
                    unlink($file);
                }
                DB::table('human_resources')->where('id', $id)->update(['photo_profile' => null]);
                alert()->success('Berhasil Hapus Foto')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Hapus Foto Profile');
            }
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
    public function postSignatureUploadDeleteKepalaSubbagianPenghargaanDisiplindanPensiun(Request $request)
    {
        try {
            $id = Auth::guard('human_resources')->user()->id;
            $photo = HumanResource::find($id);

            if($photo) {
                $sdm = Auth::guard('human_resources')->user()->username;
                $file = storage_path('app/public/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/') . $photo->signature;

                if (file_exists($file) && $photo->signature != null) {
                    unlink($file);
                }

                DB::table('human_resources')->where('id', $id)->update(['signature' => null]);
                alert()->success('Berhasil Hapus Tanda tangan')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Hapus Tanda tangan');
            }
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
    public function changePasswordUpdateKepalaSubbagianPenghargaanDisiplindanPensiun(Request $request)
    {
        // Validasi Change Password
        $validate = Validator::make(
            $request->all(),
            [
                'oldPassword'                           =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/',
                'password'                              =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed|different:oldPassword',
                'password_confirmation'                 =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
            ],
            [
                'oldPassword.required'                  =>      'Password Sekarang Wajib Diisi!',
                'password.required'                     =>      'Password Baru Wajib Diisi!',
                'password_confirmation.required'        =>      'Konfirmasi Password Baru Wajib Diisi!',
                //
                'oldPassword.min'                       =>      'Password Sekarang Minimal 6 Karakter!',
                'password.min'                          =>      'Password Baru Minimal 6 Karakter!',
                'password_confirmation.min'             =>      'Konfirmasi Password Baru Minimal 6 Karakter!',
                //
                'oldPassword.max'                       =>      'Password Sekarang Maksimal 100 Karakter!',
                'password.max'                          =>      'Password Baru Maksimal 100 Karakter!',
                'password_confirmation.max'             =>      'Konfirmasi Password Baru Maksimal 100 Karakter!',
                //
                'password.confirmed'                    =>      'Password Baru Tidak Sama Dengan Konfirmasi Password Baru!',
                //
                'password_confirmation.same'            =>      'Konfirmasi Password Baru Harus Sama Dengan Password Baru!',
                //
                'oldPassword.regex'                     =>      'Format Password Sekarang Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                'password.regex'                        =>      'Format Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                'password_confirmation.regex'           =>      'Format Konfirmasi Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                //
                'password.different'                    =>      'Password Baru Harus Berbeda Dari Password Sekarang!',
            ]
        );

        if ($validate->fails()) {
            alert()->error('Gagal Update Password!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-error-password', 'Gagal Update Password')->withErrors($validate)->withInput($request->all());
        }

        $currentPassword        =       Auth::guard('human_resources')->user()->password;
        $oldPassword            =       request('oldPassword');

        if (Hash::check($oldPassword, $currentPassword)) {
            Auth::guard('human_resources')->user()->update([
                'password' => Hash::make($request['password'])
            ]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect()->back()->with('message-update-success', 'Berhasil Update Password');
        }
    }

}
