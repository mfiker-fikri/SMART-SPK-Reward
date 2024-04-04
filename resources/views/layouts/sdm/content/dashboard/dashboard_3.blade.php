@extends('template.sdm.template')

@section('css_header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <style>
        @media (min-width: 992px) {
            .dashboardSDM3Info {
                display: flex;
                margin: 0 auto;
            }
        }
        @media (max-width: 991.98px) {
            .dashboardSDM3Info {
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
                max-height: 16em;
                min-height: 16em;
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
                max-height: 16em;
                min-height: 16em;
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
                /* max-width: 450px; */
                /* min-width: 450px; */
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
                /* max-width: 450px; */
                /* min-width: 450px; */
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
            .countdown-inovation {
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

            .countdown-inovation-closed {
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

            .countdown-representative {
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

            .countdown-representative-closed {
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

            .countdown-assesment-inovation {
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

            .countdown-assesment-inovation-closed {
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


            .countdown-signature1-inovation {
                padding: 3em 0;
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

            .countdown-signature2-inovation {
                padding: 3em 0;
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

            .countdown-signature3-inovation {
                padding: 3em 0;
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

            .countdown-signature-inovation-closed {
                padding: 3em 0;
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

            .countdown-inovation span {
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

            .countdown-inovation-closed span {
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

            .countdown-representative span {
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

            .countdown-representative-closed span {
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

            .countdown-assesment-inovation span {
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

            .countdown-assesment-inovation-closed span {
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


            .countdown-signature1-inovation span {
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

            .countdown-signature2-inovation span {
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

            .countdown-signature3-inovation span {
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

            .countdown-signature-inovation-closed span {
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

            .countdown-representative {
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

            .countdown-representative span {
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

            .countdown-signature1-representative {
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

            .countdown-signature1-representative span {
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

            .countdown-signature2-representative {
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

            .countdown-signature2-representative span {
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

            .countdown-signature3-representative {
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

            .countdown-signature3-representative span {
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
                min-height: 16em;
                max-height: 16em;
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
            .countdown-inovation {
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

            .countdown-inovation-closed {
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

            .countdown-representative {
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

            .countdown-representative-closed {
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

            .countdown-assesment-inovation {
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

            .countdown-assesment-inovation-closed {
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


            .countdown-signature1-inovation {
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

            .countdown-signature2-inovation {
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

            .countdown-signature3-inovation {
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

            .countdown-signature-inovation-closed {
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

            .countdown-inovation span {
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

            .countdown-inovation-closed span {
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

            .countdown-representative span {
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

            .countdown-representative-closed span {
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

            .countdown-assesment-inovation span {
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

            .countdown-assesment-inovation-closed span {
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


            .countdown-signature1-inovation span {
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

            .countdown-signature2-inovation span {
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

            .countdown-signature3-inovation span {
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

            .countdown-signature-inovation-closed span {
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

            .countdown-representative {
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

            .countdown-representative span {
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

            .countdown-signature1-representative  {
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

            .countdown-signature1-representative span {
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

            .countdown-signature2-representative  {
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

            .countdown-signature2-representative span {
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

            .countdown-signature3-representative  {
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

            .countdown-signature3-representative span {
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
                min-height: 16em;
                max-height: 16em;
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
            .countdown-inovation {
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

            .countdown-inovation-closed {
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

            .countdown-representative {
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

            .countdown-representative-closed {
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

            .countdown-assesment-inovation {
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

            .countdown-assesment-inovation-closed {
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


            .countdown-signature1-inovation {
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

            .countdown-signature2-inovation {
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

            .countdown-signature3-inovation {
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

            .countdown-signature-inovation-closed {
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

            .countdown-inovation span {
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

            .countdown-inovation-closed span {
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

            .countdown-representative span {
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

            .countdown-representative-closed span {
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


            .countdown-assesment-inovation span {
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

            .countdown-assesment-inovation-closed span {
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


            .countdown-signature1-inovation span {
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

            .countdown-signature2-inovation span {
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

            .countdown-signature3-inovation span {
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

            .countdown-signature-inovation-closed span {
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

            .countdown-representative {
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

            .countdown-representative span {
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

            .countdown-signature1-representative  {
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

            .countdown-signature1-representative span {
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

            .countdown-signature2-representative  {
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

            .countdown-signature2-representative span {
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

            .countdown-signature3-representative  {
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

            .countdown-signature3-representative span {
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
            .countdown-inovation {
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

            .countdown-inovation-closed {
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

            .countdown-representative {
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

            .countdown-representative-closed {
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

            .countdown-assesment-inovation {
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

            .countdown-assesment-inovation-closed {
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


            .countdown-signature1-inovation {
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

            .countdown-signature2-inovation {
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

            .countdown-signature3-inovation {
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

            .countdown-signature-inovation-closed {
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

            .countdown-inovation span {
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

            .countdown-inovation-closed span {
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


            .countdown-assesment-inovation span {
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

            .countdown-assesment-inovation-closed span {
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


            .countdown-signature1-inovation span {
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

            .countdown-signature2-inovation span {
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

            .countdown-signature3-inovation span {
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

            .countdown-signature-inovation-closed span {
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

            .countdown-representative {
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

            .countdown-representative span {
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

            .countdown-signature1-representative {
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

            .countdown-signature1-representative span {
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

            .countdown-signature2-representative {
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

            .countdown-signature2-representative span {
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

            .countdown-signature3-representative {
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

            .countdown-signature3-representative span {
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

@section('js_footer')
    <!-- Datatables Status Admin -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard/statusOnlineOfflineTA') }}",
            columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'full_name', name: 'full_name', orderable: false, searchable: false},
                {data: 'username', name: 'username', orderable: false, searchable: false},
                {data: 'status', name: 'status'},
                {data: 'lastSeen', name: 'lastSeen'},
                // {data: 'status', name: 'status', orderable: false, searchable: false},
            ],
            pageLength: 5,
            // lengthChange: false,
            lengthMenu: [ 5 ],
            pagingType: "full_numbers",
            // order: [[ 2 , 'ASC']]
            order: [[ 2 , 'DESC']]
        });

        new $.fn.dataTable.FixedHeader( table );

        if (table) {
            setInterval( function () {
                table.ajax.reload(null, false);
            }, 10000 );
        }
    });
    </script>
    <!--/ Datatables Status Admin -->


    <!-- Timer Countdown -->
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $(".countdown-inovation").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                })
                .on('finish.countdown', function(){
                    Swal.fire({
                        title: 'Berkas Formulir Inovasi Sudah Dibuka',
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
                            clearInterval(timerInterval)
                        },
                    });
                });

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-inovation-closed").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                })
                .on('finish.countdown', function(){
                    Swal.fire({
                        title: 'Berkas Formulir Inovasi Inovasi Sudah Ditutup',
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
                            clearInterval(timerInterval)
                        },
                    });
                });

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-assesment-inovation").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                })
                .on('finish.countdown', function(){
                    Swal.fire({
                        title: 'Penilaian Sudah Dibuka',
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
                            clearInterval(timerInterval)
                        },
                    });
                });

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-assesment-inovation-closed").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-signature1-inovation").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-signature2-inovation").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-signature3-inovation").each( function(){
                var _this = $(this),
                _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-signature-inovation-closed").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });
            });
        });
    </script>


    {{-- Teladan --}}
    <script>
        $(document).ready(function () {
            $(".countdown-representative").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                })
                .on('finish.countdown', function(){
                    Swal.fire({
                        title: 'Penilaian Teladan Sudah Dibuka',
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
                            clearInterval(timerInterval)
                        },
                    });
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-representative-closed").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-signature1-representative").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-signature2-representative").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-signature-representative").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
                        },
                    });
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".countdown-signature-representative-closed").each( function(){
                var _this = $(this);
                var _expire = _this.data('expire');
                flag2 = true;
                _this.countdown(_expire,{
                    elapse:     false,
                    precision:  1000,
                })
                .on('update.countdown', function(event) {
                    // if(event.offset.totalHours == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
                    // if(event.offset.totalMinutes == 0 && flag2) {
                    //     flag2 = false;
                    //     $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
                    // }
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
                            clearInterval(timerInterval)
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
            // mousewheel: true,
            // keyboard: true,

            // navigation: {
            //     nextEl: ".swiper-button-next",
            //     prevEl: ".swiper-button-prev",
            //     hiddenClass: 'swiper-button-hidden',
            // },

            // pagination: {
            //     el: ".swiper-pagination",
            // },
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

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

    {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var userData = {{ Js::from($datas2) }};
        Highcharts.chart('myChart', {
            title: {
                text: 'New User Growth, 2020'
            },
            subtitle: {
                text: 'Source: positronx.io'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Number of New Users'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'New Users',
                data: userData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script> --}}

    <script>

        var labels =  {{ Js::from($labels1) }};

        var representative1 =  {{ Js::from($datas1) }};
        var representative2 =  {{ Js::from($datas2) }};
        var representative3 =  {{ Js::from($datas3) }};
        // console.log(representative);

            var data = {
                labels: labels,
                datasets: [
                    {
                        label: 'Jumlah Pendaftaran Pegawai',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: representative1,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 8,
                    },
                    {
                        label: 'Jumlah Diterima',
                        backgroundColor: 'rgb(2, 245, 67)',
                        borderColor: 'rgb(2, 245, 67)',
                        data: representative2,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 8,
                    },
                    {
                        label: 'Jumlah Tidak Diterima',
                        backgroundColor: 'rgb(196, 59, 25)',
                        borderColor: 'rgb(196, 59, 25)',
                        data: representative3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 8,
                    }
                ]
            };

            const options = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Line Chart',
                        },
                        legend: {
                            position: 'top',
                        },
                    },
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'index',
                        intersec: false
                    },
                    scales: {
                        beginAtZero: true,
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Month',
                                color: '#911',
                                font: {
                                    family: 'Comic Sans MS',
                                    size: 20,
                                    weight: 'bold',
                                    lineHeight: 1.2,
                                },
                                padding: {top: 20, left: 0, right: 0, bottom: 0}
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Value',
                                color: '#191',
                                font: {
                                    family: 'Times',
                                    size: 20,
                                    style: 'normal',
                                    lineHeight: 1.2
                                },
                                padding: {top: 30, left: 0, right: 0, bottom: 0},
                            },
                            min: 0,
                            max: 10,
                            suggestedMin: 0,
                            ticks: {
                                min: 0,
                                stepSize: 1.5,
                                precision: 0,
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    if (Math.floor(value) === value) {
                                        return value;
                                    }
                                }
                            }
                        }
                    }
                }
            };

            var myChart = document.getElementById('myChart').getContext('2d')

            new Chart(
                myChart,
                options
            );


    </script>


@stop

@section('js_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop

@section('content')

<div class="container-xxl container-p-y">

    <div class="row mx-1">

        <div class="col-md-6 order-0">

            <div class="card mb-3 visible shadow-lg" style="max-width: 740px;min-height: 340px;">
                <div class="d-flex flex-row">
                    <div class="d-flex">
                        <!-- Photo Profile -->
                        @if (Auth::guard('human_resources')->user()->photo_profile)
                        <img src="{{ asset( 'storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}" class="img-fluid rounded-start mx-auto d-block" alt="human_resources-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @else
                        <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1" class="img-fluid rounded-start mx-auto d-block" alt="admin-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @endif
                        <!--/ Photo Profile -->
                    </div>
                    <div class="dashboardSDM3Info">
                        <div class="card-body d-flex flex-column justify-content-center align-self-center">
                            <h3 class="card-title text-center"><strong> {{ Auth::guard('human_resources')->user()->full_name }} </strong></h3>
                            <p class="card-text text-center"> Kepala Subbagian Penghargaan, Disiplin, dan Pensiun </p>
                            @if (Cache::has('humanResource-is-online-' . Auth::guard('human_resources')->user()->id))
                            <p class="card-text text-success text-center"><small class="text-muted text-success">Online</small></p>
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
                                <i class="fa-solid fa-list fa-5x me-3"></i>
                                <div class="d-flex flex-column align-self-center">
                                    <h3 class="card-title text-center"><strong> {{ $categories }} </strong></h4>
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
                                <i class="fa-solid fa-list fa-5x me-3"></i>
                                <div class="d-flex flex-column align-self-center">
                                    <h3 class="card-title text-center"><strong> {{ $criterias }} </strong></h3>
                                    <p class="card-text"> Kriteria  </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-12 mb-4">

                    <div class="card" style="min-height: 126px;max-height: 126px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <i class="fa-solid fa-list fa-5x me-3"></i>
                                <div class="d-flex flex-column align-self-center">
                                    <h3 class="card-title text-center"><strong> {{ $parameters }} </strong></h3>
                                    <p class="card-text"> Parameter  </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <div class="row mx-1">

        <div class="col-md-12">

            <div class="card mb-3">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3">Tim Penilai</h5>
                    </div>
                    <div class="card-body mx-3 my-3">
                        <table class="my-3 my-3 table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Panjang</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Last Seen</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="row mx-1">

        <div class="col-md-6 order-0">

            <div class="card mb-3">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3 text-center">Penghitung Waktu Mundur Berkas Formulir Inovasi</h5>
                    </div>
                    <div class="card-body">
                        @if ($timerInovasi == null)
                        <div class="container-fluid">
                            <div class="titleCountDownNonActive">
                                <div class="d-flex justify-content-center align-self-center">
                                    <span class="text-center">
                                        <h3>Berkas Formulir Inovasi Ditutup</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @else
                            @if (
                                (
                                    ($timerInovasi->status_open_form_innovation == 0 && $timerInovasi->date_time_open_form_innovation >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timerInovasi->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_innovation)
                                )
                                ||
                                (
                                    ($timerInovasi->status_open_form_innovation == 0 && $timerInovasi->date_time_open_form_innovation >= \Carbon\Carbon::now()->toDateTimeString()) && ($timerInovasi->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_innovation)
                                )
                            )
                            <div class="container-fluid">
                                <div class="titleCountDownNonActive">
                                    <h3>
                                        <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Berkas Formulir Inovasi</span>
                                    </h3>
                                </div>
                            </div>

                            @elseif (
                                (
                                            ($timerInovasi->status_open_form_innovation == 1
                                        && ($timerInovasi->date_time_open_form_innovation > \Carbon\Carbon::now()->toDateTimeString() || $timerInovasi->date_time_open_form_innovation == \Carbon\Carbon::now()->toDateTimeString()))
                                    &&  ($timerInovasi->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_innovation)
                                )
                                ||
                                (
                                            ($timerInovasi->status_open_form_innovation == 1
                                        && ($timerInovasi->date_time_open_form_innovation > \Carbon\Carbon::now()->toDateTimeString() || $timerInovasi->date_time_open_form_innovation == \Carbon\Carbon::now()->toDateTimeString()))
                                    &&  ($timerInovasi->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_innovation)
                                )
                            )
                            <div class="container-fluid swiper1">
                                <div class="openTimerCountDown swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Berkas Formulir Inovasi</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_innovation)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_innovation)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_innovation)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_innovation)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_innovation)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_innovation)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_innovation)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Coming Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-inovation" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_open_form_innovation)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                        (
                                                ($timerInovasi->status_open_form_innovation == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_form_innovation || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_form_innovation) )
                                            &&  ($timerInovasi->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_innovation)
                                        )
                                    ||  (
                                                ($timerInovasi->status_open_form_innovation == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_form_innovation || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_form_innovation))
                                            &&  ($timerInovasi->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_innovation)
                                        )
                                )
                                ||
                                (
                                        (
                                                ($timerInovasi->status_open_form_innovation == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_form_innovation || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_form_innovation))
                                            &&  ($timerInovasi->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_innovation)
                                        )
                                    || (
                                                ($timerInovasi->status_open_form_innovation == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_form_innovation || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_form_innovation))
                                            &&  ($timerInovasi->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_innovation)
                                        )
                                )
                            )

                            <div class="container-fluid swiper1_1">
                                <div class="openTimerCountDown swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Berkas Formulir Inovasi</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_innovation)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_innovation)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_innovation)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_innovation)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_innovation)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_innovation)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_innovation)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Closing Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-inovation-closed" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_expired_form_innovation)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                        ( ($timerInovasi->status_open_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_form_innovation) && ($timerInovasi->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_form_innovation) )
                                    ||  ( ($timerInovasi->status_open_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_form_innovation) && ($timerInovasi->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_form_innovation) )
                                )
                                ||
                                (
                                        ( ($timerInovasi->status_open_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_form_innovation) && ($timerInovasi->status_expired_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_form_innovation) )
                                    || ( ($timerInovasi->status_open_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_form_innovation) && ($timerInovasi->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_form_innovation) )
                                )
                            )

                            <div class="container-fluid">
                                <div class="titleCountDownNonActive">
                                    <h3>
                                        <span>Berkas Formulir Inovasi Telah Ditutup</span>
                                    </h3>
                                </div>
                            </div>

                            @endif

                        @endif
                    </div>
                </div>
            </div>



        </div>

        <div class="col-md-6 col-md-5 order-1">

            <div class="card mb-3">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3 text-center">Penghitung Waktu Mundur Penilaian Teladan</h5>
                    </div>
                    <div class="card-body">
                        @if ($timerTeladan == null)
                        <div class="container-fluid">
                            <div class="titleCountDownNonActive">
                                <div class="d-flex justify-content-center align-self-center">
                                    <span class="text-center">
                                        <h3>Penilaian Teladan Ditutup</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @else
                            @if (
                                (
                                    ($timerTeladan->status_open_appraisement == 0 && $timerTeladan->date_time_open_appraisement >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timerTeladan->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_appraisement)
                                )
                                ||
                                (
                                    ($timerTeladan->status_open_appraisement == 0 && $timerTeladan->date_time_open_appraisement >= \Carbon\Carbon::now()->toDateTimeString()) && ($timerTeladan->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_appraisement)
                                )
                            )
                            <div class="container-fluid">
                                <div class="titleCountDownNonActive">
                                    <h3>
                                        <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Penilaian Teladan</span>
                                    </h3>
                                </div>
                            </div>

                            @elseif (
                                (
                                            ($timerTeladan->status_open_appraisement == 1
                                        && ($timerTeladan->date_time_open_appraisement > \Carbon\Carbon::now()->toDateTimeString() || $timerTeladan->date_time_open_appraisement == \Carbon\Carbon::now()->toDateTimeString()))
                                    &&  ($timerTeladan->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_appraisement)
                                )
                                ||
                                (
                                            ($timerTeladan->status_open_appraisement == 1
                                        && ($timerTeladan->date_time_open_appraisement > \Carbon\Carbon::now()->toDateTimeString() || $timerTeladan->date_time_open_appraisement == \Carbon\Carbon::now()->toDateTimeString()))
                                    &&  ($timerTeladan->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_appraisement)
                                )
                            )
                            <div class="container-fluid swiper1">
                                <div class="openTimerCountDown swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Penilaian Teladan</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_appraisement)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_appraisement)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_appraisement)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_appraisement)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_appraisement)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_appraisement)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_appraisement)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Coming Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-representative" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_open_appraisement)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                        (
                                                ($timerTeladan->status_open_appraisement == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerTeladan->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timerTeladan->date_time_open_appraisement) )
                                            &&  ($timerTeladan->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_appraisement)
                                        )
                                    ||  (
                                                ($timerTeladan->status_open_appraisement == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerTeladan->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timerTeladan->date_time_open_appraisement))
                                            &&  ($timerTeladan->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_appraisement)
                                        )
                                )
                                ||
                                (
                                        (
                                                ($timerTeladan->status_open_appraisement == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerTeladan->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timerTeladan->date_time_open_appraisement))
                                            &&  ($timerTeladan->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_appraisement)
                                        )
                                    || (
                                                ($timerTeladan->status_open_appraisement == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerTeladan->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timerTeladan->date_time_open_appraisement))
                                            &&  ($timerTeladan->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_appraisement)
                                        )
                                )
                            )

                            <div class="container-fluid swiper1_1">
                                <div class="openTimerCountDown swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Penilaian Teladan</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_appraisement)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_appraisement)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_appraisement)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_appraisement)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_appraisement)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_appraisement)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_appraisement)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Closing Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-representative-closed" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_expired_appraisement)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                        ( ($timerTeladan->status_open_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_appraisement) && ($timerTeladan->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_appraisement) )
                                    ||  ( ($timerTeladan->status_open_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_appraisement) && ($timerTeladan->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_appraisement) )
                                )
                                ||
                                (
                                        ( ($timerTeladan->status_open_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_appraisement) && ($timerTeladan->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_appraisement) )
                                    || ( ($timerTeladan->status_open_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_appraisement) && ($timerTeladan->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_appraisement) )
                                )
                            )

                            <div class="container-fluid">
                                <div class="titleCountDownNonActive">
                                    <h3>
                                        <span>Penilaian Teladan Telah Ditutup</span>
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

    <!-- Assesment -->
    <div class="row mx-1">

        <div class="col-md-6 order-0">

            <div class="card mb-3">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3 text-center">Penghitung Waktu Mundur Penilaian Inovasi</h5>
                    </div>
                    <div class="card-body">
                        @if ($timerInovasi == null)
                        <div class="container-fluid">
                            <div class="titleCountDownNonActive">
                                <div class="d-flex justify-content-center align-self-center">
                                    <span class="text-center">
                                        <h3>Penilaian Inovasi Ditutup</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @else
                            @if (
                                (
                                    ($timerInovasi->status_open_appraisement == 0 && $timerInovasi->date_time_open_appraisement >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timerInovasi->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_appraisement)
                                )
                                ||
                                (
                                    ($timerInovasi->status_open_appraisement == 0 && $timerInovasi->date_time_open_appraisement >= \Carbon\Carbon::now()->toDateTimeString()) && ($timerInovasi->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_appraisement)
                                )
                            )
                            <div class="container-fluid">
                                <div class="titleCountDownNonActive">
                                    <h3>
                                        <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Penilaian Inovasi</span>
                                    </h3>
                                </div>
                            </div>

                            @elseif (
                                (
                                            ($timerInovasi->status_open_appraisement == 1
                                        && ($timerInovasi->date_time_open_appraisement > \Carbon\Carbon::now()->toDateTimeString() || $timerInovasi->date_time_open_appraisement == \Carbon\Carbon::now()->toDateTimeString()))
                                    &&  ($timerInovasi->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_appraisement)
                                )
                                ||
                                (
                                            ($timerInovasi->status_open_appraisement == 1
                                        && ($timerInovasi->date_time_open_appraisement > \Carbon\Carbon::now()->toDateTimeString() || $timerInovasi->date_time_open_appraisement == \Carbon\Carbon::now()->toDateTimeString()))
                                    &&  ($timerInovasi->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_appraisement)
                                )
                            )
                            <div class="container-fluid swiper1">
                                <div class="openTimerCountDown swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Penilaian Inovasi</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_appraisement)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_appraisement)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_appraisement)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_appraisement)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_appraisement)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_appraisement)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_appraisement)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Coming Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-assesment-inovation" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_open_appraisement)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                        (
                                                ($timerInovasi->status_open_appraisement == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_appraisement) )
                                            &&  ($timerInovasi->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_appraisement)
                                        )
                                    ||  (
                                                ($timerInovasi->status_open_appraisement == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_appraisement))
                                            &&  ($timerInovasi->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_appraisement)
                                        )
                                )
                                ||
                                (
                                        (
                                                ($timerInovasi->status_open_appraisement == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_appraisement))
                                            &&  ($timerInovasi->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_appraisement)
                                        )
                                    || (
                                                ($timerInovasi->status_open_appraisement == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_appraisement || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_appraisement))
                                            &&  ($timerInovasi->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_appraisement)
                                        )
                                )
                            )

                            <div class="container-fluid swiper1_1">
                                <div class="openTimerCountDown swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Penilaian Inovasi</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_appraisement)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_appraisement)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_appraisement)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_appraisement)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_appraisement)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_appraisement)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_appraisement)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Closing Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-inovation-closed" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_expired_appraisement)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                        ( ($timerInovasi->status_open_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_appraisement) && ($timerInovasi->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_appraisement) )
                                    ||  ( ($timerInovasi->status_open_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_appraisement) && ($timerInovasi->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_appraisement) )
                                )
                                ||
                                (
                                        ( ($timerInovasi->status_open_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_appraisement) && ($timerInovasi->status_expired_appraisement == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_appraisement) )
                                    || ( ($timerInovasi->status_open_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_appraisement) && ($timerInovasi->status_expired_appraisement == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_appraisement) )
                                )
                            )

                            <div class="container-fluid">
                                <div class="titleCountDownNonActive">
                                    <h3>
                                        <span>Penilaian Inovasi Telah Ditutup</span>
                                    </h3>
                                </div>
                            </div>

                            @endif

                        @endif
                    </div>
                </div>
            </div>



        </div>

        <div class="col-md-6 col-md-5 order-1">

            <div class="card mb-3">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3 text-center">Penghitung Waktu Mundur Tanda Tangan Teladan</h5>
                    </div>
                    <div class="card-body">
                        @if ($timerTeladan == null)
                        <div class="container-fluid">
                            <div class="titleCountDownNonActive">
                                <div class="d-flex justify-content-center align-self-center">
                                    <span class="text-center">
                                        <h3>Tanda Tangan Teladan Ditutup</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @else
                            @if (
                                (
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_1 == 0 && $timerTeladan->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        && ($timerTeladan->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_1)
                                    )
                                    ||
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_1 == 0 && $timerTeladan->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString())
                                        && ($timerTeladan->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_1)
                                    )
                                )
                                ||
                                (
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_2 == 0 && $timerTeladan->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        && ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                    )
                                    ||
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_2 == 0 && $timerTeladan->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString())
                                        && ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                    )
                                )
                                ||
                                (
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_3 == 0 && $timerTeladan->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        && ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                    )
                                    ||
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_3 == 0 && $timerTeladan->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString())
                                        && ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                    )
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
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_1 == 1 && $timerTeladan->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerTeladan->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_1)
                                    )
                                    ||
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_1 == 1 && $timerTeladan->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerTeladan->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_1)
                                    )
                                )
                                ||
                                (
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_2 == 1 && $timerTeladan->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                    )
                                    ||
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_2 == 1 && $timerTeladan->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                    )
                                )
                                ||
                                (
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_3 == 1 && $timerTeladan->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                    )
                                    ||
                                    (
                                            ($timerTeladan->status_open_signature_human_resource_3 == 1 && $timerTeladan->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                    )
                                )
                            )
                            <div class="container-fluid swiper1">
                                <div class="openTimerCountDown swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Tanda Tangan Teladan</h3>
                                        </div>
                                        <div class="titleCountDown">
                                            <h3>Kepala Biro Sumber Daya Manusia</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_1)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_1)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_1)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_1)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_1)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_1)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_1)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Coming Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature1-representative" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_open_signature_human_resource_1)->toDateTimeString() }}">
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Tanda Tangan Teladan</h3>
                                        </div>
                                        <div class="titleCountDown">
                                            <h3>Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</h3>
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
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_2)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Coming Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature2-representative" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_open_signature_human_resource_2)->toDateTimeString() }}">
                                        </div>
                                    </div>

                                    @if (
                                            (
                                                (
                                                        ($timerTeladan->status_open_signature_human_resource_3 == 1 && $timerTeladan->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                                    &&  ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                                )
                                                ||
                                                (
                                                        ($timerTeladan->status_open_signature_human_resource_3 == 1 && $timerTeladan->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                                    &&  ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                                )
                                            )
                                    )
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Tanda Tangan Teladan</h3>
                                        </div>
                                        <div class="titleCountDown">
                                            <h3>Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_3)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_3)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_3)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_3)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_3)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_3)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_open_signature_human_resource_3)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Coming Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature3-representative" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_open_signature_human_resource_3)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                    @elseif (
                                        (
                                            (
                                                    (
                                                            ($timerTeladan->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                                        &&  ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                                    )
                                                ||  (
                                                            ($timerTeladan->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                                        &&  ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                                    )
                                            )
                                                ||
                                            (
                                                    (
                                                            ($timerTeladan->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                                        &&  ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                                    )
                                                || (
                                                            ($timerTeladan->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                                        &&  ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                                    )
                                            )
                                        )
                                    )
                                    @endif
                                </div>
                            </div>

                            @elseif (
                                (
                                    (
                                            (
                                                    ($timerTeladan->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_1)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_1)
                                            )
                                        ||  (
                                                    ($timerTeladan->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_1)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_1)
                                            )
                                    )
                                    ||
                                    (
                                            (
                                                    ($timerTeladan->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_1)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_1)
                                            )
                                        || (
                                                    ($timerTeladan->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_1)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_1)
                                            )
                                    )
                                )
                                ||
                                (
                                    (
                                            (
                                                    ($timerTeladan->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                            )
                                        ||  (
                                                    ($timerTeladan->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                            )
                                    )
                                    ||
                                    (
                                            (
                                                    ($timerTeladan->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                            )
                                        || (
                                                    ($timerTeladan->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_2)
                                            )
                                    )
                                )
                                ||
                                (
                                    (
                                            (
                                                    ($timerTeladan->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                            )
                                        ||  (
                                                    ($timerTeladan->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                            )
                                    )
                                    ||
                                    (
                                            (
                                                    ($timerTeladan->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                            )
                                        || (
                                                    ($timerTeladan->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                                &&  ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerTeladan->date_time_expired_signature_human_resource_3)
                                            )
                                    )
                                )
                            )

                            <div class="container-fluid swiper1_1">
                                <div class="openTimerCountDown swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Tanda Tangan Kepala Biro SDM</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_1)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_1)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_1)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_1)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_1)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_1)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_1)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Closing Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature1-representative-closed" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_expired_signature_human_resource_1)->toDateTimeString() }}">
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Tanda Tangan Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</h3>
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
                                        <div class="wrap-countdown countdown-signature2-representative-closed" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_expired_signature_human_resource_2)->toDateTimeString() }}">
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Tanda Tangan Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_3)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_3)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_3)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_3)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_3)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_3)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerTeladan->date_time_expired_signature_human_resource_3)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Closing Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature3-representative-closed" data-expire="{{ \Carbon\Carbon::parse($timerTeladan->date_time_expired_signature_human_resource_3)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                    (
                                                ( ($timerTeladan->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_1)
                                            && ($timerTeladan->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_1) )
                                        ||      ( ($timerTeladan->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_1)
                                            && ($timerTeladan->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_1) )
                                    )
                                    ||
                                    (
                                                ( ($timerTeladan->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_1)
                                            && ($timerTeladan->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_1) )
                                        ||      ( ($timerTeladan->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_1)
                                            && ($timerTeladan->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_1) )
                                    )
                                )
                                ||
                                (
                                    (
                                                ( ($timerTeladan->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2)
                                            && ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_2) )
                                        ||      ( ($timerTeladan->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2)
                                            && ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_2) )
                                    )
                                    ||
                                    (
                                                ( ($timerTeladan->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2)
                                            && ($timerTeladan->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_2) )
                                        ||      ( ($timerTeladan->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_2)
                                            && ($timerTeladan->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_2) )
                                    )
                                )
                                ||
                                (
                                    (
                                                ( ($timerTeladan->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                            && ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_3) )
                                        ||      ( ($timerTeladan->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                            && ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_3) )
                                    )
                                    ||
                                    (
                                                ( ($timerTeladan->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                            && ($timerTeladan->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_3) )
                                        ||      ( ($timerTeladan->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_open_signature_human_resource_3)
                                            && ($timerTeladan->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerTeladan->date_time_expired_signature_human_resource_3) )
                                    )
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
    <!--/ Assesment -->


    <!-- Signature -->
    <div class="row mx-1">

        <div class="col-md-6 order-0">

            <div class="card mb-3">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3 text-center">Penghitung Waktu Mundur Penilaian Inovasi</h5>
                    </div>
                    <div class="card-body">
                        @if ($timerInovasi == null)
                        <div class="container-fluid">
                            <div class="titleCountDownNonActive">
                                <div class="d-flex justify-content-center align-self-center">
                                    <span class="text-center">
                                        <h3>Tanda Tangan Inovasi Ditutup</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @else
                            @if (
                                (
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_1 == 0 && $timerInovasi->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        && ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                    )
                                    ||
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_1 == 0 && $timerInovasi->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString())
                                        && ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                    )
                                )
                                ||
                                (
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_2 == 0 && $timerInovasi->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        && ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                    )
                                    ||
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_2 == 0 && $timerInovasi->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString())
                                        && ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                    )
                                )
                                ||
                                (
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_3 == 0 && $timerInovasi->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        && ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                    )
                                    ||
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_3 == 0 && $timerInovasi->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString())
                                        && ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                    )
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
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_1 == 1 && $timerInovasi->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                    )
                                    ||
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_1 == 1 && $timerInovasi->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                    )
                                )
                                ||
                                (
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_2 == 1 && $timerInovasi->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                    )
                                    ||
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_2 == 1 && $timerInovasi->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                    )
                                )
                                ||
                                (
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_3 == 1 && $timerInovasi->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                    )
                                    ||
                                    (
                                            ($timerInovasi->status_open_signature_human_resource_3 == 1 && $timerInovasi->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                        &&  ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                    )
                                )
                            )
                            <div class="container-fluid swiper1">
                                <div class="openTimerCountDown swiper-wrapper">

                                    {{-- @elseif (
                                        (
                                                ($timerInovasi->status_open_signature_human_resource_1 == 1 && $timerInovasi->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() )
                                            &&  ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                        )
                                        ||
                                        (
                                                ($timerInovasi->status_open_signature_human_resource_1 == 1 && $timerInovasi->date_time_open_signature_human_resource_1 >= \Carbon\Carbon::now()->toDateTimeString() )
                                            &&  ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                        )
                                    ) --}}
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Tanda Tangan Inovasi</h3>
                                        </div>
                                        <div class="titleCountDown">
                                            <h3>Kepala Biro Sumber Daya Manusia</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_1)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_1)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_1)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_1)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_1)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_1)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_1)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Coming Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature1-inovation" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_open_signature_human_resource_1)->toDateTimeString() }}">
                                        </div>
                                    </div>

                                    {{-- @elseif (
                                        (
                                                ($timerInovasi->status_open_signature_human_resource_2 == 1 && $timerInovasi->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() )
                                            &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                        )
                                        ||
                                        (
                                                ($timerInovasi->status_open_signature_human_resource_2 == 1 && $timerInovasi->date_time_open_signature_human_resource_2 >= \Carbon\Carbon::now()->toDateTimeString() )
                                            &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                        )
                                    ) --}}
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Tanda Tangan Inovasi</h3>
                                        </div>
                                        <div class="titleCountDown">
                                            <h3>Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</h3>
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
                                        <div class="wrap-countdown countdown-signature2-inovation" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_open_signature_human_resource_2)->toDateTimeString() }}">
                                        </div>
                                    </div>

                                    {{-- @elseif (
                                        (
                                                ($timerInovasi->status_open_signature_human_resource_3 == 1 && $timerInovasi->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                            &&  ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                        )
                                        ||
                                        (
                                                ($timerInovasi->status_open_signature_human_resource_3 == 1 && $timerInovasi->date_time_open_signature_human_resource_3 >= \Carbon\Carbon::now()->toDateTimeString() )
                                            &&  ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                        )
                                    ) --}}
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Pembukaan Tanda Tangan Inovasi</h3>
                                        </div>
                                        <div class="titleCountDown">
                                            <h3>Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_3)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_3)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_3)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_3)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_3)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_3)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_signature_human_resource_3)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Coming Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature3-inovation" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_open_signature_human_resource_3)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                    (
                                            (
                                                    ($timerInovasi->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                            )
                                        ||  (
                                                    ($timerInovasi->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                            )
                                    )
                                    ||
                                    (
                                            (
                                                    ($timerInovasi->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                            )
                                        || (
                                                    ($timerInovasi->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                            )
                                    )
                                )
                                ||
                                (
                                    (
                                            (
                                                    ($timerInovasi->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                            )
                                        ||  (
                                                    ($timerInovasi->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                            )
                                    )
                                    ||
                                    (
                                            (
                                                    ($timerInovasi->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                            )
                                        || (
                                                    ($timerInovasi->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                            )
                                    )
                                )
                                ||
                                (
                                    (
                                            (
                                                    ($timerInovasi->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                            )
                                        ||  (
                                                    ($timerInovasi->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                            )
                                    )
                                    ||
                                    (
                                            (
                                                    ($timerInovasi->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                            )
                                        || (
                                                    ($timerInovasi->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                                &&  ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                            )
                                    )
                                )
                            )

                            <div class="container-fluid swiper1_1">
                                <div class="openTimerCountDown swiper-wrapper">
                                    {{-- @elseif (
                                        (
                                                (
                                                        ($timerInovasi->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                                    &&  ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                                )
                                            ||  (
                                                        ($timerInovasi->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                                    &&  ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                                )
                                        )
                                        ||
                                        (
                                                (
                                                        ($timerInovasi->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                                    &&  ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                                )
                                            || (
                                                        ($timerInovasi->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                                    &&  ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_1)
                                                )
                                        )
                                    ) --}}

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Tanda Tangan Kepala Biro SDM</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_1)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_1)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_1)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_1)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_1)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_1)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_1)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Closing Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature-inovation-closed" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_expired_signature_human_resource_1)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @elseif (
                                        (
                                            (
                                                    (
                                                            ($timerInovasi->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                                        &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                                    )
                                                ||  (
                                                            ($timerInovasi->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                                        &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                                    )
                                            )
                                            ||
                                            (
                                                    (
                                                            ($timerInovasi->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                                        &&  ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                                    )
                                                || (
                                                            ($timerInovasi->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                                        &&  ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_2)
                                                    )
                                            )
                                        )
                                    ) --}}

                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Tanda Tangan Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</h3>
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
                                        <div class="wrap-countdown countdown-signature-inovation-closed" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_expired_signature_human_resource_2)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @elseif (
                                        (
                                            (
                                                    (
                                                            ($timerInovasi->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                                        &&  ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                                    )
                                                ||  (
                                                            ($timerInovasi->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                                        &&  ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                                    )
                                            )
                                            ||
                                            (
                                                    (
                                                            ($timerInovasi->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                                        &&  ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                                    )
                                                || (
                                                            ($timerInovasi->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                                        &&  ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_signature_human_resource_3)
                                                    )
                                            )
                                        )
                                    ) --}}
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Penutupan Tanda Tangan Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</h3>
                                        </div>
                                        <div class="dateCountDown">
                                            <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_3)->isoFormat('dddd') }}</b></span>
                                            <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_3)->isoFormat('D') }}</b></span>
                                            <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_3)->isoFormat('MMMM') }}</b></span>
                                            <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_3)->isoFormat('Y') }}</b></span>
                                        </div>
                                        <div class="timeCountDown">
                                            <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_3)->isoFormat('hh') }}</b></span>
                                            <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_3)->isoFormat('mm') }}</b></span>
                                            <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_signature_human_resource_3)->isoFormat('a') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="titleCountDown">
                                            <h3>Closing Soon</h3>
                                        </div>
                                        <div class="wrap-countdown countdown-signature-inovation-closed" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_expired_signature_human_resource_3)->toDateTimeString() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                    (
                                                ( ($timerInovasi->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                            && ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_1) )
                                        ||      ( ($timerInovasi->status_open_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                            && ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_1) )
                                    )
                                    ||
                                    (
                                                ( ($timerInovasi->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                            && ($timerInovasi->status_expired_signature_human_resource_1 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_1) )
                                        ||      ( ($timerInovasi->status_open_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_1)
                                            && ($timerInovasi->status_expired_signature_human_resource_1 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_1) )
                                    )
                                )
                                ||
                                (
                                    (
                                                ( ($timerInovasi->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                            && ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_2) )
                                        ||      ( ($timerInovasi->status_open_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                            && ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_2) )
                                    )
                                    ||
                                    (
                                                ( ($timerInovasi->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                            && ($timerInovasi->status_expired_signature_human_resource_2 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_2) )
                                        ||      ( ($timerInovasi->status_open_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_2)
                                            && ($timerInovasi->status_expired_signature_human_resource_2 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_2) )
                                    )
                                )
                                ||
                                (
                                    (
                                                ( ($timerInovasi->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                            && ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_3) )
                                        ||      ( ($timerInovasi->status_open_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                            && ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_3) )
                                    )
                                    ||
                                    (
                                                ( ($timerInovasi->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                            && ($timerInovasi->status_expired_signature_human_resource_3 == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_3) )
                                        ||      ( ($timerInovasi->status_open_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_signature_human_resource_3)
                                            && ($timerInovasi->status_expired_signature_human_resource_3 == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_signature_human_resource_3) )
                                    )
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



        </div>

        <div class="col-md-6 col-md-5 order-1">

            {{-- <div class="card mb-3">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3">Tim Penilai</h5>
                    </div>
                    <div class="card-body mx-3 my-3">
                        <div style="height:250px ;margin: auto;">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>

    </div>
    <!--/ Signature -->

    {{-- <div class="row mx-1">

        <div class="col-6 col-6 order-0">

            <div class="card mb-3">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3">Statistik Penghargaan Teladan</h5>
                    </div>
                    <div class="card-body mx-3 my-3">
                        <div class="d-flex">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div> --}}



</div>

@stop
