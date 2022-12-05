@extends('template.sdm.template')

@section('js_footer')
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Timer Countdown Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Timer Countdown</h5>
                </div>
                <!--/ Form Timer Countdown Title -->

                {{-- <div class="container-fluid"> --}}

                    <!-- Form Timer Countdown -->
                    <div class="card-body py-xl-5 py-sm-5 px-xl-5">
                        <form id="formCreateTimerFormInovation" class="mx-2" method="POST" action="{{ route('sdm.postTimerCountDownFormInovation.Index.Create.SDM') }}">
                            @csrf
                            <!-- Timer Countdown-->
                            <div class="mb-3 row {{ $errors->has('date_time_countdown_inovation_form') ? 'is-invalid' : '' }}">
                                <label for="date_time_countdown_inovation_form" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span id="categories" class="input-group-text">
                                            <i class="fa-solid fa-calendar"></i>
                                        </span>
                                        <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_countdown_inovation_form') ? 'is-invalid' : '' }}" id="date_time_countdown_inovation_form"
                                            name="date_time_countdown_inovation_form" placeholder="*Select Date Time"
                                            autofocus autocomplete required value=""
                                            aria-invalid="true" aria-describedby="date_time_countdown_inovation_form" data-val="true">
                                    </div>
                                    <div id="date_time_countdown_inovation_formHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                    <div class="d-flex flex-column">
                                        <!-- Error Timer Countdown -->
                                        @if ( $errors->has('date_time_countdown_inovation_form') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('date_time_countdown_inovation_form') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Timer Countdown -->
                                    </div>
                                </div>
                            </div>
                            <!--/ Timer Countdown-->

                            <!-- Status -->
                            <div class="mb-3 row {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                            <i class="fa-solid fa-calendar"></i>
                                        </span>
                                        <input type="hidden" value="{{ old('status') }}" id="oldStatus" />
                                        <select class="form-select {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status"
                                            name="status" placeholder="--Pilih Status --"
                                            autofocus autocomplete required
                                            aria-invalid="true" aria-describedby="status" data-val="true" aria-label="status" data-placeholder="-- Pilih Status --">
                                            <option disabled selected>-- Pilih Status --</option>
                                            <option value="0" @if(old('status') == 1 ) selected="selected" @endif>Tidak Aktif</option>
                                            <option value="1" @if(old('status') == 2 ) selected="selected" @endif>Aktif</option>
                                        </select>
                                    </div>
                                    <div id="statusHelp" class="form-text">Pilih Status</div>
                                    <!-- Error Status -->
                                    @if ( $errors->has('status') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error Status -->
                                </div>
                            </div>
                            <!--/ Status -->

                            <!-- Action Button -->
                            <div class="mt-4 d-flex justify-content-end">
                                <div class="justify-content-between">
                                    <button type="reset" class="btn btn-warning btn-lg" id="resetStatus">
                                        <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                        <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Save
                                    </button>
                                </div>
                            </div>
                            <!-- Action Button -->

                         </form>
                    </div>
                    <!-- Form Timer Countdown -->

                {{-- </div> --}}

            </div>
        </div>
    </div>
</div>

@endsection
