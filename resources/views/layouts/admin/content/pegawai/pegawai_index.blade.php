@extends('template.admin.template')

@section('js_footer')
    <!-- Datatables Pegawai -->
    <script type="text/javascript"> 
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            // ajax: "{{ url('admin/manage/admins/list') }}",
            ajax: "{{ url('admin/manage/employees/list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'full_name', name: 'full_name'},
                {data: 'username', name: 'username'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
    </script>
    <!--/ Datatables Pegawai -->

    <!-- Delete Employees -->
    <script>
        $(document).on('click', '#deleteEmployeesId', function(e) {
            // console.log(e);
            e.preventDefault();
            let id = $(this).attr('data-id');
            let username = $(this).attr('data-username');
            Swal.fire({
                title: 'Apakah kamu ingin menghapus data akun' + ' ' + username + '?',
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
                        url: "{{ url('admin/manage/employees/delete') }}" + '/' + id,
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
        // function deleteEmployeesId(id) {
        //     // let id = $(this).attr('data-id');
        //     console.log(id);
        //     Swal.fire({
        //         title: 'Apakah kamu ingin keluar?',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Ya',
        //         cancelButtonText: 'Tidak',
        //         showClass: {
        //             popup: 'animate__animated animate__fadeInDown'
        //         },
        //         hideClass: {
        //             popup: 'animate__animated animate__fadeOutUp'
        //         }
        //     }).then(function (e) => {
        //         if (e.value === true) {
        //             console.log(e);
        //             // $.ajax({
        //             //     url: "{{ url('admin/manage/employees/list') }}" + '/' + id,
        //             //     method: 'post',
        //             //     data: {
        //             //         // id: id,
        //             //         _token: '{{ csrf_token() }}'
        //             //     },
        //             //     success: function(response) {
        //             //         Swal.fire({
        //             //             title: 'Delete',
        //             //             icon: 'success',
        //             //             confirmButtonText: 'Ya',
        //             //         })
        //             //     }
        //             // });
        //         }
        //     });
        // }
        // $(document).ready(function() {
        //     $("#data-table") {
        //         $("#deleteEmployeesId").on('click', function (event) {
        //             console.log(event);
        //             event.preventDefault();
        //             const url = $(this).attr('href');
        //             Swal.fire({
        //                 title: 'Apakah kamu ingin keluar?',
        //                 icon: 'warning',
        //                 showCancelButton: true,
        //                 confirmButtonText: 'Ya',
        //                 cancelButtonText: 'Tidak',
        //                 showClass: {
        //                     popup: 'animate__animated animate__fadeInDown'
        //                 },
        //                 hideClass: {
        //                     popup: 'animate__animated animate__fadeOutUp'
        //                 }
        //             }).then((result) => {
        //                 if (result.isConfirmed) {
        //                     window.location.href = url;
        //                 }
        //             })
        //         })
        //     }
        // })
    </script>
    <!--/ Delete Employees -->
@stop

@section('content')

<!-- Modal Delete -->
<div class="modal fade" id="deleteEmployeesId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Form Delete -->
            {{-- <form id="formPhotoUpdate" class="mb-3" method="POST" action="{{ route('admin.postManageAdminsId.Delete.Admin', $row->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Admin?</h5>
                </div>

                <div class="modal-body">
                    <h5 class="text-center">Delete Admin?</h5>
                </div>

                
            </form> --}}
            <!-- Action Button -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark mx-auto me-2"></i>  Tidak
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-paper-plane mx-auto me-2"></i>    Ya
                </button>
            </div>
            <!--/ Action Button -->
            <!--/ Form Delete -->
        </div>
    </div>
</div>
<!-- Modal Delete -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">
        
        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Read Employee Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Pegawai</h5>
                </div>
                <!--/ Form Read Employee Title -->
                
                <div class="container-fluid">
                    
                    <!-- Button Create Employee -->
                    <div class="py-3 d-flex flex-row justify-content-start">
                        <div class="mx-1 mx-1 mx-1">
                            <a class="btn btn-primary btn-lg" href="{{ URL::to('admin/manage/employees/create') }}" role="button">
                                <i class="fa-solid fa-plus mx-auto me-1"></i> Tambah
                            </a>
                        </div>
                    </div>
                    <!-- Button Create Employee -->

                    {{-- <div class="card-body "> --}}

                        <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Panjang</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    {{-- </div> --}}

                </div>

                
            
            </div>
        </div>
    </div>
</div>

@stop