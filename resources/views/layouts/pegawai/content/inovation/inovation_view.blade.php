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

    textarea {
       resize: none;
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
                        title: 'Formulir Inovasi Ditutup dalam' + ' ' + 2 + 'Hari',
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
                        title: 'Formulir Inovasi Ditutup Besok',
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
                        title: 'Formulir Inovasi Ditutup dalam' + ' ' + 1 + 'Jam',
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
                        title: 'Formulir Inovasi Ditutup dalam' + ' ' + 1 + 'Menit',
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
                    title: 'Formulir Inovasi Ditutup',
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
                        window.location = "{{ url('form-innovation/list') }}";
                    },
                });
            });
        });
    </script>
    <!--/ Timer Countdown -->

    <script>
        $("textarea").each(function () {
            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("input", function () {
            this.style.height = 0;
            this.style.height = (this.scrollHeight) + "px";
        });
    </script>
@stop
<!--/ Footer Js -->

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            @if(session('message-success-form-inovation'))
            <div class="card mx-3 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
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
            <div class="card mx-3 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
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

            <div class="card mx-3">

                <!-- Formulir Inovation Update Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Lihat Formulir Pendaftaran Penghargaan Inovasi</h5>
                </div>
                <!--/ Formulir Inovation Update Title -->

                <!-- Formulir Inovation Update Details -->
                <div class="card-body py-md-4 py-4 mx-4 mx-4">

                    <div class="py-3 d-flex flex-column justify-content-start">
                        @if (
                            (
                                ($timer->status_open_form_innovation == 1 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation) )
                            ||  ( ($timer->status_open_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() >= $timer->date_time_open_form_innovation) && ($timer->status_expired_form_innovation == 0 && \Carbon\Carbon::now()->toDateTimeString() <= $timer->date_time_expired_form_innovation) )
                        )
                            <div class="mx-1 mx-1 mx-1">
                                <div class="titleCountDownExpiredNonActive">Harap Tunggu Pemberitahuan Waktu Penutupan Formulir Inovasi</div>
                            </div>
                        @else
                            <div class="mx-1 mx-1 mx-1">
                                <h3 class="text-center text-dark">Penutupan Formulir Inovasi</h3>
                            </div>
                            <div class="mx-1 mx-1 mx-1">
                                <div class="wrap-countdown mercadoCountdown1" data-expire="{{ \Carbon\Carbon::parse($timer->date_time_expired_form_innovation)->toDateTimeString()  }}"></div>
                            </div>
                        @endif
                    </div>

                    <form id="formInovationUpdate" class="mx-3 my-3" method="POST" action="{{ route('pegawai.postInovationIdUpdate.Update.Pegawai', $rewardInovation->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Upload Short Description -->
                        <div class="row my-3 {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadFileUpdate" class="col-xl-3 col-form-label">Deskripsi Singkat</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="d-flex justify-content-center py-sm-3">
                                    <iframe class="d-block rounded" width="600" height="350" id="output_pdf" src="{{ asset('storage/employees/documents/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_short_description) }}"></iframe>
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Short Description -->

                        <!-- Upload Photo -->
                        <div class="row my-3 {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadPhoto" class="col-xl-3 col-form-label">Foto</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="d-flex justify-content-center py-sm-3">
                                    <img class="d-block rounded" width="450" height="350" id="output_image" src="{{ asset('storage/employees/images/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_image_support) }}">
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Photo -->

                        <!-- Upload Video -->
                        <div class="row my-3 {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadVideo" class="col-xl-3 col-form-label">Video</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="d-flex justify-content-center py-sm-3">
                                    <video class="d-block rounded" style="max-width: 650px; min-width: 450px; max-height: 450px; min-height: 350px" controls id="video_here" src="{{ asset('storage/employees/videos/requirementsEmployeesRewardInovations/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_video_support) }}"></video>
                                </div>

                            </div>
                        </div>
                        <!--/ Upload Video -->


                        @if ($rewardInovation->status_process == 1 && $rewardInovation->description_back != null)
                        <div class="row my-3 {{ $errors->has('uploadFile') || $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                            <label for="uploadVideo" class="col-xl-3 col-form-label">Keterangan Pengembalian</label>
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
                                <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('form-innovation/list') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!--/ Action Button -->

                    </form>

                </div>
                <!--/ Formulir Inovation Update Details -->

            </div>

        </div>
    </div>
</div>

@endsection
