<?php

namespace App\Http\Controllers\Hrd\Auth;

// Service
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;

// Illuminate
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function getLoginForm()
    {
        return view('layouts.hrd.content.auth.login');
    }

    public function postLoginForm(Request $request)
    {
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
        return redirect()->back()->withSuccess('Kamu Telah Keluar Dari Akun', 'Terima Kasih');
        // alert('<a href="#">Click me</a>')->html()->persistent("Ok")->success('Kamu Telah Keluar Dari Akun', 'Terima Kasih')->autoclose(50000);
        // return redirect('user/login');
    }
}
