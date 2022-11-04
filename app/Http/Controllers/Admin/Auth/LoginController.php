<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\Events\Logout;
// use Hesto\MultiAuth\Traits\LogsoutGuard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\RateLimiter;

use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'getLogout']);
    }

    use AuthenticatesUsers;
    use ThrottlesLogins;
    // use AuthenticatesUsers, LogsoutGuard {
    //     LogsoutGuard::logout insteadof AuthenticatesUsers;
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirect = 'admin/dashboard';

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
        return Auth::guard('admins');
    }

    // protected $maxAttempts = 1; // Default is 5
    // protected $decayMinutes = 1; // Default is 1

    // Get Login
    public function getLoginForm(Request $request)
    {
        // Get View
        // $key    =   'admin.' . $request->ip();
        return view('layouts.admin.content.auth.login', [
            // 'key'       =>  $key,
            // 'retries'   =>  RateLimiter::retriesLeft($key, 5),
            // 'second'    =>  RateLimiter::availableIn($key),
        ]);
    }

    // Post Login
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLoginForm(Request $request)
    {
        // Validasi Login
        // $validate = $request->validate(
        // $this->validate(
        //     $request,
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
                'email.email'                       =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
                // 
                // 'g-recaptcha-response.recaptcha'    =>  'Recaptcha Tidak Valid!',
            ]
        );

        // dd($validator);
        if ($validate->fails()) {
            alert()->error('Gagal Masuk!', 'Username/Email atau Password Salah')->autoclose(25000);
            return redirect()->back()->with('message-failed-login', 'Username/Email atau Password Salah')->withErrors($validate)->withInput($request->all());
        }

        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }



        // Input Login
        $username                   =   $request->get('username');
        $password                   =   $request->get('password');
        $remember_me                =   $request->has('remember') ? true : false;
        $check                      =   filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        // $active = Auth::guard('admins')->user()->status_active;

        // dd($check, $password, $remember_me);

        // Attempt Login
        $attempt                    =   Auth::guard('admins')->attempt([$check => $username, 'password' => $password, 'status_active' => 1, 'status_id' => 1], $remember_me);



        if ($attempt) {
            RateLimiter::clear('admin.' . $request->ip());
            session(['berhasil_login' => true]);
            alert()->success('Berhasil Masuk')->autoclose(25000);
            return redirect('/admin/dashboard')->with('message-succes-login', 'Selamat Datang');
        }


        $this->incrementLoginAttempts($request);
        // return $this->sendFailedLoginResponse($request);


        alert()->error('Gagal Masuk!', 'Username/Email atau Password Salah')->autoclose(25000);
        return redirect()->back()->withErrors($attempt)->withInput($request->all())->with('message-failed-login', 'Username/Email atau Password Salah');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'username'              => 'Username Yang Anda Masukan Salah!',
            'password'              => 'Password Yang Anda Masukan Salah!',
            'message-failed-login'  => 'Username/Email atau Password Salah'
        ]);
    }



    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLogout(Request $request)
    {
        $this->guard('admins')->logout();
        $request->session()->flush();
        Auth::logout();
        alert()->success('Kamu Telah Keluar Dari Akun Admin', 'Terima Kasih')->autoclose(25000);
        return redirect('admin')->with('message-succes-logout', 'Kamu Telah Keluar Dari Akun Admin');
    }
}
