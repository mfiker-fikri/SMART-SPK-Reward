<?php

namespace App\Http\Controllers\Pegawai\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pegawai.guest');
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

    public function getForgetPasswordForm()
    {
        return view('layouts.pegawai.content.auth.forgotPassword');
    }

    public function postForgetPasswordForm(Request $request)
    {
        // validate
        $validate   =   Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:employees',
            ],
            [
                'email.required'                        =>      'Email Wajib Diisi!',
                //
                'email.email'                           =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
                //
                'email.exists'                          =>      'Email belum terdaftar',
            ]
        );

        if ($validate->fails()) {
            alert()->error('Gagal Reset!', 'Email Salah')->autoclose(25000);
            return redirect()->back()->with('message-failed-reset', 'Email Salah')->withErrors($validate)->withInput($request->all());
        }

        $checkStatusEmailEmployee  =   Pegawai::where(
            [
                'email' => $request->email
            ]
        )->first();

        if ($checkStatusEmailEmployee->status_active == 0) {
            alert()->error('Gagal Reset!', 'Status Email Tidak Aktif')->autoclose(25000);
            return redirect()->back()->with('message-failed-reset', 'Gagal Reset Karena Status Pegawai Anda Tidak Aktif, Harap Hubungi Admin!')->withErrors($validate)->withInput($request->all());
        }

        if ($checkStatusEmailEmployee->status_id == 0) {
            alert()->error('Gagal Reset!', 'Email Tidak Aktif')->autoclose(25000);
            return redirect()->back()->with('message-failed-reset', 'Gagal Reset Karena Data Pegawai Anda Tidak Aktif, Harap Hubungi Admin!')->withErrors($validate)->withInput($request->all());
        }

        $token = Str::random(64);

        DB::table('employees_password_resets')->insert(
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        $nameEmployee   =   Pegawai::where(['email' => $request->email])->first();

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
        Mail::send(
            'layouts.pegawai.content.email.forgotPassword',
            ['token' => $token, 'nameEmployee' => $nameEmployee, 'greetings' => $greetings],
            function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password Notification');
                // $message->from('adminBot@gmail.com');
            }
        );

        alert()->success('Berhasil Dikirimkan Link Reset Password!')->autoclose(25000);
        return back()->with('message-success-reset', 'Kita Telah Mengirimkan Link Reset Password Ke Email Anda!');
    }

    public function getResetPasswordForm(Request $request, $token = null)
    {
        return view('layouts.pegawai.content.auth.resetPassword')->with(['token' => $token, 'email' => $request->email]);
    }

    public function postResetPasswordForm(Request $request)
    {
        // Validate
        $validate   =   Validator::make(
            $request->all(),
            [
                'email'                                 =>      'required|string|email|exists:employees',
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

        $updatePassword     =       DB::table('employees_password_resets')
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
            // Find Email Admin
            $admin  =   Pegawai::where(['email' =>  $request->email])->first();
            // dd($admin);
            // Check New Password Same Old Password
            if (Hash::check($request->password, $admin->password)) {

                alert()->error('Gagal Update Password!', 'Password Lama Tidak Bisa Dipakai Kembali')->autoclose(25000);
                return redirect()->back()->with('message-failed-reset', 'Password Lama Tidak Bisa Dipakai Kembali');
            } else {

                Pegawai::where('email', $request->email)->update([
                    'password'  => Hash::make($request->password)
                ]);

                DB::table('employees_password_resets')->where('email', $request->email)->delete();

                alert()->success('Berhasil Update Password!')->autoclose(25000);
                return redirect('/')->with('message-succes-login', 'Password Sudah di Update');
            }
        } else {
            alert()->error('Gagal Reset Password!', 'Waktu Reset Sudah Habis, Silahkan Kirim Ulang')->autoclose(25000);
            return redirect()->back()->with('message-failed-reset', 'Waktu Reset Sudah Habis, Silahkan Kirim Ulang')->withErrors($updatePassword)->withInput($request->all());
        }
    }
}
