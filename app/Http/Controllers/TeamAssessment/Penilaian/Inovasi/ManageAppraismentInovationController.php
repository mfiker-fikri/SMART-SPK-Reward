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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
            // Normalisasi
            // Jumlahkan Semua Kolom 'Value Quality'
            $criteriaNormalisasi    =   Criteria::with('categories')->where([
                                            ['categorie_id', '=', 1],
                                        ])->orderBy('id', 'asc')->first();

            $normalisasi            =   Criteria::where('categorie_id', '=', 1)->sum('value_quality');

            // Pembagian Normalisasi
            $normalization          =   $criteriaNormalisasi->value_quality / $normalisasi;

            $resultNormalization    =   round($normalization, 3);
            // ddd($resultNormalization);

            //
            $timer                  =   CountdownTimerFormInovation::first();

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            // Mencari Nilai Min
            $min    =   RewardInovation::
                    where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['status_process', '=', 4],
                    ])
                    ->min('score_valuation_1');
                    // ->latest()
                    // ->get();
            // ddd($min);
            // Mencari Nilai Max
            $max    =   RewardInovation::
                    where([
                        ['created_at', '>=', $dateOpenTime],
                        ['created_at', '<=', $dateExpiredTime],
                        ['updated_at', '>=', $dateOpenTime],
                        ['updated_at', '<=', $dateExpiredTime],
                        ['status_process', '=', 4],
                    ])
                    ->min('score_valuation_1');
            // ddd($min, $max);

            // Nilai Utility
            // $cDummy         =   RewardInovation::
            //                     where([
            //                         ['created_at', '>=', $dateOpenTime],
            //                         ['created_at', '<=', $dateExpiredTime],
            //                         ['updated_at', '>=', $dateOpenTime],
            //                         ['updated_at', '<=', $dateExpiredTime],
            //                         ['status_process', '=', 4],
            //                     ])
            //                     ->first()->get();
            //                     // ddd($cDummy);
            // $nilaiUtility   =   ($cDummy->score_valuation_1 - $min) / ($max - $min);
            //                     ddd($nilaiUtility);



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
                ])
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
                ->latest()
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('result', function ($row, Criteria $criteria) {
                    // Normalisasi
                    // Jumlahkan Semua Kolom 'Value Quality'
                    $criteria               =   Criteria::with('categories')->where([
                                                    ['categorie_id', '=', 1],
                                                ])->orderBy('id', 'asc')->first();
                                                // ->latest()
                                                // ->get();
                    // return $criteria;
                    $normalisasi            =   Criteria::where('categorie_id', '=', 1)->sum('value_quality');

                    // Pembagian Normalisasi
                    $normalization1          =   $criteria->value_quality[0] / $normalisasi;

                    $resultNormalization1    =   round($normalization1, 3);
                    return $resultNormalization1;

                    //
                    $timer                  =   CountdownTimerFormInovation::first();

                    $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);

                    $dateOpen               =   $dateTimeOpen->toDateString();
                    $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

                    $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);

                    $dateExpired            =   $dateTimeExpired->toDateString();
                    $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

                    // Mencari Nilai Min
                    $min    =   RewardInovation::
                            where([
                                ['created_at', '>=', $dateOpenTime],
                                ['created_at', '<=', $dateExpiredTime],
                                ['updated_at', '>=', $dateOpenTime],
                                ['updated_at', '<=', $dateExpiredTime],
                                ['status_process', '=', 4],
                            ])
                            ->min('score_valuation_1');
                    // ddd($min);
                    // return $min;
                    // Mencari Nilai Max
                    $max    =   RewardInovation::
                            where([
                                ['created_at', '>=', $dateOpenTime],
                                ['created_at', '<=', $dateExpiredTime],
                                ['updated_at', '>=', $dateOpenTime],
                                ['updated_at', '<=', $dateExpiredTime],
                                ['status_process', '=', 4],
                            ])
                            ->min('score_valuation_1');
                    // ddd($min, $max);

                    // Nilai Utility
                    $cDummy1    =   RewardInovation::
                                    select('score_valuation_1')
                                    ->where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 4],
                                    ])
                                    ->first();

                    $atas   =   $cDummy1->score_valuation_1 - $min;
                    $bawah  =   $max - $min;
                    $nilaiUtility1 = $bawah == 0 ? 0 : $atas / $bawah;
                    // return round($nilaiUtility1, 3);

                    $cDummy2    =   RewardInovation::
                                    select('score_valuation_2')
                                    ->where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 4],
                                    ])
                                    ->first();

                    $atas   =   $cDummy2->score_valuation_2 - $min;
                    $bawah  =   $max - $min;
                    $nilaiUtility2 = $bawah == 0 ? 0 : $atas / $bawah;
                    // return round($nilaiUtility2, 3);

                    $cDummy3    =   RewardInovation::
                                    select('score_valuation_3')
                                    ->where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 4],
                                    ])
                                    ->first();

                    $atas   =   $cDummy3->score_valuation_3 - $min;
                    $bawah  =   $max - $min;
                    $nilaiUtility3 = $bawah == 0 ? 0 : $atas / $bawah;
                    // return round($nilaiUtility3, 3);

                    $cDummy4    =   RewardInovation::
                                    select('score_valuation_4')
                                    ->where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 4],
                                    ])
                                    ->first();

                    $atas   =   $cDummy4->score_valuation_4 - $min;
                    $bawah  =   $max - $min;
                    $nilaiUtility4 = $bawah == 0 ? 0 : $atas / $bawah;
                    // return round($nilaiUtility4, 3);

                    $cDummy5    =   RewardInovation::
                                    select('score_valuation_5')
                                    ->where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 4],
                                    ])
                                    ->first();

                    $atas   =   $cDummy5->score_valuation_5 - $min;
                    $bawah  =   $max - $min;
                    $nilaiUtility5 = $bawah == 0 ? 0 : $atas / $bawah;
                    // return round($nilaiUtility5, 3);

                    $cDummy6    =   RewardInovation::
                                    select('score_valuation_6')
                                    ->where([
                                        ['created_at', '>=', $dateOpenTime],
                                        ['created_at', '<=', $dateExpiredTime],
                                        ['updated_at', '>=', $dateOpenTime],
                                        ['updated_at', '<=', $dateExpiredTime],
                                        ['status_process', '=', 4],
                                    ])
                                    ->first();

                    $atas   =   $cDummy6->score_valuation_6 - $min;
                    $bawah  =   $max - $min;
                    $nilaiUtility6 = $bawah == 0 ? 0 : $atas / $bawah;
                    // return round($nilaiUtility6, 3);
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
                ->rawColumns(['fullName', 'action', 'result'])
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

                // Update DB
                $reward->status_process     =   4;
                $reward->score_valuation_1  =   $request['kebaruan'];
                $reward->score_valuation_2  =   $request['kemanfaatan'];
                $reward->score_valuation_3  =   $request['peranSerta'];
                $reward->score_valuation_4  =   $request['transferReplikasi'];
                $reward->score_valuation_5  =   $request['nyataNilaiTambah'];
                $reward->score_valuation_6  =   $request['kesinambunganKonsistensiKerja'];
                $reward->timestamps = false;
                $reward->save();

                alert()->success('Berhasil Menilai Data Form Inovasi')->autoclose(25000);
                return redirect()->back()->with('message-update-success', 'Berhasil Menilai Data Form Inovasi');


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
