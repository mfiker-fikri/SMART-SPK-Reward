<!DOCTYPE html>

<html lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
    <head>
        <!-- Meta Tag -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,
            initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @if ( request()->is('admin') )
            <!-- Admin -->
            <meta name="title" content="Admin - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Admin - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( request()->is('admin/forgot-password') )
            <!-- Admin -->
            <meta name="title" content="Admin - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Admin - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( request()->is('admin/reset-password*') )
            <!-- Admin -->
            <meta name="title" content="Admin - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Admin - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

        @elseif ( (request()->is('sdm')) ? 'active' : '' )
            <!-- SDM -->
            <meta name="title" content="SDM - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="SDM - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( (request()->is('sdm/forgot-password')) ? 'active' : '' )
            <!-- SDM -->
            <meta name="title" content="SDM - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="SDM - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( (request()->is('sdm/reset-password*')) ? 'active' : '' )
            <!-- SDM -->
            <meta name="title" content="SDM - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="SDM - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

        @elseif ( (request()->is('penilai')) ? 'active' : '' )
            <!-- Team Assessment -->
            <meta name="title" content="Penilai - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Penilai - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( (request()->is('penilai/forgot-password')) ? 'active' : '' )
            <!-- Team Assessment -->
            <meta name="title" content="Penilai - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Penilai - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( (request()->is('penilai/reset-password*')) ? 'active' : '' )
            <!-- Team Assessment -->
            <meta name="title" content="Penilai - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Penilai - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

        @elseif ( (request()->is('ksk')) ? 'active' : '' )
            <!-- HWU -->
            <meta name="title" content="Kepala Satuan Kerja - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Kepala Satuan Kerja - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( (request()->is('ksk/forgot-password')) ? 'active' : '' )
            <!-- HWU -->
            <meta name="title" content="Kepala Satuan Kerja - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Kepala Satuan Kerja - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( (request()->is('ksk/reset-password*')) ? 'active' : '' )
            <!-- HWU -->
            <meta name="title" content="Kepala Satuan Kerja - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Kepala Satuan Kerja - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">

        @elseif ( (request()->is('/')) ? 'active' : '' )
            <!-- Pegawai -->
            <meta name="title" content="Pegawai - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Pegawai - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( request()->is('forgot-password') )
            <!-- Pegawai -->
            <meta name="title" content="Pegawai - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Pegawai - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @elseif ( request()->is('reset-password*') )
            <!-- Pegawai -->
            <meta name="title" content="Pegawai - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
            <meta name="description" content="Pegawai - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia">
        @endif
        <!--/ Meta Tag -->

        <!-- Title -->
            <!-- Admin -->
        @if ( request()->is('admin') )
            <!-- Admin -->
            <title> Admin - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( request()->is('admin/forgot-password') )
            <!-- Admin -->
            <title> Admin - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( request()->is('admin/reset-password*') )
            <!-- Admin -->
            <title> Admin - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

        @elseif ( request()->is('sdm') )
            <!-- SDM -->
            <title> SDM - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( request()->is('sdm/forgot-password') )
            <!-- SDM -->
            <title> SDM - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( request()->is('sdm/reset-password*') )
            <!-- SDM -->
            <title> SDM - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

        @elseif ( request()->is('penilai') )
            <!-- Team Assessment -->
            <title> Penilai - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( request()->is('penilai/forgot-password') )
            <!-- Team Assessment -->
            <title> Penilai - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( request()->is('penilai/reset-password*') )
            <!-- Team Assessment -->
            <title> Penilai - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

        @elseif ( request()->is('ksk') )
            <!-- HWU -->
            <title> Kepala Satuan Kerja - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( request()->is('ksk/forgot-password') )
            <!-- HWU -->
            <title> Kepala Satuan Kerja - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( request()->is('ksk/reset-password*') )
            <!-- HWU -->
            <title> Kepala Satuan Kerja - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>

        @elseif ( (request()->is('/')) ? 'active' : '' )
            <!-- Pegawai -->
            <title> Pegawai - Login | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( (request()->is('forgot-password')) ? 'active' : '' )
            <!-- Pegawai -->
            <title> Pegawai - Forgot Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @elseif ( (request()->is('reset-password*')) ? 'active' : '' )
            <!-- Pegawai -->
            <title> Pegawai - Reset Password | Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi | Kementerian Luar Negeri Republik Indonesia </title>
        @else
            <title>No</title>
        @endif
        <!-- /Title -->

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{ asset('css/login/ext_css/fonts/boxicons.css') }}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('css/login/ext_css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('css/login/ext_css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('css/login/ext_css/demo.css') }}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('css/login/ext_css/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('css/login/ext_css/pages/page-auth.css') }}" />
        <!-- Helpers -->
        <script src="{{ asset('js/login/ext_js/js/helpers.js') }}"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('js/login/ext_js/js/config.js') }}"></script>

        <!-- Add Ext Plugin -->
        <!-- Bootstrap 5 dan 4 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}

        <!-- Icon Font Awesome -->
        <script src="https://kit.fontawesome.com/8beb7150bc.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/brands.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/regular.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/regular.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/solid.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/svg-with-js.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/v4-font-face.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/v4-shims.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/v5-font-face.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- Sweet Alert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>

        <!-- Sweet Alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        {{-- <link link rel="stylesheet" href="{{ asset('css/admin/int_css/login.css') }}" /> --}}

        <!-- Google Recaptcha-->
        {{-- {!! ReCaptcha::htmlScriptTagJsApi() !!} --}}
        {{-- <script type="text/javascript">
            function callbackThen(response){
                // read HTTP status
                console.log(response.status);

                // read Promise object
                response.json().then(function(data){
                    console.log(data);
                    if(data.success && data.score > 0.5) {
                        console.log('Valid')
                    } else {
                        document.getElementById('formAdminLogin').addEventListener('submit', function(event) {
                            event.preventDefault();
                            alert('Success');
                        })
                    }
                });
            }
            function callbackCatch(error){
                console.error('Error:', error)
            }
        </script> --}}
        {!! htmlScriptTagJsApi([
            // 'action' => 'homepage',
            // 'callback_then' => 'callbackThen',
            // 'callback_catch' => 'callbackCatch'
        ]) !!}
        <!--/ Google Recaptcha -->


        <style>
            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
            }
            .preloader .loading {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                font: 14px arial;
            }

            input::-ms-reveal,
            input::-ms-clear {
                display: none;
            }
        </style>

        <!-- -->
        @stack('css_header')
        @yield('css_header')

        <!--/ Add Ext Plugin -->
    </head>

    <body>
        <div class="preloader">
            <div class="loading">
                <img src="{{ asset('css/login/ext_css/GIF/Hourglass.gif') }}" width="80">
                <p>Harap Tunggu</p>
            </div>
        </div>

        <!-- Content -->
        @yield('content')
        @include('sweetalert::alert')
        <!--/ Content -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('js/login/ext_js/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('js/login/ext_js/libs/popper/popper.js') }}"></script>
        {{-- <script src="{{ asset('js/login/ext_js/js/bootstrap.js') }}"></script> --}}
        <script src="{{ asset('js/login/ext_js/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('js/login/ext_js/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->

        <!-- Main JS -->
        <script src="{{ asset('js/login/ext_js/js/main.js') }}"></script>

        <!-- Page JS -->

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <!-- Add Ext Plugin -->
        <!-- Bootstrap 5 dan 4 -->
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}

        <!-- Option 2: Separate Popper and Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

        <!-- Icon Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/brands.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/fontawesome.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/regular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/solid.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/brands.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/regular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/solid.min.js"></script>
        <!--/ Icon Font Awesome -->

        <!-- -->
        @stack('js_footer')
        @yield('js_footer')

        <!-- Loader -->
        <script>
            $(document).ready(function(){
                $(".preloader").delay(5000).fadeOut();
            })
        </script>
        <!--/ Loader -->

        <!-- Login Admin -->
        <!--/ Login Admin -->

        <!-- -->
        <script type="text/javascript">
            $(document).ready(function () {
                //Disable cut copy paste
                $(document).bind('cut copy paste', function (e) {
                    e.preventDefault();
                });

                //Disable mouse right click
                // $(document).on("contextmenu",function(e){
                //     return false;
                // });
            });
        </script>
        <!--/ -->

    </body>
</html>
