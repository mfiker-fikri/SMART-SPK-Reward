<?php

namespace App\Http\Controllers\TeamAssessment\Penilaian\Teladan;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CountdownTimerFormTeladan;
use App\Models\Criteria;
use App\Models\Parameter;
use App\Models\Pegawai;
use App\Models\RewardTeladan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

                // $reward     =   RewardInovation::latest()->get();
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

            $dateTimeOpen           =   new Carbon($timer->date_time_open_appraisment);

            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_appraisment);

            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = Pegawai::
                latest()
                ->get();

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
                ->rawColumns(['action'])
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
            return view('layouts.teamAssessment.content.penilaianTeladan.penilaianTeladan_update',
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

            // ddd($reward->id);

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
                        'pengetahuanKerja.required'         =>      'Pengetahuan Kerja Wajib Diisi!',
                        'analisisPemecahanMasalah.required' =>      'Analisis Pemecahan Masalah Wajib Diisi!',
                        'tanggungJawabPekerjaan.required'   =>      'Tanggung Jawab Pekerjaan Wajib Diisi!',
                        'disiplin.required'                 =>      'Disiplin Wajib Diisi!',
                        'komitmen.required'                 =>      'Komitmen Wajib Diisi!',
                        'kerjaSama.required'                =>      'Kerja Sama Wajib Diisi!',
                    ]
                );

                if ($validate->fails()) {
                    alert()->error('Gagal Menilai Data Form Teladan!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-error', 'Gagal Menilai Data Form Teladan!')->withErrors($validate)->withInput($request->all());
                }

                // Update DB
                $teladan                     =   new RewardTeladan;
                $teladan->id                 =   Str::uuid();
                $teladan->score_valuation_1  =   $request['pengetahuanKerja'];
                $teladan->score_valuation_2  =   $request['analisisPemecahanMasalah'];
                $teladan->score_valuation_3  =   $request['tanggungJawabPekerjaan'];
                $teladan->score_valuation_4  =   $request['disiplin'];
                $teladan->score_valuation_5  =   $request['komitmen'];
                $teladan->score_valuation_6  =   $request['kerjaSama'];
                $teladan->employee_id        =   $reward->id;
                $teladan->status_process     =   '4';
                $teladan->timestamps         =   false;
                $teladan->save();

                alert()->success('Berhasil Menilai Data Form Teladan')->autoclose(25000);
                return redirect('penilai/appraisment/inovation')->with('message-update-success', 'Berhasil Menilai Data Form Teladan');


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
