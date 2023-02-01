<?php

namespace App\Http\Controllers\SDM\Role2\Signature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignatureInovationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignatureInovationKepalaBagianPenghargaanDisiplindanTataUsaha()
    {
        try {
            return view('layouts.sdm.content.kepalaBagianPenghargaanDisiplinTU.signature.signature_index');
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
    public function getSignatureInovationIdKepalaBagianPenghargaanDisiplindanTataUsaha($id)
    {
        try {
            return view('layouts.sdm.content.kepalaBagianPenghargaanDisiplinTU.signature.signature_edit');
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
    public function postSignatureInovationIdKepalaBagianPenghargaanDisiplindanTataUsaha(Request $request)
    {
        try {

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
