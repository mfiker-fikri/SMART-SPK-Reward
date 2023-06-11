<?php

namespace App\Http\Controllers\Pegawai\ResultReward;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormTeladan;
use App\Models\FinalResultRewardInovation;
use App\Models\FinalResultRewardTeladan;
use App\Models\RewardTeladan;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class RewardTeladanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pegawai.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getResultRewardRepresentativeRead()
    {
        try {
            return view('layouts.pegawai.content.resultReward.teladan.teladan_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getResultRewardRepresentativeReadData()
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

            $finalResult            =   FinalResultRewardTeladan::
                                    leftJoin('reward_representative', 'final_result_reward_representative.reward_teladan_id', '=', 'reward_representative.id')
                                    ->select(
                                        'final_result_reward_representative.id',
                                        'final_result_reward_representative.score_final_result',
                                        'final_result_reward_representative.score_final_result_description',
                                        'final_result_reward_representative.created_at',
                                        'final_result_reward_representative.updated_at',
                                        'final_result_reward_representative.reward_teladan_id',
                                        //
                                        // 'reward_representative.upload_file_short_description',
                                        // 'reward_representative.upload_file_image_support',
                                        // 'reward_representative.upload_file_video_support',
                                    )
                                    ->where([
                                        ['reward_representative.employee_id', '=', Auth::guard('employees')->user()->id],
                                        //
                                        ['signature_head_of_the_human_resources_bureau', '!=', null],
                                        ['verify_head_of_the_human_resources_bureau', '!=', null],
                                        //
                                        ['signature_head_of_disciplinary_awards_and_administration', '!=', null],
                                        ['verify_head_of_disciplinary_awards_and_administration', '!=', null],
                                        //
                                        ['signature_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                        ['verify_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                        // ['final_result_reward_representative.score_final_result', '>', 0.75],
                                        // ['final_result_reward_representative.created_at', '>=', $dateOpenTime],
                                        // ['final_result_reward_representative.created_at', '<=', $dateExpiredTime],
                                        // ['final_result_reward_representative.updated_at', '>=', $dateOpenTime],
                                        // ['final_result_reward_representative.updated_at', '<=', $dateExpiredTime],
                                    ])
                                    // ->latest('final_result_reward_representative.created_at')->get();
                                    ->get();
                                    // ->latest()->get();

            // ddd($finalResult);
            return DataTables::of($finalResult)
                    ->addIndexColumn()
                    ->addColumn('fullName', function ($row, RewardTeladan $rewardTeladan) {
                        $full_name  =   '<span>' . $row->resultFinalRepresentatives->employees->full_name . '</span>';
                        return $full_name;
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '';
                        if ($row->score_final_result > 0.75 && $row->score_final_result <= 1) {
                            $actionBtn =
                                '
                                    <a href="' . route('pegawai.getResultRewardRepresentativeData.PrintId.Pegawai', $row->id) . '"
                                    class="edit btn btn-info mx-1 mx-1 mx-1" style="color: black" id="printResultRewardRepresentativeId">
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
                    ->editColumn('fname', function ($row) {  //this example  for edit your columns if colums is empty
                        $fname = !empty($row->name) ? $row->name : 'empty';
                        return $fname;
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
    public function getResultRewardRepresentativePrintIdData($id)
    {
        try {

            $id     =   FinalResultRewardTeladan::where('final_result_reward_representative.id', '=', $id)
                        ->leftJoin('reward_representative', 'final_result_reward_representative.reward_teladan_id', '=', 'reward_representative.id')
                        ->select(
                            'final_result_reward_representative.id',
                            'final_result_reward_representative.score_final_result',
                            'final_result_reward_representative.score_final_result_description',
                            'final_result_reward_representative.created_at',
                            'final_result_reward_representative.updated_at',
                            'final_result_reward_representative.reward_teladan_id',
                            //
                            'final_result_reward_representative.signature_head_of_the_human_resources_bureau',
                            'final_result_reward_representative.name_head_of_the_human_resources_bureau',
                            //
                            'final_result_reward_representative.signature_head_of_disciplinary_awards_and_administration',
                            'final_result_reward_representative.name_head_of_disciplinary_awards_and_administration',
                            //
                            'final_result_reward_representative.signature_head_of_rewards_discipline_and_pension_subdivision',
                            'final_result_reward_representative.name_head_of_rewards_discipline_and_pension_subdivision',
                            //
                            //
                            // 'reward_representative.upload_file_short_description',
                            // 'reward_representative.upload_file_image_support',
                            // 'reward_representative.upload_file_video_support',
                        )->first()->toArray();

            $created_at     =   FinalResultRewardTeladan::find($id)
                                ->join('reward_representative', 'final_result_reward_representative.reward_teladan_id', '=', 'reward_representative.id')
                                ->select(
                                    'final_result_reward_representative.created_at',
                                    // 'final_result_reward_representative.updated_at',
                                    // 'final_result_reward_representative.reward_teladan_id',
                                )->first();


            // where([
            //     'id' => $id,
            // ]);
            // ddd($created_at);
            // $data = [
            //     'title' => 'Welcome to CodeSolutionStuff.com',
            //     'date' =>   date('m/d/Y'),
            //     'nama'  =>  Auth::guard('employees')->user()->full_name,
            // ];

            // ddd($id);

            $pdf = Pdf::loadView('layouts.pegawai.content.pdf.teladan.teladanPDF', $id)->setPaper('f4', 'landscape')->setWarnings(false);
            // ->save('myfile.pdf');
            // return view()

            // ddd($pdf);
            return $pdf->stream("Penerimaan Penghargaan Teladan - ".Auth::guard('employees')->user()->full_name." - ".\Carbon\Carbon::parse($created_at[0])->format('Y').".pdf");
            // ->download('codesolutionstuff.pdf');
            // $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

            // exit(0);
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
