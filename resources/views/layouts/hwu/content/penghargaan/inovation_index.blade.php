@extends('template.hwu.template')

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
    <!-- Datatables Form Inovation -->
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
            ajax: "{{ url('/headworkunit/form-inovation/list/data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_full', name: 'nama_full'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
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
    <!--/ Datatables Form Inovation -->



    <!-- Timer Countdown -->
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.min.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.js" integrity="sha512-aWlTsIGUhEq2+LQNA7Wq+OsLaouCcGGaHBWzoU9duKy26ImHe12gRtQnj4688p7QUHG+J4CMb+XwgZ8LYqQ+kQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone.min.js" integrity="sha512-WRk4AKabqhQo0fyIHRMYDBDTbMPpqiA2VbRxicseHV3LphdImtC7G7wqv8A7v9SO5TIDlcPmlR9gdVSEQhvg9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone-utils.min.js" integrity="sha512-2ambGDwV8DfaZMSXtFS5sNCCSS/Fsk7ilNgzr1B5Lvk1IF9ibIS6sVCMlk6/y4fPvNxQAc3RCbMmzK+FIQoHMw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone-with-data.js" integrity="sha512-KpJx5U0e/IORz4nvzND6Qb6M5/4RtcSE6OPCjqUEPoU4bzbnRAqCnoOW+jh/BxzTLyltiyie3fwSehpS6Nvapg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone-with-data.min.js" integrity="sha512-bfIwEjjeO6MQ1THVCW9xI31Su6qLKC30vzU9WfoR/ZkOQiFcP0neXEVZ2kQdE5NsX8Dcd9A5X4zgzanbHkwxeA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone.js" integrity="sha512-ROVjvdfspeKM3YiDzo3wCane9Bc0upghpuTsBcvCJLMZeonNQq2Jv7xPSGLu/RJPW3KQy5IqEhIIU6STbYUnZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="https://momentjs.com/downloads/moment.min.js" type="text/javascript"></script>
    <script src="https://momentjs.com/downloads/moment-timezone-with-data.min.js" type="text/javascript"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    <script>
        $(document).ready(function () {

            $(".mercado-countdown").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                    // defer:      '{bool} Deferred initialization mode'
                })
                .on('update.countdown', function(event) {
                    // console.log(event.offset.minutes == 12);
                    if(event.offset.totalDays == 1 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Dibuka dalam' + ' ' + 2 + 'Hari',
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
                    if(event.offset.totalDays == 0 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Dibuka Besok',
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
                    if(event.offset.totalHours == 0 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Dibuka dalam' + ' ' + 1 + 'Jam',
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
                    if(event.offset.totalMinutes == 0 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Dibuka dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Sudah Dibuka',
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

    <script>
        $(".mercadoCountdown1").each( function(){
            var _this = $(this);
            var _expire = _this.data('expire');
            flag2 = true;
            _this.countdown(_expire,{
                elapse:     false,
                precision:  1000,
                // defer:      '{bool} Deferred initialization mode'
            })
            .on('update.countdown', function(event) {
                // console.log(event.offset.minutes == 12);
                if(event.offset.totalDays == 1 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Ditutup dalam' + ' ' + 2 + 'Hari',
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
                if(event.offset.totalDays == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Ditutup Besok',
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
                if(event.offset.totalHours == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Ditutup dalam' + ' ' + 1 + 'Jam',
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
                if(event.offset.totalMinutes == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Ditutup dalam' + ' ' + 1 + 'Menit',
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
                    title: 'Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Sudah Ditutup',
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
    </script>
@stop
<!--/ Footer Js -->

<!-- Header Js -->
@section('js_header')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone.min.js" integrity="sha512-WRk4AKabqhQo0fyIHRMYDBDTbMPpqiA2VbRxicseHV3LphdImtC7G7wqv8A7v9SO5TIDlcPmlR9gdVSEQhvg9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone-utils.min.js" integrity="sha512-2ambGDwV8DfaZMSXtFS5sNCCSS/Fsk7ilNgzr1B5Lvk1IF9ibIS6sVCMlk6/y4fPvNxQAc3RCbMmzK+FIQoHMw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone-with-data.js" integrity="sha512-KpJx5U0e/IORz4nvzND6Qb6M5/4RtcSE6OPCjqUEPoU4bzbnRAqCnoOW+jh/BxzTLyltiyie3fwSehpS6Nvapg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone-with-data.min.js" integrity="sha512-bfIwEjjeO6MQ1THVCW9xI31Su6qLKC30vzU9WfoR/ZkOQiFcP0neXEVZ2kQdE5NsX8Dcd9A5X4zgzanbHkwxeA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone.js" integrity="sha512-ROVjvdfspeKM3YiDzo3wCane9Bc0upghpuTsBcvCJLMZeonNQq2Jv7xPSGLu/RJPW3KQy5IqEhIIU6STbYUnZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    {{-- <script src="https://momentjs.com/downloads/moment.min.js" type="text/javascript"></script> --}}
    {{-- <script src="https://momentjs.com/downloads/moment-timezone-with-data.min.js" type="text/javascript"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone.min.js" integrity="sha512-NJfMpP34NDFAS8lJqH4FzsaD1fqoIJATgBpPjNUck9hC8kGvFhrcR8KIPnTtSinNyx8b1QPBE6NM4iux/0dHXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.min.js" integrity="sha512-dPDHjz++pU63luykSOhkUQw82AZdbQHk7LQNKrU7kuRGmdR9mbPFu/vYAmCgZ+TXk8vHygzCkV6Ixck+NIOeDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
@stop
<!--/ Header Js -->

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            @if(session('message-success-form-inovation'))
            <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-success-form-inovation') }} </b></strong>
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(session('message-failed-form-inovation'))
            <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-failed-form-inovation') }}  </b></strong>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @endif

            <div class="card mx-4">

                <!-- Form Read Inovation List Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Form Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</h5>
                </div>
                <!--/ Form Read Inovation List Title -->

                @if ($timer == null)

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Ditutup</span>
                            </h1>
                        </div>
                    </div>

                @elseif ($timer != null)

                    {{-- @if ( ($timer->status_open == null && $timer->date_time_open_form_inovation == null) && ($timer->status_expired == null && $timer->date_time_expired_form_inovation == null) ) --}}
                    {{-- @elseif ($timer->status_open == null && $timer->date_time_open_form_inovation == null) --}}
                    {{-- <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Ditutup</span>
                            </h1>
                        </div>
                    </div> --}}

                    @if (
                        (
                            ($timer->status_open == 0 && $timer->date_time_open_form_inovation >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                        )
                        ||
                        (
                            ($timer->status_open == 0 && $timer->date_time_open_form_inovation >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                        )
                    )
                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</span>
                            </h1>
                        </div>
                    </div>

                    @elseif (
                        (
                                    ($timer->status_open == 1
                                && ($timer->date_time_open_form_inovation > \Carbon\Carbon::now()->toDateTimeString() ?? 'None' || $timer->date_time_open_form_inovation == \Carbon\Carbon::now()->toDateTimeString() ?? 'None'))
                            &&  ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation ?? 'None')
                        )
                        ||
                        (
                                    ($timer->status_open == 1
                                && ($timer->date_time_open_form_inovation > \Carbon\Carbon::now()->toDateTimeString() ?? 'None' || $timer->date_time_open_form_inovation == \Carbon\Carbon::now()->toDateTimeString()) ?? 'None')
                            &&  ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation ?? 'None')
                        )
                    )
                    <div class="container-fluid ">
                        <div class="openTimerCountDown">
                            <div class="titleCountDown">
                                <h1>Pembukaan Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</h1>
                            </div>
                            <div class="dateCountDown">
                                {{-- d-m-Y --}}
                                {{-- dddd, D MMMM Y --}}
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
                            {{-- <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($timer->date_time_form_inovation)->formatLocalized('Y/m/d h:i:s') }}"> --}}
                            {{-- <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($timer->date_time_form_inovation)->isoFormat('Y/MMMM/D hh:mm:ss') }}"> --}}
                            </div>
                        </div>
                    </div>

                    @elseif (
                        (
                                (
                                        ($timer->status_open == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_inovation ?? 'None' || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_inovation ?? 'None') )
                                    &&  ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation ?? 'None')
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

                    <div class="closeTimerCountDown">

                        <!-- Button Create Form Inovation List -->
                        <div class="py-3 d-flex flex-column justify-content-start">
                            @if (
                                (
                                    ($timer->status_open == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_inovation) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation) )
                                ||  ( ($timer->status_open == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_inovation) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation) )
                            )
                                <div class="mx-1 mx-1 mx-1">
                                    <div class="titleCountDownExpiredNonActive">Harap Tunggu Pemberitahuan Waktu Penutupan Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</div>
                                </div>
                            @else
                                <div class="mx-1 mx-1 mx-1">
                                    <h3 class="text-center text-dark">Penutupan Persetujuan Pendaftaran Penghargaan Inovasi Pegawai</h3>
                                </div>
                                <div class="mx-1 mx-1 mx-1">
                                    {{-- <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_form_inovation)->format('Y/m/d h:i:s') }}"></div> --}}
                                    <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_form_inovation)->toDateTimeString()  }}"></div>
                                    {{-- 2022-12-27 23:59:00"></div> --}}
                                </div>
                            @endif

                        </div>
                        <!--/ Button Create Form Inovation List -->

                        <div class="container-fluid">

                            @if ($rewardInovation != null)
                            <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            @endif
                        </div>

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
                                <span>Persetujuan Pendaftaran Penghargaan Inovasi Pegawai Telah Ditutup</span>
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

