@extends('template.sdm.template')

<!-- Header CSS -->
@section('css_header')
    <style>
    .swal2-container {
        z-index: 2000;
    }


    @media (min-width: 992px) {
        .mercado-countdown {
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
            align-content: center;
            color: #333;
            font-size: 65px;
            line-height: 100%;
            text-align: center;
            min-height: 45vh;
            max-height: 45vh;
        }

        .mercado-countdown span {
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .mercadoCountdown1 {
            padding: 0;
            margin: 1em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
            align-content: center;
            color: #333;
            font-size: 24px;
            line-height: 100%;
            text-align: center;
            min-height: 7vh;
            max-height: 7vh;
        }

        .mercadoCountdown1 span {
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .dateCountDown {
            padding: auto;
            margin: auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            font-size: 55px;
            line-height: 100%;
            text-align: center;
            min-height: 35vh;
            max-height: 35vh;
        }

        .dateCountDown span{
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .dateCountDown1 {
            padding: auto;
            margin: auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            font-size: 25px;
            line-height: 100%;
            text-align: center;
            min-height: 15vh;
            max-height: 15vh;
        }

        .dateCountDown1 span{
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .timeCountDown {
            padding: auto;
            margin: auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            font-size: 55px;
            line-height: 100%;
            text-align: center;
            min-height: 35vh;
            max-height: 35vh;
        }

        .timeCountDown span{
            padding: auto;
            margin: auto;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .timeCountDown1 {
            padding: auto;
            margin: auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            font-size: 25px;
            line-height: 100%;
            text-align: center;
            min-height: 15vh;
            max-height: 15vh;
        }

        .timeCountDown1 span{
            padding: auto;
            margin: auto 15px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .titleCountDown{
            padding: 0;
            margin: 2em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            text-align: center;
        }

        .titleCountDownNonActive{
            padding: 0;
            margin: 2em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            text-align: center;
            min-height: 8em;
            max-height: 8em;
        }

        .titleCountDownExpiredNonActive{
            margin: 5px 0;
            padding: 5px 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            text-align: center;
            font-size: 24px;
            line-height: 100%;
            min-height: 5em;
            max-height: 5em;
        }
    }

    @media (max-width: 991.98px) {
        .mercado-countdown {
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            color: #333;
            font-size: 65px;
            line-height: 100%;
            text-align: center;
            min-height: 55vh;
            max-height: 55vh;
        }

        .mercado-countdown span {
            padding: 10px;
            margin: 10px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .mercadoCountdown1 {
            padding: 0;
            margin: 0.5em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
            align-content: center;
            color: #333;
            font-size: 30px;
            line-height: 100%;
            text-align: center;
            /* min-height: 5vh;
            max-height: 5vh; */
        }

        .mercadoCountdown1 span {
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .dateCountDown {
            padding: auto;
            margin: 10px auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            font-size: 55px;
            line-height: 100%;
            text-align: center;
            min-height: 35vh;
            max-height: 35vh;
        }

        .dateCountDown span{
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .dateCountDown1 {
            padding: auto;
            margin: 10px auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            font-size: 25px;
            line-height: 100%;
            text-align: center;
            min-height: 15vh;
            max-height: 15vh;
        }

        .dateCountDown1 span{
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .timeCountDown {
            padding: auto;
            margin: 10px auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            font-size: 55px;
            line-height: 100%;
            text-align: center;
            min-height: 35vh;
            max-height: 35vh;
        }

        .timeCountDown span{
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .timeCountDown1 {
            padding: auto;
            margin: 10px auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            font-size: 25px;
            line-height: 100%;
            text-align: center;
            min-height: 15vh;
            max-height: 15vh;
        }

        .timeCountDown1 span{
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }

        .titleCountDown{
            padding: 0;
            margin: 2em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            text-align: center;
        }

        .titleCountDownNonActive{
            padding: 0;
            margin: 2em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            text-align: center;
            min-height: 8em;
            max-height: 8em;
        }
    }

    </style>
@stop
<!--/ Header CSS -->

@section('js_footer')

    <!-- Datatables Kategori -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            // paging: false,
            // searching: false,
            ajax: "{{ url('sdm/kepala-biro-SDM/signature/innovation/list') }}",
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {   data: 'fullName', name: 'fullName', orderable: false, searchable: false},
                {   data: 'year', name: 'year', orderable: false, searchable: false},
                {   data: 'score_final_result', name: 'score_final_result', orderable: false, searchable: false},
                {   data: 'description', name: 'description', orderable: false, searchable: false},
                {   data: 'score_final_result_description', name: 'score_final_result_description', orderable: false, searchable: false},
                {   data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader( table );

        if (table) {
            setInterval( function () {
                table.ajax.reload(null, false);
            }, 10000 );
        }
    });
    </script>
    <!--/ Datatables Kategori -->

    <!-- Delete Form Inovation Id -->
    <script type="text/javascript">
    $(document).on('click', '#verifySignatureRewardInovationId', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        // console.log(id);
        Swal.fire({
            title: 'Apakah kamu ingin tanda tangan penghargaan ini?',
            icon: 'warning',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        Accept: "application/json"
                    },
                    method: 'post',
                    url: "{{ url('sdm/kepala-biro-SDM/signature/innovation') }}" + '/' + id + '/post',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Tanda Tangan Berhasil!',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                    error: function(event,xhr,options,exc){
                        if (event.status == 401) {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Your Authorized Failed!',
                                confirmButtonText: 'Ok',
                            })
                        }else if (event.status == 500) {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Something Went Wrong!',
                                confirmButtonText: 'Ok',
                            })
                        } else {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Something went wrong!',
                                confirmButtonText: 'Ok',
                            })
                        }
                    }
                });
            } else {
                Swal.fire({
                    title: 'Gagal ',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })
            }
        });
    });
    </script>
    <!--/ Delete Form Inovation Id -->
@stop

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Kategori Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tanda Tangan Penghargaan Inovasi</h5>
                </div>
                <!--/ Form Kategori Title -->

                @if ($timer == null)

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Tanda Tangan Inovasi Ditutup</span>
                            </h1>
                        </div>
                    </div>

                @elseif ($timer != null)

                    @if (
                        (
                            ($timer->status_open_signature_human_resource_1 == 0 && $timer->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString()  ) && ($timer->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1 )
                        )
                        ||
                        (
                            ($timer->status_open_signature_human_resource_1 == 0 && $timer->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timer->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1 )
                        )
                    )
                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Tanda Tangan Inovasi</span>
                            </h1>
                        </div>
                    </div>

                    @elseif (
                        (
                                    ($timer->status_open_signature_human_resource_1 == 1
                                && ($timer->date_time_open_signature_human_resource_1 > \Carbon\Carbon::now()->toDateTimeString()  || $timer->date_time_open_signature_human_resource_1 == \Carbon\Carbon::now()->toDateTimeString() ))
                            &&  ($timer->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1 )
                        )
                        ||
                        (
                                    ($timer->status_open_signature_human_resource_1 == 1
                                && ($timer->date_time_open_signature_human_resource_1 > \Carbon\Carbon::now()->toDateTimeString()  || $timer->date_time_open_signature_human_resource_1 == \Carbon\Carbon::now()->toDateTimeString()) )
                            &&  ($timer->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1 )
                        )
                    )
                    <div class="container-fluid ">
                        <div class="openTimerCountDown">
                            <div class="titleCountDown">
                                <h1>Pembukaan Tanda Tangan Inovasi</h1>
                            </div>
                            <div class="dateCountDown">
                                <span>Hari <b>{{ \Carbon\Carbon::create($timer->date_time_open_signature_human_resource_1)->isoFormat('dddd') }}</b></span>
                                <span>Tanggal <b>{{ \Carbon\Carbon::create($timer->date_time_open_signature_human_resource_1)->isoFormat('D') }}</b></span>
                                <span>Bulan <b>{{ \Carbon\Carbon::create($timer->date_time_open_signature_human_resource_1)->isoFormat('MMMM') }}</b></span>
                                <span>Tahun <b>{{ \Carbon\Carbon::create($timer->date_time_open_signature_human_resource_1)->isoFormat('Y') }}</b></span>
                            </div>
                            <div class="timeCountDown">
                                <span>Jam <b>{{ \Carbon\Carbon::create($timer->date_time_open_signature_human_resource_1)->isoFormat('hh') }}</b></span>
                                <span>Menit <b>{{ \Carbon\Carbon::create($timer->date_time_open_signature_human_resource_1)->isoFormat('mm') }}</b></span>
                                <span>Waktu <b>{{ \Carbon\Carbon::create($timer->date_time_open_signature_human_resource_1)->isoFormat('a') }}</b></span>
                            </div>
                            <div class="titleCountDown">
                                <h1>Coming Soon</h1>
                            </div>
                            <div class="wrap-countdown mercado-countdown" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_open_signature_human_resource_1)->toDateTimeString() }}">
                            </div>
                        </div>
                    </div>

                    @elseif (
                        (
                                (
                                        ($timer->status_open_signature_human_resource_1 == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_signature_human_resource_1 || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_signature_human_resource_1) )
                                    &&  ($timer->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1 )
                                )
                            ||  (
                                        ($timer->status_open_signature_human_resource_1 == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_signature_human_resource_1 || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_signature_human_resource_1))
                                    &&  ($timer->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1)
                                )
                        )
                        ||
                        (
                                (
                                        ($timer->status_open_signature_human_resource_1 == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_signature_human_resource_1 || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_signature_human_resource_1))
                                    &&  ($timer->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1)
                                )
                            || (
                                        ($timer->status_open_signature_human_resource_1 == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_signature_human_resource_1 || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_signature_human_resource_1))
                                    &&  ($timer->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1)
                                )
                        )
                    )

                    <div class="container-fluid my-3">

                        <!-- Button Create Form Inovation List -->
                        <div class="py-3 d-flex flex-column justify-content-start">
                            @if (
                                (
                                    ($timer->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_signature_human_resource_1) && ($timer->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1) )
                                ||  ( ($timer->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_signature_human_resource_1) && ($timer->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_signature_human_resource_1) )
                            )
                                <div class="mx-1 mx-1 mx-1">
                                    <div class="titleCountDownExpiredNonActive">Harap Tunggu Pemberitahuan Waktu Penutupan Tanda Tangan Inovasi</div>
                                </div>
                            @else
                                <div class="mx-1 mx-1 mx-1">
                                    <h3 class="text-center text-dark">Penutupan Tanda Tangan Inovasi</h3>
                                </div>
                                <div class="mx-1 mx-1 mx-1">
                                    <div class="dateCountDown1">
                                        <span>Hari <b>{{ \Carbon\Carbon::create($timer->date_time_expired_signature_human_resource_1)->isoFormat('dddd') }}</b></span>
                                        <span>Tanggal <b>{{ \Carbon\Carbon::create($timer->date_time_expired_signature_human_resource_1)->isoFormat('D') }}</b></span>
                                        <span>Bulan <b>{{ \Carbon\Carbon::create($timer->date_time_expired_signature_human_resource_1)->isoFormat('MMMM') }}</b></span>
                                        <span>Tahun <b>{{ \Carbon\Carbon::create($timer->date_time_expired_signature_human_resource_1)->isoFormat('Y') }}</b></span>
                                    </div>
                                    <div class="timeCountDown1">
                                        <span>Jam <b>{{ \Carbon\Carbon::create($timer->date_time_expired_signature_human_resource_1)->isoFormat('hh') }}</b></span>
                                        <span>Menit <b>{{ \Carbon\Carbon::create($timer->date_time_expired_signature_human_resource_1)->isoFormat('mm') }}</b></span>
                                        <span>Waktu <b>{{ \Carbon\Carbon::create($timer->date_time_expired_signature_human_resource_1)->isoFormat('a') }}</b></span>
                                    </div>
                                    <div class="titleCountDown">
                                        <h1>Closing Soon</h1>
                                    </div>
                                </div>
                                <div class="mx-1 mx-1 mx-1">
                                    <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_signature_human_resource_1)->toDateTimeString()  }}"></div>
                                </div>
                            @endif

                        </div>
                        <!--/ Button Create Form Inovation List -->

                        <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0"  width="100%" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>

                    @elseif (
                        (
                                ( ($timer->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_signature_human_resource_1) && ($timer->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_signature_human_resource_1) )
                            ||  ( ($timer->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_signature_human_resource_1) && ($timer->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_signature_human_resource_1) )
                        )
                        ||
                        (
                                ( ($timer->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_signature_human_resource_1) && ($timer->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_signature_human_resource_1) )
                            || ( ($timer->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_signature_human_resource_1) && ($timer->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_signature_human_resource_1) )
                        )
                    )

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Tanda Tangan Inovasi Telah Ditutup</span>
                            </h1>
                        </div>
                    </div>

                    @endif

                @endif

            </div>

        </div>
    </div>
</div>
@endsection
