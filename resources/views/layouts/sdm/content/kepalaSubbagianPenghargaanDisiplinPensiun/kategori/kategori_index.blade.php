@extends('template.sdm.template')

@section('js_footer')

    <!-- Datatables Kategori -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'category', name: 'category'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader( table );
    });
    </script>
    <!--/ Datatables Kategori -->

    <!-- Delete Category -->
    <script type="text/javascript">
        $(document).on('click', '#deleteCategoriesId', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let category = $(this).attr('data-category');
            // console.log(id,category);
            Swal.fire({
                title: 'Apakah kamu ingin menghapus data' + ' ' + category + '?',
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
                        url: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/delete') }}" + '/' + id,
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
    <!--/ Delete Category -->

@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Kategori Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Kelola Data Kategori</h5>
                </div>
                <!--/ Form Kategori Title -->

                <div class="container-fluid">

                    <!-- Button Create Kategori -->
                    <div class="py-3 d-flex flex-row justify-content-start">
                        @if(\App\Models\Category::count() >= 2)
                        <div class="mx-1 mx-1 mx-1">
                            <a class="btn btn-primary btn-lg" href="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/create') }}" role="button">
                                <i class="fa-solid fa-plus mx-auto me-1"></i> Tambah Kategori Baru
                            </a>
                        </div>
                        @endif
                    </div>
                    <!--/ Button Create Kategori -->


                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0"  width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
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
