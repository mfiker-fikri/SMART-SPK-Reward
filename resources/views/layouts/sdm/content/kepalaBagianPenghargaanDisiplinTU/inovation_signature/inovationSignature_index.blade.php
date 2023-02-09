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
            ajax: "{{ url('sdm/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/inovation/list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'fullName', name: 'fullName', orderable: false, searchable: false},
                {data: 'year', name: 'year', orderable: false, searchable: false},
                {data: 'score_final_result', name: 'score_final_result', orderable: false, searchable: false},
                {data: 'score_final_result_description', name: 'score_final_result_description', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        new $.fn.dataTable.FixedHeader( table );

    });
    </script>
    <!--/ Datatables Team Assessment -->

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


                <div class="container-fluid my-3">

                    <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0"  width="100%" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Panjang</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Keterangan</th>
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
