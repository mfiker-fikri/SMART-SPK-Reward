@extends('template.teamAssessment.template')

<!-- Header CSS -->
@section('css_header')
    <style>
    .swal2-container {
        z-index: 1000;
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
    <!-- Datatables Form Inovasi -->
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
            lengthMenu: [5, 10, 25, 50, 100, 200, 500],
            dom: 'Bfrtip',
            buttons: [
                "pageLength",
            ],
            ajax: "{{ url('penilai/appraisment/inovation/list') }}",
            // {
            //     url: "{{ url('penilai/appraisment/inovation/list') }}",
            //     // headers: {
            //     //     'Authorization':'Basic xxxxxxxxxxxxx',
            //     //     'X-CSRF-TOKEN':'xxxxxxxxxxxxxxxxxxxx',
            //     //     'Content-Type':'application/json'
            //     // },
            //     method: "GET",
            // },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                // {data: 'id', name: 'id'},
                {data: 'fullName', name: 'fullName', orderable: false, searchable: false},
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
    <!--/ Datatables Form Inovasi -->


    <!-- Datatables Form Inovasi -->
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#data-table-process-DSS').DataTable({
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
                ajax: "{{ url('penilai/appraisment/inovation/list/DSS') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'fullName', name: 'fullName'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    // {data: 'score_valuation_1', name: 'score_valuation_1', orderable: false, searchable: false},
                    // {data: 'score_valuation_2', name: 'score_valuation_2', orderable: false, searchable: false},
                    // {data: 'score_valuation_3', name: 'score_valuation_3', orderable: false, searchable: false},
                    // {data: 'score_valuation_4', name: 'score_valuation_4', orderable: false, searchable: false},
                    // {data: 'score_valuation_5', name: 'score_valuation_5', orderable: false, searchable: false},
                    // {data: 'score_valuation_6', name: 'score_valuation_6', orderable: false, searchable: false},
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
    <!--/ Datatables Form Inovasi -->


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
                ajax: "{{ url('penilai/appraisment/inovation/list/DSS/result') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    // {data: 'fullName', name: 'fullName', orderable: false, searchable: false},
                    {data: 'score_final_result', name: 'score_final_result', orderable: false, searchable: false},
                    {data: 'score_final_result_description', name: 'score_final_result_description', orderable: false, searchable: false},
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
    <!--/ Datatables Result Inovasi DSS -->


    <!-- View Result Inovation DSS -->
    <script type="text/javascript">
        $(document).on('click', '#viewResultInovationId', function(e) {
            e.preventDefault();
            let fullName = $(this).attr('data-fullName');
            let value1 = $(this).attr('data-1');
            let value2 = $(this).attr('data-2');
            let value3 = $(this).attr('data-3');
            let value4 = $(this).attr('data-4');
            let value5 = $(this).attr('data-5');
            let value6 = $(this).attr('data-6');
            Swal.fire({
                title: 'Hasil Penilaian Form Inovation' + ' ' + '-' + ' ' + fullName,
                // icon: 'warning',
                width: 750,
                padding: '-3em',
                scrollbarPadding: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                showCancelButton: true,
                showConfirmButton: false,
                // confirmButtonText: 'Ya',
                cancelButtonText: 'Tutup',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                html:
                `
                <div class="row my-3">
                    <label for="valueResult1" class="col-xl-3 col-form-label">Kebaruan</label>
                    <div class="col-xl-9 col-xl-9">
                        <div class="input-group">
                            <label class="input-group-text" for="valueResult1">
                                <i class="fa-solid fa-user-tie"></i>
                            </label>
                            <select class="form-select"" id="valueResult1"
                                name="valueResult1"
                                autofocus autocomplete required disabled>
                                <option selected disabled>-- Pilih Kebaruan --</option>
                                @foreach ( $selectOptionParameter1 as $sop1)
                                <option disabled value="{{ $sop1->grade }}" @if( old('valueResult1', $sop1->grade) == $sop1->grade ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop1->parameter }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <label for="valueResult2" class="col-xl-3 col-form-label">Kemanfaatan</label>
                    <div class="col-xl-9 col-xl-9">
                        <div class="input-group">
                            <label class="input-group-text" for="valueResult2">
                                <i class="fa-solid fa-user-tie"></i>
                            </label>
                            <select class="form-select"" id="valueResult2"
                                name="valueResult2"
                                autofocus autocomplete required disabled>
                                <option selected disabled>-- Pilih Kemanfaatan --</option>
                                @foreach ( $selectOptionParameter2 as $sop2)
                                <option value="{{ $sop2->grade }}" @if( old('kemanfaatan') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop2->parameter }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <label for="valueResult3" class="col-xl-3 col-form-label">Peran Serta</label>
                    <div class="col-xl-9 col-xl-9">
                        <div class="input-group">
                            <label class="input-group-text" for="valueResult3">
                                <i class="fa-solid fa-user-tie"></i>
                            </label>
                            <select class="form-select"" id="valueResult3"
                                name="valueResult3"
                                autofocus autocomplete required disabled>
                                <option selected disabled>-- Pilih Peran Serta --</option>
                                @foreach ( $selectOptionParameter3 as $sop3)
                                <option value="{{ $sop3->grade }}" @if( old('valueResult3', $sop3->grade) == $sop3->grade ) selected @endif>{{ $loop->iteration }} - {{ $sop3->parameter }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <label for="valueResult4" class="col-xl-3 col-form-label">Dapat Ditransfer / Replikasi</label>
                    <div class="col-xl-9 col-xl-9">
                        <div class="input-group">
                            <label class="input-group-text" for="valueResult4">
                                <i class="fa-solid fa-user-tie"></i>
                            </label>
                            <select class="form-select"" id="valueResult4"
                                name="valueResult4"
                                autofocus autocomplete required disabled>
                                <option selected disabled>-- Pilih Dapat Ditransfer / Replikasi --</option>
                                @foreach ( $selectOptionParameter4 as $sop4)
                                <option value="{{ $sop4->grade }}" @if( old('valueResult4', $sop4->grade) == $sop4->grade ) selected @endif>{{ $loop->iteration }} - {{ $sop4->parameter }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <label for="valueResult5" class="col-xl-3 col-form-label">Karya Nyata dan Penciptaan Nilai Tambah</label>
                    <div class="col-xl-9 col-xl-9">
                        <div class="input-group">
                            <label class="input-group-text" for="valueResult5">
                                <i class="fa-solid fa-user-tie"></i>
                            </label>
                            <select class="form-select"" id="valueResult5"
                                name="valueResult5"
                                autofocus autocomplete required disabled>
                                <option selected disabled>-- Pilih Karya Nyata dan Penciptaan Nilai Tambah --</option>
                                @foreach ( $selectOptionParameter5 as $sop5)
                                <option value="{{ $sop5->grade }}" @if( old('valueResult5', $sop5->grade) == $sop5->grade ) selected @endif>{{ $loop->iteration }} - {{ $sop5->parameter }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <label for="valueResult6" class="col-xl-3 col-form-label">Kesinambungan dan Konsistensi Prestasi Kerja</label>
                    <div class="col-xl-9 col-xl-9">
                        <div class="input-group">
                            <label class="input-group-text" for="valueResult6">
                                <i class="fa-solid fa-user-tie"></i>
                            </label>
                            <select class="form-select"" id="valueResult6"
                                name="valueResult6"
                                autofocus autocomplete required disabled>
                                <option selected disabled>-- Pilih Kesinambungan dan Konsistensi Prestasi Kerja --</option>
                                @foreach ( $selectOptionParameter6 as $sop6)
                                <option value="{{ $sop6->grade }}" @if( old('valueResult6', $sop6->grade) == $sop6->grade ) selected @endif >
                                    {{ $loop->iteration }} - {{ $sop6->parameter }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                `,


                // <input type="text" id="valueResult1" class="swal2-input" placeholder="Username">'
                // +'<input type="password" id="password" class="swal2-input" placeholder="Password">',
                didOpen: () => {
                    // const content = Swal.getHtmlContainer()
                    // const $ = content.querySelector.bind(content)

                    var v6 = $('#valueResult1').val(value1)
                    var v6 = $('#valueResult2').val(value2)
                    var v6 = $('#valueResult3').val(value3)
                    var v6 = $('#valueResult4').val(value4)
                    var v6 = $('#valueResult5').val(value5)
                    var v6 = $('#valueResult6').val(value6)
                    // var v1 = document.getElementById('valueResult6').setAttribute("value", value6)
                    // console.log(v1);

                    // document.getElementById('valueResult1').setAttribute("value", value1)
                    // document.getElementById('valueResult2').setAttribute("value", value2)
                    // document.getElementById('valueResult3').setAttribute("value", value3)
                    // document.getElementById('valueResult4').setAttribute("value", value4)
                    // document.getElementById('valueResult5').setAttribute("value", value5)
                    // document.getElementById('valueResult6').setAttribute("value", value6)

                    // var result6 = document.getElementById('valueResult6').setAttribute("value", value6)
                },
            })
        });
    </script>
    <!--/ View Result Inovation DSS -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <!-- Tabs Form Inovation Appraisment From Employees -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ (request()->is('penilai/appraisment/inovation*')) ? 'active' : '' }}" id="pills-FormInovationEmployees-tab" data-bs-toggle="pill" data-bs-target="#pills-FormInovationEmployees" type="button" role="tab" aria-controls="pills-FormInovationEmployees" aria-selected="{{ (request()->is('penilai/appraisment/inovation*')) ? 'true' : 'false' }}">Kelola Data Penilaian Inovasi</button>
                    </li>
                    <!--/ Tabs Form Inovation Appraisment From Employees -->

                    <!-- Tabs Form Inovation Appraisment -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-AppraismentTeamAssessment-tab" data-bs-toggle="pill" data-bs-target="#pills-AppraismentTeamAssessment" type="button" role="tab" aria-controls="pills-AppraismentTeamAssessment" aria-selected="false">Proses SPK</button>
                    </li>
                    <!--/ Tabs Form Inovation Appraisment -->

                    <!-- Tabs Form Inovation Result Appraisment -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-ResultAppraismentTeamAssessment-tab" data-bs-toggle="pill" data-bs-target="#pills-ResultAppraismentTeamAssessment" type="button" role="tab" aria-controls="pills-ResultAppraismentTeamAssessment" aria-selected="false">Hasil Penilaian Inovasi</button>
                    </li>
                    <!--/ Tabs Form Inovation Result Appraisment -->

                </ul>
                <!--/ Tabs -->

            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Tabs Form Inovation Appraisment From Employees -->
                <div class="tab-pane fade show {{ (request()->is('penilai/appraisment/inovation*')) ? 'active' : '' }}" id="pills-FormInovationEmployees" role="tabpanel" aria-labelledby="pills-FormInovationEmployees-tab">
                    <div class="card">

                        <!-- Form Penilaian Inovasi Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Kelola Data Penilaian Inovasi</h5>
                        </div>
                        <!--/ Form Penilaian Inovasi Title -->

                        @if ($timer == null)

                            <div class="container-fluid">
                                <div class="titleCountDownNonActive">
                                    <h1>
                                        <span>Form Penilaian Inovasi Ditutup</span>
                                    </h1>
                                </div>
                            </div>

                        @elseif ($timer != null)

                            {{-- @if (
                                (
                                    ($timer->status_open == 0 && $timer->date_time_open_form_inovation >= \Carbon\Carbon::now()->toDateTimeString()  ) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                                )
                                ||
                                (
                                    ($timer->status_open == 0 && $timer->date_time_open_form_inovation >= \Carbon\Carbon::now()->toDateTimeString() ) && ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                                )
                            )
                            <div class="container-fluid">
                                <div class="titleCountDownNonActive">
                                    <h1>
                                        <span>Harap Tunggu Pemberitahuan Waktu Pembukaan Form Inovasi</span>
                                    </h1>
                                </div>
                            </div>

                            @elseif (
                                (
                                            ($timer->status_open == 1
                                        && ($timer->date_time_open_form_inovation > \Carbon\Carbon::now()->toDateTimeString()  || $timer->date_time_open_form_inovation == \Carbon\Carbon::now()->toDateTimeString() ))
                                    &&  ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                                )
                                ||
                                (
                                            ($timer->status_open == 1
                                        && ($timer->date_time_open_form_inovation > \Carbon\Carbon::now()->toDateTimeString()  || $timer->date_time_open_form_inovation == \Carbon\Carbon::now()->toDateTimeString()) )
                                    &&  ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
                                )
                            )
                            <div class="container-fluid ">
                                <div class="openTimerCountDown">
                                    <div class="titleCountDown">
                                        <h1>Pembukaan Form Inovasi</h1>
                                    </div>
                                    <div class="dateCountDown">
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
                                    </div>
                                </div>
                            </div>

                            @elseif (
                                (
                                        (
                                                ($timer->status_open == 1 && (\Carbon\Carbon::now()->toDateTimeString() > $timer->date_time_open_form_inovation || \Carbon\Carbon::now()->toDateTimeString() == $timer->date_time_open_form_inovation) )
                                            &&  ($timer->status_expired == 1 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation )
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
                            ) --}}

                            <div class="container-fluid py-3">

                                <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Panjang</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>

                            {{-- @elseif (
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
                                        <span>Form Inovasi Telah Ditutup</span>
                                    </h1>
                                </div>
                            </div>

                            @endif --}}

                        @endif

                    </div>
                </div>
                <!--/ Tabs Form Inovation Appraisment From Employees -->

                <!-- Tabs Form Inovation Appraisment -->
                <div class="tab-pane fade" id="pills-AppraismentTeamAssessment" role="tabpanel" aria-labelledby="pills-AppraismentTeamAssessment-tab">

                    <div class="card">

                        <!-- Form Hasil Penilaian Inovasi Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Proses SPK</h5>
                        </div>
                        <!--/ Form Hasil Penilaian Inovasi Title -->

                        <div class="container-fluid py-3">

                            <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table-process-DSS">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Panjang</th>
                                        <th scope="col">Hasil Parameter Penilaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
                <!--/ Tabs Form Inovation Appraisment -->

                <!-- Tabs Form Inovation Appraisment -->
                <div class="tab-pane fade" id="pills-ResultAppraismentTeamAssessment" role="tabpanel" aria-labelledby="pills-ResultAppraismentTeamAssessment-tab">

                    <div class="card">

                        <!-- Form Hasil Penilaian Inovasi Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Hasil Penilaian Inovasi</h5>
                        </div>
                        <!--/ Form Hasil Penilaian Inovasi Title -->

                        <div class="container-fluid py-3">

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

                    </div>

                </div>


            </div>
            <!--/ Tabs -->

        </div>
    </div>
</div>

@stop
