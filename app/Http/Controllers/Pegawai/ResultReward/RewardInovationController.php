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
// Yes
use Barryvdh\DomPDF\Facade\PDF;
//
// use Pdf;
// use \PDF;
use Yajra\DataTables\Facades\DataTables;
// use PDF;

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
            // Timer
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisement);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $finalResult            =   FinalResultRewardInovation::
                                    leftJoin('reward_innovation', 'final_result_reward_innovation.reward_innovation_id', '=', 'reward_innovation.id')
                                    ->select(
                                        'final_result_reward_innovation.id',
                                        'final_result_reward_innovation.score_final_result',
                                        'final_result_reward_innovation.score_final_result_description',
                                        'final_result_reward_innovation.created_at',
                                        'final_result_reward_innovation.updated_at',
                                        'final_result_reward_innovation.reward_innovation_id',
                                        //
                                        'reward_innovation.upload_file_short_description',
                                        'reward_innovation.upload_file_image_support',
                                        'reward_innovation.upload_file_video_support',
                                    )
                                    ->where([
                                        ['reward_innovation.employee_id', '=', Auth::guard('employees')->user()->id],
                                        //
                                        ['signature_head_of_the_human_resources_bureau', '!=', null],
                                        ['verify_head_of_the_human_resources_bureau', '!=', null],
                                        //
                                        ['signature_head_of_disciplinary_awards_and_administration', '!=', null],
                                        ['verify_head_of_disciplinary_awards_and_administration', '!=', null],
                                        //
                                        ['signature_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                        ['verify_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                    ])
                                    ->get();


            return view('layouts.pegawai.content.resultReward.inovation.inovation_index', compact('finalResult'));
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

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisement);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $finalResult            =   FinalResultRewardInovation::
                                    leftJoin('reward_innovation', 'final_result_reward_innovation.reward_innovation_id', '=', 'reward_innovation.id')
                                    ->select(
                                        'final_result_reward_innovation.id',
                                        'final_result_reward_innovation.score_final_result',
                                        'final_result_reward_innovation.score_final_result_description',
                                        'final_result_reward_innovation.created_at',
                                        'final_result_reward_innovation.updated_at',
                                        'final_result_reward_innovation.reward_innovation_id',
                                        //
                                        'reward_innovation.upload_file_short_description',
                                        'reward_innovation.upload_file_image_support',
                                        'reward_innovation.upload_file_video_support',
                                    )
                                    ->where([
                                        ['reward_innovation.employee_id', '=', Auth::guard('employees')->user()->id],
                                        //
                                        ['signature_head_of_the_human_resources_bureau', '!=', null],
                                        ['verify_head_of_the_human_resources_bureau', '!=', null],
                                        //
                                        ['signature_head_of_disciplinary_awards_and_administration', '!=', null],
                                        ['verify_head_of_disciplinary_awards_and_administration', '!=', null],
                                        //
                                        ['signature_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                        ['verify_head_of_rewards_discipline_and_pension_subdivision', '!=', null],
                                        // ['final_result_reward_innovation.score_final_result', '>', 0.75],
                                        // ['final_result_reward_innovation.created_at', '>=', $dateOpenTime],
                                        // ['final_result_reward_innovation.created_at', '<=', $dateExpiredTime],
                                        // ['final_result_reward_innovation.updated_at', '>=', $dateOpenTime],
                                        // ['final_result_reward_innovation.updated_at', '<=', $dateExpiredTime],
                                    ])
                                    // ->latest('final_result_reward_innovation.created_at')->get();
                                    ->get();
                                    // ->latest()->get();

            // $data = [];
            // if ($finalResult->isEmpty()) {
            //     return 'Tidak Ada';
            // }

            // if (empty($finalResult)) {
            //     return 'Tidak Ada';
            // }

            // ddd($finalResult);
            // ddd($data);
            return DataTables::of($finalResult)
                    ->addIndexColumn()
                    ->editColumn('fullName', function ($row, RewardInovation $RewardInovation) {
                        $full_name  =   '<span>' . $row->resultFinalInovations->employees->full_name . '</span>';
                        return $full_name;
                    })
                    ->editColumn('action', function ($row) {
                        $actionBtn = '';
                        if ($row->score_final_result > 0.75 && $row->score_final_result <= 1) {
                            $actionBtn =
                                '
                                    <a href="' . route('pegawai.getResultRewardInovationData.PrintId.Pegawai', $row->id) . '"
                                    class="edit btn btn-info mx-1 mx-1 mx-1" style="color: black" id="printResultRewardInovationId">
                                        <i class="fa-solid fa-print mx-auto me-1"></i> Cetak
                                    </a>
                                    <a href="' . route('pegawai.getResultRewardInovationData.DownloadId.Pegawai', $row->id) . '"
                                    class="btn btn-light mx-1 mx-1 mx-1" style="background-color:rgb(255, 99, 71); border:2px solid Tomato; color: black" id="downloadResultRewardInovationId">
                                        <i class="fa-solid fa-download mx-auto me-1" style="color: #000000;"></i> Unduh
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
                    ->editColumn('year', function ($row) {
                        $year = !empty($row->created_at) ? '<span>'.\Carbon\Carbon::parse($row->created_at)->format('Y').'</span>' : 'Kosong';
                        return $year;
                    })
                    ->rawColumns(['fullName', 'action', 'year'])
                    ->make(true);
                    // ->toJson();

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

            $id     =   FinalResultRewardInovation::where('final_result_reward_innovation.id', '=', $id)
                        ->leftJoin('reward_innovation', 'final_result_reward_innovation.reward_innovation_id', '=', 'reward_innovation.id')
                        ->select(
                            'final_result_reward_innovation.id',
                            'final_result_reward_innovation.score_final_result',
                            'final_result_reward_innovation.score_final_result_description',
                            'final_result_reward_innovation.created_at',
                            'final_result_reward_innovation.updated_at',
                            'final_result_reward_innovation.reward_innovation_id',
                            //
                            'final_result_reward_innovation.signature_head_of_the_human_resources_bureau',
                            'final_result_reward_innovation.name_head_of_the_human_resources_bureau',
                            //
                            'final_result_reward_innovation.signature_head_of_disciplinary_awards_and_administration',
                            'final_result_reward_innovation.name_head_of_disciplinary_awards_and_administration',
                            //
                            'final_result_reward_innovation.signature_head_of_rewards_discipline_and_pension_subdivision',
                            'final_result_reward_innovation.name_head_of_rewards_discipline_and_pension_subdivision',
                            //
                            //
                            'reward_innovation.upload_file_short_description',
                            'reward_innovation.upload_file_image_support',
                            'reward_innovation.upload_file_video_support',
                        )->first()->toArray();

            $created_at     =   FinalResultRewardInovation::find($id)
                                ->join('reward_innovation', 'final_result_reward_innovation.reward_innovation_id', '=', 'reward_innovation.id')
                                ->select(
                                    'final_result_reward_innovation.created_at',
                                    // 'final_result_reward_innovation.updated_at',
                                    // 'final_result_reward_innovation.reward_innovation_id',
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

            $pdf = PDF::loadView('layouts.pegawai.content.pdf.inovation.inovationPDF', $id)->setPaper('f4', 'landscape')->setWarnings(false);
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
    public function getResultRewardInovationDownloadIdData($id)
    {
        try {

            $id     =   FinalResultRewardInovation::where('final_result_reward_innovation.id', '=', $id)
                        ->leftJoin('reward_innovation', 'final_result_reward_innovation.reward_innovation_id', '=', 'reward_innovation.id')
                        ->select(
                            'final_result_reward_innovation.id',
                            'final_result_reward_innovation.score_final_result',
                            'final_result_reward_innovation.score_final_result_description',
                            'final_result_reward_innovation.created_at',
                            'final_result_reward_innovation.updated_at',
                            'final_result_reward_innovation.reward_innovation_id',
                            //
                            'final_result_reward_innovation.signature_head_of_the_human_resources_bureau',
                            'final_result_reward_innovation.name_head_of_the_human_resources_bureau',
                            //
                            'final_result_reward_innovation.signature_head_of_disciplinary_awards_and_administration',
                            'final_result_reward_innovation.name_head_of_disciplinary_awards_and_administration',
                            //
                            'final_result_reward_innovation.signature_head_of_rewards_discipline_and_pension_subdivision',
                            'final_result_reward_innovation.name_head_of_rewards_discipline_and_pension_subdivision',
                            //
                            //
                            'reward_innovation.upload_file_short_description',
                            'reward_innovation.upload_file_image_support',
                            'reward_innovation.upload_file_video_support',
                        )->first()->toArray();

            $created_at     =   FinalResultRewardInovation::find($id)
                                ->join('reward_innovation', 'final_result_reward_innovation.reward_innovation_id', '=', 'reward_innovation.id')
                                ->select(
                                    'final_result_reward_innovation.created_at',
                                    // 'final_result_reward_innovation.updated_at',
                                    // 'final_result_reward_innovation.reward_innovation_id',
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

            $pdf = PDF::loadView('layouts.pegawai.content.pdf.inovation.inovationPDF', $id)->setPaper('f4', 'landscape')->setWarnings(false);
            // ->save('myfile.pdf');
            return $pdf->download("Penerimaan Penghargaan Inovasi - ".Auth::guard('employees')->user()->full_name." - ".\Carbon\Carbon::parse($created_at[0])->format('Y').".pdf");
            // $content = $pdf->download()->getOriginalContent();

            // ddd($pdf);
            // return $pdf->stream("Penerimaan Penghargaan Inovasi - ".Auth::guard('employees')->user()->full_name." - ".\Carbon\Carbon::parse($created_at[0])->format('Y').".pdf");
            // ->download('codesolutionstuff.pdf');
            // $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

            // exit(0);
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
