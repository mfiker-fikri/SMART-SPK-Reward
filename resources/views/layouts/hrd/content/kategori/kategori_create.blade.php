@extends('template.hrd.template')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">
        
        <div class="col-xxl">

            <!-- Card Add Categories New -->
            <div class="card mx-4">

                <!-- Form Create Add Categories New Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Kategori Baru</h5>
                </div>
                <!--/ Form Create Add Categories New Title -->

                <!-- Form Create Add Categories New -->
                <div class="card-body py-xl-5 py-sm-5 px-xl-5">

                    <form id="formCreateCategoriesNew" class="mx-2" method="POST" action="{{ route('hrd.postManageCategories.Create.HRD') }}">
                        @csrf
                        <!-- Categories-->
                        <div class="mb-3 row {{ $errors->has('categories') ? 'is-invalid' : '' }}">
                            <label for="categories" class="text-wrap col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge">
                                    <span id="categories" class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" id="full_name"
                                        name="categories" placeholder="*Kategori"
                                        autofocus autocomplete required value=""
                                        aria-invalid="true" aria-describedby="categories" data-val="true">
                                </div>

                                <div class="d-flex flex-column">
                                    <div id="categoriesHelp" class="form-text">We'll never share your email with anyone else.</div>
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
                <!--/ Form Create Add Categories New -->

            </div>
            <!--/ Card Add Categories New -->
        </div>
    </div>
</div>

@stop