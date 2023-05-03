<?php

namespace App\Http\Controllers\SDM\Role3\Signature;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormTeladan;
use App\Models\FinalResultRewardTeladan;
use App\Models\RewardTeladan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class SignatureTeladanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignatureRepresentativeKepalaSubbagianPenghargaanDisiplindanPensiun()
    {
        try {
            // Get Timer Countdown
            $timer                      =   CountdownTimerFormTeladan::first();

            if ($timer != null) {
                $timer                  =   CountdownTimerFormTeladan::first();
                return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.signature.representativeSignature_index', compact('timer'));
            } else {
                $timer                  =   CountdownTimerFormTeladan::first();
                return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.signature.representativeSignature_index', compact('timer'));
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
    public function getSignatureRepresentativeListKepalaSubbagianPenghargaanDisiplindanPensiun()
    {
        try {
            // Timer
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisement);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = FinalResultRewardTeladan::where([
                                ['created_at', '>=', $dateOpenTime],
                                ['created_at', '<=', $dateExpiredTime],
                                ['updated_at', '>=', $dateOpenTime],
                                ['updated_at', '<=', $dateExpiredTime],
                                //
                                ['signature_head_of_rewards_discipline_and_pension_subdivision', '=', null],
                                ['verify_head_of_rewards_discipline_and_pension_subdivision', '=', null],
                                //
                                ['score_final_result', '>', 0.75],
                            ])->latest()->orderBy('score_final_result', 'DESC')->get();


            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('fullName', function ($row, RewardTeladan $RewardTeladan) {
                            $full_name  =   '<span>' . $row->resultFinalRepresentatives->employees->full_name . '</span>';
                            return $full_name;
                        })
                        ->addColumn('action', function ($row) {
                            $actionBtn = '';
                            if ($row->score_final_result > 0.75 && $row->score_final_result <= 1) {
                                $actionBtn =
                                    '
                                        <a href="#" class="edit btn btn-info mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="verifySignatureRewardInovationId" data-id="' . $row->id . '">
                                            <i class="fas fa-file-signature"></i> Verification Signature
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
                            if ($row->score_final_result > 0.85 && $row->score_final_result <= 1.00) {
                                $desc = '<span>Terbaik</span>';
                            }
                            if ($row->score_final_result > 0.75 && $row->score_final_result <= 0.85) {
                                $desc = '<span>Baik</span>';
                            }

                            return $desc;
                        })
                        ->rawColumns(['fullName', 'action', 'year', 'description'])
                        ->make(true);

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
    public function postSignatureRepresentativeIdKepalaSubbagianPenghargaanDisiplindanPensiun(Request $request, $id)
    {
        try {
            $finalResult = FinalResultRewardTeladan::find($id);

            // Get SDM Username
            $sdm            =   Auth::guard('human_resources')->user()->username;
            // Get Signature Auth SDM
            $signature      =   Auth::guard('human_resources')->user()->signature;


            File::copy(public_path('storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/' . $signature), public_path('storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/' . $signature));

            if($finalResult) {
                $finalResult->signature_head_of_rewards_discipline_and_pension_subdivision    =   Auth::guard('human_resources')->user()->finalResult;
                $finalResult->name_head_of_rewards_discipline_and_pension_subdivision         =   Auth::guard('human_resources')->user()->full_name;
                $finalResult->verify_head_of_rewards_discipline_and_pension_subdivision       =   1;
                $finalResult->save();
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
