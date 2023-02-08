<?php

namespace App\Http\Controllers\SDM\Role1\Signature;

use App\Http\Controllers\Controller;
use App\Models\FinalResultRewardInovation;
use App\Models\RewardInovation;
use Illuminate\Http\Request;
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
            return view('layouts.sdm.content.kepalaBiroSDM.inovation_signature.inovationSignature_index');
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

            $data                           =   FinalResultRewardInovation::
                                                leftJoin('reward_inovation', 'final_result_reward_inovation.reward_inovation_id', '=', 'reward_inovation.id')
                                                ->select(
                                                    'final_result_reward_inovation.id',
                                                    'final_result_reward_inovation.score_final_result',
                                                    'final_result_reward_inovation.score_final_result_description',
                                                    'final_result_reward_inovation.created_at',
                                                    'final_result_reward_inovation.updated_at',
                                                    'final_result_reward_inovation.reward_inovation_id',
                                                    //
                                                    'reward_inovation.upload_file_short_description',
                                                    'reward_inovation.upload_file_image_support',
                                                    'reward_inovation.upload_file_video_support',
                                                )
                                                ->where([
                                                    // ['reward_inovation.employee_id', '=', Auth::guard('employees')->user()->id],
                                                    ['final_result_reward_inovation.score_final_result', '>', 0.75],
                                                    // ['final_result_reward_inovation.created_at', '>=', $dateOpenTime],
                                                    // ['final_result_reward_inovation.created_at', '<=', $dateExpiredTime],
                                                    // ['final_result_reward_inovation.updated_at', '>=', $dateOpenTime],
                                                    // ['final_result_reward_inovation.updated_at', '<=', $dateExpiredTime],
                                                ])
                                                // ->latest('final_result_reward_inovation.created_at')->get();
                                                ->get();


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
                                                class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black" id="printResultRewardInovationId">
                                                    <i class="fa-solid fa-print mx-auto me-1"></i> Print
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
