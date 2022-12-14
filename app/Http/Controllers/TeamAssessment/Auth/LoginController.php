<?php

namespace App\Http\Controllers\TeamAssessment\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('team_assessment.guest', ['except' => 'getLogout']);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirect = '/penilai/dashboard';

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
        return Auth::guard('team_assessments');
    }

    // Get Login
    public function getLoginForm()
    {
        try {
            return view('layouts.teamAssessment.content.auth.login');
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

        // ddd($validate);
        if ($validate->fails()) {
            alert()->error('Gagal Masuk!')->autoclose(25000);
            return redirect()->back()->withErrors($validate)->withInput()->with('message-failed-login', 'Username/Email atau Password Salah');
        }

        // Input Login
        $username           =   $request->get('username');
        $password           =   $request->get('password');
        $remember_me        =   $request->has('remember') ? true : false;
        $check              =   filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // $f  =   Auth::guard('team_assessments')->where(['username', $username]);
        // dd($f);
        // ddd($check, $password, $remember_me);
        // Attempt Login
        $attempt = Auth::guard('team_assessments')->attempt([$check => $username, 'password' => $password, 'status_active' => 1, 'status_id' => 1], $remember_me);
        // ddd($attempt);
        if ($attempt) {
            // dd('sukses');
            session(['berhasil_login' => true]);
            alert()->success('Berhasil Masuk')->autoclose(25000);
            return redirect('/penilai/dashboard')->with('message', 'Selamat Datang');
        }

        alert()->error('Gagal Masuk!')->autoclose(25000);
        return redirect()->back()->withErrors($attempt)->withInput($request->all())->with('message-failed-login', 'Gagal Login');
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
