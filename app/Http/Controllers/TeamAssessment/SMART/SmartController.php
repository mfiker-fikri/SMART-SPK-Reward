<?php

namespace App\Http\Controllers\TeamAssessment\SMART;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Criteria;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SmartController extends Controller
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
    public function categoriesList()
    {
        try {
            return view('layouts.teamAssessment.content.smart.kategori_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesListData()
    {
        try {
            $data = Category::orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
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
    public function criteriasList()
    {
        try {
            return view('layouts.teamAssessment.content.smart.kriteria_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criteriasListDataInovasi()
    {
        try {
            $data = Criteria::with('categories')->where([
                ['categorie_id', '=', 1],
            ])->orderBy('id', 'asc')->get();

            return Datatables::of($data)
                ->addIndexColumn()
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
                    return round($normalization, 3);
                })
                ->rawColumns(['category_name', 'normalization'])
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
    public function criteriasListDataTeladan()
    {
        try {
            $data = Criteria::with('categories')->where([
                ['categorie_id', '=', 2],
            ])->orderBy('id', 'asc')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function (Criteria $criteria) {
                    $categories_id  =   '<span>' . $criteria->categories->category . '</span>';
                    return $categories_id;
                })
                ->addColumn('normalization', function ($row, Criteria $criteria) {
                    $normalization      =   '';
                    if ($row->categorie_id == 2) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 2)->sum('value_quality');
                        $normalization      =   $row->value_quality / $sumValueQuality;
                    }
                    return round($normalization, 3);
                })
                ->rawColumns(['category_name', 'normalization'])
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
    public function parametersList()
    {
        try {
            return view('layouts.teamAssessment.content.smart.parameter_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function parametersListDataInovasi()
    {
        try {
            $data   =   Parameter::with('criterias')
                ->where('criteria_id', '=', 1)
                ->orWhere('criteria_id', '=', 2)
                ->orWhere('criteria_id', '=', 3)
                ->orWhere('criteria_id', '=', 4)
                ->orWhere('criteria_id', '=', 5)
                ->orWhere('criteria_id', '=', 6)
                ->orderBy('id', 'asc')->get();

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

                    return round($normalization, 3);
                })
                ->rawColumns(['category_name', 'criteria_name', 'normalization'])
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
    public function parametersListDataTeladan()
    {
        try {
            $data   =   Parameter::with('criterias')
                ->where('criteria_id', '=', 7)
                ->orWhere('criteria_id', '=', 8)
                ->orWhere('criteria_id', '=', 9)
                ->orWhere('criteria_id', '=', 10)
                ->orWhere('criteria_id', '=', 11)
                ->orWhere('criteria_id', '=', 12)
                ->orderBy('id', 'asc')->get();

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
                    if ($row->criterias->categorie_id == 2) {
                        $sumValueQuality    =   Criteria::where('categorie_id', '=', 2)->sum('value_quality');
                        $normalization      =   $row->criterias->value_quality / $sumValueQuality;
                    }

                    return round($normalization, 3);
                })
                ->rawColumns(['category_name', 'criteria_name', 'normalization'])
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
