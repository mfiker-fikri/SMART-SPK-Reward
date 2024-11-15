<?php

namespace App\Http\Controllers\SDM\Role1\Signature;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\FinalResultRewardInovation;
use App\Models\RewardInovation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class SignatureInovationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignatureInovationKepalaBiroSDM()
    {
        try {
            $timer                      =   CountdownTimerFormInovation::first();

            if ($timer != null) {
                $timer                  =   CountdownTimerFormInovation::first();
                return view('layouts.sdm.content.kepalaBiroSDM.signature.inovationSignature_index', compact('timer'));
            } else {
                $timer                  =   CountdownTimerFormInovation::first();
                return view('layouts.sdm.content.kepalaBiroSDM.signature.inovationSignature_index', compact('timer'));
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
    public function getSignatureInovationListKepalaBiroSDM()
    {
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisement);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data                           =   FinalResultRewardInovation::
                                                where([
                                                    // ['created_at', '>=', $dateOpenTime],
                                                    // ['created_at', '<=', $dateExpiredTime],
                                                    // ['updated_at', '>=', $dateOpenTime],
                                                    // ['updated_at', '<=', $dateExpiredTime],
                                                    //
                                                    ['signature_head_of_the_human_resources_bureau', '=', null],
                                                    ['verify_head_of_the_human_resources_bureau', '=', null],
                                                    //
                                                    ['score_final_result', '>', 0.75],
                                                ])->latest()->orderBy('score_final_result', 'DESC')->get();
                                                // ddd($data);


            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('fullName', function ($row, RewardInovation $RewardInovation) {
                        $full_name  =   '<span>' . $row->resultFinalInovations->employees->full_name . '</span>';
                        return $full_name;
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '';
                        if ($row->score_final_result > 0.75 && $row->score_final_result <= 1) {
                            $actionBtn =
                                '
                                    <a href="#" class="edit btn btn-info mx-1 mx-1 mx-1" style="color: black" id="verifySignatureRewardInovationId" data-id="' . $row->id . '">
                                        <i class="fas fa-file-signature"></i> Tanda Tangan
                                    </a>
                                ';
                        } else {
                            $actionBtn =
                                '<span>Tidak Mendapatkan Penghargaan</span>';
                        }

                        return $actionBtn;
                    })
                    ->addColumn('year', function ($row) {
                        $year = '';
                        $year = '<span>'.\Carbon\Carbon::parse($row->created_at)->format('Y').'</span>';

                        return $year;
                    })
                    ->addColumn('description', function ($row) {
                        $desc = '';
                        if ($row->score_final_result > 0.85 && $row->score_final_result <= 1) {
                            $desc = '<span>Terbaik</span>';
                        }
                        if ($row->score_final_result > 0.75 && $row->score_final_result <= 0.85) {
                            $desc = '<span>Baik</span>';
                        }

                        return $desc;
                    })
                    ->rawColumns(['fullName', 'action', 'year', 'description'])
                    ->make(true);

            // return view('layouts.sdm.content.kepalaBiroSDM.inovation_signature.inovationSignature_index');
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
    public function postSignatureInovationIdKepalaBiroSDM(Request $request, $id)
    {
        try {
            $finalResult = FinalResultRewardInovation::find($id);

            // Get SDM Username
            $sdm            =   Auth::guard('human_resources')->user()->username;
            // Get Signature Auth SDM
            $signature      =   Auth::guard('human_resources')->user()->signature;


            File::copy(public_path('storage/sdm/headOfHumanResources/signature/' . $signature), public_path('storage/sdm/headOfHumanResources/signature/' . $signature));

            if($finalResult) {
                $finalResult->signature_head_of_the_human_resources_bureau    =   Auth::guard('human_resources')->user()->signature;
                // ''.Auth::guard('human_resources')->user()->full_name.'/KLN.png';
                $finalResult->name_head_of_the_human_resources_bureau         =   Auth::guard('human_resources')->user()->full_name;
                $finalResult->verify_head_of_the_human_resources_bureau       =   1;
                $finalResult->timestamps                                      =   false;
                $finalResult->save();
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
    public function destroy($id)
    {
        //
    }
}
