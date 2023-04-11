@extends('template.pegawai.template')

<!-- Header CSS -->
@section('css_header')
    <style>
    @media (min-width: 992px) {
        .mercadoCountdown1 {
            padding: 0;
            margin: 1em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
            align-content: center;
            color: #333;
            font-size: 24px;
            line-height: 100%;
            text-align: center;
            min-height: 7vh;
            max-height: 7vh;
        }

        .mercadoCountdown1 span {
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }
    }

    @media (max-width: 991.98px) {
        .mercadoCountdown1 {
            padding: 0;
            margin: 0.5em 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
            align-content: center;
            color: #333;
            font-size: 30px;
            line-height: 100%;
            text-align: center;
            /* min-height: 5vh;
            max-height: 5vh; */
        }

        .mercadoCountdown1 span {
            padding: 5px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            line-height: 100%;
            text-align: center;
        }
    }

    </style>
@stop
<!--/ Header CSS -->

<!-- Footer Js -->
@section('js_footer')
    <!-- Edit/Update -->
    <!-- Pdf/Word Preview -->
    <script type="text/javascript">
    function preview_pdf(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_pdf');
            var inputUpdate = document.getElementById('uploadFileUpdate');
            output.src = reader.result;
            inputUpdate.value = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <!--/ Pdf/Word Preview -->

    <!-- Image Preview -->
    <script type='text/javascript'>
    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            var inputUpdate = document.getElementById('uploadPhotoUpdate');
            output.src = reader.result;
            inputUpdate.value = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <!--/ Image Preview -->

    <!-- Video Preview -->
    <script type="text/javascript">
    function preview_video(event)
    {
        let source = event.target.files[0];
        let blobURL = URL.createObjectURL(source);
        document.getElementById('video_here').src = blobURL;
        document.getElementById('uploadVideoUpdate').value = blobURL;
    }
    </script>
    <!--/ Video Preview -->

    <!-- Reset Preview -->
    <!-- Reset Pdf Preview -->
    <script type="text/javascript">
    function reset_pdf() {
        var old = document.getElementById("oldFile").getAttribute("value");
        var preview = document.getElementById('output_pdf').getAttribute("src");

        if (old != preview) {
            document.getElementById('output_pdf').setAttribute("src", old);
            // console.log(oldReset);
        }
        // console.log(preview);
        // a.removeAttribute('src');
    }
    </script>
    <!--/ Reset Pdf Preview -->

    <!-- Reset Image Preview -->
    <script type="text/javascript">
    function reset_image() {
        var old = document.getElementById("oldPhoto").getAttribute("value");
        var preview = document.getElementById('output_image').getAttribute("src");

        if (old != preview) {
            document.getElementById('output_image').setAttribute("src", old);
            // console.log(oldReset);
        }
        // console.log(preview);
        // a.removeAttribute('src');
    }
    </script>
    <!--/ Reset Image Preview -->

    <!-- Reset Video Preview -->
    <script type="text/javascript">
    function reset_video() {
        var old = document.getElementById("oldVideo").getAttribute("value");
        var preview = document.getElementById('video_here').getAttribute("src");

        if (old != preview) {
            document.getElementById('video_here').setAttribute("src", old);
            // console.log(oldReset);
        }
        // console.log(preview);
        // a.removeAttribute('src');
    }
    </script>
    <!--/ Reset Video Preview -->

    <!-- Timer Countdown -->
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/sdm/role3/ext_js/jquery.countdown.min.js')}}"></script>

    <script>
        $(".mercadoCountdown1").each( function(){
            var _this = $(this);
            var _expire = _this.data('expire');
            flag2 = true;
            _this.countdown(_expire,{
                elapse:     false,
                precision:  1000,
                // defer:      '{bool} Deferred initialization mode'
            })
            .on('update.countdown', function(event) {
                if(event.offset.totalDays == 1 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Form Inovasi Ditutup dalam' + ' ' + 2 + 'Hari',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            clearInterval(timerInterval)
                        },
                    });
                }
                if(event.offset.totalDays == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Form Inovasi Ditutup Besok',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            clearInterval(timerInterval)
                        },
                    });
                }
                if(event.offset.totalHours == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Form Inovasi Ditutup dalam' + ' ' + 1 + 'Jam',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            clearInterval(timerInterval)
                        },
                    });
                }
                if(event.offset.totalMinutes == 0 && flag2) {
                    flag2 = false;
                    Swal.fire({
                        title: 'Form Inovasi Ditutup dalam' + ' ' + 1 + 'Menit',
                        icon: 'success',
                        html: 'Pop up will close in <b></b> milliseconds.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 300)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        didClose: () => {
                            clearInterval(timerInterval)
                        },
                    });
                }
                $(this).html( event.strftime('<span><b>%D</b> Hari</span> <span><b>%-H</b> Jam</span> <span><b>%M</b> Menit</span> <span><b>%S</b> Detik</span>'));
            })
            .on('finish.countdown', function(){
                Swal.fire({
                    title: 'Form Inovasi Ditutup',
                    icon: 'success',
                    html: 'Pop up will close in <b></b> milliseconds.',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                    timer: 8000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 300)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    },
                    didClose: () => {
                        window.location = "{{ url('form-inovation/list') }}";
                    },
                });
            });
        });
    </script>
    <!--/ Timer Countdown -->
@stop
<!--/ Footer Js -->

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card my-4">

                <!-- Form Inovation Update Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Update Form Pendaftaran Penghargaan Inovasi</h5>
                </div>
                <!--/ Form Inovation Update Title -->

                <!-- Form Inovation Update Details -->
                <div class="card-body py-md-4 py-4 mx-4 mx-4">

                    <div class="py-3 d-flex flex-column justify-content-start">
                        @if (
                            (
                                ($timer->status_open == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_inovation) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation) )
                            ||  ( ($timer->status_open == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_inovation) && ($timer->status_expired == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_inovation) )
                        )
                            <div class="mx-1 mx-1 mx-1">
                                <div class="titleCountDownExpiredNonActive">Harap Tunggu Pemberitahuan Waktu Penutupan Form Inovasi</div>
                            </div>
                        @else
                            <div class="mx-1 mx-1 mx-1">
                                <h3 class="text-center text-dark">Penutupan Form Inovasi</h3>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_form_inovation)->toDateTimeString()  }}"></div>
                            </div>
                        @endif
                    </div>

                    <form id="formInovationUpdate" class="mx-3 my-3" method="POST" action="{{ route('pegawai.postInovationIdUpdate.Update.Pegawai', $rewardInovation->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Upload Short Description -->
                        <div class="row my-3 {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadFileUpdate" class="col-xl-3 col-form-label">Upload Short Description</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}">
                                    <input type="hidden" name="oldFile" value="{{ old('oldFile',$rewardInovation->upload_file_short_description) }}" />
                                    <input type="hidden" name="oldFile" id="oldFile" value="{{ asset('storage/employees/documents/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_short_description) }}" />

                                    <label class="input-group-text {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}" for="uploadFile">
                                        <i class="fa-solid fa-file"></i>
                                    </label>
                                    <input type="file" class="form-control {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate')  ? 'is-invalid' : '' }}" id="uploadFile"
                                        value="{{ old('uploadFileUpdate', $rewardInovation->upload_file_short_description) }}"
                                        name="uploadFile" accept=".pdf" onchange="preview_pdf(event)">

                                    <input type="hidden" name="uploadFileUpdate" id="uploadFileUpdate"
                                        value="{{ $rewardInovation->upload_file_short_description }}"
                                        required />
                                </div>

                                <div class="d-flex flex-column">
                                    <!-- Text Small -->
                                    <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload File 3Mb (3072 Kb)</small>
                                    <!--/ Text Small -->

                                    <!-- Error Upload Short Description -->
                                    @if ( $errors->has('uploadFile') || $errors->has('uploadFileUpdate') )
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uploadFile') ?: $errors->first('uploadFileUpdate') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Short Description -->
                                </div>

                                <div class="d-flex justify-content-center py-sm-3">
                                    <iframe class="d-block rounded" width="600" height="350" id="output_pdf" src="{{ asset('storage/employees/documents/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_short_description) }}"></iframe>
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Short Description -->

                        <!-- Upload Photo -->
                        <div class="row my-3 {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadPhoto" class="col-xl-3 col-form-label">Upload Photo</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}">
                                    <input type="hidden" name="oldPhoto" value="{{ old('oldPhoto',$rewardInovation->upload_file_image_support) }}" />
                                    <input type="hidden" name="oldPhoto" id="oldPhoto" value="{{ asset('storage/employees/images/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_image_support) }}" />

                                    <label class="input-group-text {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}" for="uploadPhoto">
                                        <i class="fa-solid fa-file-image"></i>
                                    </label>
                                    <input type="file" class="form-control {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}" id="uploadPhoto"
                                        value="{{ old('uploadPhotoUpdate', $rewardInovation->upload_file_image_support) }}"
                                        name="uploadPhoto" accept=".png, .jpg, .jpeg" onchange="preview_image(event)">

                                    <input type="hidden" name="uploadPhotoUpdate" id="uploadPhotoUpdate"
                                        value="{{ $rewardInovation->upload_file_image_support }}"
                                        required />
                                </div>

                                <div class="d-flex flex-column">
                                    <!-- Text Small -->
                                    <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload Foto 5Mb (5120 Kb)</small>
                                    <!--/ Text Small -->

                                    <!-- Error Upload Photo -->
                                    @if ( $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate'))
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uploadPhoto') ?: $errors->first('uploadPhotoUpdate') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Photo -->
                                </div>

                                <div class="d-flex justify-content-center py-sm-3">
                                    <img class="d-block rounded" width="450" height="350" id="output_image" src="{{ asset('storage/employees/images/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_image_support) }}">
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Photo -->

                        <!-- Upload Video -->
                        <div class="row my-3 {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadVideo" class="col-xl-3 col-form-label">Upload Video</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                                    <input type="hidden" name="oldVideo" value="{{ old('oldVideo',$rewardInovation->upload_file_video_support) }}" />
                                    <input type="hidden" name="oldVideo" id="oldVideo" value="{{ asset('storage/employees/videos/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_video_support) }}" />

                                    <label class="input-group-text {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}" for="uploadVideo">
                                        <i class="fa-solid fa-file-video"></i>
                                    </label>
                                    <input type="file" class="form-control {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}" id="uploadVideo"
                                        name="uploadVideo" accept="video/*" onchange="preview_video(event)" />

                                    <input type="hidden" name="uploadVideoUpdate" id="uploadVideoUpdate"
                                        value="{{ $rewardInovation->upload_file_video_support }}"
                                        required />
                                </div>

                                <div class="d-flex flex-column">
                                    <!-- Text Small -->
                                    <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload File 1Gb (1024000 Kb)</small>
                                    <!--/ Text Small -->

                                    <!-- Error Upload Video -->
                                    @if ( $errors->has('uploadVideo') )
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uploadVideo') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Video -->
                                </div>

                                <div class="d-flex justify-content-center py-sm-3">
                                    <video class="d-block rounded" style="max-width: 650px; min-width: 450px; max-height: 450px; min-height: 350px" controls id="video_here" src="{{ asset('storage/employees/videos/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_video_support) }}"></video>
                                </div>

                            </div>
                        </div>
                        <!--/ Upload Video -->


                        @if ($rewardInovation->status_process == 1 && $rewardInovation->description_back != null)
                        <div class="row my-3 {{ $errors->has('uploadFile') || $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadVideo" class="col-xl-3 col-form-label">Keterangan Dikembalikan</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group">
                                    <textarea class="form-control" aria-label="With textarea"
                                    autocomplete="on" autofocus disabled name="description_back" spellcheck="true" rows="10" cols="50">{{ $rewardInovation->description_back }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endif

                        <input type="hidden" name="status_process" value="{{ $rewardInovation->status_process }}" />

                        <!-- Action Button -->
                        <div class="my-md-4 d-flex flex-row justify-content-end">
                            <div class="mx-1 mx-1 mx-1">
                                <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('form-inovation/list') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <a class="btn btn-warning btn-lg" style="color: black" href="{{ request()->fullUrl() }}" role="button">
                                    <i class="fa-solid fa-rotate mx-auto me-2"></i>Reload
                                </a>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <button type="reset" class="btn btn-warning btn-lg" onclick="reset_pdf();reset_image();reset_video();">
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
                <!--/ Form Inovation Update Details -->

            </div>

        </div>
    </div>
</div>

@endsection
