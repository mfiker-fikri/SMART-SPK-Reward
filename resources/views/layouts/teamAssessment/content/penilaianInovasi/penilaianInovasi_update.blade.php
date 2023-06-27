@extends('template.teamAssessment.template')

@section('css_header')
    <style>
        .select2-container--bootstrap-5 .select2-selection {
            max-width: 100px !important;
            min-width: 100% !important;
        }

    </style>


@endsection

@section('js_footer')
    <!-- Select2 Kebaruan -->
    <script type="text/javascript">
    $( '#kebaruan' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        // allowClear: true,
    } );
    </script>
    <!-- Select2 Kebaruan -->

    <!-- Select2 Kemanfaatan -->
    <script type="text/javascript">
    $( '#kemanfaatan' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Kemanfaatan -->

    <!-- Select2 Peran Serta -->
    <script type="text/javascript">
    $( '#peranSerta' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Peran Serta -->

    <!-- Select2 Transfer Replikasi -->
    <script type="text/javascript">
    $( '#transferReplikasi' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Transfer Replikasi -->

    <!-- Select2 Nyata Nilai Tambah -->
    <script type="text/javascript">
    $( '#nyataNilaiTambah' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Nyata Nilai Tambah -->

    <!-- Select2 Kesinambungan Konsistensi Kerja -->
    <script type="text/javascript">
    $( '#kesinambunganKonsistensiKerja' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Kesinambungan Konsistensi Kerja -->

    <script type="text/javascript">
    $(document).on('click', '#resetSelect', function(e) {
        // if (
        //     ($('#kebaruan').val() == null) ||
        //     ($('#kemanfaatan').val() == null) ||
        //     ($('#peranSerta').val() == null) ||
        //     ($('#transferReplikasi').val() == null) ||
        //     ($('#nyataNilaiTambah').val() == null) ||
        //     ($('#kesinambunganKonsistensiKerja').val() == null) ||
        // ) {
        //     $('#kebaruan').val(null).trigger('change');
        //     $('#kemanfaatan').val(null).trigger('change');
        //     $('#peranSerta').val(null).trigger('change');
        //     $('#transferReplikasi').val(null).trigger('change');
        //     $('#nyataNilaiTambah').val(null).trigger('change');
        //     $('#kesinambunganKonsistensiKerja').val(null).trigger('change');
        // } else {



            // $('#kebaruan').val(null).trigger('change');
            // $('#kemanfaatan').val(null).trigger('change');
            // $('#peranSerta').val(null).trigger('change');
            // $('#transferReplikasi').val(null).trigger('change');
            // $('#nyataNilaiTambah').val(null).trigger('change');
            // $('#kesinambunganKonsistensiKerja').val(null).trigger('change');

            // $('#errorKebaruan').children('strong').remove();
            // $('#errorKemanfaatan').children('strong').remove();
            // $('#errorPeranSerta').children('strong').remove();
            // $('#errorNyataNilaiTambah').children('strong').remove();
            // $('#errorKesinambunganKonsistensiKerja').children('strong').remove();
        // }

    });
    </script>

    {{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Form Inovation Id -->
    <script type="text/javascript">
    $(document).ready(function () {
        $('#submit').on('click', function(e) {
            e.preventDefault();

            let id = $(this).attr('data-id');
            let kebaruan = $("select#kebaruan").val();
            let kemanfaatan = $("select#kemanfaatan").val();
            let peranSerta = $("select#peranSerta").val();
            let transferReplikasi = $("select#transferReplikasi").val();
            let nyataNilaiTambah = $("select#nyataNilaiTambah").val();
            let kesinambunganKonsistensiKerja = $("select#kesinambunganKonsistensiKerja").val();


            Swal.fire({
                title: 'Apakah kamu yakin dengan penilaian ini?',
                icon: 'warning',
                text: 'Data penilaian ini tidak bisa diubah kembali dan hanya cukup satu kali penilaian',
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
                    $('#formInovationAppraisement').validate({
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass("is-invalid").removeClass("is-valid");
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).addClass("is-valid").removeClass("is-invalid");
                        },
                        debug: false,
                        errorElement: "strong",
                        errorClass: 'text-danger',
                        rules: {
                            kebaruan: {
                                required: true
                            },
                            kemanfaatan: {
                                required: true
                            },
                            peranSerta: {
                                required: true
                            },
                            transferReplikasi: {
                                required: true
                            },
                            nyataNilaiTambah: {
                                required: true
                            },
                            kesinambunganKonsistensiKerja: {
                                required: true
                            }
                        },
                        messages:{
                            kebaruan :
                            {
                                required: "Wajib Diisi"
                            },
                            kemanfaatan: {
                                required: "Wajib Diisi"
                            },
                            peranSerta: {
                                required: "Wajib Diisi"
                            },
                            transferReplikasi: {
                                required: "Wajib Diisi"
                            },
                            nyataNilaiTambah: {
                                required: "Wajib Diisi"
                            },
                            kesinambunganKonsistensiKerja: {
                                required: "Wajib Diisi"
                            }
                        },
                        errorPlacement: function (error, element) {
                            if ( (element.attr("name") == "kebaruan") ) {
                                error.appendTo("#errorKebaruan").addClass("strong");
                            }
                            else if ( (element.attr("name") == "kemanfaatan") ) {
                                error.appendTo("#errorKemanfaatan").addClass("strong");
                            }
                            else if ( (element.attr("name") == "peranSerta") ) {
                                error.appendTo("#errorPeranSerta").addClass("strong");
                            }
                            else if ( (element.attr("name") == "transferReplikasi") ) {
                                error.appendTo("#errorTransferReplikasi").addClass("strong");
                            }
                            else if( (element.attr("name") == "nyataNilaiTambah") ) {
                                error.appendTo("#errorNyataNilaiTambah").addClass("strong");
                            }
                            else if( (element.attr("name") == "kesinambunganKonsistensiKerja") ) {
                                error.appendTo("#errorKesinambunganKonsistensiKerja").addClass("strong");
                            }
                            else {
                                error.insertAfter(element);
                            }
                        },
                    });
                    if ($("#formInovationAppraisement").valid()) {
                        $.ajax({
                            headers: {
                                Accept: "application/json"
                            },
                            method: 'post',
                            url: "{{ url('penilai/appraisement/innovation/valuation') }}" + '/' + id + '/post',
                            data: {
                                employee_id: id,
                                kebaruan: kebaruan,
                                kemanfaatan: kemanfaatan,
                                peranSerta: peranSerta,
                                transferReplikasi: transferReplikasi,
                                nyataNilaiTambah: nyataNilaiTambah,
                                kesinambunganKonsistensiKerja: kesinambunganKonsistensiKerja,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Berhasil',
                                    icon: 'success',
                                    confirmButtonText: 'Ok',
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location = "/penilai/appraisement/innovation";
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
                    }
                } else {
                    Swal.fire({
                        title: 'Gagal ',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                    })
                }
            });
            // }
        });
    });
    </script>
    <!--/ Form Inovation Id -->

    <script>
    $(document).ready(function () {
        $('select[name="kebaruan"]').change(function(){
            if ($('select[name="kebaruan"]').length > 0) {
                $('#errorKebaruan').children('strong').remove();
                $('select[name="kebaruan"]').removeClass("is-invalid");
                $('select[name="kebaruan"]').addClass("is-valid")
            } else if ($('select[name="kebaruan"]').length == 0) {
                $('select[name="kebaruan"]').removeClass("is-valid");
                $('select[name="kebaruan"]').addClass("is-invalid")
            }
        })

        $('select[name="kemanfaatan"]').change(function(){
            if ($('select[name="kemanfaatan"]').length > 0) {
                $('#errorKemanfaatan').children('strong').remove();
                $('select[name="kemanfaatan"]').removeClass("is-invalid");
                $('select[name="kemanfaatan"]').addClass("is-valid")
            } else if ($('select[name="kemanfaatan"]').length == 0) {
                $('select[name="kemanfaatan"]').removeClass("is-valid");
                $('select[name="kemanfaatan"]').addClass("is-invalid")
            }
        })

        $('select[name="peranSerta"]').change(function(){
            if ($('select[name="peranSerta"]').length > 0) {
                $('#errorPeranSerta').children('strong').remove();
                $('select[name="peranSerta"]').removeClass("is-invalid");
                $('select[name="peranSerta"]').addClass("is-valid")
            } else if ($('select[name="peranSerta"]').length == 0) {
                $('select[name="peranSerta"]').removeClass("is-valid");
                $('select[name="peranSerta"]').addClass("is-invalid")
            }
        })

        $('select[name="transferReplikasi"]').change(function(){
            if ($('select[name="transferReplikasi"]').length > 0) {
                $('#errorTransferReplikasi').children('strong').remove();
                $('select[name="transferReplikasi"]').removeClass("is-invalid");
                $('select[name="transferReplikasi"]').addClass("is-valid")
            } else if ($('select[name="transferReplikasi"]').length == 0) {
                $('select[name="transferReplikasi"]').removeClass("is-valid");
                $('select[name="transferReplikasi"]').addClass("is-invalid")
            }
        })

        $('select[name="nyataNilaiTambah"]').change(function(){
            if ($('select[name="nyataNilaiTambah"]').length > 0) {
                $('#errorNyataNilaiTambah').children('strong').remove();
                $('select[name="nyataNilaiTambah"]').removeClass("is-invalid");
                $('select[name="nyataNilaiTambah"]').addClass("is-valid")
            } else if ($('select[name="nyataNilaiTambah"]').length == 0) {
                $('select[name="nyataNilaiTambah"]').removeClass("is-valid");
                $('select[name="nyataNilaiTambah"]').addClass("is-invalid")
            }
        })

        $('select[name="kesinambunganKonsistensiKerja"]').change(function(){
            if ($('select[name="kesinambunganKonsistensiKerja"]').length > 0) {
                $('#errorKesinambunganKonsistensiKerja').children('strong').remove();
                $('select[name="kesinambunganKonsistensiKerja"]').removeClass("is-invalid");
                $('select[name="kesinambunganKonsistensiKerja"]').addClass("is-valid")
            } else if ($('select[name="kesinambunganKonsistensiKerja"]').length == 0) {
                $('select[name="kesinambunganKonsistensiKerja"]').removeClass("is-valid");
                $('select[name="kesinambunganKonsistensiKerja"]').addClass("is-invalid")
            }
        })
    });
    </script>
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
                        <button class="nav-link {{ (request()->is('penilai/appraisement/innovation/valuation*')) ? 'active' : '' }}" id="pills-FormInovationEmployees-tab" data-bs-toggle="pill" data-bs-target="#pills-FormInovationEmployees" type="button" role="tab" aria-controls="pills-FormInovationEmployees" aria-selected="{{ (request()->is('penilai/appraisment/innovation/valuation*')) ? 'true' : 'false' }}">Form Inovation Pegawai - {{ $reward->employees->full_name }}</button>
                    </li>
                    <!--/ Tabs Form Inovation Appraisment From Employees -->

                    <!-- Tabs Form Inovation Appraisment -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-AppraismentTeamAssessment-tab" data-bs-toggle="pill" data-bs-target="#pills-AppraismentTeamAssessment" type="button" role="tab" aria-controls="pills-AppraismentTeamAssessment" aria-selected="false">Penilaian dari Tim Penilai</button>
                    </li>
                    <!--/ Tabs Form Inovation Appraisment -->

                </ul>
                <!--/ Tabs -->

            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Tabs Form Inovation Appraisment From Employees -->
                <div class="tab-pane fade show {{ (request()->is('penilai/appraisement/innovation/valuation*')) ? 'active' : '' }}" id="pills-FormInovationEmployees" role="tabpanel" aria-labelledby="pills-FormInovationEmployees-tab">

                    <div class="card">

                        <!-- Form Inovation Appraisment Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Penilaian Form Pendaftaran Penghargaan Inovasi</h5>
                        </div>
                        <!--/ Form Inovation Appraisment Title -->

                        <!-- Form Inovation Appraisment Details -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">

                            <form id="formInovation" class="mx-3 my-3" method="POST" action="#" enctype="multipart/form-data">
                                <!-- Upload Short Description -->
                                <div class="row my-3 {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}">
                                    <label for="uploadFileUpdate" class="col-xl-3 col-form-label">Upload Short Description</label>
                                    <div class="col-md-9 col-xl-9">
                                        <div class="d-flex justify-content-center py-sm-3">
                                            <iframe class="d-block rounded" width="600" height="350" id="output_pdf" src="{{ asset('storage/employees/documents/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_short_description) }}"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Upload Short Description -->

                                <!-- Upload Photo -->
                                <div class="row my-3 {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}">
                                    <label for="uploadPhoto" class="col-xl-3 col-form-label">Upload Photo</label>
                                    <div class="col-md-9 col-xl-9">
                                        <div class="d-flex justify-content-center py-sm-3">
                                            <img class="d-block rounded" width="450" height="350" id="output_image" src="{{ asset('storage/employees/images/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_image_support) }}">
                                        </div>
                                    </div>
                                </div>
                                <!--/ Upload Photo -->

                                <!-- Upload Video -->
                                <div class="row my-3 {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                                    <label for="uploadVideo" class="col-xl-3 col-form-label">Upload Video</label>
                                    <div class="col-md-9 col-xl-9">
                                        <div class="d-flex justify-content-center py-sm-3">
                                            <video class="d-block rounded" style="max-width: 650px; min-width: 450px; max-height: 450px; min-height: 350px" controls id="video_here" src="{{ asset('storage/employees/videos/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_video_support) }}"></video>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Upload Video -->

                            </form>

                        </div>
                        <!--/ Form Inovation Appraisment Details -->

                    </div>

                </div>
                <!--/ Tabs Form Inovation Appraisment From Employees -->

                <!-- Tabs Form Inovation Appraisment -->
                <div class="tab-pane fade" id="pills-AppraismentTeamAssessment" role="tabpanel" aria-labelledby="pills-AppraismentTeamAssessment-tab">

                    @if(session('message-update-password-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-password-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-password-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-password-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="card">

                        <!-- Form Inovation Appraisment Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Penilaian Penghargaan Inovasi</h5>
                        </div>
                        <!--/ Form Inovation Appraisment Title -->

                        <!-- Form Inovation Appraisment Details -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">

                            <form id="formInovationAppraisement" class="mx-3 my-3" method="POST" action="{{ route('penilai.postManageAppraismentId.Update.Penilai', $reward->id) }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Kebaruan -->
                                <div class="my-3 {{ $errors->has('kebaruan') ? 'is-invalid' : '' }}">
                                    <label for="kebaruan" class="form-label">Kebaruan</label>
                                    <div class="input-group input-group-merge {{ $errors->has('kebaruan') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </span>
                                        <select class="form-select" {{ $errors->has('kebaruan') ? 'is-invalid' : '' }}" id="kebaruan"
                                            name="kebaruan" placeholder="-- Pilih Kebaruan --"
                                            autofocus autocomplete required
                                            aria-invalid="true" aria-describedby="role" data-val="true" aria-label="role" data-placeholder="-- Pilih Kebaruan --">
                                            <option selected disabled>-- Pilih Kebaruan --</option>
                                            @foreach ( $selectOptionParameter1 as $sop1)
                                            <option value="{{ $sop1->grade }}" @if( old('kebaruan') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop1->parameter }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex flex-column" id="errorKebaruan">
                                        <div class="form-text"></div>

                                        <!-- Error Kebaruan -->
                                        @if ( $errors->has('kebaruan') )
                                        <div class="my-3">
                                            <span class="help-block">
                                                <strong class="errorKebaruan">{{ $errors->first('kebaruan') }}</strong>
                                            </span>
                                        </div>
                                        @endif
                                        <!--/ Error Kebaruan -->
                                    </div>
                                </div>
                                <!--/ Kebaruan -->

                                <!-- Kemanfaatan -->
                                <div class="my-3 {{ $errors->has('kemanfaatan') ? 'is-invalid' : '' }}">
                                    <label for="kemanfaatan" class="form-label">Kemanfaatan</label>
                                    <div class="input-group input-group-merge {{ $errors->has('kemanfaatan') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </span>
                                        <select class="form-select" {{ $errors->has('kemanfaatan') ? 'is-invalid' : '' }}" id="kemanfaatan"
                                            name="kemanfaatan" placeholder="-- Pilih Kemanfaatan --"
                                            autofocus autocomplete required
                                            aria-invalid="true" aria-describedby="role" data-val="true" aria-label="role" data-placeholder="-- Pilih Kemanfaatan --">
                                            <option selected disabled>-- Pilih Kemanfaatan --</option>
                                            @foreach ( $selectOptionParameter2 as $sop2)
                                            <option value="{{ $sop2->grade }}" @if( old('kemanfaatan') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop2->parameter }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex flex-column" id="errorKemanfaatan">
                                        <div class="form-text"></div>

                                        <!-- Error Kemanfaatan -->
                                        @if ( $errors->has('kemanfaatan') )
                                        <div class="my-3">
                                            <span class="help-block">
                                                <strong class="errorKemanfaatan">{{ $errors->first('kemanfaatan') }}</strong>
                                            </span>
                                        </div>
                                        @endif
                                        <!--/ Error Kemanfaatan -->
                                    </div>
                                </div>
                                <!--/ Kemanfaatan -->

                                <!-- Peran Serta -->
                                <div class="my-3 {{ $errors->has('peranSerta') ? 'is-invalid' : '' }}">
                                    <label for="peranSerta" class="form-label">Peran Serta</label>
                                    <div class="input-group input-group-merge {{ $errors->has('peranSerta') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </span>
                                        <select class="form-select" {{ $errors->has('peranSerta') ? 'is-invalid' : '' }}" id="peranSerta"
                                            name="peranSerta" placeholder="-- Pilih Peran Serta --"
                                            autofocus autocomplete required
                                            aria-invalid="true" aria-describedby="role" data-val="true" aria-label="role" data-placeholder="-- Pilih Peran Serta --">
                                            <option selected disabled>-- Pilih Peran Serta --</option>
                                            @foreach ( $selectOptionParameter3 as $sop3)
                                            <option value="{{ $sop3->grade }}" @if( old('peranSerta') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop3->parameter }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex flex-column" id="errorPeranSerta">
                                        <div class="form-text"></div>

                                        <!-- Error Peran Serta -->
                                        @if ( $errors->has('peranSerta') )
                                        <div class="my-3">
                                            <span class="help-block">
                                                <strong class="errorPeranSerta">{{ $errors->first('peranSerta') }}</strong>
                                            </span>
                                        </div>
                                        @endif
                                        <!--/ Error Peran Serta -->
                                    </div>
                                </div>
                                <!--/ Peran Serta -->

                                <!-- Dapat Ditransfer / Replikasi -->
                                <div class="my-3 {{ $errors->has('transferReplikasi') ? 'is-invalid' : '' }}">
                                    <label for="transferReplikasi" class="form-label">Dapat Ditransfer / Replikasi</label>
                                    <div class="input-group input-group-merge {{ $errors->has('transferReplikasi') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </span>
                                        <select class="form-select" {{ $errors->has('transferReplikasi') ? 'is-invalid' : '' }}" id="transferReplikasi"
                                            name="transferReplikasi" placeholder="-- Pilih Dapat Ditransfer / Replikasi --"
                                            autofocus autocomplete required
                                            aria-invalid="true" aria-describedby="role" data-val="true" aria-label="role" data-placeholder="-- Pilih Dapat Ditransfer / Replikasi --">
                                            <option selected disabled>-- Pilih Dapat Ditransfer / Replikasi --</option>
                                            @foreach ( $selectOptionParameter4 as $sop4)
                                            <option value="{{ $sop4->grade }}" @if( old('transferReplikasi') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop4->parameter }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex flex-column" id="errorTransferReplikasi">
                                        <div class="form-text"></div>

                                        <!-- Error Dapat Ditransfer / Replikasi -->
                                        @if ( $errors->has('transferReplikasi') )
                                        <div class="my-3">
                                            <span class="help-block">
                                                <strong class="errorTransferReplikasi">{{ $errors->first('transferReplikasi') }}</strong>
                                            </span>
                                        </div>
                                        @endif
                                        <!--/ Error Dapat Ditransfer / Replikasi -->
                                    </div>
                                </div>
                                <!--/ Dapat Ditransfer / Replikasi -->

                                <!-- Karya Nyata dan Penciptaan Nilai Tambah -->
                                <div class="my-3 {{ $errors->has('nyataNilaiTambah') ? 'is-invalid' : '' }}">
                                    <label for="nyataNilaiTambah" class="form-label">Karya Nyata dan Penciptaan Nilai Tambah</label>
                                    <div class="input-group input-group-merge {{ $errors->has('nyataNilaiTambah') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </span>
                                        <select class="form-select" {{ $errors->has('nyataNilaiTambah') ? 'is-invalid' : '' }}" id="nyataNilaiTambah"
                                            name="nyataNilaiTambah" placeholder="-- Pilih Karya Nyata dan Penciptaan Nilai Tambah --"
                                            autofocus autocomplete required
                                            aria-invalid="true" aria-describedby="role" data-val="true" aria-label="role" data-placeholder="-- Pilih Karya Nyata dan Penciptaan Nilai Tambah --">
                                            <option selected disabled>-- Pilih Karya Nyata dan Penciptaan Nilai Tambah --</option>
                                            @foreach ( $selectOptionParameter5 as $sop5)
                                            <option value="{{ $sop5->grade }}" @if( old('nyataNilaiTambah') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop5->parameter }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex flex-column" id="errorNyataNilaiTambah">
                                        <div class="form-text"></div>

                                        <!-- Error Karya Nyata dan Penciptaan Nilai Tambah -->
                                        @if ( $errors->has('nyataNilaiTambah') )
                                        <div class="my-3">
                                            <span class="help-block">
                                                <strong class="errorNyataNilaiTambah">{{ $errors->first('nyataNilaiTambah') }}</strong>
                                            </span>
                                        </div>
                                        @endif
                                        <!--/ Error Karya Nyata dan Penciptaan Nilai Tambah -->
                                    </div>
                                </div>
                                <!--/ Karya Nyata dan Penciptaan Nilai Tambah -->

                                <!-- Kesinambungan dan Konsistensi Prestasi Kerja -->
                                <div class="my-3 {{ $errors->has('kesinambunganKonsistensiKerja') ? 'is-invalid' : '' }}">
                                    <label for="kesinambunganKonsistensiKerja" class="form-label">Kesinambungan dan Konsistensi Prestasi Kerja</label>
                                    <div class="input-group input-group-merge {{ $errors->has('kesinambunganKonsistensiKerja') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </span>
                                        <select class="form-select" {{ $errors->has('kesinambunganKonsistensiKerja') ? 'is-invalid' : '' }}" id="kesinambunganKonsistensiKerja"
                                            name="kesinambunganKonsistensiKerja" placeholder="-- Pilih Kesinambungan dan Konsistensi Prestasi Kerja --"
                                            autofocus autocomplete required
                                            aria-invalid="true" aria-describedby="role" data-val="true" aria-label="role" data-placeholder="-- Pilih Kesinambungan dan Konsistensi Prestasi Kerja --">
                                            <option selected disabled>-- Pilih Kesinambungan dan Konsistensi Prestasi Kerja --</option>
                                            @foreach ( $selectOptionParameter6 as $sop6)
                                            <option value="{{ $sop6->grade }}" @if( old('kesinambunganKonsistensiKerja') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop6->parameter }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex flex-column" id="errorKesinambunganKonsistensiKerja">
                                        <div class="form-text"></div>

                                        <!-- Error Kesinambungan dan Konsistensi Prestasi Kerja -->
                                        @if ( $errors->has('kesinambunganKonsistensiKerja') )
                                        <div class="my-3">
                                            <span class="help-block">
                                                <strong class="errorKesinambunganKonsistensiKerja">{{ $errors->first('kesinambunganKonsistensiKerja') }}</strong>
                                            </span>
                                        </div>
                                        @endif
                                        <!--/ Error Kesinambungan dan Konsistensi Prestasi Kerja -->
                                    </div>
                                </div>
                                <!--/ Kesinambungan dan Konsistensi Prestasi Kerja -->

                                <!-- Action Button -->
                                <div class="my-md-4 d-flex flex-row justify-content-end">
                                    {{-- <div class="mx-1 mx-1 mx-1">
                                        <a class="btn btn-default" href="{{ request()->fullUrl() }}" role="button">Check again!</a>
                                    </div> --}}
                                    <div class="mx-1 mx-1 mx-1">
                                        <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('penilai/appraisement/innovation') }}" role="button">
                                            <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                        </a>
                                    </div>
                                    <div class="mx-1 mx-1 mx-1">
                                        <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                            <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                        </a>
                                    </div>
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="reset" class="btn btn-warning btn-lg" id="resetSelect">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                        </button>
                                    </div>
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="button" class="btn btn-primary btn-lg"  style="color: black" id="submit" data-id="{{ $reward->id }}">
                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Nilai
                                        </button>
                                    </div>
                                </div>
                                <!--/ Action Button -->
                            </form>

                        </div>
                    </div>


                </div>
                <!--/ Tabs Form Inovation Appraisment -->
            </div>



        </div>
    </div>
</div>

@endsection
