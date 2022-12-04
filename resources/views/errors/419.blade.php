@extends('template.error.template')

@section('title', '419')

@section('content')

<div id="container-xxl container-p-y">
    <div class="misc-wrapper">
        <h2 class="mb-2 mx-2" style="margin-top: 30px">419 - Page Expired</h1>
        <p class="mx-2">Sorry! 😖 Your Session Has Expired</p>
        <p class="mb-4 mx-2">Please Refresh and Try Again </p>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Refresh The Page</a>
        <div class="mt-3">
            <img
            src="{{ asset('css/error/int_css/img/illustrations/419.jpg') }}"
            alt="419"
            width="310"
            class="img-fluid"
            data-app-dark-img="illustrations/419.png"
            data-app-light-img="illustrations/419.png"
            />
        </div>
    </div>
</div>

  {{-- <div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
				<h2>404 - The Page can't be found</h2>
			</div>
			<a href="#">Go TO Homepage</a>
		</div>
	</div> --}}

  {{-- <div class="container-xxl container-p-y">
    <div class="misc-wrapper">
      <h2 class="mb-2 mx-2">Page Not Found :(</h2>
      <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
      <a href="{{ URL::previous() }}" class="btn btn-primary">Back to home</a>
      <div class="mt-3">
        <img
          src="{{ asset('css/error/ext_css/img/illustrations/page-misc-error-light.png') }}"
          alt="page-misc-error-light"
          width="500"
          class="img-fluid"
          data-app-dark-img="illustrations/page-misc-error-dark.png"
          data-app-light-img="illustrations/page-misc-error-light.png"
        />
      </div>
    </div>
  </div> --}}
@endsection
