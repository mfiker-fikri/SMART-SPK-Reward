@extends('template.pegawai.template')

<!-- Footer CSS dan Js -->
@prepend('css_header')
    {{-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> --}}
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


        /* .datepicker {
        background-color: #fff;
        border-radius: 0 !important;
        padding: 15px 20px !important;
        align-content: center !important;
        }

        .datepicker-dropdown {
        top: 0;
        left: calc(50% - 161px) !important;
        }

        .datepicker-dropdown.datepicker-orient-left:before {
        left: calc(50% - 6px) !important;
        }

        .datepicker-dropdown.datepicker-orient-left:after {
        left: calc(50% - 5px) !important;
        }

        .datepicker table tr td.today, span.focused {
        border-radius: 50% !important;
        background-image: linear-gradient(#FFF3E0, #FFE0B2);
        }

        .datepicker table tr td.today.range {
        background-image: linear-gradient(#eeeeee, #eeeeee) !important;
        border-radius: 0 !important;
        }

        /*Weekday title*/
        /* thead tr:nth-child(3) th {
        font-weight: bold !important;
        padding-top: 10px;
        padding-bottom: 10px;
        }

        .old, .day, .new {
        width: 40px !important;
        height: 40px !important;
        border-radius: 0px !important;
        border: 1px solid lightgrey !important;
        }

        .day.old, .day.new {
        background-color: #F5F5F5 !important;
        color: #E0E0E0 !important;
        }

        .day.old:hover, .day.new:hover {
        border-radius: 0px !important;
        }

        .old-day:hover, .day:hover, .new-day:hover, .month:hover, .year:hover, .decade:hover, .century:hover {
        border-radius: 50% !important;
        background-color: #eee;
        }

        .active {
        border-radius: 50% !important;
        background-image: linear-gradient(#90CAF9, #64B5F6) !important;
        color: #fff !important;
        }

        .range-start, .range-end {
        border-radius: 50% !important;
        background-image: linear-gradient(#4CAF50, #4CAF50) !important;
        }

        .range {
        color: #4CAF50 !important;
        }

        .prev, .next, .datepicker-switch {
        border-radius: 0 !important;
        padding: 10px 10px 10px 10px !important;
        font-size: 18px;
        opacity: 0.7;
        color: #4CAF50;
        }

        .prev:hover, .next:hover, .datepicker-switch:hover {
        background-color: inherit !important;
        opacity: 1;
        }

        @media screen and (max-width: 500px) {
        .datepicker-dropdown.datepicker-orient-right:before {
            right: calc(50% - 6px) !important;
        }

        .datepicker-dropdown.datepicker-orient-right:after {
            right: calc(50% - 5px) !important;
        } */
        /* } */
    </style>
@endprepend

@section('css_header')
    {{-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> --}}

    <!-- DatePicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" /> --}}

@stop

@section('js_header')
    <!-- DatePicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- IMask -->
    {{-- <script src="https://unpkg.com/imask"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.4.3/imask.min.js" integrity="sha512-yJ3vm1HmQtcgeMtbUYCp7PuTLyjU+ffCnVNTuE1Uccv1BmkoaJIXt1EjBVGnscjCILc62hTJJJ2rJJBTcw8RjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.4.3/imask.js" integrity="sha512-V+AKBUHBq48VlMTmp/zPr4JzARPydw7GGVoQlSAvbuMon9GLwGxn13s8sd82mCU2giZwffg4HXObQdcsUCjWOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script> --}}

    <script type="text/javascript" src="{{ asset('js/pegawai/ext_js/IMask/input-mask.js') }}" ></script>
    {{-- <script>
		function onLoad() {
            new InputMask().Initialize(document.querySelectorAll("#sample-ssnmask"),
			{
				mask: InputMaskDefaultMask.Ssn,
				placeHolder: "SSN: 999-99-9999"
			});

			new InputMask().Initialize(document.querySelectorAll("#date_birth"),
            // new InputMask().Initialize(document.getElementById('date_birth'),
			{
				mask: InputMaskDefaultMask.Date,
				placeHolder: "Date: 01/01/2015"
			});

            new InputMask().Initialize(document.querySelectorAll("#sample-phone"),
			{
				mask: InputMaskDefaultMask.Phone,
				placeHolder: "Phone: (999) 999-9999"
			});
		}
	</script> --}}
@stop


<!-- Footer Js -->
@section('js_footer')
    <!-- DatePicker -->
    <script type='text/javascript'>
    // $(function() {
    //     const elem = document.querySelector('input[id="date_birth"]');
    //     const datePicker = new DatePicker(elem, {
    //         // options here
    //         clearBtn: true,
    //     });
    // });
    //
    $(document).ready(function(){
        $('.datePickerDateBirth').datepicker({
            // format: 'mm/dd/yyyy',
            format: 'dd/mm/yyyy',
            clearBtn: true,
        });
    });
    </script>

    {{-- <script>
        function onLoad() {
            new InputMask().Initialize(document.querySelectorAll("#sample-ssnmask"),
            {
                mask: InputMaskDefaultMask.Ssn,
                placeHolder: "SSN: 999-99-9999"
            });

            new InputMask().Initialize(document.querySelectorAll("#date_birth"),
            // new InputMask().Initialize(document.getElementById('date_birth'),
            {
                mask: InputMaskDefaultMask.Date,
                placeHolder: "Date: 01/01/2015"
            });

            new InputMask().Initialize(document.querySelectorAll("#sample-phone"),
            {
                mask: InputMaskDefaultMask.Phone,
                placeHolder: "Phone: (999) 999-9999"
            });
        }
    </script> --}}

    <!-- IMask -->
    <script type='text/javascript'>
    // var dateMask = IMask(
    //     document.getElementById('date_birth'),
    //     {
    //         mask: Date,  // enable date mask

    //         // other options are optional
    //         pattern: 'd-`m-`Y',  // Pattern mask with defined blocks, default is 'd{.}`m{.}`Y'
    //         // you can provide your own blocks definitions, default blocks for date mask are:
    //         blocks: {
    //             d: {
    //             mask: IMask.MaskedRange,
    //             from: 1,
    //             to: 31,
    //             maxLength: 2,
    //             },
    //             m: {
    //             mask: IMask.MaskedRange,
    //             from: 1,
    //             to: 12,
    //             maxLength: 2,
    //             },
    //             Y: {
    //             mask: IMask.MaskedRange,
    //             from: 1900,
    //             to: 9999,
    //             }
    //         },
    //         // define date -> str convertion
    //         format: function (date) {
    //             var day = date.getDate();
    //             var month = date.getMonth() + 1;
    //             var year = date.getFullYear();

    //             if (day < 10) day = "0" + day;
    //             if (month < 10) month = "0" + month;

    //             return [year, month, day].join('-');
    //         },
    //         // define str -> date convertion
    //         parse: function (str) {
    //             var yearMonthDay = str.split('-');
    //             return new Date(yearMonthDay[0], yearMonthDay[1] - 1, yearMonthDay[2]);
    //         },

    //         // optional interval options
    //         min: new Date(2000, 0, 1),  // defaults to `1900-01-01`
    //         max: new Date(2020, 0, 1),  // defaults to `9999-01-01`

    //         autofix: true,  // defaults to `false`, see details

    //         // also Pattern options can be set
    //         lazy: false,

    //         // and other common options
    //         overwrite: true  // defaults to `false`
    //     });
    </script>

    <!-- Image Preview -->
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
    <!--/ Image Preview -->

    {{-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create( inputElement, {
            server: {
                url: 'http://127.0.0.1:8000',
                process: '/image/upload',
                // {
                    // url: './image/upload',
                    // method: 'POST',
                    // withCredentials: false,
                    // headers: {
                    //     'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    // },
                    // timeout: 7000,
                    // onload: null,
                    // onerror: null,
                    // ondata: null,
                // },
            },

        });

        // FilePond.setOptions({
        //     server: {
        //         url: 'http://localhost:8000/profile',
        //         timeout: 7000,
        //         process: {
        //             url: './image/upload',
        //             method: 'POST',
        //             withCredentials: false,
        //             headers: {},
        //             timeout: 7000,
        //             onload: null,
        //             onerror: null,
        //             ondata: null,
        //         },
        //     });
        // });
    </script> --}}

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

@push('js_footer')
    <!-- Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- IMask -->
    {{-- <script src="https://unpkg.com/imask"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.4.3/imask.min.js" integrity="sha512-yJ3vm1HmQtcgeMtbUYCp7PuTLyjU+ffCnVNTuE1Uccv1BmkoaJIXt1EjBVGnscjCILc62hTJJJ2rJJBTcw8RjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.4.3/imask.js" integrity="sha512-V+AKBUHBq48VlMTmp/zPr4JzARPydw7GGVoQlSAvbuMon9GLwGxn13s8sd82mCU2giZwffg4HXObQdcsUCjWOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create( inputElement );

        FilePond.setOptions({
            server: {
                url: '/image/upload',
                // process: {
                //     url: './image/upload',
                //     method: 'POST',
                //     withCredentials: false,
                //     headers: {},
                //     timeout: 7000,
                //     onload: null,
                //     onerror: null,
                //     ondata: null,
                // },
            });
        });
    </script> --}}

    <!-- cleave.js -->
    <script src="{{ URL::asset('assets/libs/cleave.js/cleave.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
@endpush


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <!-- Tabs Profile Details -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ (request()->is('profile')) ? 'active' : '' }}" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="{{ (request()->is('profile')) ? 'true' : 'false' }}">Detail Profile</button>
                    </li>
                    <!--/ Tabs Profile Details -->

                    <!-- Tabs Change Password -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-changePassword-tab" data-bs-toggle="pill" data-bs-target="#pills-changePassword" type="button" role="tab" aria-controls="pills-changePassword" aria-selected="false">Ganti Password</button>
                    </li>
                    <!--/ Tabs Change Password -->

                </ul>
                <!--/ Tabs -->
            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Tabs Profile Details -->
                <div class="tab-pane fade show {{ (request()->is('profile')) ? 'active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

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
                    @endif


                    <!-- Profile Details -->
                    <div class="card my-4">

                        <!-- Form Profile Details Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Detail Profile</h5>
                        </div>
                        <!--/ Form Profile Details Title -->

                        <!-- Form Profile Details  d-flex align-items-start align-items-sm-center -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">

                            <div class="photo-column gap-4 mx-3">

                                <!-- Photo Profile -->
                                @if ( Auth::guard('employees')->user()->photo_profile )
                                <img src="{{ asset( 'storage/employees/photos/photoProfile/'. Auth::guard('employees')->user()->username. '/' . Auth::guard('employees')->user()->photo_profile) }}"
                                    alt="employee-photo-profile {{ Auth::guard('employees')->user()->username }}" class="rounded-circle"
                                    height="100" width="100" id="employeePhotoProfile" />
                                @else
                                <img src="https://th.bing.com/th/id/OIP.xcp9_uPOg5pOlPQyd63c9wHaKX?pid=ImgDet&rs=1"
                                    alt="employee-photo-profile" class="rounded-circle"
                                    height="100" width="100" id="employeePhotoProfile" />
                                @endif
                                <!--/ Photo Profile -->

                                <div class="d-flex flex-row">

                                    <!-- Button Trigger Modal Change Photo -->
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="button" class="btn btn-primary" style="color: black" data-bs-toggle="modal" data-bs-target="#changePhoto">
                                            @if (Auth::guard('employees')->user()->photo_profile)
                                            <i class="fa-solid fa-image mx-auto me-2"></i>Change Photo
                                            @else
                                            <i class="fa-solid fa-image mx-auto me-2"></i>Upload Photo
                                            @endif
                                        </button>
                                    </div>
                                    <!--/ Button Trigger Modal Change Photo -->

                                    <!-- Modal Change Photo -->
                                    <div class="modal fade" id="changePhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <!-- Form Change Photo -->
                                                <form id="formPhotoUpdate" class="mb-3" method="POST" action="{{ URL::to('/image/upload') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header">
                                                        @if (Auth::guard('employees')->user()->photo_profile)
                                                        <h5 class="modal-title" id="staticBackdropLabel">Change Photo</h5>
                                                        @else
                                                        <h5 class="modal-title" id="staticBackdropLabel">Upload Photo</h5>
                                                        @endif
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-center py-sm-3">
                                                            @if (Auth::guard('employees')->user()->photo_profile)
                                                            <img class="d-block rounded" height="200" width="300" id="output_image" src="{{ asset( 'storage/employees/photos/photoProfile/'. Auth::guard('employees')->user()->username. '/' . Auth::guard('employees')->user()->photo_profile) }}">
                                                            @else
                                                            <img class="d-block rounded" height="200" width="300" id="output_image">
                                                            @endif
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="oldImage" value="{{ Auth::guard('employees')->user()->photo_profile }}" />
                                                            <input type="hidden" name="oldImage" id="oldImage" value="{{ asset( 'storage/employees/photos/photoProfile/'. Auth::guard('employees')->user()->username. '/' . Auth::guard('employees')->user()->photo_profile) }} " />
                                                            {{-- <input type="file" class="filepond" id="photo_profile"
                                                                name="photo_profile"
                                                                required accept=".png, .jpg, .jpeg" onchange="preview_image(event)"> --}}
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
                                                            @if (Auth::guard('employees')->user()->photo_profile)
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

                                    <!-- Delete Photo -->
                                    @if (Auth::guard('employees')->user()->photo_profile)
                                    <div class="mx-1 mx-1 mx-1">
                                        <form action="{{ route('pegawai.postProfile.postImageDelete.Pegawai') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="oldImage" value="{{ Auth::guard('employees')->user()->photo_profile }}" />
                                            <button type="submit" class="btn btn-danger" style="color: black">
                                                <i class="fa-solid fa-trash mx-auto me-2"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                    <!--/ Delete Photo -->


                                </div>
                            </div>

                            <hr>

                            <form id="formProfileUpdate" class="mx-3 my-3" method="POST" action="{{ URL::to('profile/update') }}">
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
                                                autofocus autocomplete required value="{{ old('full_name', Auth::guard('employees')->user()->full_name) }}" />
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
                                        <div class="input-group input-group-merge {{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                                            <span id="username" class="input-group-text">
                                                <i class="fa-solid fa-at"></i>
                                            </span>
                                            <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username"
                                                name="username" placeholder="*Username"
                                                autofocus autocomplete required value="{{ old('username', Auth::guard('employees')->user()->username) }}"/>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text">Username Boleh Menggunakan Huruf Besar, Huruf Kecil, dan Garis Bawah/Garis Tengah</div>

                                            <!-- Error Username -->
                                            @if ( $errors->has('username') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            </div>
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
                                                autofocus autocomplete required value="{{ old('email', Auth::guard('employees')->user()->email) }}" />
                                            {{-- <span id="email" class="input-group-text">@example.com</span> --}}
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text">Email Menggunakan Simbol @ serta .com/.co.id/ dll</div>

                                            <!-- Error Email -->
                                            @if ( $errors->has('email') )
                                            <div class="my-3">
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

                                <!-- Tempat, Tanggal Lahir -->
                                <div class="row my-3 {{ $errors->has('place_birth') || $errors->has('date_birth') ? 'is-invalid' : '' }}">
                                    <label for="tempat_tanggalLahir" class="col-sm-3 col-form-label">Tempat dan Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group input-group-merge {{ $errors->has('place_birth') || $errors->has('date_birth') ? 'is-invalid' : '' }}">
                                                    <span id="tempat_tanggalLahir" class="input-group-text">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                    </span>
                                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('place_birth') ? 'is-invalid' : '' }}" id="place_birth"
                                                        name="place_birth" placeholder="*Tempat Lahir" aria-label="Tempat Lahir"
                                                        autofocus autocomplete required value="{{ old('place_birth', Auth::guard('employees')->user()->place_birth) }}" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-merge {{ $errors->has('place_birth') || $errors->has('date_birth') ? 'is-invalid' : '' }}">
                                                    <span id="tempat_tanggalLahir" class="input-group-text">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                    </span>
                                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('date_birth') ? 'is-invalid' : '' }} datePickerDateBirth" id="date_birth"
                                                        name="date_birth" placeholder="*Tanggal Lahir" aria-label="Tanggal Lahir"
                                                        autofocus autocomplete required value="{{ old('date_birth', Auth::guard('employees')->user()->date_birth) }}" />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text"></div>

                                            <!-- Error Tempat, Tanggal Lahir -->
                                            @if ( $errors->has('place_birth') || $errors->has('date_birth') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('place_birth') ?: $errors->first('date_birth') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error Tempat, Tanggal Lahir -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ Tempat, Tanggal Lahir -->

                                <!-- Pendidikan Terakhir -->
                                <div class="row my-3 {{ $errors->has('pendidikan_terakhir') ? 'is-invalid' : '' }}">
                                    <label for="pendidikan_terakhir" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('pendidikan_terakhir') ? 'is-invalid' : '' }}">
                                            <span id="pendidikan_terakhir" class="input-group-text">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </span>
                                            {{-- <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('pendidikan_terakhir') ? 'is-invalid' : '' }}" id="pendidikan_terakhir"
                                                name="pendidikan_terakhir" placeholder="*Pendidikan Terakhir"
                                                autofocus autocomplete required value="{{ old('pendidikan_terakhir', Auth::guard('employees')->user()->pendidikan_terakhir) }}" /> --}}
                                            <select class="form-select" {{ $errors->has('pendidikan_terakhir') ? 'is-invalid' : '' }}" id="pendidikan_terakhir"
                                                name="pendidikan_terakhir"
                                                autofocus autocomplete required>
                                                <option selected disabled>-- Pilih Pendidikan Terakhir --</option>
                                                <option value="S1" @if(old('pendidikan_terakhir', Auth::guard('employees')->user()->pendidikan_terakhir) == 'S1' ) selected="selected" @endif>S1</option>
                                                <option value="S2" @if(old('pendidikan_terakhir', Auth::guard('employees')->user()->pendidikan_terakhir) == 'S2' ) selected="selected" @endif>S2</option>
                                            </select>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text"></div>

                                            <!-- Error Pendidikan Terakhir -->
                                            @if ( $errors->has('pendidikan_terakhir') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pendidikan_terakhir') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error Pendidikan Terakhir -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ Pendidikan Terakhir -->

                                <!-- NIP -->
                                <div class="row my-3 {{ $errors->has('nip') ? 'is-invalid' : '' }}">
                                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('nip') ? 'is-invalid' : '' }}">
                                            <span id="nip" class="input-group-text">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </span>
                                            <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('nip') ? 'is-invalid' : '' }}" id="nip"
                                                name="nip" placeholder="*NIP"
                                                autofocus autocomplete required value="{{ old('nip', Auth::guard('employees')->user()->nip) }}" />
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text"></div>

                                            <!-- Error NIP -->
                                            @if ( $errors->has('nip') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nip') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error NIP -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ NIP -->

                                <!-- Pangkat & Gol -->
                                <div class="row my-3 {{ $errors->has('pangkat') || $errors->has('golongan_ruang') ? 'is-invalid' : '' }}">
                                    <label for="pangkat_golonganRuang" class="col-sm-3 col-form-label">Pangkat dan Golongan Ruang</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group input-group-merge {{ $errors->has('pangkat') || $errors->has('golongan_ruang') ? 'is-invalid' : '' }}">
                                                    <span id="pangkat_golonganRuang" class="input-group-text">
                                                        <i class="fa-solid fa-user-tie"></i>
                                                    </span>
                                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('pangkat') ? 'is-invalid' : '' }}" id="pangkat"
                                                        name="pangkat" placeholder="*Pangkat" aria-label="First name"
                                                        autofocus autocomplete required value="{{ old('pangkat', Auth::guard('employees')->user()->pangkat) }}" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-merge {{ $errors->has('pangkat') || $errors->has('golongan_ruang') ? 'is-invalid' : '' }}">
                                                    <span id="pangkat_golonganRuang" class="input-group-text">
                                                        <i class="fa-solid fa-user-tie"></i>
                                                    </span>
                                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('golongan_ruang') ? 'is-invalid' : '' }}" id="golongan_ruang"
                                                        name="golongan_ruang" placeholder="*Golongan Ruang" aria-label="Last name"
                                                        autofocus autocomplete required value="{{ old('golongan_ruang', Auth::guard('employees')->user()->golongan_ruang) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text"></div>

                                            <!-- Error Pangkat & Gol -->
                                            @if ( $errors->has('pangkat') || $errors->has('golongan_ruang') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pangkat') ?: $errors->first('golongan_ruang') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error Pangkat & Gol -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ Pangkat & Gol -->

                                <!-- SK CPNS -->
                                <div class="row my-3 {{ $errors->has('sk_cpns') ? 'is-invalid' : '' }}">
                                    <label for="sk_cpns" class="col-sm-3 col-form-label">SK CPNS</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('sk_cpns') ? 'is-invalid' : '' }}">
                                            <span id="sk_cpns" class="input-group-text">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </span>
                                            <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('sk_cpns') ? 'is-invalid' : '' }}" id="sk_cpns"
                                                name="sk_cpns" placeholder="*SK CPNS"
                                                autofocus autocomplete required value="{{ old('sk_cpns', Auth::guard('employees')->user()->sk_cpns) }}" />
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text"></div>

                                            <!-- Error SK CPNS -->
                                            @if ( $errors->has('sk_cpns') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('sk_cpns') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error SK CPNS -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ SK CPNS -->

                                <!-- Jabatan -->
                                <div class="row my-3 {{ $errors->has('jabatan_terakhir') ? 'is-invalid' : '' }}">
                                    <label for="jabatan_terakhir" class="col-sm-3 col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('jabatan_terakhir') ? 'is-invalid' : '' }}">
                                            <span id="jabatan_terakhir" class="input-group-text">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </span>
                                            <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('jabatan_terakhir') ? 'is-invalid' : '' }}" id="jabatan_terakhir"
                                                name="jabatan_terakhir" placeholder="*Jabatan"
                                                autofocus autocomplete required value="{{ old('jabatan_terakhir', Auth::guard('employees')->user()->jabatan_terakhir) }}" />
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text"></div>

                                            <!-- Error Jabatan -->
                                            @if ( $errors->has('jabatan_terakhir') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('jabatan_terakhir') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error Jabatan -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ Jabatan -->

                                <!-- Unit Kerja -->
                                <div class="row my-3 {{ $errors->has('unit_kerja') ? 'is-invalid' : '' }}">
                                    <label for="unit_kerja" class="col-sm-3 col-form-label">Unit Kerja</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge {{ $errors->has('unit_kerja') ? 'is-invalid' : '' }}">
                                            <span id="unit_kerja" class="input-group-text">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </span>
                                            <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('unit_kerja') ? 'is-invalid' : '' }}" id="unit_kerja"
                                                name="unit_kerja" placeholder="*Unit Kerja"
                                                autofocus autocomplete required value="{{ old('unit_kerja', Auth::guard('employees')->user()->unit_kerja) }}" />
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div class="form-text"></div>

                                            <!-- Error Unit Kerja -->
                                            @if ( $errors->has('unit_kerja') )
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('unit_kerja') }}</strong>
                                                </span>
                                            </div>
                                            @endif
                                            <!--/ Error Unit Kerja -->
                                        </div>

                                    </div>
                                </div>
                                <!--/ Unit Kerja -->




                                <!-- Action Button -->
                                <div class="mt-4 d-flex flex-row justify-content-end">
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="reset" class="btn btn-warning btn-lg">
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
                            {{-- <small class="text-muted float-end">Merged input group</small> --}}
                        </div>
                        <!--/ Form Change Password Title -->

                        <!-- Form Change Password -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">

                            <form id="formChangePassword" class="mx-3 my-3" method="POST" action="{{ URL::to('profile/change-password') }}">
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
                                    <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
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
                                            <div class="my-3">
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            </div>
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
                                        <button type="reset"  class="btn btn-warning btn-lg">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                        </button>
                                    </div>
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="submit" class="btn btn-primary btn-lg"  style="color: black">
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
            <!--/ Tabs -->
        </div>
    </div>
</div>
@endsection
