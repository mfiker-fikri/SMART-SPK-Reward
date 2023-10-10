@extends('template.pegawai.template')

@section('js_footer')

    <!-- Datatables Form Inovation Back -->
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#data-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                // paging: false,
                // searching: false,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                // dom: 'Plfrtip',
                language: {
                    searchPanes: {
                        emptyPanes: 'There are no panes to display. :/'
                    }
                },
                // oLanguage: {
                //     sEmptyTable:     "My Custom Message On Empty Table"
                // },
                ajax:
                {
                    url: "{{ url('result-reward-innovation/data') }}",
                    dataSrc: function(data){
                        if(data.data == null){
                            return [];
                        } else {
                            return data.data;
                        }
                    }
                },
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                columns: [
                    {defaultContent: '', data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {defaultContent: '', data: 'fullName', name: 'fullName', orderable: false, searchable: false},
                    {defaultContent: '', data: 'year', name: 'year', orderable: false, searchable: false},
                    {defaultContent: '', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                info: true,
                error: function (xhr, error, code) {
                    console.log(xhr, code);
                },
                // columnDefs: [{
                //     targets: '_all',
                //     defaultContent: ""
                // }],
                // "rowCallback": function( row, data, index ) {
                //     if (data['column'] <= 0) {
                //         $(row).hide();
                //     }
                // },
                // language: {
                //     "infoEmpty": "No records available - Got it?",
                // }
            });

            new $.fn.dataTable.FixedHeader( table );

            // if (table) {
            //     setInterval( function () {
            //         table.ajax.reload(null, false);
            //     }, 10000 );
            // }
        });
    </script>
    <!--/ Datatables Form Inovation Back -->

@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <div class="card mx-3">

                <!-- Form Read Inovation List Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Hasil Penghargaan Inovasi</h5>
                </div>
                <!--/ Form Read Inovation List Title -->

                {{-- @if ($finalResult->isEmpty())
                    <div class="container-fluid py-3">
                        <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>Tidak Ada</tr>
                            </tbody>
                        </table>
                    </div> --}}
                {{-- @else --}}
                    <div class="container-fluid py-3">
                        <table class="table table-striped table-bordered dt-responsive display responsive nowrap"  cellspacing="0" width="100%" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                {{-- @endif --}}

            </div>


        </div>
    </div>
</div>
@endsection
