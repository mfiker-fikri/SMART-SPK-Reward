<?php

namespace App\Http\Controllers\SDM\Role3\TimerCountDown;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\CountdownTimerFormTeladan;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            $timer  =   CountdownTimerFormInovation::get()->first();
            // ddd($timer->id);
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.timerCountDown.TCD_inovation_index-create', compact('timer'));
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
            // dd($request['status']);
            // validasi
            $validate = Validator::make(
                $request->all(),
                [
                    'date_time_open_countdown_inovation_form'            =>  'required',
                    'status_open'                                        =>  'required',
                    'date_time_expired_countdown_inovation_form'         =>  'required',
                    'status_expired'                                     =>  'required',
                ],
                [
                    'date_time_open_form_inovation.required'                      =>  'Hari, Tanggal, Tahun, Jam, dan Menit Pembukaan Form Inovasi Wajib Diisi!',
                    'status_open.required'                                        =>  'Status Pembukaan Wajib Dipilih!',
                    'date_time_expired_countdown_inovation_form.required'         =>  'Hari, Tanggal, Tahun, Jam, dan Menit Penutupan Form Inovasi Wajib Diisi!',
                    'status_expired.required'                                     =>  'Status Penutupan Wajib Dipilih!',

                    // 'date_time_open_form_inovation.date_format'    => ''
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal !', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal ')->withErrors($validate)->withInput($request->all());
            }

            // $dd = Carbon::parse($request['date_time_countdown_inovation_form'])->translatedFormat('Y/m/d h:i:s');
            // dd($dd);

            // if(CountdownTimerFormInovation::whereNotNull('date_time_form_inovation')) {
            // if(CountdownTimerFormInovation::isNotEmpty('date_time_form_inovation')) {
            // ddd(Carbon::now()->toDateString());
            // ddd($request['date_time_countdown_inovation_form']);
            $dateTimeOpen           =   new Carbon($request['date_time_open_countdown_inovation_form']);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($request['date_time_expired_countdown_inovation_form']);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();
            // ddd($date);

            // $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $request['date_time_countdown_inovation_form'])->year();

            // Update toDateTimeString()
            if($request['id'] != null) {
                $id  =  CountdownTimerFormInovation::find($request['id']);
                // dd($dateOpenTime);

                // dd($dateOpenTime === $id->date_time_open_form_inovation && $dateExpiredTime === $id->date_time_expired_form_inovation);
                // if ($dateOpen == $id->date_time_open_form_inovation || $dateExpired == $id->date_time_expired_form_inovation) {
                if ($dateOpenTime === $id->date_time_open_form_inovation && $dateExpiredTime === $id->date_time_expired_form_inovation) {
                    $id->status_open                                    =  $request['status_open'];
                    $id->status_expired                                 =  $request['status_expired'];
                    $id->save();

                    alert()->success('Berhasil Update Data Timer Form Inovation!')->autoclose(25000);
                    return redirect()->back()->with('message-create-success', 'Berhasil Update Data Timer Form Inovation!');
                }

                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    $id  =  CountdownTimerFormInovation::find($request['id']);

                    if($id) {
                        $id->date_time_open_form_inovation                  =  $request['date_time_open_countdown_inovation_form'];
                        $id->status_open                                    =  $request['status_open'];
                        $id->date_time_expired_form_inovation               =  $request['date_time_expired_countdown_inovation_form'];
                        $id->status_expired                                 =  $request['status_expired'];
                        $id->save();

                        alert()->success('Berhasil Update Data Timer Form Inovation!')->autoclose(25000);
                        return redirect()->back()->with('message-create-success', 'Berhasil Update Data Timer Form Inovation!');
                    } else {
                        alert()->error('Gagal Update Data Timer Form Inovation!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-error', 'Gagal Update Data Timer Form Inovation!')->withErrors($validate)->withInput($request->all());
                    }
                }
                alert()->error('Gagal Update Data Timer Form Inovation!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Update Data Timer Form Inovation!')->withErrors($validate)->withInput($request->all());
            }
            // Create
            else {
                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    // Create New Timer
                    $timer = CountdownTimerFormInovation::create([
                        'date_time_open_form_inovation'                 =>  $request['date_time_open_countdown_inovation_form'],
                        'status_open'                                   =>  $request['status_open'],
                        'date_time_expired_form_inovation'              =>  $request['date_time_expired_countdown_inovation_form'],
                        'status_expired'                                =>  $request['status_expired'],
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Form Inovation!')->autoclose(25000);
                        return redirect()->back()->with('message-create-success', 'Berhasil Tambah Data Timer Form Inovation!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Form Inovation!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Timer Form Inovation!')->withErrors($validate)->withInput($request->all());
                    }
                }
                alert()->error('Gagal Update Data Timer Form Inovation!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Update Data Timer Form Inovation!')->withErrors($validate)->withInput($request->all());
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
    public function getTimerCountDownFormTeladan()
    {
        try {
            $timer  =   CountdownTimerFormTeladan::first();
            // ddd($timer->id);
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.timerCountDown.TCD_teladan_index-create', compact('timer'));
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
            // dd($request['status']);
            // validasi
            $validate = Validator::make(
                $request->all(),
                [
                    'date_time_open_countdown_teladan_form'                     =>  'required',
                    'status_open'                                               =>  'required',
                    'date_time_expired_countdown_teladan_form'                  =>  'required',
                    'status_expired'                                            =>  'required',
                ],
                [
                    'date_time_open_countdown_teladan_form.required'            =>  'Hari, Tanggal, Tahun, Jam, dan Menit Wajib Diisi!',
                    'status_open.required'                                      =>  'Status Wajib Dipilih!',
                    'date_time_expired_countdown_teladan_form.required'         =>  'Hari, Tanggal, Tahun, Jam, dan Menit Wajib Diisi!',
                    'status_expired.required'                                   =>  'Status Wajib Dipilih!',

                    // 'date_time_countdown_inovation_form.date_format'    => ''
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal !', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal ')->withErrors($validate)->withInput($request->all());
            }

            // $dd = Carbon::parse($request['date_time_countdown_inovation_form'])->translatedFormat('Y/m/d h:i:s');
            // dd($dd);

            // if(CountdownTimerFormInovation::whereNotNull('date_time_form_inovation')) {
            // if(CountdownTimerFormInovation::isNotEmpty('date_time_form_inovation')) {
            // ddd(Carbon::now()->toDateString());
            // ddd($request['date_time_countdown_inovation_form']);
            $dateTimeOpen           =   new Carbon($request['date_time_open_countdown_teladan_form']);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($request['date_time_expired_countdown_teladan_form']);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();
            // ddd($date);

            // $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $request['date_time_countdown_inovation_form'])->year();

            // Update
            if($request['id'] != null) {
                $id  =  CountdownTimerFormTeladan::find($request['id']);

                if ($dateOpenTime === $id->date_time_open_form_teladan && $dateExpiredTime === $id->date_time_expired_form_teladan) {
                    $id->status_open                                    =  $request['status_open'];
                    $id->status_expired                                 =  $request['status_expired'];
                    $id->save();

                    alert()->success('Berhasil Update Data Timer Form Inovation!')->autoclose(25000);
                    return redirect()->back()->with('message-create-success', 'Berhasil Update Data Timer Form Inovation!');
                }

                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    $id  =  CountdownTimerFormTeladan::find($request['id']);

                    if($id) {
                        $id->date_time_open_form_teladan           =  $request['date_time_open_countdown_teladan_form'];
                        $id->status_open                           =  $request['status_open'];
                        $id->date_time_expired_form_teladan        =  $request['date_time_expired_countdown_teladan_form'];
                        $id->status_expired                        =  $request['status_expired'];
                        $id->save();

                        alert()->success('Berhasil Update Data Timer Form Teladan!')->autoclose(25000);
                        return redirect()->back()->with('message-create-success', 'Berhasil Update Data Timer Form Teladan!');
                    } else {
                        alert()->error('Gagal Update Data Timer Form Teladan!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-error', 'Gagal Update Data Timer Form Teladan!')->withErrors($validate)->withInput($request->all());
                    }
                }
                alert()->error('Gagal Update Data Timer Form Teladan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Update Data Timer Form Teladan!')->withErrors($validate)->withInput($request->all());
            }
            // Create
            else {
                if($dateOpen != $dateExpired && ( Carbon::now()->toDateString() != $dateOpen && Carbon::now()->toDateString() != $dateExpired ) ) {
                    // Create New Timer
                    $timer = CountdownTimerFormTeladan::create([
                        'date_time_open_form_teladan'        =>  $request['date_time_open_countdown_teladan_form'],
                        'status_open'                        =>  $request['status_open'],
                        'date_time_expired_form_teladan'     =>  $request['date_time_expired_countdown_teladan_form'],
                        'status_expired'                     =>  $request['status_expired'],
                    ]);
                    if($timer) {
                        alert()->success('Berhasil Tambah Data Timer Form Teladan!')->autoclose(25000);
                        return redirect()->back()->with('message-create-success', 'Berhasil Tambah Data Timer Form Teladan!');
                    } else {
                        alert()->error('Gagal Tambah Data Timer Form Teladan!', 'Validasi Gagal')->autoclose(25000);
                        return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Timer Form Teladan!')->withErrors($validate)->withInput($request->all());
                    }
                }
                alert()->error('Gagal Update Data Timer Form Teladan!', 'Tidak Boleh Tanggal Sekarang')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Update Data Timer Form Teladan!')->withErrors($validate)->withInput($request->all());
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

}
