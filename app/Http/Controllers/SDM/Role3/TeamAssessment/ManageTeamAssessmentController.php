<?php

namespace App\Http\Controllers\SDM\Role3\TeamAssessment;

use App\Http\Controllers\Controller;
use App\Models\TeamAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ManageTeamAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeamAssessment()
    {
        try {
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.teamAssessment.TA_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeamAssessmentList()
    {
        try {
            $data = TeamAssessment::latest()
                ->where([
                    'status_id'     =>  1,
                ])
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '';
                    if (Cache::has('admin-is-online-' . $row->id)) {
                        $actionBtn = '<span class="text-success">Online</span>';
                    } else {
                        $actionBtn =
                            '
                        <a href="' . route('sdm.getManageTeamAssessmentId.View.SDM', $row->id) . '" class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-eye mx-auto me-1"></i> View
                        </a>
                        <a href="' . route('sdm.getManageTeamAssessmentId.Update.SDM', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                        <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteTAsId" data-id="' . $row->id . '" data-username="' . $row->username . '">
                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                        </a>
                        ';
                    }
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    $status = '';
                    if (Cache::has('admin-is-online-' . $row->id)) {
                        $status = '<span class="text-success">Online</span>';
                    } else {
                        $status = '<span class="text-secondary">Offline</span>';
                    }
                    return $status;
                })
                ->addColumn('last_seen', function ($row) {
                    $last_seen = '';
                    if (Cache::has('TA-is-online-' . $row->id)) {
                        $last_seen = '<span class="text-success">Online</span>';
                    } else {
                        $last_seen = '<span class="text-secondary">' . \Carbon\Carbon::parse($row->last_seen)->diffForHumans() . '</span>';
                    }
                    return $last_seen;
                })
                ->addColumn('status_active', function ($row) {
                    $status_active = '';
                    if (Cache::has('TA-is-online-' . $row->id)) {
                        $status_active = '<span class="text-success">Online</span>';
                    } else {
                        if ($row->status_active == 1) {
                            $status_active =
                                '<a href="#" class="edit btn btn-success mx-1 mx-1 mx-1" style="color: black" id="statusActiveIdAdmin" data-id="' . $row->id . '" data-username="' . $row->username . '">
                                    <i class="fa-solid fa-user-large"></i> Active
                                </a> ';
                        } else {
                            $status_active =
                                '<a href="#" class="edit btn btn-danger mx-1 mx-1 mx-1" style="color: black" id="statusNonActiveIdAdmin" data-id="' . $row->id . '" data-username="' . $row->username . '">
                                    <i class="fa-solid fa-user-large-slash"></i> Non Active
                                </a> ';
                        }
                    }
                    return $status_active;
                })
                ->rawColumns(['action', 'status', 'last_seen', 'status_active'])
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
    public function getTeamAssessmentCreate()
    {
        try {
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.teamAssessment.TA_create');
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
    public function postTeamAssessmentCreate(Request $request)
    {
        try {
            // Validasi
            $validate = Validator::make(
                $request->all(),
                [
                    'full_name'                         =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                    'username'                          =>      'required|string|min:3|max:255|unique:team_assessments,username|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                    'email'                             =>      'required|string|email|unique:team_assessments,email',
                    'password'                          =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed',
                    'password_confirmation'             =>      'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
                ],
                [
                    'full_name.required'                =>      'Nama Lengkap Wajib Diisi!',
                    'username.required'                 =>      'Username Wajib Diisi!',
                    'email.required'                    =>      'Email Wajib Diisi!',
                    'password.required'                 =>      'Password Wajib Diisi!',
                    'password_confirmation.required'    =>      'Konfirmasi Password Wajib Diisi!',
                    //
                    'full_name.min'                     =>      'Nama Lengkap Minimal 3 Karakter!',
                    'username.min'                      =>      'Username Minimal 3 Karakter!',
                    'password.min'                      =>      'Password Minimal 6 Karakter!',
                    'password_confirmation.min'         =>      'Konfirmasi Password Minimal 6 Karakter!',
                    //
                    'full_name.max'                     =>      'Nama Lengkap Maksimal 255 Karakter!',
                    'username.max'                      =>      'Username Maksimal 255 Karakter!',
                    'password.max'                      =>      'Password Maksimal 100 Karakter!',
                    'password_confirmation.max'         =>      'Konfirmasi Password Maksimal 100 Karakter!',
                    //
                    'email.email'                       =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/ dll)',
                    //
                    'username.unique'                   =>      'Username Sudah Ada',
                    'email.unique'                      =>      'Alamat Email Sudah Ada',
                    //
                    'password.confirmed'                =>      'Password Tidak Sama Dengan Konfirmasi Password!',
                    //
                    'password_confirmation.same'        =>      'Konfirmasi Password Harus Sama Dengan Password!',
                    //
                    'full_name.regex'                   =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                    'username.regex'                    =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                    'password.regex'                    =>      'Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                    'password_confirmation.regex'       =>      'Konfirmasi Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Tambah Data Tim Penilai Baru!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Tim Penilai Baru!, Validasi Gagal')->withErrors($validate)->withInput($request->all());
            }

            // Create Team Assessment
            $ta = TeamAssessment::create([
                'id'            =>      Str::uuid(),
                'full_name'     =>      $request['full_name'],
                'username'      =>      $request['username'],
                'email'         =>      $request['email'],
                'password'      =>      Hash::make($request['password'])
            ]);

            if ($ta) {
                alert()->success('Berhasil Tambah Data Tim Penilai Baru!')->autoclose(25000);
                return redirect()->back()->with('message-create-success', 'Berhasil Tambah Data Tim Penilai Baru!');
            } else {
                alert()->error('Gagal Tambah Data Tim Penilai Baru!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Tim Penilai Baru!')->withErrors($validate)->withInput($request->all());
            }

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
    public function getTeamAssessmentIdView($id)
    {
        try {
            $ta = TeamAssessment::where('id', '=', $id)->first();
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.teamAssessment.TA_view', compact('ta'));
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
    public function getTeamAssessmentIdUpdate($id)
    {
        try {
            $ta = TeamAssessment::where('id', '=', $id)->first();
            return view('layouts.sdm.content.kepalaSubbagianPenghargaanDisiplinPensiun.teamAssessment.TA_edit', compact('ta'));
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
    public function update(Request $request, $id)
    {
        try {

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

