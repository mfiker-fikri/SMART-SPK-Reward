<?php

namespace App\Http\Controllers\SDM\Role3\Parameter;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Criteria;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ParameterController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getParameters()
    {
        try {
            // dd('Sukses');
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.parameter.parameter_index');
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getParametersList(Request $request)
    {
        try {
            $data   =   Parameter::with('criterias')->orderBy('criteria_id', 'asc')->get();
            // join('criterias', 'parameters.criteria_id', '=', 'criterias.id')
            // ->join('categories', 'criterias.categorie_id', '=', 'categories.id')
            // ->select(['parameters.id', 'parameters.parameter', 'categories.category', '.criterias.criteria'])
            // ->orderBy('id', 'asc')
            // ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function (Parameter $parameter) {
                    $categories_id  =   $parameter->criterias->categories->category;
                    return $categories_id;
                })
                ->addColumn('criteria_name', function (Parameter $parameter) {
                    $criterias_id  =   $parameter->criterias->criteria;
                    return $criterias_id;
                })
                ->addColumn('normalization', function ($row, Criteria $criteria) {
                    $normalization      =   '';
                    if ($row->criterias->categorie_id == 1) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 1)->sum('value_quality');
                        $normalization      =   $row->criterias->value_quality / $sumValueQuality;
                    }
                    if ($row->criterias->categorie_id == 2) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 2)->sum('value_quality');
                        $normalization      =   $row->criterias->value_quality / $sumValueQuality;
                    }
                    if ($row->criterias->categorie_id == 3) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 3)->sum('value_quality');
                        $normalization      =   $row->criterias->value_quality / $sumValueQuality;
                    }
                    if ($row->criterias->categorie_id == 4) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 4)->sum('value_quality');
                        $normalization      =   $row->criterias->value_quality / $sumValueQuality;
                    }
                    if ($row->criterias->categorie_id == 5) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 5)->sum('value_quality');
                        $normalization      =   $row->criterias->value_quality / $sumValueQuality;
                    }
                    if ($row->criterias->categorie_id == 6) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 6)->sum('value_quality');
                        $normalization      =   $row->criterias->value_quality / $sumValueQuality;
                    }
                    return round($normalization, 3);
                })
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '
                        <a href="' . route('hrd.getManageParametersId.View.HRD', $row->id) . '" class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-eye mx-auto me-1"></i> View
                        </a>
                        <a href="' . route('hrd.getManageParametersId.Update.HRD', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                        <a href"' . route('hrd.getManageCriteriasId.Update.HRD', $row->id) . '" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black;" id="deleteCriteriasId" >
                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                        </a>
                    ';

                    return $actionBtn;
                })

                // ->addColumn('parameters', function ($row) {
                //     $parameter =    $row->parameter;
                //     // '<span>"' . $row->parameter . '"</span>';
                //     return $parameter;
                // })
                ->toJson();
            // ->rawColumns(['normalization', 'action'])
            // ->make(true);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getParametersCreate()
    {
        try {
            $category        =     Category::get();
            $categories      =     Category::all('category');
            $criteria        =     Criteria::get();
            return view('layouts.hrd.content.parameter.parameter_create', compact('category', 'categories', 'criteria'));
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postParametersCreate(Request $request)
    {
        try {
            // Validasi Create
            $validate = Validator::make(
                $request->all(),
                [
                    'categories'                             =>      'required',
                    'criterias'                              =>      'required',
                    'value_quality'                          =>      'required',
                    'parameters'                             =>      'required',
                    'grades'                                 =>      'required|numeric|digits_between:1,4',

                ],
                [
                    'categories.required'                    =>      'Kategori Harus Dipilih!',
                    'criterias.required'                     =>      'Kriteria Harus Diisi!',
                    'value_quality.required'                 =>      'Bobot Nilai Harus Diisi!',
                    'parameters.required'                    =>      'Parameter Harus Diisi!',
                    'grades.required'                        =>      'Nilai Parameter Harus Diisi!',

                    // 'parameters.regex'                       =>      'Parameter Tidak Boleh Diisi Dengan Angka dan Simbol!',

                    'grades.numeric'                         =>      'Bobot Harus Diisi Dengan Angka',

                    'grades.digits_between'                  =>      'Nilai Parameter Diisi Antara Angka 1 - 4',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Tambah Data Parameter!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Parameter!')->withErrors($validate)->withInput($request->all());
            }

            $parameter      =   Parameter::create([
                'criteria_id'       =>   $request['criterias'],
                'parameter'         =>   $request['parameters'],
                'grade'             =>   $request['grades'],
            ]);

            if ($parameter) {
                alert()->success('Berhasil Tambah Data Parameter!')->autoclose(25000);
                return redirect()->back()->with('message-create-success', 'Berhasil Tambah Data Parameter!');
            } else {
                alert()->error('Gagal Tambah Data Parameter!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Parameter!')->withErrors($validate)->withInput($request->all());
            }
            //
        } catch (\Exception $exception) {
            return $exception;
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
