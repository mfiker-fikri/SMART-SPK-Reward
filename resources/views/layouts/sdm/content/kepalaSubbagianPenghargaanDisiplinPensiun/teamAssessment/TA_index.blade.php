@extends('template.sdm.template')


<!-- Footer Js -->
@section('js_footer')
    <!-- Datatables Team Assessment -->
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
            lengthMenu: [5, 10, 25, 50, 100, 200, 500],
            dom: 'Bfrtip',
            buttons: [
                "pageLength",
            ],
            ajax: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/list') }}",
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

        if (table) {
            setInterval( function () {
                table.ajax.reload(null, false);
            }, 10000 );
        }
    });
    </script>
    <!--/ Datatables Team Assessment -->

    <!-- Status Non Active Team Assessment -->
    <script type="text/javascript">
    $(document).on('click', '#statusActiveIdTA', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let username = $(this).attr('data-username');
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
                    url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/status_active') }}" + '/' + id,
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
    <!--/ Status Non Active Team Assessment -->

    <!-- Status Active Team Assessment -->
    <script type="text/javascript">
    $(document).on('click', '#statusNonActiveIdTA', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let username = $(this).attr('data-username');
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
                    url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/status_active') }}" + '/' + id,
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
    <!--/ Status Active Team Assessment -->

    <!-- Delete Team Assessment -->
    <script type="text/javascript">
        $(document).on('click', '#deleteTAId', function(e) {
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/delete') }}" + '/' + id,
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
    </script>
    <!--/ Delete Team Assessment -->
@endsection
<!--/ Footer Js -->

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Read Team Assesment Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Tim Penilai</h5>
                </div>
                <!--/ Form Read Team Assesment Title -->


                <div class="container-fluid">
                    <!-- Button Create Form Team Assessment -->
                    <div class="py-3 d-flex flex-row justify-content-start">
                        <div class="mx-1 mx-1 mx-1">
                            <a class="btn btn-primary btn-lg" href="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/create') }}" role="button">
                                <i class="fa-solid fa-plus mx-auto me-1"></i> Tambah Data Tim Penilai Baru
                            </a>
                        </div>
                    </div>
                    <!-- Button Create Form Team Assessment -->

                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0"  width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Panjang</th>
                                <th scope="col">Username</th>
                                <th scope="col">Status</th>
                                <th scope="col">Last Seen</th>
                                <th scope="col">Status Active Team Assessment</th>
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

@endsection
