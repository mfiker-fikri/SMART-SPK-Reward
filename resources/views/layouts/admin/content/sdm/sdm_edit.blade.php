@extends('template.admin.template')

@section('js_footer')
    <!-- Select2 Role -->
    <script type="text/javascript">
    $( '#role' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Role -->

    <!-- Reset Select2 Role -->
    <script type="text/javascript">
    $(document).on('click', '#resetRole', function(e) {
        var old = document.getElementById("oldRole").getAttribute("value");
        if (old) {
            $('#role').val(old).trigger('change');
        } else {
            $('#role').val(null).trigger('change');
        }
    });
    </script>
    <!--/ Reset Select2 Role -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <!-- Tabs -->
            <div class="card mx-4">

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <!-- Tabs Edit Profile Details Data Akun Divisi Sumber Daya Manusia -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ (request()->is('admin/manage/sdm/edit*')) ? 'active' : '' }}" id="pills-editSDM-tab" data-bs-toggle="pill" data-bs-target="#pills-editSDM" type="button" role="tab" aria-controls="pills-editSDM" aria-selected="{{ (request()->is('admin/manage/sdm/edit*')) ? 'true' : 'false' }}">Edit Data Akun Divisi Sumber Daya Manusia</button>
                    </li>
                    <!--/ Tabs Edit Profile Details Data Akun Divisi Sumber Daya Manusia -->

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

                <!-- Tabs Edit Profile Details Data Akun Divisi Sumber Daya Manusia -->
                <div class="tab-pane fade show {{ (request()->is('admin/manage/sdm/edit*')) ? 'active' : '' }}" id="pills-editSDM" role="tabpanel" aria-labelledby="pills-editSDM-tab">

                    @if(session('message-update-success'))
                    <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-error'))
                    <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif

                    <!-- Card Update SDM -->
                    <div class="card my-4">

                        <!-- Form Update SDM Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Edit Data Akun Divisi Sumber Daya Manusia</h5>
                        </div>
                        <!--/ Form Update SDM Title -->

                        <!-- Form Update SDM -->
                        <div class="card-body py-xl-5 py-sm-5 px-xl-5">

                            <form id="formUpdateHumanResources" class="mx-2" method="POST" action="{{ route('admin.postManageHumanResourcesId.Update.Admin', $humanResource->id) }}" enctype="multipart/form-data">
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
                                                autofocus autocomplete required value="{{ old('full_name', $humanResource->full_name) }}"
                                                aria-invalid="true" aria-describedby="full_name" data-val="true">
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
                                                autofocus autocomplete required value="{{ old('username', $humanResource->username) }}"
                                                aria-invalid="true" aria-describedby="username" data-val="true">
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
                                                autofocus autocomplete required value="{{ old('email', $humanResource->email) }}"
                                                aria-invalid="true" aria-describedby="email" data-val="true">
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

                                <!-- Password -->
                                <div class="mb-3 row {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span id="password" class="input-group-text {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                                name="password" placeholder="*Password"
                                                autofocus autocomplete required value="{{ old('password') }}"
                                                aria-invalid="true" aria-describedby="password" data-val="true">
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
                                                <i class="fa-solid fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation"
                                                name="password_confirmation" placeholder="*Konfirmasi Password"
                                                autofocus autocomplete required value="{{ old('password_confirmation') }}"
                                                aria-invalid="true" aria-describedby="password_confirmation" data-val="true">
                                        </div>
                                        <div id="password_confirmationHelp" class="form-text">Konfirmasi Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</div>
                                        <!-- Error Password Confirmation -->
                                        @if ( $errors->has('password_confirmation') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Password Confirmation -->
                                    </div>
                                </div>
                                <!--/ Password Confirmation -->

                                <!-- Role -->
                                <div class="mb-3 row {{ $errors->has('role') ? 'is-invalid' : '' }}">
                                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('role') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-key"></i>
                                            </span>
                                            <input type="hidden" value="{{ old('role') }}" id="oldRole" />
                                            <select class="form-select {{ $errors->has('role') ? 'is-invalid' : '' }}" id="role"
                                                name="role" placeholder="--Pilih Peran SDM --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="role" data-val="true" aria-label="role" data-placeholder="-- Pilih Peran --">
                                                <option disabled selected>-- Pilih Peran SDM --</option>
                                                <option value="1" @if( old('role', $humanResource->role) == 1 ) selected="selected" @endif>Kepala Biro Sumber Daya Manusia</option>
                                                <option value="2" @if( old('role', $humanResource->role) == 2 ) selected="selected" @endif>Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</option>
                                                <option value="3" @if( old('role', $humanResource->role) == 3 ) selected="selected" @endif>Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</option>
                                                {{-- <option value="Kepala Biro Sumber Daya Manusia">Kepala Biro Sumber Daya Manusia</option>
                                                <option value="Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha">Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</option>
                                                <option value="Kepala Subbagian Penghargaan, Disiplin, dan Pensiun">Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</option> --}}
                                            </select>
                                        </div>
                                        <div id="roleHelp" class="form-text">Pilih Peran Divisi Sumber Daya Manusia</div>
                                        <!-- Error Role -->
                                        @if ( $errors->has('role') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Role -->
                                    </div>
                                </div>
                                <!--/ Role -->

                                <!-- Noted -->
                                <div class="mt-4 d-flex flex-start">
                                    <small class="form-text">*Kami tidak akan pernah mengubah data Anda atas persetujuan Anda dan Kami tidak akan pernah membagikan data Anda kepada orang lain.</small>
                                </div>
                                <!--/ Noted -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <div class="justify-content-between">
                                        <a class="btn btn-secondary btn-lg" href="{{ URL::to('admin/manage/sdm') }}" role="button" style="color: black">
                                            <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                        </a>
                                        <button type="reset" class="btn btn-warning btn-lg" id="resetRole">
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
                        <!--/ Form Update SDM -->

                    </div>
                    <!--/ Card Update SDM -->

                </div>
                <!-- Tabs Edit Profile Details Data Akun Divisi Sumber Daya Manusia -->

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

                            <form id="formChangePassword" class="mb-3" method="POST" action="{{ route('admin.postManageHumanResourcesId.UpdateChangePassword.Admin', $humanResource->id) }}">
                                @csrf

                                <!-- Password -->
                                <div class="mb-3 row {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span id="password" class="input-group-text {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                                name="password" placeholder="*Password"
                                                autofocus autocomplete required
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
                                        <a href="{{ URL::to('admin/manage/admins') }}" class="btn btn-secondary btn-lg" role="button">
                                            <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                        </a>
                                        <button type="reset" class="btn btn-warning btn-lg" style="color: white">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Submit
                                        </button>
                                    </div>
                                </div>
                                <!-- Action Button -->

                            </form>

                        </div>
                        <!--/ Form Change Password -->

                    </div>

                </div>
                <!--/ Tabs Change Password -->


            </div>



        </div>
    </div>
</div>

@endsection
