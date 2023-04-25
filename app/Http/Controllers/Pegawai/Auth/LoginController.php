<?php

namespace App\Http\Controllers\Pegawai\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\Events\Logout;
// use Hesto\MultiAuth\Traits\LogsoutGuard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('pegawai.guest', ['except' => 'getLogout']);
    }

    use AuthenticatesUsers;
    // use AuthenticatesUsers,LogsoutGuard {
    //     LogsoutGuard::logout insteadof AuthenticatesUsers;
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirect = 'dashboard';

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
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

    // Get Login
    public function getLoginForm()
    {
        // dd('Fikri');
        try {
            return view('layouts.pegawai.content.auth.login');
        } catch (\Exception $exception) {
            return $exception;
        }
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
        $validate =  Validator::make(
            $request->all(),
            [
                'username'          =>      'string|required',
                'email'             =>      'string|email:rfc,dns',
                'password'          =>      'string|required',
            ],
            [
                'username.required'         => 'Username Wajib Diisi!',
                'password.required'         => 'Password Wajib Diisi!',
                'email.email'               => 'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
            ]
        );

        // dd($validator);
        if ($validate->fails()) {
            alert()->error('Gagal Masuk!')->autoclose(25000);
            return redirect()->back()->withErrors($validate)->withInput()->with('message-failed', 'Username/Email atau Password Salah');
        }

        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // Input Login
        $username           =   $request->get('username');
        $password           =   $request->get('password');
        $remember_me        =   $request->has('remember') ? true : false;
        $check              =   filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // dd($check, $password, $remember_me);
        // Attempt Login
        $attempt = Auth::guard('employees')->attempt([$check => $username, 'password' => $password, 'status_active' => 1 , 'status_id' => 1], $remember_me);
        // dd($attempt);
        if ($attempt) {
            session(['berhasil_login' => true]);
            alert()->success('Berhasil Masuk')->autoclose(25000);
            return redirect('/dashboard')->with('message', 'Selamat Datang');
        } else {
            alert()->error('Gagal Masuk!')->autoclose(25000);
            return redirect()->back()->withErrors($attempt)->withInput($request->all())->with('message-failed', 'Username/Email atau Password Salah');
        }

        $this->incrementLoginAttempts($request);


        // $role_admin = DB::table('map_roles')
        //     //
        //     ->join('admins', 'admins.email', '=', 'map_roles.user_email')
        //     // ->join('pegawai', 'pegawai.email', '=', 'map_roles.user_email')
        //     ->join('roles', 'map_roles.roles_id', '=', 'roles.id')
        //     ->select('roles_id')
        //     ->where('user_email', 'LIKE', '%' . $username . '%')
        //     ->orWhere('password', 'LIKE', '&' . $password . '%')
        //     ->get();
        // $role_pegawai = DB::table('map_roles')
        //     //
        //     ->join('pegawai', 'pegawai.email', '=', 'map_roles.user_email')
        //     ->join('roles', 'map_roles.roles_id', '=', 'roles.id')
        //     ->select('roles_id')
        //     ->where('user_email', 'LIKE', '%' . $username . '%')
        //     ->orWhere('password', 'LIKE', '&' . $password . '%')
        //     ->get();

        // // dd($role_admin, $username, $password);

        // if ($role_admin) {
        //     Auth::guard('admins')->attempt(['username' => $username, 'password' => $password], $remember_me);
        //     // dd($role_admin, $username, $password);
        //     return redirect('admin/dashboard')->with('message', 'Selamat Datang');
        // }

        // if ($role_pegawai) {
        //     Auth::guard('employees')->attempt(['username' => $username, 'password' => $password], $remember_me);
        //     // dd($role_admin, $username, $password);
        // }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLogout(Request $request)
    {
        try {
            $this->guard('employees')->logout();
            $request->session()->flush();
            Auth::logout();
            alert()->success('Kamu Telah Keluar Dari Akun Pegawai', 'Terima Kasih')->autoclose(50000);
            return redirect('/')->with('message-success-logout', 'Kamu Telah Keluar Dari Akun Pegawai, Terima Kasih');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
