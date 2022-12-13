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

@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card my-4">
                <!-- Create Form Inovation Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Form Pendaftaran Penghargaan Inovasi</h5>
                </div>
                <!--/ Create Form Inovation Title -->

                <!-- Create Form Inovation Details -->
                <div class="card-body py-md-4 py-4 mx-4 mx-4">

                    <form id="formInovationCreate" class="mx-3 my-3" method="POST" action="{{ route('pegawai.postInovationFormCreate.Create.Pegawai') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Upload Short Description -->
                        <div class="row my-3 {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">
                            <label for="uploadFile" class="col-xl-3 col-form-label">Upload Short Description</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="input-group {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">
                                    {{-- <input type="text" name="oldFile" value="" /> --}}

                                    <label class="input-group-text {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}" for="uploadFile"><i class="fa-solid fa-file"></i></label>
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
                                <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('form-inovation/list') }}" role="button">
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
                <!--/ Form Inovation Details -->

            </div>

        </div>
    </div>
</div>

@endsection
