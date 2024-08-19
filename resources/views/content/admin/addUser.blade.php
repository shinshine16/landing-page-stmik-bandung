@extends('template.adminLayout')

@section('admincontent')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Tambah User/Pengguna</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">

                            <div class="col-lg-12">
                                @if (Session::get('action') == 'success')
                                <div class="alert alert-success mb-3">
                                    {{ Session::get('result') }}
                                </div>
                                @elseif (Session::get('action') == 'error')
                                <div class="alert alert-danger mb-3">
                                    {{ Session::get('result') }}
                                </div>
                                @endif
                                <form method="post" enctype="multipart/form-data" action="{{ URL::to('/addUserProgress') }}">
                                    {{ csrf_field() }}
                            </div>

                            <div class="col-lg-3" align="center">
                                <i class="material-icons bg-indigo" style="font-size: 20vh; padding: 8vh;">people</i>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <label>Username</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username" minlength="10" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Password</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" minlength="10" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Nickname</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Masukan nickname" minlength="10" required>
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
</section>
@endsection