@extends('template.sdm.template')

@section('js_footer')

    <!-- Datatables Parameter -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ url('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/list') }}",
            // scrollX: true,
            scrollCollapse: true,
            autoWidth: false,
            columnDefs: [
                { width: "5%", targets: 0 },
                { width: "10%", targets: 1 },
                { width: "10%", targets: 2 },
                { width: "10%", targets: 3 },
                { width: "15%", targets: 4 },
                { width: "15%", targets: 5 },
            ],
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {   data: 'category_name', name: 'category_name'},
                {   data: 'criteria_name', name: 'criteria_name'},
                // {   data: 'criterias.criteria', name: 'criterias.criteria'},
                {   data: 'normalization', name: 'normalization', orderable: false, searchable: true},
                {   data: 'parameter', name: 'parameter' , orderable: false, searchable: false},
                {   data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

        new $.fn.dataTable.FixedHeader( table );
    });
    </script>
    <!--/ Datatables Parameter -->

@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Parameter Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Parameter</h5>
                </div>
                <!--/ Form Parameter Title -->

                <div class="container-fluid">

                    <!-- Button Create Parameter -->
                    <div class="py-3 d-flex flex-row justify-content-start">
                        {{-- <div class="mx-1 mx-1 mx-1">
                            <a class="btn btn-primary btn-lg" href="{{ URL::to('hrd/manage/parameters/create') }}" role="button">
                                <i class="fa-solid fa-plus mx-auto me-1"></i> Create Parameter
                            </a>
                        </div> --}}
                    </div>
                    <!--/ Button Create Parameter -->

                    <!-- Table Parameter -->
                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Normalisasi</th>
                                <th scope="col">Parameter</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!--/ Table Parameter -->

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
