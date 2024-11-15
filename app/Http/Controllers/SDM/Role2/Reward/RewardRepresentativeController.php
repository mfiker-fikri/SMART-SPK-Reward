<?php

namespace App\Http\Controllers\SDM\Role2\Reward;

use App\Http\Controllers\Controller;
use App\Models\FinalResultRewardTeladan;
use App\Models\RewardTeladan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RewardRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRewardRepresentativeKepalaBagianPenghargaanDisiplindanTataUsaha()
    {
        try {
            return view('layouts.sdm.content.kepalaBagianPenghargaanDisiplinTU.reward.rewardRepresentative_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRewardRepresentativeListKepalaBagianPenghargaanDisiplindanTataUsaha()
    {
        try {
            $data   =   FinalResultRewardTeladan::where([
                                //
                                ['signature_head_of_the_human_resources_bureau', '!=', null],
                                ['verify_head_of_the_human_resources_bureau', '!=', null],
                                //
                                ['score_final_result', '>', 0.75],
                            ])
                            ->latest()
                            ->orderBy('score_final_result', 'DESC')
                            ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y')"), 'DESC')
                            ->orderBy(DB::raw("DATE_FORMAT(updated_at, '%Y')"), 'DESC')
                            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($query) {
                        if (request()->has('created_at')) {
                            $query->whereYear('created_at', request('created_at'));
                        }
                    }, true)
                    ->addColumn('fullName', function ($row, RewardTeladan $rewardTeladan) {
                        $full_name  =   '<span>' . $row->resultFinalRepresentatives->employees->full_name . '</span>';
                        return $full_name;
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
                    ->rawColumns(['fullName', 'year', 'description'])
                    ->make(true);

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
