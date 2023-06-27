@extends('template.error.template')

@section('title', '404')

@section('content')
  <div class="container-xxl container-p-y">
    <div class="misc-wrapper">
      <h2 class="mb-2 mx-2">404 - Page Not Found :(</h2>
      <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
      {{-- <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a> --}}
      {{-- <a onclick="window.location.reload();" class="btn btn-primary">Go Back</a> --}}
      <a onclick="javascript:history.go(-1)" class="btn btn-primary">Go Back</a>
      <div class="mt-3">
        <img
          src="{{ asset('css/error/ext_css/img/illustrations/page-misc-error-light.png') }}"
          alt="404"
          width="500"
          class="img-fluid"
          data-app-dark-img="illustrations/404.png"
          data-app-light-img="illustrations/404.png"
        />
      </div>
    </div>
  </div>
@endsection
