@extends('template.teamAssessment.template')

@section('js_footer')

    <!-- Datatables Kriteria -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table0').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: "{{ url('penilai/criterias/list/data/inovasi') }}",
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {   data: 'category_name', name: 'category_name', orderable: false, searchable: false},
                {   data: 'criteria', name: 'criteria', orderable: false, searchable: false},
                // {   data: 'normalization', name: 'normalization', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader( table );
    });
    </script>
    <!--/ Datatables Kriteria -->

    <!-- Datatables Kriteria -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table1').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: "{{ url('penilai/criterias/list/data/teladan') }}",
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {   data: 'category_name', name: 'category_name', orderable: false, searchable: false},
                {   data: 'criteria', name: 'criteria', orderable: false, searchable: false},
                // {   data: 'normalization', name: 'normalization', orderable: false, searchable: false},
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

            <div class="card mx-4 my-3">

                <!-- Form Kategori Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Kriteria Inovasi</h5>
                </div>
                <!--/ Form Kategori Title -->

                <div class="container-fluid my-3">

                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0"  width="100%" id="data-table0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Kriteria</th>
                                {{-- <th scope="col">Normalisasi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>

            </div>

            <div class="card mx-4 my-3">

                <!-- Form Kategori Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Kriteria Teladan</h5>
                </div>
                <!--/ Form Kategori Title -->

                <div class="container-fluid my-3">

                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0"  width="100%" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Kriteria</th>
                                {{-- <th scope="col">Normalisasi</th> --}}
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