@extends('template.teamAssessment.template')

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
    <!-- Datatables Result Inovasi DSS -->
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#data-table-result-process-DSS').DataTable({
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
                ajax: "{{ url('penilai/appraisement/result/innovation/list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'fullName', name: 'fullName', orderable: false, searchable: false},
                    {data: 'score_final_result', name: 'score_final_result', orderable: false, searchable: false},
                    {data: 'score_final_result_description', name: 'score_final_result_description', orderable: false, searchable: false},
                ]
            });

            // new $.fn.dataTable.FixedHeader( table );

            if (table) {
                setInterval( function () {
                    table.ajax.reload(null, false);
                }, 10000 );
            }
        });
    </script>
    <!--/ Datatables Result Inovasi DSS -->

    <!-- Timer Countdown -->
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.min.js')}}"></script>

    <script>
        // Goood
        $(document).ready(function () {

            $(".mercado-countdown").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if( (event.offset.totalDays == 0 && flag2) || ( (event.offset.totalHours > 0 && flag2) && (event.offset.totalMinutes > 0 && flag2) ) ) {
                    if( (event.offset.totalDays == 0 && flag2) ) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Penilaian Inovasi Dibuka Besok',
                            icon: 'success',
                            html: 'Pop up will close in <b></b> milliseconds.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            timer: 10000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                            didClose: () => {
                                clearInterval(timerInterval)
                            },
                        });
                    }
                    // if( ( (event.offset.totalDays == 0 && flag2) && (event.offset.totalHours == 0 && flag2) ) || (event.offset.totalMinutes > 0 && flag2) ) {
                    if( (event.offset.totalDays == 0 && flag2) ) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Penilaian Inovasi Dibuka dalam' + ' ' + 1 + 'Jam',
                            icon: 'success',
                            html: 'Pop up will close in <b></b> milliseconds.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            timer: 10000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                            didClose: () => {
                                clearInterval(timerInterval)
                            },
                        });
                    }
                    // if( (event.offset.totalDays == 0 && flag2) && (event.offset.totalHours == 0 && flag2) && (event.offset.totalMinutes == 0 && flag2) ) {
                    if( event.offset.totalMinutes == 0 && flag2 ) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Penilaian Inovasi Dibuka dalam' + ' ' + 1 + 'Menit',
                            icon: 'success',
                            html: 'Pop up will close in <b></b> milliseconds.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            timer: 10000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                            didClose: () => {
                                clearInterval(timerInterval)
                            },
                        });
                    }
                    $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                })
                .on('finish.countdown', function(){
                    Swal.fire({
                        title: 'Penilaian Inovasi Sudah Dibuka',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 8000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            window.location.reload(true);
                        },
                    });
                });

            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $(".mercadoCountdown1").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    if( (event.offset.totalDays == 0 && flag2) ) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Penilaian Inovasi Ditutup Besok',
                            icon: 'success',
                            html: 'Pop up will close in <b></b> milliseconds.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            timer: 10000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                            didClose: () => {
                                clearInterval(timerInterval)
                            },
                        });
                    }
                    if( (event.offset.totalHours == 0 && flag2) ) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Penilaian Inovasi Ditutup dalam' + ' ' + 1 + 'Jam',
                            icon: 'success',
                            html: 'Pop up will close in <b></b> milliseconds.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            timer: 10000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                            didClose: () => {
                                clearInterval(timerInterval)
                            },
                        });
                    }
                    if( event.offset.totalMinutes == 0 && flag2 ) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Penilaian Inovasi Ditutup dalam' + ' ' + 1 + 'Menit',
                            icon: 'success',
                            html: 'Pop up will close in <b></b> milliseconds.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            timer: 10000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                            didClose: () => {
                                clearInterval(timerInterval)
                            },
                        });
                    }
                    $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                })
                .on('finish.countdown', function(){
                    Swal.fire({
                        title: 'Penilaian Inovasi Sudah Ditutup',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 8000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            window.location.reload(true);
                        },
                    });
                });
            });

        });


    </script>

    <!--/ Timer Countdown -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-3">

                <!-- Form Hasil Penilaian Inovasi Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Hasil Penilaian Penghargaan Inovasi</h5>
                </div>
                <!--/ Form Hasil Penilaian Inovasi Title -->

                @if ($timer == null)

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Penilaian Inovasi Ditutup</span>
                            </h1>
                        </div>
                    </div>

                @elseif ($timer != null)

                    @if (
                        (
                            ($timer->status_open_appraisement == 0 && $timer->date_time_open_appraisement >= \Carbon\Carbon::now()->toDateTimeString()  ) && ($timer->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement )
                        )
                        ||
                        (
                            ($timer->status_open_appraisement == 0 && $timer->date_time_open_appraisement >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timer->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement )
                        )
                    )
                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Penilaian Inovasi</span>
                            </h1>
                        </div>
                    </div>

                    @elseif (
                        (
                                    ($timer->status_open_appraisement == 1
                                && ($timer->date_time_open_appraisement > \Carbon\Carbon::now()->toDateTimeString()  || $timer->date_time_open_appraisement == \Carbon\Carbon::now()->toDateTimeString() ))
                            &&  ($timer->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement )
                        )
                        ||
                        (
                                    ($timer->status_open_appraisement == 1
                                && ($timer->date_time_open_appraisement > \Carbon\Carbon::now()->toDateTimeString()  || $timer->date_time_open_appraisement == \Carbon\Carbon::now()->toDateTimeString()) )
                            &&  ($timer->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement )
                        )
                    )
                    <div class="container-fluid ">
                        <div class="openTimerCountDown">
                            <div class="titleCountDown">
                                <h1>Pembukaan Penilaian Inovasi</h1>
                            </div>
                            <div class="dateCountDown">
                                <span>Hari <b>{{ \Carbon\Carbon::create($timer->date_time_open_appraisement)->isoFormat('dddd') }}</b></span>
                                <span>Tanggal <b>{{ \Carbon\Carbon::create($timer->date_time_open_appraisement)->isoFormat('D') }}</b></span>
                                <span>Bulan <b>{{ \Carbon\Carbon::create($timer->date_time_open_appraisement)->isoFormat('MMMM') }}</b></span>
                                <span>Tahun <b>{{ \Carbon\Carbon::create($timer->date_time_open_appraisement)->isoFormat('Y') }}</b></span>
                            </div>
                            <div class="timeCountDown">
                                <span>Jam <b>{{ \Carbon\Carbon::create($timer->date_time_open_appraisement)->isoFormat('hh') }}</b></span>
                                <span>Menit <b>{{ \Carbon\Carbon::create($timer->date_time_open_appraisement)->isoFormat('mm') }}</b></span>
                                <span>Waktu <b>{{ \Carbon\Carbon::create($timer->date_time_open_appraisement)->isoFormat('a') }}</b></span>
                            </div>
                            <div class="titleCountDown">
                                <h1>Coming Soon</h1>
                            </div>
                            <div class="wrap-countdown mercado-countdown" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_open_appraisement)->toDateTimeString() }}">
                            </div>
                        </div>
                    </div>

                    @elseif (
                        (
                                (
                                        ($timer->status_open_appraisement == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_appraisement) )
                                    &&  ($timer->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement )
                                )
                            ||  (
                                        ($timer->status_open_appraisement == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_appraisement))
                                    &&  ($timer->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement)
                                )
                        )
                        ||
                        (
                                (
                                        ($timer->status_open_appraisement == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_appraisement))
                                    &&  ($timer->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement)
                                )
                            || (
                                        ($timer->status_open_appraisement == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_appraisement))
                                    &&  ($timer->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement)
                                )
                        )
                    )

                    <div class="container-fluid">

                        <!-- Button Create Form Inovation List -->
                        <div class="py-3 d-flex flex-column justify-content-start">
                            @if (
                                (
                                    ($timer->status_open_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_appraisement) && ($timer->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement) )
                                ||  ( ($timer->status_open_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_appraisement) && ($timer->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_appraisement) )
                            )
                                <div class="mx-1 mx-1 mx-1">
                                    <div class="titleCountDownExpiredNonActive">Harap Tunggu Pemberitahuan Waktu Penutupan Penilaian Inovasi</div>
                                </div>
                            @else
                                <div class="mx-1 mx-1 mx-1">
                                    <h3 class="text-center text-dark">Penutupan Penilaian Inovasi</h3>
                                </div>
                                <div class="mx-1 mx-1 mx-1">
                                    <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_appraisement)->toDateTimeString()  }}"></div>
                                </div>
                            @endif

                        </div>
                        <!--/ Button Create Form Inovation List -->

                        <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table-result-process-DSS">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Panjang</th>
                                    <th scope="col">Hasil Penilaian Inovasi</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>

                    @elseif (
                        (
                                ( ($timer->status_open_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_appraisement) && ($timer->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_appraisement) )
                            ||  ( ($timer->status_open_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_appraisement) && ($timer->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_appraisement) )
                        )
                        ||
                        (
                                ( ($timer->status_open_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_appraisement) && ($timer->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_appraisement) )
                            || ( ($timer->status_open_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_appraisement) && ($timer->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_appraisement) )
                        )
                    )

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Penilaian Inovasi Telah Ditutup</span>
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
