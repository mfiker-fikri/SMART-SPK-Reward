<?php

namespace App\Http\Controllers\SDM\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Auth\Authenticatable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo;
    // protected $redirect = 'sdm/dashboard';
    public function redirectTo() {
        $role = Auth::guard('human_resources')->user()->role;
        switch ($role) {
            case 1:
                return route('sdm.getDashboard.KepalaBiroSDM.SDM');
                break;
            case 2:
                return route('sdm.getDashboard.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
                break;
            case 3:
                return route('sdm.getDashboard.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
                break;
            default:
                return route('sdm.getLogin.SDM');
            break;
        }
    }

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // if(Auth::guard('human_resources')->user()->role == 1) {
        //     if(Auth::guard('human_resources')->user()->status_active == 1 && Auth::guard('human_resources')->user()->status_id == 1) {
        //         $this->redirectTo = route('sdm.getDashboard.KepalaBiroSDM.SDM');
        //     } else {
        //         return redirect('/sdm');
        //     }
        // }
        // else {
        //     return redirect('/sdm');
        // }
        $this->middleware('human_resources.guest', ['except' => 'getLogout']);
        // $this->middleware('human_resources.auth:1');
    }

    // use AuthenticatesUsers;
    // use ThrottlesLogins;
    // use AuthenticatesUsers, LogsoutGuard {
    //     LogsoutGuard::logout insteadof AuthenticatesUsers;
    // }

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
        return Auth::guard('human_resources');
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLoginForm()
    {
        try {
            return view('layouts.sdm.content.auth.login');
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
    public function postLoginForm(Request $request)
    {
        try {
            // Validasi Login
            $validate =  Validator::make(
                $request->all(),
                [
                    'username'                          =>      'string|required',
                    'email'                             =>      'string|email:rfc,dns',
                    'password'                          =>      'string|required',
                ],
                [
                    'username.required'                 =>      'Username Wajib Diisi!',
                    'password.required'                 =>      'Password Wajib Diisi!',
                    //
                    'email.email'                       =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Masuk!', 'Username/Email atau Password Salah')->autoclose(25000);
                return redirect()->back()->with('message-failed-login', 'Username/Email atau Password Salah')->withErrors($validate)->withInput($request->all());
            }

            // Input Login
            $username                   =   $request->get('username');
            $password                   =   $request->get('password');
            $remember_me                =   $request->has('remember') ? true : false;
            $check                      =   filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            // Attempt Login
            $attempt                    =   Auth::guard('human_resources')
                ->attempt([
                    $check => $username,
                    'password' => $password,
                    'status_active' => 1,
                    'status_id' => 1],
                    $remember_me
                );
            // dd($attempt);
            if ($attempt) {
                if(Auth::guard('human_resources')->user()->role == 1){
                    alert()->success('Berhasil Masuk')->autoclose(25000);
                    return redirect('/sdm/kepala-biro-SDM/dashboard');
                }
            }

            // if (Auth::guard('human_resources')->check()) {
                // Kepala Biro SDM
                // if(Auth::guard('human_resources')->attempt([
                //     $check => $username,
                //     'password' => $password,
                //     'status_active' => 1,
                //     'status_id' => 1,
                //     'role' => 1],
                //     $remember_me
                //     )){
                //     // dd('ACC');
                //     alert()->success('Berhasil Masuk')->autoclose(25000);
                //     return redirect('/sdm/kepala-biro-SDM/dashboard')->with('message-succes-login', 'Selamat Datang');
                // }
                // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
                // if(Auth::guard('human_resources')->attempt([
                //     $check => $username,
                //     'password' => $password,
                //     'status_active' => 1,
                //     'status_id' => 1,
                //     'role' => 2],
                //     $remember_me
                //     )){
                //     alert()->success('Berhasil Masuk')->autoclose(25000);
                //     return redirect('/sdm/kepala-biro-SDM/dashboard')->with('message-succes-login', 'Selamat Datang');
                // }
            // }

            // if (Auth::guard('human_resources')->check()) {
            //     // Kepala Biro SDM
            //     // if(Auth::guard('human_resources')->user()->role === 1){
            //     //     if($attempt) {
            //     //         alert()->success('Berhasil Masuk')->autoclose(25000);
            //     //         return redirect('/sdm/kepala-biro-SDM/dashboard')->with('message-succes-login', 'Selamat Datang');
            //     //     }
            //     // }
                // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
                // if(Auth::guard('human_resources')->user()->role === 2){
                //     if($attempt) {
                //         alert()->success('Berhasil Masuk')->autoclose(25000);
                //         return redirect('/sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard')->with('message-succes-login', 'Selamat Datang');
                //     }
                // }
            //     // Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
            //     // if(Auth::guard('human_resources')->user()->role === 3){
            //     //     if($attempt) {
            //     //         alert()->success('Berhasil Masuk')->autoclose(25000);
            //     //         return redirect('/sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard')->with('message-succes-login', 'Selamat Datang');
            //     //     }
            //     // }
            //     if ($attempt) {
            //         alert()->success('Berhasil Masuk')->autoclose(25000);
            //     }

            //     alert()->error('Gagal Masuk!', 'Username/Email atau Password Salah')->autoclose(25000);
            //     return redirect()->back()->withErrors($attempt)->withInput($request->all())->with('message-failed-login', 'Username/Email atau Password Salah');
            // }

            alert()->error('Gagal Masuk!', 'Username/Email atau Password Salah')->autoclose(25000);
            return redirect()->back()->withErrors($attempt)->withInput($request->all())->with('message-failed-login', 'Username/Email atau Password Salah');
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

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLogout(Request $request)
    {
        $this->guard('human_resources')->logout();
        $request->session()->flush();
        Auth::logout();
        alert()->success('Kamu Telah Keluar Dari Akun SDM', 'Terima Kasih')->autoclose(25000);
        return redirect('sdm')->with('message-success-logout', 'Kamu Telah Keluar Dari Akun SDM, Terima Kasih');
    }
}
