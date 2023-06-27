@extends('template.auth.template')
@section('content')

<div style="width: 1500px; height: 800px; position: fixed; left: 0; right: 0; background-image: url({{ asset('assets/icon/KLN.png') }}); background-blend-mode: darken; background-repeat: space; background-clip: content-box ; background-position: center; background-attachment: fixed; background-size: auto; background; z-index: -1; display: block; filter: blur(2px);"></div>
<div class="container-xxl">
    <div class="d-flex justify-content-center align-items-center container-fluid" style="max-width: 500px; min-width: 200px; min-height: 100vh; max-height: 100vh;">
        <div class="authentication-inner">

            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{ URL::to('/ksk/forgot-password') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/icon/KLN.png') }}" alt="logo" width="100" height="100" />
                            </span>
                        </a>
                    </div>
                    <!--/ Logo -->

                    <!-- Title -->
                    <h4 class="my-2 py-3 text-center">Sistem Pendukung Keputusan Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi</h4>
                    <span class="mb-4 text-center">
                        <h5>Lupa Password</h5>
                    </span>
                    <p class="mx-4 mb-4 text-center">Masukkan email Anda dan kami akan mengirimkan intruksi untuk me-reset password Anda.</p>
                    <!--/ Title -->

                    <!-- Form Forgot Password -->
                    <form id="formAdminForgotPassword" class="mb-3 mx-3" method="POST" action="{{ route('hwu.postForgetPassword.HWU') }}">
                        {{ csrf_field() }}

                        <!-- Email -->
                        <div class="mb-3 {{ $errors->has('email') ? 'is-invalid' : '' }} ">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} " id="email"
                                name="email" placeholder="Masukkan email"
                                autofocus autocomplete required  />

                            <!-- Error Email -->
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <!--/ Error Email -->

                        </div>
                        <!--/ Email -->

                        <!-- Error and Success Send Email -->
                        @if(session('message-success-reset'))
                        <div class="d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            <div class="d-flex flex-md-row">
                                <p>
                                    <strong><b>   {{ session('message-success-reset') }} </b></strong>
                                </p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                        @elseif(session('message-failed-reset'))
                        <div class="d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="d-flex flex-md-row">
                                <p>
                                    <strong><b>   {{ session('message-failed-reset') }}  </b></strong>
                                </p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        </div>
                        @endif
                        <!--/ Error Send Email -->

                        <!-- Send Email Link -->
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100 h-100" type="submit">
                                <div class="d-inline-flex flex-row justify-content-center">
                                    <div class="d-flex align-items-center mx-2">
                                        <i class="fa-regular fa-envelope fa-lg"></i>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        Kirim Link Reset Password
                                    </div>
                                </div>
                            </button>
                        </div>
                        <!--/ Send Email Link -->

                    </form>
                    <!--/ Form Forgot Password -->

                    <!-- Back To Login -->
                    <div class="mb-3 text-center">
                        <a class="btn btn-primary shadow-none d-grid w-15 h-15 d-inline-flex align-items-center justify-content-center" href="{{ URL::to('/ksk') }}" role="button" style="background-color: transparent !important; border-color: transparent !important">
                            <div class="d-inline-flex flex-row align-items-center justify-content-center">
                                <div class="d-flex align-items-center mx-2">
                                    <i class="fa-solid fa-arrow-left fa-lg" style="color: black;"></i>
                                </div>
                                <div class="d-flex align-items-center" style="color: black;">
                                    Kembali Ke Halaman Login
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--/ Back To Login -->

                </div>
            </div>
            <!--/ Forgot Password -->

        </div>
    </div>
</div>

@endsection
