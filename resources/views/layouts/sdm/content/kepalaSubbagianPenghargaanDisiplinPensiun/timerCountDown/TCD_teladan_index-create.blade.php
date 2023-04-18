@extends('template.sdm.template')

@section('js_footer')
    <!-- Select2 Status -->
    <script type="text/javascript">
    $( '#status_open_appraisment' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_appraisment' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_open_signature_human_resource_3' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_signature_human_resource_3' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_open_signature_human_resource_2' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_signature_human_resource_2' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_open_signature_human_resource_1' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script type="text/javascript">
        $( '#status_expired_signature_human_resource_1' ).select2( {
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
            $('#status_open_appraisment').val(oldOpenStatus).trigger('change');
            $('#status_expired_appraisment').val(oldExpiredStatus).trigger('change');
        } else if (oldOpenStatus || oldExpiredStatus) {
            $('#status_open_appraisment').val(oldOpenStatus).trigger('change');
            $('#status_expired_appraisment').val(oldExpiredStatus).trigger('change');
        } else {
            $('#status_open_appraisment').val(null).trigger('change');
            $('#status_expired_appraisment').val(null).trigger('change');
        }
    }
    // $(document).on('click', '#resetStatusNull', function(e) {
    //     var oldOpenStatus = document.getElementById("oldOpenStatus").getAttribute("value");
    //     var oldExpiredStatus = document.getElementById("oldExpiredStatus").getAttribute("value");
    //     if (oldOpenStatus && oldExpiredStatus) {
    //         $('#status_open_appraisment').val(oldOpenStatus).trigger('change');
    //         $('#status_expired_appraisment').val(oldExpiredStatus).trigger('change');
    //     } else if (oldOpenStatus || oldExpiredStatus) {
    //         $('#status_open_appraisment').val(oldOpenStatus).trigger('change');
    //         $('#status_expired_appraisment').val(oldExpiredStatus).trigger('change');
    //     } else {
    //         $('#status_open_appraisment').val(null).trigger('change');
    //         $('#status_expired_appraisment').val(null).trigger('change');
    //     }
    // });
    </script>

    <script type="text/javascript">
    function resetStatusNullAppraisment(event){
        var oldOpenStatus = document.getElementById("oldOpenStatusAppraisment").getAttribute("value");
        var oldExpiredStatus = document.getElementById("oldExpiredStatusAppraisment").getAttribute("value");

        if (oldOpenStatus && oldExpiredStatus) {
            $('#status_open_appraisment').val(oldOpenStatus).trigger('change');
            $('#status_expired_appraisment').val(oldExpiredStatus).trigger('change');
        } else if (oldOpenStatus || oldExpiredStatus) {
            $('#status_open_appraisment').val(oldOpenStatus).trigger('change');
            $('#status_expired_appraisment').val(oldExpiredStatus).trigger('change');
        } else {
            $('#status_open_appraisment').val(null).trigger('change');
            $('#status_expired_appraisment').val(null).trigger('change');
        }
    }
    </script>

    <script type="text/javascript">
    function resetStatusNullsdm(event){

        var oldOpenStatus1      = document.getElementById("oldOpenStatusAppraisment1").getAttribute("value");
        var oldOpenStatus2      = document.getElementById("oldOpenStatusAppraisment2").getAttribute("value");
        var oldOpenStatus3      = document.getElementById("oldOpenStatusAppraisment3").getAttribute("value");

        var oldExpiredStatus1   = document.getElementById("oldExpiredStatusAppraisment1").getAttribute("value");
        var oldExpiredStatus2   = document.getElementById("oldExpiredStatusAppraisment2").getAttribute("value");
        var oldExpiredStatus3   = document.getElementById("oldExpiredStatusAppraisment3").getAttribute("value");

        if ( (oldOpenStatus1 && oldExpiredStatus1) || (oldOpenStatus2 && oldExpiredStatus2) || (oldOpenStatus3 && oldExpiredStatus3) ) {
            $('#status_open_signature_human_resource_3').val(oldOpenStatus3).trigger('change');
            $('#status_expired_signature_human_resource_3').val(oldExpiredStatus3).trigger('change');

            $('#status_open_signature_human_resource_2').val(oldOpenStatus2).trigger('change');
            $('#status_expired_signature_human_resource_2').val(oldExpiredStatus2).trigger('change');

            $('#status_open_signature_human_resource_1').val(oldOpenStatus1).trigger('change');
            $('#status_expired_signature_human_resource_1').val(oldExpiredStatus1).trigger('change');


        } else if ( (oldOpenStatus1 || oldExpiredStatus1) && (oldOpenStatus2 || oldExpiredStatus2) && (oldOpenStatus3 || oldExpiredStatus3) ) {
            $('#status_open_signature_human_resource_3').val(oldOpenStatus3).trigger('change');
            $('#status_expired_signature_human_resource_3').val(oldExpiredStatus3).trigger('change');

            $('#status_open_signature_human_resource_2').val(oldOpenStatus2).trigger('change');
            $('#status_expired_signature_human_resource_2').val(oldExpiredStatus2).trigger('change');

            $('#status_open_signature_human_resource_1').val(oldOpenStatus1).trigger('change');
            $('#status_expired_signature_human_resource_1').val(oldExpiredStatus1).trigger('change');

        } else {
            $('#status_open_signature_human_resource_3').val(null).trigger('change');
            $('#status_expired_signature_human_resource_3').val(null).trigger('change');

            $('#status_open_signature_human_resource_2').val(null).trigger('change');
            $('#status_expired_signature_human_resource_2').val(null).trigger('change');

            $('#status_open_signature_human_resource_1').val(null).trigger('change');
            $('#status_expired_signature_human_resource_1').val(null).trigger('change');
        }
    }
    </script>

    <script type="text/javascript">
    function resetStatus(event){
        var oldOpen = document.getElementById("oldStatusOpen").getAttribute("value");
        var oldExpired = document.getElementById("oldStatusExpired").getAttribute("value");
        if (oldOpen && oldExpired) {
            $('#status_open_appraisment').val(oldOpen).trigger('change');
            $('#status_expired_appraisment').val(oldExpired).trigger('change');
        } else if (oldOpen || oldExpired) {
            $('#status_open_appraisment').val(oldOpen).trigger('change');
            $('#status_expired_appraisment').val(oldExpired).trigger('change');
        } else {
            $('#status_open_appraisment').val(null).trigger('change');
            $('#status_expired_appraisment').val(null).trigger('change');
        }
    }
    // $(document).on('click', '#resetStatus', function(e) {
    //     var oldOpen = document.getElementById("oldStatusOpen").getAttribute("value");
    //     var oldExpired = document.getElementById("oldStatusExpired").getAttribute("value");
    //     if (oldOpenStatus && oldExpiredStatus) {
    //         $('#status_open_appraisment').val(oldOpen).trigger('change');
    //         $('#status_expired_appraisment').val(oldExpired).trigger('change');
    //     } else if ((oldOpen || oldExpired) && (oldOpenStatus || oldExpiredStatus)) {
    //         $('#status_open_appraisment').val(oldOpen).trigger('change');
    //         $('#status_expired_appraisment').val(oldExpired).trigger('change');
    //     } else {
    //         $('#status_open_appraisment').val(null).trigger('change');
    //         $('#status_expired_appraisment').val(null).trigger('change');
    //     }
    // });
    </script>


    <script type="text/javascript">
    function resetStatusAppraisment(event) {
        var oldOpen = document.getElementById("oldStatusOpenAppraisment").getAttribute("value");
        var oldExpired = document.getElementById("oldStatusExpiredAppraisment").getAttribute("value");

        if (oldOpen && oldExpired) {
            $('#status_open_appraisment').val(oldOpen).trigger('change');
            $('#status_expired_appraisment').val(oldExpired).trigger('change');
        } else if (oldOpen || oldExpired) {
            $('#status_open_appraisment').val(oldOpen).trigger('change');
            $('#status_expired_appraisment').val(oldExpired).trigger('change');
        } else {
            $('#status_open_appraisment').val(null).trigger('change');
            $('#status_expired_appraisment').val(null).trigger('change');
        }
    }
    </script>


    <script type="text/javascript">
    function resetStatussdm(event) {
        var oldOpen1             = document.getElementById("oldStatusOpenAppraisment1").getAttribute("value");
        var oldOpen2             = document.getElementById("oldStatusOpenAppraisment2").getAttribute("value");
        var oldOpen3             = document.getElementById("oldStatusOpenAppraisment3").getAttribute("value");
        console.log(oldOpen1);


        var oldExpired1          = document.getElementById("oldStatusExpiredAppraisment1").getAttribute("value");
        var oldExpired2          = document.getElementById("oldStatusExpiredAppraisment2").getAttribute("value");
        var oldExpired3          = document.getElementById("oldStatusExpiredAppraisment3").getAttribute("value");

        if ( (oldOpen1 && oldExpired1) || (oldOpen2 && oldExpired2) || (oldOpen3 && oldExpired3) ) {
            $('#status_open_signature_human_resource_3').val(oldOpen3).trigger('change');
            $('#status_expired_signature_human_resource_3').val(oldExpired3).trigger('change');

            $('#status_open_signature_human_resource_2').val(oldOpen2).trigger('change');
            $('#status_expired_signature_human_resource_2').val(oldExpired2).trigger('change');

            $('#status_open_signature_human_resource_1').val(oldOpen1).trigger('change');
            $('#status_expired_signature_human_resource_1').val(oldExpired1).trigger('change');

        } else if ( (oldOpen1 || oldExpired1) && (oldOpen2 || oldExpired2) && (oldOpen3 || oldExpired3) ) {
            $('#status_open_signature_human_resource_3').val(oldOpen3).trigger('change');
            $('#status_expired_signature_human_resource_3').val(oldExpired3).trigger('change');

            $('#status_open_signature_human_resource_2').val(oldOpen2).trigger('change');
            $('#status_expired_signature_human_resource_2').val(oldExpired2).trigger('change');

            $('#status_open_signature_human_resource_1').val(oldOpen1).trigger('change');
            $('#status_expired_signature_human_resource_1').val(oldExpired1).trigger('change');
        } else {
            $('#status_open_signature_human_resource_3').val(null).trigger('change');
            $('#status_expired_signature_human_resource_3').val(null).trigger('change');

            $('#status_open_signature_human_resource_2').val(null).trigger('change');
            $('#status_expired_signature_human_resource_2').val(null).trigger('change');

            $('#status_open_signature_human_resource_1').val(null).trigger('change');
            $('#status_expired_signature_human_resource_1').val(null).trigger('change');
        }
    }
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement/delete') }}" + '/' + id,
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
                      <button class="nav-link {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement')) ? 'active' : '' }}"
                        id="pills-appraisement-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-appraisement"
                        type="button" role="tab" aria-controls="pills-appraisement"
                        aria-selected="{{ (request()->is('penilai/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement')) ? 'true' : 'false' }}"
                        >Representative Appraisement Countdown</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        @if ($timers->isEmpty())
                            <button class="nav-link {{ $timers->isEmpty() ? 'disabled' : '' }} text-center" id="pills-signature_role2-tab"
                                disabled data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables."
                                >Representative Signature Countdown
                            </button>
                        @elseif ($timers->isNotEmpty())
                            @if ($timers[0]->date_time_open_appraisment != null )
                            <button class="nav-link text-center" id="pills-signature_role2-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-signature_role2" type="button" role="tab" aria-controls="pills-signature_role2" aria-selected="false"
                                >Representative Signature Countdown
                            </button>
                            @elseif ($timers[0]->date_time_open_appraisment == null)
                            <button class="nav-link {{ $timers[0]->date_time_open_appraisment == null ? 'disabled' : '' }} text-center" id="pills-signature_role2-tab"
                                disabled data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables."
                                >Representative Signature Countdown
                            </button>
                            @endif
                        @endif
                    </li>

                </ul>

            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement')) ? 'active' : '' }}" id="pills-appraisement" role="tabpanel" aria-labelledby="pills-appraisement-tab" >

                    @if(session('message-update-appraisement-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-appraisement-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-create-appraisement-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-appraisement-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-delete-appraisement-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert" id="message-delete-appraisement-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-appraisement-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-appraisement-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-appraisement-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-create-appraisement-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-create-appraisement-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-delete-appraisement-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-delete-appraisement-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="card my-4">

                        <!-- Form Timer Countdown Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Representative Appraisement Countdown</h5>
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
                                    <label for="date_time_open_countdown_teladan_appraisment" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Penilaian</label>
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
                                                autofocus autocomplete required value="{{ old('date_time_open_countdown_teladan_appraisment', $timer->date_time_open_appraisment) }}"
                                                @endif
                                                min="{{ \Carbon\Carbon::tomorrow() }}"
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
                                <div class="mb-3 row {{ $errors->has('date_time_expired_countdown_teladan_appraisment') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_countdown_teladan_appraisment" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Penilaian</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_countdown_teladan_appraisment') ? 'is-invalid' : '' }}" id="date_time_expired_countdown_teladan_appraisment"
                                                name="date_time_expired_countdown_teladan_appraisment" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_teladan_appraisment') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_countdown_teladan_appraisment', $timer->date_time_expired_appraisment) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_open_appraisment != null )
                                                        min="{{ $timers[0]->date_time_open_appraisment }}"
                                                    @endif
                                                @endif
                                                @if ($timers->isEmpty())
                                                    min="{{ \Carbon\Carbon::tomorrow()->addDays(1)->toDateTimeString() }}"
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_countdown_teladan_appraisment" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_teladan_formHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_countdown_teladan_appraisment') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_countdown_teladan_appraisment') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                 <!-- Status Close -->
                                 <div class="mb-3 row {{ $errors->has('status_expired_appraisment') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_appraisment" class="col-sm-3 col-form-label">Status Close</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_appraisment') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_appraisment') }}" id="oldExpiredStatus" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_appraisment', $timer->status_expired_appraisment) }}" id="oldStatusExpired" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_appraisment') ? 'is-invalid' : '' }}" id="status_expired_appraisment"
                                                name="status_expired_appraisment" placeholder="--Pilih Status Close --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_appraisment" data-val="true" aria-label="status_expired_appraisment" data-placeholder="-- Pilih Status Close --">
                                                <option disabled selected>-- Pilih Status Close --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_appraisment' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_appraisment' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_appraisment', $timer->status_expired_appraisment ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_appraisment', $timer->status_expired_appraisment ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Close</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_appraisment') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_appraisment') }}</strong>
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
                                        <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                            <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                        </a>
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

                <div class="tab-pane fade" id="pills-signature_role2" role="tabpanel" aria-labelledby="pills-signature_role2-tab" tabindex="0">

                    <div class="card my-4">

                        <!-- Form Timer Countdown Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Representative Signature Countdown</h5>
                        </div>
                        <!--/ Form Timer Countdown Title -->

                        <!-- Form Timer Countdown -->
                        <div class="card-body py-xl-5 py-sm-5 px-xl-5">
                            <form id="formCreateTimerAppraismentInovation" class="mx-2" method="POST" action="{{ route('sdm.postTimerCountDownSignatureTeladan.Index.Create.SDM') }}">
                                @csrf
                                @if ($timer == null)
                                <input type="hidden" name="id" value="">
                                @else
                                <input type="hidden" name="id" value="{{ $timer->id }}">
                                @endif


                                <div class="divider">
                                    <div class="divider-text">Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</div>
                                </div>


                                <!-- Timer Countdown-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_signature_human_resource_3" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Tanda Tangan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_signature_human_resource_3') ? 'is-invalid' : '' }}" id="date_time_open_signature_human_resource_3"
                                                name="date_time_open_signature_human_resource_3" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_3') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_3', $timer->date_time_open_signature_human_resource_3) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisment != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisment)->addDays(1)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_signature_human_resource_3" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_appraismentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_signature_human_resource_3') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_signature_human_resource_3') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                    <label for="status_open_signature_human_resource_3" class="col-sm-3 col-form-label">Status Open</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_3') }}" id="oldOpenStatusAppraisment3" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_3', $timer->status_open_signature_human_resource_3) }}" id="oldStatusOpenAppraisment3" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_signature_human_resource_3') ? 'is-invalid' : '' }}" id="status_open_signature_human_resource_3"
                                                name="status_open_signature_human_resource_3" placeholder="--Pilih Status Open --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_signature_human_resource_3" data-val="true" aria-label="status_open_signature_human_resource_3" data-placeholder="-- Pilih Status Open --">
                                                <option disabled selected>-- Pilih Status Open --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_signature_human_resource_3' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_3' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_signature_human_resource_3', $timer->status_open_signature_human_resource_3 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_3', $timer->status_open_signature_human_resource_3 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenAppraismentHelp" class="form-text">Pilih Status Open</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_signature_human_resource_3') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_signature_human_resource_3') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_signature_human_resource_3" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Tanda Tangan </label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_signature_human_resource_3') ? 'is-invalid' : '' }}" id="date_time_expired_signature_human_resource_3"
                                                name="date_time_expired_signature_human_resource_3" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_3') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_3', $timer->date_time_expired_signature_human_resource_3) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisment != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisment)->addDays(1)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_signature_human_resource_3" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_apprasimentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_signature_human_resource_3') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_signature_human_resource_3') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                <!-- Status Close -->
                                <div class="mb-3 row {{ $errors->has('status_expired_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_signature_human_resource_3" class="col-sm-3 col-form-label">Status Close</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_signature_human_resource_3') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_3') }}" id="oldExpiredStatusAppraisment3" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_3', $timer->status_expired_signature_human_resource_3) }}" id="oldStatusExpiredAppraisment3" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_signature_human_resource_3') ? 'is-invalid' : '' }}" id="status_expired_signature_human_resource_3"
                                                name="status_expired_signature_human_resource_3" placeholder="--Pilih Status Close --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_signature_human_resource_3" data-val="true" aria-label="status_expired_signature_human_resource_3" data-placeholder="-- Pilih Status Close --">
                                                <option disabled selected>-- Pilih Status Close --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_signature_human_resource_3' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_3' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_signature_human_resource_3', $timer->status_expired_signature_human_resource_3 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_3', $timer->status_expired_signature_human_resource_3 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Close</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_signature_human_resource_3') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_signature_human_resource_3') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->


                                <div class="divider">
                                    <div class="divider-text">Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</div>
                                </div>


                                <!-- Timer Countdown-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_signature_human_resource_2" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Tanda Tangan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_signature_human_resource_2') ? 'is-invalid' : '' }}" id="date_time_open_signature_human_resource_2"
                                                name="date_time_open_signature_human_resource_2" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_2') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_2', $timer->date_time_open_signature_human_resource_2) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisment != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisment)->addDays(1)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_signature_human_resource_2" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_appraismentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_signature_human_resource_2') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_signature_human_resource_2') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                    <label for="status_open_signature_human_resource_2" class="col-sm-3 col-form-label">Status Open</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_2') }}" id="oldOpenStatusAppraisment2" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_2', $timer->status_open_signature_human_resource_2) }}" id="oldStatusOpenAppraisment2" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_signature_human_resource_2') ? 'is-invalid' : '' }}" id="status_open_signature_human_resource_2"
                                                name="status_open_signature_human_resource_2" placeholder="--Pilih Status Open --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_signature_human_resource_2" data-val="true" aria-label="status_open_signature_human_resource_2" data-placeholder="-- Pilih Status Open --">
                                                <option disabled selected>-- Pilih Status Open --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_signature_human_resource_2' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_2' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_signature_human_resource_2', $timer->status_open_signature_human_resource_2 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_2', $timer->status_open_signature_human_resource_2 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenAppraismentHelp" class="form-text">Pilih Status Open</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_signature_human_resource_2') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_signature_human_resource_2') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_signature_human_resource_2" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Tanda Tangan Kepala Biro Sumber Daya Manusia</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_signature_human_resource_2') ? 'is-invalid' : '' }}" id="date_time_expired_signature_human_resource_2"
                                                name="date_time_expired_signature_human_resource_2" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_2') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_2', $timer->date_time_expired_signature_human_resource_2) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisment != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisment)->addDays(1)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_signature_human_resource_2" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_apprasimentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_signature_human_resource_2') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_signature_human_resource_2') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                <!-- Status Close -->
                                <div class="mb-3 row {{ $errors->has('status_expired_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_signature_human_resource_2" class="col-sm-3 col-form-label">Status Close</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_signature_human_resource_2') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_2') }}" id="oldExpiredStatusAppraisment2" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_2', $timer->status_expired_signature_human_resource_2) }}" id="oldStatusExpiredAppraisment2" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_signature_human_resource_2') ? 'is-invalid' : '' }}" id="status_expired_signature_human_resource_2"
                                                name="status_expired_signature_human_resource_2" placeholder="--Pilih Status Close --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_signature_human_resource_2" data-val="true" aria-label="status_expired_signature_human_resource_2" data-placeholder="-- Pilih Status Close --">
                                                <option disabled selected>-- Pilih Status Close --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_signature_human_resource_2' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_2' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_signature_human_resource_2', $timer->status_expired_signature_human_resource_2 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_2', $timer->status_expired_signature_human_resource_2 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Close</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_signature_human_resource_2') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_signature_human_resource_2') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->


                                <div class="divider">
                                    <div class="divider-text">Kepala Biro Sumber Daya Manusia</div>
                                </div>

                                <!-- Timer Countdown-->
                                <div class="mb-3 row {{ $errors->has('date_time_open_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                    <label for="date_time_open_signature_human_resource_1" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Pembukaan Tanda Tangan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_open_signature_human_resource_1') ? 'is-invalid' : '' }}" id="date_time_open_signature_human_resource_1"
                                                name="date_time_open_signature_human_resource_1" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_1') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_open_signature_human_resource_1', $timer->date_time_open_signature_human_resource_1) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisment != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisment)->addDays(1)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_open_signature_human_resource_1" data-val="true">
                                        </div>
                                        <div id="date_time_open_countdown_inovation_appraismentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown -->
                                            @if ( $errors->has('date_time_open_signature_human_resource_1') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_open_signature_human_resource_1') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown-->

                                <!-- Status Open -->
                                <div class="mb-3 row {{ $errors->has('status_open_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                    <label for="status_open_signature_human_resource_1" class="col-sm-3 col-form-label">Status Open</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_open_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_1') }}" id="oldOpenStatusAppraisment1" />
                                            @else
                                            <input type="hidden" value="{{ old('status_open_signature_human_resource_1', $timer->status_open_signature_human_resource_1) }}" id="oldStatusOpenAppraisment1" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_open_signature_human_resource_1') ? 'is-invalid' : '' }}" id="status_open_signature_human_resource_1"
                                                name="status_open_signature_human_resource_1" placeholder="--Pilih Status Open --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_open_signature_human_resource_1" data-val="true" aria-label="status_open_signature_human_resource_1" data-placeholder="-- Pilih Status Open --">
                                                <option disabled selected>-- Pilih Status Open --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_open_signature_human_resource_1' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_1' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_open_signature_human_resource_1', $timer->status_open_signature_human_resource_1 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_open_signature_human_resource_1', $timer->status_open_signature_human_resource_1 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusOpenAppraismentHelp" class="form-text">Pilih Status Open</div>
                                        <!-- Error Status Open -->
                                        @if ( $errors->has('status_open_signature_human_resource_1') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_open_signature_human_resource_1') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Open -->
                                    </div>
                                </div>
                                <!--/ Status Open -->


                                <!-- Timer Countdown Expired Form -->
                                <div class="mb-3 row {{ $errors->has('date_time_expired_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                    <label for="date_time_expired_signature_human_resource_1" class="text-wrap col-sm-3 col-form-label">Tanggal dan Jam Penutupan Tanda Tangan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span id="categories" class="input-group-text">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control px-lg-1 px-2 {{ $errors->has('date_time_expired_signature_human_resource_1') ? 'is-invalid' : '' }}" id="date_time_expired_signature_human_resource_1"
                                                name="date_time_expired_signature_human_resource_1" placeholder="*Select Date Time"
                                                @if ($timer == null)
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_1') }}"
                                                @else
                                                autofocus autocomplete required value="{{ old('date_time_expired_signature_human_resource_1', $timer->date_time_expired_signature_human_resource_1) }}"
                                                @endif
                                                @if ($timers->isNotEmpty())
                                                    @if ($timers[0]->date_time_expired_appraisment != null )
                                                        min="{{ \Carbon\Carbon::parse($timers[0]->date_time_expired_appraisment)->addDays(1)->toDateTimeString() }}"
                                                    @endif
                                                @endif
                                                aria-invalid="true" aria-describedby="date_time_expired_signature_human_resource_1" data-val="true">
                                        </div>
                                        <div id="date_time_expired_countdown_inovation_apprasimentHelp" class="form-text">Pilih Hari, Bulan, Tahun, Jam, dan Menit</div>
                                        <div class="d-flex flex-column">
                                            <!-- Error Timer Countdown Expired Form -->
                                            @if ( $errors->has('date_time_expired_signature_human_resource_1') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date_time_expired_signature_human_resource_1') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Timer Countdown Expired Form -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Timer Countdown Expired Form -->

                                <!-- Status Close -->
                                <div class="mb-3 row {{ $errors->has('status_expired_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                    <label for="status_expired_signature_human_resource_1" class="col-sm-3 col-form-label">Status Close</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('status_expired_signature_human_resource_1') ? 'is-invalid' : '' }}">
                                                <i class="fa-solid fa-calendar"></i>
                                            </span>
                                            @if ($timer == null)
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_1') }}" id="oldExpiredStatusAppraisment1" />
                                            @else
                                            <input type="hidden" value="{{ old('status_expired_signature_human_resource_1', $timer->status_expired_signature_human_resource_1) }}" id="oldStatusExpiredAppraisment1" />
                                            @endif
                                            <select class="form-select {{ $errors->has('status_expired_signature_human_resource_1') ? 'is-invalid' : '' }}" id="status_expired_signature_human_resource_1"
                                                name="status_expired_signature_human_resource_1" placeholder="--Pilih Status Close --"
                                                autofocus autocomplete required
                                                aria-invalid="true" aria-describedby="status_expired_signature_human_resource_1" data-val="true" aria-label="status_expired_signature_human_resource_1" data-placeholder="-- Pilih Status Close --">
                                                <option disabled selected>-- Pilih Status Close --</option>
                                                @if ($timer == null)
                                                <option value="0" @if(old('status_expired_signature_human_resource_1' ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_1' ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @else
                                                <option value="0" @if(old('status_expired_signature_human_resource_1', $timer->status_expired_signature_human_resource_1 ) == 0 ) selected="selected" @endif>Tidak Aktif</option>
                                                <option value="1" @if(old('status_expired_signature_human_resource_1', $timer->status_expired_signature_human_resource_1 ) == 1 ) selected="selected" @endif>Aktif</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="statusClosenHelp" class="form-text">Pilih Status Close</div>
                                        <!-- Error Status Close -->
                                        @if ( $errors->has('status_expired_signature_human_resource_1') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_expired_signature_human_resource_1') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error Status Close -->
                                    </div>
                                </div>
                                <!--/ Status Close -->


                                <!-- Action Button -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <div class="justify-content-between">
                                        @if ($timers->isNotEmpty())
                                            @if ($timers[0]->date_time_open_signature_human_resource_3 != null)
                                            <button type="button" class="btn btn-danger btn-lg" style="color: black" id="deleteStatusIDSignature" data-val="{{ $timer->id }}">
                                                <i class="fa-solid fa-trash-can mx-auto me-1"></i> Delete
                                            </button>
                                            @endif
                                            <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                                <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                            </a>
                                            @if ($timers[0]->date_time_open_signature_human_resource_3 == null)
                                            <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatusNullsdm()">
                                                <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                            </button>
                                            @else
                                            <button type="reset" class="btn btn-warning btn-lg" id="resetStatusTCD" onclick="resetStatussdm();">
                                                <i class="fa-solid fa-arrow-rotate-left mx-auto me-1"></i> Reset
                                            </button>
                                            @endif
                                            <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                                @if ($timers[0]->date_time_open_signature_human_resource_3 == null)
                                                <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Save
                                                @else
                                                <i class="fa-solid fa-paper-plane mx-auto me-1"></i> Update
                                                @endif
                                            </button>
                                        @endif
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
