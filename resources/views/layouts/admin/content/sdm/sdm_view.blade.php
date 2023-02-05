@extends('template.admin.template')

@section('js_footer')
    <!-- Select2 Role -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#role').select2({
            theme: 'bootstrap-5',
        });
    });
    </script>
    <!-- Select2 Role -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <!-- Card View Human Resources -->
            <div class="card mx-4">

                <!-- Form View Human Resources Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Lihat Data Pegawai</h5>
                </div>
                <!--/ Form View Human Resources Title -->

                <!-- Form View Human Resources -->
                <div class="card-body py-xl-5 py-3 px-xl-5">

                    <form id="formViewEmployee" class="mx-2" enctype="multipart/form-data">
                        @csrf
                        <!-- Full Name -->
                        <div class="mb-3 row">
                            <label for="full_name" class="text-wrap col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span id="full_name" class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" id="full_name"
                                        name="full_name" placeholder="*Nama Lengkap"
                                        autofocus autocomplete required value="{{ old('full_name', $humanResource->full_name) }}"
                                        aria-invalid="true" aria-describedby="full_name" data-val="true" readonly>
                                </div>
                                <div id="full_nameHelp" class="form-text">Kami tidak akan pernah membagikan nama lengkap Anda kepada orang lain.</div>
                            </div>
                        </div>
                        <!--/ Full Name -->

                        <!-- Username -->
                        <div class="mb-3 row">
                            <label for="username" class="text-wrap col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span id="username" class="input-group-text">
                                        <i class="fa-solid fa-at"></i>
                                    </span>
                                    <input type="text" class="form-control" id="username"
                                        name="username" placeholder="*Username"
                                        autofocus autocomplete required value="{{ old('username',$humanResource->username) }}"
                                        aria-invalid="true" aria-describedby="username" data-val="true" readonly>
                                </div>
                                <div id="usernameHelp" class="form-text">Kami tidak akan pernah membagikan username Anda kepada orang lain.</div>
                            </div>
                        </div>
                        <!--/ Username -->

                        <!-- Email -->
                        <div class="mb-3 row">
                            <label for="email" class="text-wrap col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span id="email" class="input-group-text">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email"
                                        name="email" placeholder="*Email"
                                        autofocus autocomplete required value="{{ old('email', $humanResource->email) }}"
                                        aria-invalid="true" aria-describedby="email" data-val="true" readonly>
                                </div>
                                <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan email Anda kepada orang lain.</div>
                            </div>
                        </div>
                        <!--/ Email -->

                        <!-- Role -->
                        <div class="mb-3 row">
                            <label for="role" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </span>
                                    <select class="form-select" id="role"
                                        name="role" placeholder="--Pilih Peran SDM --"
                                        autofocus autocomplete required
                                        aria-invalid="true" aria-describedby="role" data-val="true" aria-label="role" data-placeholder="-- Pilih Peran --" disabled>
                                        <option disabled selected>-- Pilih Peran SDM --</option>
                                        <option value="{{ old('role', $humanResource->role) }}" @if($humanResource->role == 1) selected="selected" @endif>Kepala Biro Sumber Daya Manusia</option>
                                        <option value="{{ old('role', $humanResource->role) }}" @if($humanResource->role == 2) selected="selected" @endif>Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha</option>
                                        <option value="{{ old('role', $humanResource->role) }}" @if($humanResource->role == 3) selected="selected" @endif>Kepala Subbagian Penghargaan, Disiplin, dan Pensiun</option>
                                    </select>
                                </div>
                                <div id="roleHelp" class="form-text">Kami tidak akan pernah membagikan Peran Anda kepada orang lain.</div>
                            </div>
                        </div>
                        <!--/ Role -->

                        <!-- Action Button -->
                        <div class="d-flex justify-content-end">
                            <div class="justify-content-between">
                                <a class="btn btn-secondary btn-lg" href="{{ URL::to('admin/manage/sdm') }}" role="button" style="color: black">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!-- Action Button -->

                    </form>

                </div>
                <!--/ Form View Human Resources -->

            </div>
            <!--/ Card View Human Resources -->
        </div>
    </div>
</div>

@stop
