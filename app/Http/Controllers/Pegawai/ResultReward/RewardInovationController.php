<?php

namespace App\Http\Controllers\Pegawai\ResultReward;

use App\Http\Controllers\Controller;
use App\Models\CountdownTimerFormInovation;
use App\Models\FinalResultRewardInovation;
use App\Models\RewardInovation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use PhpOffice\PhpSpreadsheet\Writer\Pdf;
// use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\Facade as Pdf;
// use PDF;
use Barryvdh\DomPDF\Facade\PDF;
// use Pdf;
// use \PDF;
use Yajra\DataTables\Facades\DataTables;

class RewardInovationController extends Controller
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
    public function getResultRewardInovationRead()
    {
        try {
            return view('layouts.pegawai.content.resultReward.inovation.inovation_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getResultRewardInovationReadData()
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

            $finalResult            =   FinalResultRewardInovation::
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
                                        ['reward_inovation.employee_id', '=', Auth::guard('employees')->user()->id],
                                        // ['final_result_reward_inovation.score_final_result', '>', 0.75],
                                        // ['final_result_reward_inovation.created_at', '>=', $dateOpenTime],
                                        // ['final_result_reward_inovation.created_at', '<=', $dateExpiredTime],
                                        // ['final_result_reward_inovation.updated_at', '>=', $dateOpenTime],
                                        // ['final_result_reward_inovation.updated_at', '<=', $dateExpiredTime],
                                    ])
                                    ->latest('final_result_reward_inovation.created_at')->get();
                                    // ->get();
                                    // ->latest()->get();

            // ddd($finalResult);
            return DataTables::of($finalResult)
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
                    ->rawColumns(['fullName', 'action', 'year'])
                    ->make(true);

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
    public function getResultRewardInovationPrintIdData($id)
    {
        try {

            $id     =   FinalResultRewardInovation::find($id)
                        ->leftJoin('reward_inovation', 'final_result_reward_inovation.reward_inovation_id', '=', 'reward_inovation.id')
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
                        )->first()->toArray();

            $created_at     =   FinalResultRewardInovation::find($id)
                                ->join('reward_inovation', 'final_result_reward_inovation.reward_inovation_id', '=', 'reward_inovation.id')
                                ->select(
                                    'final_result_reward_inovation.created_at',
                                    // 'final_result_reward_inovation.updated_at',
                                    // 'final_result_reward_inovation.reward_inovation_id',
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

            // ddd($data);

            $pdf = PDF::loadView('myPDF', $id)->setPaper('f4', 'landscape')->setWarnings(false);
            // ->save('myfile.pdf');

            // ddd($pdf);
            return $pdf->stream("Penerimaan Penghargaan Inovasi - ".Auth::guard('employees')->user()->full_name." - ".\Carbon\Carbon::parse($created_at[0])->format('Y').".pdf");
            // ->download('codesolutionstuff.pdf');
            // $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

            // exit(0);
        } catch (\Throwable $th) {
            throw $th;
        }
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
