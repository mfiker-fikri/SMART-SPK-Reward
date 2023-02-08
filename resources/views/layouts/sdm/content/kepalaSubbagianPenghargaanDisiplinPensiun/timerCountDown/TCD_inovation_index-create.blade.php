@extends('template.sdm.template')
@section('css_header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js_header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js" integrity="sha512-L7jgg7T9UbYc7hXogUKssqe1B5MsgrcviNxsRbO53dDSiw/JxuA/4kVQvEORmZJ6Re3fVF3byN5TT7czo9Rdug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6.2.10/js/jQuery-provider.js" integrity="sha512-xaFEJUkQccvUmeaaFDDOgCKoxPPtJSoVvQsb9tzmZtMkfWuH3XyBXKt6JkhENYFnI1w0ij5Hu2HSn/l4wYYbPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6.2.10/js/jQuery-provider.min.js" integrity="sha512-6y4d+qhlv++HZDnBvBY0Xg+cU/hZn3EF/1xDCn6uB4iHsrMzb7R2jrO1sceKIJrcEwLoPDULpOyBWa3raUsZ1Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone.min.js" integrity="sha512-NJfMpP34NDFAS8lJqH4FzsaD1fqoIJATgBpPjNUck9hC8kGvFhrcR8KIPnTtSinNyx8b1QPBE6NM4iux/0dHXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop

@section('js_footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js" integrity="sha512-L7jgg7T9UbYc7hXogUKssqe1B5MsgrcviNxsRbO53dDSiw/JxuA/4kVQvEORmZJ6Re3fVF3byN5TT7czo9Rdug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6.2.10/js/jQuery-provider.js" integrity="sha512-xaFEJUkQccvUmeaaFDDOgCKoxPPtJSoVvQsb9tzmZtMkfWuH3XyBXKt6JkhENYFnI1w0ij5Hu2HSn/l4wYYbPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6.2.10/js/jQuery-provider.min.js" integrity="sha512-6y4d+qhlv++HZDnBvBY0Xg+cU/hZn3EF/1xDCn6uB4iHsrMzb7R2jrO1sceKIJrcEwLoPDULpOyBWa3raUsZ1Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone.min.js" integrity="sha512-NJfMpP34NDFAS8lJqH4FzsaD1fqoIJATgBpPjNUck9hC8kGvFhrcR8KIPnTtSinNyx8b1QPBE6NM4iux/0dHXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script type="text/javascript">
        $(function () {
            $('#date_time_open_countdown_inovation_form').datetimepicker({
                timepicker:true,
                datepicker:true,

                // format: "mm/dd/yy",
                // weekStart: 0,
                // calendarWeeks: true,
                // autoclose: true,
                // todayHighlight: true,
                // orientation: "auto"
            });
        });
    </script> --}}

    <!-- Select2 Status -->
    <script type="text/javascript">
    $( '#status_open' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>

    <script type="text/javascript">
        $( '#status_expired' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_open_appraisment' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_appraisment' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>
    <!-- Select2 Status -->

    <script>
        $(document).ready(function() {
            // $("#date_time_open_countdown_inovation_form").change(function(){

                var dateTimeOpenCountdownInovationForm     =    document.getElementById("date_time_open_countdown_inovation_form").getAttribute("min");
                var vlueDate                               =    document.getElementById("date_time_open_countdown_inovation_form").getAttribute("value");
                // $("#date_time_open_countdown_inovation_form").attr("value");
                // console.log(dateTimeOpenCountdownInovationForm);
                // console.log(vlueDate);

                if (vlueDate == '') {
                    if (dateTimeOpenCountdownInovationForm) {
                        const date       =    new Date(dateTimeOpenCountdownInovationForm);

                        // Expired Open Form
                        var a1              =    date.getDate()+1;
                        var b1              =    date.setDate(a1);
                        const c1            =    new Date(b1);
                        const dateTime1     =    convert(c1);
                        // console.log(c);

                        // Open Appraisment
                        var a2              =    date.getDate()+1;
                        var b2              =    date.setDate(a2);
                        const c2            =    new Date(b2);
                        const dateTime2     =    convert(c2);

                        // Expired Appraisment
                        var a3              =    date.getDate()+2;
                        var b3              =    date.setDate(a3);
                        const c3            =    new Date(b3);
                        const dateTime3     =    convert(c3);

                        //
                        const dates         =   date.getDate();
                        const month         =   date.getMonth()+1;
                        const year          =   date.getFullYear();

                        const hour          =   date.getHours();
                        const minute        =   date.getMinutes();
                        const second        =   date.getSeconds();
                        hours               =   checkTime(hour);
                        minutes             =   checkTime(minute);
                        seconds             =   checkTime(second);



                        // var result = year + "/" + month + "/" + dates + " " + hour + ":" + minutes;
                        var result1 = dateTime1 + " " + hours + ":" + minutes + ":" + seconds;
                        var result2 = dateTime1 + " " + hours + ":" + minutes + ":" + seconds;
                        var result3 = dateTime3 + " " + hours + ":" + minutes + ":" + seconds;
                        // console.log(result);

                        var dateExpired         = document.getElementById("date_time_expired_countdown_inovation_form").setAttribute("min", result1);
                        var dateOpenAppraisment = document.getElementById("date_time_open_countdown_inovation_appraisment").setAttribute("min", result2);
                        var dateExpiAppraisment = document.getElementById("date_time_expired_countdown_inovation_appraisment").setAttribute("min", result3);

                        return [dateExpired, dateOpenAppraisment, dateExpiAppraisment];


                    }
                }

                if (vlueDate != '') {
                    const date       =    new Date(vlueDate);
                    // console.log(date);

                    // Expired Open Form
                    var a1              =    date.getDate()+1;
                    var b1              =    date.setDate(a1);
                    const c1            =    new Date(b1);
                    const dateTime1     =    convert(c1);
                    // console.log(c);

                    // Open Appraisment
                    var a2              =    date.getDate()+1;
                    var b2              =    date.setDate(a2);
                    const c2            =    new Date(b2);
                    const dateTime2     =    convert(c2);

                    // Expired Appraisment
                    var a3              =    date.getDate()+1;
                    var b3              =    date.setDate(a3);
                    const c3            =    new Date(b3);
                    const dateTime3     =    convert(c3);

                    //
                    const dates         =   date.getDate();
                    const month         =   date.getMonth()+1;
                    const year          =   date.getFullYear();

                    const hour          =   date.getHours();
                    const minute        =   date.getMinutes();
                    const second        =   date.getSeconds();
                    hours               =   checkTime(hour);
                    minutes             =   checkTime(minute);
                    seconds             =   checkTime(second);



                    // var result = year + "/" + month + "/" + dates + " " + hour + ":" + minutes;
                    var result1 = dateTime1 + " " + hours + ":" + minutes + ":" + seconds;
                    var result2 = dateTime2 + " " + hours + ":" + minutes + ":" + seconds;
                    var result3 = dateTime3 + " " + hours + ":" + minutes + ":" + seconds;
                    // console.log(result);

                    var dateExpired         = document.getElementById("date_time_expired_countdown_inovation_form").setAttribute("min", result1);
                    var dateOpenAppraisment = document.getElementById("date_time_open_countdown_inovation_appraisment").setAttribute("min", result2);
                    var dateExpiAppraisment = document.getElementById("date_time_expired_countdown_inovation_appraisment").setAttribute("min", result3);

                    return [dateExpired, dateOpenAppraisment, dateExpiAppraisment];

                }
            });

            function convert(str) {
                var date = new Date(str),
                    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                    day = ("0" + date.getDate()).slice(-2);
                return [date.getFullYear(), mnth, day].join("-");
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                };  // add zero in front of numbers < 10
                return i;
            }
    </script>


    <!-- Reset Select2 Status -->
    <script type="text/javascript">
    function resetStatusNull(event){
        var oldOpenStatus = document.getElementById("oldOpenStatus").getAttribute("value");
        var oldExpiredStatus = document.getElementById("oldExpiredStatus").getAttribute("value");

        if (oldOpenStatus && oldExpiredStatus) {
            $('#status_open').val(oldOpenStatus).trigger('change');
            $('#status_expired').val(oldExpiredStatus).trigger('change');
        } else if (oldOpenStatus || oldExpiredStatus) {
            $('#status_open').val(oldOpenStatus).trigger('change');
            $('#status_expired').val(oldExpiredStatus).trigger('change');
        } else {
            $('#status_open').val(null).trigger('change');
            $('#status_expired').val(null).trigger('change');
        }
    }
    </script>

    <script type="text/javascript">
    function resetStatusNullAppraisment(event){
        var oldOpenStatus = document.getElementById("oldOpenStatusAppraisment").getAttribute("value");
        var oldExpiredStatus = document.getElementById("oldExpiredStatusAppraisment").getAttribute("value");

        if (oldOpenStatus && oldExpiredStatus) {
            $('#status_open_appraisment').val(oldOpenStatus).trigger('change');
            $('#status_expired_appraisment').val(oldExpiredStatus).trigger('change');
        } else if (oldOpenStatus || oldExpiredStatus) {
            $('#status_open_appraisment').val(oldOpenStatus).trigger('change');
            $('#status_expired_appraisment').val(oldExpiredStatus).trigger('change');
        } else {
            $('#status_open_appraisment').val(null).trigger('change');
            $('#status_expired_appraisment').val(null).trigger('change');
        }
    }
    </script>

    <script type="text/javascript">
    function resetStatus(event){
        var oldOpen = document.getElementById("oldStatusOpen").getAttribute("value");
        var oldExpired = document.getElementById("oldStatusExpired").getAttribute("value");

        if (oldOpen && oldExpired) {
            $('#status_open').val(oldOpen).trigger('change');
            $('#status_expired').val(oldExpired).trigger('change');
        } else if (oldOpen || oldExpired) {
            $('#status_open').val(oldOpen).trigger('change');
            $('#status_expired').val(oldExpired).trigger('change');
        } else {
            $('#status_open').val(null).trigger('change');
            $('#status_expired').val(null).trigger('change');
        }
    }
    </script>

    <script type="text/javascript">
    function resetStatusAppraisment(event) {
        var oldOpen = document.getElementById("oldStatusOpenAppraisment").getAttribute("value");
        var oldExpired = document.getElementById("oldStatusExpiredAppraisment").getAttribute("value");

        if (oldOpen && oldExpired) {
            $('#status_open_appraisment').val(oldOpen).trigger('change');
            $('#status_expired_appraisment').val(oldExpired).trigger('change');
        } else if (oldOpen || oldExpired) {
            $('#status_open_appraisment').val(oldOpen).trigger('change');
            $('#status_expired_appraisment').val(oldExpired).trigger('change');
        } else {
            $('#status_open_appraisment').val(null).trigger('change');
            $('#status_expired_appraisment').val(null).trigger('change');
        }
    }
    </script>


    <!--/ Reset Select2 Status -->



    <!-- Delete -->
    <script type="text/javascript">
        $(document).on('click', '#deleteStatus', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-val');
            // console.log(id);
            Swal.fire({
                title: 'Apakah kamu ingin menghapus timer ini?',
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation/delete') }}" + '/' + id,
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
    <!--/ Delete -->

    <!-- Delete -->
    <script type="text/javascript">
        $(document).on('click', '#deleteStatusID', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-val');
            // console.log(id);
            Swal.fire({
                title: 'Apakah kamu ingin menghapus timer ini?',
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/appraisment/delete') }}" + '/' + id,
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
    <!--/ Delete -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <li class="nav-item" role="presentation">
                      <button class="nav-link {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation')) ? 'active' : '' }}" id="pills-time-tab" data-bs-toggle="pill" data-bs-target="#pills-time" type="button" role="tab" aria-controls="pills-time" aria-selected="{{ (request()->is('penilai/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation')) ? 'true' : 'false' }}">Timer Countdown Form Inovation</button>
                    </li>

                    <li class="nav-item" role="presentation">
                      <button class="nav-link text-center" id="pills-appraisment-tab"
                        @if ($timer != null)
                        data-bs-toggle="pill" data-bs-target="#pills-appraisment" type="button" role="tab" aria-controls="pills-appraisment" aria-selected="false"
                        @endif
                        @if ($timer == null) disabled data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="This top tooltip is themed via CSS variables."
                        @endif>Timer Countdown Appraisment Inovation</button>
                    </li>

                </ul>

            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation')) ? 'active' : '' }}" id="pills-time" role="tabpanel" aria-labelledby="pills-time-tab" >

                    <div class="card my-4">

                        <!-- Form Timer Countdown Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Timer Countdown Form Inovation</h5>
                        </div>
                        <!--/ Form Timer Countdown Title -->

                        <!-- Form Timer Countdown -->
                        <div class="card-body py-xl-5 py-sm-5 px-xl-5">
                            <form id="formCreateTimerFormInovation" class="mx-2" method="POST" action="{{ route('sdm.postTimerCountDownFormInovation.Index.Create.SDM') }}">
                                @csrf
                                @if ($timer == null)
                                <input type="hidden" name="id" value="">
                                @else
                                <input type="hidden" name="id" value="{{ $timer->id }}">
                                @endif

                                <!-- Timer Countdown-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_countdown_inovation_form') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_countdown_inovation_form" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Form</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_countdown_inovation_form') ? 'is-invalid' : '' }}" id="date_time_open_countdown_inovation_form"
                                                name="date_time_open_countdown_inovation_form" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_inovation_form') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_inovation_form', $timer->date_time_open_form_inovation) }}"
                                                @endif
                                                min="{{ \Carbon\Carbon::tomorrow() }}"
                                                aria-invalid="true" aria-describedby="date_time_open_countdown_inovation_form" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_formHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_countdown_inovation_form') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_countdown_inovation_form') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open') ? 'is-invalid' : '' }}">
                                    <label for="status_open" class="col-sm-3 col-form-label">Status Open</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open') }}" id="oldOpenStatus" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open', $timer->status_open) }}" id="oldStatusOpen" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open') ? 'is-invalid' : '' }}" id="status_open"
                                                name="status_open" placeholder="--Pilih Status Open --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open" data-val="true" aria-label="status_open" data-placeholder="-- Pilih Status Open --">
                                                <option disabled selected>-- Pilih Status Open --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open', $timer->status_open ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open', $timer->status_open ) == 1 ) selected="selected" @endif>Aktif</option>
                                                {{-- @elseif ($timer->status_open == 0)
                                                <option value="0" @if(old('status_open', $timer->status_open ) == 0 ) selected="selected" @endif disabled>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open', $timer->status_open ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @elseif ($timer->status_open == 1)
                                                <option value="0" @if(old('status_open', $timer->status_open ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open', $timer->status_open ) == 1 ) selected="selected" @endif disabled>Aktif</option> --}}
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenHelp" class="form-text">Pilih Status Open</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_countdown_inovation_form') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_countdown_inovation_form" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Form</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_countdown_inovation_form') ? 'is-invalid' : '' }}" id="date_time_expired_countdown_inovation_form"
                                                name="date_time_expired_countdown_inovation_form" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_inovation_form') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_inovation_form', $timer->date_time_expired_form_inovation) }}"
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_countdown_inovation_form" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_formHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_countdown_inovation_form') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_countdown_inovation_form') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                 <!-- Status Close -->
                                 <div class="mb-3 row {{ $errors->has('status_expired') ? 'is-invalid' : '' }}">
                                    <label for="status_expired" class="col-sm-3 col-form-label">Status Close</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired') }}" id="oldExpiredStatus" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired', $timer->status_expired) }}" id="oldStatusExpired" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired') ? 'is-invalid' : '' }}" id="status_expired"
                                                name="status_expired" placeholder="--Pilih Status Close --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired" data-val="true" aria-label="status_expired" data-placeholder="-- Pilih Status Close --">
                                                <option disabled selected>-- Pilih Status Close --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired', $timer->status_expired ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired', $timer->status_expired ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Close</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <div class="justify-content-between">
                                        @if ($timer != null)
                                        <button type="button" class="btn btn-danger btn-lg" style="color: black" id="deleteStatus" data-val="{{ $timer->id }}">
                                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                                        </button>
                                        @endif
                                        @if ($timer == null)
                                        <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatusNull();">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        @else
                                        <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatus();">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        @endif
                                        <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                            @if ($timer == null)
                                            <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Save
                                            @else
                                            <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Update
                                            @endif
                                        </button>
                                    </div>
                                </div>
                                <!-- Action Button -->

                                </form>
                        </div>
                        <!-- Form Timer Countdown -->

                    </div>


                </div>

                <div class="tab-pane fade" id="pills-appraisment" role="tabpanel" aria-labelledby="pills-appraisment-tab" tabindex="0">

                    <div class="card my-4">

                        <!-- Form Timer Countdown Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Timer Countdown Form Inovation</h5>
                        </div>
                        <!--/ Form Timer Countdown Title -->

                        <!-- Form Timer Countdown -->
                        <div class="card-body py-xl-5 py-sm-5 px-xl-5">
                            <form id="formCreateTimerAppraismentInovation" class="mx-2" method="POST" action="{{ route('sdm.postTimerCountDownAppraisment.Index.Create.SDM') }}">
                                @csrf
                                @if ($timer == null)
                                <input type="hidden" name="id" value="">
                                @else
                                <input type="hidden" name="id" value="{{ $timer->id }}">
                                @endif

                                <!-- Timer Countdown-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_countdown_inovation_appraisment') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_countdown_inovation_appraisment" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Penilaian</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_countdown_inovation_appraisment') ? 'is-invalid' : '' }}" id="date_time_open_countdown_inovation_appraisment"
                                                name="date_time_open_countdown_inovation_appraisment" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_inovation_appraisment') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_inovation_appraisment', $timer->date_time_open_appraisment) }}"
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_countdown_inovation_appraisment" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_appraismentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_countdown_inovation_appraisment') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_countdown_inovation_appraisment') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_appraisment') ? 'is-invalid' : '' }}">
                                    <label for="status_open_appraisment" class="col-sm-3 col-form-label">Status Open</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_appraisment') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_appraisment') }}" id="oldOpenStatusAppraisment" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_appraisment', $timer->status_open_appraisment) }}" id="oldStatusOpenAppraisment" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_appraisment') ? 'is-invalid' : '' }}" id="status_open_appraisment"
                                                name="status_open_appraisment" placeholder="--Pilih Status Open --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_appraisment" data-val="true" aria-label="status_open_appraisment" data-placeholder="-- Pilih Status Open --">
                                                <option disabled selected>-- Pilih Status Open --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_appraisment' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_appraisment' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_appraisment', $timer->status_open_appraisment ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_appraisment', $timer->status_open_appraisment ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenAppraismentHelp" class="form-text">Pilih Status Open</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_appraisment') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_appraisment') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_countdown_inovation_appraisment') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_countdown_inovation_appraisment" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Penilaian</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_countdown_inovation_appraisment') ? 'is-invalid' : '' }}" id="date_time_expired_countdown_inovation_appraisment"
                                                name="date_time_expired_countdown_inovation_appraisment" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_inovation_appraisment') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_inovation_appraisment', $timer->date_time_expired_appraisment) }}"
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_countdown_inovation_appraisment" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_apprasimentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_countdown_inovation_appraisment') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_countdown_inovation_appraisment') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                 <!-- Status Close -->
                                 <div class="mb-3 row {{ $errors->has('status_expired_appraisment') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_appraisment" class="col-sm-3 col-form-label">Status Close</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_appraisment') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_appraisment') }}" id="oldExpiredStatusAppraisment" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_appraisment', $timer->status_expired_appraisment) }}" id="oldStatusExpiredAppraisment" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_appraisment') ? 'is-invalid' : '' }}" id="status_expired_appraisment"
                                                name="status_expired_appraisment" placeholder="--Pilih Status Close --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_appraisment" data-val="true" aria-label="status_expired_appraisment" data-placeholder="-- Pilih Status Close --">
                                                <option disabled selected>-- Pilih Status Close --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_appraisment' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_appraisment' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_appraisment', $timer->status_expired_appraisment ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_appraisment', $timer->status_expired_appraisment ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Close</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_appraisment') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_appraisment') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <div class="justify-content-between">
                                        @if ($timer != null && $timer != null)
                                        <button type="button" class="btn btn-danger btn-lg" style="color: black" id="deleteStatusID" data-val="{{ $timer->id }}">
                                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                                        </button>
                                        @endif
                                        @if ($timer == null || $timer == null)
                                        <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatusNullAppraisment()">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        @else
                                        <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatusAppraisment();">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        @endif
                                        <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                            @if ($timer == null && $timer == null)
                                            <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Save
                                            @else
                                            <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Update
                                            @endif
                                        </button>
                                    </div>
                                </div>
                                <!-- Action Button -->

                            </form>

                        </div>
                        <!-- Form Timer Countdown -->

                    </div>

                </div>

            </div>
            <!--/ Tabs -->

        </div>
    </div>
</div>

@endsection
