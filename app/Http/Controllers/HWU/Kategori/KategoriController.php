<?php

namespace App\Http\Controllers\Hrd\Kategori;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

use App\Models\Category;
use App\Models\Criteria;
use App\Models\Parameter;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        try {
            return view('layouts.hrd.content.kategori.kategori_index');
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategoriesList()
    {
        try {
            $data = Category::orderBy('id', 'asc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '
                    <a href="' . route('hrd.getManageCategoriesId.View.HRD', $row->id) . '" class="view btn btn-lg btn-info mx-1 mx-1 mx-1" style="color: black"> 
                        <i class="fa-solid fa-eye mx-auto me-1"></i> View 
                    </a> 
                    <a href="' . route('hrd.getManageCategoriesId.Update.HRD', $row->id) . '" class="edit btn btn-lg btn-warning mx-1 mx-1 mx-1" style="color: black">
                        <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                    </a>
                    <a href"' . route('hrd.getManageCategoriesId.Update.HRD', $row->id) . '" class="delete btn btn-lg btn-danger mx-1 mx-1 mx-1" style="color: black;" id="deleteAdminsId" >
                        <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete 
                    </a>
                    ';

                    return $actionBtn;
                })
                ->make(true);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategoriesCreate()
    {
        try {
            return view('layouts.hrd.content.kategori.kategori_create');
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
    public function postCategoriesCreate(Request $request)
    {
        try {
            // Validasi Create
            $validate = Validator::make(
                $request->all(),
                [
                    'categories'                             =>      'required|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                ],
                [
                    'categories.required'                    =>      'Kategori Harus Diisi!',
                    'categories.regex'                       =>      'Kategori Tidak Boleh Diisi Dengan Angka dan Simbol!',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Tambah Data Kategori!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Kategori!')->withErrors($validate)->withInput($request->all());
            }

            // Create Categories New
            $categories     =   Category::create([
                'category'    =>  $request['categories']
            ]);

            if ($categories) {
                alert()->success('Berhasil Tambah Data Kategori!', $request['categories'])->autoclose(25000);
                return redirect()->back()->with('message-create-success', 'Berhasil Tambah Data Kategori!');
            } else {
                alert()->error('Gagal Tambah Data Kategori!', 'Validasi Gagal', $categories)->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Kategori')->withErrors($validate)->withInput($request->all());
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
    public function getCategoriesIdView($id)
    {
        try {
            $category   =   Category::where('id', '=', $id)->first();
            return view('layouts.hrd.content.kategori.kategori_view', compact('category'));
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
    public function getCategoriesIdUpdate($id)
    {
        try {
            $category   =   Category::where('id', '=', $id)->first();
            return view('layouts.hrd.content.kategori.kategori_edit', compact('category'));
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
    public function postCategoriesIdUpdate(Request $request, $id)
    {
        try {
            // Find Id Category
            $category = Category::find($id);

            if ($category) {
                // Validasi Update
                $validate = Validator::make(
                    $request->all(),
                    [
                        'categories'                             =>      'required|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                    ],
                    [
                        'categories.required'                    =>      'Kategori Harus Diisi!',
                        'categories.regex'                       =>      'Kategori Tidak Boleh Diisi Dengan Angka!',
                    ]
                );

                if ($validate->fails()) {
                    alert()->error('Gagal Update Data Kategori!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-error', 'Gagal Update Data Pegawai!')->withErrors($validate)->withInput($request->all());
                }

                $category->category     =   $request['categories'];
                $category->save();

                alert()->success('Berhasil Update Data Kategori!', $request['categories'])->autoclose(25000);
                return redirect()->back()->with('message-update-success', 'Berhasil Update Data Kategori!');
            }
        } catch (\Exception $exception) {
            return $exception;
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
