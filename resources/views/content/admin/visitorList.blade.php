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
            <h2>Visitor/Pengunjung Log</h2>
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
                                                <th>IP</th>
                                                <th>Negara</th>
                                                <th>Kota</th>
                                                <th>Longitude</th>
                                                <th>Latitude</th>
                                                <th>Date Created</th>
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
            ajax: 'log_visitor/json',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            columns: [{
                    data: 'visitor_ip',
                    name: 'visitor_ip',
                },
                {
                    data: 'visitor_country',
                    name: 'visitor_country'
                },
                {
                    data: 'visitor_city',
                    name: 'visitor_city'
                },
                {
                    data: 'visitor_longitude',
                    name: 'visitor_longitude'
                },
                {
                    data: 'visitor_latitude',
                    name: 'visitor_latitude'
                },
                {
                    data: 'visitor_date_created',
                    name: 'visitor_date_created'
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