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
            // Get Timer Countdown
            $timer                      =   CountdownTimerFormInovation::first();

            if ($timer != null) {
                $timer                  =   CountdownTimerFormInovation::first();
                return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_index', compact('timer'));
            } else {
                $timer                  =   CountdownTimerFormInovation::first();
                // $reward     =   RewardInovation::latest()->get();
                return view('layouts.teamAssessment.content.penilaianInovasi.penilaianInovasi_index', compact('timer'));
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
            // ddd($timer->date_time_open_form_inovation);

            $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);
            // ddd($dateTimeOpen);
            $dateOpen               =   $dateTimeOpen->toDateString();
            $dateOpenTime           =   $dateTimeOpen->toDateTimeString();
            // ddd($dateOpenTime >= Carbon::now()->toDateTimeString());

            $dateTimeExpired        =   new Carbon($timer->date_time_expired_form_inovation);
            // ddd($dateTimeExpired);
            $dateExpired            =   $dateTimeExpired->toDateString();
            $dateExpiredTime        =   $dateTimeExpired->toDateTimeString();

            $data = RewardInovation::
                // DB::table('reward_inovation')
                where([
                    ['created_at', '>=', $dateOpenTime],
                    ['created_at', '<=', $dateExpiredTime],
                    ['updated_at', '>=', $dateOpenTime],
                    ['updated_at', '<=', $dateExpiredTime],
                    ['status_process', '==', 3]
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
                    alert()->error('Gagal Penilaian Data Form Inovasi!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-error', 'Gagal Penilaian Data Form Inovasi!')->withErrors($validate)->withInput($request->all());
                }

                //
                $timer                  =   CountdownTimerFormInovation::first();

                $dateTimeOpen           =   new Carbon($timer->date_time_open_form_inovation);
                $dateOpen               =   $dateTimeOpen->toDateString();

                $dateTimeExpired        =   new Carbon($timer->date_time_expired_countdown_inovation_form);
                $dateExpired            =   $dateTimeExpired->toDateString();
                // ddd($reward_id);

                if ($dateOpen >= Carbon::now() && Carbon::now() <= $dateExpired) {

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
