<?php

namespace App\Http\Controllers\Admin\HWU;

use App\Http\Controllers\Controller;
use App\Models\HeadWorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ManageHWUController extends Controller
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
        return Auth::guard('head_work_units');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHWU()
    {
        try {
            return view('layouts.admin.content.hwu.hwu_index');
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function getHWUList(Request $request)
    {
        try {
            $data = HeadWorkUnit::latest()
            ->where([
                'status_id'     =>  1,
            ])
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                if (Cache::has('head_work_units-is-online-' . $row->id)) {
                    $actionBtn = '<span class="text-success">Online</span>';
                } else {
                    $actionBtn =
                        '
                    <a href="' . route('admin.getManageHWUId.View.Admin', $row->id) . '" class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                        <i class="fa-solid fa-eye mx-auto me-1"></i> View
                    </a>
                    <a href="' . route('admin.getManageHWUId.Update.Admin', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                        <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                    </a>
                    <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteHWUsId" data-id="' . $row->id . '" data-username="' . $row->username . '">
                        <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                    </a>
                    ';
                }
                return $actionBtn;
            })
            ->addColumn('status', function ($row) {
                $status = '';
                if (Cache::has('head_work_units-is-online-' . $row->id)) {
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
                if (Cache::has('head_work_units-is-online-' . $row->id)) {
                    $last_seen = '<span class="text-success">Online</span>';
                } elseif ($row->last_seen == null) {
                    $last_seen = '<span class="text-secondary">Not Login</span>';
                } else {
                    $last_seen = '<span class="text-secondary">' . \Carbon\Carbon::parse($row->last_seen)->diffForHumans() . '</span>';
                }
                return $last_seen;
            })
            ->addColumn('status_active', function ($row) {
                $status_active = '';
                if (Cache::has('head_work_units-is-online-' . $row->id)) {
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
    public function getHWUCreate()
    {
        //
        try {
            return view('layouts.admin.content.hwu.hwu_create');
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
    public function postHWUCreate(Request $request)
    {
        //
        try {
            // Validasi
            $validate = Validator::make(
                $request->all(),
                [
                    'full_name'                         =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                    'username'                          =>      'required|string|min:3|max:255|unique:head_of_work_units,username|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                    'email'                             =>      'required|string|email|unique:head_of_work_units,email',
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
                alert()->error('Gagal Tambah Data Kepala Satuan Kerja Baru!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Kepala Satuan Kerja Baru!, Validasi Gagal')->withErrors($validate)->withInput($request->all());
            }

            // Create HWU New
            $hwu = HeadWorkUnit::create([
                'id'            =>      Str::uuid(),
                'full_name'     =>      $request['full_name'],
                'username'      =>      $request['username'],
                'email'         =>      $request['email'],
                'password'      =>      Hash::make($request['password']),
                'admin_id'      =>      Auth::guard('admins')->user()->id,
            ]);

            if ($hwu) {
                alert()->success('Berhasil Tambah Data Kepala Satuan Kerja Baru!')->autoclose(25000);
                return redirect('admin/manage/ksk')->with('message-create-success', 'Berhasil Tambah Data Kepala Satuan Kerja Baru!');
            } else {
                alert()->error('Gagal Tambah Data Kepala Satuan Kerja Baru!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Kepala Satuan Kerja Baru!')->withErrors($validate)->withInput($request->all());
            }
            //
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
    public function getHWUIdView($id)
    {
        try {
            $hwu = HeadWorkUnit::where('id', '=', $id)->first();
            return view('layouts.admin.content.hwu.hwu_view', compact('hwu'));
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
    public function getHWUIdUpdate($id)
    {
        try {
            $hwu = HeadWorkUnit::where('id', '=', $id)->first();
            return view('layouts.admin.content.hwu.hwu_edit', compact('hwu'));
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
    public function postHWUIdUpdate(Request $request, $id)
    {
        try {
            // Find Id Admin
            $hwu = HeadWorkUnit::find($id);

            // ddd($hwu->id);
            // if (Cache::has('admin-is-online-' . $row->id)) {
            //     ddd('sukses');
            //     $actionBtn = '<span class="text-success">Online</span>';
            // }

            if ($hwu) {
                $validate = null;
                if ($request['email'] === $hwu->email || $request['username'] === $hwu->username) {
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
                            'email.email'                           =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
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
                            'email'                                 =>      'required|string|email|unique:head_of_work_units,email',
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
                            'email.email'                           =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
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
                    alert()->error('Gagal Update Data Kepala Satuan Kerja!', 'Validasi Gagal')->autoclose(25000);
                    return redirect()->route('admin.getManageHWUId.Update.Admin', [$hwu])->with('message-update-error', 'Gagal Update Data Kepala Satuan Kerja!')->withErrors($validate)->withInput($request->all());
                }

                $hwu->full_name   =   $request['full_name'];
                $hwu->username    =   $request['username'];
                $hwu->email       =   $request['email'];

                $hwu->save();

                alert()->success('Berhasil Update Data Kepala Satuan Kerja!')->autoclose(25000);
                return redirect()->route('admin.getManageHWUId.Update.Admin', [$hwu])->with('message-update-success', 'Berhasil Update Data Kepala Satuan Kerja!');
                //
            } else {
                alert()->error('Gagal!')->autoclose(25000);
                return redirect()->route('admin.getManageHWUId.Update.Admin', [$hwu]);
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
    public function postHWUIdUpdateChangePassword(Request $request, $id)
    {
        // Find Id Admin
        $hwu = HeadWorkUnit::find($id);

        if ($hwu) {
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
                return redirect()->route('admin.getManageHWUId.Update.Admin', [$hwu])->with('message-error-password', 'Gagal Update Password!')->withErrors($validate)->withInput($request->all());
            }
            //
            DB::table('head_of_work_units')->where('id', $hwu)->update(['password' => Hash::make($request['password'])]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect()->route('admin.getManageHWUId.Update.Admin', [$hwu])->with('message-success-password', 'Berhasil Update Password!');
            //
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->route('admin.getManageHWUId.Update.Admin', [$hwu]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postHWUIdDelete($id)
    {
        $hwu = HeadWorkUnit::find($id);

        if ($hwu) {
            $hwu->update([
                'status_active' =>  0,
                'status_id'     =>  0,
            ]);
            // $hwu->delete();
            alert()->success('Berhasil Hapus Admin!', $hwu->username)->autoclose(25000);
            return redirect()->back()->with('message-delete-success', 'Berhasil Hapus Admin!' . $hwu->username);
            // ->with(['success' => 'Post has been deleted successfully']);
        } else {
            return redirect()->back()->with('message-delete-error', 'Tidak Berhasil Hapus Admin!' . $hwu->username);
            // ->with(['error' => 'Some problem has occurred, please try again']);
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->back();
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
