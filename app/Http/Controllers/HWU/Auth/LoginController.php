<?php

namespace App\Http\Controllers\HWU\Auth;

// Service
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Cache\RateLimiter;
// Illuminate
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter as FacadesRateLimiter;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('hwus.guest', ['except' => 'getLogout']);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirect = 'headworkunit/dashboard';

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('hwus');
    }

    public function getLoginForm()
    {
        try {
            return view('layouts.hwu.content.auth.login');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postLoginForm(Request $request)
    {
        // Validasi Login
        $validate =  Validator::make(
            $request->all(),
            // $validate = $request->validate(
            [
                'username'                          =>      'string|required',
                'email'                             =>      'string|email:rfc,dns',
                'password'                          =>      'string|required',
                // 'g-recaptcha-response'      => 'required|recaptcha',
            ],
            [
                'username.required'                 =>      'Username Wajib Diisi!',
                'password.required'                 =>      'Password Wajib Diisi!',
                // 'g-recaptcha-response.required'     =>  'Recaptcha Wajib Diisi!',
                //
                'email.email'                       =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
                //
                // 'g-recaptcha-response.recaptcha'    =>  'Recaptcha Tidak Valid!',
            ]
        );

        // dd($validator);
        if ($validate->fails()) {
            alert()->error('Gagal Masuk!', 'Username/Email atau Password Salah')->autoclose(25000);
            return redirect()->back()->with('message-failed-login', 'Username/Email atau Password Salah')->withErrors($validate)->withInput($request->all());
        }

        // Input Login
        $username           =   $request->get('username');
        $password           =   $request->get('password');
        $remember_me        =   $request->has('remember') ? true : false;
        $check              =   filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // dd($check, $password, $remember_me);
        // Attempt Login
        $attempt                    =   Auth::guard('hwus')->attempt([$check => $username, 'password' => $password, 'status_active' => 1, 'status_id' => 1], $remember_me);



        if ($attempt) {
            FacadesRateLimiter::clear('hwu.' . $request->ip());
            session(['berhasil_login' => true]);
            alert()->success('Berhasil Masuk')->autoclose(25000);
            return redirect('/headworkunit/dashboard')->with('message-succes-login', 'Selamat Datang');
        } else {
            alert()->error('Gagal Masuk!')->autoclose(25000);
            return redirect()->back()->withErrors($attempt)->withInput($request->all())->with('message-failed-login', 'Gagal Masuk!');
        }


        $this->incrementLoginAttempts($request);

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLogout(Request $request)
    {
        $this->guard('hwus')->logout();
        $request->session()->flush();
        Auth::logout();
        return redirect()->back()->withSuccess('Kamu Telah Keluar Dari Akun', 'Terima Kasih');
        // alert('<a href="#">Click me</a>')->html()->persistent("Ok")->success('Kamu Telah Keluar Dari Akun', 'Terima Kasih')->autoclose(50000);
        // return redirect('user/login');
    }
}
