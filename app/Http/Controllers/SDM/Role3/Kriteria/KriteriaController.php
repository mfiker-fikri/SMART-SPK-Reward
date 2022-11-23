<?php

namespace App\Http\Controllers\SDM\Role3\Kriteria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

use App\Models\Category;
use App\Models\Criteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCriterias()
    {
        try {
            // $data = Criteria::join('categories', 'criterias.categorie_id', '=', 'categories.id')->get();
            // with('categories')->except('categories.id')->latest()->get();
            // ddd($data);
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.kriteria.kriteria_index');
            // return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.kriteria.kriteria_index');
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
    public function getCriteriasList(Request $request)
    {
        try {
            $data = Criteria::
                // get();
                // join('categories', 'criterias.categorie_id', '=', 'categories.id')->get();
                with('categories')->orderBy('id', 'asc')->get();
            // dd($data);
            // return $this->dataTable
            //     ->eloquent($data)
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '
                        <a href="' . route('sdm.getManageCriteriasId.KepalaSubbagianPenghargaanDisiplindanPensiun.View.SDM', $row->id) . '" class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-eye mx-auto me-1"></i> View
                        </a>
                        <a href="' . route('sdm.getManageCriteriasId.KepalaSubbagianPenghargaanDisiplindanPensiun.Update.SDM', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                        <a href"' . route('sdm.getManageCriteriasId.KepalaSubbagianPenghargaanDisiplindanPensiun.Update.SDM', $row->id) . '" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black;" id="deleteCriteriasId" >
                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                        </a>
                    ';

                    return $actionBtn;
                })
                ->addColumn('category_name', function (Criteria $criteria) {
                    $categories_id  =   '<span>' . $criteria->categories->category . '</span>';
                    return $categories_id;
                })
                ->addColumn('normalization', function ($row, Criteria $criteria) {
                    $normalization      =   '';
                    if ($row->categorie_id == 1) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 1)->sum('value_quality');
                        $normalization      =   $row->value_quality / $sumValueQuality;
                    }
                    if ($row->categorie_id == 2) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 2)->sum('value_quality');
                        $normalization      =   $row->value_quality / $sumValueQuality;
                    }
                    if ($row->categorie_id == 3) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 3)->sum('value_quality');
                        $normalization      =   $row->value_quality / $sumValueQuality;
                    }
                    if ($row->categorie_id == 4) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 4)->sum('value_quality');
                        $normalization      =   $row->value_quality / $sumValueQuality;
                    }
                    if ($row->categorie_id == 5) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 5)->sum('value_quality');
                        $normalization      =   $row->value_quality / $sumValueQuality;
                    }
                    if ($row->categorie_id == 6) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 6)->sum('value_quality');
                        $normalization      =   $row->value_quality / $sumValueQuality;
                    }
                    return round($normalization, 3);
                })
                ->toJson();
            // ->rawColumns(['category_name'])
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
    public function getCriteriasCreate()
    {
        try {
            $category        =     Category::get();
            $categories      =     Category::all('category');
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.kriteria.kriteria_create', compact('category', 'categories'));
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
    public function postCriteriasCreate(Request $request)
    {
        try {
            // Validasi Create
            // ddd($request);
            $validate = Validator::make(
                $request->all(),
                [
                    'categories'                             =>      'required',
                    'criterias'                              =>      'required|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                    'value_quality'                          =>      'required|numeric|digits_between:0,100',
                ],
                [
                    'categories.required'                    =>      'Kategori Harus Dipilih!',
                    'criterias.required'                     =>      'Kriteria Harus Diisi!',
                    'value_quality.required'                 =>      'Bobot Nilai Harus Diisi!',

                    'criterias.regex'                        =>      'Kriteria Tidak Boleh Diisi Dengan Angka dan Simbol!',

                    'value_quality.numeric'                  =>      'Bobot Harus Diisi Dengan Angka',

                    'value_quality.digits_between'           =>      'Bobot Nilai Diisi Antara Angka 0 - 100',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Tambah Data Kriteria!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Kriteria!')->withErrors($validate)->withInput($request->all());
            }

            // dd($request);

            // Crate Criteria New
            $criteria       = Criteria::create([
                'criteria'          =>      $request['criterias'],
                'value_quality'     =>      $request['value_quality'],
                'categorie_id'      =>      $request['categories'],
            ]);

            if ($criteria) {
                alert()->success('Berhasil Tambah Data Kriteria!')->autoclose(25000);
                return redirect()->back()->with('message-create-success', 'Berhasil Tambah Data Kriteria!');
            } else {
                alert()->error('Gagal Tambah Data Kriteria!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Kriteria!')->withErrors($validate)->withInput($request->all());
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
    public function getCriteriasIdView($id)
    {
        try {
            $criteria        =      Criteria::where('id', '=', $id)->first();
            $category        =      Category::get();
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.kriteria.kriteria_view', compact('criteria', 'category'));
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCriteriasIdUpdate($id)
    {
        try {
            $criteria        =      Criteria::where('id', '=', $id)->first();
            $category        =      Category::get();
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.kriteria.kriteria_edit', compact('criteria', 'category'));
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postCriteriasIdUpdate(Request $request, $id)
    {
        try {
            $criteria   =   Criteria::find($id);

            if ($criteria) {
                // Validasi Update
                $validate = Validator::make(
                    $request->all(),
                    [
                        'categories'                             =>      'required',
                        'criterias'                              =>      'required|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                        'value_quality'                          =>      'required|numeric|digits_between:1,100',
                    ],
                    [
                        'categories.required'                    =>      'Kategori Harus Dipilih!',
                        'criterias.required'                     =>      'Kriteria Harus Diisi!',
                        'value_quality.required'                 =>      'Bobot Nilai Harus Diisi!',

                        'value_quality.numeric'                  =>      'Bobot Harus Diisi Dengan Angka',

                        'criterias.regex'                        =>      'Kriteria Tidak Boleh Diisi Dengan Angka dan Simbol!',
                    ]
                );

                if ($validate->fails()) {
                    alert()->error('Gagal Update Data Kriteria!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-error', 'Gagal Update Data Kriteria!')->withErrors($validate)->withInput($request->all());
                }

                $criteria->criteria          =      $request['criterias'];
                $criteria->value_quality     =      $request['value_quality'];
                $criteria->categorie_id      =      $request['categories'];

                $criteria->save();
                alert()->success('Berhasil Update Data Kriteria!')->autoclose(25000);
                return redirect()->back()->with('message-update-success', 'Berhasil Update Data Kriteria!');
            }
            // else {
            //     alert()->error('Gagal Update Data Kriteria!', 'Validasi Gagal')->autoclose(25000);
            //     return redirect()->back()->with('message-update-error', 'Gagal Update Data Kriteria!');
            // }
            //
        } catch (\Exception $exception) {
            return $exception;
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
