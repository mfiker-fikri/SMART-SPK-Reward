@extends('template.sdm.template')

@section('css_header')
    <style>
        @media (min-width: 992px) {
            .dashboardSDM2Info {
                display: flex;
                margin: 0 auto;
            }
        }
        @media (max-width: 991.98px) {
            .dashboardSDM2Info {
                display: flex;
                margin: 0 100px;
            }
        }
    </style>
@stop

@section('content')

<div class="container-xxl container-p-y">

    <div class="row mx-1">

        <div class="col-md-6 order-0">

            <div class="card mb-3" style="max-width: 740px;min-height: 340px;">
                <div class="d-flex flex-row">
                    <div class="d-flex">
                        <!-- Photo Profile -->
                        @if (Auth::guard('human_resources')->user()->photo_profile)
                        <img src="{{ asset( 'storage/sdm/headOfHumanResources/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}" class="img-fluid rounded-start mx-auto d-block" alt="human_resources-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @else
                        <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1" class="img-fluid rounded-start mx-auto d-block" alt="admin-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @endif
                        <!--/ Photo Profile -->
                    </div>
                    <div class="dashboardSDM2Info">
                        <div class="card-body d-flex flex-column justify-content-center align-self-center">
                            <h3 class="card-title text-center"><strong> {{ Auth::guard('human_resources')->user()->full_name }} </strong></h3>
                            <p class="card-text text-center"> Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha </p>
                            @if (Cache::has('humanResource-is-online-' . Auth::guard('human_resources')->user()->id))
                            <p class="card-text text-success text-center"><small class="text-muted">Online</small></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-6 col-md-5 order-1">

            <div class="row">

                <div class="col-lg-6 col-md-12 col-6 mb-4">

                    <div class="card" style="min-height: 200px;max-height: 200px;">
                        <div class="card-body">
                            <div class="d-flex flex-row align-items-xl-center align-self-xl-center" style="margin: 3rem 1rem;">
                                <i class="fa-solid fa-user-tie fa-5x me-3"></i>
                                <div class="d-flex flex-column align-self-center">
                                    <h3 class="card-title text-center"><strong> ## </strong></h4>
                                    <p class="card-text"> Admin </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-6 mb-4">

                    <div class="card" style="min-height: 200px;max-height: 200px;">
                        <div class="card-body">
                            <div class="d-flex flex-row align-items-xl-center align-self-xl-center" style="margin: 3rem 1rem;">
                                <i class="fa-solid fa-user-tie fa-5x me-3"></i>
                                <div class="d-flex flex-column align-self-center">
                                    <h3 class="card-title text-center"><strong> # </strong></h3>
                                    <p class="card-text"> Pegawai  </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-12 mb-4">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <i class="fa-solid fa-user-tie fa-5x me-3"></i>
                                <div class="d-flex flex-column align-self-center">
                                    <h3 class="card-title text-center"><strong> ## </strong></h3>
                                    <p class="card-text"> Pegawai  </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <div class="row mx-1">

        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3">Total Revenue</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
    </div>

</div>

@stop
