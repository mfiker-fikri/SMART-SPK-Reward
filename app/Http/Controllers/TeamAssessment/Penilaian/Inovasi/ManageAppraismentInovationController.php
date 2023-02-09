<?php

namespace App\Http\Controllers\TeamAssessment\Penilaian\Inovasi;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CountdownTimerFormInovation;
use App\Models\Criteria;
use App\Models\FinalResultRewardInovation;
use App\Models\Parameter;
use App\Models\Pegawai;
use App\Models\RewardInovation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ManageAppraismentInovationController extends Controller
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
            $timer                      =   CountdownTimerFormInovation::first();

            if ($timer != null) {
                $timer                  =   CountdownTimerFormInovation::first();

                // Option Select Inovation
                $selectOptionCategory = Category::where('id', '=', 1)->get();
                $selectOptionCriteria = Criteria::where('categorie_id', '=', 1)->get();
                $selectOptionParameter1 = Parameter::where('criteria_id', '=', 1)->get();
                $selectOptionParameter2 = Parameter::where('criteria_id', '=', 2)->get();
                $selectOptionParameter3 = Parameter::where('criteria_id', '=', 3)->get();
                $selectOptionParameter4 = Parameter::where('criteria_id', '=', 4)->get();
                $selectOptionParameter5 = Parameter::where('criteria_id', '=', 5)->get();
                $selectOptionParameter6 = Parameter::where('criteria_id', '=', 6)->get();

                return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_index', compact('timer', 'selectOptionParameter1',
                'selectOptionParameter2', 'selectOptionParameter3', 'selectOptionParameter4', 'selectOptionParameter5', 'selectOptionParameter6'));
            } else {
                $timer                  =   CountdownTimerFormInovation::first();

                // Option Select Inovation
                $selectOptionCategory = Category::where('id', '=', 1)->get();
                $selectOptionCriteria = Criteria::where('categorie_id', '=', 1)->get();
                $selectOptionParameter1 = Parameter::where('criteria_id', '=', 1)->get();
                $selectOptionParameter2 = Parameter::where('criteria_id', '=', 2)->get();
                $selectOptionParameter3 = Parameter::where('criteria_id', '=', 3)->get();
                $selectOptionParameter4 = Parameter::where('criteria_id', '=', 4)->get();
                $selectOptionParameter5 = Parameter::where('criteria_id', '=', 5)->get();
                $selectOptionParameter6 = Parameter::where('criteria_id', '=', 6)->get();

                // $reward     =   RewardInovation::latest()->get();
                return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_index', compact('timer', 'selectOptionParameter1',
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
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = RewardInovation::
                // DB::table('reward_inovation')
                where([
                    ['created_at', '>=', $dateOpenTime],
                    ['created_at', '<=', $dateExpiredTime],
                    ['updated_at', '>=', $dateOpenTime],
                    ['updated_at', '<=', $dateExpiredTime],
                    ['status_process', '=', 3],
                    ['score_valuation_1', '=' , null],
                    ['score_valuation_2', '=' , null],
                    ['score_valuation_3', '=' , null],
                    ['score_valuation_4', '=' , null],
                    ['score_valuation_5', '=' , null],
                    ['score_valuation_6', '=' , null],
                    // ['score_valuation_1' => null],
                    // ['score_valuation_2' => null],
                    // ['score_valuation_3' => null],
                    // ['score_valuation_4' => null],
                    // ['score_valuation_5' => null],
                    // ['score_valuation_6' => null],
                ])
                // ->whereNull('score_valuation_1')
                // ->orWhereNull('score_valuation_2')
                // ->orWhereNull('score_valuation_3')
                // ->orWhereNull('score_valuation_4')
                // ->orWhereNull('score_valuation_5')
                // ->orWhereNull('score_valuation_6')
                // ->whereBetween('created_at', [$dateOpenTime, $dateExpiredTime])
                // ->orWhereBetween('updated_at', [$dateOpenTime, $dateExpiredTime])
                // ->orWhere(['created_at', '>=', $timer->date_time_open_form_inovation])
                // ->orWhere(['created_at', '<=', $timer->date_time_expired_form_inovation])
                // ->orWhere(['updated_at', '>=', $timer->date_time_open_form_inovation])
                // ->orWhere(['updated_at', '<=', $timer->date_time_expired_form_inovation])
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
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Penilaian
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAppraismentListDSS(Request $request)
    {
        try {
            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = RewardInovation::
                // DB::table('reward_inovation')
                where([
                    ['created_at', '>=', $dateOpenTime],
                    ['created_at', '<=', $dateExpiredTime],
                    ['updated_at', '>=', $dateOpenTime],
                    ['updated_at', '<=', $dateExpiredTime],
                    ['status_process', '=', 4],
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
                ['categorie_id', '=', 1],
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
                ->addColumn('fullName', function (RewardInovation $RewardInovation) {
                    $full_name  =   '<span>' . $RewardInovation->employees->full_name . '</span>';
                    return $full_name;
                })
                ->rawColumns(['normalisasi', 'min', 'max', 'fullName', 'action', 'result'])
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
    public function getAppraismentListDSSResult(Request $request)
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

            // Final Reward Inovation
            $finalResult            =   FinalResultRewardInovation::where([
                                            ['created_at', '>=', $dateOpenTime],
                                            ['created_at', '<=', $dateExpiredTime],
                                            ['updated_at', '>=', $dateOpenTime],
                                            ['updated_at', '<=', $dateExpiredTime],
                                        ])->latest()->delete();

            // Timer
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            // DSS SMART
            $id             = RewardInovation::
                                select('id')
                                ->where([
                                    ['created_at', '>=', $dateOpenTime],
                                    ['created_at', '<=', $dateExpiredTime],
                                    ['updated_at', '>=', $dateOpenTime],
                                    ['updated_at', '<=', $dateExpiredTime],
                                    ['status_process', '=', 4],
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
                    ['categorie_id', '=', 1],
                ])->orderBy('id', 'asc')->get();

            // Jumlahkan Semua Kolom 'Value Quality'
            $sumCriteria            =   Criteria::where('categorie_id', '=', 1)->sum('value_quality');

            // Pembagian Normalisasi
            $normalisasi = [];
            foreach ($criterias as $value) {
                array_push($normalisasi, round( ($value->value_quality/$sumCriteria), 3));
            }

            // ddd($normalisasi);

            // Mencari Nilai Min
            $arrMin =  [];

            for ($x = 1; $x <= 6; $x++) {
                $min = RewardInovation::
                    select("score_valuation_$x")
                    ->where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['status_process', '=', 4],
                    ])
                    ->min("score_valuation_$x");
                array_push($arrMin, $min);
            }

            // ddd($arrMin);
            // return $arrMin;

            // Mencari Nilai Max
            $arrMax =  [];
            for ($x = 1; $x <= 6; $x++) {
                $max    =   RewardInovation::
                        select("score_valuation_$x")
                        ->where([
                            ['created_at', '>=', $dateOpenTime],
                            ['created_at', '<=', $dateExpiredTime],
                            ['updated_at', '>=', $dateOpenTime],
                            ['updated_at', '<=', $dateExpiredTime],
                            ['status_process', '=', 4],
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
            $nilai    =   RewardInovation::
                            select('score_valuation_1','score_valuation_2','score_valuation_3','score_valuation_4','score_valuation_5','score_valuation_6')
                            ->where([
                                ['created_at', '>=', $dateOpenTime],
                                ['created_at', '<=', $dateExpiredTime],
                                ['updated_at', '>=', $dateOpenTime],
                                ['updated_at', '<=', $dateExpiredTime],
                                ['status_process', '=', 4],
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

                // if ($resultDSSFinal >= 0 && $resultDSSFinal <= 0.4) {
                //     // echo 'Tidak Dapat Penghargaan';
                //     array_push($ket, 'Tidak Dapat Penghargaan');
                // } elseif ($resultDSSFinal > 0.4 && $resultDSSFinal <= 0.8) {
                //     // echo 'Dipertimbangkan';
                //     array_push($ket, 'Dipertimbangkan');
                // } elseif ($resultDSSFinal > 0.8 && $resultDSSFinal <= 1) {
                //     // echo 'Dapat Penghargaan';
                //     array_push($ket, 'Dapat Penghargaan');
                // }

                if ($resultDSSFinal >= 0 && $resultDSSFinal <= 0.75) {
                    // echo 'Tidak Dapat Penghargaan';
                    array_push($ket, 'Tidak Dapat Penghargaan');
                } elseif ($resultDSSFinal > 0.75 && $resultDSSFinal <= 1) {
                    // echo 'Dapat Penghargaan';
                    array_push($ket, 'Dapat Penghargaan');
                }

            }

            $count             = RewardInovation::
                                    where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 4],
                                    ])->latest()->get()->count();

            for ($x = 0; $x < $count; $x++) {

                FinalResultRewardInovation::create([
                    'id'                                =>  Str::uuid(),
                    'reward_inovation_id'               =>  $arrayId[$x],
                    'score_final_result'                =>  $ResultFinalDSS[$x],
                    'score_final_result_description'    =>  $ket[$x],
                ]);

            }

            // Timer
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
                                        ])->latest()->get();


            return DataTables::of($finalResult)
                    ->addIndexColumn()
                    ->addColumn('fullName', function ($row, RewardInovation $RewardInovation) {
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

            // Option Select Inovation
            $selectOptionCategory = Category::where('id', '=', 1)->get();
            $selectOptionCriteria = Criteria::where('categorie_id', '=', 1)->get();
            $selectOptionParameter1 = Parameter::where('criteria_id', '=', 1)->get();
            $selectOptionParameter2 = Parameter::where('criteria_id', '=', 2)->get();
            $selectOptionParameter3 = Parameter::where('criteria_id', '=', 3)->get();
            $selectOptionParameter4 = Parameter::where('criteria_id', '=', 4)->get();
            $selectOptionParameter5 = Parameter::where('criteria_id', '=', 5)->get();
            $selectOptionParameter6 = Parameter::where('criteria_id', '=', 6)->get();
            // $selectOptionCategory   =   DB::table('categories')
            //                             ->join('criterias', 'categories.id', '=', 'criterias.categorie_id')
            //                             ->join('parameters', 'criterias.id', '=', 'parameters.criteria_id')
            //                             ->select()

            // return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_update', compact('reward', 'selectOptionCategory', 'selectOptionCriteria'));
            return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_update',
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
            $reward     =   RewardInovation::find($id);

            if ($reward) {
                // Validasi
                $validate = Validator::make(
                    $request->all(),
                    [
                        'kebaruan'                             =>      'required|integer',
                        'kemanfaatan'                          =>      'required|integer',
                        'peranSerta'                           =>      'required|integer',
                        'transferReplikasi'                    =>      'required|integer',
                        'nyataNilaiTambah'                     =>      'required|integer',
                        'kesinambunganKonsistensiKerja'        =>      'required|integer',
                    ],
                    [
                        'kebaruan.required'                        =>      'Kebaruan Wajib Diisi!',
                        'kemanfaatan.required'                     =>      'Kemanfaatan Wajib Diisi!',
                        'peranSerta.required'                      =>      'Peran Serta Wajib Diisi!',
                        'transferReplikasi.required'               =>      'Dapat Ditransfer / Replikasi Wajib Diisi!',
                        'nyataNilaiTambah.required'                =>      'Karya Nyata dan Penciptaan Nilai Tambah Wajib Diisi!',
                        'kesinambunganKonsistensiKerja.required'   =>      'Kesinambungan dan Konsistensi Prestasi Kerja Wajib Diisi!',
                    ]
                );

                if ($validate->fails()) {
                    alert()->error('Gagal Menilai Data Form Inovasi!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-error', 'Gagal Menilai Data Form Inovasi!')->withErrors($validate)->withInput($request->all());
                }

                if ($reward->status_process == 3) {
                    // Update DB
                    $reward->score_valuation_1  =   $request['kebaruan'];
                    $reward->score_valuation_2  =   $request['kemanfaatan'];
                    $reward->score_valuation_3  =   $request['peranSerta'];
                    $reward->score_valuation_4  =   $request['transferReplikasi'];
                    $reward->score_valuation_5  =   $request['nyataNilaiTambah'];
                    $reward->score_valuation_6  =   $request['kesinambunganKonsistensiKerja'];
                    $reward->status_process     =   '4';
                    $reward->timestamps         =   false;
                    $reward->save();

                    alert()->success('Berhasil Menilai Data Form Inovasi')->autoclose(25000);
                    return redirect('penilai/appraisment/inovation')->with('message-update-success', 'Berhasil Menilai Data Form Inovasi');
                }



            }



        } catch (\Throwable $th) {
            throw $th;
        }
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
            $timer                      =   CountdownTimerFormInovation::first();

            if ($timer != null) {
                $timer                  =   CountdownTimerFormInovation::first();
                return view('layouts.teamAssessment.content.resultInovasi.resultInovasi_index', compact('timer'));
            } else {
                $timer                  =   CountdownTimerFormInovation::first();
                return view('layouts.teamAssessment.content.resultInovasi.resultInovasi_index', compact('timer'));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // try{

    // } catch (\Throwable $th) {
    //     throw $th;
    // }


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
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisment);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisment);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            // Final Reward Inovation
            $finalResult            =   FinalResultRewardInovation::where([
                                            ['created_at', '>=', $dateOpenTime],
                                            ['created_at', '<=', $dateExpiredTime],
                                            ['updated_at', '>=', $dateOpenTime],
                                            ['updated_at', '<=', $dateExpiredTime],
                                        ])->latest()->delete();

            // Timer
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            // DSS SMART
            $id             = RewardInovation::
                                select('id')
                                ->where([
                                    ['created_at', '>=', $dateOpenTime],
                                    ['created_at', '<=', $dateExpiredTime],
                                    ['updated_at', '>=', $dateOpenTime],
                                    ['updated_at', '<=', $dateExpiredTime],
                                    ['status_process', '=', 4],
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
                    ['categorie_id', '=', 1],
                ])->orderBy('id', 'asc')->get();

            // Jumlahkan Semua Kolom 'Value Quality'
            $sumCriteria            =   Criteria::where('categorie_id', '=', 1)->sum('value_quality');

            // Pembagian Normalisasi
            $normalisasi = [];
            foreach ($criterias as $value) {
                array_push($normalisasi, round( ($value->value_quality/$sumCriteria), 3));
            }

            // ddd($normalisasi);

            // Mencari Nilai Min
            $arrMin =  [];

            for ($x = 1; $x <= 6; $x++) {
                $min = RewardInovation::
                    select("score_valuation_$x")
                    ->where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['status_process', '=', 4],
                    ])
                    ->min("score_valuation_$x");
                array_push($arrMin, $min);
            }

            // ddd($arrMin);
            // return $arrMin;

            // Mencari Nilai Max
            $arrMax =  [];
            for ($x = 1; $x <= 6; $x++) {
                $max    =   RewardInovation::
                        select("score_valuation_$x")
                        ->where([
                            ['created_at', '>=', $dateOpenTime],
                            ['created_at', '<=', $dateExpiredTime],
                            ['updated_at', '>=', $dateOpenTime],
                            ['updated_at', '<=', $dateExpiredTime],
                            ['status_process', '=', 4],
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
            $nilai    =   RewardInovation::
                            select('score_valuation_1','score_valuation_2','score_valuation_3','score_valuation_4','score_valuation_5','score_valuation_6')
                            ->where([
                                ['created_at', '>=', $dateOpenTime],
                                ['created_at', '<=', $dateExpiredTime],
                                ['updated_at', '>=', $dateOpenTime],
                                ['updated_at', '<=', $dateExpiredTime],
                                ['status_process', '=', 4],
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

            $count             = RewardInovation::
                                    where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 4],
                                    ])->latest()->get()->count();

            for ($x = 0; $x < $count; $x++) {

                FinalResultRewardInovation::create([
                    'id'                                =>  Str::uuid(),
                    'reward_inovation_id'               =>  $arrayId[$x],
                    'score_final_result'                =>  $ResultFinalDSS[$x],
                    'score_final_result_description'    =>  $ket[$x],
                ]);

            }

            // Timer
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
                                        ])->latest()->get();


            return DataTables::of($finalResult)
                    ->addIndexColumn()
                    ->addColumn('fullName', function ($row, RewardInovation $RewardInovation) {
                        $full_name  =   '<span>' . $row->resultFinalInovations->employees->full_name . '</span>';
                        return $full_name;
                    })
                    ->rawColumns(['fullName'])
                    ->make(true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
