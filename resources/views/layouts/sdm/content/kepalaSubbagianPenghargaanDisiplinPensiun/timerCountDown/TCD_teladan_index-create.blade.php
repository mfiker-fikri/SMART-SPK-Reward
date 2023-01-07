@extends('template.sdm.template')

@section('js_footer')
    <!-- Select2 Status -->
    <script type="text/javascript">
    $( '#status_open' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>

    <script type="text/javascript">
        $( '#status_expired' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>
    <!-- Select2 Status -->

    <!-- Reset Select2 Status -->
    <script type="text/javascript">
    $(document).on('click', '#resetStatus', function(e) {
        var oldOpen = document.getElementById("oldStatusOpen").getAttribute("value");
        var oldExpired = document.getElementById("oldStatusExpired").getAttribute("value");
        if (oldOpen && oldExpired) {
            $('#status_open').val(oldOpen).trigger('change');
            $('#status_expired').val(oldExpired).trigger('change');
        } else {
            $('#status_open').val(null).trigger('change');
            $('#status_expired').val(null).trigger('change');
        }
    });
    </script>
    <!--/ Reset Select2 Status -->

    <!-- Delete -->
    <script type="text/javascript">
        $(document).on('click', '#deleteStatus', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-val');
            // console.log(id);
            Swal.fire({
                title: 'Apakah kamu ingin menghapus timer ini?',
                icon: 'warning',
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
                    $.ajax({
                        headers: {
                            Accept: "application/json"
                        },
                        method: 'post',
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-teladan/delete') }}" + '/' + id,
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Delete',
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Gagal ',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                    })
                }
            });
        });
    </script>
    <!--/ Delete -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Timer Countdown Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Timer Countdown Form Teladan</h5>
                </div>
                <!--/ Form Timer Countdown Title -->

                <!-- Form Timer Countdown -->
                <div class="card-body py-xl-5 py-sm-5 px-xl-5">
                    <form id="formCreateTimerFormTeladan" class="mx-2" method="POST" action="{{ route('sdm.postTimerCountDownFormTeladan.Index.Create.SDM') }}">
                        @csrf
                        @if ($timer == null)
                        <input type="hidden" name="id" value="">
                        @else
                        <input type="hidden" name="id" value="{{ $timer->id }}">
                        @endif

                        <!-- Timer Countdown Open Form-->
                        <div class="mb-3 row {{ $errors->has('date_time_open_countdown_teladan_form') ? 'is-invalid' : '' }}">
                            <label for="date_time_open_countdown_teladan_form" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge">
                                    <span id="categories" class="input-group-text">
                                        <i class="fa-solid fa-calendar"></i>
                                    </span>
                                    <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_countdown_teladan_form') ? 'is-invalid' : '' }}" id="date_time_open_countdown_teladan_form"
                                        name="date_time_open_countdown_teladan_form" placeholder="*Select Date Time"
                                        @if ($timer == null)
                                        autofocus autocomplete required value="{{ old('date_time_open_countdown_teladan_form') }}"
                                        @else
                                        autofocus autocomplete required value="{{ old('date_time_open_countdown_teladan_form', $timer->date_time_open_form_teladan) }}"
                                        @endif
                                        aria-invalid="true" aria-describedby="date_time_open_countdown_teladan_form" data-val="true">
                                </div>
                                <div id="date_time_open_countdown_teladan_formHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                <div class="d-flex flex-column">
                                    <!-- Error Timer Countdown Open Form -->
                                    @if ( $errors->has('date_time_open_countdown_teladan_form') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date_time_open_countdown_teladan_form') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error Timer Countdown Open Form -->
                                </div>
                            </div>
                        </div>
                        <!--/ Timer Countdown Open Form -->

                        <!-- Status Open -->
                        <div class="mb-3 row {{ $errors->has('status_open') ? 'is-invalid' : '' }}">
                            <label for="status_open" class="col-sm-3 col-form-label">Status Open</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text {{ $errors->has('status_open') ? 'is-invalid' : '' }}">
                                        <i class="fa-solid fa-calendar"></i>
                                    </span>
                                    @if ($timer == null)
                                    <input type="hidden" value="{{ old('status_open') }}" id="oldOpenStatus" />
                                    @else
                                    <input type="hidden" value="{{ old('status_open', $timer->status_open) }}" id="oldStatusOpen" />
                                    @endif
                                    <select class="form-select {{ $errors->has('status_open') ? 'is-invalid' : '' }}" id="status_open"
                                        name="status_open" placeholder="--Pilih Status Open --"
                                        autofocus autocomplete required
                                        aria-invalid="true" aria-describedby="status_open" data-val="true" aria-label="status_open" data-placeholder="-- Pilih Status Open --">
                                        <option disabled selected>-- Pilih Status Open --</option>
                                        @if ($timer == null)
                                        <option value="0" @if(old('status_open' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                        <option value="1" @if(old('status_open' ) == 1 ) selected="selected" @endif>Aktif</option>
                                        @else
                                        <option value="0" @if(old('status_open', $timer->status_open ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                        <option value="1" @if(old('status_open', $timer->status_open ) == 1 ) selected="selected" @endif>Aktif</option>
                                        @endif
                                    </select>
                                </div>
                                <div id="statusOpenHelp" class="form-text">Pilih Status Open</div>
                                <!-- Error Status Open -->
                                @if ( $errors->has('status_open') )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_open') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error Status Open -->
                            </div>
                        </div>
                        <!--/ Status Open -->

                        <!-- Timer Countdown Expired Form -->
                        <div class="mb-3 row {{ $errors->has('date_time_expired_countdown_teladan_form') ? 'is-invalid' : '' }}">
                            <label for="date_time_expired_countdown_teladan_form" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Form</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge">
                                    <span id="categories" class="input-group-text">
                                        <i class="fa-solid fa-calendar"></i>
                                    </span>
                                    <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_countdown_teladan_form') ? 'is-invalid' : '' }}" id="date_time_expired_countdown_teladan_form"
                                        name="date_time_expired_countdown_teladan_form" placeholder="*Select Date Time"
                                        @if ($timer == null)
                                        autofocus autocomplete required value="{{ old('date_time_expired_countdown_teladan_form') }}"
                                        @else
                                        autofocus autocomplete required value="{{ old('date_time_expired_countdown_teladan_form', $timer->date_time_expired_form_teladan) }}"
                                        @endif
                                        aria-invalid="true" aria-describedby="date_time_expired_countdown_teladan_form" data-val="true">
                                </div>
                                <div id="date_time_expired_countdown_teladan_formHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                <div class="d-flex flex-column">
                                    <!-- Error Timer Countdown Expired Form -->
                                    @if ( $errors->has('date_time_expired_countdown_teladan_form') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date_time_expired_countdown_teladan_form') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error Timer Countdown Expired Form -->
                                </div>
                            </div>
                        </div>
                        <!--/ Timer Countdown Expired Form -->

                         <!-- Status Close -->
                         <div class="mb-3 row {{ $errors->has('status_expired') ? 'is-invalid' : '' }}">
                            <label for="status_expired" class="col-sm-3 col-form-label">Status Close</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text {{ $errors->has('status_expired') ? 'is-invalid' : '' }}">
                                        <i class="fa-solid fa-calendar"></i>
                                    </span>
                                    @if ($timer == null)
                                    <input type="hidden" value="{{ old('status_expired') }}" id="oldExpiredStatus" />
                                    @else
                                    <input type="hidden" value="{{ old('status_expired', $timer->status_expired) }}" id="oldStatusExpired" />
                                    @endif
                                    <select class="form-select {{ $errors->has('status_expired') ? 'is-invalid' : '' }}" id="status_expired"
                                        name="status_expired" placeholder="--Pilih Status Close --"
                                        autofocus autocomplete required
                                        aria-invalid="true" aria-describedby="status_expired" data-val="true" aria-label="status_expired" data-placeholder="-- Pilih Status Close --">
                                        <option disabled selected>-- Pilih Status Close --</option>
                                        @if ($timer == null)
                                        <option value="0" @if(old('status_expired' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                        <option value="1" @if(old('status_expired' ) == 1 ) selected="selected" @endif>Aktif</option>
                                        @else
                                        <option value="0" @if(old('status_expired', $timer->status_expired ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                        <option value="1" @if(old('status_expired', $timer->status_expired ) == 1 ) selected="selected" @endif>Aktif</option>
                                        @endif
                                    </select>
                                </div>
                                <div id="statusClosenHelp" class="form-text">Pilih Status Close</div>
                                <!-- Error Status Close -->
                                @if ( $errors->has('status_expired') )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_expired') }}</strong>
                                    </span>
                                @endif
                                <!--/ Error Status Close -->
                            </div>
                        </div>
                        <!--/ Status Close -->

                        <!-- Action Button -->
                        <div class="mt-4 d-flex justify-content-end">
                            <div class="justify-content-between">
                                @if ($timer != null)
                                <button type="button" class="btn btn-danger btn-lg" style="color: black" id="deleteStatus" data-val="{{ $timer->id }}">
                                    <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                                </button>
                                @endif
                                <button type="reset" class="btn btn-warning btn-lg" id="resetStatus">
                                    <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                    @if ($timer == null)
                                    <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Save
                                    @else
                                    <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Update
                                    @endif
                                </button>
                            </div>
                        </div>
                        <!-- Action Button -->

                        </form>
                </div>
                <!-- Form Timer Countdown -->

            </div>
        </div>
    </div>
</div>

@endsection
