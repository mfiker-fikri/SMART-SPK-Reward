@extends('template.hrd.template')

<!-- Content -->
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <!-- Card View Categories -->
            <div class="card mx-4">

                <!-- Form View Categories Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Lihat Data Kategori</h5>
                </div>
                <!--/ Form View Categories Title -->

                <!-- Form View Categories -->
                <div class="card-body py-xl-5 py-sm-5 px-xl-5">

                    <form id="formViewCategories" class="mx-2">
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
                                        aria-invalid="true" aria-describedby="categories" data-val="true" readonly>
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
                                <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('hrd/manage/categories') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!-- Action Button -->

                    </form>

                </div>
                <!--/ Form View Categories -->

            </div>
            <!--/ Card View Categories -->
        </div>
    </div>
</div>

@stop

