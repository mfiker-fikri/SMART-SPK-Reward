@extends('template.hwu.template')

@section('js_header')

@stop

@section('css_header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <style>
        @media (min-width: 992px) {
            .swiper1 {
                margin: 0;
                padding: 0;
                max-width: 450px;
                min-width: 450px;
                max-height: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
            }

            .swiper1_1 {
                margin: 0;
                padding: 0;
                max-width: 450px;
                min-width: 450px;
                max-height: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
            }
        }

        @media (max-width: 991.98px) {
            .swiper1 {
                margin: 0;
                padding: 0;
                max-width: 450px;
                min-width: 450px;
                max-height: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
            }

            .swiper1_1 {
                margin: 0;
                padding: 0;
                max-width: 450px;
                min-width: 450px;
                max-height: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
            }
        }
        @media (max-width: 575.98px) {
            .swiper1 {
                margin: 0;
                padding: 0;
                max-width: 400px;
                min-width: 400px;
                max-height: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
            }

            .swiper1_1 {
                margin: 0;
                padding: 0;
                max-width: 400px;
                min-width: 400px;
                max-height: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
            }
        }
        @media (max-width: 275.98px) {
            .swiper1 {
                margin: 0;
                padding: 0;
                max-width: 100px;
                min-width: 100px;
                max-height: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
            }

            .swiper1_1 {
                margin: 0;
                padding: 0;
                max-width: 100px;
                min-width: 100px;
                max-height: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
            }
        }


        @media (min-width: 992px) {
            .dashboardHWUInfo {
                display: flex;
                margin: 0 auto;
            }
        }
        @media (max-width: 991.98px) {
            .dashboardHWUInfo {
                display: flex;
                margin: 0 100px;
            }
        }

        /* card */
        @media (min-width: 992px) {
            .cardInovation {
                max-width: 740px;
                min-height: 27.7vh;
                max-height: 25vh;
            }
            .cardRepresentative {
                max-width: 740px;
                min-height: 27.7vh;
                max-height: 25vh;
            }
        }
        @media (max-width: 991.98px) {
            .cardInovation {
                max-width: 740px;
                min-height: 35vh;
                max-height: 85vh;
            }
            .cardRepresentative {
                max-width: 740px;
                min-height: 35vh;
                max-height: 85vh;
            }
        }
        @media (max-width: 575.98px) {
            .cardInovation {
                max-width: 740px;
                min-height: 80vh;
                max-height: 80vh;
            }
            .cardRepresentative {
                max-width: 740px;
                min-height: 80vh;
                max-height: 80vh;
            }
        }
        @media (max-width: 275.98px) {
            .cardInovation {
                max-width: 740px;
                min-height: 50vh;
                max-height: 80vh;
            }
            .cardRepresentative {
                max-width: 740px;
                min-height: 50vh;
                max-height: 80vh;
            }
        }
        /* card */

        /* cardForm */
        @media (min-width: 992px) {
            .cardFormInovation {
                max-width: 740px;
                min-height: 100%;
                max-height: 100%;
            }
            .cardFormRepresentative {
                max-width: 740px;
                min-height: 100%;
                max-height: 100%;
            }

        }
        @media (max-width: 991.98px) {
            .cardFormInovation {
                margin: auto;
                padding: 0.5em 0;
                max-width: 740px;
                /* min-height: 200px; */
                /* max-height: 200px; */
            }
            .cardFormRepresentative {
                margin: auto;
                padding: 0.5em 0;
                max-width: 740px;
                /* min-height: 200px; */
                /* max-height: 200px; */
            }
        }
        @media (max-width: 575.98px) {
            .cardFormInovation {
                margin: auto;
                padding: 0.5em 0;
                min-width: 400px;
                max-width: 400px;
                min-height: 400px;
                max-height: 400px;
            }
            .cardFormRepresentative {
                margin: auto;
                padding: 0.5em 0;
                min-width: 400px;
                max-width: 400px;
                min-height: 400px;
                max-height: 400px;
            }
        }
        @media (max-width: 275.98px) {
            .cardFormInovation {
                margin: auto;
                padding: 0.5em 0;
                min-width: 400px;
                max-width: 400px;
                min-height: 400px;
                max-height: 400px;
            }
            .cardFormRepresentative {
                margin: auto;
                padding: 0.5em 0;
                min-width: 400px;
                max-width: 400px;
                min-height: 400px;
                max-height: 400px;
            }
        }
        /* cardForm */


        @media (min-width: 992px) {
            .countdown-TA-inovation {
                padding: 1em 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-inovation-closed {
                padding: 1em 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-inovation span {
                padding: 0;
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

            .countdown-TA-inovation-closed span {
                padding: 0;
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

            .countdown-TA-representative {
                padding: 1em 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-representative-closed {
                padding: 1em 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-representative span {
                padding: 0;
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

            .countdown-TA-representative-closed span {
                padding: 0;
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

            .dateCountDown {
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                font-size: 25px;
                line-height: 100%;
                text-align: center;
            }

            .dateCountDown span{
                padding: 1px 5px;
                margin: 1px 5px;
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
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                font-size: 25px;
                line-height: 100%;
                text-align: center;
            }

            .timeCountDown span{
                padding: 1px 5px;
                margin: 1px 5px;
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
                margin: 0;
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
                margin: auto;
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
            .countdown-TA-inovation {
                padding: 5vh 0;
                margin: 0.5em auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-inovation-closed {
                padding: 5vh 0;
                margin: 0.5em auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-inovation span {
                padding: 0;
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

            .countdown-TA-inovation-closed span {
                padding: 0;
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

            .countdown-TA-representative {
                padding: 5vh 0;
                margin: 0.5em auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-representative-closed {
                padding: 5vh 0;
                margin: 0.5em auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-representative span {
                padding: 0;
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

            .countdown-TA-representative-closed span {
                padding: 0;
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

            .dateCountDown {
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                font-size: 25px;
                line-height: 100%;
                text-align: center;
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
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                font-size: 25px;
                line-height: 100%;
                text-align: center;
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
                margin: 0;
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
                margin: auto;
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

        @media (max-width: 575.98px) {
            .countdown-TA-inovation {
                padding: 5vh 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-inovation-closed {
                padding: 5vh 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-inovation span {
                padding: 0;
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

            .countdown-TA-inovation-closed span {
                padding: 0;
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

            .countdown-TA-representative {
                padding: 5vh 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-representative-closed {
                padding: 5vh 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-representative span {
                padding: 0;
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

            .countdown-TA-representative-closed span {
                padding: 0;
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

            .dateCountDown {
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                font-size: 25px;
                line-height: 100%;
                text-align: center;
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
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                font-size: 25px;
                line-height: 100%;
                text-align: center;
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
                margin: 0;
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
                margin: auto;
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
        @media (max-width: 275.98px) {
            .countdown-TA-inovation {
                padding: 5vh 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-inovation-closed {
                padding: 5vh 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-inovation span {
                padding: 0;
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

            .countdown-TA-inovation-closed span {
                padding: 0;
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

            .countdown-TA-representative {
                padding: 5vh 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-representative-closed {
                padding: 5vh 0;
                margin: auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                color: #333;
                font-size: 25px;
                text-align: center;
            }

            .countdown-TA-representative span {
                padding: 0;
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

            .countdown-TA-representative-closed span {
                padding: 0;
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

            .dateCountDown {
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                font-size: 25px;
                line-height: 100%;
                text-align: center;
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
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: center;
                align-items: center;
                align-content: center;
                font-size: 25px;
                line-height: 100%;
                text-align: center;
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
                margin: 0;
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
                margin: auto;
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
    </style>
@stop

<!-- Footer Js -->
@section('js_footer')
    <!-- Timer Countdown -->
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $(".countdown-TA-inovation").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    if(event.offset.totalDays == 0 && flag2) {
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
                    if(event.offset.totalHours == 0 && flag2) {
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
                    if(event.offset.totalMinutes == 0 && flag2) {
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
            $(".countdown-TA-inovation-closed").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    if(event.offset.totalDays == 0 && flag2) {
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
                    if(event.offset.totalHours == 0 && flag2) {
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
                    if(event.offset.totalMinutes == 0 && flag2) {
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

    <script>
        $(document).ready(function () {
            $(".countdown-TA-representative").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    if(event.offset.totalDays == 1 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Penilaian Teladan Ditutup dalam' + ' ' + 2 + 'Hari',
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
                            title: 'Penilaian Teladan Ditutup Besok',
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
                            title: 'Penilaian Teladan Ditutup dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Penilaian Teladan Ditutup dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Penilaian Teladan Sudah Ditutup',
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
            $(".countdown-TA-representative-closed").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    if(event.offset.totalDays == 1 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Penilaian Teladan Ditutup dalam' + ' ' + 2 + 'Hari',
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
                            title: 'Penilaian Teladan Ditutup Besok',
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
                            title: 'Penilaian Teladan Ditutup dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Penilaian Teladan Ditutup dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Penilaian Teladan Sudah Ditutup',
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8.4.5/swiper.esm.min.js"></script>

    <script>
        var swiper = new Swiper(".swiper1", {
            cssMode: true,
            // direction: 'vertical',
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 100,
            spaceBetween: 10,
        });
    </script>

    <script>
        var swiper = new Swiper(".swiper1_1", {
            cssMode: true,
            // direction: 'vertical',
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 100,
            spaceBetween: 10,
        });
    </script>
@stop
<!--/ Footer Js -->


@section('content')

<div class="container-xxl container-p-y">

    <div class="row mx-1">

        <div class="col-md-6 order-0">

            <div class="card mb-3" style="max-width: 740px;min-height: 340px;">
                <div class="d-flex flex-row">
                    <div class="d-flex">
                        <!-- Photo Profile -->
                        @if (Auth::guard('head_work_units')->user()->photo_profile)
                        <img src="{{ asset( 'storage/headworkunit/photos/photoProfile/'. Auth::guard('head_work_units')->user()->username. '/' . Auth::guard('head_work_units')->user()->photo_profile) }}" class="img-fluid rounded-start mx-auto d-block" alt="head_work_units-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @else
                        <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1" class="img-fluid rounded-start mx-auto d-block" alt="head_work_units-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @endif
                        <!--/ Photo Profile -->
                    </div>
                    <div class="dashboardHWUInfo">
                        <div class="card-body d-flex flex-column justify-content-center align-self-center">
                            <h3 class="card-title text-center"><strong> {{ Auth::guard('head_work_units')->user()->full_name }} </strong></h3>
                            <p class="card-text text-center"> Kepala Satuan Kerja </p>
                            @if (Cache::has('head_work_units-is-online-' . Auth::guard('head_work_units')->user()->id))
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
                                <div class="d-flex flex-column align-self-center mx-3">
                                    {{-- <h3 class="card-title text-center"><strong> {{ $sumCategory }} </strong></h4> --}}
                                    <p class="card-text"> Kategori </p>
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
                                <div class="d-flex flex-column align-self-center mx-3">
                                    {{-- <h3 class="card-title text-center"><strong> {{ $sumCriteria }} </strong></h3> --}}
                                    <p class="card-text"> Kriteria  </p>
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
                                <div class="d-flex flex-column align-self-center mx-3">
                                    {{-- <h3 class="card-title text-center"><strong> {{ $sumParameter }} </strong></h3> --}}
                                    <p class="card-text"> Parameter </p>
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
