@extends('template.sdm.template')

<!-- Footer CSS dan Js -->
@prepend('css_header')
    <style>
        @media (min-width: 992px) {
            .photo-column {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                align-items: center;
                align-content: center;
            }
        }
        @media (max-width: 991.98px) {
            .photo-column {
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
                align-items: center;
                align-content: center;
                justify-content: center;
            }
        }
    </style>
@endprepend

@section('js_footer')
    <!-- Photo Preview -->
    <script type='text/javascript'>
    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <!--/ Photo Preview -->

    <!-- Reset Photo Preview -->
    <script type="text/javascript">
        document.getElementById("resetImage").onclick = function() {
            reset_previewImage()
        };

        function reset_previewImage()
        {
            var old = document.getElementById("oldImage").getAttribute("value");
            var preview = document.getElementById('output_image').getAttribute("src");
            if (old != preview) {
                document.getElementById('output_image').setAttribute("src", old);
            }
        }
    </script>
    <!--/ Reset Photo Preview -->


    <!-- Photo Preview -->
    <script type='text/javascript'>
    function preview_signature(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_signature');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <!--/ Photo Preview -->

    <!-- Reset Photo Preview -->
    <script type="text/javascript">
        document.getElementById("resetSignature").onclick = function() {
            reset_previewSignature()
        };

        function reset_previewSignature()
        {
            var old = document.getElementById("oldSignature").getAttribute("value");
            var preview = document.getElementById('output_signature').getAttribute("src");
            if (old != preview) {
                document.getElementById('output_signature').setAttribute("src", old);
            }
        }
    </script>
    <!--/ Reset Photo Preview -->

    <!-- Delete Photo SDM 1 -->
    <script type="text/javascript">
    $(document).on('click', '#deletePhoto1', function(e) {
        Swal.fire({
            title: 'Apakah kamu ingin menghapus foto ini?',
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
                    url: "{{ route('sdm.postProfile.postImageDelete.KepalaBiroSDM.SDM') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Delete',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                        })
                        // .then((result) => {
                        //     $('#message-update-photo-success').show();
                        // })
                        .then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                                $('#message-update-photo-success').show();
                            }
                        })
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire({
                            title: 'Gagal/Error',
                            text: thrownError,
                            icon: 'error',
                            confirmButtonText: 'Ok',
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
    <!--/ Delete Photo SDM 1 -->

    <!-- Delete Photo SDM 2 -->
    <script type="text/javascript">
        $(document).on('click', '#deletePhoto2', function(e) {
            Swal.fire({
                title: 'Apakah kamu ingin menghapus foto ini?',
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
                        url: "{{ route('sdm.postProfile.postImageDelete.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM') }}",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Delete',
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                allowOutsideClick: false,
                            })
                            // .then((result) => {
                            //     $('#message-update-photo-success').show();
                            // })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                    $('#message-update-photo-success').show();
                                }
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                title: 'Gagal/Error',
                                text: thrownError,
                                icon: 'error',
                                confirmButtonText: 'Ok',
                            });
                            $('#message-update-photo-error').show();
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
    <!--/ Delete Photo SDM 2 -->

    <!-- Delete Photo SDM 3 -->
    <script type="text/javascript">
        $(document).on('click', '#deletePhoto3', function(e) {
            Swal.fire({
                title: 'Apakah kamu ingin menghapus foto ini?',
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
                        url: "{{ route('sdm.postProfile.postImageDelete.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM') }}",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Delete',
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                allowOutsideClick: false,
                            })
                            // .then((result) => {
                            //     $('#message-update-photo-success').show();
                            // })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                    $('#message-update-photo-success').show();
                                }
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                title: 'Gagal/Error',
                                text: thrownError,
                                icon: 'error',
                                confirmButtonText: 'Ok',
                            });
                            $('#message-update-photo-error').show();
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
    <!--/ Delete Photo SDM 3 -->

    <!-- Update Change Password -->
    <script type="text/javascript">
    // $(document).on('click', '#updateChangePassword', function(e) {
    //     Swal.fire({
    //         title: 'Apakah kamu ingin meng-update password ini?',
    //         icon: 'warning',
    //         allowOutsideClick: false,
    //         allowEscapeKey: false,
    //         allowEnterKey: false,
    //         showCancelButton: true,
    //         confirmButtonText: 'Ya',
    //         cancelButtonText: 'Tidak',
    //         // showLoaderOnConfirm: true,
    //         showClass: {
    //             popup: 'animate__animated animate__fadeInDown'
    //         },
    //         hideClass: {
    //             popup: 'animate__animated animate__fadeOutUp'
    //         }
    //     })
    //     .then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 headers: {
    //                     Accept: "application/json"
    //                 },
    //                 method: 'post',
    //                 url: "{{ url('/sdm/kepala-biro-SDM/profile/change-password') }}",
    //                 data: {
    //                     _token: '{{ csrf_token() }}'
    //                 },
    //                 success: function(response) {
    //                     Swal.fire({
    //                         title: 'Update Password Sukses',
    //                         icon: 'success',
    //                         confirmButtonText: 'Ok',
    //                         allowOutsideClick: false,
    //                     }).then((result) => {
    //                         if (result.isConfirmed) {
    //                             location.reload();
    //                         }
    //                     })
    //                 },
    //                 error: function(xhr, ajaxOptions, thrownError) {
    //                     Swal.fire({
    //                         title: 'Gagal/Error',
    //                         text: thrownError,
    //                         icon: 'error',
    //                         confirmButtonText: 'Ok',
    //                     })
    //                 }
    //             });
    //         } else {
    //             Swal.fire({
    //                 title: 'Gagal ',
    //                 icon: 'error',
    //                 confirmButtonText: 'Ok',
    //             })
    //         }
    //     });
    // });
    </script>
    <!--/ Update Change Password -->

    <!-- Show Hide Password -->
    <script type="text/javascript">
        $(document).on('click', '#oldPasswordEye', function(e) {
            event.preventDefault();
            var show = document.getElementById("oldPassword").getAttribute("type");
            // console.log(show);
            if(show == "password"){
                // console.log('sukses1');
                document.getElementById("oldPassword").setAttribute("type", "text");
                document.getElementById("eyeOldPassword").removeAttribute("class", "fa-solid fa-eye-slash");
                document.getElementById("eyeOldPassword").setAttribute("class", "fa-solid fa-eye");
            } else if(show == "text"){
                // console.log('sukses2');
                document.getElementById("oldPassword").setAttribute("type", "password");
                document.getElementById("eyeOldPassword").removeAttribute("class", "fa-solid fa-eye");
                document.getElementById("eyeOldPassword").setAttribute("class", "fa-solid fa-eye-slash");
            }
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '#passwordEye', function(e) {
            event.preventDefault();
            var show = document.getElementById("password").getAttribute("type");
            // console.log(show);
            if(show == "password"){
                // console.log('sukses1');
                document.getElementById("password").setAttribute("type", "text");
                document.getElementById("eyePassword").removeAttribute("class", "fa-solid fa-eye-slash");
                document.getElementById("eyePassword").setAttribute("class", "fa-solid fa-eye");
            } else if(show == "text"){
                // console.log('sukses2');
                document.getElementById("password").setAttribute("type", "password");
                document.getElementById("eyePassword").removeAttribute("class", "fa-solid fa-eye");
                document.getElementById("eyePassword").setAttribute("class", "fa-solid fa-eye-slash");
            }
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '#passwordConfirmationEye', function(e) {
            event.preventDefault();
            var show = document.getElementById("password_confirmation").getAttribute("type");
            // console.log(show);
            if(show == "password"){
                // console.log('sukses1');
                document.getElementById("password_confirmation").setAttribute("type", "text");
                document.getElementById("eyePasswordConfirmation").removeAttribute("class", "fa-solid fa-eye-slash");
                document.getElementById("eyePasswordConfirmation").setAttribute("class", "fa-solid fa-eye");
            } else if(show == "text"){
                // console.log('sukses2');
                document.getElementById("password_confirmation").setAttribute("type", "password");
                document.getElementById("eyePasswordConfirmation").removeAttribute("class", "fa-solid fa-eye");
                document.getElementById("eyePasswordConfirmation").setAttribute("class", "fa-solid fa-eye-slash");
            }
        });
    </script>
    <!--/ Show Hide Password -->


@stop

@section('content')

<div class="container-xxl container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <!-- Tabs Profile Details -->
                    <li class="nav-item" role="presentation">
                        @if (Auth::guard('human_resources')->user()->role == 1)
                        <!-- Role 1 -->
                        <button class="nav-link {{ (request()->is('sdm/kepala-biro-SDM/profile')) ? 'active' : '' }} text-center" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="{{ (request()->is('sdm/kepala-biro-SDM/profile')) ? 'true' : 'false' }}">Detail Profile</button>
                        @elseif (Auth::guard('human_resources')->user()->role == 2)
                        <!-- Role 2 -->
                        <button class="nav-link {{ (request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile')) ? 'active' : '' }} text-center" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="{{ (request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile')) ? 'true' : 'false' }}">Detail Profile</button>
                        @elseif (Auth::guard('human_resources')->user()->role == 3)
                        <!-- Role 3 -->
                        <button class="nav-link {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile')) ? 'active' : '' }} text-center" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="{{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile')) ? 'true' : 'false' }}">Detail Profile</button>
                        @endif
                    </li>
                    <!--/ Tabs Profile Details -->

                    <!-- Tabs Change Password -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-center" id="pills-changePassword-tab" data-bs-toggle="pill" data-bs-target="#pills-changePassword" type="button" role="tab" aria-controls="pills-changePassword" aria-selected="false">Ganti Password</button>
                    </li>
                    <!--/ Tabs Change Password -->

                </ul>
                <!--/ Tabs -->

            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Tabs Profile Details -->
                @if (Auth::guard('human_resources')->user()->role == 1)
                <!-- Role 1 -->
                <div class="tab-pane fade show {{ (request()->is('sdm/kepala-biro-SDM/profile')) ? 'active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @elseif (Auth::guard('human_resources')->user()->role == 2)
                <!-- Role 2 -->
                <div class="tab-pane fade show {{ (request()->is('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile')) ? 'active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @elseif (Auth::guard('human_resources')->user()->role == 3)
                <!-- Role 3 -->
                <div class="tab-pane fade show {{ (request()->is('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile')) ? 'active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @endif

                    @if(session('message-update-profile-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-profile-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-photo-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert" id="message-update-photo-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-photo-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-profile-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-profile-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @elseif(session('message-update-photo-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-photo-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif


                    <!-- Profile Details -->
                    <div class="card my-4">

                        <!-- Form Profile Details Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Detail Profile</h5>
                        </div>
                        <!--/ Form Profile Details Title -->

                        <!-- Form Profile Details -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">

                            <div class="photo-column gap-4 mx-3">

                                <!-- Photo Profile -->
                                @if (Auth::guard('human_resources')->user()->photo_profile)
                                    @if (Auth::guard('human_resources')->user()->role == 1)
                                    <!-- Role 1 -->
                                    <img src="{{ asset( 'storage/sdm/headOfHumanResources/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                                        alt="headOfHumanResource-photo-profile-{{ Auth::guard('human_resources')->user()->username }}" class="rounded-circle"
                                        height="100" width="100" id="headOfHumanResourcePhotoProfile" />
                                    @elseif (Auth::guard('human_resources')->user()->role == 2)
                                    <!-- Role 2 -->
                                    <img src="{{ asset( 'storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                                        alt="headOfDisciplinaryAwardsAndAdministration-photo-profile-{{ Auth::guard('human_resources')->user()->username }}" class="rounded-circle"
                                        height="100" width="100" id="headOfDisciplinaryAwardsAndAdministrationPhotoProfile" />
                                    @elseif (Auth::guard('human_resources')->user()->role == 3)
                                    <!-- Role 3 -->
                                    <img src="{{ asset( 'storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}"
                                        alt="headOfRewardsDisciplineAndPensionSubdivision-photo-profile-{{ Auth::guard('human_resources')->user()->username }}" class="rounded-circle"
                                        height="100" width="100" id="headOfRewardsDisciplineAndPensionSubdivisionPhotoProfile" />
                                    @endif
                                @else
                                    <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                        alt="humanResource-photo-profile-{{ Auth::guard('human_resources')->user()->username }}" class="rounded-circle"
                                        height="100" width="100" id="humanResourcePhotoProfile" />
                                @endif
                                <!--/ Photo Profile -->


                                <div class="d-flex flex-row">

                                    <!-- Button Trigger Modal Change Photo -->
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="button" class="btn btn-primary" style="color: black" data-bs-toggle="modal" data-bs-target="#changePhoto">
                                            @if (Auth::guard('human_resources')->user()->photo_profile)
                                            <i class="fa-solid fa-image mx-auto me-2"></i>Change Photo
                                            @else
                                            <i class="fa-solid fa-image mx-auto me-2"></i>Upload Photo
                                            @endif
                                        </button>
                                    </div>
                                    <!--/ Button Trigger Modal Change Photo -->


                                    <!-- Signature -->
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="button" class="btn btn-primary" style="color: black" data-bs-toggle="modal" data-bs-target="#signaturePhoto">
                                            @if (Auth::guard('human_resources')->user()->signature)
                                            <i class="fa-solid fa-image mx-auto me-2"></i>Change Signature
                                            @else
                                            <i class="fa-solid fa-image mx-auto me-2"></i>Upload signature
                                            @endif
                                        </button>
                                    </div>
                                    <!--/ Signature -->


                                    <!-- Modal Change Photo -->
                                    <div class="modal fade" id="changePhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <!-- Form Change Photo -->
                                                @if (Auth::guard('human_resources')->user()->role == 1)
                                                <!-- Role 1 -->
                                                <form id="formPhotoUpdate" class="mb-3" method="POST" action="{{ URL::to('sdm/kepala-biro-SDM/image/upload') }}" enctype="multipart/form-data">
                                                @elseif (Auth::guard('human_resources')->user()->role == 2)
                                                <!-- Role 2 -->
                                                <form id="formPhotoUpdate" class="mb-3" method="POST" action="{{ URL::to('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/image/upload') }}" enctype="multipart/form-data">
                                                @elseif (Auth::guard('human_resources')->user()->role == 3)
                                                <!-- Role 3 -->
                                                <form id="formPhotoUpdate" class="mb-3" method="POST" action="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/image/upload') }}" enctype="multipart/form-data">
                                                @endif
                                                    @csrf
                                                    <div class="modal-header">
                                                        @if (Auth::guard('human_resources')->user()->photo_profile)
                                                        <h5 class="modal-title" id="staticBackdropLabel">Change Photo</h5>
                                                        @else
                                                        <h5 class="modal-title" id="staticBackdropLabel">Upload Photo</h5>
                                                        @endif
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-center py-sm-3">
                                                            @if (Auth::guard('human_resources')->user()->photo_profile)
                                                                @if (Auth::guard('human_resources')->user()->role == 1)
                                                                <!-- Role 1 -->
                                                                <img class="d-block rounded" height="200" width="300" id="output_image" src="{{ asset( 'storage/sdm/headOfHumanResources/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}">
                                                                @elseif (Auth::guard('human_resources')->user()->role == 2)
                                                                <!-- Role 2 -->
                                                                <img class="d-block rounded" height="200" width="300" id="output_image" src="{{ asset( 'storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}">
                                                                @elseif (Auth::guard('human_resources')->user()->role == 3)
                                                                <!-- Role 3 -->
                                                                <img class="d-block rounded" height="200" width="300" id="output_image" src="{{ asset( 'storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }}">
                                                                @endif
                                                            @else
                                                            <img class="d-block rounded" height="200" width="300" id="output_image">
                                                            @endif
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            @if (Auth::guard('human_resources')->user()->photo_profile != null)
                                                                @if (Auth::guard('human_resources')->user()->role == 1)
                                                                <!-- Role 1 -->
                                                                {{-- <input type="text" name="oldImage" value="{{ Auth::guard('human_resources')->user()->photo_profile }}" /> --}}
                                                                <input type="hidden" name="oldImage" id="oldImage" value="{{ asset( 'storage/sdm/headOfHumanResources/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }} " />
                                                                @elseif (Auth::guard('human_resources')->user()->role == 2)
                                                                <!-- Role 2 -->
                                                                {{-- <input type="text" name="oldImage" value="{{ Auth::guard('human_resources')->user()->photo_profile }}" /> --}}
                                                                <input type="hidden" name="oldImage" id="oldImage" value="{{ asset( 'storage/sdm/headOfDisciplinaryAwardsAndAdministration/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }} " />
                                                                @elseif (Auth::guard('human_resources')->user()->role == 3)
                                                                <!-- Role 3 -->
                                                                <input type="hidden" name="oldImage" id="oldImage" value="{{ asset( 'storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/photos/photoProfile/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->photo_profile) }} " />
                                                                @endif
                                                            @elseif (Auth::guard('human_resources')->user()->photo_profile == null)
                                                            {{-- <input type="text" name="oldImage" value="" /> --}}
                                                            <input type="hidden" name="oldImage" id="oldImage" value="" />
                                                            @endif
                                                            <input type="file" class="form-control {{ $errors->has('photo_profile') ? ' has-error' : '' }}" id="photo_profile"
                                                                name="photo_profile" placeholder="*Nama Lengkap"
                                                                required accept=".png, .jpg, .jpeg" onchange="preview_image(event)" />
                                                            <label class="input-group-text" for="photo_profile">Upload Photo</label>
                                                        </div>

                                                        <!-- Error Photo Profile -->
                                                        @if ( $errors->has('photo_profile') )
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('photo_profile') }}</strong>
                                                            </span>
                                                        @endif
                                                        <!--/ Error Photo Profile -->

                                                        <p class="text-muted text-md-center mb-0">Allowed JPG, JPEG or PNG. Max size of 2MB (2048 Kb)</p>

                                                    </div>

                                                    <!-- Action Button -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" style="color: black" data-bs-dismiss="modal">
                                                            <i class="fa-solid fa-xmark mx-auto me-2"></i>Close
                                                        </button>
                                                        <button type="reset" class="btn btn-warning" id="resetImage">
                                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i> Reset
                                                        </button>
                                                        <button type="submit" class="btn btn-primary" style="color: black">
                                                            @if (Auth::guard('human_resources')->user()->photo_profile)
                                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i> Change Photo
                                                            @else
                                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i> Upload Photo
                                                            @endif
                                                        </button>
                                                    </div>
                                                    <!--/ Action Button -->

                                                </form>
                                                <!--/ Form Change Photo -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Change Photo -->

                                    <!-- Modal Signature -->
                                    <div class="modal fade" id="signaturePhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <!-- Form Signature -->
                                                @if (Auth::guard('human_resources')->user()->role == 1)
                                                <!-- Role 1 -->
                                                <form id="formSignatureUpdate" class="mb-3" method="POST" action="{{ URL::to('sdm/kepala-biro-SDM/signature/upload') }}" enctype="multipart/form-data">
                                                @elseif (Auth::guard('human_resources')->user()->role == 2)
                                                <!-- Role 2 -->
                                                <form id="formSignatureUpdate" class="mb-3" method="POST" action="{{ URL::to('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/upload') }}" enctype="multipart/form-data">
                                                @elseif (Auth::guard('human_resources')->user()->role == 3)
                                                <!-- Role 3 -->
                                                <form id="formSignatureUpdate" class="mb-3" method="POST" action="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/upload') }}" enctype="multipart/form-data">
                                                @endif
                                                    @csrf
                                                    <div class="modal-header">
                                                        @if (Auth::guard('human_resources')->user()->signature)
                                                        <h5 class="modal-title" id="staticBackdropLabel">Change Signature</h5>
                                                        @else
                                                        <h5 class="modal-title" id="staticBackdropLabel">Upload Signature</h5>
                                                        @endif
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-center py-sm-3">
                                                            @if (Auth::guard('human_resources')->user()->signature)
                                                                @if (Auth::guard('human_resources')->user()->role == 1)
                                                                <!-- Role 1 -->
                                                                <img class="d-block rounded" height="200" width="300" id="output_signature" src="{{ asset( 'storage/sdm/headOfHumanResources/signature/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->signature) }}">
                                                                @elseif (Auth::guard('human_resources')->user()->role == 2)
                                                                <!-- Role 2 -->
                                                                <img class="d-block rounded" height="200" width="300" id="output_signature" src="{{ asset( 'storage/sdm/headOfDisciplinaryAwardsAndAdministration/signature/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->signature) }}">
                                                                @elseif (Auth::guard('human_resources')->user()->role == 3)
                                                                <!-- Role 3 -->
                                                                <img class="d-block rounded" height="200" width="300" id="output_signature" src="{{ asset( 'storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->signature) }}">
                                                                @endif
                                                            @else
                                                            <img class="d-block rounded" height="200" width="300" id="output_signature">
                                                            @endif
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            @if (Auth::guard('human_resources')->user()->signature != null)
                                                                @if (Auth::guard('human_resources')->user()->role == 1)
                                                                <!-- Role 1 -->
                                                                <input type="hidden" name="oldSignature" id="oldSignature" value="{{ asset( 'storage/sdm/headOfHumanResources/signature/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->signature) }} " />
                                                                @elseif (Auth::guard('human_resources')->user()->role == 2)
                                                                <!-- Role 2 -->
                                                                <input type="hidden" name="oldSignature" id="oldSignature" value="{{ asset( 'storage/sdm/headOfDisciplinaryAwardsAndAdministration/signature/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->signature) }} " />
                                                                @elseif (Auth::guard('human_resources')->user()->role == 3)
                                                                <!-- Role 3 -->
                                                                <input type="hidden" name="oldSignature" id="oldSignature" value="{{ asset( 'storage/sdm/headOfRewardsDisciplineAndPensionSubdivision/signature/'. Auth::guard('human_resources')->user()->username. '/' . Auth::guard('human_resources')->user()->signature) }} " />
                                                                @endif
                                                            @elseif (Auth::guard('human_resources')->user()->signature == null)
                                                            {{-- <input type="text" name="oldImage" value="" /> --}}
                                                            <input type="hidden" name="oldSignature" id="oldSignature" value="" />
                                                            @endif
                                                            <input type="file" class="form-control {{ $errors->has('signature') ? ' has-error' : '' }}" id="signature"
                                                                name="signature" placeholder="*Nama Lengkap"
                                                                required accept=".png, .jpg, .jpeg" onchange="preview_signature(event)" />
                                                            <label class="input-group-text" for="signature">Upload Signature</label>
                                                        </div>

                                                        <!-- Error Photo Profile -->
                                                        @if ( $errors->has('signature') )
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('signature') }}</strong>
                                                            </span>
                                                        @endif
                                                        <!--/ Error Photo Profile -->

                                                        <p class="text-muted text-md-center mb-0">Allowed JPG, JPEG or PNG. Max size of 2MB (2048 Kb)</p>

                                                    </div>

                                                    <!-- Action Button -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" style="color: black" data-bs-dismiss="modal">
                                                            <i class="fa-solid fa-xmark mx-auto me-2"></i>Close
                                                        </button>
                                                        <button type="reset" class="btn btn-warning" id="resetSignature">
                                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i> Reset
                                                        </button>
                                                        <button type="submit" class="btn btn-primary" style="color: black">
                                                            @if (Auth::guard('human_resources')->user()->signature)
                                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i> Change Signature
                                                            @else
                                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i> Upload Signature
                                                            @endif
                                                        </button>
                                                    </div>
                                                    <!--/ Action Button -->

                                                </form>
                                                <!--/ Form Signature -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Signature -->

                                    <!-- Delete Photo -->
                                    @if (Auth::guard('human_resources')->user()->photo_profile)
                                    <div class="mx-1 mx-1 mx-1">
                                            {{-- @csrf --}}
                                            @if (Auth::guard('human_resources')->user()->role == 1)
                                            <!-- Role 1 -->
                                            <button type="submit" class="btn btn-danger" style="color: black" id="deletePhoto1">
                                            @elseif (Auth::guard('human_resources')->user()->role == 2)
                                            <!-- Role 2 -->
                                            <button type="submit" class="btn btn-danger" style="color: black" id="deletePhoto2">
                                            @elseif (Auth::guard('human_resources')->user()->role == 3)
                                            <!-- Role 3 -->
                                            <button type="submit" class="btn btn-danger" style="color: black" id="deletePhoto3">
                                            @endif
                                                <i class="fa-solid fa-trash mx-auto me-2"></i>Delete Photo
                                            </button>
                                        {{-- </form> --}}
                                    </div>
                                    @endif
                                    <!--/ Delete Photo -->

                                </div>

                                {{-- <div id="my_camera"></div>

                                <br/>

                                <input type=button value="Take Snapshot" onClick="take_snapshot()">

                                <input type="text" name="image" class="image-tag"> --}}
                            </div>

                            <hr>

                            @if (Auth::guard('human_resources')->user()->role == 1)
                            <!-- Role 1 -->
                            <form id="formProfileUpdate" class="mx-3 my-3" method="POST" action="{{ URL::to('sdm/kepala-biro-SDM/profile/update') }}">
                            @elseif (Auth::guard('human_resources')->user()->role == 2)
                            <!-- Role 2 -->
                            <form id="formProfileUpdate" class="mx-3 my-3" method="POST" action="{{ URL::to('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile/update') }}">
                            @elseif (Auth::guard('human_resources')->user()->role == 3)
                            <!-- Role 3 -->
                            <form id="formProfileUpdate" class="mx-3 my-3" method="POST" action="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile/update') }}">
                            @endif
                                @csrf
                                <!-- Full Name -->
                                <div class="row my-3 {{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                                    <label for="full_name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                                            <span id="full_name" class="input-group-text">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('full_name') ? 'is-invalid' : '' }}" id="full_name"
                                                name="full_name" placeholder="*Nama Lengkap"
                                                autofocus autocomplete required value="{{ old('full_name', Auth::guard('human_resources')->user()->full_name) }}" />
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text">Nama Lengkap Harus Berisi Huruf</div>

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
                                </div>
                                <!--/ Full Name -->

                                <!-- Username -->
                                <div class="row my-3 {{ $errors->has('username') ? 'is-invalid' : '' }}">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('username') ? 'is-invalid' : '' }}">
                                            <span id="username" class="input-group-text">
                                                <i class="fa-solid fa-at"></i>
                                            </span>
                                            <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username"
                                                name="username" placeholder="*Username"
                                                autofocus autocomplete required value="{{ old('username', Auth::guard('human_resources')->user()->username) }}"/>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text">Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah</div>

                                            <!-- Error Username -->
                                            @if ( $errors->has('username') )
                                                <div class="my-3 ">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error Username -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ Username -->

                                <!-- Email -->
                                <div class="row my-3 {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                            <span id="email" class="input-group-text">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control px-lg-1 px-2 {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                                name="email" placeholder="*Email"
                                                autofocus autocomplete required value="{{ old('email', Auth::guard('human_resources')->user()->email) }}" />
                                            {{-- <span id="email" class="input-group-text">@example.com</span> --}}
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text">Email Menggunakan Simbol @ serta .com/.co.id/ dll</div>

                                            <!-- Error Email -->
                                            @if ( $errors->has('email') )
                                            <div class="my-3 ">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error Email -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ Email -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex flex-row justify-content-end">
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="reset" class="btn btn-warning btn-lg" >
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                        </button>
                                    </div>
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Update
                                        </button>
                                    </div>
                                </div>
                                <!--/ Action Button -->

                            </form>
                        </div>
                        <!--/ Form Profile Details  -->

                    </div>
                    <!--/ Profile Details -->
                </div>
                <!--/ Tabs Profile Details -->


                <!-- Tabs Change Password -->
                <div class="tab-pane fade" id="pills-changePassword" role="tabpanel" aria-labelledby="pills-changePassword-tab">

                    @if(session('message-update-password-success'))
                    <div class="card d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-password-success') }} </b></strong>
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @elseif(session('message-update-password-error'))
                    <div class="card d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="d-flex flex-md-row">
                            <p>
                                <strong><b>   {{ session('message-update-password-error') }}  </b></strong>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="card my-4">

                        <!-- Form Change Password Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Ganti Password</h5>
                        </div>
                        <!--/ Form Change Password Title -->

                        <!-- Form Change Password -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">

                            @if (Auth::guard('human_resources')->user()->role == 1)
                            <!-- Role 1 -->
                            <form id="formChangePassword" class="mx-3 my-3" method="POST" action="{{ URL::to('sdm/kepala-biro-SDM/profile/change-password') }}">
                            @elseif (Auth::guard('human_resources')->user()->role == 2)
                            <!-- Role 2 -->
                            <form id="formChangePassword" class="mx-3 my-3" method="POST" action="{{ URL::to('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile/change-password') }}">
                            @elseif (Auth::guard('human_resources')->user()->role == 3)
                            <!-- Role 3 -->
                            <form id="formChangePassword" class="mx-3 my-3" method="POST" action="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile/change-password') }}">
                            @endif
                                @csrf

                                <!-- Old Password -->
                                <div class="row my-3 {{ $errors->has('oldPassword') ? 'is-invalid' : '' }} ">
                                    <label for="oldPassword" class="text-wrap col-sm-3 col-form-label">Password Sekarang</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('oldPassword') ? 'is-invalid' : '' }}">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control px-lg-1 px-2 {{ $errors->has('oldPassword') ? 'is-invalid' : '' }}" id="oldPassword"
                                                name="oldPassword" placeholder="*Password Sekarang"
                                                autofocus autocomplete required aria-invalid="true" aria-describedby="old password" data-val="true"
                                                value=""/>
                                            <span class="input-group-text" id="oldPasswordEye" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye-slash" id="eyeOldPassword"></i>
                                            </span>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <!-- Text Small -->
                                            <small class="form-text text-muted text-break text-monospace text-sm-left">Password Sekarang Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</small>
                                            <!--/ Text Small -->

                                            <!-- Error Old Password -->
                                            @if ( $errors->has('oldPassword') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('oldPassword') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error Old Password -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Old Password -->

                                <!-- New Password -->
                                <div class="row my-3 {{ $errors->has('password') ? 'is-invalid' : '' }} ">
                                    <label for="password" class="text-wrap col-sm-3 col-form-label">Password Baru</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('password') ? 'is-invalid' : '' }} ">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control px-lg-1 px-2 {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                                name="password" placeholder="*Password Baru"
                                                autofocus autocomplete required aria-invalid="true" aria-describedby="new password" data-val="true"
                                                value=""/>
                                            <span class="input-group-text" id="passwordEye" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye-slash" id="eyePassword"></i>
                                            </span>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <!-- Text Small -->
                                            <small class="form-text text-muted text-break text-monospace text-sm-left">Password Baru Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</small>
                                            <!--/ Text Small -->

                                            <!-- Error New Password -->
                                            @if ( $errors->has('password') )
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            <!--/ Error New Password -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ Password Baru -->

                                <!-- Password Confirm -->
                                <div class="row my-3 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                                    <label for="password_confirmation" class="text-wrap col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control px-lg-1 px-2 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation"
                                                name="password_confirmation" placeholder="*Konfirmasi Password Baru"
                                                autofocus autocomplete required aria-invalid="true" aria-describedby="confirmasi new password" data-val="true"
                                                value=""/>
                                            <span class="input-group-text" id="passwordConfirmationEye" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye-slash" id="eyePasswordConfirmation"></i>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <!-- Text Small -->
                                            <small class="form-text text-muted text-break text-monospace text-sm-left">Konfirmasi Password Baru Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</small>
                                            <!--/ Text Small -->

                                            <!-- Error Password Confirm -->
                                            @if ( $errors->has('password_confirmation') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error Password Confirm -->
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Password Confirm -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex flex-row justify-content-end">
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="reset" class="btn btn-warning btn-lg">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                        </button>
                                    </div>
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="submit" class="btn btn-primary btn-lg" style="color: black" id="updateChangePassword">
                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Update
                                        </button>
                                    </div>
                                </div>
                                <!--/ Action Button -->

                            </form>

                        </div>
                        <!--/ Form Change Password -->

                    </div>

                </div>
                <!--/ Tabs Change Password -->


            </div>

        </div>
    </div>
</div>

@endsection
