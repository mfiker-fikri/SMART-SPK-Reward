@extends('template.admin.template')

<!-- Content -->
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <!-- Tabs -->
            <div class="card mx-4">

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <!-- Tabs Edit Profile Details Employee -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ (request()->is('admin/manage/employees/edit*')) ? 'active' : '' }}" id="pills-editEmployee-tab" data-bs-toggle="pill" data-bs-target="#pills-editEmployee" type="button" role="tab" aria-controls="pills-editEmployee" aria-selected="{{ (request()->is('admin/manage/employees/edit*')) ? 'true' : 'false' }}">Edit Data Pegawai</button>
                    </li>
                    <!--/ Tabs Edit Profile Details Employee  -->

                    <!-- Tabs Change Password -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-changePassword-tab" data-bs-toggle="pill" data-bs-target="#pills-changePassword" type="button" role="tab" aria-controls="pills-changePassword" aria-selected="false">Ganti Password</button>
                    </li>
                    <!--/ Tabs Change Password -->

                </ul>
                <!--/ Tabs -->

            </div>
            <!--/ Tabs -->

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">

                <!-- Tabs Edit Profile Details Employee -->
                <div class="tab-pane fade show {{ (request()->is('admin/manage/employees/edit*')) ? 'active' : '' }}" id="pills-editEmployee" role="tabpanel" aria-labelledby="pills-editEmployee-tab">

                    <!-- Card Edit Profile Details Employee -->
                    <div class="card my-4">

                        <!-- Form Edit Profile Details Employee Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Edit Data Pegawai</h5>
                        </div>
                        <!--/ Form Edit Profile Details Employee Title -->

                        <!-- Form Edit Profile Details Employee -->
                        <div class="card-body py-xl-5 py-sm-5 px-xl-5">

                            <form id="formEditEmployee" class="mx-2" method="POST" action="{{ route('admin.postManageEmployeesId.Update.Admin', $employee->id) }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Full Name -->
                                <div class="mb-3 row {{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                                    <label for="full_name" class="text-wrap col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span id="full_name" class="input-group-text">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" id="full_name"
                                                name="full_name" placeholder="*Nama Lengkap"
                                                autofocus autocomplete required value="{{ old('full_name', $employee->full_name) }}"
                                                aria-invalid="true" aria-describedby="full_name" data-val="true" >
                                        </div>
                                        <div id="full_nameHelp" class="form-text">Nama Lengkap Harus Berisi Huruf</div>
                                        <!-- Error Full_name -->
                                        @if ( $errors->has('full_name') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('full_name') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Full_name -->
                                    </div>
                                </div>
                                <!--/ Full Name -->

                                <!-- Username -->
                                <div class="mb-3 row {{ $errors->has('username') ? 'is-invalid' : '' }}">
                                    <label for="username" class="text-wrap col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span id="username" class="input-group-text">
                                                <i class="fa-solid fa-at"></i>
                                            </span>
                                            <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username"
                                                name="username" placeholder="*Username"
                                                autofocus autocomplete required value="{{ old('username',$employee->username) }}"
                                                aria-invalid="true" aria-describedby="username" data-val="true" >
                                        </div>
                                        <div id="usernameHelp" class="form-text">Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah</div>
                                        <!-- Error Username -->
                                        @if ( $errors->has('username') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Username -->
                                    </div>
                                </div>
                                <!--/ Username -->

                                <!-- Email -->
                                <div class="mb-3 row {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                    <label for="email" class="text-wrap col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span id="email" class="input-group-text">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                                name="email" placeholder="*Email"
                                                autofocus autocomplete required value="{{ old('email', $employee->email) }}"
                                                aria-invalid="true" aria-describedby="email" data-val="true" >
                                        </div>
                                        <div id="emailHelp" class="form-text">Email Menggunakan Simbol @/ .com/.co.id/ dll</div>
                                        <!-- Error Email -->
                                        @if ( $errors->has('email') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Email -->
                                    </div>
                                </div>
                                <!--/ Email -->

                                <!-- Noted -->
                                <div class="mt-4 d-flex flex-start">
                                    <small class="form-text">*Kami tidak akan pernah mengubah data Anda atas persetujuan Anda dan Kami tidak akan pernah membagikan data Anda kepada orang lain.</small>
                                </div>
                                <!--/ Noted -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <div class="justify-content-between">
                                        <a href="{{ URL::to('admin/manage/employees') }}" class="btn btn-secondary btn-lg" role="button" style="color: black">
                                            <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                        </a>
                                        <button type="reset" class="btn btn-warning btn-lg" style="color: black">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                            <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Update
                                        </button>
                                    </div>
                                </div>
                                <!-- Action Button -->

                            </form>

                        </div>
                        <!--/ Form Edit Profile Details Employee -->


                    </div>
                    <!-- Card Edit Profile Details Employee -->


                </div>
                <!--/ Tabs Edit Profile Details Employee -->


                <!-- Tabs Change Password -->
                <div class="tab-pane fade" id="pills-changePassword" role="tabpanel" aria-labelledby="pills-changePassword-tab">

                    <div class="card my-4">

                        <!-- Form Change Password Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Ganti Password</h5>
                        </div>
                        <!--/ Form Change Password Title -->

                        <!-- Form Change Password -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">

                            <form id="formChangePassword" class="mb-3" method="POST" action="{{ route('admin.postManageEmployeesId.UpdateChangePassword.Admin', $employee->id) }}">
                                @csrf

                                <!-- Password -->
                                <div class="mb-3 row {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span id="password" class="input-group-text {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                                name="password" placeholder="*Password"
                                                autofocus autocomplete required value=""
                                                aria-invalid="true" aria-describedby="password" data-val="true" >
                                        </div>
                                        <div id="passwordHelp" class="form-text">Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</div>
                                        <!-- Error Password -->
                                        @if ( $errors->has('password') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Password -->
                                    </div>
                                </div>
                                <!--/ Password -->

                                <!-- Password Confirmation -->
                                <div class="mb-3 row {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                                    <label for="password_confirmation" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span id="password_confirmation" class="input-group-text {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation"
                                                name="password_confirmation" placeholder="*Konfirmasi Password"
                                                autofocus autocomplete required value="{{ old('password_confirmation') }}"
                                                aria-invalid="true" aria-describedby="password_confirmation" data-val="true">
                                        </div>
                                        <div id="password_confirmationHelp" class="form-text">Konfirmasi Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</div>
                                        <!-- Error Password Confirmation-->
                                        @if ( $errors->has('password_confirmation') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Password Confirmation -->
                                    </div>
                                </div>
                                <!--/ Password Confirmation -->

                                <!-- Noted -->
                                <div class="mt-4 d-flex flex-start">
                                    <small class="form-text">*Kami tidak akan pernah mengubah data Anda atas persetujuan Anda dan Kami tidak akan pernah membagikan data Anda kepada orang lain.</small>
                                </div>
                                <!--/ Noted -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <div class="justify-content-between">
                                        <a href="{{ URL::to('admin/manage/employees') }}" class="btn btn-secondary btn-lg" role="button" style="color: black">
                                            <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                        </a>
                                        <button type="reset" class="btn btn-warning btn-lg" style="color: black">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                            <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Update
                                        </button>
                                    </div>
                                </div>
                                <!-- Action Button -->

                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <!--/ Tabs -->

        </div>
    </div>
</div>

@endsection
