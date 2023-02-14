<?php

namespace App\Http\Controllers\SDM\Role3\Signature;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\FinalResultRewardInovation;
use App\Models\RewardInovation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SignatureInovationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignatureInovationKepalaSubbagianPenghargaanDisiplindanPensiun()
    {
        try {
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.inovation_signature.inovationSignature_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignatureInovationListKepalaSubbagianPenghargaanDisiplindanPensiun()
    {
        try {
            // Timer
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisment);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisment);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = FinalResultRewardInovation::where([
                                ['created_at', '>=', $dateOpenTime],
                                ['created_at', '<=', $dateExpiredTime],
                                ['updated_at', '>=', $dateOpenTime],
                                ['updated_at', '<=', $dateExpiredTime],
                                //
                                ['score_final_result', '>', 0.75],
                            ])->latest()->orderBy('score_final_result', 'DESC')->get();


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
                                        <a href="' . route('pegawai.getResultRewardInovationData.PrintId.Pegawai', $row->id) . '"
                                        class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black" id="verifySignatureRewardInovationId">
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
                        ->rawColumns(['fullName', 'action', 'year'])
                        ->make(true);

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
