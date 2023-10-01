@extends('template.admin.template')

@prepend('js_header')

@endprepend

<!-- Header Js -->
@section('js_header')
    <script>
    $(document).ready(function(){
        $('#exampleCheck1').click(function() {
            if ($(this).is(":checked")) {
                $('#formFile1').show();
                $('#output_image1').show();
                // .css({"display: none"});
                // .show()
                $('#formFile2').hide();
                $('#output_image2').hide();
                // .css({"display: block"});
                // .hide()
            } else {
                $('#formFile1').hide();
                $('#output_image1').hide();
                // .css({"display: block"});
                $('#formFile2').show();
                $('#output_image2').show();
                // .css({"display: none"});
            }

        });
    });
    </script>
@stop

<!-- Footer Js -->
@section('js_footer')
    <!-- Show Hide Password -->
    <script type="text/javascript">
        $(document).on('click', '#oldPasswordEye', function(e) {
            event.preventDefault();
            var show = document.getElementById("oldPassword").getAttribute("type");
            if(show == "password"){
                document.getElementById("oldPassword").setAttribute("type", "text");
                document.getElementById("eyeOldPassword").removeAttribute("class", "fa-solid fa-eye-slash");
                document.getElementById("eyeOldPassword").setAttribute("class", "fa-solid fa-eye");
            } else if(show == "text"){
                document.getElementById("oldPassword").setAttribute("type", "password");
                document.getElementById("eyeOldPassword").removeAttribute("class", "fa-solid fa-eye");
                document.getElementById("eyeOldPassword").setAttribute("class", "fa-solid fa-eye-slash");
            }
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '#passwordEye', function(e) {
            event.preventDefault();
            var show = document.getElementById("password").getAttribute("type");
            if(show == "password"){
                document.getElementById("password").setAttribute("type", "text");
                document.getElementById("eyePassword").removeAttribute("class", "fa-solid fa-eye-slash");
                document.getElementById("eyePassword").setAttribute("class", "fa-solid fa-eye");
            } else if(show == "text"){
                document.getElementById("password").setAttribute("type", "password");
                document.getElementById("eyePassword").removeAttribute("class", "fa-solid fa-eye");
                document.getElementById("eyePassword").setAttribute("class", "fa-solid fa-eye-slash");
            }
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '#passwordConfirmationEye', function(e) {
            event.preventDefault();
            var show = document.getElementById("password_confirmation").getAttribute("type");
            if(show == "password"){
                document.getElementById("password_confirmation").setAttribute("type", "text");
                document.getElementById("eyePasswordConfirmation").removeAttribute("class", "fa-solid fa-eye-slash");
                document.getElementById("eyePasswordConfirmation").setAttribute("class", "fa-solid fa-eye");
            } else if(show == "text"){
                document.getElementById("password_confirmation").setAttribute("type", "password");
                document.getElementById("eyePasswordConfirmation").removeAttribute("class", "fa-solid fa-eye");
                document.getElementById("eyePasswordConfirmation").setAttribute("class", "fa-solid fa-eye-slash");
            }
        });
    </script>
    <!--/ Show Hide Password -->
@stop

<!-- Content -->
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            @if(session('message-create-success'))
            <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-create-success') }} </b></strong>
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(session('message-create-error'))
            <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-create-error') }}  </b></strong>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @endif

            <!-- Card Add Admin New -->
            <div class="card mx-4">

                <!-- Form Create Add Admin New Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Data Admin Baru</h5>
                </div>
                <!--/ Form Create Add Admin New Title -->

                <!-- Form Create Add Admin New -->
                <div class="card-body py-xl-5 py-sm-5 px-xl-5">

                    <form id="formCreateAdminNew" class="mx-2" method="POST" action="{{ URL::to('admin/manage/admins/create/post') }}" enctype="multipart/form-data">
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
                                        autofocus autocomplete required value="{{ old('full_name') }}"
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
                                        autofocus autocomplete required value="{{ old('username') }}"
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
                                        autofocus autocomplete required value="{{ old('email') }}"
                                        aria-invalid="true" aria-describedby="email" data-val="true">
                                </div>
                                <div id="emailHelp" class="form-text">Email Menggunakan Simbol @/ Serta .com/.co.id/ dll</div>
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
                                    <span class="input-group-text {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                        <i class="fa-solid fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                        name="password" placeholder="*Password"
                                        autofocus autocomplete required value="{{ old('password') }}"
                                        aria-invalid="true" aria-describedby="password" data-val="true">
                                    <span class="input-group-text" id="passwordEye" style="cursor: pointer;">
                                        <i class="fa-solid fa-eye-slash" id="eyePassword"></i>
                                    </span>
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
                                    <span class="input-group-text {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                                        <i class="fa-solid fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation"
                                        name="password_confirmation" placeholder="*Konfirmasi Password"
                                        autofocus autocomplete required value="{{ old('password_confirmation') }}"
                                        aria-invalid="true" aria-describedby="password_confirmation" data-val="true">
                                    <span class="input-group-text" id="passwordConfirmationEye" style="cursor: pointer;">
                                        <i class="fa-solid fa-eye-slash" id="eyePasswordConfirmation"></i>
                                    </span>
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

                        {{-- <div class="mb-3 row">
                            <label for="formFile" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile1"
                                    accept=".png, .jpg, .jpeg" onchange="preview_image(event)">
                                <input class="form-control" type="text" id="formFile2">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                        </div> --}}

                        {{-- <div class="mb-3 form-check">
                            <div class="col-sm-10">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div> --}}

                        {{-- <div class="d-flex justify-content-md-center py-sm-3" >
                            <img class="d-block rounded" height="300" width="400" id="output_image1">
                            <img class="d-block rounded" height="300" width="400" id="output_image2">
                        </div> --}}


                        <!-- Action Button -->
                        <div class="mt-4 d-flex justify-content-end">
                            <div class="justify-content-between">
                                <a class="btn btn-secondary btn-lg" href="{{ URL::to('admin/manage/admins') }}" role="button" style="color: black">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                                <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                    <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                </a>
                                <button type="reset" class="btn btn-warning btn-lg">
                                    <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                    <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Tambah
                                </button>
                            </div>
                        </div>
                        <!-- Action Button -->

                    </form>

                </div>
                <!--/ Form Create Add Admin New -->

            </div>
            <!--/ Card Add Admin New -->
        </div>
    </div>
</div>

@endsection
