<?php

namespace App\Http\Controllers\SDM\Role2\Signature;

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
    public function getSignatureInovationKepalaBagianPenghargaanDisiplindanTataUsaha()
    {
        try {
            return view('layouts.sdm.content.kepalaBagianPenghargaanDisiplinTU.inovation_signature.inovationSignature_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignatureInovationListKepalaBagianPenghargaanDisiplindanTataUsaha()
    {
        try {

            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisment);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisment);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $finalResult            =   FinalResultRewardInovation::
                                        where([
                                            ['created_at', '>=', $dateOpenTime],
                                            ['created_at', '<=', $dateExpiredTime],
                                            ['updated_at', '>=', $dateOpenTime],
                                            ['updated_at', '<=', $dateExpiredTime],
                                            //
                                            ['signature_head_of_disciplinary_awards_and_administration', '=', null],
                                            ['verify_head_of_disciplinary_awards_and_administration', '=', null],
                                        ])->latest()->get();


            return DataTables::of($finalResult)
                    ->addIndexColumn()

                    ->addColumn('fullName', function ($row, RewardInovation $RewardInovation) {
                        $full_name  =   '<span>' . $row->resultFinalInovations->employees->full_name . '</span>';
                        return $full_name;
                    })
                    ->addColumn('year', function ($row) {
                        $year = '';
                        $year = '<span>'.\Carbon\Carbon::parse($row->created_at)->format('Y').'</span>';

                        return $year;
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '';
                        if ($row->score_final_result > 0.75 && $row->score_final_result <= 1) {
                            $actionBtn =
                                '
                                    <a href="' . route('sdm.getSignatureInovationId.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM', $row->id) . '"
                                    class="edit btn btn-info mx-1 mx-1 mx-1" style="color: black" id="printResultRewardInovationId">
                                        <i class="fas fa-file-signature"></i> Tanda Tangan
                                    </a>
                                ';
                        } else {
                            $actionBtn =
                                '<span>Tidak Mendapatkan Penghargaan</span>';
                        }

                        return $actionBtn;
                    })

                    ->rawColumns(['fullName', 'action', 'year'])
                    ->make(true);


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
    public function getSignatureInovationIdKepalaBagianPenghargaanDisiplindanTataUsaha($id)
    {
        try {
            return view('layouts.sdm.content.kepalaBagianPenghargaanDisiplinTU.inovation_signature.inovationSignature_update');
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
    public function postSignatureInovationIdKepalaBagianPenghargaanDisiplindanTataUsaha(Request $request)
    {
        try {

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
