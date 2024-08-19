@extends('template.adminLayout')

@section('admincontent')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Semua Artikel</h2>
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
                                    <table class="table table-bordered table-striped table-hover dataTable" id="table">
                                        <thead>
                                            <tr>
                                                <th>Thumbnail</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Author</th>
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
            ajax: 'listPost/json',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            columns: [{
                    data: 'thumb',
                    name: 'thumb',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'post_title_id',
                    name: 'post_title_id'
                },
                {
                    data: 'category_title_id',
                    name: 'category_title_id'
                },
                {
                    data: 'users_name',
                    name: 'users_name'
                },
                {
                    data: 'post_date_created',
                    name: 'post_date_created'
                },
                {
                    data: 'post_date_updated',
                    name: 'post_date_updated'
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