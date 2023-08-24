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
        $( '#status_open_appraisement' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_appraisement' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_open_signature_human_resource_3' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_signature_human_resource_3' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_open_signature_human_resource_2' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_signature_human_resource_2' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_open_signature_human_resource_1' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_signature_human_resource_1' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>
    <!-- Select2 Status -->

    {{-- <script>
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

                        // Open Appraisement
                        var a2              =    date.getDate()+1;
                        var b2              =    date.setDate(a2);
                        const c2            =    new Date(b2);
                        const dateTime2     =    convert(c2);

                        // Expired Appraisement
                        var a3              =    date.getDate()+1;
                        var b3              =    date.setDate(a3);
                        const c3            =    new Date(b3);
                        const dateTime3     =    convert(c3);

                        // Signature
                        var a4              =    date.getDate()+1;
                        var b4              =    date.setDate(a4);
                        const c4            =    new Date(b4);
                        const dateTime4     =    convert(c4);

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

                        var result4 = dateTime4 + " " + hours + ":" + minutes + ":" + seconds;
                        // console.log(result);

                        var dateExpired         = document.getElementById("date_time_expired_countdown_inovation_form").setAttribute("min", result1);
                        var dateOpenAppraisment = document.getElementById("date_time_open_countdown_inovation_appraisement").setAttribute("min", result2);
                        var dateExpiAppraisment = document.getElementById("date_time_expired_countdown_inovation_appraisement").setAttribute("min", result3);

                        //
                        var dateSignature1       = document.getElementById("date_time_open_signature_human_resource_3").setAttribute("min", result4);
                        var dateSignature2       = document.getElementById("date_time_expired_signature_human_resource_3").setAttribute("min", result4);

                        var dateSignature3       = document.getElementById("date_time_open_signature_human_resource_2").setAttribute("min", result4);
                        var dateSignature4       = document.getElementById("date_time_expired_signature_human_resource_2").setAttribute("min", result4);

                        var dateSignature5       = document.getElementById("date_time_open_signature_human_resource_1").setAttribute("min", result4);
                        var dateSignature6       = document.getElementById("date_time_expired_signature_human_resource_1").setAttribute("min", result4);

                        return [dateExpired, dateOpenAppraisment, dateExpiAppraisment, dateSignature1, dateSignature2, dateSignature3, dateSignature4, dateSignature5, dateSignature6];


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

                    // Open Appraisement
                    var a2              =    date.getDate()+1;
                    var b2              =    date.setDate(a2);
                    const c2            =    new Date(b2);
                    const dateTime2     =    convert(c2);

                    // Expired Appraisement
                    var a3              =    date.getDate()+1;
                    var b3              =    date.setDate(a3);
                    const c3            =    new Date(b3);
                    const dateTime3     =    convert(c3);

                    // Signature
                    var a4              =    date.getDate()+1;
                    var b4              =    date.setDate(a4);
                    const c4            =    new Date(b4);
                    const dateTime4     =    convert(c4);

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

                    var result4 = dateTime4 + " " + hours + ":" + minutes + ":" + seconds;
                    // console.log(result);

                    var dateExpired         = document.getElementById("date_time_expired_countdown_inovation_form").setAttribute("min", result1);
                    var dateOpenAppraisment = document.getElementById("date_time_open_countdown_inovation_appraisement").setAttribute("min", result2);
                    var dateExpiAppraisment = document.getElementById("date_time_expired_countdown_inovation_appraisement").setAttribute("min", result3);

                    //
                    var dateSignature1       = document.getElementById("date_time_open_signature_human_resource_3").setAttribute("min", result4);
                    var dateSignature2       = document.getElementById("date_time_expired_signature_human_resource_3").setAttribute("min", result4);

                    var dateSignature3       = document.getElementById("date_time_open_signature_human_resource_2").setAttribute("min", result4);
                    var dateSignature4       = document.getElementById("date_time_expired_signature_human_resource_2").setAttribute("min", result4);

                    var dateSignature5       = document.getElementById("date_time_open_signature_human_resource_1").setAttribute("min", result4);
                    var dateSignature6       = document.getElementById("date_time_expired_signature_human_resource_1").setAttribute("min", result4);

                    return [dateExpired, dateOpenAppraisment, dateExpiAppraisment, dateSignature1, dateSignature2, dateSignature3, dateSignature4, dateSignature5, dateSignature6];

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
                };
                return i;
            }
    </script> --}}

    {{-- <script>
        $(document).ready(function() {

                var dateTimeOpenCountdownInovationForm     =    document.getElementById("date_time_open_countdown_inovation_form").getAttribute("min");
                var vlueDate                               =    document.getElementById("date_time_open_countdown_inovation_form").getAttribute("value");

                if (vlueDate == '') {
                    if (dateTimeOpenCountdownInovationForm) {
                        const date       =    new Date(dateTimeOpenCountdownInovationForm);

                        // Expired Open Form
                        var a1              =    date.getDate()+1;
                        var b1              =    date.setDate(a1);
                        const c1            =    new Date(b1);
                        const dateTime1     =    convert(c1);
                        // console.log(c);

                        // Open Appraisement
                        var a2              =    date.getDate()+1;
                        var b2              =    date.setDate(a2);
                        const c2            =    new Date(b2);
                        const dateTime2     =    convert(c2);

                        // Expired Appraisement
                        var a3              =    date.getDate()+1;
                        var b3              =    date.setDate(a3);
                        const c3            =    new Date(b3);
                        const dateTime3     =    convert(c3);

                        // Signature
                        var a4              =    date.getDate()+1;
                        var b4              =    date.setDate(a4);
                        const c4            =    new Date(b4);
                        const dateTime4     =    convert(c4);

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

                        var result4 = dateTime4 + " " + hours + ":" + minutes + ":" + seconds;
                        // console.log(result);

                        var dateExpired         = document.getElementById("date_time_expired_countdown_inovation_form").setAttribute("min", result1);
                        var dateOpenAppraisment = document.getElementById("date_time_open_countdown_inovation_appraisement").setAttribute("min", result2);
                        var dateExpiAppraisment = document.getElementById("date_time_expired_countdown_inovation_appraisement").setAttribute("min", result3);

                        //
                        var dateSignature1       = document.getElementById("date_time_open_signature_human_resource_3").setAttribute("min", result4);
                        var dateSignature2       = document.getElementById("date_time_expired_signature_human_resource_3").setAttribute("min", result4);

                        var dateSignature3       = document.getElementById("date_time_open_signature_human_resource_2").setAttribute("min", result4);
                        var dateSignature4       = document.getElementById("date_time_expired_signature_human_resource_2").setAttribute("min", result4);

                        var dateSignature5       = document.getElementById("date_time_open_signature_human_resource_1").setAttribute("min", result4);
                        var dateSignature6       = document.getElementById("date_time_expired_signature_human_resource_1").setAttribute("min", result4);

                        return [dateExpired, dateOpenAppraisment, dateExpiAppraisment, dateSignature1, dateSignature2, dateSignature3, dateSignature4, dateSignature5, dateSignature6];


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

                    // Open Appraisement
                    var a2              =    date.getDate()+1;
                    var b2              =    date.setDate(a2);
                    const c2            =    new Date(b2);
                    const dateTime2     =    convert(c2);

                    // Expired Appraisement
                    var a3              =    date.getDate()+1;
                    var b3              =    date.setDate(a3);
                    const c3            =    new Date(b3);
                    const dateTime3     =    convert(c3);

                    // Signature
                    var a4              =    date.getDate()+1;
                    var b4              =    date.setDate(a4);
                    const c4            =    new Date(b4);
                    const dateTime4     =    convert(c4);

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

                    var result4 = dateTime4 + " " + hours + ":" + minutes + ":" + seconds;
                    // console.log(result);

                    var dateExpired         = document.getElementById("date_time_expired_countdown_inovation_form").setAttribute("min", result1);
                    var dateOpenAppraisment = document.getElementById("date_time_open_countdown_inovation_appraisement").setAttribute("min", result2);
                    var dateExpiAppraisment = document.getElementById("date_time_expired_countdown_inovation_appraisement").setAttribute("min", result3);

                    //
                    var dateSignature1       = document.getElementById("date_time_open_signature_human_resource_3").setAttribute("min", result4);
                    var dateSignature2       = document.getElementById("date_time_expired_signature_human_resource_3").setAttribute("min", result4);

                    var dateSignature3       = document.getElementById("date_time_open_signature_human_resource_2").setAttribute("min", result4);
                    var dateSignature4       = document.getElementById("date_time_expired_signature_human_resource_2").setAttribute("min", result4);

                    var dateSignature5       = document.getElementById("date_time_open_signature_human_resource_1").setAttribute("min", result4);
                    var dateSignature6       = document.getElementById("date_time_expired_signature_human_resource_1").setAttribute("min", result4);

                    return [dateExpired, dateOpenAppraisment, dateExpiAppraisment, dateSignature1, dateSignature2, dateSignature3, dateSignature4, dateSignature5, dateSignature6];

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
    </script> --}}


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
            $('#status_open_appraisement').val(oldOpenStatus).trigger('change');
            $('#status_expired_appraisement').val(oldExpiredStatus).trigger('change');
        } else if (oldOpenStatus || oldExpiredStatus) {
            $('#status_open_appraisement').val(oldOpenStatus).trigger('change');
            $('#status_expired_appraisement').val(oldExpiredStatus).trigger('change');
        } else {
            $('#status_open_appraisement').val(null).trigger('change');
            $('#status_expired_appraisement').val(null).trigger('change');
        }
    }
    </script>

    <script type="text/javascript">
    function resetStatusNullsdm(event){

        var oldOpenStatus1      = document.getElementById("oldOpenStatusAppraisment1").getAttribute("value");
        var oldOpenStatus2      = document.getElementById("oldOpenStatusAppraisment2").getAttribute("value");
        var oldOpenStatus3      = document.getElementById("oldOpenStatusAppraisment3").getAttribute("value");

        var oldExpiredStatus1   = document.getElementById("oldExpiredStatusAppraisment1").getAttribute("value");
        var oldExpiredStatus2   = document.getElementById("oldExpiredStatusAppraisment2").getAttribute("value");
        var oldExpiredStatus3   = document.getElementById("oldExpiredStatusAppraisment3").getAttribute("value");

        if ( (oldOpenStatus1 && oldExpiredStatus1) || (oldOpenStatus2 && oldExpiredStatus2) || (oldOpenStatus3 && oldExpiredStatus3) ) {
            $('#status_open_signature_human_resource_3').val(oldOpenStatus3).trigger('change');
            $('#status_expired_signature_human_resource_3').val(oldExpiredStatus3).trigger('change');

            $('#status_open_signature_human_resource_2').val(oldOpenStatus2).trigger('change');
            $('#status_expired_signature_human_resource_2').val(oldExpiredStatus2).trigger('change');

            $('#status_open_signature_human_resource_1').val(oldOpenStatus1).trigger('change');
            $('#status_expired_signature_human_resource_1').val(oldExpiredStatus1).trigger('change');


        } else if ( (oldOpenStatus1 || oldExpiredStatus1) && (oldOpenStatus2 || oldExpiredStatus2) && (oldOpenStatus3 || oldExpiredStatus3) ) {
            $('#status_open_signature_human_resource_3').val(oldOpenStatus3).trigger('change');
            $('#status_expired_signature_human_resource_3').val(oldExpiredStatus3).trigger('change');

            $('#status_open_signature_human_resource_2').val(oldOpenStatus2).trigger('change');
            $('#status_expired_signature_human_resource_2').val(oldExpiredStatus2).trigger('change');

            $('#status_open_signature_human_resource_1').val(oldOpenStatus1).trigger('change');
            $('#status_expired_signature_human_resource_1').val(oldExpiredStatus1).trigger('change');

        } else {
            $('#status_open_signature_human_resource_3').val(null).trigger('change');
            $('#status_expired_signature_human_resource_3').val(null).trigger('change');

            $('#status_open_signature_human_resource_2').val(null).trigger('change');
            $('#status_expired_signature_human_resource_2').val(null).trigger('change');

            $('#status_open_signature_human_resource_1').val(null).trigger('change');
            $('#status_expired_signature_human_resource_1').val(null).trigger('change');
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
            $('#status_open_appraisement').val(oldOpen).trigger('change');
            $('#status_expired_appraisement').val(oldExpired).trigger('change');
        } else if (oldOpen || oldExpired) {
            $('#status_open_appraisement').val(oldOpen).trigger('change');
            $('#status_expired_appraisement').val(oldExpired).trigger('change');
        } else {
            $('#status_open_appraisement').val(null).trigger('change');
            $('#status_expired_appraisement').val(null).trigger('change');
        }
    }
    </script>


    <script type="text/javascript">
    function resetStatussdm(event) {
        var oldOpen1             = document.getElementById("oldStatusOpenAppraisment1").getAttribute("value");
        var oldOpen2             = document.getElementById("oldStatusOpenAppraisment2").getAttribute("value");
        var oldOpen3             = document.getElementById("oldStatusOpenAppraisment3").getAttribute("value");
        console.log(oldOpen1);


        var oldExpired1          = document.getElementById("oldStatusExpiredAppraisment1").getAttribute("value");
        var oldExpired2          = document.getElementById("oldStatusExpiredAppraisment2").getAttribute("value");
        var oldExpired3          = document.getElementById("oldStatusExpiredAppraisment3").getAttribute("value");

        if ( (oldOpen1 && oldExpired1) || (oldOpen2 && oldExpired2) || (oldOpen3 && oldExpired3) ) {
            $('#status_open_signature_human_resource_3').val(oldOpen3).trigger('change');
            $('#status_expired_signature_human_resource_3').val(oldExpired3).trigger('change');

            $('#status_open_signature_human_resource_2').val(oldOpen2).trigger('change');
            $('#status_expired_signature_human_resource_2').val(oldExpired2).trigger('change');

            $('#status_open_signature_human_resource_1').val(oldOpen1).trigger('change');
            $('#status_expired_signature_human_resource_1').val(oldExpired1).trigger('change');

        } else if ( (oldOpen1 || oldExpired1) && (oldOpen2 || oldExpired2) && (oldOpen3 || oldExpired3) ) {
            $('#status_open_signature_human_resource_3').val(oldOpen3).trigger('change');
            $('#status_expired_signature_human_resource_3').val(oldExpired3).trigger('change');

            $('#status_open_signature_human_resource_2').val(oldOpen2).trigger('change');
            $('#status_expired_signature_human_resource_2').val(oldExpired2).trigger('change');

            $('#status_open_signature_human_resource_1').val(oldOpen1).trigger('change');
            $('#status_expired_signature_human_resource_1').val(oldExpired1).trigger('change');
        } else {
            $('#status_open_signature_human_resource_3').val(null).trigger('change');
            $('#status_expired_signature_human_resource_3').val(null).trigger('change');

            $('#status_open_signature_human_resource_2').val(null).trigger('change');
            $('#status_expired_signature_human_resource_2').val(null).trigger('change');

            $('#status_open_signature_human_resource_1').val(null).trigger('change');
            $('#status_expired_signature_human_resource_1').val(null).trigger('change');
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation/delete') }}" + '/' + id,
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
                                    $('#message-delete-form-success').show();
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/appraisement/delete') }}" + '/' + id,
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
                                    $('#message-delete-appraisement-success').show();
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
        $(document).on('click', '#deleteStatusIDSignature', function(e) {
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/signature/delete') }}" + '/' + id,
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
                                    setTimeout(function(){
                                        window.location.reload();
                                    }, 2000);
                                    $('#message-delete-signature-success').text(response.success);
                                    // .then((response) => {
                                    //     $('#message-delete-signature-success').text(response.success);
                                    // });
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
                      <button class="nav-link {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation')) ? 'active' : '' }}"
                        id="pills-time-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-time" type="button" role="tab"
                        aria-controls="pills-time"
                        aria-selected="{{ (request()->is('penilai/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation')) ? 'true' : 'false' }}">Berkas Inovasi</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        @if ($timer != null)
                        <button class="nav-link text-center" id="pills-appraisement-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-appraisement" type="button" role="tab" aria-controls="pills-appraisement" aria-selected="false"
                            >Penilaian Inovasi
                        </button>
                        @elseif ($timer == null)
                        <button class="nav-link {{ $timer == null ? 'disabled' : '' }} text-center" id="pills-appraisement-tab"
                            disabled data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="This top tooltip is themed via CSS variables."
                            >Penilaian Inovasi
                        </button>
                        @endif
                    </li>

                    <li class="nav-item" role="presentation">
                        @if ($timers->isEmpty())
                            <button class="nav-link {{ $timers->isEmpty() ? 'disabled' : '' }} text-center" id="pills-signature_role2-tab"
                                disabled data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables."
                                >Tanda Tangan Inovasi
                            </button>
                        @elseif ($timers->isNotEmpty())
                            @if ($timers[0]->date_time_open_appraisement != null )
                            <button class="nav-link text-center" id="pills-signature_role2-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-signature_role2" type="button" role="tab" aria-controls="pills-signature_role2" aria-selected="false"
                                >Tanda Tangan Inovasi
                            </button>
                            @elseif ($timers[0]->date_time_open_appraisement == null)
                            <button class="nav-link {{ $timers[0]->date_time_open_appraisement == null ? 'disabled' : '' }} text-center" id="pills-signature_role2-tab"
                                disabled data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables."
                                >Tanda Tangan Inovasi
                            </button>
                            @endif
                        @endif
                    </li>

                </ul>

            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation')) ? 'active' : '' }}" id="pills-time" role="tabpanel" aria-labelledby="pills-time-tab" >

                    @if(session('message-update-form-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-form-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-create-form-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-form-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-delete-form-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert" id="message-delete-form-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-form-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-form-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-form-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-create-form-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-form-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-delete-form-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-form-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="card my-4">

                        <!-- Form Timer Countdown Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Berkas Inovasi</h5>
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
                                    <label for="date_time_open_countdown_inovation_form" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Berkas</label>
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
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_inovation_form', $timer->date_time_open_form_innovation) }}"
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
                                    <label for="status_open" class="col-sm-3 col-form-label">Status Pembukaan</label>
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
                                                name="status_open" placeholder="--Pilih Status Pembukaan --"
                                                autofocus autocomplete required="required"
                                                aria-invalid="true" aria-describedby="status_open" data-val="true" aria-label="status_open" data-placeholder="-- Pilih Status Pembukaan --">
                                                <option value="" {{ old('status_open') == '' ? 'selected' : '' }} disabled>-- Pilih Status Pembukaan --</option>
                                                @if ($timer == null)
                                                    <option value="0" {{ old('status_open') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                                    <option value="1" {{ old('status_open') == 1 ? 'selected' : '' }}>Aktif</option>
                                                @else
                                                <option value="0" {{ old('status_open', $timer->status_open_form_innovation) == 0 ? 'selected' : '' }} >Tidak Aktif</option>
                                                <option value="1" {{ old('status_open', $timer->status_open_form_innovation) == 1 ? 'selected' : '' }}>Aktif</option>
                                                {{-- @elseif ($timer->status_open == 0)
                                                <option value="0" @if(old('status_open', $timer->status_open ) == 0 ) selected="selected" @endif disabled>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open', $timer->status_open ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @elseif ($timer->status_open == 1)
                                                <option value="0" @if(old('status_open', $timer->status_open ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open', $timer->status_open ) == 1 ) selected="selected" @endif disabled>Aktif</option> --}}
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenHelp" class="form-text">Pilih Status Pembukaan</div>
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
                                    <label for="date_time_expired_countdown_inovation_form" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Berkas</label>
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
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_inovation_form', $timer->date_time_expired_form_innovation) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_open_form_innovation != null )
                                                        min="{{ $timers[0]->date_time_open_form_innovation }}"
                                                    @endif
                                                @endif
                                                @if ($timers->isEmpty())
                                                    min="{{ \Carbon\Carbon::tomorrow()->addDays(1)->toDateTimeString() }}"
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
                                    <label for="status_expired" class="col-sm-3 col-form-label">Status Penutupan</label>
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
                                                name="status_expired" placeholder="--Pilih Status Penutupan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired" data-val="true" aria-label="status_expired" data-placeholder="-- Pilih Status Penutupan --">
                                                <option disabled selected
                                                    value=""
                                                    @if($timer == null )
                                                    selected="selected"
                                                    @endif>-- Pilih Status Penutupan --</option>
                                                @if ($timer == null)
                                                <option value="0"
                                                    @if(old('status_expired' ) == 0 )
                                                    selected="selected"
                                                    @endif>Tidak Aktif</option>
                                                <option value="1"
                                                    @if(old('status_expired' ) == 1 )
                                                    selected="selected"
                                                    @endif>Aktif</option>
                                                {{-- <option value="0">Tidak Aktif</option>
                                                <option value="1">Aktif</option> --}}
                                                @else
                                                <option value="0" @if(old('status_expired', $timer->status_expired_form_innovation ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired', $timer->status_expired_form_innovation ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Penutupan</div>
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
                                            <i class="fa-solid fa-trash-can mx-auto me-1"></i> Hapus
                                        </button>
                                        @endif
                                        <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                            <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                        </a>
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
                                            <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Simpan
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

                <div class="tab-pane fade" id="pills-appraisement" role="tabpanel" aria-labelledby="pills-appraisement-tab" tabindex="0">

                    @if(session('message-update-appraisement-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-appraisement-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-create-appraisement-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-appraisement-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-delete-appraisement-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert" id="message-delete-appraisement-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-appraisement-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-appraisement-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-appraisement-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-create-appraisement-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-appraisement-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-delete-appraisement-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-appraisement-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="card my-4">

                        <!-- Form Timer Countdown Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Penilaian Inovasi</h5>
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
                                <div class="mb-3 row {{ $errors->has('date_time_open_countdown_inovation_appraisement') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_countdown_inovation_appraisement" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Penilaian</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_countdown_inovation_appraisement') ? 'is-invalid' : '' }}" id="date_time_open_countdown_inovation_appraisement"
                                                name="date_time_open_countdown_inovation_appraisement" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_inovation_appraisement') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_inovation_appraisement', $timer->date_time_open_appraisement) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_form_innovation != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_form_innovation)->addDays(1)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_countdown_inovation_appraisement" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_appraismentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_countdown_inovation_appraisement') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_countdown_inovation_appraisement') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_appraisement') ? 'is-invalid' : '' }}">
                                    <label for="status_open_appraisement" class="col-sm-3 col-form-label">Status Pembukaan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_appraisement') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_appraisement') }}" id="oldOpenStatusAppraisment" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_appraisement', $timer->status_open_appraisement) }}" id="oldStatusOpenAppraisment" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_appraisement') ? 'is-invalid' : '' }}" id="status_open_appraisement"
                                                name="status_open_appraisement" placeholder="--Pilih Status Pembukaan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_appraisement" data-val="true" aria-label="status_open_appraisement" data-placeholder="-- Pilih Status Pembukaan --">
                                                <option disabled selected>-- Pilih Status Pembukaan --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_appraisement' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_appraisement' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_appraisement', $timer->status_open_appraisement ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_appraisement', $timer->status_open_appraisement ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenAppraismentHelp" class="form-text">Pilih Status Pembukaan</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_appraisement') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_appraisement') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_countdown_inovation_appraisement') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_countdown_inovation_appraisement" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Penilaian</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_countdown_inovation_appraisement') ? 'is-invalid' : '' }}" id="date_time_expired_countdown_inovation_appraisement"
                                                name="date_time_expired_countdown_inovation_appraisement" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_inovation_appraisement') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_inovation_appraisement', $timer->date_time_expired_appraisement) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_form_innovation != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_form_innovation)->addDays(2)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_countdown_inovation_appraisement" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_apprasimentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_countdown_inovation_appraisement') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_countdown_inovation_appraisement') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                 <!-- Status Close -->
                                 <div class="mb-3 row {{ $errors->has('status_expired_appraisement') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_appraisement" class="col-sm-3 col-form-label">Status Penutupan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_appraisement') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_appraisement') }}" id="oldExpiredStatusAppraisment" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_appraisement', $timer->status_expired_appraisement) }}" id="oldStatusExpiredAppraisment" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_appraisement') ? 'is-invalid' : '' }}" id="status_expired_appraisement"
                                                name="status_expired_appraisement" placeholder="--Pilih Status Penutupan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_appraisement" data-val="true" aria-label="status_expired_appraisement" data-placeholder="-- Pilih Status Penutupan --">
                                                <option disabled selected>-- Pilih Status Penutupan --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_appraisement' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_appraisement' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_appraisement', $timer->status_expired_appraisement ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_appraisement', $timer->status_expired_appraisement ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Penutupan</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_appraisement') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_appraisement') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <div class="justify-content-between">
                                        @if ($timers->isNotEmpty())
                                            @if ($timers[0]->date_time_open_appraisement != null)
                                            <button type="button" class="btn btn-danger btn-lg" style="color: black" id="deleteStatusID" data-val="{{ $timer->id }}">
                                                <i class="fa-solid fa-trash-can mx-auto me-1"></i> Hapus
                                            </button>
                                            @endif
                                            <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                                <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                            </a>
                                            @if ($timers[0]->date_time_open_appraisement == null)
                                            <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatusNullAppraisment()">
                                                <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                            </button>
                                            @else
                                            <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatusAppraisment();">
                                                <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                            </button>
                                            @endif
                                            <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                                @if ($timers[0]->date_time_open_appraisement == null)
                                                <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Simpan
                                                @else
                                                <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Update
                                                @endif
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <!-- Action Button -->

                            </form>

                        </div>
                        <!-- Form Timer Countdown -->

                    </div>

                </div>

                <div class="tab-pane fade" id="pills-signature_role2" role="tabpanel" aria-labelledby="pills-signature_role2-tab" tabindex="0">

                    @if(session('message-update-signature-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-signature-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-create-signature-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-signature-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-delete-signature-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert" id="message-delete-signature-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-signature-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-signature-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-signature-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-create-signature-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-signature-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-delete-signature-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-signature-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="card my-4">

                        <!-- Form Timer Countdown Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Tanda Tangan Inovasi</h5>
                        </div>
                        <!--/ Form Timer Countdown Title -->

                        <!-- Form Timer Countdown -->
                        <div class="card-body py-xl-5 py-sm-5 px-xl-5">
                            <form id="formCreateTimerAppraismentInovation" class="mx-2" method="POST" action="{{ route('sdm.postTimerCountDownSignature.Index.Create.SDM') }}">
                                @csrf
                                @if ($timer == null)
                                <input type="hidden" name="id" value="">
                                @else
                                <input type="hidden" name="id" value="{{ $timer->id }}">
                                @endif


                                <div class="divider">
                                    <div class="divider-text">Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</div>
                                </div>


                                <!-- Timer Countdown-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_signature_human_resource_3" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Tanda Tangan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_signature_human_resource_3') ? 'is-invalid' : '' }}" id="date_time_open_signature_human_resource_3"
                                                name="date_time_open_signature_human_resource_3" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_3') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_3', $timer->date_time_open_signature_human_resource_3) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisement != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisement)->addDays(1)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_signature_human_resource_3" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_appraismentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_signature_human_resource_3') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_signature_human_resource_3') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                    <label for="status_open_signature_human_resource_3" class="col-sm-3 col-form-label">Status Pembukaan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_3') }}" id="oldOpenStatusAppraisment3" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_3', $timer->status_open_signature_human_resource_3) }}" id="oldStatusOpenAppraisment3" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_signature_human_resource_3') ? 'is-invalid' : '' }}" id="status_open_signature_human_resource_3"
                                                name="status_open_signature_human_resource_3" placeholder="--Pilih Status Pembukaan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_signature_human_resource_3" data-val="true" aria-label="status_open_signature_human_resource_3" data-placeholder="-- Pilih Status Pembukaan --">
                                                <option disabled selected>-- Pilih Status Pembukaan --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_signature_human_resource_3' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_3' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_signature_human_resource_3', $timer->status_open_signature_human_resource_3 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_3', $timer->status_open_signature_human_resource_3 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenAppraismentHelp" class="form-text">Pilih Status Pembukaan</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_signature_human_resource_3') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_signature_human_resource_3') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_signature_human_resource_3" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Tanda Tangan </label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_signature_human_resource_3') ? 'is-invalid' : '' }}" id="date_time_expired_signature_human_resource_3"
                                                name="date_time_expired_signature_human_resource_3" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_3') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_3', $timer->date_time_expired_signature_human_resource_3) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisement != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisement)->addDays(2)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_signature_human_resource_3" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_apprasimentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_signature_human_resource_3') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_signature_human_resource_3') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                <!-- Status Close -->
                                <div class="mb-3 row {{ $errors->has('status_expired_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_signature_human_resource_3" class="col-sm-3 col-form-label">Status Penutupan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_3') }}" id="oldExpiredStatusAppraisment3" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_3', $timer->status_expired_signature_human_resource_3) }}" id="oldStatusExpiredAppraisment3" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_signature_human_resource_3') ? 'is-invalid' : '' }}" id="status_expired_signature_human_resource_3"
                                                name="status_expired_signature_human_resource_3" placeholder="--Pilih Status Penutupan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_signature_human_resource_3" data-val="true" aria-label="status_expired_signature_human_resource_3" data-placeholder="-- Pilih Status Penutupan --">
                                                <option disabled selected>-- Pilih Status Penutupan --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_signature_human_resource_3' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_3' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_signature_human_resource_3', $timer->status_expired_signature_human_resource_3 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_3', $timer->status_expired_signature_human_resource_3 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Penutupan</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_signature_human_resource_3') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_signature_human_resource_3') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->


                                <div class="divider">
                                    <div class="divider-text">Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</div>
                                </div>


                                <!-- Timer Countdown-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_signature_human_resource_2" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Tanda Tangan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_signature_human_resource_2') ? 'is-invalid' : '' }}" id="date_time_open_signature_human_resource_2"
                                                name="date_time_open_signature_human_resource_2" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_2') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_2', $timer->date_time_open_signature_human_resource_2) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisement != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisement)->addDays(3)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_signature_human_resource_2" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_appraismentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_signature_human_resource_2') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_signature_human_resource_2') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                    <label for="status_open_signature_human_resource_2" class="col-sm-3 col-form-label">Status Pembukaan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_2') }}" id="oldOpenStatusAppraisment2" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_2', $timer->status_open_signature_human_resource_2) }}" id="oldStatusOpenAppraisment2" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_signature_human_resource_2') ? 'is-invalid' : '' }}" id="status_open_signature_human_resource_2"
                                                name="status_open_signature_human_resource_2" placeholder="--Pilih Status Pembukaan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_signature_human_resource_2" data-val="true" aria-label="status_open_signature_human_resource_2" data-placeholder="-- Pilih Status Pembukaan --">
                                                <option disabled selected>-- Pilih Status Pembukaan --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_signature_human_resource_2' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_2' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_signature_human_resource_2', $timer->status_open_signature_human_resource_2 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_2', $timer->status_open_signature_human_resource_2 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenAppraismentHelp" class="form-text">Pilih Status Pembukaan</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_signature_human_resource_2') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_signature_human_resource_2') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_signature_human_resource_2" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Tanda Tangan Kepala Biro Sumber Daya Manusia</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_signature_human_resource_2') ? 'is-invalid' : '' }}" id="date_time_expired_signature_human_resource_2"
                                                name="date_time_expired_signature_human_resource_2" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_2') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_2', $timer->date_time_expired_signature_human_resource_2) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisement != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisement)->addDays(4)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_signature_human_resource_2" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_apprasimentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_signature_human_resource_2') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_signature_human_resource_2') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                <!-- Status Close -->
                                <div class="mb-3 row {{ $errors->has('status_expired_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_signature_human_resource_2" class="col-sm-3 col-form-label">Status Penutupan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_2') }}" id="oldExpiredStatusAppraisment2" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_2', $timer->status_expired_signature_human_resource_2) }}" id="oldStatusExpiredAppraisment2" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_signature_human_resource_2') ? 'is-invalid' : '' }}" id="status_expired_signature_human_resource_2"
                                                name="status_expired_signature_human_resource_2" placeholder="--Pilih Status Penutupan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_signature_human_resource_2" data-val="true" aria-label="status_expired_signature_human_resource_2" data-placeholder="-- Pilih Status Penutupan --">
                                                <option disabled selected>-- Pilih Status Penutupan --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_signature_human_resource_2' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_2' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_signature_human_resource_2', $timer->status_expired_signature_human_resource_2 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_2', $timer->status_expired_signature_human_resource_2 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Penutupan</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_signature_human_resource_2') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_signature_human_resource_2') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->


                                <div class="divider">
                                    <div class="divider-text">Kepala Biro Sumber Daya Manusia</div>
                                </div>

                                <!-- Timer Countdown-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_signature_human_resource_1" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Tanda Tangan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_signature_human_resource_1') ? 'is-invalid' : '' }}" id="date_time_open_signature_human_resource_1"
                                                name="date_time_open_signature_human_resource_1" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_1') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_1', $timer->date_time_open_signature_human_resource_1) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisement != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisement)->addDays(5)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_signature_human_resource_1" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_appraismentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_signature_human_resource_1') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_signature_human_resource_1') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                    <label for="status_open_signature_human_resource_1" class="col-sm-3 col-form-label">Status Pembukaan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_1') }}" id="oldOpenStatusAppraisment1" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_1', $timer->status_open_signature_human_resource_1) }}" id="oldStatusOpenAppraisment1" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_signature_human_resource_1') ? 'is-invalid' : '' }}" id="status_open_signature_human_resource_1"
                                                name="status_open_signature_human_resource_1" placeholder="--Pilih Status Pembukaan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_signature_human_resource_1" data-val="true" aria-label="status_open_signature_human_resource_1" data-placeholder="-- Pilih Status Pembukaan --">
                                                <option disabled selected>-- Pilih Status Pembukaan --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_signature_human_resource_1' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_1' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_signature_human_resource_1', $timer->status_open_signature_human_resource_1 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_1', $timer->status_open_signature_human_resource_1 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenAppraismentHelp" class="form-text">Pilih Status Pembukaan</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_signature_human_resource_1') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_signature_human_resource_1') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_signature_human_resource_1" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Tanda Tangan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_signature_human_resource_1') ? 'is-invalid' : '' }}" id="date_time_expired_signature_human_resource_1"
                                                name="date_time_expired_signature_human_resource_1" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_1') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_1', $timer->date_time_expired_signature_human_resource_1) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisement != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisement)->addDays(6)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_signature_human_resource_1" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_apprasimentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_signature_human_resource_1') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_signature_human_resource_1') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                <!-- Status Close -->
                                <div class="mb-3 row {{ $errors->has('status_expired_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_signature_human_resource_1" class="col-sm-3 col-form-label">Status Penutupan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_1') }}" id="oldExpiredStatusAppraisment1" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_1', $timer->status_expired_signature_human_resource_1) }}" id="oldStatusExpiredAppraisment1" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_signature_human_resource_1') ? 'is-invalid' : '' }}" id="status_expired_signature_human_resource_1"
                                                name="status_expired_signature_human_resource_1" placeholder="--Pilih Status Penutupan --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_signature_human_resource_1" data-val="true" aria-label="status_expired_signature_human_resource_1" data-placeholder="-- Pilih Status Penutupan --">
                                                <option disabled selected>-- Pilih Status Penutupan --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_signature_human_resource_1' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_1' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_signature_human_resource_1', $timer->status_expired_signature_human_resource_1 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_1', $timer->status_expired_signature_human_resource_1 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Penutupan</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_signature_human_resource_1') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_signature_human_resource_1') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->


                                <!-- Action Button -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <div class="justify-content-between">
                                        @if ($timers->isNotEmpty())
                                            @if ($timers[0]->date_time_open_signature_human_resource_3 != null)
                                            <button type="button" class="btn btn-danger btn-lg" style="color: black" id="deleteStatusIDSignature" data-val="{{ $timer->id }}">
                                                <i class="fa-solid fa-trash-can mx-auto me-1"></i> Hapus
                                            </button>
                                            @endif
                                            <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                                <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                            </a>
                                            @if ($timers[0]->date_time_open_signature_human_resource_3 == null)
                                            <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatusNullsdm()">
                                                <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                            </button>
                                            @else
                                            <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatussdm();">
                                                <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                            </button>
                                            @endif
                                            <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                                @if ($timers[0]->date_time_open_signature_human_resource_3 == null)
                                                <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Simpan
                                                @else
                                                <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Update
                                                @endif
                                            </button>
                                        @endif
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
