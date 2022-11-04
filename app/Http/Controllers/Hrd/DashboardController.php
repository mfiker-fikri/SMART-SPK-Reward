<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Criteria;
use App\Models\Parameter;

class DashboardController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        //
        try {
            $sumCategory    =   Category::count();
            $sumCriteria    =   Criteria::count();
            // $sumCriteria    =   Criteria::join('categories', 'criterias.categorie_id', '=', 'categories.id')->get();
            $sumParameter   =   Parameter::count();
            // $sumCriteria    =   $sumCriteria / Criteria::where('id')
            // ddd($sumParameter);

            return view('layouts.hrd.content.dashboard.dashboard', compact('sumCategory', 'sumCriteria', 'sumParameter'));
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
