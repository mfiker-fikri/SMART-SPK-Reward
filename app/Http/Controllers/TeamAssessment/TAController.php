<?php

namespace App\Http\Controllers\TeamAssessment;

use App\Http\Controllers\Controller;
use App\Models\TeamAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class TAController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('team_assessment.auth');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('team_assessments');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile()
    {
        try {
            return view('layouts.teamAssessment.content.profile.profile');
        } catch (\Throwable $th) {
            throw $th;
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
    public function postProfile(Request $request)
    {
        //
        try {
            // Get Id Admin
            $id = Auth::guard('team_assessments')->user()->id;
            $admin = TeamAssessment::find($id);

            // dd($admin);
            if ($admin) {
                $validate = null;
                if ($request['email'] === Auth::guard('team_assessments')->user()->email || $request['username'] === Auth::guard('team_assessments')->user()->username) {
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
                            'username'                      =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/|unique:team_assessments,username',
                            'email'                         =>      'required|string|email|unique:team_assessments,email',
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

                $admin->full_name   = $request['full_name'];
                $admin->username    = $request['username'];
                $admin->email       = $request['email'];

                $admin->save();

                alert()->success('Berhasil Update Profile')->autoclose(25000);
                // $request->session()->flash('success', 'Update Sukses');
                return redirect()->back()->with('message-update-profile-success', 'Berhasil Update Profile');
            } else {
                alert()->error('Gagal Update Profile!')->autoclose(25000);
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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

            // ddd($request);
            if ($request->hasFile('photo_profile')) {
                if ($request->oldImage != null) {
                    // Delete Photo Before Previous

                    // Storage::delete($request->oldImage);
                    // Get Admin Username
                    $admin = Auth::guard('team_assessments')->user()->username;

                    // Link Photo
                    // $link   =   'storage/teamAssesments/photos/photoProfile/' . $admin . '/' . $request->oldImage;
                    $link   =   storage_path('app/public/teamAssesments/photos/photoProfile/') . $admin . '/' . $request->oldImage;
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

                    // Get Id Auth Admin
                    $id = Auth::guard('team_assessments')->user()->id;
                    // Get Admin Username
                    $admin = Auth::guard('team_assessments')->user()->username;
                    // Photo Name
                    $photoName = $id . '_' . $admin . '_' . date('d-m-Y') . $photoExtension;
                    // dd($photoName);Carbon::now()->toDateString('DD/MM/YY')->isoFormat('DD/MM/YY')
                    // getClientOriginalName();
                    // $request->photo_profile->store('public/teamAssesments/images/', $request->file->getClientOriginalName());

                    // Save Photo Name in Storage With Resize 100x100
                    // $folder = $request->file('photo_profile')->store('images/teamAssesments/images/photoProfile/' . $admin, $photoName);

                    $img = Image::make($photoProfile);
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();

                    // $photoProfile->storeAs('public/teamAssesments/photos/photoProfile/' . $admin, $photoName);
                    $photoProfile->move(public_path('storage/teamAssesments/photos/photoProfile/' . $admin), $photoName);

                    // $request->photo_profile->store('public/teamAssesments/images/', $photoName);
                    // Storage::putFileAs('admin/images/' . $photoName, 'public');

                    // Find Auth Admin Active storage_path($folder)
                    $id = Auth::guard('team_assessments')->user()->id;
                    $admin = TeamAssessment::find($id);
                    // Save Photo TO Database
                    $admin->photo_profile = $photoName;
                    $admin->save();
                    // dd('berhasil');
                    alert()->success('Berhasil Update Foto')->autoclose(25000);
                    return redirect()->back()->with('message-photo-success', 'Berhasil Update Foto Profile');
                }

                // Get File Image
                $photoProfile = $request->file('photo_profile');
                // Get Original Name
                // $photoName      =   $photoProfile->getClientOriginalName();
                // Get Original Extension
                $photoExtension =   $photoProfile->getClientOriginalExtension();

                // Get Id Auth Admin
                $id = Auth::guard('team_assessments')->user()->id;
                // Get Admin Username
                $admin = Auth::guard('team_assessments')->user()->username;
                // Photo Name
                $photoName = $id . '_' . $admin . '_' . date('d-m-Y') . '.' . $photoExtension;
                // dd($photoName);Carbon::now()->toDateString('DD/MM/YY')->isoFormat('DD/MM/YY')
                // getClientOriginalName();
                // $request->photo_profile->store('public/teamAssesments/images/', $request->file->getClientOriginalName());

                // Save Photo Name in Storage With Resize 100x100
                // $folder = $request->file('photo_profile')->store('images/teamAssesments/images/photoProfile/' . $admin, $photoName);

                $img = Image::make($photoProfile);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                $photoProfile->move(public_path('storage/teamAssesments/photos/photoProfile/' . $admin), $photoName);
                // $photoProfile->storeAs('public/teamAssesments/photos/photoProfile/' . $admin, $photoName);

                // $request->photo_profile->store('public/teamAssesments/images/', $photoName);
                // Storage::putFileAs('admin/images/' . $photoName, 'public');

                // Find Auth Admin Active storage_path($folder)
                $id = Auth::guard('team_assessments')->user()->id;
                $admin = TeamAssessment::find($id);
                // Save Photo TO Database
                $admin->photo_profile = $photoName;
                $admin->save();
                // dd('berhasil');
                alert()->success('Update Foto Berhasil')->autoclose(50000);
                return back()->with('success', 'You have successfully upload image.')->with('image');
            }

            alert()->error('Gagal Tambah Foto Profile!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-photo-error', 'Gagal Tambah Foto Profile')->withErrors($validate)->withInput($request->all());

        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postImageDelete(Request $request)
    {
        try {
            // $photo = new Pegawai;
            $id = Auth::guard('team_assessments')->user()->id;
            $photo = TeamAssessment::find($id);

            if ($photo) {
                $admin = Auth::guard('team_assessments')->user()->username;
                $file = storage_path('app/public/teamAssesments/photos/photoProfile/') . $admin . '/' . $photo->photo_profile;
                if (file_exists($file) && $photo->photo_profile != null) {
                    unlink($file);
                }
                // $photo = Pegawai::find($id)->photo_profile;
                DB::table('team_assessments')->where('id', $id)->update(['photo_profile' => '']);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            return redirect()->back()->with('message-error-password', 'Gagal Update Password')->withErrors($validate)->withInput($request->all());
        }

        $currentPassword        =       Auth::guard('team_assessments')->user()->password;
        $oldPassword            =       request('oldPassword');

        if (Hash::check($oldPassword, $currentPassword)) {
            Auth::guard('team_assessments')->user()->update([
                'password' => Hash::make($request['password'])
            ]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect()->back()->with('message-update-success', 'Berhasil Update Password');
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
