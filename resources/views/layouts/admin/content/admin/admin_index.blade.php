@extends('template.admin.template')

@section('js_footer')
    <!-- Datatables Admins -->
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
            // dom: 'lBfrtip',
            // pageLength: 0,
            lengthMenu: [5, 10, 20, 50, 100, 200, 500],
            dom: 'Bfrtip',
            buttons: [
                "pageLength",
                // "copy", "csv", "excel", "print",
                // "reload",
            ],
            // $.ajax({  'reset', 'reload',
            //     url: "{{url('manage/admins/list')}}",
            //     type: 'GET',
            //     dataType: 'json', // added data type
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            // });
            ajax: "{{ url('admin/manage/admins/list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'full_name', name: 'full_name'},
                {data: 'username', name: 'username'},
                {data: 'status', name: 'status'},
                {data: 'last_seen', name: 'last_seen'},
                {data: 'status_active', name: 'status_active'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader( table );

        setInterval( function () {
            table.ajax.reload(null, false);
        }, 10000 );

        // $.fn.dataTable.ext.buttons.reload = {
        //     text: 'Reload',
        //     action: function ( e, dt, node, config ) {
        //         dt.ajax.reload();
        //     }
        // };
    });
    </script>
    <!--/ Datatables Admins -->

    <!-- Status Non Active Admins -->
    <script type="text/javascript">
    $(document).on('click', '#statusActiveIdAdmin', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let username = $(this).attr('data-username');
        // console.log(id,username);
        Swal.fire({
            title: 'Apakah kamu ingin menonaktifkan data akun' + ' ' + username + '?',
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
                    url: "{{ url('admin/manage/admins/status_active') }}" + '/' + id,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Non Aktif Admin' + ' ' + username,
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                    error: function(event,xhr,options,exc){
                        if (event.status == 401) {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Your Authorized Failed!',
                                confirmButtonText: 'Ok',
                            })
                        }else if (event.status == 500) {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Something Went Wrong!',
                                confirmButtonText: 'Ok',
                            })
                        } else {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Something went wrong!',
                                confirmButtonText: 'Ok',
                            })
                        }
                    }
                });
            } else {
                Swal.fire({
                    title: 'Gagal',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })
            }
        });
    });
    </script>
    <!--/ Status Non Active Admins -->

    <!-- Status Active Admins -->
    <script type="text/javascript">
    $(document).on('click', '#statusNonActiveIdAdmin', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let username = $(this).attr('data-username');
        // console.log(id,username);
        Swal.fire({
            title: 'Apakah kamu ingin mengaktifkan data akun' + ' ' + username + '?',
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
                    url: "{{ url('admin/manage/admins/status_active') }}" + '/' + id,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Aktif Admin' + ' ' + username,
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                    error: function(event,xhr,options,exc){
                        if (event.status == 401) {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Your Authorized Failed!',
                                confirmButtonText: 'Ok',
                            })
                        }else if (event.status == 500) {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Something Went Wrong!',
                                confirmButtonText: 'Ok',
                            })
                        } else {
                            Swal.fire({
                                icon: xhr,
                                title: event.status + ' ' +event.statusText,
                                text: 'Oops! 😖 Something went wrong!',
                                confirmButtonText: 'Ok',
                            })
                        }
                    }
                });
            } else {
                Swal.fire({
                    title: 'Gagal',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })
            }
        });
    });
    </script>
    <!--/ Status Active Admins -->

    <!-- Delete Admins -->
    <script type="text/javascript">
        $(document).on('click', '#deleteAdminsId', function(e) {
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
                        url: "{{ url('admin/manage/admins/delete') }}" + '/' + id,
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
                        },
                        error: function(event,xhr,options,exc){
                            if (event.status == 401) {
                                Swal.fire({
                                    icon: xhr,
                                    title: event.status + ' ' +event.statusText,
                                    text: 'Oops! 😖 Your Authorized Failed!',
                                    confirmButtonText: 'Ok',
                                })
                            }else if (event.status == 500) {
                                Swal.fire({
                                    icon: xhr,
                                    title: event.status + ' ' +event.statusText,
                                    text: 'Oops! 😖 Something Went Wrong!',
                                    confirmButtonText: 'Ok',
                                })
                            } else {
                                Swal.fire({
                                    icon: xhr,
                                    title: event.status + ' ' +event.statusText,
                                    text: 'Oops! 😖 Something went wrong!',
                                    confirmButtonText: 'Ok',
                                })
                            }
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
        // $(document).ready(function() {
        //     $(".data-table tbody") {
                // $("#deleteAdminsId").on('click', function (event) {
                    // event.preventDefault();
                    // const url = $(this).attr('href');
                    // Swal.fire({
                    //     title: 'Apakah kamu ingin keluar?',
                    //     icon: 'warning',
                    //     showCancelButton: true,
                    //     confirmButtonText: 'Ya',
                    //     cancelButtonText: 'Tidak',
                    //     showClass: {
                    //         popup: 'animate__animated animate__fadeInDown'
                    //     },
                    //     hideClass: {
                    //         popup: 'animate__animated animate__fadeOutUp'
                    //     }
                    // }).then((result) => {
                    //     if (result.isConfirmed) {
                    //         window.location.href = url;
                    //     }
                    // })
                // })
        //     }
        // })
    </script>
    <!--/ Delete Admins -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            @if(session('message-create-success'))
            <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-create-success') }} </b></strong>
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(session('message-update-success'))
            <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-update-success') }} </b></strong>
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(session('message-delete-success'))
            <div class="card mx-4 d-flex flex-row alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-delete-success') }} </b></strong>
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(session('message-create-error'))
            <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-create-error') }}  </b></strong>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @elseif(session('message-update-error'))
            <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-update-error') }}  </b></strong>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @elseif(session('message-delete-error'))
            <div class="card mx-4 d-flex flex-row alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="d-flex flex-md-row">
                    <p>
                        <strong><b>   {{ session('message-delete-error') }}  </b></strong>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
            @endif

            <div class="card mx-4">

                <!-- Form Read Admin Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Admin</h5>
                </div>
                <!--/ Form Read Admin Title -->

                <div class="container-fluid">

                    <!-- Button Create Admin -->
                    <div class="py-3 d-flex flex-row justify-content-start">
                        <div class="mx-1 mx-1 mx-1">
                            <a class="btn btn-primary btn-lg" href="{{ URL::to('admin/manage/admins/create') }}" role="button" style="color: black">
                                <i class="fa-solid fa-plus mx-auto me-1"></i> Tambah Akun Admin Baru
                            </a>
                        </div>
                    </div>
                    <!--/ Button Create Admin -->


                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0"  width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Panjang</th>
                                <th scope="col">Username</th>
                                <th scope="col">Status</th>
                                <th scope="col">Last Seen</th>
                                <th scope="col">Status Active Admin</th>
                                <th scope="col">Action</th>
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




@stop

<!-- Modal Delete -->
{{-- <div class="modal fade" id="deleteAdminsId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Form Delete -->
            <form id="formPhotoUpdate" class="mb-3" method="POST" action="{{ route('admin.postManageAdminsId.Delete.Admin', $row->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Admin?</h5>
                </div>

                <div class="modal-body">
                    <h5 class="text-center">Delete Admin?</h5>
                </div>

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

            </form>
            <!--/ Form Delete -->
        </div>
    </div>
</div>
<!-- Modal Delete --> --}}
