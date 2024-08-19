@extends('template.adminLayout')

@section('admincontent')
<section class="content">
    <style>
        tbody tr {
            font-size: 12px;
        }
        tbody td {
            padding: 5px !important;
        }
    </style>
    <div class="container-fluid">
        <div class="block-header">
            <h2>Semua Pimpinan</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if (Session::get('action') == 'delete')
                <div class="alert alert-danger">
                    {{ Session::get('result') }}
                </div>
                @endif
                <div class="card">
                    <div class="body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-condensed table-striped table-hover dataTable" id="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Pimpinan</th>
                                                <th>Jabatan</th>
                                                <th>Date Created</th>
                                                <th>Date Updated</th>
                                                <th></th>
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
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('js')
<script>
    var table = $('#table');
    $(function() {
        table.DataTable({
            responsive: false,
            processing: true,
            serverSide: true,
            ajax: 'allLeader/json',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            columns: [{
                    data: 'pimpinan_name',
                    name: 'pimpinan_name',
                },
                {
                    data: 'pimpinan_jabatan_id',
                    name: 'pimpinan_jabatan_id'
                },
                {
                    data: 'pimpinan_date_created',
                    name: 'pimpinan_date_created'
                },
                {
                    data: 'pimpinan_date_updated',
                    name: 'pimpinan_date_updated'
                },
                {
                    data: 'act',
                    name: 'act',
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('#table input').unbind();
        $('#table input').bind('keyup', function(e) {
            if (e.keyCode == 13) {
                table.fnFilter(this.value);
            }
        });
    });
</script>
@endsection