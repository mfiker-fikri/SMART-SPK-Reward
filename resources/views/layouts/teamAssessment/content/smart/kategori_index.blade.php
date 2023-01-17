@extends('template.teamAssessment.template')

@section('js_footer')

    <!-- Datatables Kategori -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: "{{ url('penilai/categories/list/data') }}",
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {   data: 'category', name: 'category', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader( table );
    });
    </script>
    <!--/ Datatables Kategori -->
@stop

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Kategori Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Kategori</h5>
                </div>
                <!--/ Form Kategori Title -->

                <div class="container-fluid my-3">

                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0"  width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
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
