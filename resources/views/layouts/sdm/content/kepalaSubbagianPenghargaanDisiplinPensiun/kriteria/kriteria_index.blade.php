@extends('template.sdm.template')

@section('js_footer')

    <!-- Datatables Kriteria -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/list') }}",
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {   data: 'categories.category', name: 'categories.category'},
                {   data: 'criteria', name: 'criteria'},
                {   data: 'normalization', name: 'normalization'},
                {   data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader( table );
    });
    </script>
    <!--/ Datatables Kriteria -->

@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Kriteria Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Kriteria</h5>
                </div>
                <!--/ Form Kriteria Title -->

                <div class="container-fluid">

                    <!-- Button Create Kriteria -->
                    <div class="py-3 d-flex flex-row justify-content-start">
                        <div class="mx-1 mx-1 mx-1">
                            <a class="btn btn-primary btn-lg" href="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/create') }}" role="button">
                                <i class="fa-solid fa-plus mx-auto me-1"></i> Tambah Kriteria
                            </a>
                        </div>
                    </div>
                    <!--/ Button Create Kriteria -->


                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Normalisasi</th>
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
