@extends('template.auth.login')
@section('content')
@include('sweetalert::alert')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{ URL::to('/') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/icon/KLN.png') }}" alt="User" width="100" height="100" />
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2 pb-3 text-center">Sistem Penunjang Keputusan Penerimaan Penghargaan Pegawai Aparatur Sipil Negara (ASN) Berprestasi</h4>
                    {{-- <p class="mb-4 text-center">Please sign-in to your account and start the adventure
                        <i class="fa-solid fa-circle-info fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                    </p> --}}

                    

                    <form id="formAuthentication" class="mb-3" action="{{ route('postLogin') }}" method="POST">

                        {{ csrf_field() }}
                        <!-- Username -->
                        <div class="mb-3 {{ $errors->has('username') || $errors->has('email') ? ' has-error' : '' }} ">
                            <label for="username-email" class="form-label">Email atau Username</label>
                            <input type="text" class="form-control" id="username-email" name="username" placeholder="Enter your username or email" 
                                autofocus required size="100" minlength="3" maxlength="100" />

                            <!-- Error Username -->
                            @if ($errors->has('username') || $errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <!--/ Error Username -->

                        </div>
                        <!--/ Username -->

                        <div class="mb-3 form-password-toggle {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                {{-- <a href="auth-forgot-password-basic.html">
                                    <small>Forgot Password?</small>
                                </a> --}}
                            </div>

                            <!-- Password -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" id="password" 
                                    name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            
                            <!-- Error Password -->
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <!--/ Error Password -->
                            
                        </div>
                        <!--/ Password -->

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>

                        <!-- Error Auth -->
                        @if(session('message'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <h6>   {{ session('message') }}      </h6>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @elseif(session('message-failed'))
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <h6>   {{ session('message-failed') }}      </h6> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        <!--/ Error Auth -->

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">
                                <i class="fa-brands fa-laravel"></i>Sign in
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

@endsection


