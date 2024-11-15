<?php

namespace App\Http\Controllers\SDM\Role3\TimerCountDown;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\CountdownTimerFormTeladan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ManageTimerCountDownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTimerCountDownFormInovation()
    {
        try {
            $timer  =   CountdownTimerFormInovation::first();
            $timers  =   CountdownTimerFormInovation::get();
            // ddd($timer);
            // ddd($timers[0]->id);
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.timerCountDown.TCD_inovation_index-create', compact('timer', 'timers'));
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
    public function postTimerCountDownFormInovation(Request $request)
    {
        try {

            $timer                   =   CountdownTimerFormInovation::first();

            if ($timer != null) {
                $dateTimeOpen1           =   new Carbon($timer->date_time_open_appraisement);

                $dateOpen1               =   $dateTimeOpen1->toDateString();
                $dateOpenTime1           =   $dateTimeOpen1->toDateTimeString();

                $dateTimeOpen           =   new Carbon($request['date_time_open_countdown_inovation_form']);
                $dateOpen               =   $dateTimeOpen->toDateString();
                $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

                if ($dateOpenTime1 == '') {
                    // validasi
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'date_time_open_countdown_inovation_form'            =>  'required|date|before_or_equal:date_time_expired_countdown_inovation_form|before_or_equal:'.$dateOpenTime1.'',
                            'status_open'                                        =>  'required',
                            'date_time_expired_countdown_inovation_form'         =>  'required|date|after_or_equal:'.$dateTimeOpen.'|before_or_equal:'.$dateOpenTime1.'',
                            'status_expired'                                     =>  'required',
                        ],
                        [
                            'date_time_open_countdown_inovation_form.required'              =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Berkas Inovasi Wajib Diisi!',
                            'date_time_open_countdown_inovation_form.before_or_equal'       =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Berkas Inovasi Dipilih Sebelum Penutupan Berkas dan Sebelum Pembukaan Penilaian!',
                            //
                            'status_open.required'                                          =>  'Status Pembukaan Wajib Dipilih!',
                            //
                            'date_time_expired_countdown_inovation_form.required'           =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Berkas Inovasi Wajib Diisi!',
                            'date_time_expired_countdown_inovation_form.after_or_equal'     =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Berkas Inovasi Wajib Dipilih Sesudah Pembukaan Berkas!',
                            'date_time_expired_countdown_inovation_form.before_or_equal'    =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Berkas Inovasi Wajib Dipilih Sebelum Pembukaan Penilaian!',
                            //
                            'status_expired.required'                                       =>  'Status Penutupan Wajib Dipilih!',

                        ]
                    );

                    if ($validate->fails()) {
                        alert()->error('Gagal !', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-form-error', 'Gagal')->withErrors($validate)->withInput($request->all());
                    }
                }
            }

            if ($timer == null) {
                // if ($dateOpenTime1 != '') {

                    $dateTimeOpen           =   new Carbon($request['date_time_open_countdown_inovation_form']);
                    $dateOpen               =   $dateTimeOpen->toDateString();
                    $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
                    // validasi
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'date_time_open_countdown_inovation_form'            =>  'required|date|before_or_equal:date_time_expired_countdown_inovation_form',
                            'status_open'                                        =>  'required',
                            'date_time_expired_countdown_inovation_form'         =>  'required|date|after_or_equal:'.$dateTimeOpen.'',
                            'status_expired'                                     =>  'required',
                        ],
                        [
                            'date_time_open_countdown_inovation_form.required'                      =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Berkas Inovasi Wajib Diisi!',
                            'date_time_open_countdown_inovation_form.before_or_equal'               =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Berkas Inovasi Dipilih Sebelum Penutupan Berkas!',
                            //
                            'status_open.required'                                                  =>  'Status Pembukaan Wajib Dipilih!',
                            //
                            'date_time_expired_countdown_inovation_form.required'                   =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Berkas Inovasi Wajib Diisi!',
                            'date_time_expired_countdown_inovation_form.after_or_equal'             =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Berkas Inovasi Wajib Dipilih Sesudah Pembukaan Berkas!',
                            //
                            'status_expired.required'                                               =>  'Status Penutupan Wajib Dipilih!',

                        ]
                    );

                    if ($validate->fails()) {
                        alert()->error('Gagal !', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-form-error', 'Gagal')->withErrors($validate)->withInput($request->all());
                    }
                // }
            }


            // if ($validate->fails()) {
            //     alert()->error('Gagal !', 'Validasi Gagal')->autoclose(25000);
            //     return redirect()->back()->with('message-create-error', 'Gagal ')->withErrors($validate)->withInput($request->all());
            // }

            $dateTimeOpen           =   new Carbon($request['date_time_open_countdown_inovation_form']);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($request['date_time_expired_countdown_inovation_form']);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            // Update toDateTimeString()
            if($request['id'] != null) {
                $id  =  CountdownTimerFormInovation::find($request['id']);

                if ($dateOpenTime === $id->date_time_open_form_innovation && $dateExpiredTime === $id->date_time_expired_form_innovation) {
                    $id->status_open_form_innovation                                    =  $request['status_open'];
                    $id->status_expired_form_innovation                                 =  $request['status_expired'];
                    $id->save();

                    alert()->success('Berhasil Update Data Timer Berkas Inovasi!')->autoclose(25000);
                    return redirect()->back()->with('message-create-form-success', 'Berhasil Update Data Timer Berkas Inovasi!');
                }

                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    $id  =  CountdownTimerFormInovation::find($request['id']);

                    if($id) {
                        $id->date_time_open_form_innovation                  =  $request['date_time_open_countdown_inovation_form'];
                        $id->status_open_form_innovation                                    =  $request['status_open'];
                        $id->date_time_expired_form_innovation               =  $request['date_time_expired_countdown_inovation_form'];
                        $id->status_expired_form_innovation                                 =  $request['status_expired'];
                        $id->save();

                        alert()->success('Berhasil Update Data Timer Berkas Inovasi!')->autoclose(25000);
                        return redirect()->back()->with('message-create-form-success', 'Berhasil Update Data Timer Berkas Inovasi!');
                    } else {
                        alert()->error('Gagal Update Data Timer Berkas Inovasi!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-form-error', 'Gagal Update Data Timer Berkas Inovasi!')->withErrors($validate)->withInput($request->all());
                    }
                }

                // if ($dateOpenTime >= ) {
                //     # code...
                // }

                if( Carbon::now()->toDateString() === $dateOpen || Carbon::now()->toDateString() === $dateExpired ) {
                    alert()->error('Gagal Update Data Timer Berkas Inovasi!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                    return redirect()->back()->with('message-create-form-error', 'Gagal Update Data Timer Berkas Inovasi!')->withErrors($validate)->withInput($request->all());
                }

                if($dateOpen == $dateExpired) {
                    alert()->error('Gagal Update Data Timer Berkas Inovasi!', 'Tidak Boleh Tanggal Sama')->autoclose(25000);
                    return redirect()->back()->with('message-create-form-error', 'Gagal Update Data Timer Berkas Inovasi!')
                    // ->withErrors($validate)
                    ->withInput($request->all());
                }

            }
            // Create
            else {
                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    // Create New Timer
                    $timer = CountdownTimerFormInovation::create([
                        'date_time_open_form_innovation'                 =>  $request['date_time_open_countdown_inovation_form'],
                        'status_open_form_innovation'                                   =>  $request['status_open'],
                        'date_time_expired_form_innovation'              =>  $request['date_time_expired_countdown_inovation_form'],
                        'status_expired_form_innovation'                                =>  $request['status_expired'],
                        'hr_id'                                          => Auth::guard('human_resources')->user()->id,
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Berkas Inovasi!')->autoclose(25000);
                        return redirect()->back()->with('message-create-form-success', 'Berhasil Tambah Data Timer Berkas Inovasi!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Berkas Inovasi!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-form-error', 'Gagal Tambah Data Timer Berkas Inovasi!')->withErrors($validate)->withInput($request->all());
                    }
                }

                if($dateOpen != $dateExpired) {
                    // Create New Timer
                    $timer = CountdownTimerFormInovation::create([
                        'date_time_open_form_innovation'                 =>  $request['date_time_open_countdown_inovation_form'],
                        'status_open_form_innovation'                                   =>  $request['status_open'],
                        'date_time_expired_form_innovation'              =>  $request['date_time_expired_countdown_inovation_form'],
                        'status_expired_form_innovation'                                =>  $request['status_expired'],
                        'hr_id'                                          => Auth::guard('human_resources')->user()->id,
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Berkas Inovasi!')->autoclose(25000);
                        return redirect()->back()->with('message-create-form-success', 'Berhasil Tambah Data Timer Berkas Inovasi!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Berkas Inovasi!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-form-error', 'Gagal Tambah Data Timer Berkas Inovasi!')->withErrors($validate)->withInput($request->all());
                    }
                }

                if( Carbon::now()->toDateString() === $dateOpen || Carbon::now()->toDateString() === $dateExpired ) {
                    alert()->error('Gagal Update Data Timer Berkas Inovasi!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                    return redirect()->back()->with('message-create-form-error', 'Gagal Update Data Timer Berkas Inovasi!')->withErrors($validate)->withInput($request->all());
                }

                if($dateOpen == $dateExpired) {
                    alert()->error('Gagal Update Data Timer Berkas Inovasi!', 'Tidak Boleh Tanggal Sama')->autoclose(25000);
                    return redirect()->back()->with('message-create-form-error', 'Gagal Update Data Timer Berkas Inovasi!')->withErrors($validate)->withInput($request->all());
                }
                // alert()->error('Gagal Update Data Timer Berkas Inovasi!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                // return redirect()->back()->with('message-create-form-error', 'Gagal Update Data Timer Berkas Inovasi!')->withErrors($validate)->withInput($request->all());
            }


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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTimerCountDownFormInovation(Request $request, $id)
    {
        try {
            $timer = CountdownTimerFormInovation::find($id);
            if($timer) {
                $timer->delete();
                return redirect()->back()->with('message-delete-form-success', 'Berhasil Hapus Data Timer Berkas!');
                // $teetime = CountdownTimerFormInovation::where('id', '=', $id)->firstOrFail();
                // $teetime->destroy();
                // $timer->destroy();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTimerCountDownAppraisment()
    {
        try {
            $timer  =   CountdownTimerFormInovation::get()->first();
            // ddd($timer->id);
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.timerCountDown.TCD_inovation_index-create', compact('timer'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTimerCountDownAppraisment(Request $request)
    {
        try {

            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen1           =   new Carbon($timer->date_time_open_form_innovation);

            $dateOpen1               =   $dateTimeOpen1->toDateString();
            $dateOpenTime1           =   $dateTimeOpen1->toDateTimeString();

            $dateTimeOpen2           =   new Carbon($timer->date_time_expired_form_innovation);

            $dateOpen2               =   $dateTimeOpen2->toDateString();
            $dateOpenTime2           =   $dateTimeOpen2->toDateTimeString();

            if ($dateOpenTime1 != '') {
                $validate = Validator::make(
                    $request->all(),
                    [
                        'date_time_open_countdown_inovation_appraisement'                    =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|before_or_equal:date_time_expired_countdown_inovation_appraisement',
                        'status_open_appraisement'                                           =>  'required',
                        'date_time_expired_countdown_inovation_appraisement'                 =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|after_or_equal:date_time_open_countdown_inovation_appraisement',
                        'status_expired_appraisement'                                        =>  'required',
                    ],
                    [
                        'date_time_open_countdown_inovation_appraisement.required'            =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Penilaian Wajib Diisi!',
                        'date_time_open_countdown_inovation_appraisement.after_or_equal'      =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Penilaian Minimal Harus 1 Hari Setelah Penutupan Berkas Inovasi!',
                        'date_time_open_countdown_inovation_appraisement.before_or_equal'     =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Penilaian Minimal Harus 1 Hari Sebelum Penutupan Penilaian Inovasi!',
                        //
                        'status_open_appraisement.required'                                   =>  'Status Pembukaan Wajib Dipilih!',
                        //
                        'date_time_expired_countdown_inovation_appraisement.required'         =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Penilaian Wajib Diisi!',
                        'date_time_expired_countdown_inovation_appraisement.after_or_equal'   =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Penilaian Minimal Harus 1 Hari Setelah Pembukaan Penilaian Inovasi!',
                        //
                        'status_expired_appraisement.required'                                =>  'Status Penutupan Wajib Dipilih!',
                    ]
                );
            }

            if ($validate->fails()) {
                alert()->error('Gagal!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-appraisement-error', 'Validasi Gagal!')->withErrors($validate)->withInput($request->all());
            }

            $dateTimeOpen           =   new Carbon($request['date_time_open_countdown_inovation_appraisement']);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($request['date_time_expired_countdown_inovation_appraisement']);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            // Update
            if($request['id'] != null) {
                $id  =  CountdownTimerFormInovation::find($request['id']);

                if ($dateOpenTime === $id->date_time_open_appraisement && $dateExpiredTime === $id->date_time_expired_appraisement) {
                    $id->status_open_appraisement                                    =  $request['status_open_appraisement'];
                    $id->status_expired_appraisement                                 =  $request['status_expired_appraisement'];
                    $id->save();

                    alert()->success('Berhasil Update Data Timer Penilaian!')->autoclose(25000);
                    return redirect()->back()->with('message-update-appraisement-success', 'Berhasil Update Data Timer Penilaian!');
                }

                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    $id  =  CountdownTimerFormInovation::find($request['id']);

                    if($id) {
                        $id->date_time_open_appraisement                  =  $request['date_time_open_countdown_inovation_appraisement'];
                        $id->status_open_appraisement                     =  $request['status_open_appraisement'];
                        $id->date_time_expired_appraisement               =  $request['date_time_expired_countdown_inovation_appraisement'];
                        $id->status_expired_appraisement                  =  $request['status_expired_appraisement'];
                        $id->save();

                        alert()->success('Berhasil Update Data Timer Penilaian!')->autoclose(25000);
                        return redirect()->back()->with('message-update-appraisement-success', 'Berhasil Update Data Timer Penilaian!');
                    } else {
                        alert()->error('Gagal Update Data Timer Penilaian!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-update-appraisement-error', 'Gagal Update Data Timer Penilaian!')->withErrors($validate)->withInput($request->all());
                    }
                }

                if( Carbon::now()->toDateString() === $dateOpen || Carbon::now()->toDateString() === $dateExpired ) {
                    alert()->error('Gagal Update Data Timer Penilaian!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                    return redirect()->back()->with('message-update-appraisement-error', 'Gagal Update Data Timer Penilaian!')->withErrors($validate)->withInput($request->all());
                }

                if($dateOpen == $dateExpired) {
                    alert()->error('Gagal Update Data Timer Penilaian!', 'Tidak Boleh Tanggal Sama')->autoclose(25000);
                    return redirect()->back()->with('message-update-appraisement-error', 'Gagal Update Data Timer Penilaian!')->withErrors($validate)->withInput($request->all());
                }
                alert()->error('Gagal Update Data Timer Penilaian!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-update-appraisement-error', 'Gagal Update Data Timer Penilaian!')->withErrors($validate)->withInput($request->all());
            }
            // Create
            else {
                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    // Create New Timer
                    $timer = CountdownTimerFormInovation::create([
                        'date_time_open_appraisement'                 =>  $request['date_time_open_countdown_inovation_appraisement'],
                        'status_open_appraisement'                    =>  $request['status_open_appraisement'],
                        'date_time_expired_appraisement'              =>  $request['date_time_expired_countdown_inovation_appraisement'],
                        'status_expired_appraisement'                 =>  $request['status_expired_appraisement'],
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Penilaian!')->autoclose(25000);
                        return redirect()->back()->with('message-create-appraisement-success', 'Berhasil Tambah Data Timer Penilaian!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Penilaian!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-appraisement-error', 'Gagal Tambah Data Timer Penilaian!')->withErrors($validate)->withInput($request->all());
                    }
                }
                alert()->error('Gagal Tambah Data Timer Penilaian!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-appraisement-error', 'Gagal Tambah Data Timer Penilaian!')->withErrors($validate)->withInput($request->all());
            }


        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTimerCountDownAppraisment(Request $request, $id)
    {
        try {
            $timer = CountdownTimerFormInovation::find($id);

            // ddd($timer);
            if($timer) {
                $timer->date_time_open_appraisement                  =  null;
                $timer->status_open_appraisement                     =  null;
                $timer->date_time_expired_appraisement               =  null;
                $timer->status_expired_appraisement                  =  null;
                $timer->save();

                return redirect()->back()->with('message-delete-appraisement-success', 'Berhasil Hapus Data Timer Penilaian!');

                // $timer->save();
                // $teetime = CountdownTimerFormInovation::where('id', '=', $id)->firstOrFail();
                // $teetime->destroy();
                // $timer->destroy();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTimerCountDownSignature(Request $request)
    {
        try {

            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen1           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen1               =   $dateTimeOpen1->toDateString();
            $dateOpenTime1           =   $dateTimeOpen1->toDateTimeString();

            $dateTimeOpen2           =   new Carbon($timer->date_time_expired_appraisement);

            $dateOpen2               =   $dateTimeOpen2->toDateString();
            $dateOpenTime2           =   $dateTimeOpen2->toDateTimeString();

            if ($dateOpenTime1 != '') {
                $validate = Validator::make(
                    $request->all(),
                    [
                        //
                        'date_time_open_signature_human_resource_3'            =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|before_or_equal:date_time_expired_signature_human_resource_3',
                        'status_open_signature_human_resource_3'               =>  'required',
                        'date_time_expired_signature_human_resource_3'         =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|after_or_equal:date_time_open_signature_human_resource_3',
                        'status_expired_signature_human_resource_3'            =>  'required',
                        //
                        'date_time_open_signature_human_resource_2'            =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|before_or_equal:date_time_expired_signature_human_resource_2|after_or_equal:date_time_expired_signature_human_resource_3',
                        'status_open_signature_human_resource_2'               =>  'required',
                        'date_time_expired_signature_human_resource_2'         =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|after_or_equal:date_time_open_signature_human_resource_2',
                        'status_expired_signature_human_resource_2'            =>  'required',
                        //
                        'date_time_open_signature_human_resource_1'            =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|before_or_equal:date_time_expired_signature_human_resource_1|after_or_equal:date_time_expired_signature_human_resource_2',
                        'status_open_signature_human_resource_1'               =>  'required',
                        'date_time_expired_signature_human_resource_1'         =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|after_or_equal:date_time_open_signature_human_resource_1',
                        'status_expired_signature_human_resource_1'            =>  'required',
                    ],
                    [
                        'date_time_open_signature_human_resource_3.required'                    =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_open_signature_human_resource_3.after_or_equal'              =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Penutupan Penilaian Inovasi!',
                        'date_time_open_signature_human_resource_3.before_or_equal'             =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Sebelum Penutupan Verifikasi Tanda Tangan Inovasi!',
                        //
                        'status_open_signature_human_resource_3.required'                       =>  'Status Pembukaan Wajib Dipilih!',
                        //
                        'date_time_expired_signature_human_resource_3.required'                 =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_expired_signature_human_resource_3.after_or_equal'           =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Pembukaan Verifikasi Tanda Tangan Inovasi!',
                        //
                        'status_expired_signature_human_resource_3.required'                    =>  'Status Penutupan Wajib Dipilih!',

                        //
                        //
                        'date_time_open_signature_human_resource_2.required'                    =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_open_signature_human_resource_2.after_or_equal'              =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Penutupan Penilaian Inovasi!',
                        'date_time_open_signature_human_resource_2.before_or_equal'             =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Sebelum Penutupan Verifikasi Tanda Tangan Inovasi!',
                        //
                        'status_open_signature_human_resource_2.required'                       =>  'Status Pembukaan Wajib Dipilih!',
                        //
                        'date_time_expired_signature_human_resource_2.required'                 =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_expired_signature_human_resource_2.after_or_equal'           =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Pembukaan Verifikasi Tanda Tangan Inovasi!',
                        //
                        'status_expired_signature_human_resource_2.required'                    =>  'Status Penutupan Wajib Dipilih!',

                        //
                        //
                        'date_time_open_signature_human_resource_1.required'                    =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_open_signature_human_resource_1.after_or_equal'              =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Penutupan Penilaian Inovasi!',
                        'date_time_open_signature_human_resource_1.before_or_equal'             =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Sebelum Penutupan Verifikasi Tanda Tangan Inovasi!',
                        //
                        'status_open_signature_human_resource_1.required'                       =>  'Status Pembukaan Wajib Dipilih!',
                        //
                        'date_time_expired_signature_human_resource_1.required'                 =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_expired_signature_human_resource_1.after_or_equal'           =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Pembukaan Verifikasi Tanda Tangan Inovasi!',
                        //
                        'status_expired_signature_human_resource_1.required'                    =>  'Status Penutupan Wajib Dipilih!',
                    ]
                );

                if ($validate->fails()) {
                    alert()->error('Gagal!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-create-signature-error', 'Validasi Gagal')->withErrors($validate)->withInput($request->all());
                }
            }

            // Role 1
            $dateTimeOpen1           =   new Carbon($request['date_time_open_signature_human_resource_1']);
            $dateOpen1               =   $dateTimeOpen1->toDateString();
            $dateOpenTime1           =   $dateTimeOpen1->toDateTimeString();

            $dateTimeExpired1        =   new Carbon($request['date_time_expired_signature_human_resource_1']);
            $dateExpired1            =   $dateTimeExpired1->toDateString();
            $dateExpiredTime1        =   $dateTimeExpired1->toDateTimeString();

            // Role 2
            $dateTimeOpen2           =   new Carbon($request['date_time_open_signature_human_resource_2']);
            $dateOpen2               =   $dateTimeOpen2->toDateString();
            $dateOpenTime2           =   $dateTimeOpen2->toDateTimeString();

            $dateTimeExpired2        =   new Carbon($request['date_time_expired_signature_human_resource_2']);
            $dateExpired2            =   $dateTimeExpired2->toDateString();
            $dateExpiredTime2        =   $dateTimeExpired2->toDateTimeString();

            // Role 3
            $dateTimeOpen3           =   new Carbon($request['date_time_open_signature_human_resource_3']);
            $dateOpen3               =   $dateTimeOpen3->toDateString();
            $dateOpenTime3           =   $dateTimeOpen3->toDateTimeString();

            $dateTimeExpired3        =   new Carbon($request['date_time_expired_signature_human_resource_3']);
            $dateExpired3            =   $dateTimeExpired3->toDateString();
            $dateExpiredTime3        =   $dateTimeExpired3->toDateTimeString();

            // Update
            if($request['id'] != null) {
                $id  =  CountdownTimerFormInovation::find($request['id']);

                if (
                    ($dateOpenTime1 === $id->date_time_open_signature_human_resource_1 && $dateExpiredTime1 === $id->date_time_expired_signature_human_resource_1) &&
                    ($dateOpenTime1 === $id->date_time_open_signature_human_resource_2 && $dateExpiredTime1 === $id->date_time_expired_signature_human_resource_2) &&
                    ($dateOpenTime1 === $id->date_time_open_signature_human_resource_3 && $dateExpiredTime1 === $id->date_time_expired_signature_human_resource_3)
                    ) {
                    $id->status_open_signature_human_resource_1                                    =  $request['status_open_signature_human_resource_1'];
                    $id->status_expired_signature_human_resource_1                                 =  $request['status_expired_signature_human_resource_1'];
                    //
                    $id->status_open_signature_human_resource_2                                    =  $request['status_open_signature_human_resource_2'];
                    $id->status_expired_signature_human_resource_2                                 =  $request['status_expired_signature_human_resource_2'];
                    //
                    $id->status_open_signature_human_resource_3                                    =  $request['status_open_signature_human_resource_3'];
                    $id->status_expired_signature_human_resource_3                                 =  $request['status_expired_signature_human_resource_3'];
                    //
                    $id->save();

                    alert()->success('Berhasil Update Data Timer Verifikasi Tanda Tangan!')->autoclose(25000);
                    return redirect()->back()->with('message-update-signature-success', 'Berhasil Update Data Timer Verifikasi Tanda Tangan!');
                }

                if(
                    ($dateOpen1 != $dateExpired1 && ( Carbon::now()->toDateString() != $dateOpen1 && Carbon::now()->toDateString() != $dateExpired1 ) ) &&
                    ($dateOpen2 != $dateExpired2 && ( Carbon::now()->toDateString() != $dateOpen2 && Carbon::now()->toDateString() != $dateExpired2 ) ) &&
                    ($dateOpen3 != $dateExpired3 && ( Carbon::now()->toDateString() != $dateOpen3 && Carbon::now()->toDateString() != $dateExpired3 ) )
                ) {
                    $id  =  CountdownTimerFormInovation::find($request['id']);

                    if($id) {
                        $id->date_time_open_signature_human_resource_1                  =  $request['date_time_open_signature_human_resource_1'];
                        $id->status_open_signature_human_resource_1                     =  $request['status_open_signature_human_resource_1'];
                        $id->date_time_expired_signature_human_resource_1               =  $request['date_time_expired_signature_human_resource_1'];
                        $id->status_expired_signature_human_resource_1                  =  $request['status_expired_signature_human_resource_1'];
                        //
                        $id->date_time_open_signature_human_resource_2                  =  $request['date_time_open_signature_human_resource_2'];
                        $id->status_open_signature_human_resource_2                     =  $request['status_open_signature_human_resource_2'];
                        $id->date_time_expired_signature_human_resource_2               =  $request['date_time_expired_signature_human_resource_2'];
                        $id->status_expired_signature_human_resource_2                  =  $request['status_expired_signature_human_resource_2'];
                        //
                        $id->date_time_open_signature_human_resource_3                  =  $request['date_time_open_signature_human_resource_3'];
                        $id->status_open_signature_human_resource_3                     =  $request['status_open_signature_human_resource_3'];
                        $id->date_time_expired_signature_human_resource_3               =  $request['date_time_expired_signature_human_resource_3'];
                        $id->status_expired_signature_human_resource_3                  =  $request['status_expired_signature_human_resource_3'];
                        //
                        $id->save();

                        alert()->success('Berhasil Update Data Timer Verifikasi Tanda Tangan!')->autoclose(25000);
                        return redirect()->back()->with('message-update-signature-success', 'Berhasil Update Data Timer Verifikasi Tanda Tangan!');
                    } else {
                        alert()->error('Gagal Update Data Timer Penilaian!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-update-signature-error', 'Gagal Update Data Timer Penilaian!')->withErrors($validate)->withInput($request->all());
                    }
                }

                if(
                    (Carbon::now()->toDateString() === $dateOpen1 || Carbon::now()->toDateString() === $dateExpired1) ||
                    (Carbon::now()->toDateString() === $dateOpen2 || Carbon::now()->toDateString() === $dateExpired2) ||
                    (Carbon::now()->toDateString() === $dateOpen3 || Carbon::now()->toDateString() === $dateExpired3)
                ) {
                    alert()->error('Gagal Update Data Timer Verifikasi Tanda Tangan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                    return redirect()->back()->with('message-update-signature-error', 'Gagal Update Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
                }

                if(
                    ($dateOpen1 == $dateExpired1) ||
                    ($dateOpen2 == $dateExpired2) ||
                    ($dateOpen3 == $dateExpired3)
                ) {
                    alert()->error('Gagal Update Data Timer Verifikasi Tanda Tangan!', 'Tidak Boleh Tanggal Sama')->autoclose(25000);
                    return redirect()->back()->with('message-update-signature-error', 'Gagal Update Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
                }
                alert()->error('Gagal Update Data Timer Verifikasi Tanda Tangan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-update-signature-error', 'Gagal Update Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
            }
            // Create
            else {
                if(
                    ($dateOpen1 != $dateExpired1 && ( Carbon::now()->toDateString() != $dateOpen1 && Carbon::now()->toDateString() != $dateExpired1 ) ) &&
                    ($dateOpen2 != $dateExpired2 && ( Carbon::now()->toDateString() != $dateOpen2 && Carbon::now()->toDateString() != $dateExpired2 ) ) &&
                    ($dateOpen3 != $dateExpired3 && ( Carbon::now()->toDateString() != $dateOpen3 && Carbon::now()->toDateString() != $dateExpired3 ) )
                ) {
                    // Create New Timer
                    $timer = CountdownTimerFormInovation::create([
                        'date_time_open_signature_human_resource_3'                 =>  $request['date_time_open_signature_human_resource_3'],
                        'status_open_signature_human_resource_3'                    =>  $request['status_open_signature_human_resource_3'],
                        'date_time_expired_signature_human_resource_3'              =>  $request['date_time_expired_signature_human_resource_3'],
                        'status_expired_signature_human_resource_3'                 =>  $request['status_expired_signature_human_resource_3'],
                        //
                        'date_time_open_signature_human_resource_2'                 =>  $request['date_time_open_signature_human_resource_2'],
                        'status_open_signature_human_resource_2'                    =>  $request['status_open_signature_human_resource_2'],
                        'date_time_expired_signature_human_resource_2'              =>  $request['date_time_expired_signature_human_resource_2'],
                        'status_expired_signature_human_resource_2'                 =>  $request['status_expired_signature_human_resource_2'],
                        //
                        'date_time_open_signature_human_resource_1'                 =>  $request['date_time_open_signature_human_resource_1'],
                        'status_open_signature_human_resource_1'                    =>  $request['status_open_signature_human_resource_1'],
                        'date_time_expired_signature_human_resource_1'              =>  $request['date_time_expired_signature_human_resource_1'],
                        'status_expired_signature_human_resource_1'                 =>  $request['status_expired_signature_human_resource_1'],
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Verifikasi Tanda Tangan!')->autoclose(25000);
                        return redirect()->back()->with('message-create-signature-success', 'Berhasil Tambah Data Timer Verifikasi Tanda Tangan!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Verifikasi Tanda Tangan!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-signature-error', 'Gagal Tambah Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
                    }
                }
                alert()->error('Gagal Update Data Timer Verifikasi Tanda Tangan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-signature-error', 'Gagal Update Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
            }


        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTimerCountDownSignature(Request $request, $id)
    {
        try {
            $timer = CountdownTimerFormInovation::find($id);

            // ddd($timer);
            if($timer) {
                $timer->date_time_open_signature_human_resource_1                  =  null;
                $timer->status_open_signature_human_resource_1                     =  null;
                $timer->date_time_expired_signature_human_resource_1               =  null;
                $timer->status_expired_signature_human_resource_1                  =  null;
                //
                $timer->date_time_open_signature_human_resource_2                  =  null;
                $timer->status_open_signature_human_resource_2                     =  null;
                $timer->date_time_expired_signature_human_resource_2               =  null;
                $timer->status_expired_signature_human_resource_2                  =  null;
                //
                $timer->date_time_open_signature_human_resource_3                  =  null;
                $timer->status_open_signature_human_resource_3                     =  null;
                $timer->date_time_expired_signature_human_resource_3               =  null;
                $timer->status_expired_signature_human_resource_3                  =  null;
                //
                $timer->save();

                return response()->json(['success'=>"Berhasil Hapus Data Timer Tanda Tangan!"]);
                // ('message-delete-signature-success', 'Berhasil Hapus Data Timer Tanda Tangan!');
                // $timer->save();
                // $teetime = CountdownTimerFormInovation::where('id', '=', $id)->firstOrFail();
                // $teetime->destroy();
                // $timer->destroy();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    /**
     * Teladan
     * Teladan
     * Teladan
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTimerCountDownFormTeladan()
    {
        try {
            $timer  =   CountdownTimerFormTeladan::first();
            $timers  =   CountdownTimerFormTeladan::get();
            // ddd($timer->id);
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.timerCountDown.TCD_teladan_index-create', compact('timer', 'timers'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTimerCountDownFormTeladan(Request $request)
    {
        try {

            // validasi
            $validate = Validator::make(
                $request->all(),
                [
                    'date_time_open_countdown_teladan_appraisement'              =>  'required|date',
                    'status_open_appraisement'                                   =>  'required',
                    'date_time_expired_countdown_teladan_appraisement'           =>  'required|date|after_or_equal:date_time_open_countdown_teladan_appraisement',
                    'status_expired_appraisement'                                =>  'required',
                ],
                [
                    'date_time_open_countdown_teladan_appraisement.required'     =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Penilaian Teladan Wajib Diisi!',
                    'status_open_appraisement.required'                          =>  'Status Wajib Dipilih!',
                    'date_time_expired_countdown_teladan_appraisement.required'  =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Penilaian Teladan Wajib Diisi!',
                    'status_expired_appraisement.required'                       =>  'Status Wajib Dipilih!',

                    'date_time_expired_countdown_teladan_appraisement.after_or_equal' => 'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Penilaian Teladan Minimal Harus 1 Hari Setelah Pembukaan Penilaian Teladan',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal !', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-appraisement-error', 'Gagal ')->withErrors($validate)->withInput($request->all());
            }

            $dateTimeOpen           =   new Carbon($request['date_time_open_countdown_teladan_appraisement']);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($request['date_time_expired_countdown_teladan_appraisement']);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            // Update
            if($request['id'] != null) {
                $id  =  CountdownTimerFormTeladan::find($request['id']);

                if ($dateOpenTime === $id->date_time_open_appraisement && $dateExpiredTime === $id->date_time_expired_appraisement) {
                    $id->status_open_appraisement                        =  $request['status_open_appraisement'];
                    $id->status_expired_appraisement                     =  $request['status_expired_appraisement'];
                    $id->save();

                    alert()->success('Berhasil Update Data Timer Penilaian Teladan!')->autoclose(25000);
                    return redirect()->back()->with('message-update-appraisement-success', 'Berhasil Update Data Timer Penilaian Teladan!');
                }

                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    $id  =  CountdownTimerFormTeladan::find($request['id']);

                    if($id) {
                        $id->date_time_open_appraisement           =  $request['date_time_open_countdown_teladan_appraisement'];
                        $id->status_open_appraisement               =  $request['status_open_appraisement'];
                        $id->date_time_expired_appraisement        =  $request['date_time_expired_countdown_teladan_appraisement'];
                        $id->status_expired_appraisement            =  $request['status_expired_appraisement'];
                        $id->save();

                        alert()->success('Berhasil Update Data Timer Penilaian Teladan!')->autoclose(25000);
                        return redirect()->back()->with('message-update-appraisement-success', 'Berhasil Update Data Timer Penilaian Teladan!');
                    } else {
                        alert()->error('Gagal Update Data Timer Penilaian Teladan!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-update-appraisement-error', 'Gagal Update Data Timer Penilaian Teladan!')->withErrors($validate)->withInput($request->all());
                    }
                }

                // if ($dateOpenTime >= ) {
                //     # code...
                // }

                if( Carbon::now()->toDateString() === $dateOpen || Carbon::now()->toDateString() === $dateExpired ) {
                    alert()->error('Gagal Update Data Timer Penilaian Teladan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                    return redirect()->back()->with('message-create-appraisement-error', 'Gagal Update Data Timer Penilaian Teladan!')->withErrors($validate)->withInput($request->all());
                }

                if($dateOpen == $dateExpired) {
                    alert()->error('Gagal Update Data Timer Penilaian Teladan!', 'Tidak Boleh Tanggal Sama')->autoclose(25000);
                    return redirect()->back()->with('message-create-appraisement-error', 'Gagal Update Data Timer Penilaian Teladan!')->withErrors($validate)->withInput($request->all());
                }

                // alert()->error('Gagal Update Data Timer Berkas Teladan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                // return redirect()->back()->with('message-create-error', 'Gagal Update Data Timer Berkas Teladan!')->withErrors($validate)->withInput($request->all());
            }
            // Create
            else {
                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    // Create New Timer
                    $timer = CountdownTimerFormTeladan::create([
                        'date_time_open_appraisement'        =>  $request['date_time_open_countdown_teladan_appraisement'],
                        'status_open_appraisement'            =>  $request['status_open_appraisement'],
                        'date_time_expired_appraisement'     =>  $request['date_time_expired_countdown_teladan_appraisement'],
                        'status_expired_appraisement'         =>  $request['status_expired_appraisement'],
                        'hr_id'                                => Auth::guard('human_resources')->user()->id,
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Penilaian Teladan!')->autoclose(25000);
                        return redirect()->back()->with('message-create-appraisement-success', 'Berhasil Tambah Data Timer Penilaian Teladan!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Penilaian Teladan!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-appraisement-error', 'Gagal Tambah Data Timer Penilaian Teladan!')->withErrors($validate)->withInput($request->all());
                    }
                }

                if($dateOpen != $dateExpired) {
                    // Create New Timer
                    $timer = CountdownTimerFormTeladan::create([
                        'date_time_open_appraisement'        =>  $request['date_time_open_countdown_teladan_appraisement'],
                        'status_open_appraisement'            =>  $request['status_open_appraisement'],
                        'date_time_expired_appraisement'     =>  $request['date_time_expired_countdown_teladan_appraisement'],
                        'status_expired_appraisement'         =>  $request['status_expired_appraisement'],
                        'hr_id'                                          => Auth::guard('human_resources')->user()->id,
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Penilaian Teladan!')->autoclose(25000);
                        return redirect()->back()->with('message-create-appraisement-success', 'Berhasil Tambah Data Timer Penilaian Teladan!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Penilaian Teladan!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-appraisement-error', 'Gagal Tambah Data Timer Penilaian Teladan!')->withErrors($validate)->withInput($request->all());
                    }
                }

                if( Carbon::now()->toDateString() === $dateOpen || Carbon::now()->toDateString() === $dateExpired ) {
                    alert()->error('Gagal Update Data Timer Penilaian Teladan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-appraisement-error', 'Gagal Update Data Timer Penilaian Teladan!')->withErrors($validate)->withInput($request->all());
                }

                if($dateOpen == $dateExpired) {
                    alert()->error('Gagal Update Data Timer Penilaian Teladan!', 'Tidak Boleh Tanggal Sama')->autoclose(25000);
                    return redirect()->back()->with('message-create-appraisement-error', 'Gagal Update Data Timer Penilaian Teladan!')->withErrors($validate)->withInput($request->all());
                }

                // alert()->error('Gagal Update Data Timer Berkas Teladan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                // return redirect()->back()->with('message-create-error', 'Gagal Update Data Timer Berkas Teladan!')->withErrors($validate)->withInput($request->all());
            }


        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTimerCountDownFormTeladan(Request $request, $id)
    {
        try {
            $timer = CountdownTimerFormTeladan::find($id);
            if($timer) {
                $timer->delete();
                // $teetime = CountdownTimerFormInovation::where('id', '=', $id)->firstOrFail();
                // $teetime->destroy();
                // $timer->destroy();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTimerCountDownSignatureTeladan(Request $request)
    {
        try {

            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen1           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen1               =   $dateTimeOpen1->toDateString();
            $dateOpenTime1           =   $dateTimeOpen1->toDateTimeString();

            $dateTimeOpen2           =   new Carbon($timer->date_time_expired_appraisement);

            $dateOpen2               =   $dateTimeOpen2->toDateString();
            $dateOpenTime2           =   $dateTimeOpen2->toDateTimeString();

            if ($dateOpenTime1 != '') {
                $validate = Validator::make(
                    $request->all(),
                    [
                        //
                        'date_time_open_signature_human_resource_3'            =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|before_or_equal:date_time_expired_signature_human_resource_3',
                        'status_open_signature_human_resource_3'               =>  'required',
                        'date_time_expired_signature_human_resource_3'         =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|after_or_equal:date_time_open_signature_human_resource_3',
                        'status_expired_signature_human_resource_3'            =>  'required',
                        //
                        'date_time_open_signature_human_resource_2'            =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|before_or_equal:date_time_expired_signature_human_resource_2|after_or_equal:date_time_expired_signature_human_resource_3',
                        'status_open_signature_human_resource_2'               =>  'required',
                        'date_time_expired_signature_human_resource_2'         =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|after_or_equal:date_time_open_signature_human_resource_2',
                        'status_expired_signature_human_resource_2'            =>  'required',
                        //
                        'date_time_open_signature_human_resource_1'            =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|before_or_equal:date_time_expired_signature_human_resource_1|after_or_equal:date_time_expired_signature_human_resource_2',
                        'status_open_signature_human_resource_1'               =>  'required',
                        'date_time_expired_signature_human_resource_1'         =>  'required|date|after_or_equal:'.$dateOpenTime1.'|after_or_equal:'.$dateOpenTime2.'|after_or_equal:date_time_open_signature_human_resource_1',
                        'status_expired_signature_human_resource_1'            =>  'required',
                    ],
                    [
                        'date_time_open_signature_human_resource_3.required'                    =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_open_signature_human_resource_3.after_or_equal'              =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Penutupan Penilaian Teladan!',
                        'date_time_open_signature_human_resource_3.before_or_equal'             =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Sebelum Penutupan Verifikasi Tanda Tangan Teladan!',
                        //
                        'status_open_signature_human_resource_3.required'                       =>  'Status Pembukaan Wajib Dipilih!',
                        //
                        'date_time_expired_signature_human_resource_3.required'                 =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_expired_signature_human_resource_3.after_or_equal'           =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Pembukaan Verifikasi Tanda Tangan Teladan!',
                        //
                        'status_expired_signature_human_resource_3.required'                    =>  'Status Penutupan Wajib Dipilih!',

                        //
                        //
                        'date_time_open_signature_human_resource_2.required'                    =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_open_signature_human_resource_2.after_or_equal'              =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Penutupan Penilaian Teladan!',
                        'date_time_open_signature_human_resource_2.before_or_equal'             =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Sebelum Penutupan Verifikasi Tanda Tangan Teladan!',
                        //
                        'status_open_signature_human_resource_2.required'                       =>  'Status Pembukaan Wajib Dipilih!',
                        //
                        'date_time_expired_signature_human_resource_2.required'                 =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_expired_signature_human_resource_2.after_or_equal'           =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Pembukaan Verifikasi Tanda Tangan Teladan!',
                        //
                        'status_expired_signature_human_resource_2.required'                    =>  'Status Penutupan Wajib Dipilih!',

                        //
                        //
                        'date_time_open_signature_human_resource_1.required'                    =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_open_signature_human_resource_1.after_or_equal'              =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Penutupan Penilaian Teladan!',
                        'date_time_open_signature_human_resource_1.before_or_equal'             =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Sebelum Penutupan Verifikasi Tanda Tangan Teladan!',
                        //
                        'status_open_signature_human_resource_1.required'                       =>  'Status Pembukaan Wajib Dipilih!',
                        //
                        'date_time_expired_signature_human_resource_1.required'                 =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Verifikasi Tanda Tangan Wajib Diisi!',
                        'date_time_expired_signature_human_resource_1.after_or_equal'           =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Verifikasi Tanda Tangan Minimal Harus 1 Hari Setelah Pembukaan Verifikasi Tanda Tangan Teladan!',
                        //
                        'status_expired_signature_human_resource_1.required'                    =>  'Status Penutupan Wajib Dipilih!',
                    ]
                );

                if ($validate->fails()) {
                    alert()->error('Gagal !', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-create-signature-error', 'Gagal')->withErrors($validate)->withInput($request->all());
                }
            }

            // Role 1
            $dateTimeOpen1           =   new Carbon($request['date_time_open_signature_human_resource_1']);
            $dateOpen1               =   $dateTimeOpen1->toDateString();
            $dateOpenTime1           =   $dateTimeOpen1->toDateTimeString();

            $dateTimeExpired1        =   new Carbon($request['date_time_expired_signature_human_resource_1']);
            $dateExpired1            =   $dateTimeExpired1->toDateString();
            $dateExpiredTime1        =   $dateTimeExpired1->toDateTimeString();

            // Role 2
            $dateTimeOpen2           =   new Carbon($request['date_time_open_signature_human_resource_2']);
            $dateOpen2               =   $dateTimeOpen2->toDateString();
            $dateOpenTime2           =   $dateTimeOpen2->toDateTimeString();

            $dateTimeExpired2        =   new Carbon($request['date_time_expired_signature_human_resource_2']);
            $dateExpired2            =   $dateTimeExpired2->toDateString();
            $dateExpiredTime2        =   $dateTimeExpired2->toDateTimeString();

            // Role 3
            $dateTimeOpen3           =   new Carbon($request['date_time_open_signature_human_resource_3']);
            $dateOpen3               =   $dateTimeOpen3->toDateString();
            $dateOpenTime3           =   $dateTimeOpen3->toDateTimeString();

            $dateTimeExpired3        =   new Carbon($request['date_time_expired_signature_human_resource_3']);
            $dateExpired3            =   $dateTimeExpired3->toDateString();
            $dateExpiredTime3        =   $dateTimeExpired3->toDateTimeString();

            // Update
            if($request['id'] != null) {
                $id  =  CountdownTimerFormTeladan::find($request['id']);

                if (
                    ($dateOpenTime1 === $id->date_time_open_signature_human_resource_1 && $dateExpiredTime1 === $id->date_time_expired_signature_human_resource_1) &&
                    ($dateOpenTime1 === $id->date_time_open_signature_human_resource_2 && $dateExpiredTime1 === $id->date_time_expired_signature_human_resource_2) &&
                    ($dateOpenTime1 === $id->date_time_open_signature_human_resource_3 && $dateExpiredTime1 === $id->date_time_expired_signature_human_resource_3)
                    ) {
                    $id->status_open_signature_human_resource_1                                    =  $request['status_open_signature_human_resource_1'];
                    $id->status_expired_signature_human_resource_1                                 =  $request['status_expired_signature_human_resource_1'];
                    //
                    $id->status_open_signature_human_resource_2                                    =  $request['status_open_signature_human_resource_2'];
                    $id->status_expired_signature_human_resource_2                                 =  $request['status_expired_signature_human_resource_2'];
                    //
                    $id->status_open_signature_human_resource_3                                    =  $request['status_open_signature_human_resource_3'];
                    $id->status_expired_signature_human_resource_3                                 =  $request['status_expired_signature_human_resource_3'];
                    //
                    $id->save();

                    alert()->success('Berhasil Update Data Timer Verifikasi Tanda Tangan!')->autoclose(25000);
                    return redirect()->back()->with('message-create-signature-success', 'Berhasil Update Data Timer Verifikasi Tanda Tangan!');
                }

                if(
                    ($dateOpen1 != $dateExpired1 && ( Carbon::now()->toDateString() != $dateOpen1 && Carbon::now()->toDateString() != $dateExpired1 ) ) &&
                    ($dateOpen2 != $dateExpired2 && ( Carbon::now()->toDateString() != $dateOpen2 && Carbon::now()->toDateString() != $dateExpired2 ) ) &&
                    ($dateOpen3 != $dateExpired3 && ( Carbon::now()->toDateString() != $dateOpen3 && Carbon::now()->toDateString() != $dateExpired3 ) )
                ) {
                    $id  =  CountdownTimerFormTeladan::find($request['id']);

                    if($id) {
                        $id->date_time_open_signature_human_resource_1                  =  $request['date_time_open_signature_human_resource_1'];
                        $id->status_open_signature_human_resource_1                     =  $request['status_open_signature_human_resource_1'];
                        $id->date_time_expired_signature_human_resource_1               =  $request['date_time_expired_signature_human_resource_1'];
                        $id->status_expired_signature_human_resource_1                  =  $request['status_expired_signature_human_resource_1'];
                        //
                        $id->date_time_open_signature_human_resource_2                  =  $request['date_time_open_signature_human_resource_2'];
                        $id->status_open_signature_human_resource_2                     =  $request['status_open_signature_human_resource_2'];
                        $id->date_time_expired_signature_human_resource_2               =  $request['date_time_expired_signature_human_resource_2'];
                        $id->status_expired_signature_human_resource_2                  =  $request['status_expired_signature_human_resource_2'];
                        //
                        $id->date_time_open_signature_human_resource_3                  =  $request['date_time_open_signature_human_resource_3'];
                        $id->status_open_signature_human_resource_3                     =  $request['status_open_signature_human_resource_3'];
                        $id->date_time_expired_signature_human_resource_3               =  $request['date_time_expired_signature_human_resource_3'];
                        $id->status_expired_signature_human_resource_3                  =  $request['status_expired_signature_human_resource_3'];
                        //
                        $id->save();

                        alert()->success('Berhasil Update Data Timer Verifikasi Tanda Tangan!')->autoclose(25000);
                        return redirect()->back()->with('message-create-signature-success', 'Berhasil Update Data Timer Verifikasi Tanda Tangan!');
                    } else {
                        alert()->error('Gagal Update Data Timer Penilaian!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-signature-error', 'Gagal Update Data Timer Penilaian!')->withErrors($validate)->withInput($request->all());
                    }
                }

                if(
                    (Carbon::now()->toDateString() === $dateOpen1 || Carbon::now()->toDateString() === $dateExpired1) ||
                    (Carbon::now()->toDateString() === $dateOpen2 || Carbon::now()->toDateString() === $dateExpired2) ||
                    (Carbon::now()->toDateString() === $dateOpen3 || Carbon::now()->toDateString() === $dateExpired3)
                ) {
                    alert()->error('Gagal Update Data Timer Verifikasi Tanda Tangan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                    return redirect()->back()->with('message-create-signature-error', 'Gagal Update Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
                }

                if(
                    ($dateOpen1 == $dateExpired1) ||
                    ($dateOpen2 == $dateExpired2) ||
                    ($dateOpen3 == $dateExpired3)
                ) {
                    alert()->error('Gagal Update Data Timer Verifikasi Tanda Tangan!', 'Tidak Boleh Tanggal Sama')->autoclose(25000);
                    return redirect()->back()->with('message-create-signature-error', 'Gagal Update Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
                }
                alert()->error('Gagal Update Data Timer Verifikasi Tanda Tangan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-signature-error', 'Gagal Update Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
            }
            // Create
            else {
                if(
                    ($dateOpen1 != $dateExpired1 && ( Carbon::now()->toDateString() != $dateOpen1 && Carbon::now()->toDateString() != $dateExpired1 ) ) &&
                    ($dateOpen2 != $dateExpired2 && ( Carbon::now()->toDateString() != $dateOpen2 && Carbon::now()->toDateString() != $dateExpired2 ) ) &&
                    ($dateOpen3 != $dateExpired3 && ( Carbon::now()->toDateString() != $dateOpen3 && Carbon::now()->toDateString() != $dateExpired3 ) )
                ) {
                    // Create New Timer
                    $timer = CountdownTimerFormTeladan::create([
                        'date_time_open_signature_human_resource_3'                 =>  $request['date_time_open_signature_human_resource_3'],
                        'status_open_signature_human_resource_3'                    =>  $request['status_open_signature_human_resource_3'],
                        'date_time_expired_signature_human_resource_3'              =>  $request['date_time_expired_signature_human_resource_3'],
                        'status_expired_signature_human_resource_3'                 =>  $request['status_expired_signature_human_resource_3'],
                        //
                        'date_time_open_signature_human_resource_2'                 =>  $request['date_time_open_signature_human_resource_2'],
                        'status_open_signature_human_resource_2'                    =>  $request['status_open_signature_human_resource_2'],
                        'date_time_expired_signature_human_resource_2'              =>  $request['date_time_expired_signature_human_resource_2'],
                        'status_expired_signature_human_resource_2'                 =>  $request['status_expired_signature_human_resource_2'],
                        //
                        'date_time_open_signature_human_resource_1'                 =>  $request['date_time_open_signature_human_resource_1'],
                        'status_open_signature_human_resource_1'                    =>  $request['status_open_signature_human_resource_1'],
                        'date_time_expired_signature_human_resource_1'              =>  $request['date_time_expired_signature_human_resource_1'],
                        'status_expired_signature_human_resource_1'                 =>  $request['status_expired_signature_human_resource_1'],
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Verifikasi Tanda Tangan!')->autoclose(25000);
                        return redirect()->back()->with('message-create-signature-success', 'Berhasil Tambah Data Timer Verifikasi Tanda Tangan!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Verifikasi Tanda Tangan!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-signature-error', 'Gagal Tambah Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
                    }
                }
                alert()->error('Gagal Update Data Timer Verifikasi Tanda Tangan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-signature-error', 'Gagal Update Data Timer Verifikasi Tanda Tangan!')->withErrors($validate)->withInput($request->all());
            }


        } catch (\Throwable $th) {
            throw $th;
        }
    }




}
