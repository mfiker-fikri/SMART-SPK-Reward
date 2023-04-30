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

                    <form id="formTeladanAppraisment" class="mx-3 my-3" method="POST" action="{{ route('penilai.postManageAppraismentId.Representative.Update.Penilai', $reward->id) }}" enctype="multipart/form-data">
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
                                <select class="form-select" {{ $errors->has('pengetahuanKerja') ? 'is-invalid' : '' }}" id="pengetahuanKerja"
                                    name="pengetahuanKerja"
                                    autofocus autocomplete required>
                                    <option selected disabled>-- Pilih Pengetahuan Kerja --</option>
                                    @foreach ( $selectOptionParameter1 as $sop1)
                                    <option value="{{ $sop1->grade }}" @if( old('pengetahuanKerja') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop1->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="form-text"></div>

                                <!-- Error Pengetahuan Kerja -->
                                @if ( $errors->has('pengetahuanKerja') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengetahuanKerja') }}</strong>
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
                                    autofocus autocomplete required>
                                    <option selected disabled>-- Pilih Analisis Pemecahan Masalah --</option>
                                    @foreach ( $selectOptionParameter2 as $sop2)
                                    <option value="{{ $sop2->grade }}" @if( old('analisisPemecahanMasalah') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop2->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="form-text"></div>

                                <!-- Error Analisis Pemecahan Masalah -->
                                @if ( $errors->has('analisisPemecahanMasalah') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('analisisPemecahanMasalah') }}</strong>
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
                                    autofocus autocomplete required>
                                    <option selected disabled>-- Pilih Tanggung Jawab Pekerjaan --</option>
                                    @foreach ( $selectOptionParameter3 as $sop3)
                                    <option value="{{ $sop3->grade }}" @if( old('tanggungJawabPekerjaan') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop3->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="form-text"></div>

                                <!-- Error Tanggung Jawab Pekerjaan -->
                                @if ( $errors->has('tanggungJawabPekerjaan') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggungJawabPekerjaan') }}</strong>
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
                                    autofocus autocomplete required>
                                    <option selected disabled>-- Pilih Disiplin --</option>
                                    @foreach ( $selectOptionParameter4 as $sop4)
                                    <option value="{{ $sop4->grade }}" @if( old('disiplin') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop4->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="form-text"></div>

                                <!-- Error Disiplin -->
                                @if ( $errors->has('disiplin') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('disiplin') }}</strong>
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
                                    autofocus autocomplete required>
                                    <option selected disabled>-- Pilih Komitmen --</option>
                                    @foreach ( $selectOptionParameter5 as $sop5)
                                    <option value="{{ $sop5->grade }}" @if( old('komitmen') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop5->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="form-text"></div>

                                <!-- Error Komitmen -->
                                @if ( $errors->has('komitmen') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('komitmen') }}</strong>
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
                                    autofocus autocomplete required>
                                    <option selected disabled>-- Pilih Kerja Sama --</option>
                                    @foreach ( $selectOptionParameter6 as $sop6)
                                    <option value="{{ $sop6->grade }}" @if( old('kerjaSama') ) selected="selected" @endif>{{ $loop->iteration }} - {{ $sop6->parameter }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="form-text"></div>

                                <!-- Error Kerja Sama -->
                                @if ( $errors->has('kerjaSama') )
                                <div class="my-3">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kerjaSama') }}</strong>
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
                                <button type="reset" class="btn btn-warning btn-lg">
                                    <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                </button>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <button type="submit" class="btn btn-primary btn-lg"  style="color: black">
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
