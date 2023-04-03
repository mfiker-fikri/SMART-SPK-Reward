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
    function resetStatusNull(event){
        var oldOpenStatus = document.getElementById("oldOpenStatus").getAttribute("value");
        var oldExpiredStatus = document.getElementById("oldExpiredStatus").getAttribute("value");

        if (oldOpenStatus && oldExpiredStatus) {
            $('#status_open').val(oldOpenStatus).trigger('change');
            $('#status_expired').val(oldExpiredStatus).trigger('change');
        } else if (oldOpenStatus || oldExpiredStatus) {
            $('#status_open').val(oldOpenStatus).trigger('change');
            $('#status_expired').val(oldExpiredStatus).trigger('change');
        } else {
            $('#status_open').val(null).trigger('change');
            $('#status_expired').val(null).trigger('change');
        }
    }
    // $(document).on('click', '#resetStatusNull', function(e) {
    //     var oldOpenStatus = document.getElementById("oldOpenStatus").getAttribute("value");
    //     var oldExpiredStatus = document.getElementById("oldExpiredStatus").getAttribute("value");
    //     if (oldOpenStatus && oldExpiredStatus) {
    //         $('#status_open').val(oldOpenStatus).trigger('change');
    //         $('#status_expired').val(oldExpiredStatus).trigger('change');
    //     } else if (oldOpenStatus || oldExpiredStatus) {
    //         $('#status_open').val(oldOpenStatus).trigger('change');
    //         $('#status_expired').val(oldExpiredStatus).trigger('change');
    //     } else {
    //         $('#status_open').val(null).trigger('change');
    //         $('#status_expired').val(null).trigger('change');
    //     }
    // });
    </script>

    <script type="text/javascript">
    function resetStatus(event){
        var oldOpen = document.getElementById("oldStatusOpen").getAttribute("value");
        var oldExpired = document.getElementById("oldStatusExpired").getAttribute("value");
        if (oldOpen && oldExpired) {
            $('#status_open').val(oldOpen).trigger('change');
            $('#status_expired').val(oldExpired).trigger('change');
        } else if (oldOpen || oldExpired) {
            $('#status_open').val(oldOpen).trigger('change');
            $('#status_expired').val(oldExpired).trigger('change');
        } else {
            $('#status_open').val(null).trigger('change');
            $('#status_expired').val(null).trigger('change');
        }
    }
    // $(document).on('click', '#resetStatus', function(e) {
    //     var oldOpen = document.getElementById("oldStatusOpen").getAttribute("value");
    //     var oldExpired = document.getElementById("oldStatusExpired").getAttribute("value");
    //     if (oldOpenStatus && oldExpiredStatus) {
    //         $('#status_open').val(oldOpen).trigger('change');
    //         $('#status_expired').val(oldExpired).trigger('change');
    //     } else if ((oldOpen || oldExpired) && (oldOpenStatus || oldExpiredStatus)) {
    //         $('#status_open').val(oldOpen).trigger('change');
    //         $('#status_expired').val(oldExpired).trigger('change');
    //     } else {
    //         $('#status_open').val(null).trigger('change');
    //         $('#status_expired').val(null).trigger('change');
    //     }
    // });
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-representative/delete') }}" + '/' + id,
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

                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <li class="nav-item" role="presentation">
                      <button class="nav-link {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-representative')) ? 'active' : '' }}"
                        id="pills-appraisment-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-appraisment"
                        type="button" role="tab" aria-controls="pills-appraisment"
                        aria-selected="{{ (request()->is('penilai/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-representative')) ? 'true' : 'false' }}">Appraisment Inovation</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        @if ($timers->isEmpty())
                            <button class="nav-link {{ $timers->isEmpty() ? 'disabled' : '' }} text-center" id="pills-signature_role2-tab"
                                disabled data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables."
                                >Signature Inovation
                            </button>
                        @elseif ($timers->isNotEmpty())
                            @if ($timers[0]->date_time_open_appraisment != null )
                            <button class="nav-link text-center" id="pills-signature_role2-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-signature_role2" type="button" role="tab" aria-controls="pills-signature_role2" aria-selected="false"
                                >Signature Inovation
                            </button>
                            @elseif ($timers[0]->date_time_open_appraisment == null)
                            <button class="nav-link {{ $timers[0]->date_time_open_appraisment == null ? 'disabled' : '' }} text-center" id="pills-signature_role2-tab"
                                disabled data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables."
                                >Signature Inovation
                            </button>
                            @endif
                        @endif
                    </li>

                </ul>

            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-representative')) ? 'active' : '' }}" id="pills-appraisment" role="tabpanel" aria-labelledby="pills-appraisment-tab" >

                    @if(session('message-update-appraisment-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-appraisment-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-create-appraisment-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-appraisment-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-delete-appraisment-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert" id="message-delete-appraisment-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-appraisment-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-appraisment-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-appraisment-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-create-appraisment-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-appraisment-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-delete-appraisment-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-appraisment-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="card my-4">

                        <!-- Form Timer Countdown Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Representative Appraisment Countdown</h5>
                        </div>
                        <!--/ Form Timer Countdown Title -->

                        <!-- Form Timer Countdown -->
                        <div class="card-body py-xl-5 py-sm-5 px-xl-5">
                            <form id="formCreateTimerAppraismentTeladan" class="mx-2" method="POST" action="{{ route('sdm.postTimerCountDownFormTeladan.Index.Create.SDM') }}">
                                @csrf
                                @if ($timer == null)
                                <input type="hidden" name="id" value="">
                                @else
                                <input type="hidden" name="id" value="{{ $timer->id }}">
                                @endif

                                <!-- Timer Countdown Open Form-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_countdown_teladan_appraisment') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_countdown_teladan_appraisment" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Form</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_countdown_teladan_appraisment') ? 'is-invalid' : '' }}" id="date_time_open_countdown_teladan_appraisment"
                                                name="date_time_open_countdown_teladan_appraisment" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_teladan_appraisment') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_teladan_appraisment', $timer->date_time_open_form_teladan) }}"
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_countdown_teladan_appraisment" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_teladan_formHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Open Form -->
                                            @if ( $errors->has('date_time_open_countdown_teladan_appraisment') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_countdown_teladan_appraisment') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Open Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Open Form -->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_appraisment') ? 'is-invalid' : '' }}">
                                    <label for="status_open_appraisment" class="col-sm-3 col-form-label">Status Open</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_appraisment') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_appraisment') }}" id="oldOpenStatus" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_appraisment', $timer->status_open_appraisment) }}" id="oldStatusOpen" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_appraisment') ? 'is-invalid' : '' }}" id="status_open_appraisment"
                                                name="status_open_appraisment" placeholder="--Pilih Status Open --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_appraisment" data-val="true" aria-label="status_open_appraisment" data-placeholder="-- Pilih Status Open --">
                                                <option disabled selected>-- Pilih Status Open --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_appraisment' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_appraisment' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_appraisment', $timer->status_open_appraisment ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_appraisment', $timer->status_open_appraisment ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenHelp" class="form-text">Pilih Status Open</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_appraisment') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_appraisment') }}</strong>
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
                                        @if ($timer == null)
                                        <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatusNull()">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        @else
                                        <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatus();">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                        </button>
                                        @endif
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
    </div>
</div>

@endsection
