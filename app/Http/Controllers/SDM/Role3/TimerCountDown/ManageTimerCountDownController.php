<?php

namespace App\Http\Controllers\SDM\Role3\TimerCountDown;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
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
            $timer  =   CountdownTimerFormInovation::first();
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
                    'date_time_countdown_inovation_form'            =>  'required',
                    'status'                                        =>  'required',
                ],
                [
                    'date_time_countdown_inovation_form.required'   =>  'Hari, Tanggal, Tahun, Jam, dan Menit Wajib Diisi!',
                    'status.required'                               =>  'Status Wajib Dipilih!',

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
            $dateTime   =   new Carbon($request['date_time_countdown_inovation_form']);
            $date =   $dateTime->toDateString();
            // ddd($date);

            // $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $request['date_time_countdown_inovation_form'])->year();

            // Update
            if($request['id'] != null) {
                if($date != Carbon::now()->toDateString() ) {
                    $id  =  CountdownTimerFormInovation::find($request['id']);

                    if($id) {
                        $id->date_time_form_inovation      =  $request['date_time_countdown_inovation_form'];
                        $id->status                        =  $request['status'];
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
                if($date != Carbon::now()->toDateString() ) {
                    // Create New Timer
                    $timer = CountdownTimerFormInovation::create([
                        'date_time_form_inovation'      =>  $request['date_time_countdown_inovation_form'],
                        'status'                        =>  $request['status'],
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

}
