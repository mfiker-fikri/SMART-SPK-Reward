<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;

use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Roles;
use App\Models\MapRoles;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = RouteServiceProvider::HOME;

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        // Validasi Login
        // $this->validate(
        //     $request,
        //     [
        //         'username'     => 'required|string|min:3|max:255',
        //         'email' => 'string|email|max:255',
        //         'password'  => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,50}$/',
        //     ],
        //     [
        //         'username.required' => 'Username Wajib Diisi!',
        //         'password.required' => 'Password Wajib Diisi!',
        //         'username.min' => 'Username Minimal 3 Karakter!',
        //         'password.min' => 'Password Minimal 6 Karakter!',
        //         'username.max' => 'Username Maksimal 255 Karakter!',
        //         'password.max' => 'Password Maksimal 100 Karakter!',
        //         'email.email' => 'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
        //         'password.regex' => 'Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
        //     ]
        // );

        // Input Login
        $username = $request->get('username');
        $password = $request->get('password');
        $remember_me = $request->has('remember') ? true : false;
        $check = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // dd($check, $password, $remember_me);
        // Attempt Login
        $role_admin = DB::table('map_roles')
            // 
            ->join('admins', 'admins.email', '=', 'map_roles.user_email')
            // ->join('pegawai', 'pegawai.email', '=', 'map_roles.user_email')
            ->join('roles', 'map_roles.roles_id', '=', 'roles.id')
            ->select('roles_id')
            ->where('user_email', 'LIKE', '%' . $username . '%')
            ->orWhere('password', 'LIKE', '&' . $password . '%')
            ->get();
        $role_pegawai = DB::table('map_roles')
            // 
            ->join('pegawai', 'pegawai.email', '=', 'map_roles.user_email')
            ->join('roles', 'map_roles.roles_id', '=', 'roles.id')
            ->select('roles_id')
            ->where('user_email', 'LIKE', '%' . $username . '%')
            ->orWhere('password', 'LIKE', '&' . $password . '%')
            ->get();

        // dd($role_admin, $username, $password);

        if ($role_admin) {
            Auth::guard('admins')->attempt(['username' => $username, 'password' => $password], $remember_me);
            // dd($role_admin, $username, $password);
            return redirect('admin/dashboard')->with('message', 'Selamat Datang');
        }

        if ($role_pegawai) {
            Auth::guard('employees')->attempt(['username' => $username, 'password' => $password], $remember_me);
            // dd($role_admin, $username, $password);
        }

        // if (Auth::check()) {
        //     if (Auth::guard('admins')->attempt([$check => $username, 'password' => $password], $remember_me))
        //     if (Auth::guard('pegawai')->attempt([$check => $username, 'password' => $password], $remember_me))
        // }
        // if (Auth::guard('admins')->attempt([$check => $username, 'password' => $password], $remember_me)) {
        //     alert('<a href="#">Click me</a>')->html()->persistent("Ok")->success('Berhasil Masuk')->autoclose(50000);
        //     return redirect()->intended()->with('message', 'Selamat Datang');
        // }

        // session(['berhasil_login' => false]);
        // // toast('Your Post as been submited!', 'success');
        // alert('<a href="#">Click me</a>')->html()->persistent("Ok")->error('Gagal Masuk!')->autoclose(50000);
        // return redirect()->back()->withErrors($this)->withInput()->with('message-failed', 'Username/Email atau Password Salah');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('admins')->logout();
        $request->session()->flush();
        Auth::logout();
        return redirect()->back()->withSuccess('Kamu Telah Keluar Dari Akun', 'Terima Kasih');
        // alert('<a href="#">Click me</a>')->html()->persistent("Ok")->success('Kamu Telah Keluar Dari Akun', 'Terima Kasih')->autoclose(50000);
        // return redirect('user/login');
    }
}
