<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Yajra\Datatables\Facades\Datatables;
// use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use App\Models\Admin;

class ManageAdminController extends Controller
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
    public function getAdmins()
    {
        //
        // $check = Admin::all()->except(Auth::guard('admins')->user()->id);
        // dd($check);
        try {
            return view('layouts.admin.content.admin.admin_index');
        } catch (\Exception $exception) {
            return $exception;
        }
        // $check = Admin::where('id', '!=', Auth::guard('admins')->user()->id)->get();
        // dd($check);


        // $check = Auth::guard('admins')->user()->id;
        // dd($id);
        // $find = !Admin::find($check);
        // dd($find);
        // $admins = Admin::get();
        // $except = $admins->except(Auth::guard('admins')->user()->id);
        // $except->all();
        // dd($except);
        // $admins =
        // if (Auth::check()) {
        //     if (Auth::guard('admins')->id == Auth::check()) {
        //         return Admin::get();
        //     }
        // }
        // return view('layouts.admin.content.admin.admin_index');
    }

    public function getAdminsList(Request $request)
    {
        // if ($request->ajax()) {
        // $data = Admin::all()->except(Auth::guard('admins')->user()->id);
        // $uuid = Auth::guard('admins')->user()->id->toString();
        // dd($uuid);
        // $users = Admin::select(['full_name', 'email', 'username']);

        // return Datatables::of($users)->make();
        $data = Admin::latest()
            ->where([
                'status_id'     =>  1,
            ])
            ->get();
            // ->get()
            // ->except(Auth::guard('admins')->user()->id);
        // dd($data);
        // return Datatables::of($data)->make(true);
        // $users = $data->select(['id', 'full_name', 'username', 'email']);
        return Datatables::of($data)
            // ->parameters([
            //     'dom' => 'Bfrtip',
            //     'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
            // ])
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                if (Cache::has('admin-is-online-' . $row->id)) {
                    $actionBtn = '<span class="text-success">Online</span>';
                } else {
                    // <a href="" class="delete btn btn-danger mx-1 mx-1 mx-1" id="deleteAdminsId" data-id="' . $row->id . '" style="cursor: pointer;">
                    //     <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                    // </a>
                    // <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteAdminsId">
                    //     <i class="fa-solid fa-trash-can mx-auto me-1"></i>Delete
                    // </button>
                    $actionBtn =
                        '
                    <a href="' . route('admin.getManageAdminsId.View.Admin', $row->id) . '" class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                        <i class="fa-solid fa-eye mx-auto me-1"></i> View
                    </a>
                    <a href="' . route('admin.getManageAdminsId.Update.Admin', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                        <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                    </a>
                    <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteAdminsId" data-id="' . $row->id . '" data-username="' . $row->username . '">
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
                } elseif ($row->status == null) {
                    $status = '<span class="text-secondary">Not Login</span>';
                } else {
                    $status = '<span class="text-secondary">Offline</span>';
                }
                return $status;
            })
            ->addColumn('last_seen', function ($row) {
                $last_seen = '';
                // if ($row->last_seen != null) {
                //     $last_seen = '<span class="text-secondary">' . \Carbon\Carbon::parse($row->last_seen)->diffForHumans() . ' </span>';
                // } else {
                //     $last_seen = '<span class="text-success">Online</span>';
                // }
                if (Cache::has('admin-is-online-' . $row->id)) {
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
                if (Cache::has('admin-is-online-' . $row->id)) {
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

                    // if ($row->status_active == 1) {
                    // $status_active =
                    //     '<div class="form-check form-switch">
                    //         <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" ' . $row->status_active == 1 ? 'checked' : ''  . ' />
                    //     </div>';
                    // } else {
                    //     $status_active =
                    //         '<div class="form-check form-switch">
                    //             <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"  />
                    //         </div>';
                    // }
                }
                return $status_active;
            })
            ->rawColumns(['action', 'status', 'last_seen', 'status_active'])
            // ->rawColumns(['last_seen'])
            ->make(true);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdminsCreate()
    {
        //
        try {
            return view('layouts.admin.content.admin.admin_create');
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdminsCreate(Request $request)
    {
        //
        try {
            // Validasi
            $validate = Validator::make(
                $request->all(),
                [
                    'full_name'                         =>      'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                    'username'                          =>      'required|string|min:3|max:255|unique:admins,username|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                    'email'                             =>      'required|string|email|unique:admins,email',
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
                alert()->error('Gagal Tambah Data Admin Baru!', 'Validasi Gagal')->autoclose(25000);
                return back()->with('message-create-error', 'Gagal Tambah Admin Baru!, Validasi Gagal')->withErrors($validate)->withInput($request->all());
            }

            // Create Admin New
            $admin = Admin::create([
                'id'            =>      Str::uuid(),
                'full_name'     =>      $request['full_name'],
                'username'      =>      $request['username'],
                'email'         =>      $request['email'],
                'password'      =>      Hash::make($request['password'])
            ]);

            // if ($admin->exits()) {
            //     alert()->error('Gagal Tambah Data Admin!', 'Data Sudah Terdaftar')->autoclose(25000);
            //     return back()->with('message-create-error', 'Gagal Tambah Admin Baru! , Data Sudah Terdaftar');
            // }

            if ($admin) {
                alert()->success('Berhasil Tambah Data Admin Baru!')->autoclose(25000);
                return back()->with('message-create-success', 'Berhasil Tambah Data Admin Baru!');
            } else {
                alert()->error('Gagal Tambah Data Admin Baru!', 'Validasi Gagal')->autoclose(25000);
                return back()->with('message-create-error', 'Gagal Tambah Data Admin Baru!')->withErrors($validate)->withInput($request->all());
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
    public function getAdminsIdView($id)
    {
        //
        $admin = Admin::where('id', '=', $id)->first();
        return view('layouts.admin.content.admin.admin_view', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAdminsIdUpdate($id)
    {
        // $username = Admin::all()->except(Auth::guard('admins')->user()->id);
        $admin = Admin::where('id', '=', $id)->first();
        // $admin = Admin::find($username);
        // dd($admin);
        return view('layouts.admin.content.admin.admin_edit', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdminsIdUpdate(Request $request, $id)
    {
        // Find Id Admin
        $admin = Admin::find($id);

        if ($admin) {
            $validate = null;
            if ($request['email'] === $admin->email || $request['username'] === $admin->username) {
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
                alert()->error('Gagal Update Data Admin!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-update-error', 'Gagal Update Data Admin!')->withErrors($validate)->withInput($request->all());
            }

            $admin->full_name   =   $request['full_name'];
            $admin->username    =   $request['username'];
            $admin->email       =   $request['email'];

            $admin->save();

            alert()->success('Berhasil Update Data Admin!')->autoclose(25000);
            return redirect()->back()->with('message-update-success', 'Berhasil Update Data Admin!');
            //
        } else {
            alert()->error('Gagal!')->autoclose(25000);
            return redirect()->back();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdminsIdUpdateChangePassword(Request $request, $id)
    {
        // Find Id Admin
        $admin = Admin::find($id);

        if ($admin) {
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
            DB::table('admins')->where('id', $admin)->update(['password' => Hash::make($request['password'])]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect()->back()->with('message-success-password', 'Berhasil Update Password!');
            //
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdminsIdStatusActive(Request $request, $id)
    {
        //
        // Find Id Admin
        $admin = Admin::find($id);

        if ($admin) {
            if ($admin->status_active == 1) {
                $admin->update(['status_active' => 0]);
                alert()->success('Berhasil Non Aktif Admin!', $admin->username)->autoclose(25000);
                return redirect()->back()->with('message-create-success', 'Berhasil Non Aktif Admin!');
            } else {
                $admin->update(['status_active' => 1]);
                alert()->success('Berhasil Meng-aktifkan Admin!', $admin->username)->autoclose(25000);
                return redirect()->back()->with('message-create-success', 'Berhasil Meng-aktifkan Admin!');
            }
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postAdminsIdDelete($id)
    {
        //
        // $admin = Admin::findOrFail($id);
        $admin = Admin::find($id);

        if ($admin) {
            $admin->update([
                'status_active' =>  0,
                'status_id'     =>  0,
            ]);
            // $admin->delete();
            alert()->success('Berhasil Hapus Admin!', $admin->username)->autoclose(25000);
            return redirect()->back()->with('message-delete-success', 'Berhasil Hapus Admin!' . $admin->username);
            // ->with(['success' => 'Post has been deleted successfully']);
        } else {
            return redirect()->back()->with('message-delete-error', 'Tidak Berhasil Hapus Admin!' . $admin->username);
            // ->with(['error' => 'Some problem has occurred, please try again']);
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->back();
    }
}
