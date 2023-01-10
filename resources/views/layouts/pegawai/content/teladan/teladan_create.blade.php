@extends('template.pegawai.template')

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
    }
    </script>
    <!--/ Reset Image Preview -->

    <!-- Reset Video Preview -->
    <script type="text/javascript">
    function reset_video()
    {
        var a = document.getElementById('video_here');
        a.setAttribute('src', "")
    }
    </script>
    <!--/ Reset Video Preview -->

@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            @if(session('message-success-form-representative'))
            <div class="card mx-4">
                <div class="d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div class="d-flex flex-md-row">
                        <p>
                            <strong><b>   {{ session('message-success-form-representative') }} </b></strong>
                        </p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @elseif(session('message-failed-form-representative'))
            <div class="card mx-4">
                <div class="d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div class="d-flex flex-md-row">
                        <p>
                            <strong><b>   {{ session('message-failed-form-representative') }}  </b></strong>
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                </div>
            </div>
            @endif

            <div class="card my-4">
                <!-- Create Form Teladan Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create Form Teladan</h5>
                </div>
                <!--/ Create Form Teladan Title -->

                <!-- Create Form Teladan Details -->
                <div class="card-body py-md-4 py-4 mx-4 mx-4">

                    <form id="formTeladanCreate" class="mx-3 my-3" method="POST" action="{{ route('pegawai.postTeladanFormCreate.Create.Pegawai') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Upload Short Description -->
                        <div class="row my-3 {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">
                            <label for="uploadFile" class="col-xl-3 col-form-label">Upload Short Description</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">

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
                                    <iframe class="d-block rounded" width="600" height="350" id="output_pdf" loading="lazy" allowfullscreen="true"></iframe>
                                    {{-- <embed class="d-block rounded" width="600" height="350" id="output_pdf"> --}}
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
                                    <video class="d-block rounded" width="650" height="350" controls id="video_here">
                                        {{-- <source id="video_here"> --}}
                                    </video>
                                </div>
                            </div>
                        </div>
                        <!--/ Upload Video -->

                        <!-- Action Button -->
                        <div class="mt-4 d-flex flex-row justify-content-end">
                            <div class="mx-1 mx-1 mx-1">
                                <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('form-representative/list') }}" role="button">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
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
                <!--/ Form Teladan Details -->

            </div>

        </div>
    </div>
</div>

@endsection
