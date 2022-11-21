<?php

namespace App\Http\Controllers\SDM\Auth;

use App\Http\Controllers\Controller;
use App\Models\HumanResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getForgetPasswordForm()
    {
        try {
            return view('layouts.sdm.content.auth.forgotPassword');
        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function postForgetPasswordForm(Request $request)
    {
        try {
            // Validate
            $validate   =  Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|exists:human_resources',
                ],
                [
                    'email.required'                        =>      'Email Wajib Diisi!',
                    //
                    'email.email'                           =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
                    //
                    'email.exists'                          =>      'Email belum terdaftar',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Reset!', 'Email Salah')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Email Salah')->withErrors($validate)->withInput($request->all());
            }

            $checkStatusEmailSDM  =   HumanResource::where(
                [
                    'email' => $request->email
                ]
            )->first();

            if ($checkStatusEmailSDM->status_active == 0) {
                // ddd('Check1');
                alert()->error('Gagal Reset!', 'Status Email Tidak Aktif')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Gagal Reset Karena Status Admin Anda Tidak Aktif, Harap Hubungi Admin!')->withErrors($validate)->withInput($request->all());
            }

            if ($checkStatusEmailSDM->status_id == 0) {
                alert()->error('Gagal Reset!', 'Email Tidak Aktif')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Gagal Reset Karena Data Admin Anda Tidak Aktif, Harap Hubungi Admin!')->withErrors($validate)->withInput($request->all());
            }

            $token = Str::random(64);

            DB::table('human_resources_password_resets')->insert(
                [
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]
            );

            $nameSDM      =   HumanResource::where(['email' =>  $request->email])->first();

            $greetings   =   "";
            date_default_timezone_set('Asia/Jakarta');
            $time        =   date("H");
            if ($time >= "5" && $time < "11") {
                $greetings  =   "Good Morning";
            } elseif ($time >= "11" && $time < "18") {
                $greetings  =   "Good Afternoon";
            } elseif ($time >= "18" && $time < "23") {
                $greetings  =   "Good Evening";
            } else {
                $greetings  =   "Good Night";
            }

            // Send Email
            // Mail::to($request->email)->send(new ResetPasswordAdmin($token, $nameAdmin));
            Mail::send(
                'layouts.sdm.content.email.forgotPassword',
                ['token' => $token, 'nameSDM' => $nameSDM, 'greetings' => $greetings],
                function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Reset Password Notification');
                    // $message->from('adminBot@gmail.com');
                    // $message->embed(public_path('/assets/icon/KLN.png'));
                }
            );

            alert()->success('Berhasil Dikirimkan Link Reset Password!')->autoclose(25000);
            return back()->with('message-success-reset', 'Kita Telah Mengirimkan Link Reset Password Ke Email Anda!');

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getResetPasswordForm(Request $request, $token)
    {
        try {
            // Check Token
            $updatePassword     =       DB::table('human_resources_password_resets')
            ->where([
                'email' =>  $request->email,
                'token' =>  $request->token
            ])
            ->first();

            if($updatePassword) {
                return view('layouts.sdm.content.auth.resetPassword')->with(['token' => $token, 'email' => $request->email]);
            } else {
                abort(403);
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postResetPasswordForm(Request $request)
    {
        // Validate
        $validate   =   Validator::make(
            $request->all(),
            [
                'email'                                 =>      'required|string|email|exists:human_resources',
                'password'                              =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed',
                'password_confirmation'                 =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
            ],
            [
                'email.required'                        =>      'Email Wajib Diisi!',
                'password.required'                     =>      'Password Baru Wajib Diisi!',
                'password_confirmation.required'        =>      'Konfirmasi Password Baru Wajib Diisi!',
                //
                'email.email'                           =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
                //
                'email.exists'                          =>      'Email belum terdaftar',
                //
                'password.min'                          =>      'Password Baru Minimal 6 Karakter!',
                'password_confirmation.min'             =>      'Konfirmasi Password Baru Minimal 6 Karakter!',
                //
                'password.max'                          =>      'Password Baru Maksimal 100 Karakter!',
                'password_confirmation.max'             =>      'Konfirmasi Password Baru Maksimal 100 Karakter!',
                //
                'password.regex'                        =>      'Format Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                'password_confirmation.regex'           =>      'Format Konfirmasi Password Baru Harus Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                //
                'password.confirmed'                    =>      'Password Konfirmasi Tidak Sama Dengan Password Baru!',
                //
                'password_confirmation.same'            =>      'Konfirmasi Password Harus Sama Dengan Password!',
            ]
        );

        // Rules Error
        if ($validate->fails()) {
            alert()->error('Gagal Reset Password!', 'Validasi Gagal')->autoclose(25000);
            return redirect()->back()->with('message-failed-reset', 'Gagal Reset Password')->withErrors($validate)->withInput($request->all());
        }

        $updatePassword     =       DB::table('human_resources_password_resets')
            ->where([
                'email' =>  $request->email,
                'token' =>  $request->token
            ])
            ->first();
        // dd($updatePassword);

        // if (!$updatePassword) {
        //     alert()->error('Gagal Reset Password!', 'Waktu Reset Sudah Habis, Silahkan Kirim Ulang')->autoclose(25000);
        //     return redirect()->back()->with('message-failed-reset', 'Waktu Reset Sudah Habis, Silahkan Kirim Ulang')->withErrors($updatePassword)->withInput($request->all());
        // }

        if ($updatePassword) {
            // Find Email SDM
            $sdm  =   HumanResource::where(['email' =>  $request->email])->first();
            // dd($admin);
            // Check New Password Same Old Password
            if (Hash::check($request->password, $sdm->password)) {
                alert()->error('Gagal Update Password!', 'Password Lama Tidak Bisa Dipakai Kembali')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Password Lama Tidak Bisa Dipakai Kembali')->withInput($request->all());
            } else {
                HumanResource::where('email', $request->email)->update([
                    'password'  => Hash::make($request->password)
                ]);

                DB::table('human_resources_password_resets')->where('email', $request->email)->delete();

                alert()->success('Berhasil Update Password!')->autoclose(25000);
                return redirect('/sdm')->with('message-succes-login', 'Password Sudah di Update');
            }
        } else {
            alert()->error('Gagal Reset Password!', 'Waktu Reset Sudah Habis, Silahkan Kirim Ulang')->autoclose(25000);
            return redirect()->back()->with('message-failed-reset', 'Waktu Reset Sudah Habis, Silahkan Kirim Ulang')->withErrors($updatePassword)->withInput($request->all());
        }
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
