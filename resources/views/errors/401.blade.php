@extends('template.error.template')

@section('title', '401')

@section('content')
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">401 - Unauthorized</h2>
    <p class="mx-2">Oops! 😖 Your Authorized Failed.</p>
    <p class="mb-4 mx-2">Please Try Refreshing The Page and Fill In The Correct Login Details.</p>
    <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    <div class="mt-3">
      <img
        src="{{ asset('css/error/int_css/img/illustrations/401.jpg') }}"
        alt="401"
        width="500"
        class="img-fluid"
        data-app-dark-img="illustrations/401.jpg"
        data-app-light-img="illustrations/401.jpg"
      />
    </div>
  </div>
</div>
@endsection