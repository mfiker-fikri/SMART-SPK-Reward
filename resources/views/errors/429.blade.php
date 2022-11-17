@extends('template.error.template')

@section('title', '429')

@section('content')
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">429 - Too Many Requests</h2>
        <p class="mx-2">Oops! 😖 You Have Sent Too Many Requests To Us.</p>
        <p class="mb-4 mx-2">Please Try Again Later.</p>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Go To Homepage</a>
        <div class="mt-3">
            <img
            src="{{ asset('css/error/int_css/img/illustrations/429.jpg') }}"
            alt="429"
            width="350"
            class="img-fluid"
            data-app-dark-img="illustrations/429.jpg"
            data-app-light-img="illustrations/429.jpg"
            />
        </div>
        </div>
    </div>
@endsection
