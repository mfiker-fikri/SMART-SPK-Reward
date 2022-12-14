@extends('template.teamAssessment.template')

<!-- Footer Js -->
@section('js_footer')
    <!-- Datatables Form Inovasi -->
    <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#data-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            // rowReorder: {
            //     selector: 'td:nth-child(2)'
            // },
            // paging: false,
            ajax: "{{ url('penilaian/appraisment/list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                // {data: 'id', name: 'id'},
                // {data: 'upload_file_short_description', name: 'upload_file_short_description'},
                // {data: 'status', name: 'status'},
                // {data: 'last_seen', name: 'last_seen'},
                // {data: 'status_active', name: 'status_active'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader(table);
    });
    </script>
    <!--/ Datatables Form Inovasi -->
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-4">

                <!-- Form Penilaian Inovasi Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Kelola Data Penilaian Inovasi</h5>
                </div>
                <!--/ Form Penilaian Inovasi Title -->

                <div class="container-fluid">

                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap" cellspacing="0" width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Panjang</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    {{-- @foreach ( $reward as $p)
                        <p>{{ $p->upload_file_short_description }}</p>
                    @endforeach --}}
                    <p>{{ $reward }}</p>

                </div>

            </div>
        </div>
    </div>
</div>

@stop
