@extends('template.teamAssessment.template')

@section('js_footer')

    <!-- Datatables Parameter -->
    <script type="text/javascript">
    $(document).ready(function () {
        // var table = $('#data-table0').removeAttr('width').DataTable({
        var table = $('#data-table0').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: "{{ url('penilai/parameters/list/data/inovasi') }}",
            // scrollY: 500,
            // scrollY: '10%',
            // scrollY: true,
            // scrollX: true,
            // scrollX: 500,
            // scrollCollapse: true,
            // autoWidth: false,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '5%', targets: 1 },
                { width: '5%', targets: 2 },
                { width: '5%', targets: 3 },
                // { width: '95%', targets: 4 },
            ],
            columns: [
                // {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                // {   data: 'category_name', name: 'category_name', orderable: false, searchable: false},
                // {   data: 'criteria_name', name: 'criteria_name', orderable: false, searchable: false},
                // {   data: 'normalization', name: 'normalization', orderable: false, searchable: true},
                // {   data: 'parameter', name: 'parameter', orderable: false, searchable: false},

                // {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '10%'},
                // {   data: 'category_name', name: 'category_name', orderable: false, searchable: false, width: '50%'},
                // {   data: 'criteria_name', name: 'criteria_name', orderable: false, searchable: false, width: '50%'},
                // {   data: 'normalization', name: 'normalization', orderable: false, searchable: true, width: '50%'},
                // {   data: 'parameter', name: 'parameter', orderable: false, searchable: false, width: '100%'},

                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '5%'},
                {   data: 'category_name', name: 'category_name', orderable: false, searchable: false, width: '5%'},
                {   data: 'criteria_name', name: 'criteria_name', orderable: false, searchable: false, width: '5%'},
                // {   data: 'normalization', name: 'normalization', orderable: false, searchable: true, width: '5%'},
                {   data: 'parameter', name: 'parameter', orderable: false, searchable: false, width: '95%'},
            ],
        });

        new $.fn.dataTable.FixedHeader( table );
        new $.fn.dataTable.FixedColumns( table );
    });
    </script>
    <!--/ Datatables Parameter -->

    <!-- Datatables Parameter -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table1').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: "{{ url('penilai/parameters/list/data/teladan') }}",
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '5%', targets: 1 },
                { width: '5%', targets: 2 },
                { width: '5%', targets: 3 },
                // { width: '95%', targets: 4 },
            ],
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '5%'},
                {   data: 'category_name', name: 'category_name', orderable: false, searchable: false, width: '5%'},
                {   data: 'criteria_name', name: 'criteria_name', orderable: false, searchable: false, width: '5%'},
                // {   data: 'normalization', name: 'normalization', orderable: false, searchable: true, width: '5%'},
                {   data: 'parameter', name: 'parameter', orderable: false, searchable: false, width: '95%'},
            ],
        });

        new $.fn.dataTable.FixedHeader( table );
        new $.fn.dataTable.FixedColumns( table );
    });
    </script>
    <!--/ Datatables Parameter -->

@stop

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Kategori Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Parameter Inovasi</h5>
                </div>
                <!--/ Form Kategori Title -->

                <div class="container-fluid my-3">

                    <!-- Table Parameter -->
                    <table class="table table-striped table-bordered dt-responsive display responsive wrap" cellspacing="0" width="100%" id="data-table0">
                    {{-- <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table0"> --}}
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Kriteria</th>
                                {{-- <th scope="col">Normalisasi</th> --}}
                                <th scope="col">Parameter</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!--/ Table Parameter -->

                </div>

            </div>

            <div class="card mx-4 my-3">

                <!-- Form Kategori Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Parameter Teladan</h5>
                </div>
                <!--/ Form Kategori Title -->

                <div class="container-fluid my-3">

                    <table class="table table-striped table-bordered dt-responsive display responsive wrap" cellspacing="0" width="100%" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Kriteria</th>
                                {{-- <th scope="col">Normalisasi</th> --}}
                                <th scope="col">Parameter</th>
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
