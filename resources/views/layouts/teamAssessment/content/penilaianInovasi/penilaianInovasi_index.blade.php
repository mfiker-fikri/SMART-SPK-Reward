@extends('template.teamAssessment.template')

<!-- Header CSS -->
@section('css_header')
    <style>
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
            margin: 0;
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
            min-height: 6.5vh;
            max-height: 6.5vh;
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

<!-- Footer Js -->
@section('js_footer')
    <!-- Datatables Form Inovasi -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            paging: false,
            lengthMenu: [5, 10, 25, 50, 100, 200, 500],
            dom: 'Bfrtip',
            buttons: [
                "pageLength",
            ],
            ajax: {
                url: "{{ url('penilai/appraisment/inovation/list') }}",
                // headers: {
                //     'Authorization':'Basic xxxxxxxxxxxxx',
                //     'X-CSRF-TOKEN':'xxxxxxxxxxxxxxxxxxxx',
                //     'Content-Type':'application/json'
                // },
                method: "GET",
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                // {data: 'id', name: 'id'},
                {data: 'fullName', name: 'fullName'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader( table );

        setInterval( function () {
            table.ajax.reload(null, false);
        }, 10000 );
    });
    </script>
    <!--/ Datatables Form Inovasi -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Penilaian Inovasi Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Kelola Data Penilaian Inovasi</h5>
                </div>
                <!--/ Form Penilaian Inovasi Title -->

                @if ($timer == null)

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Form Penilaian Inovasi Ditutup</span>
                            </h1>
                        </div>
                    </div>

                @elseif ($timer != null)

                    @if (
                        (
                            ($timer->status_open == 0 && $timer->date_time_open_form_inovation >= \Carbon\Carbon::now()->toDateTimeString()  ) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                        )
                        ||
                        (
                            ($timer->status_open == 0 && $timer->date_time_open_form_inovation >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                        )
                    )
                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Form Inovasi</span>
                            </h1>
                        </div>
                    </div>

                    @elseif (
                        (
                                    ($timer->status_open == 1
                                && ($timer->date_time_open_form_inovation > \Carbon\Carbon::now()->toDateTimeString()  || $timer->date_time_open_form_inovation == \Carbon\Carbon::now()->toDateTimeString() ))
                            &&  ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                        )
                        ||
                        (
                                    ($timer->status_open == 1
                                && ($timer->date_time_open_form_inovation > \Carbon\Carbon::now()->toDateTimeString()  || $timer->date_time_open_form_inovation == \Carbon\Carbon::now()->toDateTimeString()) )
                            &&  ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                        )
                    )
                    <div class="container-fluid ">
                        <div class="openTimerCountDown">
                            <div class="titleCountDown">
                                <h1>Pembukaan Form Inovasi</h1>
                            </div>
                            <div class="dateCountDown">
                                <span>Hari <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_inovation)->isoFormat('dddd') }}</b></span>
                                <span>Tanggal <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_inovation)->isoFormat('D') }}</b></span>
                                <span>Bulan <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_inovation)->isoFormat('MMMM') }}</b></span>
                                <span>Tahun <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_inovation)->isoFormat('Y') }}</b></span>
                            </div>
                            <div class="timeCountDown">
                                <span>Jam <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_inovation)->isoFormat('hh') }}</b></span>
                                <span>Menit <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_inovation)->isoFormat('mm') }}</b></span>
                                <span>Waktu <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_inovation)->isoFormat('a') }}</b></span>
                            </div>
                            <div class="titleCountDown">
                                <h1>Coming Soon</h1>
                            </div>
                            <div class="wrap-countdown mercado-countdown" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_open_form_inovation)->toDateTimeString() }}">
                            </div>
                        </div>
                    </div>

                    @elseif (
                        (
                                (
                                        ($timer->status_open == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_inovation || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_inovation) )
                                    &&  ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                                )
                            ||  (
                                        ($timer->status_open == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_inovation || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_inovation))
                                    &&  ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation)
                                )
                        )
                        ||
                        (
                                (
                                        ($timer->status_open == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_inovation || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_inovation))
                                    &&  ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation)
                                )
                            || (
                                        ($timer->status_open == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_inovation || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_inovation))
                                    &&  ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation)
                                )
                        )
                    )

                    <div class="container-fluid">

                        <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Panjang</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>

                    @elseif (
                        (
                                ( ($timer->status_open == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_inovation) && ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_form_inovation) )
                            ||  ( ($timer->status_open == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_inovation) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_form_inovation) )
                        )
                        ||
                        (
                                ( ($timer->status_open == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_inovation) && ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_form_inovation) )
                            || ( ($timer->status_open == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_inovation) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_form_inovation) )
                        )
                    )

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Form Inovasi Telah Ditutup</span>
                            </h1>
                        </div>
                    </div>

                    @endif

                @endif

            </div>
        </div>
    </div>
</div>

@stop
