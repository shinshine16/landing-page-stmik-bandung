@extends('template.adminLayout')

@section('admincontent')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Tambah Agenda</h2>
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
                                <form method="post" enctype="multipart/form-data" action="{{ URL::to('/addAgendaProgress') }}">
                                    {{ csrf_field() }}
                            </div>

                            <div class="col-lg-3" align="center">
                                <i class="material-icons bg-indigo" style="font-size: 20vh; padding: 8vh;">date_range</i>
                            </div>

                            <div class="col-lg-9">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label>Judul (Indonesia)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="title_id" id="title_id" class="form-control" placeholder="Masukan Judul (Indonesia)" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Judul (English)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="title_en" id="title_en" class="form-control" placeholder="Masukan Judul (English)" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Waktu Mulai</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="agenda_start" id="agenda_start" class="form-control" placeholder="Tentukan Waktu Mulai Agenda" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Waktu Berakhir</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="agenda_end" id="agenda_end" class="form-control" placeholder="Tentukan Waktu Berakhir Agenda" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Lokasi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukan Lokasi" minlength="10" required>
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

@section('js')
<script src="{{ asset('assets/admin/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
<script>
    $(function() {
        $('#agenda_start').inputmask('y-m-d h:s', {
            placeholder: '____-__-__ __:__',
            alias: "datetime",
            hourFormat: '24'
        });
        $('#agenda_end').inputmask('y-m-d h:s', {
            placeholder: '____-__-__ __:__',
            alias: "datetime",
            hourFormat: '24'
        });
    });
</script>
@endsection