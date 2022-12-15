<?php

namespace App\Http\Controllers\TeamAssessment\Penilaian\Inovasi;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\RewardInovation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ManageAppraismentInovationController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('team_assessment.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAppraisment()
    {
        try {
            $reward     =   RewardInovation::latest()->get();
            return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_index', compact('reward'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAppraismentList(Request $request)
    {
        try {
            $data = RewardInovation::
                // DB::table('reward_inovation')
                where(['status_process' => 3])
                ->latest()
                ->get();
            // ddd($data);
            // return json_encode($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '
                            <a href="' . route('penilai.getManageAppraismentId.Update.Penilai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                                <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                            </a>
                        ';

                    return $actionBtn;
                })
                ->addColumn('fullName', function (RewardInovation $RewardInovation) {
                    $full_name  =   '<span>' . $RewardInovation->employees->full_name . '</span>';
                    return $full_name;
                })
                ->rawColumns(['action', 'fullName'])
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
    public function getAppraismentIdUpdate($id)
    {
        try {
            // Find id Reward Inovation
            $reward     =   RewardInovation::find($id)->first();
            return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_update', compact('reward'));
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
