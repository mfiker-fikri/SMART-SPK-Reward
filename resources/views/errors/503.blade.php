@extends('template.error.template')

@section('title', '503')

@section('content')
<div class="container-xxl container-p-y">
    <div class="misc-wrapper">
        <h1 class="mb-2 mx-2">Under Maintenance!</h1>
        <p class="mb-4 mx-2">Sorry for the inconvenience but we're performing some maintenance at the moment</p>
        {{-- <a href="{{ URL::previous() }}" class="btn btn-primary">Go To Homepage</a> --}}
        <div class="mt-4">
            <img
                src="{{ asset('css/error/int_css/img/illustrations/503_1.jpg') }}"
                {{-- src="{{ asset('css/error/ext_css/img/illustrations/girl-doing-yoga-light.png') }}"  --}}
                alt="girl-doing-yoga-light"
                width="600"
                height="600"
                class="img-fluid"
                data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                data-app-light-img="illustrations/girl-doing-yoga-light.png"
                />
        </div>
    </div>
</div>