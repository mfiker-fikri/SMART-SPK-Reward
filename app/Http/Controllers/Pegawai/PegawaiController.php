<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;
// use Nette\Utils\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;

use Intervention\Image\Facades\Image;

use App\Models\Pegawai;

class PegawaiController extends Controller
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
    public function getProfile()
    {
        try {
            return view('layouts.pegawai.content.profile.profile');
        } catch (\Exception $exception) {
            return $exception;
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
    // public function update(Request $request, $id)
    public function postProfile(Request $request)
    {
        //
        try {
            // Get Id Employee
            $id = Auth::guard('employees')->user()->id;
            $pegawai = Pegawai::find($id);

            // dd($pegawai;
            if ($pegawai) {
                $validate = null;
                if ($request['email'] === Auth::guard('employees')->user()->email || $request['username'] === Auth::guard('employees')->user()->username) {
                    // Validasi Update
                    // Validator::extend('valid_username', function ($attr, $value) {
                    //     return preg_match('/^\S*$/u', $value);
                    // });
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                     =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                            'email'                         =>      'required|string|email',
                            //
                            'place_birth'                   =>      'required',
                            'date_birth'                    =>      'required|date',
                            // date_format:d/m/y
                            //
                            'nip'                           =>      'required|regex:/^(?![._-])(?!.*[._-]$)(?!.*\d_-)(?!.*_-d)[0-9]+$/',
                            'pendidikan_terakhir'           =>      'required',
                            // |regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z.\s]+$/',
                            'pangkat'                       =>      'required|regex:/[a-zA-Z0-9]+$/',
                            'golongan_ruang'                =>      'required|regex:/[a-zA-Z0-9-]+$/',
                            'sk_cpns'                       =>      'required|regex:/[a-zA-Z0-9.\s-]+$/',
                            'jabatan_terakhir'              =>      'required|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z.\s]+$/',
                            'unit_kerja'                    =>      'required|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z.\s]+$/',
                        ],
                        [
                            'full_name.required'            =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'             =>      'Username Wajib Diisi!',
                            'email.required'                =>      'Email Wajib Diisi!',
                            //
                            'place_birth.required'          =>      'Tempat Lahir Wajib Diisi!',
                            'date_birth.required'           =>      'Tanggal Lahir Wajib Diisi!',
                            //
                            'nip.required'                  =>      'NIP Wajib Diisi!',
                            'pendidikan_terakhir.required'  =>      'Pendidikan Terakhir Wajib Diisi!',
                            'pangkat.required'              =>      'Pangkat Wajib Diisi!',
                            'golongan_ruang.required'       =>      'Golongan Ruang Wajib Diisi!',
                            'sk_cpns.required'              =>      'SK CPNS Wajib Diisi!',
                            'jabatan_terakhir.required'     =>      'Jabatan Wajib Diisi!',
                            'unit_kerja.required'           =>      'Unit Kerja Wajib Diisi!',
                            //
                            'full_name.min'                 =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                  =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                 =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                  =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                   =>      'Email Tidak Valid! (Gunakan @ serta.com/.co.id/dll)',
                            //
                            // 'place_birth'                   =>      'Tempat Lahir Wajib Diisi!',
                            'date_birth.date'               =>      'Tidak Sesuai Tanggal!',
                            //
                            'full_name.regex'               =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                            'username.regex'                =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                            //
                            'nip.regex'                     =>      'NIP Hanya Menggunakan Angka!',
                            // 'pendidikan_terakhir.regex'     =>      'Pendidikan Terakhir Wajib Diisi!',
                            'pangkat.regex'                 =>      'Pangkat Tidak Sesuai!',
                            'golongan_ruang.regex'          =>      'Golongan Ruang Tidak Sesuai!',
                            'sk_cpns.regex'                 =>      'SK CPNS Tidak Sesuai!',
                            'jabatan_terakhir.regex'        =>      'Jabatan Tidak Sesuai!',
                            'unit_kerja.regex'              =>      'Unit Kerja Tidak Sesuai!',
                        ]
                    );
                } else {
                    // Validasi Update
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                     =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/|unique:employees,username',
                            'email'                         =>      'required|string|email|unique:employees,email',
                            //
                            'place_birth'                   =>      'required',
                            'date_birth'                    =>      'required|date',
                            //
                            'nip'                           =>      'required|regex:/^(?![._-])(?!.*[._-]$)(?!.*\d_-)(?!.*_-d)[0-9]+$/',
                            'pendidikan_terakhir'           =>      'required',
                            // |regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z.\s]+$/',
                            'pangkat'                       =>      'required|regex:/[a-zA-Z0-9]+$/',
                            'golongan_ruang'                =>      'required|regex:/[a-zA-Z0-9-]+$/',
                            'sk_cpns'                       =>      'required|regex:/[a-zA-Z0-9.\s-]+$/',
                            'jabatan_terakhir'              =>      'required|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d))[a-zA-Z.\s]+$/',
                            'unit_kerja'                    =>      'required|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z.\s]+$/',
                        ],
                        [
                            'full_name.required'            =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'             =>      'Username Wajib Diisi!',
                            'email.required'                =>      'Email Wajib Diisi!',
                            //
                            'place_birth.required'          =>      'Tempat Lahir Wajib Diisi!',
                            'date_birth.required'           =>      'Tanggal Lahir Wajib Diisi!',
                            //
                            'nip.required'                  =>      'NIP Wajib Diisi!',
                            'pendidikan_terakhir.required'  =>      'Pendidikan Terakhir Wajib Diisi!',
                            'pangkat.required'              =>      'Pangkat Wajib Diisi!',
                            'golongan_ruang.required'       =>      'Golongan Ruang Wajib Diisi!',
                            'sk_cpns.required'              =>      'SK CPNS Wajib Diisi!',
                            'jabatan_terakhir.required'     =>      'Jabatan Wajib Diisi!',
                            'unit_kerja.required'           =>      'Unit Kerja Wajib Diisi!',
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
                            'date_birth.date'               =>      'Tidak Sesuai Tanggal!',
                            //
                            'nip.regex'                     =>      'NIP Hanya Menggunakan Angka!',
                            // 'pendidikan_terakhir.regex'     =>      'Pendidikan Terakhir Wajib Diisi!',
                            'pangkat.regex'                 =>      'Pangkat Tidak Sesuai!',
                            'golongan_ruang.regex'          =>      'Golongan Ruang Tidak Sesuai!',
                            'sk_cpns.regex'                 =>      'SK CPNS Tidak Sesuai!',
                            'jabatan_terakhir.regex'        =>      'Jabatan Tidak Sesuai!',
                            'unit_kerja.regex'              =>      'Unit Kerja Tidak Sesuai!',
                        ]
                    );
                }

                if ($validate->fails()) {
                    alert()->error('Gagal Update Profile!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-profile-error', 'Gagal Update Profile')->withErrors($validate)->withInput($request->all());
                }

                $pegawai->full_name                 = $request['full_name'];
                $pegawai->username                  = $request['username'];
                $pegawai->email                     = $request['email'];
                //
                $pegawai->place_birth               = $request['place_birth'];
                $pegawai->date_birth                = date('Y-m-d', strtotime($request['date_birth']));
                //
                $pegawai->nip                       = $request['nip'];
                $pegawai->pendidikan_terakhir       = $request['pendidikan_terakhir'];
                $pegawai->pangkat                   = $request['pangkat'];
                $pegawai->golongan_ruang            = $request['golongan_ruang'];
                $pegawai->sk_cpns                   = $request['sk_cpns'];
                $pegawai->jabatan_terakhir          = $request['jabatan_terakhir'];
                $pegawai->unit_kerja                = $request['unit_kerja'];

                $pegawai->save();

                alert()->success('Berhasil Update Profile')->autoclose(25000);
                return redirect()->back()->with('message-update-profile-success', 'Berhasil Update Profile');
            } else {
                alert()->error('Gagal Update Profile!')->autoclose(25000);
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postImageUpload(Request $request)
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
                // Jika Ada Foto Sebelumnya
                if ($request->oldImage) {
                    // Delete Photo Before Previous
                    // Storage::delete($request->oldImage);

                    // Get File Image
                    $photoProfile               =       $request->file('photo_profile');

                    // Get Original Extension
                    $photoExtension             =       $photoProfile->getClientOriginalExtension();

                    // Get Id Auth Employee
                    $id                         =       Auth::guard('employees')->user()->id;
                    // Get Employee Username
                    $employee                   =       Auth::guard('employees')->user()->username;
                    // Photo Name
                    $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;

                    // Save Photo Name in Storage With Resize 100x100
                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();

                    $photoProfile->storeAs('public/employees/photos/photoProfile/' . $employee, $photoName);

                    // Find Auth Employee Active storage_path($folder)
                    $id                         =       Auth::guard('employees')->user()->id;
                    $employee                   =       Pegawai::find($id);
                    // Save Photo To Database
                    $employee->photo_profile = $photoName;
                    $employee->save();

                    alert()->success('Berhasil Update Foto')->autoclose(25000);
                    return redirect()->back()->with('message-photo-success', 'Berhasil Update Foto Profile');
                }

                // Get File Image
                $photoProfile               =       $request->file('photo_profile');

                // Get Original Extension
                $photoExtension             =       $photoProfile->getClientOriginalExtension();

                // Get Id Auth Employee
                $id                         =       Auth::guard('employees')->user()->id;
                // Get Employee Username
                $employee                   =       Auth::guard('employees')->user()->username;
                // Photo Name
                $photoName                  =       $id . '_' . $employee . '_' . date('d-m-Y') . $photoExtension;

                // Save Photo Name in Storage With Resize 100x100
                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                // Storage::disk('public')->put('employees/photos/photoProfile/' . $employee . $photoName);
                // $photoProfile->move(public_path('storage/employees/photos/photoProfile/' . $employee, $photoName));
                // $photoProfile->storeAs('employees/photos/photoProfile/' . $employee, $photoName);
                $photoProfile->store('employees/photos/photoProfile/' . $employee, $photoName);

                // Find Auth Employee Active storage_path($folder)
                $id                         =       Auth::guard('employees')->user()->id;
                $employee                   =       Pegawai::find($id);
                // Save Photo To Database
                $employee->photo_profile = $photoName;
                $employee->save();

                alert()->success('Berhasil Tambah Foto')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Tambah Foto Profile');
                //
            }

            alert()->error('Gagal Tambah Foto Profile!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-photo-error', 'Gagal Tambah Foto Profile')->withErrors($validate)->withInput($request->all());
            //
        } catch (\Exception $exception) {
            return $exception;
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postImageDelete(Request $request)
    {
        try {
            // Find Id Auth Emloyee
            $id             =       Auth::guard('employees')->user()->id;
            $photo          =       Pegawai::find($id);

            if ($photo) {
                //
                $employee       =       Auth::guard('employees')->user()->username;
                $file           =       storage_path('app/public/employees/photos/photoProfile/') . $employee . '/' . $photo->photo_profile;
                //
                if (file_exists($file) && $photo->photo_profile != null) {
                    unlink($file);
                }
                //
                $photo->update(['photo_profile' => '']);
                alert()->success('Berhasil Hapus Foto')->autoclose(25000);
                return redirect()->back()->with('message-photo-success', 'Berhasil Hapus Foto Profile');
            }

            alert()->error('Gagal Hapus Foto Profile!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-photo-error', 'Gagal Hapus Foto Profile');
            //
        } catch (\Exception $exception) {
            return $exception;
        }
    }


    /**
     * Change Password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePasswordUpdate(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'oldPassword'                           =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/',
                'password'                              =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed|different:oldPassword',
                'password_confirmation'                 =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
            ],
            [
                'oldPassword.required'                  =>      'Password Lama Wajib Diisi!',
                'password.required'                     =>      'Password Baru Wajib Diisi!',
                'password_confirmation.required'        =>      'Konfirmasi Password Baru Wajib Diisi!',
                //
                'oldPassword.min'                       =>      'Password Lama Minimal 6 Karakter!',
                'password.min'                          =>      'Password Baru Minimal 6 Karakter!',
                'password_confirmation.min'             =>      'Konfirmasi Password Baru Minimal 6 Karakter!',
                //
                'oldPassword.max'                       =>      'Password Lama Maksimal 100 Karakter!',
                'password.max'                          =>      'Password Baru Maksimal 100 Karakter!',
                'password_confirmation.max'             =>      'Konfirmasi Password Baru Maksimal 100 Karakter!',
                //
                'password.confirmed'                    =>      'Password Konfirmasi Tidak Sama Dengan Password Baru!',
                //
                'password_confirmation.same'            =>      'Konfirmasi Password Harus Sama Dengan Password!',
                //
                'oldPassword.regex'                     =>      'Format Password Lama Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                'password.regex'                        =>      'Format Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                //
                'password.different'                    =>      'Password Baru Harus Berbeda Dari Password Lama!',
            ]
        );

        if ($validate->fails()) {
            alert()->error('Gagal Update Password!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-update-password-error', 'Gagal Update Password')->withErrors($validate)->withInput($request->all());
        }

        $currentPassword        =       Auth::guard('employees')->user()->password;
        $oldPassword            =       request('oldPassword');

        if (Hash::check($oldPassword, $currentPassword)) {
            Auth::guard('employees')->user()->update([
                'password' => Hash::make($request['password'])
            ]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect()->back()->with('message-update-password-success', 'Berhasil Update Password');
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
}
