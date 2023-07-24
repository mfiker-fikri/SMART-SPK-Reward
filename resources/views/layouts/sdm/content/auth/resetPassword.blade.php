@extends('template.auth.template')

@section('js_footer')
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

    <!-- Timer Countdown -->
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $(".expiredDate").each( function(){
                var _this = $(this),
                _expire = _this.val();
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    if( event.offset.totalMinutes == 0 && flag2 ) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Reset Password Ditutup Dalam' + ' ' + 1 + 'Menit',
                            icon: 'warning',
                            html: 'Pop up will close in <b></b> milliseconds.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            timer: 5500,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                            // didClose: () => {
                            //     clearInterval(timerInterval)
                            // },
                        });
                    }
                    $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                })
                .on('finish.countdown', function(){
                    Swal.fire({
                        title: 'Reset Password Ditutup',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 8000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            window.location = "/sdm/forgot-password";
                        },
                    });
                });

            });

        });
    </script>
@stop

@section('content')

<div style="width: 1500px; height: 800px; position: fixed; left: 0; right: 0; background-image: url({{ asset('assets/icon/KLN.png') }}); background-blend-mode: darken; background-repeat: space; background-clip: content-box ; background-position: center; background-attachment: fixed; background-size: auto; background; z-index: -1; display: block; filter: blur(2px);"></div>
<div class="container-xxl">
    <div class="d-flex justify-content-center align-items-center container-fluid" style="max-width: 500px; min-width: 200px; min-height: 130vh; max-height: 130vh;">
        <div class="authentication-inner">

            <!-- Reset Password -->
            <div class="card">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{ URL::to('/sdm/reset-password*') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/icon/KLN.png') }}" alt="logo" width="100" height="100" />
                            </span>
                        </a>
                    </div>
                    <!--/ Logo -->

                    <!-- Title -->
                    <h4 class="my-2 py-3 text-center">Sistem Pendukung Keputusan Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi</h4>
                    <span class="text-center">
                        <h5>Reset Password</h5>
                    </span>
                    <p class="text-center">Masukkan email beserta password baru anda.</p>
                    <!--/ Title -->

                    <!-- Reset Password -->
                    <form id="formSDMResetPassword" class="mb-3 mx-3" method="POST" action="{{ route('sdm.postResetPassword.SDM') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" class="expiredDate" value="{{ \Carbon\Carbon::parse($check->created_at)->addMinutes(5)->toDateTimeString()  }}">

                        <!-- Email -->
                        <div class="mb-3 {{ $errors->has('email') ? 'is-invalid' : '' }} ">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group input-group-merge {{ $errors->has('password') ? 'is-invalid' : '' }} ">
                                <span id="email" class="input-group-text">
                                    <i class="fa-regular fa-envelope fa-lg"></i>
                                </span>
                                <input type="email" class="form-control px-lg-1 px-2 {{ $errors->has('email') ? 'is-invalid' : '' }} " id="email"
                                    name="email" placeholder="Masukkan Email Anda" value="{{ old('email', $check->email) }}"
                                    autofocus autocomplete required  />
                            </div>

                            <div class="d-flex flex-column">
                                <!-- Text Small -->
                                <small class="form-text text-muted text-break text-monospace text-sm-left">Email Menggunakan Simbol @ serta .com/.co.id/ dll</small>
                                <!-- Error Email -->
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error Email -->
                            </div>

                        </div>
                        <!--/ Email -->

                        <!-- New Password -->
                        <div class="mb-3 {{ $errors->has('password') ? 'is-invalid' : '' }} ">
                            <label for="password" class="form-label">Password Baru</label>
                            <div class="input-group input-group-merge {{ $errors->has('password') ? 'is-invalid' : '' }} ">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" class="form-control px-lg-1 px-2 {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                    name="password" placeholder="Masukkan Password Baru Anda"
                                    autofocus autocomplete required />
                                <span class="input-group-text" id="passwordEye" style="cursor: pointer;">
                                    <i class="fa-solid fa-eye-slash" id="eyePassword"></i>
                                </span>
                            </div>

                            <div class="d-flex flex-column">
                                <!-- Text Small -->
                                <small class="form-text text-muted text-break text-monospace text-sm-left">Password Baru Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</small>
                                <!--/ Text Small -->

                                <!-- Error New Password -->
                                @if ( $errors->has('password') )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error New Password -->
                            </div>
                        </div>
                        <!--/ Password Baru -->

                        <!-- Password Confirm -->
                        <div class="mb-3 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <div class="input-group input-group-merge {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" class="form-control px-lg-1 px-2 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation"
                                    name="password_confirmation" placeholder="Masukkan Konfirmasi Password Baru Anda"
                                    autofocus autocomplete required aria-invalid="true" aria-describedby="confirmasi new password" data-val="true"
                                    value=""/>
                                <span class="input-group-text" id="passwordConfirmationEye" style="cursor: pointer;">
                                    <i class="fa-solid fa-eye-slash" id="eyePasswordConfirmation"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <!-- Text Small -->
                                <small class="form-text text-muted text-break text-monospace text-sm-left">Konfirmasi Password Baru Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</small>
                                <!--/ Text Small -->

                                <!-- Error Password Confirm -->
                                @if ( $errors->has('password_confirmation') )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error Password Confirm -->
                            </div>
                        </div>
                        <!--/ End Password Confirm -->

                        <!-- Error and Success Reset Password -->
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
                        <!--/ Error and Success Reset Password -->

                        <!-- Button Confirm -->
                        <div class="mt-4 d-flex flex-row justify-content-center">
                            <div class="mx-1">
                                <a class="btn btn-warning btn-lg" style="color: black" onclick="window.location.reload();" role="button">
                                    <i class="fa-solid fa-rotate mx-auto me-1"></i>Reload
                                </a>
                            </div>
                            <div class="mx-1">
                                <button type="reset" class="btn btn-warning btn-lg">
                                    <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                </button>
                            </div>
                            <div class="mx-1">
                                <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                    <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Update
                                </button>
                            </div>
                        </div>
                        <!--/ Button Confirm -->

                    </form>
                    <!--/ Reset Password -->

                </div>
            </div>
            <!--/ Reset Password -->

        </div>
    </div>
</div>

@endsection
