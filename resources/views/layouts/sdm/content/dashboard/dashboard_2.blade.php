@extends('template.sdm.template')

@section('css_header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <style>
        @media (min-width: 992px) {
            .dashboardSDM2Info {
                display: flex;
                margin: 0 auto;
            }
        }
        @media (max-width: 991.98px) {
            .dashboardSDM2Info {
                display: flex;
                margin: 0 100px;
            }
        }

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
            .dashboardEmployeesInfo {
                display: flex;
                margin: 0 auto;
            }
        }
        @media (max-width: 991.98px) {
            .dashboardEmployeesInfo {
                display: flex;
                margin: 0 100px;
            }
        }

        /* card */
        @media (min-width: 992px) {
            .cardInovation {
                max-width: 740px;
                min-height: 26.5vh;
                max-height: 25vh;
            }
            .cardRepresentative {
                max-width: 740px;
                min-height: 26.5vh;
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
                            title: 'Tanda Tangan Inovasi Dibuka Besok',
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
                            title: 'Tanda Tangan Inovasi Dibuka dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Tanda Tangan Inovasi Dibuka dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Tanda Tangan Inovasi Sudah Dibuka',
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
                            title: 'Tanda Tangan Inovasi Ditutup Besok',
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
                            title: 'Tanda Tangan Inovasi Ditutup dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Tanda Tangan Inovasi Ditutup dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Tanda Tangan Inovasi Sudah Ditutup',
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
                    if(event.offset.totalDays == 0 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Tanda Tangan Teladan Dibuka Besok',
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
                            title: 'Tanda Tangan Teladan Dibuka dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Tanda Tangan Teladan Dibuka dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Tanda Tangan Teladan Sudah Dibuka',
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
                    if(event.offset.totalDays == 0 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Tanda Tangan Teladan Ditutup Besok',
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
                            title: 'Tanda Tangan Teladan Ditutup dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Tanda Tangan Teladan Ditutup dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Tanda Tangan Teladan Sudah Ditutup',
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
                        @if (Auth::guard('human_resources')->user()->photo_profile)
                            <!-- Role 2 -->
                            <img src="{{ asset( 'storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}" class="img-fluid rounded-start mx-auto d-block" alt="human_resources-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @else
                        <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1" class="img-fluid rounded-start mx-auto d-block" alt="admin-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @endif
                        <!--/ Photo Profile -->
                    </div>
                    <div class="dashboardSDM2Info">
                        <div class="card-body d-flex flex-column justify-content-center align-self-center">
                            <h3 class="card-title text-center"><strong> {{ Auth::guard('human_resources')->user()->full_name }} </strong></h3>
                            <p class="card-text text-center"> Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha </p>
                            @if (Cache::has('humanResource-is-online-' . Auth::guard('human_resources')->user()->id))
                            <p class="card-text text-success text-center"><small class="text-muted">Online</small></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-6 col-md-5 order-1">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-2 visible shadow-lg d-flex justify-content-center align-self-center cardInovation">
                        <div class="d-flex justify-content-center align-self-center cardFormInovation">
                            @if ($timerInovasi == null)
                            <div class="d-flex justify-content-center align-self-center">
                                <span class="text-center">
                                    <h3>Tanda Tangan Inovasi Ditutup</h3>
                                </span>
                            </div>
                            @else
                                @if (
                                    (
                                        ($timerInovasi->status_open_signature_human_resource_2 == 0 && $timerInovasi->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString()  ) && ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2 )
                                    )
                                    ||
                                    (
                                        ($timerInovasi->status_open_signature_human_resource_2 == 0 && $timerInovasi->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2 )
                                    )
                                )
                                <div class="container-fluid">
                                    <div class="titleCountDownNonActive">
                                        <h3>
                                            <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Tanda Tangan Inovasi</span>
                                        </h3>
                                    </div>
                                </div>

                                @elseif (
                                    (
                                                ($timerInovasi->status_open_signature_human_resource_2 == 1
                                            && ($timerInovasi->date_time_open_signature_human_resource_2 > \Carbon\Carbon::now()->toDateTimeString()  || $timerInovasi->date_time_open_signature_human_resource_2 == \Carbon\Carbon::now()->toDateTimeString() ))
                                        &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2 )
                                    )
                                    ||
                                    (
                                                ($timerInovasi->status_open_signature_human_resource_2 == 1
                                            && ($timerInovasi->date_time_open_signature_human_resource_2 > \Carbon\Carbon::now()->toDateTimeString()  || $timerInovasi->date_time_open_signature_human_resource_2 == \Carbon\Carbon::now()->toDateTimeString()) )
                                        &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2 )
                                    )
                                )
                                <div class="container-fluid swiper1">
                                    <div class="openTimerCountDown swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="titleCountDown">
                                                <h3>Pembukaan Tanda Tangan Inovasi</h3>
                                            </div>
                                            <div class="dateCountDown">
                                                <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_2)->isoFormat('dddd') }}</b></span>
                                                <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_2)->isoFormat('D') }}</b></span>
                                                <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_2)->isoFormat('MMMM') }}</b></span>
                                                <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_2)->isoFormat('Y') }}</b></span>
                                            </div>
                                            <div class="timeCountDown">
                                                <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_2)->isoFormat('hh') }}</b></span>
                                                <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_2)->isoFormat('mm') }}</b></span>
                                                <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_2)->isoFormat('a') }}</b></span>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="titleCountDown">
                                                <h3>Coming Soon</h3>
                                            </div>
                                            <div class="wrap-countdown countdown-TA-inovation" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_open_signature_human_resource_2)->toDateTimeString() }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @elseif (
                                    (
                                            (
                                                    ($timerInovasi->status_open_signature_human_resource_2 == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_signature_human_resource_2  || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_signature_human_resource_2 ) )
                                                &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2 )
                                            )
                                        ||  (
                                                    ($timerInovasi->status_open_signature_human_resource_2 == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_signature_human_resource_2 || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_signature_human_resource_2))
                                                &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                            )
                                    )
                                    ||
                                    (
                                            (
                                                    ($timerInovasi->status_open_signature_human_resource_2 == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_signature_human_resource_2 || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_signature_human_resource_2))
                                                &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                            )
                                        || (
                                                    ($timerInovasi->status_open_signature_human_resource_2 == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_signature_human_resource_2 || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_signature_human_resource_2))
                                                &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                            )
                                    )
                                )

                                {{-- <div class="container-fluid">
                                    <!-- Table Tanda Tangan Inovation -->
                                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table-inovation">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Status Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <!--/ Table Tanda Tangan Inovation -->
                                </div> --}}
                                <div class="container-fluid swiper1_1">
                                    <div class="openTimerCountDown swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="titleCountDown">
                                                <h3>Penutupan Tanda Tangan Inovasi</h3>
                                            </div>
                                            <div class="dateCountDown">
                                                <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_2)->isoFormat('dddd') }}</b></span>
                                                <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_2)->isoFormat('D') }}</b></span>
                                                <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_2)->isoFormat('MMMM') }}</b></span>
                                                <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_2)->isoFormat('Y') }}</b></span>
                                            </div>
                                            <div class="timeCountDown">
                                                <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_2)->isoFormat('hh') }}</b></span>
                                                <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_2)->isoFormat('mm') }}</b></span>
                                                <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_2)->isoFormat('a') }}</b></span>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="titleCountDown">
                                                <h3>Closing Soon</h3>
                                            </div>
                                            <div class="wrap-countdown countdown-TA-inovation-closed" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_expired_signature_human_resource_2)->toDateTimeString() }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @elseif (
                                    (
                                            ( ($timerInovasi->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2) && ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_2) )
                                        ||  ( ($timerInovasi->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2) && ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_2) )
                                    )
                                    ||
                                    (
                                            ( ($timerInovasi->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2) && ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_2) )
                                        || ( ($timerInovasi->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2) && ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_2) )
                                    )
                                )

                                <div class="container-fluid">
                                    <div class="titleCountDownNonActive">
                                        <h3>
                                            <span>Tanda Tangan Inovasi Telah Ditutup</span>
                                        </h3>
                                    </div>
                                </div>

                                @endif

                            @endif
                        </div>
                    </div>
                </div>



                <div class="col-12">
                    <div class="card mb-2 visible shadow-lg d-flex justify-content-center align-self-center cardRepresentative">
                        <div class="d-flex justify-content-center align-self-center cardFormRepresentative">
                            @if ($timerTeladan == null)

                            <div class="d-flex justify-content-center align-self-center">
                                <span class="text-center"><h3>Tanda Tangan Teladan Ditutup</h3></span>
                            </div>

                            @else
                                @if (
                                    (
                                        ($timerTeladan->status_open_signature_human_resource_2 == 0 && $timerTeladan->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                    )
                                    ||
                                    (
                                        ($timerTeladan->status_open_signature_human_resource_2 == 0 && $timerTeladan->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString()) && ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                    )
                                )
                                <div class="container-fluid">
                                    <div class="titleCountDownNonActive">
                                        <h3>
                                            <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Tanda Tangan Teladan</span>
                                        </h3>
                                    </div>
                                </div>

                                @elseif (
                                    (
                                                ($timerTeladan->status_open_signature_human_resource_2 == 1
                                            && ($timerTeladan->date_time_open_signature_human_resource_2 > \Carbon\Carbon::now()->toDateTimeString() || $timerTeladan->date_time_open_signature_human_resource_2 == \Carbon\Carbon::now()->toDateTimeString()))
                                        &&  ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                    )
                                    ||
                                    (
                                                ($timerTeladan->status_open_signature_human_resource_2 == 1
                                            && ($timerTeladan->date_time_open_signature_human_resource_2 > \Carbon\Carbon::now()->toDateTimeString() || $timerTeladan->date_time_open_signature_human_resource_2 == \Carbon\Carbon::now()->toDateTimeString()))
                                        &&  ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                    )
                                )
                                <div class="container-fluid swiper1">
                                    <div class="openTimerCountDown swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="titleCountDown">
                                                <h3>Pembukaan Tanda Tangan Teladan</h3>
                                            </div>
                                            <div class="dateCountDown">
                                                <span>Hari <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_2)->isoFormat('dddd') }}</b></span>
                                                <span>Tanggal <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_2)->isoFormat('D') }}</b></span>
                                                <span>Bulan <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_2)->isoFormat('MMMM') }}</b></span>
                                                <span>Tahun <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_2)->isoFormat('Y') }}</b></span>
                                            </div>
                                            <div class="timeCountDown">
                                                <span>Jam <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_2)->isoFormat('hh') }}</b></span>
                                                <span>Menit <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_2)->isoFormat('mm') }}</b></span>
                                                <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_2)->isoFormat('A') }}</b></span>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="titleCountDown">
                                                <h3>Coming Soon</h3>
                                            </div>
                                            <div class="wrap-countdown countdown-TA-representative" data-expire="{{ Carbon\Carbon::parse($timerTeladan->date_time_open_signature_human_resource_2)->toDateTimeString() }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- If we need pagination -->
                                    {{-- <div class="swiper-pagination"></div> --}}
                                </div>

                                @elseif (
                                    (
                                            (
                                                    ($timerTeladan->status_open_signature_human_resource_2 == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerTeladan->date_time_open_signature_human_resource_2 || \Carbon\Carbon::now()->toDateTimeString() == $timerTeladan->date_time_open_signature_human_resource_2) )
                                                &&  ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                            )
                                        ||  (
                                                    ($timerTeladan->status_open_signature_human_resource_2 == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerTeladan->date_time_open_signature_human_resource_2 || \Carbon\Carbon::now()->toDateTimeString() == $timerTeladan->date_time_open_signature_human_resource_2))
                                                &&  ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                            )
                                    )
                                    ||
                                    (
                                            (
                                                    ($timerTeladan->status_open_signature_human_resource_2 == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerTeladan->date_time_open_signature_human_resource_2 || \Carbon\Carbon::now()->toDateTimeString() == $timerTeladan->date_time_open_signature_human_resource_2))
                                                &&  ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                            )
                                        || (
                                                    ($timerTeladan->status_open_signature_human_resource_2 == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerTeladan->date_time_open_signature_human_resource_2 || \Carbon\Carbon::now()->toDateTimeString() == $timerTeladan->date_time_open_signature_human_resource_2))
                                                &&  ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                            )
                                    )
                                )

                                <div class="container-fluid swiper1_1">
                                    <div class="openTimerCountDown swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="titleCountDown">
                                                <h3>Penutupan Tanda Tangan Teladan</h3>
                                            </div>
                                            <div class="dateCountDown">
                                                <span>Hari <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_2)->isoFormat('dddd') }}</b></span>
                                                <span>Tanggal <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_2)->isoFormat('D') }}</b></span>
                                                <span>Bulan <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_2)->isoFormat('MMMM') }}</b></span>
                                                <span>Tahun <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_2)->isoFormat('Y') }}</b></span>
                                            </div>
                                            <div class="timeCountDown">
                                                <span>Jam <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_2)->isoFormat('hh') }}</b></span>
                                                <span>Menit <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_2)->isoFormat('mm') }}</b></span>
                                                <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_2)->isoFormat('a') }}</b></span>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="titleCountDown">
                                                <h3>Closing Soon</h3>
                                            </div>
                                            <div class="wrap-countdown countdown-TA-representative-closed" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_expired_signature_human_resource_2)->toDateTimeString() }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="container-fluid">
                                    <!-- Table Tanda Tangan Teladan -->
                                    <table class="table table-striped table-bordered" cellspacing="0" id="data-table-representative">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Status Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <!--/ Table Tanda Tangan Teladan -->
                                </div> --}}

                                @elseif (
                                    (
                                            ( ($timerTeladan->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2) && ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_2) )
                                        ||  ( ($timerTeladan->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2) && ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_2) )
                                    )
                                    ||
                                    (
                                            ( ($timerTeladan->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2) && ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_2) )
                                        || ( ($timerTeladan->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2) && ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_2) )
                                    )
                                )

                                <div class="container-fluid">
                                    <div class="titleCountDownNonActive">
                                        <h3>
                                            <span>Tanda Tangan Teladan Telah Ditutup</span>
                                        </h3>
                                    </div>
                                </div>
                                @endif

                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@stop
