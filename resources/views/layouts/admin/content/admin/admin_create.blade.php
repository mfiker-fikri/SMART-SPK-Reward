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
    <script type='text/javascript'>
    function preview_image(event) 
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
@stop

<!-- Content -->
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">
        
        <div class="col-xxl">

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
                                <a class="btn btn-secondary btn-lg" href="{{ URL::to('admin/manage/admins') }}" role="button">
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
                <!--/ Form Create Add Admin New -->

            </div>
            <!--/ Card Add Admin New -->
        </div>
    </div>
</div>

@endsection