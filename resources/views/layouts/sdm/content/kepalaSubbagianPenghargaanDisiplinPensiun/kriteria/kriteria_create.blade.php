@extends('template.sdm.template')

@section('css_header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@stop

@section('js_header')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stop

@section('js_footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#select-categories').select2({
            theme: 'bootstrap-5',
            placeholder: $( this ).data( 'placeholder' ),
            // width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            // width: 'resolve
        });
    });
    </script>
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            @if(session('message-create-success'))
            <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-create-success') }} </b></strong>
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(session('message-create-error'))
            <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-create-error') }}  </b></strong>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @endif

            <!-- Card Add Criteria New -->
            <div class="card mx-4">

                <!-- Form Create Add Criteria New Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Kriteria Baru</h5>
                </div>
                <!--/ Form Create Add Criteria New Title -->

                <!-- Form Create Add Criteria New -->
                <div class="card-body py-xl-5 py-sm-5 px-xl-5">

                    <form id="formCreateCriteriasNew" class="mx-2" method="POST" action="{{ route('sdm.postManageCriterias.KepalaSubbagianPenghargaanDisiplindanPensiun.Create.SDM') }}">
                        @csrf
                        <!-- Categories -->
                        <div class="mb-3 row {{ $errors->has('categories') ? 'is-invalid' : '' }}">
                            <label for="categories" class="text-wrap col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge">
                                    <span id="categories" class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <select class="form-select {{ $errors->has('categories') ? 'is-invalid' : '' }}" id="select-categories"
                                        name="categories" data-placeholder="--Pilih Kategori--"
                                        data-width="80%" aria-label="Default select example">
                                        {{-- <option selected>Open this select menu</option> --}}
                                        <option value="" disabled selected>--Pilih Jenjang--</option>
                                        @foreach ($category as $c)
                                            <option value="{{ $c->id }}">{{ $c->category }}</option>
                                        @endforeach
                                    </select>
                                    <div class="d-flex flex-column">
                                        <div id="categoriesHelp" class="form-text">We'll never share your email with anyone else.</div>
                                        <!-- Error Categories -->
                                        @if ( $errors->has('categories') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('categories') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Categories -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Categories -->

                        <!-- Criterias -->
                        <div class="mb-3 row {{ $errors->has('criterias') ? 'is-invalid' : '' }}">
                            <label for="criterias" class="text-wrap col-sm-3 col-form-label">Kriteria</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge">
                                    <span id="criterias" class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('criterias') ? 'is-invalid' : '' }}" id="criterias"
                                        name="criterias" placeholder="*Kriteria"
                                        autofocus autocomplete required value=""
                                        aria-invalid="true" aria-describedby="criterias" data-val="true">
                                </div>

                                <div class="d-flex flex-column">
                                    <div id="criteriasHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    <!-- Error Criterias -->
                                    @if ( $errors->has('criterias') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('criterias') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error Criterias -->
                                </div>
                            </div>
                        </div>
                        <!--/ Criterias -->

                        <!-- Value Quality -->
                        <div class="mb-3 row {{ $errors->has('value_quality') ? 'is-invalid' : '' }}">
                            <label for="value_quality" class="text-wrap col-sm-3 col-form-label">Bobot Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge">
                                    <span id="value_quality" class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="number" class="form-control px-lg-1 px-2 {{ $errors->has('value_quality') ? 'is-invalid' : '' }}" id="value_quality"
                                        name="value_quality" placeholder="*Bobot Nilai"
                                        autofocus autocomplete required value=""
                                        aria-invalid="true" aria-describedby="value_quality" data-val="true" min="0" max="100">
                                </div>

                                <div class="d-flex flex-column">
                                    <div id="value_qualityHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    <!-- Error Value Quality -->
                                    @if ( $errors->has('value_quality') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('value_quality') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error Value Quality -->
                                </div>
                            </div>
                        </div>
                        <!--/ Value Quality -->

                        <!-- Action Button -->
                        <div class="d-flex justify-content-end">
                            <div class="justify-content-between">
                                <a class="btn btn-secondary btn-lg" href="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                                <button type="reset" class="btn btn-warning btn-lg" style="color: black">
                                    <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Submit
                                </button>
                            </div>
                        </div>
                        <!-- Action Button -->

                    </form>

                </div>
                <!--/ Form Create Add Criterias New -->

            </div>
            <!--/ Card Add Criterias New -->
        </div>
    </div>
</div>

@stop
