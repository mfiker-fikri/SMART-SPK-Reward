<?php

namespace App\Http\Controllers\HWU;

use App\Http\Controllers\Controller;
use App\Models\HeadWorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class HWUController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('hwu.auth');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('head_work_units');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile()
    {
        try {
            // Get HeadWorkUnit
            // $hwu = HeadWorkUnit::first();
            return view('layouts.hwu.content.profile.profile');
        } catch (\Exception $exception) {
            return $exception;
        }
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
            // Get Id HeadWorkUnit
            $id = Auth::guard('head_work_units')->user()->id;
            $headworkunit = HeadWorkUnit::find($id);

            // dd($headworkunit);
            if ($headworkunit) {
                $validate = null;
                if ($request['email'] === Auth::guard('head_work_units')->user()->email || $request['username'] === Auth::guard('head_work_units')->user()->username) {
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
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/|unique:head_of_work_units,username',
                            'email'                         =>      'required|string|email|unique:head_of_work_units,email',
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
                    return redirect('headworkunit/profile')->with('message-update-profile-error', 'Gagal Update Profile')->withErrors($validate)->withInput($request->all());
                }

                $headworkunit->full_name   = $request['full_name'];
                $headworkunit->username    = $request['username'];
                $headworkunit->email       = $request['email'];

                $headworkunit->save();

                alert()->success('Berhasil Update Profile')->autoclose(25000);
                // $request->session()->flash('success', 'Update Sukses');
                // ddd('sukses');
                return redirect('headworkunit/profile')->with('message-update-profile-success', 'Berhasil Update Profile');
            } else {
                alert()->error('Gagal Update Profile!')->autoclose(25000);
                return redirect('headworkunit/profile')->with('message-update-profile-error', 'Gagal Update Profile');
            }
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
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
                return redirect('headworkunit/profile')->with('message-update-photo-error', 'Gagal Update Foto Profile')->withErrors($validate)->withInput($request->all());
            }

            // ddd($request);
            if ($request->hasFile('photo_profile')) {
                if ($request->oldImage != null) {
                    // Delete Photo Before Previous

                    // Storage::delete($request->oldImage);
                    // Get HeadWorkUnit Username
                    $headworkunit = Auth::guard('head_work_units')->user()->username;

                    // Link Photo
                    // $link   =   'storage/headworkunit/photos/photoProfile/' . $headworkunit . '/' . $request->oldImage;
                    $link   =   storage_path('app/public/headworkunit/photos/photoProfile/') . $headworkunit . '/' . $request->oldImage;
                    // if(File::exists($link)) {
                    //     File::delete($link);
                    // }
                    if (file_exists($link)) {
                        @unlink($link);
                    }

                    // Get File Image
                    $photoProfile = $request->file('photo_profile');
                    // Get Original Name
                    // $photoName      =   $photoProfile->getClientOriginalName();
                    // Get Original Extension
                    $photoExtension =   $photoProfile->getClientOriginalExtension();

                    // Get Id Auth HeadWorkUnit
                    $id = Auth::guard('head_work_units')->user()->id;
                    // Get HeadWorkUnit Username
                    $headworkunit = Auth::guard('head_work_units')->user()->username;
                    // Photo Name
                    $photoName = $id . '_' . $headworkunit . '_' . date('d-m-Y') . $photoExtension;
                    // dd($photoName);Carbon::now()->toDateString('DD/MM/YY')->isoFormat('DD/MM/YY')
                    // getClientOriginalName();
                    // $request->photo_profile->store('public/headworkunit/images/', $request->file->getClientOriginalName());

                    // Save Photo Name in Storage With Resize 100x100
                    // $folder = $request->file('photo_profile')->store('images/headworkunit/images/photoProfile/' . $headworkunit, $photoName);

                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();

                    // $photoProfile->storeAs('public/headworkunit/photos/photoProfile/' . $headworkunit, $photoName);
                    $photoProfile->move(public_path('storage/headworkunit/photos/photoProfile/' . $headworkunit), $photoName);

                    // $request->photo_profile->store('public/headworkunit/images/', $photoName);
                    // Storage::putFileAs('headworkunit/images/' . $photoName, 'public');

                    // Find Auth HeadWorkUnit Active storage_path($folder)
                    $id = Auth::guard('head_work_units')->user()->id;
                    $headworkunit = HeadWorkUnit::find($id);
                    // Save Photo TO Database
                    $headworkunit->photo_profile = $photoName;
                    $headworkunit->save();
                    // dd('berhasil');
                    alert()->success('Berhasil Update Foto')->autoclose(25000);
                    return redirect('headworkunit/profile')->with('message-update-photo-success', 'Berhasil Update Foto Profile');
                }

                // Get File Image
                $photoProfile = $request->file('photo_profile');
                // Get Original Name
                // $photoName      =   $photoProfile->getClientOriginalName();
                // Get Original Extension
                $photoExtension =   $photoProfile->getClientOriginalExtension();

                // Get Id Auth HeadWorkUnit
                $id = Auth::guard('head_work_units')->user()->id;
                // Get HeadWorkUnit Username
                $headworkunit = Auth::guard('head_work_units')->user()->username;
                // Photo Name
                $photoName = $id . '_' . $headworkunit . '_' . date('d-m-Y') . '.' . $photoExtension;
                // dd($photoName);Carbon::now()->toDateString('DD/MM/YY')->isoFormat('DD/MM/YY')
                // getClientOriginalName();
                // $request->photo_profile->store('public/headworkunit/images/', $request->file->getClientOriginalName());

                // Save Photo Name in Storage With Resize 100x100
                // $folder = $request->file('photo_profile')->store('images/headworkunit/images/photoProfile/' . $headworkunit, $photoName);

                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                $photoProfile->move(public_path('storage/headworkunit/photos/photoProfile/' . $headworkunit), $photoName);
                // $photoProfile->storeAs('public/headworkunit/photos/photoProfile/' . $headworkunit, $photoName);

                // $request->photo_profile->store('public/headworkunit/images/', $photoName);
                // Storage::putFileAs('headworkunit/images/' . $photoName, 'public');

                // Find Auth HeadWorkUnit Active storage_path($folder)
                $id = Auth::guard('head_work_units')->user()->id;
                $headworkunit = HeadWorkUnit::find($id);
                // Save Photo TO Database
                $headworkunit->photo_profile = $photoName;
                $headworkunit->save();
                // dd('berhasil');
                alert()->success('Update Foto Berhasil')->autoclose(50000);
                return redirect('headworkunit/profile')->with('message-update-photo-success', 'You have successfully upload image.')->with('image');
            }

            alert()->error('Gagal Tambah Foto Profile!', 'Validasi Gagal')->autoclose(25000);
            return redirect('headworkunit/profile')->with('message-update-photo-error', 'Gagal Tambah Foto Profile')->withErrors($validate)->withInput($request->all());

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
            // $photo = new Pegawai;
            $id = Auth::guard('head_work_units')->user()->id;
            $photo = HeadWorkUnit::find($id);

            if ($photo) {
                $headworkunit = Auth::guard('head_work_units')->user()->username;
                $file = storage_path('app/public/headworkunit/photos/photoProfile/') . $headworkunit . '/' . $photo->photo_profile;
                if (file_exists($file) && $photo->photo_profile != null) {
                    unlink($file);
                }
                DB::table('head_of_work_units')->where('id', $id)->update(['photo_profile' => null]);
                alert()->success('Berhasil Hapus Foto')->autoclose(25000);
                return redirect('headworkunit/profile')->with('message-update-photo-success', 'Berhasil Hapus Foto Profile');
            }

            alert()->error('Gagal Hapus Foto Profile!', 'Validasi Gagal')->autoclose(25000);
            return redirect('headworkunit/profile')->with('message-update-photo-error', 'Gagal Hapus Foto Profile');
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
                'password.confirmed'                    =>      'Password Baru Tidak Sama Dengan Password Konfirmasi!',
                //
                'password_confirmation.same'            =>      'Konfirmasi Password Baru Harus Sama Dengan Password Baru!',
                //
                'oldPassword.regex'                     =>      'Format Password Lama Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Angka!',
                'password.regex'                        =>      'Format Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Angka!',
                'password_confirmation.regex'           =>      'Format Konfirmasi Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Angka!',
                //
                'password.different'                    =>      'Password Baru Harus Berbeda Dari Password Sekarang!',
            ]
        );

        if ($validate->fails()) {
            alert()->error('Gagal Update Password!', 'Validasi Gagal')->autoclose(25000);
            return redirect('headworkunit/profile')->with('message-error-password', 'Gagal Update Password')->withErrors($validate)->withInput($request->all());
        }

        $currentPassword        =       Auth::guard('head_work_units')->user()->password;
        $oldPassword            =       request('oldPassword');

        if (Hash::check($oldPassword, $currentPassword)) {
            Auth::guard('head_work_units')->user()->update([
                'password' => Hash::make($request['password'])
            ]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect('headworkunit/profile')->with('message-update-password-success', 'Berhasil Update Password');
        }

        alert()->error('Gagal Update Password!', 'Password Tidak Sesuai')->autoclose(25000);
        return redirect('headworkunit/profile')->with('message-update-password-error', 'Gagal Update Password, Password Tidak Sesuai');
        // Auth::guard('useres')->user()->update(['password' => bcrypt(request('password'))]);
        // return redirect('headworkunit/profile')->with('message', 'Berhasil Update Password')->with('message-success-password', 'Berhasil Update Password')->with('success', 'Berhasil Update Password');
    }

}
