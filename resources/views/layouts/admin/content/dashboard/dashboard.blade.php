@extends('template.admin.template')

@section('css_header')
    <style>
        @media (min-width: 992px) {
            .dashboardAdminInfo {
                display: flex;
                margin: 0 auto;
            }
        }
        @media (max-width: 991.98px) {
            .dashboardAdminInfo {
                display: flex;
                margin: 0 100px;
            }
        }
    </style>
@stop

@section('js_header')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>
@stop

@section('js_footer')
    <!-- Datatables Status Admin -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: "{{ url('admin/dashboard/statusOnlineOffline') }}",
            columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'full_name', name: 'full_name', orderable: false, searchable: false},
                {data: 'username', name: 'username', orderable: false, searchable: false},
                {data: 'status', name: 'status'},
                {data: 'lastSeen', name: 'lastSeen'},
                // {data: 'status', name: 'status', orderable: false, searchable: false},
            ],
            pageLength: 5,
            // lengthChange: false,
            lengthMenu: [ 5 ],
            pagingType: "full_numbers",
            // order: [[ 2 , 'ASC']]
            order: [[ 2 , 'DESC']]
        });

        new $.fn.dataTable.FixedHeader( table );
    });
    </script>
    <!--/ Datatables Status Admin -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>


@stop

@section('content')

<div class="container-xxl container-p-y">

    <div class="row mx-1">

        <div class="col-md-6 order-0 mb-4">

            <div class="row">
                <div class="col">

                    <div class="card mb-3 visible shadow-lg" style="max-width: 740px;min-height: 240px;">
                        <div class="d-flex flex-row">
                            <div class="d-flex">
                                <!-- Photo Profile -->
                                @if (Auth::guard('admins')->user()->photo_profile)
                                <img src="{{ asset( 'storage/admin/photos/photoProfile/'. Auth::guard('admins')->user()->username. '/' . Auth::guard('admins')->user()->photo_profile) }}" class="img-fluid rounded-start mx-auto d-block" alt="admin-photo-profile" style="min-height: 300px;max-height: 300px;min-width: 230px;max-width: 230px;">
                                @else
                                <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1" class="img-fluid rounded-start mx-auto d-block" alt="admin-photo-profile" style="min-height: 300px;max-height: 300px;min-width: 230px;max-width: 230px;">
                                @endif
                                <!--/ Photo Profile -->
                            </div>
                            <div class="dashboardAdminInfo">
                                <div class="card-body d-flex flex-column justify-content-center align-self-center">
                                    <h3 class="card-title text-center"><strong> {{ Auth::guard('admins')->user()->full_name }} </strong></h3>
                                    <p class="card-text text-center"> Admin </p>
                                    @if (Cache::has('admin-is-online-' . Auth::guard('admins')->user()->id))
                                    <p class="card-text text-success text-center"><small class="text-muted text-success">Online</small></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col">

                    <div class="card visible shadow-lg" style="max-width: 740px;min-height: 340px;">
                        {{-- <div class="d-flex flex-row"> --}}
                            {{-- <div class="row row-bordered g-0"> --}}
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Status Online Admin</h5>
                                </div>
                                <div class="card-body mx-3 my-3">
                                    <table class="my-3 my-3 table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama Panjang</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Last Seen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            {{-- </div> --}}
                        {{-- </div> --}}
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-md-5 order-1 mb-4">

            <div class="row">

                <div class="col-lg-6 col-md-12 col-6 mb-4">

                    <div class="card visible shadow-lg" style="min-height: 200px;max-height: 200px;">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-center align-items-xl-center align-self-xl-center" style="margin: 2.5rem 1rem;">
                                <i class="fa-solid fa-user-tie fa-5x me-3"></i>
                                <div class="d-flex flex-column align-self-center">
                                    <h3 class="card-title text-center"><strong> {{ $sumAdmin }} </strong></h4>
                                    <p class="card-text"> Admin </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-6 mb-4">

                    <div class="card visible shadow-lg" style="min-height: 200px;max-height: 200px;">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-center align-items-xl-center align-self-xl-center" style="margin: 2.5rem 1rem;">
                                <i class="fa-solid fa-user-tie fa-5x me-3"></i>
                                <div class="d-flex flex-column align-self-center">
                                    <h3 class="card-title text-center"><strong> {{ $sumEmployee }} </strong></h3>
                                    <p class="card-text"> Pegawai </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card visible shadow-lg" style="min-height: 27rem;max-height: 27rem;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center my-3">
                                <i class="fa-solid fa-user-tie fa-5x me-3 my-3"></i>
                                <div class="d-flex flex-column align-self-center my-3">
                                    {{-- <h3 class="card-title text-center"> Divisi Sumber Daya Manusia </h3> --}}
                                    {{-- <h3 class="card-title text-center"><strong> {{ $sumSDM }} </strong></h3> --}}
                                    {{-- <p class="card-text text-wrap"> Divisi Sumber Daya Manusia </p> --}}
                                    <p class="card-text text-wrap text-center">Kepala Biro Sumber Daya Manusia : <h3 class="text-center">{{ $sumSDM1 }}</h3> </p>
                                    <p class="card-text text-wrap text-center">Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha : <h3 class="text-center">{{ $sumSDM2 }}</h3>  </p>
                                    <p class="card-text text-wrap text-center">Kepala Kepala Subbagian Penghargaan, Disiplin, dan Pensiun : <h3 class="text-center">{{ $sumSDM3 }}</h3> </p>
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

