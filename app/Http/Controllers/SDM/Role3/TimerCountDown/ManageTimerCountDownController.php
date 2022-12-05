<?php

namespace App\Http\Controllers\SDM\Role3\TimerCountDown;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
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
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.timerCountDown.TCD_index-create');
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
