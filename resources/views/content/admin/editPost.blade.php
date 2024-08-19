@extends('template.adminLayout')

@section('admincontent')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Sunting Artikel</h2>
        </div>
        <div class="row clearfix">
            @foreach ($table as $T)
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">

                            <div class="col-lg-12">
                                @if (Session::get('action') == 'success')
                                <div class="alert alert-success mb-3">
                                    {{ Session::get('result') }}
                                </div>
                                @endif
                                <form method="post" enctype="multipart/form-data" action="{{ route('thumbnail.edit.upload.post') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $T->post_id }}" />
                            </div>

                            <div class="col-lg-6">
                                <img src="{{ asset('assets/img/bg-img/') }}/{{ $T->post_thumbnail }}" class="img-thumbnail" />
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Judul</label>
                                        <span>(Indonesia)</span>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="title_id" id="title_id" class="form-control" placeholder="Masukan judul (Indonesia)" minlength="20" value="{{ $T->post_title_id }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Title</label>
                                        <span>(English)</span>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="title_en" id="title_en" class="form-control" placeholder="Insert title (English)" minlength="20" value="{{ $T->post_title_en }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Sub Judul</label>
                                        <span>(Indonesia)</span>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="subtitle_id" id="subtitle_id" class="form-control" placeholder="Masukan sub judul (Indonesia)" minlength="20" value="{{ $T->post_subtitle_id }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Sub Title</label>
                                        <span>(English)</span>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="subtitle_en" id="subtitle_en" class="form-control" placeholder="Insert sub title (English)" minlength="20" value="{{ $T->post_subtitle_en }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Kategori</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="idKategori" required>
                                                    <option value="{{ $T->category_id }}">{{ $T->category_title_id }} ({{ $T->category_title_en }})</option>
                                                    @foreach($ktgPost as $kP)
                                                    <option value="{{ $kP->category_id }}">{{ $kP->category_title_id }} ({{ $kP->category_title_en }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Thumbnail Image</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="thumbnail" id="thumbnail" class="form-control" placeholder="Thumbnail Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label>Deskripsi</label>
                                <span>(Indonesia)</span>
                                <textarea name="content_id" id="content_id">
                                    <?= $T->post_content_id; ?>
                                </textarea>
                            </div>

                            <div class="col-lg-12">
                                <label>Description</label>
                                <span>(English)</span>
                                <textarea name="content_en" id="content_en">
                                    <?= $T->post_content_en; ?>
                                </textarea>
                            </div>

                            <div class="col-lg-12" align="right">
                                <button type="submit" class="btn bg-blue waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>Publish</span>
                                </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</section>
@endsection