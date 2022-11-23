@extends('template.sdm.template')

<!-- Content -->
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            @if(session('message-update-success'))
            <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-update-success') }} </b></strong>
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(session('message-update-error'))
            <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-update-error') }}  </b></strong>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @endif

            <!-- Card Edit Categories -->
            <div class="card mx-4">

                <!-- Form Edit Categories Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Data Kategori</h5>
                </div>
                <!--/ Form Edit Categories Title -->

                <!-- Form Edit Categories -->
                <div class="card-body py-xl-5 py-sm-5 px-xl-5">

                    <form id="formUpdateCategories" class="mx-2" method="POST" action="{{ route('sdm.postManageCategoriesId.KepalaSubbagianPenghargaanDisiplindanPensiun.Update.SDM',$category->id) }}" >
                        @csrf
                        <!-- Categories-->
                        <div class="mb-3 row {{ $errors->has('categories') ? 'is-invalid' : '' }}">
                            <label for="categories" class="text-wrap col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge">
                                    <span id="categories" class="input-group-text">
                                        <i class="fa-solid fa-list"></i>
                                    </span>
                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" id="full_name"
                                        name="categories" placeholder="*Kategori"
                                        autofocus autocomplete required value="{{ old('categories', $category->category) }}"
                                        aria-invalid="true" aria-describedby="categories" data-val="true">
                                </div>

                                <div class="d-flex flex-column">
                                    <div id="categoriesHelp" class="form-text">Kami tidak akan pernah mengubah data <b> Ini </b> atas persetujuan bersama dan Kami tidak akan pernah membagikan data <b> Ini </b> kepada orang lain</div>
                                    <!-- Error categories -->
                                    @if ( $errors->has('categories') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('categories') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error categories -->
                                </div>
                            </div>
                        </div>
                        <!--/ Categories-->

                        <!-- Action Button -->
                        <div class="d-flex justify-content-end">
                            <div class="justify-content-between">
                                <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                                <button type="reset" class="btn btn-warning btn-lg">
                                    <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                    <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Submit
                                </button>
                            </div>
                        </div>
                        <!-- Action Button -->

                    </form>

                </div>
                <!--/ Form Edit Categories -->

            </div>
            <!--/ Card Edit Categories -->
        </div>
    </div>
</div>

@stop
