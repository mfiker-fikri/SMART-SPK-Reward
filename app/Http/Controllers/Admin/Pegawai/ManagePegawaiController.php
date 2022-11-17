<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

//
use App\Models\Pegawai;

class ManagePegawaiController extends Controller
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
    public function getEmployees()
    {
        //
        // $employees = Pegawai::orderBy('id', 'DESC')->paginate(5);
        try {
            // $employee = Pegawai::get();
            // $employee = Auth::guard('employees')->user()->id;
            // $employee = Pegawai::whereKeyNot(Auth::guard('employees')->user()->id)->get();
            // dd($employee);
            return view('layouts.admin.content.pegawai.pegawai_index');
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function getEmployeesList(Request $request)
    {

        $data = Pegawai::latest()
            ->where([
                'status_id'     =>  1,
            ])
            ->get();
        // $data = Pegawai::all()->except(Auth::guard('employees')->user()->id);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                if (Cache::has('pegawai-is-online-' . $row->id)) {
                    $actionBtn = '<span class="text-success">Online</span>';
                } else {
                    $actionBtn =
                        // data-bs-toggle="modal" data-bs-target="#deleteEmployeesId
                        '
                        <a href="' . route('admin.getManageEmployeesId.View.Admin', $row->id) . '" class="view btn btn-info mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-eye mx-auto me-1"></i> View
                        </a>
                        <a href="' . route('admin.getManageEmployeesId.Update.Admin', $row->id) . '" class="edit btn btn-warning mx-1 mx-1 mx-1" style="color: black">
                            <i class="fa-solid fa-pencil mx-auto me-1"></i> Edit
                        </a>
                        <a href="#" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteEmployeesId" data-id="' . $row->id . '" data-username="' . $row->username . '">
                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                        </a>
                        ';
                    // <button type="button" class="delete btn btn-danger mx-1 mx-1 mx-1" id="deleteEmployeesId" " > onclick="deleteEmployeesId()"
                    //     <i class="fa-solid fa-trash-can mx-auto me-1"></i>Delete
                    // </button>
                    // <a href="' . route('admin.getManageEmployeesId.Update.Admin', $row->id) . '" class="delete btn btn-danger mx-1 mx-1 mx-1" style="color: black; cursor: pointer;" id="deleteEmployeesId" >
                    //     <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                    // </a>
                }
                return $actionBtn;
            })
            ->addColumn('status', function ($row) {
                $status = '';
                if (Cache::has('pegawai-is-online-' . $row->id)) {
                    $status = '<span class="text-success">Online</span>';
                } else {
                    $status = '<span class="text-secondary">Offline</span>';
                }
                return $status;
            })
            ->addColumn('last_seen', function ($row) {
                $last_seen = '';
                if (Cache::has('pegawai-is-online-' . $row->id)) {
                    $last_seen = '<span class="text-success">Online</span>';
                } else {
                    $last_seen = '<span class="text-secondary">' . \Carbon\Carbon::parse($row->last_seen)->diffForHumans() . '</span>';
                }
                return $last_seen;
            })
            ->rawColumns(['action','status','last_seen'])
            ->make(true);
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
    public function getEmployeesCreate()
    {
        //
        try {
            return view('layouts.admin.content.pegawai.pegawai_create');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEmployeesCreate(Request $request)
    {
        try {
            // Validasi Create
            $validate = Validator::make(
                $request->all(),
                [
                    'full_name'                             => 'required|string|min:3|max:255|regex:/^(?![0-9._-])(?!.*[0-9._-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z\s]+$/',
                    'username'                              => 'required|string|min:3|max:255|unique:employees,username|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/',
                    'email'                                 => 'required|string|email|unique:employees,email',
                    'password'                              => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed',
                    'password_confirmation'                 => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
                ],
                [
                    'full_name.required'                =>      'Nama Lengkap Wajib Diisi!',
                    'username.required'                 =>      'Username Wajib Diisi!',
                    'email.required'                    =>      'Email Wajib Diisi!',
                    'password.required'                 =>      'Password Wajib Diisi!',
                    'password_confirmation.required'    =>      'Konfirmasi Password Baru Wajib Diisi!',
                    //
                    'full_name.min'                     =>      'Nama Lengkap Minimal 3 Karakter!',
                    'username.min'                      =>      'Username Minimal 3 Karakter!',
                    'password.min'                      =>      'Password Minimal 6 Karakter!',
                    'password_confirmation.min'         =>      'Konfirmasi Password Baru Minimal 6 Karakter!',
                    //
                    'full_name.max'                     =>      'Nama Lengkap Maksimal 255 Karakter!',
                    'username.max'                      =>      'Username Maksimal 255 Karakter!',
                    'password.max'                      =>      'Password Maksimal 100 Karakter!',
                    'password_confirmation.max'         =>      'Konfirmasi Password Baru Maksimal 100 Karakter!',
                    //
                    'email.email'                       =>      'Email Tidak Valid! (Gunakan @/.com/.co.id/dll)',
                    //
                    'username.unique'                   =>      'Username Sudah Ada',
                    'email.unique'                      =>      'Alamat Email Sudah Ada',
                    //
                    'password.confirmed'                =>      'Password Tidak Sama Dengan Password Konfirmasi!',
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
                alert()->error('Gagal Tambah Data Pegawai!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Pegawai!')->withErrors($validate)->withInput($request->all());
            }

            // Create Employee New
            $employee = Pegawai::create([
                'id'            =>      Str::uuid(),
                'full_name'     =>      $request['full_name'],
                'username'      =>      $request['username'],
                'email'         =>      $request['email'],
                'password'      =>      Hash::make($request['password'])
            ]);

            if ($employee) {
                alert()->success('Berhasil Tambah Data Pegawai!')->autoclose(25000);
                return redirect('admin/manage/employees')->with('message-create-success', 'Berhasil Tambah Data Pegawai!');
                // ->back()->with('message-create-success', 'Berhasil Tambah Data Pegawai!');
            } else {
                alert()->error('Gagal Tambah Data Pegawai!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-create-error', 'Gagal Tambah Data Pegawai')->withErrors($validate)->withInput($request->all());
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEmployeesIdView($id)
    {
        //
        $employee = Pegawai::where('id', '=', $id)->first();
        return view('layouts.admin.content.pegawai.pegawai_view', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEmployeesIdUpdate($id)
    {
        // $username = Admin::all()->except(Auth::guard('admins')->user()->id);
        $employee = Pegawai::where('id', '=', $id)->first();
        // $admin = Admin::find($username);
        // dd($admin);
        return view('layouts.admin.content.pegawai.pegawai_edit', compact('employee'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEmployeesIdUpdate(Request $request, $id)
    {
        // Find Id Employee
        $employee = Pegawai::find($id);

        if ($employee) {
            $validate = null;
            if ($request['email'] === $employee->email || $request['username'] === $employee->username) {
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
                        'username'                              =>      'required|string|min:3|max:255|regex:/^(?![_-])(?!.*[_-]$)(?!.*\d_-)(?!.*_-d)[a-zA-Z0-9_-]+$/|unique:employees,username',
                        'email'                                 =>      'required|string|email|unique:employees,email',
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
                    ]
                );
            }

            if ($validate->fails()) {
                alert()->error('Gagal Update Data Pegawai!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-update-error', 'Gagal Update Data Pegawai!')->withErrors($validate)->withInput($request->all());
            }

            $employee->full_name   =    $request['full_name'];
            $employee->username    =    $request['username'];
            $employee->email       =    $request['email'];

            $employee->save();

            alert()->success('Berhasil Update Data Pegawai!')->autoclose(25000);
            return redirect()->back()->with('message-update-success', 'Berhasil Update Data Pegawai!');
            //
        } else {
            alert()->error('Gagal Update Data Pegawai!', 'Validasi Gagal')->autoclose(25000);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEmployeesIdUpdateChangePassword(Request $request, $id)
    {
        // Find Id Employee
        $employee = Pegawai::find($id);

        if ($employee) {
            $validate = Validator::make(
                $request->all(),
                [
                    'password'                              => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|confirmed',
                    'password_confirmation'                 => 'required|string|min:6|max:100|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,100}$/|same:password',
                ],
                [
                    'password.required'                     => 'Password Wajib Diisi!',
                    'password_confirmation.required'        => 'Konfirmasi Password Baru Wajib Diisi!',
                    //
                    'password.min'                          => 'Password Minimal 6 Karakter!',
                    'password_confirmation.min'             => 'Konfirmasi Password Baru Minimal 6 Karakter!',
                    //
                    'password.max'                          => 'Password Maksimal 100 Karakter!',
                    'password_confirmation.max'             => 'Konfirmasi Password Baru Maksimal 100 Karakter!',
                    //
                    'password.confirmed'                    => 'Password Tidak Sama Dengan Password Konfirmasi!',
                    //
                    'password_confirmation.same'            => 'Konfirmasi Password Harus Sama Dengan Password!',
                    //
                    'password.regex'                        => 'Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                    'password_confirmation.regex'           => 'Konfirmasi Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik!',
                ]
            );

            if ($validate->fails()) {
                alert()->error('Gagal Update Password!', 'Validasi Gagal')->autoclose(25000);
                return redirect()->back()->with('message-error-password', 'Gagal Update Password!')->withErrors($validate)->withInput($request->all());
            }
            //
            // DB::table('employees')->where('id', '=', $employee)
            $employee->update(['password' => Hash::make($request['password'])]);
            alert()->success('Berhasil Update Password!')->autoclose(25000);
            return redirect()->back()->with('message-update-success', 'Berhasil Update Password!');
            //
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEmployeesIdDelete($id)
    {
        //
        $employee = Pegawai::find($id);

        if ($employee) {
            $employee->update([
                'status_active' =>  0,
                'status_id'     =>  0,
            ]);
            // $admin->delete();
            alert()->success('Berhasil Hapus Admin!', $employee->username)->autoclose(25000);
            return back()->with('message-delete-success', 'Berhasil Hapus Admin!' . $employee->username);
            // ->with(['success' => 'Post has been deleted successfully']);
        } else {
            return back()->with('message-delete-error', 'Tidak Berhasil Hapus Admin!' . $employee->username);
            // ->with(['error' => 'Some problem has occurred, please try again']);
        }
        alert()->error('Gagal!')->autoclose(25000);
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
