@extends('template.layout')

@section('content')
<style>
    .spmi-child {
        height: auto;
    }
    .spmi-child a {
        color: white;
    }
    .spmi-child:hover {
        background: #003679;
    }
    .spmi-child a:hover {
        color: whitesmoke;
    }
    .spmi-child a div {
        font-size: 24px;
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
        $spmi = array(
            array('001', 'Standar Kompetensi Lulusan', 'https://stmik-bandung.ac.id/spmi'),
            array('002', 'Standar Isi Pembelajaran', 'https://stmik-bandung.ac.id/spmi'),
            array('003', 'Standar Proses Pembelajaran', 'https://stmik-bandung.ac.id/spmi'),
            array('004', 'Standar Penilaian Pembelajaran', 'https://stmik-bandung.ac.id/spmi'),
            array('005', 'Standar Dosen dan Tenaga Kependidikan', 'https://stmik-bandung.ac.id/spmi'),
            array('006', 'Standar Sarana dan Prasarana Pembelajaran', 'https://stmik-bandung.ac.id/spmi'),
            array('007', 'Standar Pengelolaan Pembelajaran', 'https://stmik-bandung.ac.id/spmi'),
            array('008', 'Standar Pembiayaan Pembelajaran', 'https://stmik-bandung.ac.id/spmi'),
            array('009', 'Standar Hasil Penelitian', 'https://stmik-bandung.ac.id/spmi'),
            array('010', 'Standar Isi Penelitian', 'https://stmik-bandung.ac.id/spmi'),
            array('011', 'Standar Proses Penelitian', 'https://stmik-bandung.ac.id/spmi'),
            array('012', 'Standar Penilaian Penelitian', 'https://stmik-bandung.ac.id/spmi'),
            array('013', 'Standar Peneliti', 'https://stmik-bandung.ac.id/spmi'),
            array('014', 'Standar Sarpras Penelitian', 'https://stmik-bandung.ac.id/spmi'),
            array('015', 'Standar Pengelolaan Penelitian', 'https://stmik-bandung.ac.id/spmi'),
            array('016', 'Standar Pendanaan dan Pembiayaan Penelitian', 'https://stmik-bandung.ac.id/spmi'),
            array('017', 'Standar Hasil PKM', 'https://stmik-bandung.ac.id/spmi'),
            array('018', 'Standar Isi PKM', 'https://stmik-bandung.ac.id/spmi'),
            array('019', 'Standar Proses PKM', 'https://stmik-bandung.ac.id/spmi'),
            array('020', 'Standar Penilaian PKM', 'https://stmik-bandung.ac.id/spmi'),
            array('021', 'Standar Pelaksana PKM', 'https://stmik-bandung.ac.id/spmi'),
            array('022', 'Standar Sarpras PKM', 'https://stmik-bandung.ac.id/spmi'),
            array('023', 'Standar Pengelolaan PKM', 'https://stmik-bandung.ac.id/spmi'),
            array('024', 'Standar Pendanaan dan Pembiayaan PKM', 'https://stmik-bandung.ac.id/spmi'),
            array('025', 'Standar Formulir Mutu', 'https://stmik-bandung.ac.id/spmi')
        );
        ?>

        <div class="row mb-100">
            <!-- Post Details Content Area -->
            <div class="col-12">
                <div class="post-details-content mb-50">
                    <div class="row justify-content-center">
                        <?php for ($i = 0; $i < count($spmi); $i++) { ?>
                            <?php ($i % 2 == 0) ? $bgcolor = "bg-blue" : $bgcolor = "bg-yellow"; ?>
                            <div class="col-5 col-md-2 my-1 mx-1 py-2 border spmi-child <?=$bgcolor;?>">
                                <a target="_blank" href="{{ $spmi[$i][2] }}">
                                    <div>{{ $spmi[$i][0] }}</div>
                                    {{ $spmi[$i][1] }}
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