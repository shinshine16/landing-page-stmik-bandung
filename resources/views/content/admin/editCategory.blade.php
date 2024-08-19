@extends('template.adminLayout')

@section('admincontent')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Ubah Kategori</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        @foreach ($table as $T)
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
                                <form method="post" enctype="multipart/form-data" action="{{ URL::to('/editCategoryProgress') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="category_id" value="{{ $T->category_id }}">
                            </div>

                            <div class="col-lg-3" align="center">
                                <i class="material-icons bg-indigo" style="font-size: 20vh; padding: 8vh;">label_outline</i>
                            </div>

                            <div class="col-lg-9">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label>Kategori (Indonesia)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="{{ $T->category_title_id }}" name="category_title_id" id="category_title_id" class="form-control" placeholder="Masukan Kategori (Indonesia)" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Kategori (English)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="{{ $T->category_title_en }}" name="category_title_en" id="category_title_en" class="form-control" placeholder="Masukan Kategori (English)" minlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Link Kategori</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="{{ $T->category_for_url }}" name="link_category" id="link_category" class="form-control" placeholder="Link Kategori" value="{{ @URL::to('/') }}" minlength="10" required>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection