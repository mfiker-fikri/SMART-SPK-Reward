@extends('template.pegawai.template')

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
                min-height: 350px;
                max-height: 25vh;
            }
            .cardRepresentative {
                max-width: 740px;
                min-height: 350px;
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
    <!-- Datatables Form Inovation -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table-inovation').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            paging: false,
            searching: false,
            ajax: "{{ url('dashboard/form-innovation/list/data') }}",
            columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'status', name: 'status', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader(table);

        if (table) {
            setInterval( function () {
                table.ajax.reload(null, false);
            }, 10000 );
        }
    });
    </script>
    <!--/ Datatables Form Inovation -->

    <!-- Datatables Reward Teladan -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table-reward-inovation').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            paging: false,
            searching: false,
            ajax: "{{ url('dashboard/reward-innovation/list/data') }}",
            columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'status', name: 'status', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader(table);

        if (table) {
            setInterval( function () {
                table.ajax.reload(null, false);
            }, 10000 );
        }
    });
    </script>
    <!--/ Datatables Reward Teladan -->

    <!-- Datatables Reward Teladan -->
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#data-table-reward-representative').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                paging: false,
                searching: false,
                ajax: "{{ url('dashboard/reward-representative/list/data') }}",
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                ]
            });

            new $.fn.dataTable.FixedHeader(table);

            if (table) {
                setInterval( function () {
                    table.ajax.reload(null, false);
                }, 10000 );
            }
        });
        </script>
        <!--/ Datatables Reward Teladan -->

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
                    if(event.offset.totalDays == 1 && flag2) {
                        flag2 = false;
                        Swal.fire({
                            title: 'Form Inovasi Dibuka dalam' + ' ' + 2 + 'Hari',
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
                            title: 'Form Inovasi Dibuka Besok',
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
                            title: 'Form Inovasi Dibuka dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Form Inovasi Dibuka dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Form Inovasi Sudah Dibuka',
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
            $(".countdown-inovation-closed").each( function(){
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
                            title: 'Form Inovasi Inovasi Ditutup Besok',
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
                            title: 'Form Inovasi Inovasi Ditutup dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Form Inovasi Inovasi Ditutup dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Form Inovasi Inovasi Sudah Ditutup',
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
            $(".countdown-representative").each( function(){
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
                            title: 'Form Teladan Ditutup dalam' + ' ' + 2 + 'Hari',
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
                            title: 'Form Teladan Ditutup Besok',
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
                            title: 'Form Teladan Ditutup dalam' + ' ' + 1 + 'Jam',
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
                            title: 'Form Teladan Ditutup dalam' + ' ' + 1 + 'Menit',
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
                        title: 'Form Teladan Sudah Ditutup',
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

    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                margin:1,
                nav:true,
                autoHeight:true,
                autoWidth:true,
                autoplay:true,
                autoplayTimeout:1000,
                autoplayHoverPause:true
            });
        });
    </script>



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
@stop
<!--/ Footer Js -->


@section('content')

<div class="container-xxl container-p-y">

    <!-- Row 1 -->
    <div class="row mx-1">

        <div class="col-md-6 order-0">

            <div class="card mb-3 visible shadow-lg" style="max-width: 740px;min-height: 340px;">
                <div class="d-flex flex-row">
                    <div class="d-flex">
                        <!-- Photo Profile -->
                        @if (Auth::guard('employees')->user()->photo_profile)
                        <img src="{{ asset( 'storage/employees/photos/photoProfile/'. Auth::guard('employees')->user()->username. '/' . Auth::guard('employees')->user()->photo_profile) }}" class="img-fluid rounded-start mx-auto d-block" alt="employee-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @else
                        <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1" class="img-fluid rounded-start mx-auto d-block" alt="employee-photo-profile" style="min-height: 350px;max-height: 350px;min-width: 230px;max-width: 230px;">
                        @endif
                        <!--/ Photo Profile -->
                    </div>
                    <div class="dashboardEmployeesInfo">
                        <div class="card-body d-flex flex-column justify-content-center align-self-center">
                            <h3 class="card-title text-center"><strong> {{ Auth::guard('employees')->user()->full_name }} </strong></h3>
                            <p class="card-text text-center"> Pegawai </p>
                            @if (Cache::has('pegawai-is-online-' . Auth::guard('employees')->user()->id))
                            <p class="card-text text-success text-center"><small class="text-muted text-success">Online</small></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-6 col-md-5 order-1">

            <div class="card mb-2 visible shadow-lg d-flex justify-content-center align-self-center cardInovation">
                <div class="d-flex justify-content-center align-self-center cardFormInovation">
                    @if ($timerInovasi == null)
                    <div class="d-flex justify-content-center align-self-center">
                        <span class="text-center">
                            <h3>Form Inovasi Ditutup</h3>
                        </span>
                    </div>
                    @else
                        @if (
                            (
                                ($timerInovasi->status_open == 0 && $timerInovasi->date_time_open_form_inovation >= \Carbon\Carbon::now()->toDateTimeString() ?? 'None' ) && ($timerInovasi->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_inovation ?? 'None')
                            )
                            ||
                            (
                                ($timerInovasi->status_open == 0 && $timerInovasi->date_time_open_form_inovation >= \Carbon\Carbon::now()->toDateTimeString() ?? 'None') && ($timerInovasi->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_inovation ?? 'None')
                            )
                        )
                        <div class="container-fluid">
                            <div class="titleCountDownNonActive">
                                <h3>
                                    <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Form Inovasi</span>
                                </h3>
                            </div>
                        </div>

                        @elseif (
                            (
                                        ($timerInovasi->status_open == 1
                                    && ($timerInovasi->date_time_open_form_inovation > \Carbon\Carbon::now()->toDateTimeString() ?? 'None' || $timerInovasi->date_time_open_form_inovation == \Carbon\Carbon::now()->toDateTimeString() ?? 'None'))
                                &&  ($timerInovasi->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_inovation ?? 'None')
                            )
                            ||
                            (
                                        ($timerInovasi->status_open == 1
                                    && ($timerInovasi->date_time_open_form_inovation > \Carbon\Carbon::now()->toDateTimeString() ?? 'None' || $timerInovasi->date_time_open_form_inovation == \Carbon\Carbon::now()->toDateTimeString()) ?? 'None')
                                &&  ($timerInovasi->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_inovation ?? 'None')
                            )
                        )
                        <div class="container-fluid swiper1">
                            <div class="openTimerCountDown swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="titleCountDown">
                                        <h3>Pembukaan Form Inovasi</h3>
                                    </div>
                                    <div class="dateCountDown">
                                        <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_inovation)->isoFormat('dddd') }}</b></span>
                                        <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_inovation)->isoFormat('D') }}</b></span>
                                        <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_inovation)->isoFormat('MMMM') }}</b></span>
                                        <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_inovation)->isoFormat('Y') }}</b></span>
                                    </div>
                                    <div class="timeCountDown">
                                        <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_inovation)->isoFormat('hh') }}</b></span>
                                        <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_inovation)->isoFormat('mm') }}</b></span>
                                        <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_open_form_inovation)->isoFormat('a') }}</b></span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="titleCountDown">
                                        <h3>Coming Soon</h3>
                                    </div>
                                    <div class="wrap-countdown countdown-inovation" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_open_form_inovation)->toDateTimeString() }}">
                                    </div>
                                </div>
                            </div>
                            <!-- If we need pagination -->
                            {{-- <div class="swiper-pagination"></div> --}}

                            <!-- If we need navigation buttons -->
                            {{-- <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div> --}}

                            <!-- If we need scrollbar -->
                            {{-- <div class="swiper-scrollbar"></div> --}}
                        </div>

                        @elseif (
                            (
                                    (
                                            ($timerInovasi->status_open == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_form_inovation ?? 'None' || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_form_inovation ?? 'None') )
                                        &&  ($timerInovasi->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_inovation ?? 'None')
                                    )
                                ||  (
                                            ($timerInovasi->status_open == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_form_inovation || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_form_inovation))
                                        &&  ($timerInovasi->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_inovation)
                                    )
                            )
                            ||
                            (
                                    (
                                            ($timerInovasi->status_open == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_form_inovation || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_form_inovation))
                                        &&  ($timerInovasi->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_inovation)
                                    )
                                || (
                                            ($timerInovasi->status_open == 0 && (\Carbon\Carbon::now()->toDateTimeString() > $timerInovasi->date_time_open_form_inovation || \Carbon\Carbon::now()->toDateTimeString() == $timerInovasi->date_time_open_form_inovation))
                                        &&  ($timerInovasi->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timerInovasi->date_time_expired_form_inovation)
                                    )
                            )
                        )

                        <div class="container-fluid swiper1_1">
                            <div class="openTimerCountDown swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="titleCountDown">
                                        <h3>Penutupan Form Inovasi</h3>
                                    </div>
                                    <div class="dateCountDown">
                                        <span>Hari <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_inovation)->isoFormat('dddd') }}</b></span>
                                        <span>Tanggal <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_inovation)->isoFormat('D') }}</b></span>
                                        <span>Bulan <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_inovation)->isoFormat('MMMM') }}</b></span>
                                        <span>Tahun <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_inovation)->isoFormat('Y') }}</b></span>
                                    </div>
                                    <div class="timeCountDown">
                                        <span>Jam <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_inovation)->isoFormat('hh') }}</b></span>
                                        <span>Menit <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_inovation)->isoFormat('mm') }}</b></span>
                                        <span>Waktu <b>{{ \Carbon\Carbon::create($timerInovasi->date_time_expired_form_inovation)->isoFormat('a') }}</b></span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="titleCountDown">
                                        <h3>Closing Soon</h3>
                                    </div>
                                    <div class="wrap-countdown countdown-inovation-closed" data-expire="{{ \Carbon\Carbon::parse($timerInovasi->date_time_expired_form_inovation)->toDateTimeString() }}">
                                    </div>
                                </div>
                                {{-- <div class="swiper-slide">

                                </div> --}}
                            </div>
                        </div>

                        @elseif (
                            (
                                    ( ($timerInovasi->status_open == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_form_inovation) && ($timerInovasi->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_form_inovation) )
                                ||  ( ($timerInovasi->status_open == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_form_inovation) && ($timerInovasi->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_form_inovation) )
                            )
                            ||
                            (
                                    ( ($timerInovasi->status_open == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_form_inovation) && ($timerInovasi->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_form_inovation) )
                                || ( ($timerInovasi->status_open == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_open_form_inovation) && ($timerInovasi->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timerInovasi->date_time_expired_form_inovation) )
                            )
                        )

                        <div class="container-fluid">
                            <div class="titleCountDownNonActive">
                                <h3>
                                    <span>Form Inovasi Telah Ditutup</span>
                                </h3>
                            </div>
                        </div>

                        @endif

                    @endif
                </div>
            </div>

        </div>

    </div>
    <!--/ Row 1 -->

    <!-- Row 2 -->
    <div class="row mx-1">
        <div class="col-12">
            {{-- <div class="d-flex justify-content-center align-self-center"> --}}
                <div class="card mb-3 visible shadow-lg">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3">Proses Form Penghargaan Inovasi</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table-inovation">
                            <thead>
                                <tr>
                                    <th scope="col">Status Process</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
    <!--/ Row 2 -->

    <!-- Row 3 -->
    <div class="row mx-1">

        <!-- Total Revenue -->
        <div class="col-md-6 order-0">
        {{-- <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4"> --}}
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="card-header">
                        <h5 class="m-0 me-2 pb-3">Hasil Penerimaan Penghargaan Inovasi</h5>
                    </div>
                    <div class="card-body">
                        {{-- <canvas id="myChart" width="400" height="400"></canvas> --}}
                        <table class="table table-striped table-bordered" cellspacing="0" id="data-table-reward-inovation">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">No</th> --}}
                                    <th scope="col">Hasil Akhir Penilaian</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->

        <div class="col-md-6 order-1">
            {{-- <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4"> --}}
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="card-header">
                            <h5 class="m-0 me-2 pb-3">Hasil Penerimaan Penghargaan Teladan</h5>
                        </div>
                        <div class="card-body">
                            {{-- <canvas id="myChart" width="400" height="400"></canvas> --}}
                            <table class="table table-striped table-bordered" cellspacing="0" id="data-table-reward-representative">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">No</th> --}}
                                        <th scope="col">Hasil Akhir Penilaian</th>
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

</div>

@endsection
