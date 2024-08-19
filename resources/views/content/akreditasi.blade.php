@extends('template.layout')

@section('content')
<style>
    .box-child {
        height: auto;
    }

    .box-child a {
        color: white;
    }

    .box-child:hover {
        background: #003679;
    }

    .box-child a:hover {
        color: whitesmoke;
    }

    .box-child a div {
        font-size: 16px;
        font-weight: bold;
    }
</style>
<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{ asset('assets/img/bg-img/stmikbdg-bg1.jpg') }}); height: 20vh;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $kategori }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        <?php
        $value_box_univ = array(
            array('Akreditasi STMIK Bandung (2018)', '27 November 2018', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=stmik-2018'),
            array('Akreditasi STMIK Bandung (2022)', '21 September 2022', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=stmik-2022')
        );
        $value_box_if = array(
            array('Akreditasi Teknik Informatika (2000)', '10 Agustus 2000', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=if-2000'),
            array('Akreditasi Teknik Informatika (2008)', '20 Juni 2008', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=if-2008'),
            array('Akreditasi Teknik Informatika (2014)', '08 Desember 2014', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=if-2014'),
            array('Akreditasi Teknik Informatika (2017)', '05 Desember 2017', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=if-2017'),
            array('Akreditasi Teknik Informatika (2022)', '12 Desember 2022', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=if-2022')
        );
        $value_box_si = array(
            array('Akreditasi Sistem Informasi (2008)', '31 Mei 2008', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=si-2008'),
            array('Akreditasi Sistem Informasi (2014)', '08 Desember 2014', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=si-2014'),
            array('Akreditasi Sistem Informasi (2018)', '09 Januari 2018', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=si-2018'),
            array('Akreditasi Sistem Informasi (2022) Revisi', '19 oktober 2022', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=si-2022'),
        );
        $value_box_mi = array(
            array('Akreditasi Manajemen Informatika (2000)', '10 Agustus 2000', 'https://akreditasi.stmik-bandung.ac.id/?akreditasi=mi-2000')
        );
        ?>

        <div class="row mb-100">
            <!-- Post Details Content Area -->
            <div class="col-12">
                <div class="post-details-content mb-50">
                    <div class="row justify-content-center mx-1">
                        <!-- Universitas -->
                        <?php for ($i = 0; $i < count($value_box_univ); $i++) { ?>
                            <div class="col-12 my-1 py-2 border box-child bg-yellow">
                                <a target="_blank" href="{{ $value_box_univ[$i][2] }}">
                                    <div>{{ $value_box_univ[$i][0] }}</div>
                                    {{ $value_box_univ[$i][1] }}
                                </a>
                            </div>
                        <?php } ?>
                        <!-- IF -->
                        <div class="col-12">
                            <div class="section-heading text-center mt-50">
                                <div class="line"></div>
                                <h4>Teknik Informatika</h4>
                            </div>
                        </div>
                        <?php for ($i = 0; $i < count($value_box_if); $i++) { ?>
                            <div class="col-12 my-1 py-2 border box-child bg-yellow">
                                <a target="_blank" href="{{ $value_box_if[$i][2] }}">
                                    <div>{{ $value_box_if[$i][0] }}</div>
                                    {{ $value_box_if[$i][1] }}
                                </a>
                            </div>
                        <?php } ?>
                        <!-- SI -->
                        <div class="col-12">
                            <div class="section-heading text-center mt-50">
                                <div class="line"></div>
                                <h4>Sistem Informasi</h4>
                            </div>
                        </div>
                        <?php for ($i = 0; $i < count($value_box_mi); $i++) { ?>
                            <div class="col-12 my-1 py-2 border box-child bg-yellow">
                                <a target="_blank" href="{{ $value_box_mi[$i][2] }}">
                                    <div>{{ $value_box_mi[$i][0] }}</div>
                                    {{ $value_box_mi[$i][1] }}
                                </a>
                            </div>
                        <?php } ?>
                        <?php for ($i = 0; $i < count($value_box_si); $i++) { ?>
                            <div class="col-12 my-1 py-2 border box-child bg-yellow">
                                <a target="_blank" href="{{ $value_box_si[$i][2] }}">
                                    <div>{{ $value_box_si[$i][0] }}</div>
                                    {{ $value_box_si[$i][1] }}
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Post Details Area End ##### -->

@endsection