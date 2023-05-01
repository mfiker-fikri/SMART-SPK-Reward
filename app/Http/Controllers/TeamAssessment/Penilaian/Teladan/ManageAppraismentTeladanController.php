<?php

namespace App\Http\Controllers\TeamAssessment\Penilaian\Teladan;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CountdownTimerFormTeladan;
use App\Models\Criteria;
use App\Models\FinalResultRewardTeladan;
use App\Models\Parameter;
use App\Models\Pegawai;
use App\Models\RewardInovation;
use App\Models\RewardTeladan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ManageAppraismentTeladanController extends Controller
{
    /**
     * Create a new controller instance.
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
            // Get Timer Countdown
            $timer                      =   CountdownTimerFormTeladan::first();

            if ($timer != null) {
                $timer                  =   CountdownTimerFormTeladan::first();

                // Option Select Inovation
                $selectOptionCategory = Category::where('id', '=', 2)->get();
                $selectOptionCriteria = Criteria::where('categorie_id', '=', 2)->get();
                $selectOptionParameter1 = Parameter::where('criteria_id', '=', 7)->get();
                $selectOptionParameter2 = Parameter::where('criteria_id', '=', 8)->get();
                $selectOptionParameter3 = Parameter::where('criteria_id', '=', 9)->get();
                $selectOptionParameter4 = Parameter::where('criteria_id', '=', 10)->get();
                $selectOptionParameter5 = Parameter::where('criteria_id', '=', 11)->get();
                $selectOptionParameter6 = Parameter::where('criteria_id', '=', 12)->get();

                return view('layouts.teamAssessment.content.penilaianTeladan.penilaianTeladan_index', compact('timer', 'selectOptionParameter1',
                'selectOptionParameter2', 'selectOptionParameter3', 'selectOptionParameter4', 'selectOptionParameter5', 'selectOptionParameter6'));
            } else {
                $timer                  =   CountdownTimerFormTeladan::first();

                // Option Select Inovation
                $selectOptionCategory = Category::where('id', '=', 2)->get();
                $selectOptionCriteria = Criteria::where('categorie_id', '=', 2)->get();
                $selectOptionParameter1 = Parameter::where('criteria_id', '=', 7)->get();
                $selectOptionParameter2 = Parameter::where('criteria_id', '=', 8)->get();
                $selectOptionParameter3 = Parameter::where('criteria_id', '=', 9)->get();
                $selectOptionParameter4 = Parameter::where('criteria_id', '=', 10)->get();
                $selectOptionParameter5 = Parameter::where('criteria_id', '=', 11)->get();
                $selectOptionParameter6 = Parameter::where('criteria_id', '=', 12)->get();

                // $reward     =   RewardTeladan::latest()->get();
                return view('layouts.teamAssessment.content.penilaianTeladan.penilaianTeladan_index', compact('timer', 'selectOptionParameter1',
                'selectOptionParameter2', 'selectOptionParameter3', 'selectOptionParameter4', 'selectOptionParameter5', 'selectOptionParameter6'));
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
    public function getAppraismentList(Request $request)
    {
        try {
            //
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisement);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = Pegawai::
                // DB::table('reward_inovation')
                leftjoin('reward_teladan', 'reward_teladan.employee_id', '=', 'employees.id')
                ->select('employees.id', 'employees.full_name', 'reward_teladan.created_at', 'reward_teladan.updated_at', 'reward_teladan.status_process')
                ->where([
                    // ['reward_teladan.created_at', '>=', $dateOpenTime],
                    // ['reward_teladan.created_at', '<=', $dateExpiredTime],
                    // ['reward_teladan.updated_at', '>=', $dateOpenTime],
                    // ['reward_teladan.updated_at', '<=', $dateExpiredTime],
                    ['reward_teladan.status_process', '=', null],
                    // ['reward_teladan.score_valuation_1', '=' , null],
                    // ['reward_teladan.score_valuation_2', '=' , null],
                    // ['reward_teladan.score_valuation_3', '=' , null],
                    // ['reward_teladan.score_valuation_4', '=' , null],
                    // ['reward_teladan.score_valuation_5', '=' , null],
                    // ['reward_teladan.score_valuation_6', '=' , null],
                ])
                ->latest()
                ->get();
            // ddd($data);
            // return json_encode($data);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '
                            <a href="' . route('penilai.getManageAppraismentId.Representative.Update.Penilai', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Penilaian
                            </a>
                        ';

                    return $actionBtn;
                })
                // ->addColumn('fullName', function (RewardTeladan $rewardTeladan) {
                //     $full_name  =   '<span>' . $rewardTeladan->employees->full_name . '</span>';
                //     return $full_name;
                // })
                ->rawColumns(['action', 'fullName'])
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
    public function getAppraismentListDSS(Request $request)
    {
        try {
            //
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisement);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = RewardTeladan::
                // DB::table('reward_inovation')
                where([
                    ['created_at', '>=', $dateOpenTime],
                    ['created_at', '<=', $dateExpiredTime],
                    ['updated_at', '>=', $dateOpenTime],
                    ['updated_at', '<=', $dateExpiredTime],
                    ['status_process', '=', 1],
                    ['score_valuation_1', '!=', null],
                    ['score_valuation_2', '!=', null],
                    ['score_valuation_3', '!=', null],
                    ['score_valuation_4', '!=', null],
                    ['score_valuation_5', '!=', null],
                    ['score_valuation_6', '!=', null],
                ])
                // ->whereNotNull('score_valuation_1')
                // ->orWhereNotNull('score_valuation_2')
                // ->orWhereNotNull('score_valuation_3')
                // ->orWhereNotNull('score_valuation_4')
                // ->orWhereNotNull('score_valuation_5')
                // ->orWhereNotNull('score_valuation_6')
                ->latest()
                ->get();

            $criterias = Criteria::with('categories')->where([
                ['categorie_id', '=', 2],
            ])->orderBy('id', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row, Criteria $criteria) {
                    $actionBtn =
                        '
                            <a href="#" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black" id="viewResultInovationId"
                            data-fullName="'.$row->employees->full_name.'"
                            data-1="'.$row->score_valuation_1.'"
                            data-2="'.$row->score_valuation_2.'"
                            data-3="'.$row->score_valuation_3.'"
                            data-4="'.$row->score_valuation_4.'"
                            data-5="'.$row->score_valuation_5.'"
                            data-6="'.$row->score_valuation_6.'"
                            >
                                <i class="fa-solid fa-eye mx-auto me-1"></i> Hasil Penilaian
                            </a>
                        ';

                    return $actionBtn;
                })
                ->addColumn('fullName', function (RewardTeladan $RewardTeladan) {
                    $full_name  =   '<span>' . $RewardTeladan->employees->full_name . '</span>';
                    return $full_name;
                })
                ->rawColumns(['normalisasi', 'min', 'max', 'fullName', 'action', 'result'])
                ->make(true);
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
    public function getAppraismentIdUpdate($id)
    {
        try {
            // Find id Reward Inovation
            $reward     =   Pegawai::find($id);

            // Option Select Inovation
            $selectOptionCategory = Category::where('id', '=', 2)->get();
            $selectOptionCriteria = Criteria::where('categorie_id', '=', 2)->get();
            $selectOptionParameter1 = Parameter::where('criteria_id', '=', 7)->get();
            $selectOptionParameter2 = Parameter::where('criteria_id', '=', 8)->get();
            $selectOptionParameter3 = Parameter::where('criteria_id', '=', 9)->get();
            $selectOptionParameter4 = Parameter::where('criteria_id', '=', 10)->get();
            $selectOptionParameter5 = Parameter::where('criteria_id', '=', 11)->get();
            $selectOptionParameter6 = Parameter::where('criteria_id', '=', 12)->get();
            // $selectOptionCategory   =   DB::table('categories')
            //                             ->join('criterias', 'categories.id', '=', 'criterias.categorie_id')
            //                             ->join('parameters', 'criterias.id', '=', 'parameters.criteria_id')
            //                             ->select()

            // return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_update', compact('reward', 'selectOptionCategory', 'selectOptionCriteria'));
            return view('layouts.teamAssessment.content.penilaianTeladan.penilaianteladan_update',
                compact('reward', 'selectOptionCategory', 'selectOptionCriteria', 'selectOptionParameter1', 'selectOptionParameter2', 'selectOptionParameter3',
                'selectOptionParameter4', 'selectOptionParameter5', 'selectOptionParameter6'));
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
    public function postAppraismentIdUpdate(Request $request, $id)
    {
        try {
            // Find id Reward Inovation
            $reward     =   Pegawai::find($id);

            // ddd($reward->status_process);

            if ($reward) {
                // Validasi
                $validate = Validator::make(
                    $request->all(),
                    [
                        'pengetahuanKerja'                  =>      'required|integer',
                        'analisisPemecahanMasalah'          =>      'required|integer',
                        'tanggungJawabPekerjaan'            =>      'required|integer',
                        'disiplin'                          =>      'required|integer',
                        'komitmen'                          =>      'required|integer',
                        'kerjaSama'                         =>      'required|integer',
                    ],
                    [
                        'pengetahuanKerja.required'           =>      'Pengetahuan Kerja Wajib Diisi!',
                        'analisisPemecahanMasalah.required'   =>      'Analisis Pemecahan Masalah Wajib Diisi!',
                        'tanggungJawabPekerjaan.required'     =>      'Tanggung Jawab Pekerjaan Wajib Diisi!',
                        'disiplin.required'                   =>      'Disiplin Wajib Diisi!',
                        'komitmen.required'                   =>      'Komitmen Wajib Diisi!',
                        'kerjaSama.required'                  =>      'Kerja Sama Wajib Diisi!',
                    ]
                );

                if ($validate->fails()) {
                    alert()->error('Gagal Menilai Data Form Teladan!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-error', 'Gagal Menilai Data Form Teladan!')->withErrors($validate)->withInput($request->all());
                }

                // if ($reward->status_process == 3) {
                    // Update DB
                    $teladan                     =   new RewardTeladan();
                    $teladan->id                 =   Str::uuid();
                    $teladan->score_valuation_1  =   $request['pengetahuanKerja'];
                    $teladan->score_valuation_2  =   $request['analisisPemecahanMasalah'];
                    $teladan->score_valuation_3  =   $request['tanggungJawabPekerjaan'];
                    $teladan->score_valuation_4  =   $request['disiplin'];
                    $teladan->score_valuation_5  =   $request['komitmen'];
                    $teladan->score_valuation_6  =   $request['kerjaSama'];
                    $teladan->status_process     =   '1';
                    $teladan->employee_id        =   $reward->id;
                    // $teladan->timestamps         =   false;
                    $teladan->save();

                    alert()->success('Berhasil Menilai Data Form Teladan')->autoclose(25000);
                    return redirect('penilai/appraisement/representative')->with('message-update-success', 'Berhasil Menilai Data Form Teladan');
                // }

                alert()->error('Gagal Menilai Data Form Teladan')->autoclose(25000);
                return redirect()->back()->with('message-update-error', 'Gagal Menilai Data Form Teladan');


            }



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
    public function getResultAppraisment(Request $request)
    {
        try{
            // Get Timer Countdown
            $timer                      =   CountdownTimerFormTeladan::first();

            if ($timer != null) {
                $timer                  =   CountdownTimerFormTeladan::first();
                return view('layouts.teamAssessment.content.resultSMART.resultTeladan_index', compact('timer'));
            } else {
                $timer                  =   CountdownTimerFormTeladan::first();
                return view('layouts.teamAssessment.content.resultSMART.resultTeladan_index', compact('timer'));
            }
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
    public function getResultAppraismentList(Request $request)
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

            // Final Reward Inovation
            $finalResult            =   FinalResultRewardTeladan::where([
                                            ['created_at', '>=', $dateOpenTime],
                                            ['created_at', '<=', $dateExpiredTime],
                                            ['updated_at', '>=', $dateOpenTime],
                                            ['updated_at', '<=', $dateExpiredTime],
                                        ])->latest()->delete();

            // Timer
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisement);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            // DSS SMART
            $id             = RewardTeladan::
                                select('id')
                                ->where([
                                    ['created_at', '>=', $dateOpenTime],
                                    ['created_at', '<=', $dateExpiredTime],
                                    ['updated_at', '>=', $dateOpenTime],
                                    ['updated_at', '<=', $dateExpiredTime],
                                    ['status_process', '=', 1],
                                ])->get()->toArray();
            // ddd($id);

            $arrayId = [];
            foreach ($id as $key => $value) {
                // ddd($value);
                foreach ($value as $keyes => $valueses) {
                    // ddd($valueses);
                    array_push($arrayId, $valueses);
                }
            }
            // ddd($arrayId);

            // Normalisasi
            //
            $criterias = Criteria::with('categories')->where([
                    ['categorie_id', '=', 2],
                ])->orderBy('id', 'asc')->get();

            // Jumlahkan Semua Kolom 'Value Quality'
            $sumCriteria            =   Criteria::where('categorie_id', '=', 2)->sum('value_quality');

            // Pembagian Normalisasi
            $normalisasi = [];
            foreach ($criterias as $value) {
                array_push($normalisasi, round( ($value->value_quality/$sumCriteria), 3));
            }

            // ddd($normalisasi);

            // Mencari Nilai Min
            $arrMin =  [];

            for ($x = 1; $x <= 6; $x++) {
                $min = RewardTeladan::
                    select("score_valuation_$x")
                    ->where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['status_process', '=', 1],
                    ])
                    ->min("score_valuation_$x");
                array_push($arrMin, $min);
            }

            // ddd($arrMin);
            // return $arrMin;

            // Mencari Nilai Max
            $arrMax =  [];
            for ($x = 1; $x <= 6; $x++) {
                $max    =   RewardTeladan::
                        select("score_valuation_$x")
                        ->where([
                            ['created_at', '>=', $dateOpenTime],
                            ['created_at', '<=', $dateExpiredTime],
                            ['updated_at', '>=', $dateOpenTime],
                            ['updated_at', '<=', $dateExpiredTime],
                            ['status_process', '=', 1],
                        ])
                        ->max("score_valuation_$x");
                array_push($arrMax, $max);
            }
            // return $arrMax;

            $arrResultMinMax = [];
            foreach($arrMax as $aM => $value) {
                // echo $value;
                $arrResultMinMax[$aM] = $value - $arrMin[$aM];

            }
            // $arrResultMinMax = $arrMax + $arrMin;
            // return $arrResultMinMax;
            // ddd($arrResultMinMax);

            $arrResult =  [];
            $arrResultNilaiUtility = [];
            $nilai    =   RewardTeladan::
                            select('score_valuation_1','score_valuation_2','score_valuation_3','score_valuation_4','score_valuation_5','score_valuation_6')
                            ->where([
                                ['created_at', '>=', $dateOpenTime],
                                ['created_at', '<=', $dateExpiredTime],
                                ['updated_at', '>=', $dateOpenTime],
                                ['updated_at', '<=', $dateExpiredTime],
                                ['status_process', '=', 1],
                            ])
                            ->get()->toArray();
            // ddd($nilai);
            // return $nilai;

            foreach ($nilai as $key => $value) {

                $arrScrVal = [];
                for ($x = 1; $x <= 6; $x++) {
                    array_push($arrScrVal, $value["score_valuation_$x"]);
                }
                // ddd($arrScrVal);

                $arrUtilityResult = [];
                foreach ($arrScrVal as $key => $value) {
                    // ddd($value);
                    $arrUtilityResult[$key] = $value - $arrMin[$key];
                    // $arrResultMinMax[$aM] = $value - $arrMin[$aM];
                }

                // ddd($arrUtilityResult);

                $arrNilaiUtility = [];
                foreach ($arrUtilityResult as $key => $value) {

                    $arrNilaiUtility[$key] = $arrResultMinMax[$key] == 0 ? 0 : $value / $arrResultMinMax[$key];
                }

                array_push($arrResultNilaiUtility, $arrNilaiUtility);

            }
            // ddd($arrNilaiUtility);


            $ResultFinalDSS = [];
            $ket = [];

            foreach ($arrResultNilaiUtility as $key => $value) {
                // ddd($value);
                $Result = [];
                foreach ($value as $key => $valueEach) {
                    // ddd($valueEach);
                    $result[$key] =  $valueEach * $normalisasi[$key];
                }
                // ddd($result);

                $resultDSSFinal = 0;
                foreach ($result as $key => $valueEach) {
                    $resultDSSFinal += round($valueEach, 3);

                }

                array_push($ResultFinalDSS, $resultDSSFinal);
                // ddd($resultDSSFinal);

                if ($resultDSSFinal >= 0 && $resultDSSFinal <= 0.75) {
                    // echo 'Tidak Dapat Penghargaan';
                    array_push($ket, 'Tidak Dapat Penghargaan');
                } elseif ($resultDSSFinal > 0.75 && $resultDSSFinal <= 1) {
                    // echo 'Dapat Penghargaan';
                    array_push($ket, 'Dapat Penghargaan');
                }

            }

            $count             = RewardTeladan::
                                    where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 1],
                                    ])->latest()->get()->count();

            for ($x = 0; $x < $count; $x++) {

                FinalResultRewardTeladan::create([
                    'id'                                =>  Str::uuid(),
                    'reward_inovation_id'               =>  $arrayId[$x],
                    'score_final_result'                =>  $ResultFinalDSS[$x],
                    'score_final_result_description'    =>  $ket[$x],
                ]);

            }

            // Timer
            $timer                  =   CountdownTimerFormTeladan::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisement);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisement);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();


            $finalResult            =   FinalResultRewardTeladan::
                                        where([
                                            ['created_at', '>=', $dateOpenTime],
                                            ['created_at', '<=', $dateExpiredTime],
                                            ['updated_at', '>=', $dateOpenTime],
                                            ['updated_at', '<=', $dateExpiredTime],
                                        ])->latest()->orderBy('score_final_result', 'DESC')->get();


            return DataTables::of($finalResult)
                    ->addIndexColumn()
                    ->addColumn('fullName', function ($row, RewardTeladan $RewardTeladan) {
                        $full_name  =   '<span>' . $row->resultFinalInovations->employees->full_name . '</span>';
                        return $full_name;
                    })
                    ->rawColumns(['fullName'])
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
