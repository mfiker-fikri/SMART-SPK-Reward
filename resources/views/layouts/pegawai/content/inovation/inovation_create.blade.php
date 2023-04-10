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
    <!-- Pdf/Word Preview -->
    <script type="text/javascript">
    function preview_pdf(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_pdf');
            output.src = reader.result;
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
            output.src = reader.result;
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
        // var $source = $('#video_here');
        // $source[0].src = URL.createObjectURL(this.files[0]);
        // $source.parent()[0].load();
        // URL.revokeObjectURL($source[0].src);
    }
    </script>
    <!--/ Video Preview -->

    <!-- Reset Preview -->
    <!-- Reset Pdf Preview -->
    <script type="text/javascript">
    function reset_pdf() {
        var a = document.getElementById('output_pdf');
        a.removeAttribute('src');
    }
    </script>
    <!--/ Reset Pdf Preview -->

    <!-- Reset Image Preview -->
    <script type="text/javascript">
    function reset_image() {
        var a = document.getElementById('output_image');
        a.setAttribute('src', "")
        // a.removeAttribute('src');
    }
    </script>
    <!--/ Reset Image Preview -->

    <!-- Reset Video Preview -->
    <script type="text/javascript">
    function reset_video()
    {
        var a = document.getElementById('video_here');
        a.setAttribute('src', "")
        // a.removeAttribute('src');
        // removeProp('src').hide();
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
                // console.log(event.offset.minutes == 12);
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
                    title: 'Form Inovasi Sudah Ditutup',
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
                        // window.location.reload(true);
                        window.location = "{{ url('form-inovation/list') }}";
                    },
                });
            });
        });
    </script>
    <!--/ Timer Countdown -->

@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            @if(session('message-success-form-inovation'))
            <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-success-form-inovation') }} </b></strong>
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(session('message-failed-form-inovation'))
            <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-failed-form-inovation') }}  </b></strong>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @endif

            <div class="card my-4">
                <!-- Create Form Inovation Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Form Pendaftaran Penghargaan Inovasi</h5>
                </div>
                <!--/ Create Form Inovation Title -->

                <!-- Create Form Inovation Details -->
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

                    <form id="formInovationCreate" class="mx-3 my-3" method="POST" action="{{ route('pegawai.postInovationFormCreate.Create.Pegawai') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Upload Short Description -->
                        <div class="row my-3 {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">
                            <label for="uploadFile" class="col-xl-3 col-form-label">Upload Short Description</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">
                                    {{-- <input type="text" name="oldFile" value="" /> --}}

                                    <label class="input-group-text {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}" for="uploadFile">
                                        <i class="fa-solid fa-file"></i>
                                    </label>
                                    <input type="file" class="form-control {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}" id="uploadFile"
                                        name="uploadFile" required accept=".pdf" onchange="preview_pdf(event)">
                                </div>

                                <div class="d-flex flex-column">
                                    <!-- Text Small -->
                                    <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload File 3Mb (3072 Kb)</small>
                                    <!--/ Text Small -->

                                    <!-- Error Upload Short Description -->
                                    @if ( $errors->has('uploadFile') )
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uploadFile') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Short Description -->
                                </div>

                                <div class="d-flex justify-content-center py-sm-3">
                                    <iframe class="d-block rounded" width="600" height="350" id="output_pdf"></iframe>
                                    {{-- <embed class="d-block rounded" width="600" height="350" id="output_pdf"> --}}
                                    {{-- <img class="d-block rounded" height="200" width="300" id="output_image"> --}}
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Short Description -->

                        <!-- Upload Photo -->
                        <div class="row my-3 {{ $errors->has('uploadPhoto') ? 'is-invalid' : '' }}">
                            <label for="uploadPhoto" class="col-xl-3 col-form-label">Upload Photo</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadPhoto') ? 'is-invalid' : '' }}">
                                    {{-- <input type="text" name="oldPhoto" value="" /> --}}

                                    <label class="input-group-text {{ $errors->has('uploadPhoto') ? 'is-invalid' : '' }}" for="uploadPhoto"><i class="fa-solid fa-file-image"></i></label>
                                    <input type="file" class="form-control {{ $errors->has('uploadPhoto') ? 'is-invalid' : '' }}" id="uploadPhoto"
                                        name="uploadPhoto" required accept=".png, .jpg, .jpeg" onchange="preview_image(event)">
                                </div>

                                <div class="d-flex flex-column">
                                    <!-- Text Small -->
                                    <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload Foto 5Mb (5120 Kb)</small>
                                    <!--/ Text Small -->

                                    <!-- Error Upload Photo -->
                                    @if ( $errors->has('uploadPhoto') )
                                    <div class="d-flex">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uploadPhoto') }}</strong>
                                        </span>
                                    </div>
                                    @endif
                                    <!--/ Error Upload Photo -->
                                </div>

                                <div class="d-flex justify-content-center py-sm-3">
                                    <img class="d-block rounded" width="450" height="350" id="output_image">
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Photo -->

                        <!-- Upload Video -->
                        <div class="row my-3 {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}">
                            <label for="uploadVideo" class="col-xl-3 col-form-label">Upload Video</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}">
                                    {{-- <input type="text" name="oldVideo" value="" /> --}}

                                    <label class="input-group-text {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}" for="uploadVideo"><i class="fa-solid fa-file-video"></i></label>
                                    <input type="file" class="form-control {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}" id="uploadVideo"
                                        name="uploadVideo" required accept="video/*" onchange="preview_video(event)">
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
                                    <video class="d-block rounded" style="max-width: 650px; min-width: 450px; max-height: 450px; min-height: 350px" controls id="video_here">
                                        {{-- <source id="video_here"> --}}
                                    </video>
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Video -->

                        <!-- Action Button -->
                        <div class="mt-4 d-flex flex-row justify-content-end">
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
                                    <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Send
                                </button>
                            </div>
                        </div>
                        <!--/ Action Button -->

                    </form>

                </div>
                <!--/ Form Inovation Details -->

            </div>

        </div>
    </div>
</div>

@endsection
