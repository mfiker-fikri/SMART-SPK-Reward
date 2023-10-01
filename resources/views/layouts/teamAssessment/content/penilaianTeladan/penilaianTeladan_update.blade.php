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
    <!-- Select2 Pengetahuan Kerja -->
    <script type="text/javascript">
    $( '#pengetahuanKerja' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Pengetahuan Kerja -->

    <!-- Select2 Analisis Pemecahan Masalah -->
    <script type="text/javascript">
    $( '#analisisPemecahanMasalah' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Analisis Pemecahan Masalah -->

    <!-- Select2 Tanggung Jawab Pekerjaan -->
    <script type="text/javascript">
    $( '#tanggungJawabPekerjaan' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Tanggung Jawab Pekerjaan -->

    <!-- Select2 Disiplin -->
    <script type="text/javascript">
    $( '#disiplin' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Disiplin -->

    <!-- Select2 Komitmen -->
    <script type="text/javascript">
    $( '#komitmen' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Komitmen -->

    <!-- Select2 Kerja Sama -->
    <script type="text/javascript">
    $( '#kerjaSama' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>
    <!-- Select2 Kerja Sama -->

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript">
    document.getElementById("reset").onclick = function() {
        reset()
    };

    function reset() {
        $('#pengetahuanKerja').val(null).trigger('change').removeClass("is-valid");
        $('#analisisPemecahanMasalah').val(null).trigger('change').removeClass("is-valid");
        $('#tanggungJawabPekerjaan').val(null).trigger('change').removeClass("is-valid");
        $('#disiplin').val(null).trigger('change').removeClass("is-valid");
        $('#komitmen').val(null).trigger('change').removeClass("is-valid");
        $('#kerjaSama').val(null).trigger('change').removeClass("is-valid");

        // $('#pengetahuan_Kerja').children('strong').remove();
        // $('#analisis_PemecahanMasalah').children('strong').remove();
        // $('#tanggung_JawabPekerjaan').children('strong').remove();
        // $('#Disiplin').children('strong').remove();
        // $('#Komitmen').children('strong').remove();
        // $('#kerja_Sama').children('strong').remove();
    }
    </script>

    <!-- Reject Form Inovation Id -->
    <script type="text/javascript">
    $(document).ready(function () {
        $('#submit').on('click', function(e) {
            e.preventDefault();

            let id = $(this).attr('data-id');
            let pengetahuanKerja = $("select#pengetahuanKerja").val();
            let analisisPemecahanMasalah = $("select#analisisPemecahanMasalah").val();
            let tanggungJawabPekerjaan = $("select#tanggungJawabPekerjaan").val();
            let disiplin = $("select#disiplin").val();
            let komitmen = $("select#komitmen").val();
            let kerjaSama = $("select#kerjaSama").val();
            // console.log(id);
            // console.log(pengetahuanKerja);

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
                    $('#formTeladanAppraisement').validate({
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
                            pengetahuanKerja: {
                                required: true
                            },
                            analisisPemecahanMasalah: {
                                required: true
                            },
                            tanggungJawabPekerjaan: {
                                required: true
                            },
                            disiplin: {
                                required: true
                            },
                            komitmen: {
                                required: true
                            },
                            kerjaSama: {
                                required: true
                            }
                        },
                        messages:{
                            pengetahuanKerja :
                            {
                                required: "Wajib Diisi"
                            },
                            analisisPemecahanMasalah: {
                                required: "Wajib Diisi"
                            },
                            tanggungJawabPekerjaan: {
                                required: "Wajib Diisi"
                            },
                            disiplin: {
                                required: "Wajib Diisi"
                            },
                            komitmen: {
                                required: "Wajib Diisi"
                            },
                            kerjaSama: {
                                required: "Wajib Diisi"
                            }
                        },
                        errorPlacement: function (error, element) {
                            if ( (element.attr("name") == "pengetahuanKerja") ) {
                                error.appendTo("#pengetahuan_Kerja").addClass("strong");
                            }
                            else if ( (element.attr("name") == "analisisPemecahanMasalah") ) {
                                error.appendTo("#analisis_PemecahanMasalah").addClass("strong");
                            }
                            else if ( (element.attr("name") == "tanggungJawabPekerjaan") ) {
                                error.appendTo("#tanggung_JawabPekerjaan").addClass("strong");
                            }
                            else if ( (element.attr("name") == "disiplin") ) {
                                error.appendTo("#Disiplin").addClass("strong");
                            }
                            else if( (element.attr("name") == "komitmen") ) {
                                error.appendTo("#Komitmen").addClass("strong");
                            }
                            else if( (element.attr("name") == "kerjaSama") ) {
                                error.appendTo("#kerja_Sama").addClass("strong");
                            }
                            else {
                                error.insertAfter(element);
                            }
                        },
                    });
                    if ($("#formTeladanAppraisement").valid()) {
                        $.ajax({
                            headers: {
                                Accept: "application/json"
                            },
                            method: 'post',
                            url: "{{ url('penilai/appraisement/representative/valuation') }}" + '/' + id + '/post',
                            data: {
                                employee_id: id,
                                // score_valuation_1: pengetahuanKerja,
                                // score_valuation_2: analisisPemecahanMasalah,
                                // score_valuation_3: tanggungJawabPekerjaan,
                                // score_valuation_4: disiplin,
                                // score_valuation_5: komitmen,
                                // score_valuation_6: kerjaSama,

                                pengetahuanKerja: pengetahuanKerja,
                                analisisPemecahanMasalah: analisisPemecahanMasalah,
                                tanggungJawabPekerjaan: tanggungJawabPekerjaan,
                                disiplin: disiplin,
                                komitmen: komitmen,
                                kerjaSama: kerjaSama,
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
                                        window.location = "/penilai/appraisement/result/representative";
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
    <!--/ Reject Form Inovation Id -->

    <script>
    $(document).ready(function () {
        $('select[name="pengetahuanKerja"]').change(function(){
            if ($('select[name="pengetahuanKerja"]').length > 0) {
                $('#pengetahuan_Kerja').children('strong').remove();
                $('select[name="pengetahuanKerja"]').removeClass("is-invalid");
                $('select[name="pengetahuanKerja"]').addClass("is-valid")
            } else if ($('select[name="pengetahuanKerja"]').length == 0) {
                $('select[name="pengetahuanKerja"]').removeClass("is-valid");
                $('select[name="pengetahuanKerja"]').addClass("is-invalid")
            }
        })

        $('select[name="analisisPemecahanMasalah"]').change(function(){
            if ($('select[name="analisisPemecahanMasalah"]').length > 0) {
                $('#analisis_PemecahanMasalah').children('strong').remove();
                $('select[name="analisisPemecahanMasalah"]').removeClass("is-invalid");
                $('select[name="analisisPemecahanMasalah"]').addClass("is-valid")
            } else if ($('select[name="analisisPemecahanMasalah"]').length == 0) {
                $('select[name="analisisPemecahanMasalah"]').removeClass("is-valid");
                $('select[name="analisisPemecahanMasalah"]').addClass("is-invalid")
            }
        })

        $('select[name="tanggungJawabPekerjaan"]').change(function(){
            if ($('select[name="tanggungJawabPekerjaan"]').length > 0) {
                $('#tanggung_JawabPekerjaan').children('strong').remove();
                $('select[name="tanggungJawabPekerjaan"]').removeClass("is-invalid");
                $('select[name="tanggungJawabPekerjaan"]').addClass("is-valid")
            } else if ($('select[name="tanggungJawabPekerjaan"]').length == 0) {
                $('select[name="tanggungJawabPekerjaan"]').removeClass("is-valid");
                $('select[name="tanggungJawabPekerjaan"]').addClass("is-invalid")
            }
        })

        $('select[name="disiplin"]').change(function(){
            if ($('select[name="disiplin"]').length > 0) {
                $('#Disiplin').children('strong').remove();
                $('select[name="disiplin"]').removeClass("is-invalid");
                $('select[name="disiplin"]').addClass("is-valid")
            } else if ($('select[name="disiplin"]').length == 0) {
                $('select[name="disiplin"]').removeClass("is-valid");
                $('select[name="disiplin"]').addClass("is-invalid")
            }
        })

        $('select[name="komitmen"]').change(function(){
            if ($('select[name="komitmen"]').length > 0) {
                $('#Komitmen').children('strong').remove();
                $('select[name="komitmen"]').removeClass("is-invalid");
                $('select[name="komitmen"]').addClass("is-valid")
            } else if ($('select[name="komitmen"]').length == 0) {
                $('select[name="komitmen"]').removeClass("is-valid");
                $('select[name="komitmen"]').addClass("is-invalid")
            }
        })

        $('select[name="kerjaSama"]').change(function(){
            if ($('select[name="kerjaSama"]').length > 0) {
                $('#kerja_Sama').children('strong').remove();
                $('select[name="kerjaSama"]').removeClass("is-invalid");
                $('select[name="kerjaSama"]').addClass("is-valid")
            } else if ($('select[name="kerjaSama"]').length == 0) {
                $('select[name="kerjaSama"]').removeClass("is-valid");
                $('select[name="kerjaSama"]').addClass("is-invalid")
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

                <!-- Form Inovation Appraisment Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Penilaian Penghargaan Teladan</h5>
                </div>
                <!--/ Form Inovation Appraisment Title -->

                <!-- Form Inovation Appraisment Details -->
                <div class="card-body py-md-4 py-4 mx-4 mx-4">

                    <form id="formTeladanAppraisement" class="mx-3 my-3" method="POST" action="{{ route('penilai.postManageAppraismentId.Representative.Update.Penilai', $reward->id) }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Full Name -->
                        <div class="my-3 {{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                            <label for="full_name" class="form-label">Nama Lengkap Pegawai</label>
                            <div class="input-group input-group-merge {{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                                <span id="full_name" class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('full_name') ? 'is-invalid' : '' }}" id="full_name"
                                    name="full_name" placeholder="*Nama Lengkap" disabled
                                    autofocus autocomplete required value="{{ old('full_name', $reward->full_name) }}" />
                            </div>

                            <div class="d-flex flex-column">
                                <!-- Error Full_name -->
                                @if ( $errors->has('full_name') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                </div>
                                @endif
                                <!--/ Error Full_name -->
                            </div>
                        </div>
                        <!--/ Full Name -->

                        <!-- Pengetahuan Kerja -->
                        <div class="my-3 {{ $errors->has('pengetahuanKerja') ? 'is-invalid' : '' }}">
                            <label for="pengetahuanKerja" class="form-label">Pengetahuan Kerja</label>
                            <div class="input-group input-group-merge {{ $errors->has('pengetahuanKerja') ? 'is-invalid' : '' }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                <input type="hidden" value="{{ old('pengetahuanKerja') }}" id="oldPengetahuanKerja" />
                                <select class="form-select" {{ $errors->has('pengetahuanKerja') ? 'is-invalid' : '' }}" id="pengetahuanKerja"
                                    name="pengetahuanKerja"
                                    autofocus autocomplete required
                                    data-placeholder="-- Pilih Pengetahuan Kerja --">
                                    <option selected disabled>-- Pilih Pengetahuan Kerja --</option>
                                    @foreach ( $selectOptionParameter1 as $sop1)
                                    <option value="{{ $sop1->grade }}" @if( old('pengetahuanKerja') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop1->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column" id="pengetahuan_Kerja">
                                <div class="form-text"></div>

                                <!-- Error Pengetahuan Kerja -->
                                @if ( $errors->has('pengetahuanKerja') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong class="pengetahuan_Kerja">{{ $errors->first('pengetahuanKerja') }}</strong>
                                    </span>
                                </div>
                                @endif
                                <!--/ Error Pengetahuan Kerja -->
                            </div>
                        </div>
                        <!--/ Pengetahuan Kerja -->

                        <!-- Analisis Pemecahan Masalah -->
                        <div class="my-3 {{ $errors->has('analisisPemecahanMasalah') ? 'is-invalid' : '' }}">
                            <label for="analisisPemecahanMasalah" class="form-label">Analisis Pemecahan Masalah</label>
                            <div class="input-group input-group-merge {{ $errors->has('analisisPemecahanMasalah') ? 'is-invalid' : '' }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                <select class="form-select" {{ $errors->has('analisisPemecahanMasalah') ? 'is-invalid' : '' }}" id="analisisPemecahanMasalah"
                                    name="analisisPemecahanMasalah"
                                    autofocus autocomplete required
                                    data-placeholder="-- Pilih Analisis Pemecahan Masalah --">
                                    <option selected disabled>-- Pilih Analisis Pemecahan Masalah --</option>
                                    @foreach ( $selectOptionParameter2 as $sop2)
                                    <option value="{{ $sop2->grade }}" @if( old('analisisPemecahanMasalah') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop2->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column" id="analisis_PemecahanMasalah">
                                <div class="form-text"></div>

                                <!-- Error Analisis Pemecahan Masalah -->
                                @if ( $errors->has('analisisPemecahanMasalah') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong class="analisis_PemecahanMasalah">{{ $errors->first('analisisPemecahanMasalah') }}</strong>
                                    </span>
                                </div>
                                @endif
                                <!--/ Error Analisis Pemecahan Masalah -->
                            </div>
                        </div>
                        <!--/ Analisis Pemecahan Masalah -->

                        <!-- Tanggung Jawab Pekerjaan -->
                        <div class="my-3 {{ $errors->has('tanggungJawabPekerjaan') ? 'is-invalid' : '' }}">
                            <label for="tanggungJawabPekerjaan" class="form-label">Tanggung Jawab Pekerjaan</label>
                            <div class="input-group input-group-merge {{ $errors->has('tanggungJawabPekerjaan') ? 'is-invalid' : '' }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                <select class="form-select" {{ $errors->has('tanggungJawabPekerjaan') ? 'is-invalid' : '' }}" id="tanggungJawabPekerjaan"
                                    name="tanggungJawabPekerjaan"
                                    autofocus autocomplete required
                                    data-placeholder="-- Pilih Tanggung Jawab Pekerjaan --">
                                    <option selected disabled>-- Pilih Tanggung Jawab Pekerjaan --</option>
                                    @foreach ( $selectOptionParameter3 as $sop3)
                                    <option value="{{ $sop3->grade }}" @if( old('tanggungJawabPekerjaan') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop3->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column" id="tanggung_JawabPekerjaan">
                                <div class="form-text"></div>

                                <!-- Error Tanggung Jawab Pekerjaan -->
                                @if ( $errors->has('tanggungJawabPekerjaan') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong class="tanggung_JawabPekerjaan">{{ $errors->first('tanggungJawabPekerjaan') }}</strong>
                                    </span>
                                </div>
                                @endif
                                <!--/ Error Tanggung Jawab Pekerjaan -->
                            </div>
                        </div>
                        <!--/ Tanggung Jawab Pekerjaan -->

                        <!-- Disiplin -->
                        <div class="my-3 {{ $errors->has('disiplin') ? 'is-invalid' : '' }}">
                            <label for="disiplin" class="form-label">Disiplin</label>
                            <div class="input-group input-group-merge {{ $errors->has('disiplin') ? 'is-invalid' : '' }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                <select class="form-select" {{ $errors->has('disiplin') ? 'is-invalid' : '' }}" id="disiplin"
                                    name="disiplin"
                                    autofocus autocomplete required
                                    data-placeholder="-- Pilih Disiplin --">
                                    <option selected disabled>-- Pilih Disiplin --</option>
                                    @foreach ( $selectOptionParameter4 as $sop4)
                                    <option value="{{ $sop4->grade }}" @if( old('disiplin') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop4->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column" id="Disiplin">
                                <div class="form-text"></div>

                                <!-- Error Disiplin -->
                                @if ( $errors->has('disiplin') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong class="Disiplin">{{ $errors->first('disiplin') }}</strong>
                                    </span>
                                </div>
                                @endif
                                <!--/ Error Disiplin -->
                            </div>
                        </div>
                        <!--/ Disiplin -->

                        <!-- Komitmen -->
                        <div class="my-3 {{ $errors->has('komitmen') ? 'is-invalid' : '' }}">
                            <label for="komitmen" class="form-label">Komitmen</label>
                            <div class="input-group input-group-merge {{ $errors->has('komitmen') ? 'is-invalid' : '' }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                <select class="form-select" {{ $errors->has('komitmen') ? 'is-invalid' : '' }}" id="komitmen"
                                    name="komitmen"
                                    autofocus autocomplete required
                                    data-placeholder="-- Pilih Komitmen --">
                                    <option selected disabled>-- Pilih Komitmen --</option>
                                    @foreach ( $selectOptionParameter5 as $sop5)
                                    <option value="{{ $sop5->grade }}" @if( old('komitmen') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop5->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column" id="Komitmen">
                                <div class="form-text"></div>

                                <!-- Error Komitmen -->
                                @if ( $errors->has('komitmen') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong class="Komitmen">{{ $errors->first('komitmen') }}</strong>
                                    </span>
                                </div>
                                @endif
                                <!--/ Error Komitmen -->
                            </div>
                        </div>
                        <!--/ Komitmen -->

                        <!-- Kerja Sama -->
                        <div class="my-3 {{ $errors->has('kerjaSama') ? 'is-invalid' : '' }}">
                            <label for="kerjaSama" class="form-label">Kerja Sama</label>
                            <div class="input-group input-group-merge {{ $errors->has('kerjaSama') ? 'is-invalid' : '' }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                <select class="form-select" {{ $errors->has('kerjaSama') ? 'is-invalid' : '' }}" id="kerjaSama"
                                    name="kerjaSama"
                                    autofocus autocomplete required
                                    data-placeholder="-- Pilih Kerja Sama --">
                                    <option selected disabled>-- Pilih Kerja Sama --</option>
                                    @foreach ( $selectOptionParameter6 as $sop6)
                                    <option value="{{ $sop6->grade }}" @if( old('kerjaSama') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop6->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column" id="kerja_Sama">
                                <div class="form-text"></div>

                                <!-- Error Kerja Sama -->
                                @if ( $errors->has('kerjaSama') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong class="kerja_Sama">{{ $errors->first('kerjaSama') }}</strong>
                                    </span>
                                </div>
                                @endif
                                <!--/ Error Kerja Sama -->
                            </div>
                        </div>
                        <!--/ Kerja Sama -->

                        <!-- Action Button -->
                        <div class="my-md-4 d-flex flex-row justify-content-end">
                            {{-- <div class="mx-1 mx-1 mx-1">
                                <a class="btn btn-default" href="{{ request()->fullUrl() }}" role="button">Check again!</a>
                            </div> --}}
                            <div class="mx-1 mx-1 mx-1">
                                <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('penilai/appraisement/representative') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                    <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                </a>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <button type="reset" class="btn btn-warning btn-lg" id="reset">
                                    <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                </button>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <button type="button" class="btn btn-primary btn-lg" style="color: black" id="submit" data-id="{{ $reward->id }}">
                                    <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Nilai
                                </button>
                            </div>
                        </div>
                        <!--/ Action Button -->
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection
