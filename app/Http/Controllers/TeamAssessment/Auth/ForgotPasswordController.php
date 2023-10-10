<?php

namespace App\Http\Controllers\TeamAssessment\Auth;

use App\Http\Controllers\Controller;
use App\Models\TeamAssessment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('team_assessment.guest');
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
    public function getForgetPasswordForm()
    {
        try {
            return view('layouts.teamAssessment.content.auth.forgotPassword');
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
    public function postForgetPasswordForm(Request $request)
    {
        try {
            // Validate
            $validate   =  Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|exists:team_assessments',
                ],
                [
                    'email.required'                        =>      'Email Wajib Diisi!',
                    //
                    'email.email'                           =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
                    //
                    'email.exists'                          =>      'Email Belum Terdaftar',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Reset!', 'Email Salah')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Email Salah')->withErrors($validate)->withInput($request->all());
            }

            $checkStatusEmailTA  =   TeamAssessment::where(
                [
                    'email' => $request->email
                ]
            )->first();

            if ($checkStatusEmailTA->status_active == 0) {
                // ddd('Check1');
                alert()->error('Gagal Reset!', 'Status Email Tidak Aktif')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Gagal Reset Karena Status Tim Penilai Anda Tidak Aktif, Harap Hubungi Kepala Subbagian Penghargaan, Disiplin, dan Pensiun!')->withErrors($validate)->withInput($request->all());
            }

            if ($checkStatusEmailTA->status_id == 0) {
                alert()->error('Gagal Reset!', 'Email Tidak Aktif')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Gagal Reset Karena Data Tim Penilai Anda Tidak Aktif, Harap Hubungi Kepala Subbagian Penghargaan, Disiplin, dan Pensiun!')->withErrors($validate)->withInput($request->all());
            }

            // Check Token
            $check     =       DB::table('team_assessments_password_resets')
            ->where([
                'email' =>  $request->email,
                ])
            ->first();

            if (is_null($check) == false) {
                DB::table('team_assessments_password_resets')->where('email', $request->email)->delete();
            }

            $token = Str::random(64);

            DB::table('team_assessments_password_resets')->insert(
                [
                    'id'    => Str::uuid(),
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]
            );

            $nameTA      =   TeamAssessment::where(['email' =>  $request->email])->first();

            $greetings   =   "";
            date_default_timezone_set('Asia/Jakarta');
            $time        =   date("H");
            if ($time >= "4" && $time < "10") {
                $greetings  =   "Selamat Pagi";
            } elseif ($time >= "10" && $time < "15") {
                $greetings  =   "Selamat Siang";
            } elseif ($time >= "15" && $time < "18") {
                $greetings  =   "Selamat Sore";
            } else {
                $greetings  =   "Selamat Malam";
            }

            // Send Email
            // Mail::to($request->email)->send(new ResetPasswordAdmin($token, $nameAdmin));
            Mail::send(
                'layouts.teamAssessment.content.email.forgotPassword',
                ['token' => $token, 'nameTA' => $nameTA, 'greetings' => $greetings],
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

    public function getResetPasswordForm(Request $request, $token)
    {
        try {
            // Check Token
            $check     =       DB::table('team_assessments_password_resets')
            ->where([
                // 'email' =>  $request->email,
                'token' =>  $token
            ])
            ->first();

            if (is_null($check) == true) {
                alert()->error('Link tidak ada!', 'Mohon untuk mengirim ulang alamat email Anda untuk mereset password Anda')->autoclose(25000);
                return redirect('penilai/forgot-password');
            } else {
                $hour = Carbon::parse($check->created_at)->addMinutes(5);
                if (Carbon::now() > $hour) {
                    DB::table('team_assessments_password_resets')->where('token', $token)->delete();
                    alert()->error('Link sudah kadaluarsa!', 'Mohon untuk mengirim ulang alamat email Anda untuk mereset password Anda')->autoclose(25000);
                    return redirect('penilai/forgot-password');
                }
                return view('layouts.teamAssessment.content.auth.resetPassword', compact('check'))->with(['token' => $token, 'email' => $request->email]);
            }


        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postResetPasswordForm(Request $request)
    {
        // Check Token
        $check     =       DB::table('team_assessments_password_resets')
        ->where([
            // 'email' =>  $request->email,
            'token' =>  $request->token
        ])
        ->first();

        if (is_null($check) == true) {
            alert()->error('Link tidak ada!', 'Mohon untuk mengirim ulang alamat email Anda untuk mereset password Anda')->autoclose(25000);
            return redirect('penilai/forgot-password');
        } else {
            $hour = Carbon::parse($check->created_at)->addMinutes(5);
            if (Carbon::now() > $hour) {
                DB::table('team_assessments_password_resets')->where('token', $request->token)->delete();
                alert()->error('Link sudah kadaluarsa!', 'Mohon untuk mengirim ulang alamat email Anda untuk mereset password Anda')->autoclose(25000);
                return redirect('penilai/forgot-password');
            }

            // Validate
            $validate   =   Validator::make(
                $request->all(),
                [
                    'email'                                 =>      'required|string|email|exists:team_assessments',
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
                    'email.exists'                          =>      'Email Belum Terdaftar',
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

            $updatePassword     =       DB::table('team_assessments_password_resets')
                ->where([
                    'email' =>  $request->email,
                    'token' =>  $request->token
                ])
                ->first();

            if ($updatePassword) {
                // Find Email TA
                $TA  =   TeamAssessment::where(['email' =>  $request->email])->first();
                // dd($admin);
                // Check New Password Same Old Password
                if (Hash::check($request->password, $TA->password)) {
                    alert()->error('Gagal Update Password!', 'Password Lama Tidak Bisa Dipakai Kembali')->autoclose(25000);
                    return redirect()->back()->with('message-failed-reset', 'Password Lama Tidak Bisa Dipakai Kembali')->withInput($request->all());
                } else {
                    TeamAssessment::where('email', $request->email)->update([
                        'password'  => Hash::make($request->password)
                    ]);

                    DB::table('team_assessments_password_resets')->where('email', $request->email)->delete();

                    alert()->success('Berhasil Update Password!')->autoclose(25000);
                    return redirect('/penilai')->with('message-succes-login', 'Password Sudah di Update');
                }
            } else {
                alert()->error('Gagal Reset Password!', 'Waktu Reset Sudah Habis, Silahkan Kirim Ulang')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Waktu Reset Sudah Habis, Silahkan Kirim Ulang')->withErrors($updatePassword)->withInput($request->all());
            }
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
