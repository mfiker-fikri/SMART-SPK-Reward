@extends('template.pegawai.template')

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
            language: {
                emptyTable:     "Kosong",
                infoEmpty: "Tidak ada data tersedia",
                loadingRecords: "Loading...",
                processing:     "",
                search:         "Pencarian:",
                zeroRecords:    "Data yang Anda cari tidak ketemu",
            },
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            paging: false,
            ajax:
            {
                url: "{{ url('form-innovation/list/data') }}",
                dataSrc: function(data){
                    if(data.data == null){
                        return [];
                    } else {
                        return data.data;
                    }
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'status', name: 'status'},
                // {data: 'username', name: 'username'},
                // {data: 'status', name: 'status'},
                // {data: 'last_seen', name: 'last_seen'},
                // {data: 'status_active', name: 'status_active'},
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

    <!-- Datatables Form Inovation Reject -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table0').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                emptyTable:     "Kosong",
                infoEmpty: "Tidak ada data tersedia",
                loadingRecords: "Loading...",
                processing:     "",
                search:         "Pencarian:",
                zeroRecords:    "Data yang Anda cari tidak ketemu",
            },
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            paging: false,
            ajax:
            {
                url: "{{ url('form-innovation/list/data/reject') }}",
                dataSrc: function(data){
                    if(data.data == null){
                        return [];
                    } else {
                        return data.data;
                    }
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'status', name: 'status', orderable: false, searchable: false},
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
    <!--/ Datatables Form Inovation Reject -->

    <!-- Datatables Form Inovation Back -->
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#data-table1').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                language: {
                    emptyTable:     "Kosong",
                    infoEmpty: "Tidak ada data tersedia",
                    loadingRecords: "Loading...",
                    processing:     "",
                    search:         "Pencarian:",
                    zeroRecords:    "Data yang Anda cari tidak ketemu",
                },
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                paging: false,
                ajax:
                {
                    url: "{{ url('form-innovation/list/data/back') }}",
                    dataSrc: function(data){
                    if(data.data == null){
                            return [];
                        } else {
                            return data.data;
                        }
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
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
    <!--/ Datatables Form Inovation Back -->

    <!-- Delete Form Inovation Id -->
    <script type="text/javascript">
    $(document).on('click', '#deleteFormInovationId', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        // console.log(id);
        Swal.fire({
            title: 'Apakah kamu ingin menghapus data form ini?',
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
                    url: "{{ url('form-innovation/delete') }}" + '/' + id,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Delete',
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

    {{-- <script>
        ;(function($) {
            var MERCADO_JS = {
                init: function(){
                    this.mercado_countdown();
                },
                mercado_countdown: function() {
                    if($(".mercado-countdown").length > 0){
                        $(".mercado-countdown").each( function(index, el){
                            var _this = $(this),
                            _expire = _this.data('expire');
                            _this.countdown(_expire, function(event) {
                                $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                            })
                            .on('finish.countdown',function(e){
                                // location.reload();
                                Swal.fire({
                                    title: 'Form Sudah Dibuka',
                                    icon: 'success',
                                    html: 'I will close in <b></b> milliseconds.',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    allowEnterKey: false,
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    },
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        const b = Swal.getHtmlContainer().querySelector('b')
                                        timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft()
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                        // window.location = "{{ url('form-inovation/list') }}";
                                    }
                                });
                            });
                        });
                    }
                },
            };

            window.onload = function () {
                MERCADO_JS.init();
                startTime();
            }
        })(window.Zepto || window.jQuery, window, document);
    </script> --}}


    <script>
        // Goood
        // $(".mercado-countdown").each( function(){
        //     var _this = $(this),
        //     _expire = _this.data('expire');
        //     _this.countdown(_expire, function(event) {
        //         $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
        //     });
        // });


        $(document).ready(function () {

            $(".mercado-countdown").each( function(){
                // e.preventDefault();
                // console.log(e);
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                // console.log(_expire);
                // _this.countdown(_expire, {
                //     elapse: true
                // })
                // _this.countdown(_expire, function(e) {
                //     $(this).html( e.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                // })
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
                            title: 'Formulir Pendaftaran Penghargaan Inovasi Dibuka dalam' + ' ' + 2 + 'Hari',
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
                            title: 'Formulir Pendaftaran Penghargaan Inovasi Dibuka Besok',
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
                            title: 'Formulir Pendaftaran Penghargaan Inovasi Dibuka dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Formulir Pendaftaran Penghargaan Inovasi Dibuka dalam' + ' ' + 1 + 'Menit',
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
                // .then('finish.countdown',function(e){
                //     e.preventDefault();
                //     // $(".openTimerCountDown").hide();
                //     // $(".closeTimerCountDown").show();
                //     // window.location = "{{ url('form-inovation/list') }}";
                //     Swal.fire({
                //         title: 'Formulir Sudah Dibuka',
                //         icon: 'success',
                //         allowOutsideClick: false,
                //         allowEscapeKey: false,
                //         allowEnterKey: false,
                //         showClass: {
                //             popup: 'animate__animated animate__fadeInDown'
                //         },
                //         hideClass: {
                //             popup: 'animate__animated animate__fadeOutUp'
                //         },
                //         timer: 2000,
                //         timerProgressBar: true,
                //         didOpen: () => {
                //             Swal.showLoading()
                //             const b = Swal.getHtmlContainer().querySelector('b')
                //             timerInterval = setInterval(() => {
                //             b.textContent = Swal.getTimerLeft()
                //             }, 100)
                //         },
                //         willClose: () => {
                //             clearInterval(timerInterval)
                //         }
                //     }).then((result) => {
                //         if (result.isConfirmed) {
                //             window.location = "{{ url('form-inovation/list') }}";
                //         }
                //     });
                //     // setTimeout(function () {
                //     //     location.reload();
                //     // }, 60 * 1000);
                // });
                .on('finish.countdown', function(){
                    Swal.fire({
                        title: 'Formulir Pendaftaran Penghargaan Inovasi Sudah Dibuka',
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

            // $(".mercado-countdown").each( function(){
            //     var _this = $(this),
            //     _expire = _this.data('expire');
            //     // console.log(_expire);
            //     // var nextYear = moment.tz(_expire).toDate();
            //     // _this.countdown(nextYear, function(event) {
            //     // _this.countdown(_expire)
            //     _this.countdown(_expire, function(event) {
            //         $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
            //     });
            //     // .on('update.countdown', function(event) {
            //         // console.log(location.reload());
            //         // var $this = $(this);
            //         // $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
            //         // if (event.elapsed) {
            //         //     // var timer = function() {
            //         //     //     window.location.reload(true);
            //         //     //     };
            //         //     // var timeout = setTimeout(timer, 5000);
            //         //     // clearTimeout(timeout);
            //         //     setTimeout(function () {
            //         //         location.reload();
            //         //     }, 60 * 1000);
            //         //     // location.reload();
            //         //     // window.location.reload(true);
            //         //     // window.stop();
            //         // } else {
            //         //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
            //         // }
            //     // });
            //     .on('finish.countdown', function(){
            //         // window.location.reload(true);
            //         // setTimeout(function () {
            //         //     location.reload();
            //         // }, 60 * 1000);
            //         Swal.fire({
            //             title: 'Formulir Sudah Dibuka',
            //             icon: 'success',
            //             html: 'I will close in <b></b> milliseconds.',
            //             allowOutsideClick: false,
            //             allowEscapeKey: false,
            //             allowEnterKey: false,
            //             showClass: {
            //                 popup: 'animate__animated animate__fadeInDown'
            //             },
            //             hideClass: {
            //                 popup: 'animate__animated animate__fadeOutUp'
            //             },
            //             timer: 2000,
            //             timerProgressBar: true,
            //             didOpen: () => {
            //                 Swal.showLoading()
            //                 const b = Swal.getHtmlContainer().querySelector('b')
            //                 timerInterval = setInterval(() => {
            //                     b.textContent = Swal.getTimerLeft()
            //                 }, 100)
            //             },
            //             willClose: () => {
            //                 clearInterval(timerInterval)
            //             },
            //             didClose: () => {
            //                 window.location.reload(true);
            //             },
            //         });
            //     });
            // });

        });




    // ;(function($) {

    //     var MERCADO_JS = {
    //         init: function(){
    //             this.mercado_countdown();
    //         },
    //         mercado_countdown: function() {
    //             if($(".mercado-countdown").length > 0){
    //                     $(".mercado-countdown").each( function(index, el){
    //                         var _this = $(this),
    //                         _expire = _this.data('expire');
    //                     // nextYear = moment.tz(_expire, 'Asia/Jakarta').toDate();
    //                     // var nextYear = moment.parseZone(_expire).local();
    //                     // console.log(nextYear.toDate());
    //                     _this.countdown(_expire, function(event) {
    //                         // until: expires,
    //                         // timezone: 0,
    //                         // serverSync: serverTime,
    //                         // onTick: serverTime,
    //                         // tickInterval: 60,
    //                             $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
    //                         });
    //                     });
    //                     // return b;
    //             }
    //         },
    //         // mercado_countdown1: function() {
    //         //     if($(".mercadoCountdown1").length > 0){
    //         //             $(".mercadoCountdown1").each( function(index, el){
    //         //                 var _this = $(this),
    //         //                 _expire = _this.data('expire');
    //         //             _this.countdown(_expire, function(event) {
    //         //                     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
    //         //                 });
    //         //             });
    //         //     }
    //         // },

    //     };

    //     window.onload = function () {
    //         MERCADO_JS.init();
    //     }

    //     })
        // (window.Zepto || window.jQuery, window, document);
        // (window.jQuery);
        // (window);
    </script>
    <!--/ Timer Countdown -->

    <script>
        // $(".mercadoCountdown1").each( function(){
        //     var _this = $(this);
        //     var _expire = _this.data('expire');
        //     _this.countdown(_expire)
        //     .on('finish.countdown', function(event) {
        //         if (event.elapsed) {
        //             location.reload()
        //         } else {
        //             $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
        //         }
        //     });
        // });

        $(".mercadoCountdown1").each( function(){
            var _this = $(this);
            var _expire = _this.data('expire');
            // console.log(_expire);
            // var nextYear = moment.utc(_expire).tz("Asia/Jakarta").utc().toDate();
            // var nextYear = moment.utc(_expire).local();
            // console.log(nextYear);
            // .toDate();
            // var nextYear = moment.utc(_expire).toDate();
            // console.log(nextYear.utc().toDate());
            // _this.countdown(nextYear, function(event) {
            flag2 = true;
            _this.countdown(_expire,{
                elapse:     false,
                precision:  1000,
                // defer:      '{bool} Deferred initialization mode'
            })
            // _this.countdown(_expire, function(event) {
            // // _this.countdown(_expire)
            //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
            // })
            .on('update.countdown', function(event) {
                // console.log(event.offset.minutes == 12);
                if(event.offset.totalDays == 1 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Formulir Pendaftaran Penghargaan Inovasi Ditutup dalam' + ' ' + 2 + 'Hari',
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
                        title: 'Formulir Pendaftaran Penghargaan Inovasi Ditutup Besok',
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
                        title: 'Formulir Pendaftaran Penghargaan Inovasi Ditutup dalam' + ' ' + 1 + 'Jam',
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
                        title: 'Formulir Pendaftaran Penghargaan Inovasi Ditutup dalam' + ' ' + 1 + 'Menit',
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
                    title: 'Formulir Pendaftaran Penghargaan Inovasi Sudah Ditutup',
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
            <div class="card mx-3 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
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
            <div class="card mx-3 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
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

            <div class="card mx-3">

                <!-- Form Read Inovation List Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Formulir Pendaftaran Penghargaan Inovasi</h5>
                </div>
                <!--/ Form Read Inovation List Title -->

                @if ($timer == null)

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Formulir Pendaftaran Penghargaan Inovasi Ditutup</span>
                            </h1>
                        </div>
                    </div>

                @elseif ($timer != null)

                    {{-- @if ( ($timer->status_open_form_innovation == null && $timer->date_time_open_form_innovation == null) && ($timer->status_expired_form_innovation == null && $timer->date_time_expired_form_innovation == null) ) --}}
                    {{-- @elseif ($timer->status_open_form_innovation == null && $timer->date_time_open_form_innovation == null) --}}
                    {{-- <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Form Inovasi Ditutup</span>
                            </h1>
                        </div>
                    </div> --}}

                    @if (
                        (
                            ($timer->status_open_form_innovation == 0 && $timer->date_time_open_form_innovation >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation )
                        )
                        ||
                        (
                            ($timer->status_open_form_innovation == 0 && $timer->date_time_open_form_innovation >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timer->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation )
                        )
                    )
                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Formulir Pendaftaran Penghargaan Inovasi</span>
                            </h1>
                        </div>
                    </div>

                    @elseif (
                        (
                                    ($timer->status_open_form_innovation == 1
                                && ($timer->date_time_open_form_innovation > \Carbon\Carbon::now()->toDateTimeString() ?? 'None' || $timer->date_time_open_form_innovation == \Carbon\Carbon::now()->toDateTimeString() ?? 'None'))
                            &&  ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation ?? 'None')
                        )
                        ||
                        (
                                    ($timer->status_open_form_innovation == 1
                                && ($timer->date_time_open_form_innovation > \Carbon\Carbon::now()->toDateTimeString() ?? 'None' || $timer->date_time_open_form_innovation == \Carbon\Carbon::now()->toDateTimeString()) ?? 'None')
                            &&  ($timer->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation ?? 'None')
                        )
                    )
                    <div class="container-fluid ">
                        <div class="openTimerCountDown">
                            <div class="titleCountDown">
                                <h1>Pembukaan Formulir Pendaftaran Penghargaan Inovasi</h1>
                            </div>
                            <div class="dateCountDown">
                                {{-- d-m-Y --}}
                                {{-- dddd, D MMMM Y --}}
                                <span>Hari <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_innovation)->isoFormat('dddd') }}</b></span>
                                <span>Tanggal <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_innovation)->isoFormat('D') }}</b></span>
                                <span>Bulan <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_innovation)->isoFormat('MMMM') }}</b></span>
                                <span>Tahun <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_innovation)->isoFormat('Y') }}</b></span>
                            </div>
                            <div class="timeCountDown">
                                <span>Jam <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_innovation)->isoFormat('hh') }}</b></span>
                                <span>Menit <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_innovation)->isoFormat('mm') }}</b></span>
                                <span>Waktu <b>{{ \Carbon\Carbon::create($timer->date_time_open_form_innovation)->isoFormat('a') }}</b></span>
                            </div>
                            <div class="titleCountDown">
                                <h1>Coming Soon</h1>
                            </div>
                            <div class="wrap-countdown mercado-countdown" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_open_form_innovation)->toDateTimeString() }}">
                            {{-- <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($timer->date_time_form_inovation)->formatLocalized('Y/m/d h:i:s') }}"> --}}
                            {{-- <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($timer->date_time_form_inovation)->isoFormat('Y/MMMM/D hh:mm:ss') }}"> --}}
                            </div>
                        </div>
                    </div>

                    @elseif (
                        (
                                (
                                        ($timer->status_open_form_innovation == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_innovation ?? 'None' || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_innovation ?? 'None') )
                                    &&  ($timer->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation ?? 'None')
                                )
                            ||  (
                                        ($timer->status_open_form_innovation == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_innovation || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_innovation))
                                    &&  ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation)
                                )
                        )
                        ||
                        (
                                (
                                        ($timer->status_open_form_innovation == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_innovation || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_innovation))
                                    &&  ($timer->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation)
                                )
                            || (
                                        ($timer->status_open_form_innovation == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_innovation || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_innovation))
                                    &&  ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation)
                                )
                        )
                    )

                    <div class="closeTimerCountDown">

                        <!-- Button Create Form Inovation List -->
                        <div class="py-3 d-flex flex-column justify-content-start">
                            @if (
                                (
                                    ($timer->status_open_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation) )
                                ||  ( ($timer->status_open_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation) )
                            )
                                <div class="mx-1 mx-1 mx-1">
                                    <div class="titleCountDownExpiredNonActive">Harap Tunggu Pemberitahuan Waktu Penutupan Formulir Pendaftaran Penghargaan Inovasi</div>
                                </div>
                            @else
                                <div class="mx-1 mx-1 mx-1">
                                    <h3 class="text-center text-dark">Penutupan Formulir Pendaftaran Penghargaan Inovasi</h3>
                                </div>
                                <div class="mx-1 mx-1 mx-1">
                                    {{-- <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_form_innovation)->format('Y/m/d h:i:s') }}"></div> --}}
                                    <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_form_innovation)->toDateTimeString()  }}"></div>
                                    {{-- 2022-12-27 23:59:00"></div> --}}
                                </div>
                            @endif



                            {{-- @if (isset($rewardInovationCreate) ) --}}
                            @if ($rewardInovationCreateReject->isNotEmpty() || $rewardInovationCreate->isEmpty())
                                <div class="mx-1 mx-1 mx-1">
                                    <a class="btn btn-primary btn-lg" href="{{ URL::to('form-innovation/create') }}" role="button">
                                        <i class="fa-solid fa-plus mx-auto me-1"></i> Tambah Formulir Pendaftaran Penghargaan Inovasi
                                    </a>
                                </div>
                            @elseif($rewardInovationCreateReject->isEmpty() || $rewardInovationCreate->isNotEmpty() )
                            {{-- (empty($rewardInovationCreate) ) --}}
                                <div class="no-Button"></div>
                            @endif

                            {{-- @if ($rewardInovationCreateReject)
                                <div class="no-Button"></div>
                            @endif --}}
                        </div>
                        <!--/ Button Create Form Inovation List -->

                        <!-- Tabs -->
                        <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                            <!-- Tabs Form Inovation Waiting -->
                            <li class="nav-item" role="presentation">
                                <!-- 2=menunggu -->
                                <button class="nav-link {{ (request()->is('form-innovation/list')) ? 'active' : '' }} text-center" id="pills-wait-tab" data-bs-toggle="pill" data-bs-target="#pills-wait" type="button" role="tab" aria-controls="pills-wait" aria-selected="{{ (request()->is('form-innovation/list')) ? 'true' : 'false' }}">Menunggu</button>
                            </li>
                            <!--/ Tabs Form Inovation Waiting -->

                            <!-- Tabs Form Inovation Back -->
                            <li class="nav-item" role="presentation">
                                <!-- 1=dikembalikan -->
                                <button class="nav-link text-center" id="pills-back-tab" data-bs-toggle="pill" data-bs-target="#pills-back" type="button" role="tab" aria-controls="pills-back" aria-selected="false">Dikembalikan</button>
                            </li>
                            <!--/ Tabs Form Inovation Back -->

                            <!-- Tabs Form Inovation Reject -->
                            <li class="nav-item" role="presentation">
                                <!-- 0=ditolak -->
                                <button class="nav-link text-center" id="pills-reject-tab" data-bs-toggle="pill" data-bs-target="#pills-reject" type="button" role="tab" aria-controls="pills-reject" aria-selected="false">Ditolak</button>
                            </li>
                            <!--/ Tabs Form Inovation Reject -->

                        </ul>
                        <!--/ Tabs -->


                        <div class="container-fluid">

                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                <!-- Tabs Form Inovation Waiting -->
                                <div class="tab-pane fade show {{ (request()->is('form-innovation/list')) ? 'active' : '' }}" id="pills-wait" role="tabpanel" aria-labelledby="pills-wait-tab">

                                    @if ($rewardInovation != null)
                                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Status Proses</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    @endif

                                </div>
                                <!--/ Tabs Form Inovation Waiting -->

                                <!-- Tabs Form Inovation Back -->
                                <div class="tab-pane fade" id="pills-back" role="tabpanel" aria-labelledby="pills-back-tab">

                                    @if ($rewardInovationBack != null)
                                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table1">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Status Proses</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    @endif

                                </div>
                                <!--/ Tabs Form Inovation Back -->

                                <!-- Tabs Form Inovation Reject -->
                                <div class="tab-pane fade" id="pills-reject" role="tabpanel" aria-labelledby="pills-reject-tab">

                                    @if ($rewardInovationReject != null)
                                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table0">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Status Proses</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    @endif

                                </div>
                                <!--/ Tabs Form Inovation Reject -->

                            </div>
                            <!--/ Tabs -->
                        </div>

                    </div>

                    @elseif (
                        (
                                ( ($timer->status_open_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_form_innovation) )
                            ||  ( ($timer->status_open_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_form_innovation) )
                        )
                        ||
                        (
                                ( ($timer->status_open_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_form_innovation) )
                            || ( ($timer->status_open_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_expired_form_innovation) )
                        )
                    )

                    <div class="container-fluid">
                        <div class="titleCountDownNonActive">
                            <h1>
                                <span>Formulir Pendaftaran Penghargaan Inovasi Telah Ditutup</span>
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

