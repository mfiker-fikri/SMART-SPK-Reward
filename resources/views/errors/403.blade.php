@extends('template.error.template')

@section('title', '403')

@section('content')
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">403 - Access Denied / Forbidden</h2>
        <p class="mx-2">Oops! 😖 You Do Not Have Permission To View / Access On This Resource / Server.</p>
        <p class="mb-4 mx-2">If You Feel This Is A Mistake, Contact Your Admin.</p>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
        <div class="mt-3">
            <img
            src="{{ asset('css/error/int_css/img/illustrations/403.jpg') }}"
            alt="403"
            width="310"
            class="img-fluid"
            data-app-dark-img="illustrations/403.jpg"
            data-app-light-img="illustrations/403.jpg"
            />
        </div>
        </div>
    </div>
@endsection
