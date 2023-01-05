@extends('template.email.template')
@section('content')

<table class="table" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f2f3f8;">
    <tr>
        <td align="center">

            <!-- Header -->
            <table class="table" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" width="100%" cellpadding="0" cellspacing="0">

                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <span class="app-brand-logo demo">
                                <a href="{{ URL::to('/penilai') }}" style="display: inline-block; cursor: pointer;" onclick="return false">
                                    {{-- <img src="{{ $message->embed(public_path('assets/icon/KLN.png')) }}" alt="logo" width="180" height="180" />
                                    <img src="{{ asset('assets/icon/Logo.png') }}" alt="logo" width="180" height="180" /> --}}
                                    <img src="https://backpanel.kemlu.go.id/sites/pusat/PublishingImages/Tentang%20Kami/Logo%20Kemlu.png" alt="logo" width="320" height="250" />
                                </a>
                            </span>
                        </div>
                        <!--/ Logo -->


                        <!-- Markdown -->
                        <table align="center" width="670" height="400" cellpadding="0" cellspacing="0" style="background-color: white;margin: 25px 0;">
                            <tr>
                                <td align="center" width="100%" cellpadding="0" cellspacing="0">
                                    <h2 class="text-center text-uppercase"><strong> Forgot Your Password? </strong></h2>

                                    <table align="center" width="80%" cellpadding="0" cellspacing="0" style="margin-bottom: 2em;">
                                        <tr>
                                            <td align="center" width="100%" cellpadding="0" cellspacing="0">
                                                <p style="font-size: 14px;">{{ $greetings }}, {{ $nameTA->full_name }}</p>
                                                <p style="font-size: 14px;">
                                                    There was a request to change your password!

                                                    If you did not make this request then please ignore this email.

                                                    Otherwise,<b> please click the button </b> below to change your password: </p>

                                                <div class="my-5 my-3 my-3 d-flex flex-row justify-content-center" style="margin: 2em 0;">
                                                    <a class="button-primary" target="_blank" href="{{ URL::to('penilai/reset-password/'.$token) }}">Reset My Password</a>
                                                    {{-- <a href="{{ URL::to('admin/reset-password/'.$token) }}" class="btn btn-primary btn-lg" role="button">Reset My Password</a> --}}
                                                </div>

                                                <p style="font-size: 14px;">
                                                    Please note that this link will expire within 1 hours. After 1 hours,
                                                    you must submit a new password reset request.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>
                        <!-- Markdown -->

                        <table align="center" width="670" cellpadding="0" cellspacing="0" style="margin: 1em 0;">
                            <tr>
                                <td align="center">
                                    <p><b>Sistem Pendukung Keputusan (SPK) Pemberian Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi</b></p>
                                    <p>© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@endsection
