<?php

namespace App\Http\Controllers\HWU\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\RewardInovation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class InovationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInovationFormList()
    {
        try {
            // Get Timer Countdown
            $timer                  =   CountdownTimerFormInovation::first();

            if ($timer == null ) {
                return view('layouts.hwu.content.penghargaan.inovation_index', compact('timer'));
            }

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);
            // ddd($dateTimeOpen);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
            // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);
            // ddd($dateTimeExpired);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();


            $rewardInovation = RewardInovation::
                    where(['status_process' => 2])
                    ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                    ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                    ->latest();

            return view('layouts.hwu.content.penghargaan.inovation_index', compact('timer', 'rewardInovation'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * waiting
     */
    public function getInovationFormData()
    {
        //
        $timer                  =   CountdownTimerFormInovation::first();
        // ddd($timer->date_time_open_form_inovation);

        $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);
        // ddd($dateTimeOpen);
        $dateOpen               =   $dateTimeOpen->toDateString();
        $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
        // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

        $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);
        // ddd($dateTimeExpired);
        $dateExpired            =   $dateTimeExpired->toDateString();
        $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();


        $data = RewardInovation::
            where([
                ['created_at', '>=', $dateOpenTime],
                ['created_at', '<=', $dateExpiredTime],
                ['updated_at', '>=', $dateOpenTime],
                ['updated_at', '<=', $dateExpiredTime],
                // ['employee_id', '=', Auth::guard('employees')->user()->id],
                ['status_process', '=', 2],
            ])
            ->latest()
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nama_full', function ($row) {
                $status = '';
                $status = $row->employees->full_name;
                return $status;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                // 2=menunggu
                if($row->status_process == 2) {
                    $actionBtn =
                    '
                        <a href="' . route('hwu.getInovationIdUpdate.Update.HWU', $row->id) . '" class="edit btn btn-info mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Lihat
                        </a>
                        ';
                }
                // 3=diproses
                elseif ($row->status_process == 3) {
                    $actionBtn =
                    '
                        <span>Sedang Tahap Di Proses</span>
                    ';
                }

                return $actionBtn;
            })
            ->rawColumns(['action','nama_full'])
            ->make(true);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getInovationIdUpdate($id)
    {
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();
            // ddd($timer->date_time_open_form_inovation);

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);
            // ddd($dateTimeOpen);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
            // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);
            // ddd($dateTimeExpired);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();
            // ddd(Carbon::now()->toDateTimeString() <= $dateExpiredTime);

            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {
                // Find id Reward
                // $id_employee        =    Auth::guard('employees')->user()->id;
                $rewardInovation    =    RewardInovation::
                    join('employees','reward_inovation.employee_id','=','employees.id')
                    ->select(
                        'reward_inovation.id',
                        'reward_inovation.upload_file_short_description',
                        'reward_inovation.upload_file_image_support',
                        'reward_inovation.upload_file_video_support',
                        'reward_inovation.upload_file_video_support',
                        'reward_inovation.status_process',
                        'reward_inovation.description_back',
                        //
                        'employees.full_name',
                        'employees.username',
                    )
                    ->where([
                        'reward_inovation.id' => $id,
                    // 'employee_id' => $id_employee
                    ])->first();
                // ddd($rewardInovation);
                return view('layouts.hwu.content.penghargaan.inovation_update',compact('rewardInovation', 'timer'));
            }
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postInovationFormDataReject(Request $request, $id)
    {
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {

                // Find id Reward
                $rewardInovation            =       RewardInovation::find($id);

                if($rewardInovation) {
                    // Update Database File
                    $rewardInovation->description_back                  =   $request['description_back'];
                    $rewardInovation->status_process                    =   '0';
                    $rewardInovation->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-inovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }
            }


        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postInovationFormDataBack(Request $request, $id)
    {
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {

                // Find id Reward
                $rewardInovation            =       RewardInovation::find($id);

                if($rewardInovation) {
                    // Update Database File
                    $rewardInovation->description_back                  =   $request['description_back'];
                    $rewardInovation->status_process                    =   '1';
                    $rewardInovation->save();
                    alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                    return redirect('form-inovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                }
            }


        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postInovationFormDataProcess(Request $request, $id)
    {
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            if (Carbon::now()->toDateTimeString() >= $dateOpenTime && Carbon::now()->toDateTimeString() <= $dateExpiredTime) {

                // Find id Reward
                $rewardInovation            =       RewardInovation::find($id);

                if($rewardInovation) {
                    // Update Database File
                    if ($request['description_back'] == null) {
                        $rewardInovation->status_process                    =   '3';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-inovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    } else {
                        $rewardInovation->description_back                  =   $request['description_back'];
                        $rewardInovation->status_process                    =   '3';
                        $rewardInovation->save();
                        alert()->success('Berhasil Update Persyaratan Penghargaan Inovasi')->autoclose(25000);
                        return redirect('form-inovation/list')->with('message-success-form-inovation', 'Berhasil Update Persyaratan Penghargaan Inovasi');
                    }
                }
            }


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
