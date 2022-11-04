@extends('template.admin.template')


<!-- Content -->
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">
        
        <div class="col-xxl">

            <!-- Card View Employee -->
            <div class="card mx-4">

                <!-- Form View Employee Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Lihat Data Pegawai</h5>
                </div>
                <!--/ Form View Employee Title -->

                <!-- Form View Employee -->
                <div class="card-body py-xl-5 py-3 px-xl-5">

                    <form id="formViewEmployee" class="mx-2" enctype="multipart/form-data">
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
                                        aria-invalid="true" aria-describedby="full_name" data-val="true" readonly>
                                </div>
                                <div id="full_nameHelp" class="form-text">Kami tidak akan pernah membagikan nama lengkap Anda kepada orang lain.</div>
                                {{-- <!-- Error Full_name -->
                                @if ( $errors->has('full_name') )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error Full_name --> --}}
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
                                        aria-invalid="true" aria-describedby="username" data-val="true" readonly>
                                </div>
                                <div id="usernameHelp" class="form-text">Kami tidak akan pernah membagikan username Anda kepada orang lain.</div>
                                {{-- <!-- Error Username -->
                                @if ( $errors->has('username') )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error Username --> --}}
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
                                        aria-invalid="true" aria-describedby="email" data-val="true" readonly>
                                </div>
                                <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan email Anda kepada orang lain.</div>
                                {{-- <!-- Error Email -->
                                @if ( $errors->has('email') )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error Email --> --}}
                            </div>
                        </div>
                        <!--/ Email -->

                        {{-- <!-- Password -->
                        <div class="mb-3 row {{ $errors->has('password') ? 'is-invalid' : '' }}">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span id="password" class="input-group-text {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                        name="password" placeholder="*Password"
                                        autofocus autocomplete required value="{{ old('password', $employee->password ) }}"
                                        aria-invalid="true" aria-describedby="password" data-val="true" readonly>
                                </div>
                                <div id="passwordHelp" class="form-text">We'll never share your email with anyone else.</div>
                                <!-- Error Password -->
                                @if ( $errors->has('password') )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error Password -->
                            </div>
                        </div>
                        <!--/ Password --> --}}

                        <!-- Action Button -->
                        <div class="d-flex justify-content-end">
                            <div class="justify-content-between">
                                <a class="btn btn-secondary btn-lg" href="{{ URL::to('admin/manage/employees') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!-- Action Button -->

                    </form>

                </div>
                <!--/ Form View Employee -->

            </div>
            <!--/ Card View Employee -->
        </div>
    </div>
</div>

@endsection