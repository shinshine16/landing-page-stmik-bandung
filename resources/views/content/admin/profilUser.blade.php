@extends('template.adminLayout')

@section('admincontent')
<?php

use App\Http\Controllers\JsonController;
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">

                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img src="{{ $dataArr->image }}" alt="{{ $dataArr->name }}" width="128" height="auto" />
                        </div>
                        <div class="content-area">
                            <h3>{{ $dataArr->name }}</h3>
                            <p>{{ $dataArr->jabatan_id }} ({{ $dataArr->jabatan_en }})</p>
                            <p>{{ Session::get('stmik_adm_level') }}</p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Artikel</span>
                                <span>N/A</span>
                            </li>
                            <li>
                                <span>Agenda</span>
                                <span>N/A</span>
                            </li>
                            <li>
                                <span>Dokumen</span>
                                <span>N/A</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card card-about-me">
                    <div class="header font-bold">Jurnal</div>
                    <div class="header font-12" style="padding-top: 8px; padding-bottom: 8px;">
                        Membangun suatu pemikiran Agile dan Manajemen Proyek untuk suksesnya Transformasi Digital
                    </div>
                    <div class="header font-12" style="padding-top: 8px; padding-bottom: 8px;">
                        Membangun suatu pemikiran Agile dan Manajemen Proyek untuk suksesnya Transformasi Digital
                    </div>
                </div>

                <div class="card card-about-me">
                    <div class="header font-bold">Publikasi</div>
                    <div class="header font-12" style="padding-top: 8px; padding-bottom: 8px;">
                        Membangun suatu pemikiran Agile dan Manajemen Proyek untuk suksesnya Transformasi Digital
                    </div>
                    <div class="header font-12" style="padding-top: 8px; padding-bottom: 8px;">
                        Membangun suatu pemikiran Agile dan Manajemen Proyek untuk suksesnya Transformasi Digital
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Ubah Profil</a></li>
                                <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Ubah Password</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="row">
                                        @foreach ($post as $P)
                                        <div class="col-lg-12">
                                            <div class="panel panel-default panel-post">
                                                <div class="panel-heading">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a href="#">{{ $P->users_name }}</a>
                                                            </h4>
                                                            {{ date('d F Y', strtotime($P->post_date_created)) }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="post">
                                                        <div class="post-heading">
                                                            {{ $P->post_title_id }}
                                                            <blockquote class="font-14">{{ $P->post_title_en }}</blockquote>
                                                        </div>
                                                        <div class="post-content">
                                                            <img src="{{ asset('assets/img/bg-img') }}/{{ $P->post_thumbnail }}" class="img-responsive" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label">Username</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $dataArr->user }}" readonly required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="Name" name="name" placeholder="Name" value="{{ $dataArr->name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="example@example.com" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Experience</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="InputExperience" name="InputExperience" rows="3" placeholder="Experience"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputSkills" class="col-sm-2 control-label">Skills</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="InputSkills" name="InputSkills" placeholder="Skills">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in" />
                                                <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="card card-about-me">
                    <div class="body">
                        <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">library_books</i>
                                    Quotes
                                </div>
                                <div class="content">
                                    {{ $dataArr->quote_id }}
                                    <p class="m-t-10">{{ $dataArr->quote_en }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">notes</i>
                                    Description
                                </div>
                                <div class="content">
                                    {{ $dataArr->desc_id }}
                                    <p class="m-t-10">{{ $dataArr->desc_en }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection