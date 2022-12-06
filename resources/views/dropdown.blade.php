@extends('template.sdm.template')

@section('css_header')
    <style>
    .mercado-countdown {
        color:#333;
        display:block;
        font-size:50px;
        line-height:100%;
        padding:0;
        margin:0;
        height:1.7em;
        /* float:left; */
        /* position:relative; */
        /* white-space:nowrap; */
        /* -webkit-transform: translate(-50%,0);
        transform: translate(-50%,0); */
        text-align:center;
    }

    /* .mercado-countdown {
        color:#333;
        display:block;
        font-size:50px;
        line-height:100%;
        padding:0;
        margin:0;
        height:1.7em;
    } */

    /* .mercado-countdown span {
        font-size:0px !important;
    } */

    /* .mercado-countdown span {
        position:relative;
        white-space:nowrap;
        display:block;
        float:left;
        padding:0;
        margin:0;
    } */

    /* .mercado-countdown span {
        position:absolute;
        color:#fff;
        font-size:20%;
        top:100%;
        line-height:1em;
        left:50%;
        -webkit-transform: translate(-50%,0);
        transform: translate(-50%,0);
        text-align:center;
        padding-top: .5em;
    } */

    /* .mercado-countdown span {
        white-space:nowrap;
        position:relative;
        padding:0;
        margin:0;
        display: inline-block;
        float:left;
        height:1.2em;
        overflow-y:hidden;
    } */

    /* .mercado-countdown span {
        font-size:25%;
    } */

    /* .mercado-countdown span {
        white-space:nowrap;
        display:block;
        float:left;
        padding:0;
        margin:0;
        color:#fff;
        min-width: .1em;
        white-space:nowrap;
        display:block;
        padding-top:0.1em;
        padding-bottom:0.1em;
        line-height:1em;
    } */

    /* .mercado-countdown span {
        display:block;
        visibility:hidden;
        position:relative;
        border-radius:0.1em;
        top:0;
        left:0;
        right:0;
        bottom:0;
        z-index:8;
        padding-top:0.1em;
        padding-bottom:0.1em;
        padding-left:0.1em;
        padding-right:0.1em;
        box-sizing: border-box;
        text-align:center;
    } */

    .mercado-countdown span {
        display:block;
        position:relative;
        border-radius:0.1em;
        top:0;
        left:0;
        right:0;
        bottom:0;
        z-index:8;
        height:1.2em;
        background:#fff;
        padding-top:0.1em;
        padding-bottom:0.1em;
        padding-left:0.1em;
        padding-right:0.1em;
        box-sizing: border-box;
        text-align:center;
        -webkit-user-select:none;
            -moz-user-select:none;
            -ms-user-select:none;
                user-select:none;
    }

    /* .mercado-countdown span {
        z-index:10;
        top:0;
        left:0;
        right:0;
        height:50%;
        -webkit-backface-visibility:hidden;
                backface-visibility:hidden;
        pointer-events:none;
        overflow:hidden;
        position:absolute;
        background:#fff;
        padding-top:0.1em;
        padding-bottom:0;
        padding-left:0.1em;
        padding-right:0.1em;
        border-top-left-radius:0.1em;
        border-top-right-radius:0.1em;
        box-sizing: border-box;
        text-align:center;
        -webkit-user-select:none;
            -moz-user-select:none;
            -ms-user-select:none;
                user-select:none;
        transition: background0s linear, -webkit-transform0s linear;
        transition: transform0s linear, background0s linear;
        transition: transform0s linear, background0s linear, -webkit-transform0s linear;
        -webkit-transform-origin:0 0.6em 0 !important;
                transform-origin:0 0.6em 0 !important;
        -webkit-transform-style: preserve-3d!important;
                transform-style: preserve-3d!important;
        z-index:20;
    } */

    /* .mercado-countdown span {
        transition: background0.2s linear, -webkit-transform0.2s linear;
        transition: transform0.2s linear, background0.2s linear;
        transition: transform0.2s linear, background0.2s linear, -webkit-transform0.2s linear;
        -webkit-transform: rotateX(90deg);
            transform: rotateX(90deg);
            background:#cccccc;
    } */

    /* .mercado-countdown span {
        visibility:hidden;
        position:absolute;
        height:50%;
        left:0;
        right:0;
        background:#cccccc;
        transition: -webkit-transform0.2s linear;
        transition: transform0.2s linear;
        transition: transform0.2s linear, -webkit-transform0.2s linear;
        line-height:0em !important;
        top:50% !important;
        bottom:auto !important;
        padding-top:0;
        padding-bottom:0.1em;
        padding-left:0.1em;
        padding-right:0.1em;
        border-bottom-left-radius:0.1em;
        border-bottom-right-radius:0.1em;
        overflow:hidden;
        text-align:center;
        -webkit-user-select:none;
            -moz-user-select:none;
            -ms-user-select:none;
                user-select:none;
        transition: background0s linear, -webkit-transform0s linear;
        transition: transform0s linear, background0s linear;
        transition: transform0s linear, background0s linear, -webkit-transform0s linear;
        -webkit-transform: rotateX(-90deg);
                transform: rotateX(-90deg);
        -webkit-transform-style: preserve-3d!important;
                transform-style: preserve-3d!important;
        -webkit-transform-origin:0 0 0 !important;
                transform-origin:0 0 0 !important;
        z-index:20;
    } */

    /* .mercado-countdown span {
        visibility:visible;
        transition: background0.2s linear0.2s, -webkit-transform0.2s linear0.2s;
        transition: transform0.2s linear0.2s, background0.2s linear0.2s;
        transition: transform0.2s linear0.2s, background0.2s linear0.2s, -webkit-transform0.2s linear0.2s;
        -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
        background:#fff;
    } */

    /* .mercado-countdown span {
        -webkit-backface-visibility:hidden;
                backface-visibility:hidden;
        pointer-events:none;
        position:absolute;
        overflow:hidden;
        background:#fff;
        height:50%;
        left:0;
        right:0;
        bottom:0;
        z-index:9;
        line-height:0em;
        padding-top:0;
        padding-bottom:0.1em;
        padding-left:0.1em;
        padding-right:0.1em;
        border-bottom-left-radius:0.1em;
        border-bottom-right-radius:0.1em;
        box-sizing: border-box;
        text-align:center;
        transition:none;
    } */

    /* .mercado-countdown span {
        transition: background0.2s linear;
        background:#cccccc;
    } */

    /* .mercado-countdown span:after {
        content:"";
        position:absolute;
        height:2px;
        background: rgba(0,0,0,0.5);
        top:50%;
        display:block;
        z-index:30;
        left:0;
        right:0;
    } */

    </style>
@stop

@section('js_footer')
<script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.min.js')}}"></script>
<script>
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
                    });
                });
         }
      },

   }

      window.onload = function () {
         MERCADO_JS.init();
      }

      })(window.Zepto || window.jQuery, window, document);
</script>
@stop

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Timer Countdown Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Timer Countdown</h5>
                </div>
                <!--/ Form Timer Countdown Title -->

                <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($timer->date_time_form_inovation)->format('Y/m/d h:i:s') }}"></div>
            </div>
        </div>
    </div>
</div>
@endsection
