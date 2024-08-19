@extends('template.layout')

@section('content')
<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        @foreach ($table as $T)
        <div class="section-heading text-center mb-100">
            <div class="line"></div>
            <p>{{ $T->users_jabatan_fungsional }}</p>
            <h2>{{ $T->users_name }}</h2>
        </div>
        <div class="row mb-100">
            <div class="col-lg-4 py-2" align="center">
                <img src="{{ asset($pathThumb) }}/{{ $T->$fieldThumb }}" />
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12 mt-0">
                        <div class="section-heading">
                            <div class="line mb-2"></div>
                            <h5>Pendidikan</h5>
                        </div>
                    </div>

                    @foreach ($pendidikan as $pend)
                    <div class="col-12">
                        <h6>{{ $pend->pendidikan_lulusan }}</h6>
                        <span>{{ $pend->pendidikan_universitas }}</span>
                        <p>{{ $pend->pendidikan_thn_keluar }}</p>
                    </div>
                    @endforeach

                    <div class="col-12 mt-50">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="dokumen">
                                <a class="nav-link active" data-toggle="tab" href="#Jurnal" role="tab">Jurnal/Publikasi</a>
                            </li>
                            <li class="nav-item" role="dokumen">
                                <a class="nav-link" data-toggle="tab" href="#HKI" role="tab">HKI</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="Jurnal" role="dokumen">
                                <table class="table table-borderless table-striped">
                                    <tbody>
                                        <?php
                                        $jurnalList = DB::table('stmik_file')->where('file_owner', $T->users_username)->where('file_category', 'Jurnal');
                                        ?>
                                        @foreach ($jurnalList->get() as $doc)
                                        <tr>
                                            <td>
                                                <a href="{{ $doc->file_url }}" target="_blank">{{ $doc->file_title_id }}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="HKI" role="dokumen">
                                <table class="table table-borderless table-striped">
                                    <tbody>
                                        <?php
                                        $publikasiList = DB::table('stmik_file')->where('file_owner', $T->users_username)->where('file_category', 'Publikasi');
                                        ?>
                                        @foreach ($publikasiList->get() as $doc)
                                        <tr>
                                            <td>
                                                <a href="{{ $doc->file_url }}" target="_blank">{{ $doc->file_title_id }}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- ##### Post Details Area End ##### -->

@endsection