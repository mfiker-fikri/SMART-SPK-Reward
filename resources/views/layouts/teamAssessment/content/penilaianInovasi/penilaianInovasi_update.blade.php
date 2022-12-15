@extends('template.teamAssessment.template')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                    <!-- Tabs Form Inovation Appraisment From Employees -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ (request()->is('penilai/appraisment/update*')) ? 'active' : '' }}" id="pills-FormInovationEmployees-tab" data-bs-toggle="pill" data-bs-target="#pills-FormInovationEmployees" type="button" role="tab" aria-controls="pills-FormInovationEmployees" aria-selected="{{ (request()->is('penilai/appraisment/update*')) ? 'true' : 'false' }}">Form Inovation Pegawai - </button>
                    </li>
                    <!--/ Tabs Form Inovation Appraisment From Employees -->

                    <!-- Tabs Form Inovation Appraisment -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-AppraismentTeamAssessment-tab" data-bs-toggle="pill" data-bs-target="#pills-AppraismentTeamAssessment" type="button" role="tab" aria-controls="pills-AppraismentTeamAssessment" aria-selected="false">Penilaian dari Tim Penilai</button>
                    </li>
                    <!--/ Tabs Form Inovation Appraisment -->

                </ul>
                <!--/ Tabs -->

            </div>

            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Tabs Form Inovation Appraisment From Employees -->
                <div class="tab-pane fade show {{ (request()->is('penilai/appraisment/update*')) ? 'active' : '' }}" id="pills-FormInovationEmployees" role="tabpanel" aria-labelledby="pills-FormInovationEmployees-tab">

                    <div class="card mx-4">

                        <!-- Form Inovation Appraisment Title -->
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Penilaian Form Pendaftaran Penghargaan Inovasi</h5>
                        </div>
                        <!--/ Form Inovation Appraisment Title -->

                        <!-- Form Inovation Appraisment Details -->
                        <div class="card-body py-md-4 py-4 mx-4 mx-4">

                            <form id="formInovationAppraisment" class="mx-3 my-3" method="POST" action="{{ route('penilai.postManageAppraismentId.Update.Penilai', $reward->id) }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Upload Short Description -->
                                <div class="row my-3 {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}">
                                    <label for="uploadFileUpdate" class="col-xl-3 col-form-label">Upload Short Description</label>
                                    <div class="col-md-9 col-xl-9">
                                        {{-- <div class="input-group {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}">
                                            <input type="hidden" name="oldFile" value="{{ old('oldFile',$reward->upload_file_short_description) }}" />
                                            <input type="hidden" name="oldFile" id="oldFile" value="{{ asset('storage/employees/documents/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_short_description) }}" />

                                            <label class="input-group-text {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate') ? 'is-invalid' : '' }}" for="uploadFile">
                                                <i class="fa-solid fa-file"></i>
                                            </label>
                                            <input type="file" class="form-control {{ $errors->has('uploadFile') || $errors->has('uploadFileUpdate')  ? 'is-invalid' : '' }}" id="uploadFile"
                                                value="{{ old('uploadFileUpdate', $reward->upload_file_short_description) }}"
                                                name="uploadFile" accept=".pdf" onchange="preview_pdf(event)" disabled>

                                            <input type="hidden" name="uploadFileUpdate" id="uploadFileUpdate"
                                                value="{{ $reward->upload_file_short_description }}"
                                                required />
                                        </div> --}}

                                        {{-- <div class="d-flex flex-column">
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
                                        </div> --}}

                                        <div class="d-flex justify-content-center py-sm-3">
                                            <iframe class="d-block rounded" width="600" height="350" id="output_pdf" src="{{ asset('storage/employees/documents/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_short_description) }}"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Upload Short Description -->

                                <!-- Upload Photo -->
                                <div class="row my-3 {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}">
                                    <label for="uploadPhoto" class="col-xl-3 col-form-label">Upload Photo</label>
                                    <div class="col-md-9 col-xl-9">
                                        {{-- <div class="input-group {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}">
                                            <input type="hidden" name="oldPhoto" value="{{ old('oldPhoto',$reward->upload_file_image_support) }}" />
                                            <input type="hidden" name="oldPhoto" id="oldPhoto" value="{{ asset('storage/employees/images/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_image_support) }}" />

                                            <label class="input-group-text {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}" for="uploadPhoto">
                                                <i class="fa-solid fa-file-image"></i>
                                            </label>
                                            <input type="file" class="form-control {{ $errors->has('uploadPhoto') || $errors->has('uploadPhotoUpdate') ? 'is-invalid' : '' }}" id="uploadPhoto"
                                                value="{{ old('uploadPhotoUpdate', $reward->upload_file_image_support) }}"
                                                name="uploadPhoto" accept=".png, .jpg, .jpeg" onchange="preview_image(event)" disabled>

                                            <input type="hidden" name="uploadPhotoUpdate" id="uploadPhotoUpdate"
                                                value="{{ $reward->upload_file_image_support }}"
                                                required />
                                        </div> --}}

                                        {{-- <div class="d-flex flex-column">
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
                                        </div> --}}

                                        <div class="d-flex justify-content-center py-sm-3">
                                            <img class="d-block rounded" width="450" height="350" id="output_image" src="{{ asset('storage/employees/images/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_image_support) }}">
                                        </div>
                                    </div>
                                </div>
                                <!--/ Upload Photo -->

                                <!-- Upload Video -->
                                <div class="row my-3 {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                                    <label for="uploadVideo" class="col-xl-3 col-form-label">Upload Video</label>
                                    <div class="col-md-9 col-xl-9">
                                        {{-- <div class="input-group {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}">
                                            <input type="hidden" name="oldVideo" value="{{ old('oldVideo',$reward->upload_file_video_support) }}" />
                                            <input type="hidden" name="oldVideo" id="oldVideo" value="{{ asset('storage/employees/videos/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_video_support) }}" />

                                            <label class="input-group-text {{ $errors->has('uploadVideo') || $errors->has('uploadVideoUpdate') ? 'is-invalid' : '' }}" for="uploadVideo">
                                                <i class="fa-solid fa-file-video"></i>
                                            </label>
                                            <input type="file" class="form-control {{ $errors->has('uploadVideo') ? 'is-invalid' : '' }}" id="uploadVideo"
                                                name="uploadVideo" accept="video/*" onchange="preview_video(event)" disabled />

                                            <input type="hidden" name="uploadVideoUpdate" id="uploadVideoUpdate"
                                                value="{{ $reward->upload_file_video_support }}"
                                                required />
                                        </div> --}}

                                        {{-- <div class="d-flex flex-column">
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
                                        </div> --}}

                                        <div class="d-flex justify-content-center py-sm-3">
                                            <video class="d-block rounded" width="650" height="350" controls id="video_here" src="{{ asset('storage/employees/videos/requirementsEmployeesRewardInovations/'. $reward->employees->username. '/' . $reward->upload_file_video_support) }}"></video>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Upload Video -->

                                <!-- Action Button -->
                                <div class="my-md-4 d-flex flex-row justify-content-end">
                                    <div class="mx-1 mx-1 mx-1">
                                        <a class="btn btn-default" href="{{ request()->fullUrl() }}" role="button">Check again!</a>
                                    </div>
                                    <div class="mx-1 mx-1 mx-1">
                                        <a class="btn btn-secondary btn-lg" style="color: black" href="{{ URL::to('/penilai/appraisment') }}" role="button">
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
                                            <i class="fa-solid fa-paper-plane mx-auto me-2"></i>Nilai
                                        </button>
                                    </div>
                                </div>
                                <!--/ Action Button -->

                            </form>

                        </div>
                        <!--/ Form Inovation Appraisment Details -->

                    </div>

                </div>
                <!--/ Tabs Form Inovation Appraisment From Employees -->

                <!-- Tabs Form Inovation Appraisment -->
                <div class="tab-pane fade" id="pills-AppraismentTeamAssessment" role="tabpanel" aria-labelledby="pills-AppraismentTeamAssessment-tab">

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



                </div>
                <!--/ Tabs Form Inovation Appraisment -->
            </div>



        </div>
    </div>
</div>

@endsection
