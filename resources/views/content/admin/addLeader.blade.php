@extends('template.adminLayout')

@section('admincontent')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Tambah Pimpinan</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">

                            <div class="col-lg-12">
                                @if (Session::get('action') == 'success')
                                <div class="alert alert-success mb-3">
                                    <?= Session::get('result'); ?>
                                </div>
                                @elseif (Session::get('action') == 'error')
                                <div class="alert alert-danger mb-3">
                                    <?= Session::get('result'); ?>
                                </div>
                                @endif
                                <form method="post" enctype="multipart/form-data" action="{{ URL::to('/addLeaderProgress') }}">
                                    {{ csrf_field() }}
                            </div>

                            <div class="col-lg-3" align="center">
                                <i class="material-icons bg-indigo" style="font-size: 20vh; padding: 8vh;">people</i>
                            </div>

                            <div class="col-lg-9">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label>Username</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Password</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Nama Pimpinan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Masukan nickname" minlength="10" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Thumbnail/Foto</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="thumbnail" id="thumbnail" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Jabatan Pimpinan (Indonesia)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="jabatan_id" id="jabatan_id" class="form-control" placeholder="Masukan Jabatan (Indonesia)" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Jabatan Pimpinan (Inggris)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="jabatan_en" id="jabatan_en" class="form-control" placeholder="Masukan Jabatan (Inggris)" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Quote (Indonesia)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea class="form-control" name="quote_id" id="quote_id" placeholder="Masukan Quote (Indonesia)"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Quote (Inggris)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea class="form-control" name="quote_en" id="quote_en" placeholder="Masukan Quote (Inggris)"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Deskripsi</label>
                                        <span>(Indonesia)</span>
                                        <textarea name="content_id" id="content_id"></textarea>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Description</label>
                                        <span>(English)</span>
                                        <textarea name="content_en" id="content_en"></textarea>
                                    </div>

                                    <div class="col-lg-12" align="right">
                                        <button type="submit" class="btn bg-blue waves-effect">
                                            <i class="material-icons">save</i>
                                            <span>Simpan</span>
                                        </button>
                                        </form>
                                    </div>

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