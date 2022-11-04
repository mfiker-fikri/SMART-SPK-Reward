@extends('template.pegawai.template')

<!-- Footer Js -->
@section('js_footer')
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


    <!-- Reset Video Preview -->
    <script type="text/javascript">
    function reset_video() 
    {
        $('#video_here').removeProp('src').hide();
    }
    </script>
    <!--/ Video Preview -->


    <!-- Modal Edit -->
    <!-- Pdf/Word Preview -->
    <script type="text/javascript">
    function preview_pdfEdit(event) 
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_pdfEdit');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <!--/ Pdf/Word Preview -->

    <!-- Image Preview -->
    <script type='text/javascript'>
    function preview_imageEdit(event) 
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_imageEdit');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <!--/ Image Preview -->

    <!-- Video Preview -->
    <script type="text/javascript">
    function preview_videoEdit(event) 
    {
        let source = event.target.files[0];
        let blobURL = URL.createObjectURL(source);
        document.getElementById('video_hereEdit').src = blobURL;
    }
    </script>
    <!--/ Video Preview -->

    <!-- Reset Edit -->
    <script type="text/javascript">
    function form_resetEdit() 
    {
        var a = document.getElementById('video_hereEdit');
        a.src = "";
        console.log('Success');
    }
    </script>
    <!--/ Reset Edit -->

@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">
        
        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <!-- Tabs Form Inovation -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ (request()->is('form-inovation')) ? 'active' : '' }}" id="pills-form-inovation-tab" data-bs-toggle="pill" data-bs-target="#pills-form-inovation" type="button" role="tab" aria-controls="pills-form-inovation" aria-selected="{{ (request()->is('form-inovation')) ? 'true' : 'false' }}">Form Inovation</button>
                    </li>
                    <!--/ Tabs Form Inovation -->

                    <!-- Tabs Change Password -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-form-inovation-waiting-tab" data-bs-toggle="pill" data-bs-target="#pills-form-inovation-waiting" type="button" role="tab" aria-controls="pills-form-inovation-waiting" aria-selected="false">Form Inovation Waiting</button>
                    </li>
                    <!--/ Tabs Change Password -->

                </ul>
                <!--/ Tabs -->
            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Tabs Form Inovation -->
                <div class="tab-pane fade show {{ (request()->is('form-inovation')) ? 'active' : '' }}" id="pills-form-inovation" role="tabpanel" aria-labelledby="pills-form-inovation-tab">
                
                    @if($rewardInovation == null)
                    <div class="card my-4">
                        <!-- Form Inovation Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Form Inovation</h5>
                        </div>
                        <!--/ Form Inovation Title -->

                        <!-- Form Inovation Details -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">
                            
                            <form id="formInovation" class="mx-3 my-3" method="POST" action="{{ route('pegawai.postInovationFormCreate.Create.Pegawai') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Upload Short Description -->
                                <div class="row my-3 {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">
                                    <label for="uploadFile" class="col-xl-3 col-form-label">Upload Short Description</label>
                                    <div class="col-md-9 col-xl-9">
                                        <div class="input-group {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">
                                            <input type="text" name="oldFile" value="{{ $rewardInovation->upload_file_short_description }}" />

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
                                            <embed class="d-block rounded" width="600" height="300" id="output_pdf">
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
                                            <input type="text" name="oldPhoto" value="{{ $rewardInovation->upload_file_image_support }}" />

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
                                            <img class="d-block rounded" height="200" width="300" id="output_image">
                                        </div>
                                    </div>
                                </div>
                                <!--/ Upload Photo -->
            
                                <!-- Upload Video -->
                                <div class="row my-3 {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}">
                                    <label for="uploadVideo" class="col-xl-3 col-form-label">Upload Video</label>
                                    <div class="col-md-9 col-xl-9">
                                        <div class="input-group {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}">
                                            <input type="text" name="oldVideo" value="{{ $rewardInovation->upload_file_video_support }}" />

                                            <label class="input-group-text {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}" for="uploadVideo"><i class="fa-solid fa-file-video"></i></label>
                                            <input type="file" class="form-control {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}" id="uploadVideo"
                                                name="uploadVideo" required accept="video/*" onchange="preview_video(event)">
                                        </div>

                                        <div class="d-flex flex-column">
                                            <!-- Text Small -->
                                            <small class="form-text text-muted text-break text-monospace text-sm-left">Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</small>
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
                                            <video class="d-block rounded" height="450" width="400" controls id="video_here">
                                                {{-- <source id="video_here"> --}}
                                            </video>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Upload Video -->

                                <!-- Action Button -->
                                <div class="mt-4 d-flex flex-row justify-content-end">
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="reset" class="btn btn-warning btn-lg" onclick="reset_video()">
                                            <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                        </button>
                                    </div>
                                    <div class="mx-1 mx-1 mx-1">
                                        <button type="submit" class="btn btn-primary btn-lg"  style="color: black">
                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Upload
                                        </button>
                                    </div>
                                </div>
                                <!--/ Action Button -->

                            </form>

                        </div>
                        <!--/ Form Inovation Details -->

                    </div>
                    @endif
                
                </div>

                <!-- Tabs Form Inovation Waiting -->
                <div class="tab-pane fade" id="pills-form-inovation-waiting" role="tabpanel" aria-labelledby="pills-form-inovation-waiting-tab">
                
                    <div class="card my-4">
                        <!-- Form Inovation Waiting Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Form Inovation Waiting</h5>
                        </div>
                        <!--/ Form Inovation Waiting Title -->

                        <!-- Form Inovation Waiting Details -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">
                            <!-- Upload Short Description -->
                            <div class="row my-3 {{ $errors->has('uploadFile') ? 'is-invalid' : '' }}">
                                <label for="uploadFile" class="col-xl-3 col-form-label">Upload Short Description</label>
                                <div class="col-md-9 col-xl-9">
                                    <div class="d-flex justify-content-center py-sm-3">
                                        <iframe class="d-block rounded" width="600" height="350" src="{{ asset( 'storage/requirementsEmployeesRewardInovations/employees/documents/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_short_description) }}"></iframe>
                                    </div>
                                </div>
                            </div>
                            <!--/ Upload Short Description -->

                            <!-- Upload Photo -->
                            <div class="row my-3 {{ $errors->has('uploadPhoto') ? 'is-invalid' : '' }}">
                                <label for="uploadPhoto" class="col-xl-3 col-form-label">Upload Photo</label>
                                <div class="col-md-9 col-xl-9">
                                    <div class="d-flex justify-content-center py-sm-3">
                                        <img class="d-block rounded" width="450" height="350" src="{{ asset( 'storage/requirementsEmployeesRewardInovations/employees/photos/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_image_support) }}">
                                    </div>
                                </div>
                            </div>
                            <!--/ Upload Photo -->

                            <!-- Upload Video -->
                            <div class="row my-3 {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}">
                                <label for="uploadVideo" class="col-xl-3 col-form-label">Upload Video</label>
                                <div class="col-md-9 col-xl-9">
                                    <div class="d-flex justify-content-center py-sm-3">
                                        <video class="d-block rounded" width="650" height="350" controls src="{{ asset( 'storage/requirementsEmployeesRewardInovations/employees/videos/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_video_support) }}"></video>
                                    </div>
                                </div>
                            </div>
                            <!--/ Upload Video -->
                        </div>
                        <!--/ Form Inovation Waiting Details -->

                        <!-- Action Button -->
                        <div class="my-md-4 d-flex flex-row justify-content-end">
                            <div class="mx-5 mx-1 mx-1">
                                <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fa-solid fa-pencil mx-auto mx-auto me-2"></i>Edit
                                </button>
                            </div>
                            {{-- <div class="mx-1 mx-1 mx-1">
                                <button type="submit" class="btn btn-primary btn-lg"  style="color: black">
                                    <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Upload
                                </button>
                            </div> --}}
                        </div>
                        <!--/ Action Button -->

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form id="formInovationEdit" class="mx-3 my-3" method="POST" action="{{ route('pegawai.postInovationFormCreate.Create.Pegawai') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Form Inovation</h5>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <!-- Upload Short Description -->
                                            <div class="row my-3 {{ $errors->has('uploadFileEdit') ? 'is-invalid' : '' }}">
                                                <label for="uploadFileEdit" class="col-xl-3 col-form-label">Upload Short Description</label>
                                                <div class="col-md-9 col-xl-9">
                                                    <div class="input-group {{ $errors->has('uploadFileEdit') ? 'is-invalid' : '' }}">
                                                        <input type="text" name="oldFile" value="{{ $rewardInovation->upload_file_short_description }}" />

                                                        <label class="input-group-text {{ $errors->has('uploadFileEdit') ? 'is-invalid' : '' }}" for="uploadFileEdit">
                                                            <i class="fa-solid fa-file"></i>
                                                        </label>
                                                        <input type="file" class="form-control {{ $errors->has('uploadFileEdit') ? 'is-invalid' : '' }}" id="uploadFileEdit"
                                                            name="uploadFileEdit" required accept=".pdf" onchange="preview_pdfEdit(event)">
                                                    </div>
                        
                                                    <div class="d-flex flex-column">
                                                        <!-- Text Small -->
                                                        <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload File 3Mb (3072 Kb)</small>
                                                        <!--/ Text Small -->
                        
                                                        <!-- Error Upload Short Description -->
                                                        @if ( $errors->has('uploadFileEdit') )
                                                        <div class="d-flex">
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('uploadFileEdit') }}</strong>
                                                            </span>
                                                        </div>
                                                        @endif
                                                        <!--/ Error Upload Short Description -->
                                                    </div>

                                                    <div class="d-flex justify-content-center py-sm-3">
                                                        <embed class="d-block rounded" width="600" height="300" id="output_pdfEdit">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Upload Short Description -->
                        
                                            <!-- Upload Photo -->
                                            <div class="row my-3 {{ $errors->has('uploadPhotoEdit') ? 'is-invalid' : '' }}">
                                                <label for="uploadPhotoEdit" class="col-xl-3 col-form-label">Upload Photo</label>
                                                <div class="col-md-9 col-xl-9">
                                                    <div class="input-group {{ $errors->has('uploadPhotoEdit') ? 'is-invalid' : '' }}">
                                                        <input type="text" name="oldPhoto" value="{{ $rewardInovation->upload_file_image_support }}" />

                                                        <label class="input-group-text {{ $errors->has('uploadPhotoEdit') ? 'is-invalid' : '' }}" for="uploadPhotoEdit">
                                                            <i class="fa-solid fa-file-image"></i>
                                                        </label>
                                                        <input type="file" class="form-control {{ $errors->has('uploadPhotoEdit') ? 'is-invalid' : '' }}" id="uploadPhotoEdit"
                                                            name="uploadPhotoEdit" required accept=".png, .jpg, .jpeg" onchange="preview_imageEdit(event)">
                                                    </div>

                                                    <div class="d-flex flex-column">
                                                        <!-- Text Small -->
                                                        <small class="form-text text-muted text-break text-monospace text-sm-left">Maksimal Upload Foto 5Mb (5120 Kb)</small>
                                                        <!--/ Text Small -->
                        
                                                        <!-- Error Upload Photo -->
                                                        @if ( $errors->has('uploadPhotoEdit') )
                                                        <div class="d-flex">
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('uploadPhotoEdit') }}</strong>
                                                            </span>
                                                        </div>
                                                        @endif
                                                        <!--/ Error Upload Photo -->
                                                    </div>

                                                    <div class="d-flex justify-content-center py-sm-3">
                                                        <img class="d-block rounded" height="200" width="300" id="output_imageEdit">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Upload Photo -->
                        
                                            <!-- Upload Video -->
                                            <div class="row my-3 {{ $errors->has('uploadVideoEdit') ? 'is-invalid' : '' }}">
                                                <label for="uploadVideoEdit" class="col-xl-3 col-form-label">Upload Video</label>
                                                <div class="col-md-9 col-xl-9">
                                                    <div class="input-group {{ $errors->has('uploadVideoEdit') ? 'is-invalid' : '' }}">
                                                        <input type="text" name="oldVideo" value="{{ $rewardInovation->upload_file_video_support }}" />

                                                        <label class="input-group-text {{ $errors->has('uploadVideoEdit') ? 'is-invalid' : '' }}" for="uploadVideoEdit">
                                                            <i class="fa-solid fa-file-video"></i>
                                                        </label>
                                                        <input type="file" class="form-control {{ $errors->has('uploadVideoEdit') ? 'is-invalid' : '' }}" id="uploadVideoEdit"
                                                            name="uploadVideoEdit" required accept="video/*" onchange="preview_videoEdit(event)">
                                                    </div>

                                                    <div class="d-flex flex-column">
                                                        <!-- Text Small -->
                                                        <small class="form-text text-muted text-break text-monospace text-sm-left">Password Berisi Kombinasi Yang Terdiri Dari 1 Huruf Besar, 1 Huruf Kecil, 1 Numerik</small>
                                                        <!--/ Text Small -->

                                                        <!-- Error Upload Video -->
                                                        @if ( $errors->has('uploadVideoEdit') )
                                                        <div class="d-flex">
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('uploadVideoEdit') }}</strong>
                                                            </span>
                                                        </div>
                                                        @endif
                                                        <!--/ Error Upload Video -->
                                                    </div>

                                                    <div class="d-flex justify-content-center py-sm-3">
                                                        <video class="d-block rounded" height="450" width="400" controls id="video_hereEdit" src="{{ asset( 'storage/requirementsEmployeesRewardInovations/employees/videos/'. Auth::guard('employees')->user()->username. '/' . $rewardInovation->upload_file_video_support) }}">
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Upload Video -->
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-lg" style="color: black" data-bs-dismiss="modal">
                                                <i class="fa-solid fa-xmark mx-auto me-2"></i>Close
                                            </button>
                                            <button type="reset" class="btn btn-warning btn-lg" onclick="form_resetEdit()">
                                                <i class="fa-solid fa-arrow-rotate-left mx-auto me-2"></i>Reset
                                            </button>
                                            <button type="submit" class="btn btn-primary btn-lg" style="color: black">
                                                <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Upload
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            
        </div>
    </div>
</div>

@endsection