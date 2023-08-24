<?php

namespace App\Http\Controllers\Admin\SDM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Cache;

use App\Models\HumanResource;
use Illuminate\Support\Facades\DB;

class ManageSDMController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admins');
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHumanResources()
    {
        try {
            return view('layouts.admin.content.sdm.sdm_index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHumanResourcesList()
    {
        try {
            $data   =   HumanResource::latest()
                ->where([
                    'status_id'     =>  1,
                ])
                ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '';
                        if (Cache::has('humanResource-is-online-' . $row->id)) {
                            $actionBtn = '<span class="text-success">Online</span>';
                        } else {
                            $actionBtn =
                                '
                                <a href="' . route('admin.getManageHumanResourcesId.View.Admin', $row->id) . '" class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                                    <i class="fa-solid fa-eye mx-auto me-1"></i> View
                                </a>
                                <a href="' . route('admin.getManageHumanResourcesId.Update.Admin', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                                    <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                                </a>
                                <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteHumanResourceId" data-id="' . $row->id . '" data-username="' . $row->username . '">
                                    <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                                </a>
                                ';
                        }
                        return $actionBtn;
                    })
                    ->addColumn('status', function ($row) {
                        $status = '';
                        if (Cache::has('humanResource-is-online-' . $row->id)) {
                            $status = '<span class="text-success">Online</span>';
                        } elseif ($row->status == null) {
                            $status = '<span class="text-secondary">Not Login</span>';
                        } else {
                            $status = '<span class="text-secondary">Offline</span>';
                        }
                        return $status;
                    })
                    ->addColumn('last_seen', function ($row) {
                        $last_seen = '';
                        if (Cache::has('humanResource-is-online-' . $row->id)) {
                            $last_seen = '<span class="text-success">Online</span>';
                        } elseif ($row->last_seen == null) {
                            $last_seen = '<span class="text-secondary">Not Login</span>';
                        } else {
                            $last_seen = '<span class="text-secondary">' . \Carbon\Carbon::parse($row->last_seen)->diffForHumans() . '</span>';
                        }
                        return $last_seen;
                    })
                    ->addColumn('role_status', function ($row) {
                        $roleStatus = '';
                        if($row->role == 1) {
                            $roleStatus = '<span class="text-wrap">Kepala Biro Sumber Daya Manusia</span>';
                        } elseif ($row->role == 2) {
                            $roleStatus = '<span class="text-wrap">Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</span>';
                        } else {
                            $roleStatus = '<span class="text-wrap">Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</span>';
                        }
                        return $roleStatus;
                    })
                    ->rawColumns(['action','status', 'last_seen' ,'role_status'])
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHumanResourcesCreate()
    {
        try {
            return view('layouts.admin.content.sdm.sdm_create');
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
    public function postHumanResourcesCreate(Request $request)
    {
        try {
            // Validasi Create
            $validate = Validator::make(
                $request->all(),
                [
                    'full_name'                             => 'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                    'username'                              => 'required|string|min:3|max:255|unique:human_resources,username|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                    'email'                                 => 'required|string|email|unique:human_resources,email',
                    'password'                              => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed',
                    'password_confirmation'                 => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
                    'role'                                  => 'required',
                ],
                [
                    'full_name.required'                =>      'Nama Lengkap Wajib Diisi!',
                    'username.required'                 =>      'Username Wajib Diisi!',
                    'email.required'                    =>      'Email Wajib Diisi!',
                    'password.required'                 =>      'Password Wajib Diisi!',
                    'password_confirmation.required'    =>      'Konfirmasi Password Wajib Diisi!',
                    'role.required'                     =>      'Peran Wajib Dipilih!',
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
                    'email.email'                       =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/dll)',
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

            // If Fail Rules
            if ($validate->fails()) {
                alert()->error('Gagal Tambah Data Akun Divisi Sumber Daya Manusia Baru!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Akun Divisi Sumber Daya Manusia Baru!')->withErrors($validate)->withInput($request->all());
            }

            // ddd(Auth::guard('admins')->user()->id);
            // Create Human Resources
            $human_resources    =   HumanResource::create([
                'id'            =>      Str::uuid(),
                'full_name'     =>      $request['full_name'],
                'username'      =>      $request['username'],
                'email'         =>      $request['email'],
                'password'      =>      Hash::make($request['password']),
                'role'          =>      $request['role'],
                'admin_id'      =>      Auth::guard('admins')->user()->id,
            ]);

            if($human_resources) {
                alert()->success('Berhasil Tambah Data Akun Divisi Sumber Daya Manusia Baru!')->autoclose(25000);
                return redirect('admin/manage/sdm')->with('message-create-success', 'Berhasil Tambah Data Akun Divisi Sumber Daya Manusia Baru!');
            } else {
                alert()->error('Gagal Tambah Data Akun Divisi Sumber Daya Manusia Baru!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Akun Divisi Sumber Daya Manusia Baru!')->withErrors($validate)->withInput($request->all());
            }

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getHumanResourcesIdView($id)
    {
        try {
            $humanResource = HumanResource::where('id', '=', $id)->first();
            return view('layouts.admin.content.sdm.sdm_view', compact('humanResource'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getHumanResourcesIdUpdate($id)
    {
        try {
            $humanResource = HumanResource::where('id', '=', $id)->first();
            return view('layouts.admin.content.sdm.sdm_edit', compact('humanResource'));
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
    public function postHumanResourcesIdUpdate(Request $request, $id)
    {
        try {
            // Find Id SDM
            $sdm = HumanResource::find($id);

            if($sdm) {
                $validate = null;
                if ($request['email'] === $sdm->email || $request['username'] === $sdm->username) {
                    // Validasi Update
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                             =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                              =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                            'email'                                 =>      'required|string|email',
                        ],
                        [
                            'full_name.required'                    =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'                     =>      'Username Wajib Diisi!',
                            'email.required'                        =>      'Email Wajib Diisi!',
                            //
                            'full_name.min'                         =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                          =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                         =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                          =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                           =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/ dll)',
                            //
                            'full_name.regex'                       =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                            'username.regex'                        =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                        ]
                    );
                } else {
                    // Validasi Login
                    $validate = Validator::make(
                        $request->all(),
                        [
                            'full_name'                             =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                            'username'                              =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/|unique:admins,username',
                            'email'                                 =>      'required|string|email|unique:admins,email',
                        ],
                        [
                            'full_name.required'                    =>      'Nama Lengkap Wajib Diisi!',
                            'username.required'                     =>      'Username Wajib Diisi!',
                            'email.required'                        =>      'Email Wajib Diisi!',
                            //
                            'full_name.min'                         =>      'Nama Lengkap Minimal 3 Karakter!',
                            'username.min'                          =>      'Username Minimal 3 Karakter!',
                            //
                            'full_name.max'                         =>      'Nama Lengkap Maksimal 255 Karakter!',
                            'username.max'                          =>      'Username Maksimal 255 Karakter!',
                            //
                            'email.email'                           =>      'Email Tidak Valid! (Gunakan @ serta .com/.co.id/ dll)',
                            //
                            'username.unique'                       =>      'Username Sudah Ada',
                            'email.unique'                          =>      'Alamat Email Sudah Ada',
                            //
                            'full_name.regex'                       =>      'Nama Lengkap Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Spasi!',
                            'username.regex'                        =>      'Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah!',
                            //
                        ]
                    );
                }

                if ($validate->fails()) {
                    alert()->error('Gagal Update Data Akun Divisi Sumber Daya Manusia!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-update-error', 'Gagal Update Data Akun Divisi Sumber Daya Manusia!')->withErrors($validate)->withInput($request->all());
                }

                $sdm->full_name   =   $request['full_name'];
                $sdm->username    =   $request['username'];
                $sdm->email       =   $request['email'];
                $sdm->role        =   $request['role'];

                $sdm->save();

                alert()->success('Berhasil Update Data Akun Divisi Sumber Daya Manusia!')->autoclose(25000);
                return redirect()->route('admin.getManageHumanResourcesId.Update.Admin', $id)->with('message-update-success', 'Berhasil Update Data Akun Divisi Sumber Daya Manusia!');

            } else {
                alert()->error('Gagal!')->autoclose(25000);
                return redirect()->back();
            }

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
    public function postHumanResourcesIdUpdateChangePassword(Request $request, $id)
    {
        try {
            // Find id
            $sdm = HumanResource::find($id);

            if($sdm) {
                $validate = Validator::make(
                    $request->all(),
                    [
                        'password'                              => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed',
                        'password_confirmation'                 => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
                    ],
                    [
                        'password.required'                     => 'Password Baru Wajib Diisi!',
                        'password_confirmation.required'        => 'Konfirmasi Password Baru Wajib Diisi!',
                        //
                        'password.min'                          => 'Password Baru Minimal 6 Karakter!',
                        'password_confirmation.min'             => 'Konfirmasi Password Baru Minimal 6 Karakter!',
                        //
                        'password.max'                          => 'Password Baru Maksimal 100 Karakter!',
                        'password_confirmation.max'             => 'Konfirmasi Password Baru Maksimal 100 Karakter!',
                        //
                        'password.confirmed'                    => 'Password Baru Tidak Sama Dengan Konfirmasi Password Baru!',
                        //
                        'password_confirmation.same'            => 'Konfirmasi Password Baru Harus Sama Dengan Password Baru!',
                        //
                        'password.regex'                        => 'Password Baru Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                        'password_confirmation.regex'           => 'Konfirmasi Password Baru Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                    ]
                );

                if ($validate->fails()) {
                    alert()->error('Gagal Update Password!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->back()->with('message-error-password', 'Gagal Update Password!')->withErrors($validate)->withInput($request->all());
                }
                //
                DB::table('human_resources')->where('id', $sdm)->update(['password' => Hash::make($request['password'])]);
                alert()->success('Berhasil Update Password!')->autoclose(25000);
                return redirect()->route('admin.getManageHumanResourcesId.Update.Admin', $id)->with('message-success-password', 'Berhasil Update Password!');
                //
            }
            alert()->error('Gagal!')->autoclose(25000);
            return redirect()->back();

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

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postHumanResourcesIdDelete($id)
    {
        try {
            $human_resources = HumanResource::find($id);
            if($human_resources) {
                $human_resources->update([
                    'status_active' =>  0,
                    'status_id'     =>  0,
                ]);
                alert()->success('Berhasil Hapus Data Akun Divisi Sumber Daya Manusia!', $human_resources->username)->autoclose(25000);
                return back()->with('message-delete-success', 'Berhasil Hapus Data Akun Divisi Sumber Daya Manusia!' . $human_resources->username);
            } else {
                return back()->with('message-delete-error', 'Tidak Berhasil Hapus Data Akun Divisi Sumber Daya Manusia!' . $human_resources->username);
            }
            alert()->error('Gagal!')->autoclose(25000);
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
