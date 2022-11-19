<?php

namespace App\Http\Controllers\SDM\Auth;

use App\Http\Controllers\Controller;
use App\Models\HumanResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            DB::table('admins_password_resets')->insert(
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
