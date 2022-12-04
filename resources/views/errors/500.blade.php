@extends('template.error.template')

@section('title', '500')

@section('content')
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    {{-- <h1 class="mb-2 mx-2" style="margin-top: -30px">500 - Server Error</h1> --}}
    <h1 class="mb-2 mx-2">500 - Server Error</h1>
    <p class="mx-2">Oops! 😖 Something Went Wrong at Our End.</p>
    <p class="mb-4 mx-2">Dont Worry, It's Not You - It's Us, Sorry About That.</p>
    <a href="{{ URL::previous() }}" class="btn btn-primary">Go To Homepage</a>
    <div class="mt-3">
      <img
        src="{{ asset('css/error/int_css/img/illustrations/500.jpg') }}"
        alt="500"
        width="310"
        class="img-fluid"
        data-app-dark-img="illustrations/500.jpg"
        data-app-light-img="illustrations/500.jpg"
      />
    </div>
  </div>
</div>
@endsection
