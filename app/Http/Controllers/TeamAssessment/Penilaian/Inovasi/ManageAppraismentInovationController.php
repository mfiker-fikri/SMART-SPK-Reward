<?php

namespace App\Http\Controllers\TeamAssessment\Penilaian\Inovasi;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CountdownTimerFormInovation;
use App\Models\Criteria;
use App\Models\Parameter;
use App\Models\Pegawai;
use App\Models\RewardInovation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

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
            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();


            // DSS SMART
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

                if ($resultDSSFinal >= 0 && $resultDSSFinal <= 0.4) {
                    // echo 'Tidak Dapat Penghargaan';
                    array_push($ResultFinalDSS, 'Tidak Dapat Penghargaan');
                } elseif ($resultDSSFinal > 0.4 && $resultDSSFinal <= 0.8) {
                    // echo 'Dipertimbangkan';
                    array_push($ResultFinalDSS, 'Dipertimbangkan');
                } elseif ($resultDSSFinal > 0.8 && $resultDSSFinal <= 1) {
                    // echo 'Dapat Penghargaan';
                    array_push($ResultFinalDSS, 'Dapat Penghargaan');
                }


                // array_push($ResultFinalDSS, $resultDSSFinal);
                // ddd($resultDSSFinal);
            }

            ddd($ResultFinalDSS);



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
                // ->addColumn('normalisasi', function ($row) use ($criterias){
                //     $normalisasi = [];
                //     foreach ($criterias as $key => $value) {
                //         // return $value;
                //         $normalisasi    =   $value['value_quality'] / Criteria::where('categorie_id', '=', 1)->sum('value_quality');
                //     }
                //     return $normalisasi;
                //     // $i = 0;
                //     // for ($i=0; $i < count($criterias); $i++) {
                //     //     if ($i == 0) {
                //     //         $normalisasi1 = $criterias[$i]['value_quality'];
                //     //         return $normalisasi1;
                //     //     }
                //     //     elseif ($i == 1) {
                //     //         $normalisasi2 = $criterias[$i]['value_quality'];
                //     //         return $normalisasi2;
                //     //     }
                //     // }
                //     // return $normalisasi1.$normalisasi2;
                //     // foreach ($criterias as $key => $value) {
                //     //     return $value;
                //     //     foreach ($value as $key => $v) {
                //     //         return $v[0]['value_quality'];
                //     //     }
                //     //     // $inc = $i++;
                //     //     // $key++;
                //     //     // $normalisasi = $value['value_quality'][0];
                //     //     // return $normalisasi;
                //     // }
                //     // return $i;
                // })
                ->addColumn('min', function ($row) {
                    $min1    =   $row->min('score_valuation_1');
                    $min2    =   $row->min('score_valuation_2');
                    $min3    =   $row->min('score_valuation_3');
                    $min4    =   $row->min('score_valuation_4');
                    $min5    =   $row->min('score_valuation_5');
                    $min6    =   $row->min('score_valuation_6');
                    // return $min1.$min2.$min3.$min4.$min5.$min6;
                })
                ->addColumn('max', function ($row) {
                    $max1    =   $row->max('score_valuation_1');
                    $max2    =   $row->max('score_valuation_2');
                    $max3    =   $row->max('score_valuation_3');
                    $max4    =   $row->max('score_valuation_4');
                    $max5    =   $row->max('score_valuation_5');
                    $max6    =   $row->max('score_valuation_6');
                    // return $max1.$max2.$max3.$max4.$max5.$max6;
                })
                ->addColumn('result', function ($row, Criteria $criteria) {
                    // Normalisasi
                    // Jumlahkan Semua Kolom 'Value Quality'
                    // $criteria               =   Criteria::
                    //                             // select('value_quality')
                    //                             // ->with('categories')
                    //                             where([
                    //                                 ['categorie_id', '=', 1],
                    //                             ])
                    //                             // ->orderBy('id', 'asc')
                    //                             // ->first();
                    //                             // ->latest()
                    //                             ->get();
                    //                             // ->toArray();

                    // // return $criteria;
                    // $sumCriteria            =   Criteria::where('categorie_id', '=', 1)->sum('value_quality');

                    // $bobotKriteria          =   [];
                    // foreach ($criteria as $k => $value) {
                    //     return $value;
                    //     for ($k=0; $k<count($criteria); $k++) {
                    //         $normalisasi    =   $value[$k]['value_quality'] / Criteria::where('categorie_id', '=', 1)->sum('value_quality');
                    //         return $normalisasi;
                    //     }
                    //     // $bobotKriteria  =   $bobotKriteria;
                    //     // return $i ;
                    //     // return $normalisasi;
                    //     // return round($normalisasi, 3);
                    // }
                    // return $bobotKriteria;

                    // $normalisasi            =   Criteria::where('categorie_id', '=', 1)->sum('value_quality');

                    // // Pembagian Normalisasi1
                    // $normalization1          =   $criteria[0]['value_quality'] / $normalisasi;

                    // $resultNormalization1    =   round($normalization1, 3);

                    // // Pembagian Normalisasi2
                    // $normalization2          =   $criteria[1]['value_quality'] / $normalisasi;

                    // $resultNormalization2    =   round($normalization2, 3);

                    // // Pembagian Normalisasi3
                    // $normalization3          =   $criteria[2]['value_quality'] / $normalisasi;

                    // $resultNormalization3    =   round($normalization3, 3);

                    // // Pembagian Normalisasi4
                    // $normalization4          =   $criteria[3]['value_quality'] / $normalisasi;

                    // $resultNormalization4    =   round($normalization4, 3);

                    // // Pembagian Normalisasi5
                    // $normalization5          =   $criteria[4]['value_quality'] / $normalisasi;

                    // $resultNormalization5    =   round($normalization5, 3);

                    // // Pembagian Normalisasi6
                    // $normalization6          =   $criteria[5]['value_quality'] / $normalisasi;

                    // $resultNormalization6    =   round($normalization6, 3);

                    //
                    // $timer                  =   CountdownTimerFormInovation::first();

                    // $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

                    // $dateOpen               =   $dateTimeOpen->toDateString();
                    // $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

                    // $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

                    // $dateExpired            =   $dateTimeExpired->toDateString();
                    // $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

                    // // Mencari Nilai Min
                    // $min1    =   RewardInovation::
                    //             min('score_valuation_1')
                    //             ->where([
                    //                 ['created_at', '>=', $dateOpenTime],
                    //                 ['created_at', '<=', $dateExpiredTime],
                    //                 ['updated_at', '>=', $dateOpenTime],
                    //                 ['updated_at', '<=', $dateExpiredTime],
                    //                 ['status_process', '=', 4],
                    //             ]);

                    // $min2    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->min('score_valuation_2');

                    // $min3    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->min('score_valuation_3');

                    // $min4    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->min('score_valuation_4');

                    // $min5    =   RewardInovation::
                    //             min('score_valuation_5')
                    //             ->where([
                    //                 ['created_at', '>=', $dateOpenTime],
                    //                 ['created_at', '<=', $dateExpiredTime],
                    //                 ['updated_at', '>=', $dateOpenTime],
                    //                 ['updated_at', '<=', $dateExpiredTime],
                    //                 ['status_process', '=', 4],
                    //             ]);

                    // $min6    =   RewardInovation::
                    //             min('score_valuation_6')
                    //             ->where([
                    //                 ['created_at', '>=', $dateOpenTime],
                    //                 ['created_at', '<=', $dateExpiredTime],
                    //                 ['updated_at', '>=', $dateOpenTime],
                    //                 ['updated_at', '<=', $dateExpiredTime],
                    //                 ['status_process', '=', 4],
                    //             ]);
                    // // ddd($min);
                    // // return $min6;

                    // // Mencari Nilai Max
                    // $max1    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->max('score_valuation_1');

                    // $max2    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->max('score_valuation_2');

                    // $max3    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->max('score_valuation_3');

                    // $max4    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->max('score_valuation_4');

                    // $max5    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->max('score_valuation_5');

                    // $max6    =   RewardInovation::
                    //         where([
                    //             ['created_at', '>=', $dateOpenTime],
                    //             ['created_at', '<=', $dateExpiredTime],
                    //             ['updated_at', '>=', $dateOpenTime],
                    //             ['updated_at', '<=', $dateExpiredTime],
                    //             ['status_process', '=', 4],
                    //         ])
                    //         ->max('score_valuation_6');
                    // // return $max5;

                    // // Nilai Utility
                    // $cDummy1    =   RewardInovation::
                    //                 select('score_valuation_1')
                    //                 ->where([
                    //                     ['created_at', '>=', $dateOpenTime],
                    //                     ['created_at', '<=', $dateExpiredTime],
                    //                     ['updated_at', '>=', $dateOpenTime],
                    //                     ['updated_at', '<=', $dateExpiredTime],
                    //                     ['status_process', '=', 4],
                    //                 ])
                    //                 ->first();

                    // $atas   =   $row->score_valuation_1 - $min1;
                    // $bawah  =   $max1 - $min1;
                    // $nilaiUtility1 = $bawah == 0 ? 0 : $atas / $bawah;
                    // // return round($nilaiUtility1, 3);

                    // $cDummy2    =   RewardInovation::
                    //                 select('score_valuation_2')
                    //                 ->where([
                    //                     ['created_at', '>=', $dateOpenTime],
                    //                     ['created_at', '<=', $dateExpiredTime],
                    //                     ['updated_at', '>=', $dateOpenTime],
                    //                     ['updated_at', '<=', $dateExpiredTime],
                    //                     ['status_process', '=', 4],
                    //                 ])
                    //                 ->first();

                    // $atas   =   $row->score_valuation_2 - $min2;
                    // $bawah  =   $max2 - $min2;
                    // $nilaiUtility2 = $bawah == 0 ? 0 : $atas / $bawah;
                    // // return round($nilaiUtility2, 3);

                    // $cDummy3    =   RewardInovation::
                    //                 select('score_valuation_3')
                    //                 ->where([
                    //                     ['created_at', '>=', $dateOpenTime],
                    //                     ['created_at', '<=', $dateExpiredTime],
                    //                     ['updated_at', '>=', $dateOpenTime],
                    //                     ['updated_at', '<=', $dateExpiredTime],
                    //                     ['status_process', '=', 4],
                    //                 ])
                    //                 ->first();

                    // $atas   =   $row->score_valuation_3 - $min3;
                    // $bawah  =   $max3 - $min3;
                    // $nilaiUtility3 = $bawah == 0 ? 0 : $atas / $bawah;
                    // // return round($nilaiUtility3, 3);

                    // $cDummy4    =   RewardInovation::
                    //                 select('score_valuation_4')
                    //                 ->where([
                    //                     ['created_at', '>=', $dateOpenTime],
                    //                     ['created_at', '<=', $dateExpiredTime],
                    //                     ['updated_at', '>=', $dateOpenTime],
                    //                     ['updated_at', '<=', $dateExpiredTime],
                    //                     ['status_process', '=', 4],
                    //                 ])
                    //                 ->first();

                    // $atas   =   $row->score_valuation_4 - $min4;
                    // $bawah  =   $max4 - $min4;
                    // $nilaiUtility4 = $bawah == 0 ? 0 : $atas / $bawah;
                    // // return round($nilaiUtility4, 3);

                    // $cDummy5    =   RewardInovation::
                    //                 select('score_valuation_5')
                    //                 ->where([
                    //                     ['created_at', '>=', $dateOpenTime],
                    //                     ['created_at', '<=', $dateExpiredTime],
                    //                     ['updated_at', '>=', $dateOpenTime],
                    //                     ['updated_at', '<=', $dateExpiredTime],
                    //                     ['status_process', '=', 4],
                    //                 ])
                    //                 ->first();

                    // $atas   =   $row->score_valuation_5 - $min5;
                    // $bawah  =   $max5 - $min5;
                    // $nilaiUtility5 = $bawah == 0 ? 0 : $atas / $bawah;
                    // // return round($nilaiUtility5, 3);

                    // $cDummy6    =   RewardInovation::
                    //                 select('score_valuation_6')
                    //                 ->where([
                    //                     ['created_at', '>=', $dateOpenTime],
                    //                     ['created_at', '<=', $dateExpiredTime],
                    //                     ['updated_at', '>=', $dateOpenTime],
                    //                     ['updated_at', '<=', $dateExpiredTime],
                    //                     ['status_process', '=', 4],
                    //                 ])
                    //                 ->first();

                    // $atas   =   $row->score_valuation_6 - $min6;
                    // $bawah  =   $max6 - $min6;
                    // $nilaiUtility6 = $bawah == 0 ? 0 : $atas / $bawah;
                    // // return round($nilaiUtility6, 3);

                    // $nilaiAkhir     =   ($nilaiUtility1 * $resultNormalization1) +
                    //                     ($nilaiUtility2 * $resultNormalization2) +
                    //                     ($nilaiUtility3 * $resultNormalization3) +
                    //                     ($nilaiUtility4 * $resultNormalization4) +
                    //                     ($nilaiUtility5 * $resultNormalization5) +
                    //                     ($nilaiUtility6 * $resultNormalization6);
                    // return $nilaiAkhir;
                    // return $row->$nilaiAkhir;
                })
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
                                <i class="fa-solid fa-pencil mx-auto me-1"></i> Hasil Penilaian
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
}
