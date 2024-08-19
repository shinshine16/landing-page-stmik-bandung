@extends('template.adminLayout')

@section('admincontent')
<style>
.panel-title {
    font-size: 14px;
}
</style>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Tambah Dokumen</h2>
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
                            </div>

                            <div class="col-lg-3" align="center">
                                <i class="material-icons bg-indigo" style="font-size: 20vh; padding: 8vh;">attach_file</i>
                            </div>

                            <div class="col-lg-9">
                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" role="tab" id="headingOne_1">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#uploadMethod" aria-expanded="true" aria-controls="uploadMethod">
                                                            Metode Upload
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="uploadMethod" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                                    <div class="panel-body">
                                                        <div class="row">

                                                            <div class="col-lg-12">
                                                                <form method="post" enctype="multipart/form-data" action="{{ URL::to('/addDokumenProgress') }}">
                                                                    <input type="hidden" name="metode_upload" value="Upload" />
                                                                    {{ csrf_field() }}
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label>Nama File (Indonesia)</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" name="file_name_id" id="category_title_id" class="form-control" placeholder="Masukan Kategori (Indonesia)" minlength="5" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label>Nama File (English)</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" name="file_name_en" id="category_title_en" class="form-control" placeholder="Masukan Kategori (English)" minlength="5" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label>Kategori Dokumen</label>
                                                                <select class="form-control" name="file_ktg_dokumen">
                                                                    <option value="Jurnal">Jurnal</option>
                                                                    <option value="Publikasi">Publikasi</option>
                                                                    <option value="HKI">HKI</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label>File Upload</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="file" name="file_attach" id="file_attach" class="form-control" placeholder="Upload File" required>
                                                                    </div>
                                                                </div>
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
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" role="tab" id="headingTwo_1">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#urlMethod" aria-expanded="false" aria-controls="urlMethod">
                                                            Metode URL/Link
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="urlMethod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
                                                    <div class="panel-body">
                                                        <div class="row">

                                                            <div class="col-lg-12">
                                                                <form method="post" enctype="multipart/form-data" action="{{ URL::to('/addDokumenProgress') }}">
                                                                    <input type="hidden" name="metode_upload" value="URL" />
                                                                    {{ csrf_field() }}
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label>Nama File (Indonesia)</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" name="file_name_id" id="category_title_id" class="form-control" placeholder="Masukan Kategori (Indonesia)" minlength="5" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label>Nama File (English)</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" name="file_name_en" id="category_title_en" class="form-control" placeholder="Masukan Kategori (English)" minlength="5" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label>Kategori Dokumen</label>
                                                                <select class="form-control" name="file_ktg_dokumen">
                                                                    <option value="Jurnal">Jurnal</option>
                                                                    <option value="Publikasi">Publikasi</option>
                                                                    <option value="HKI">HKI</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label>URL Link</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="url" name="file_url" id="file_url" class="form-control" placeholder="URL Link" required>
                                                                    </div>
                                                                </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection