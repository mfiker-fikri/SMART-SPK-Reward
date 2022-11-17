@extends('template.pegawai.template')

<!-- Footer Js -->
@section('js_footer')
    <!-- Datatables Form Inovation -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            paging: false,
            ajax: "{{ url('form-inovation/list/data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'status', name: 'status'},
                // {data: 'username', name: 'username'},
                // {data: 'status', name: 'status'},
                // {data: 'last_seen', name: 'last_seen'},
                // {data: 'status_active', name: 'status_active'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader(table);
    });
    </script>
    <!--/ Datatables Form Inovation -->

    <!-- Delete Form Inovation Id -->
    <script type="text/javascript">
    $(document).on('click', '#deleteFormInovationId', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        console.log(id);
        Swal.fire({
            title: 'Apakah kamu ingin menghapus data form ini?',
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
                    url: "{{ url('form-inovation/delete') }}" + '/' + id,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Delete',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
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
    <!--/ Delete Form Inovation Id -->

@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">
        
        <div class="col-xxl">

            @if(session('message-success-form-inovation'))
            <div class="card mx-4">
                <div class="d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
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
            </div>
            @elseif(session('message-failed-form-inovation'))
            <div class="card mx-4">
                <div class="d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
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
            </div>
            @endif
                


            <div class="card mx-4">

                <!-- Form Read Inovation List Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">List Form Pendaftaran Penghargaan Inovasi</h5>
                </div>
                <!--/ Form Read Inovation List Title -->
                
                <div class="container-fluid">
                    
                    {{-- @if ($rewardInovation->status_process != 4) --}}
                    <!-- Button Create Form Inovation List -->
                    <div class="py-3 d-flex flex-row justify-content-start">
                        <div class="mx-1 mx-1 mx-1">
                            <a class="btn btn-primary btn-lg" href="{{ URL::to('form-inovation/create') }}" role="button">
                                <i class="fa-solid fa-plus mx-auto me-1"></i> Tambah Form Pendaftaran Penghargaan Inovasi
                            </a>
                        </div>
                    </div>
                    <!-- Button Create Form Inovation List -->
                    {{-- @endif --}}


                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Status Process</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

