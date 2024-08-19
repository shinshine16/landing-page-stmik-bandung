@extends('template.layout')

@section('content')
<style>
    .kurikulum-child {
        height: 15vh;
    }

    .kurikulum-child:hover {
        background: #003679;
    }

    .kurikulum-child a:hover {
        color: whitesmoke;
    }

    .kurikulum-child a div {
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
        $kurikulum = array(
            array('001', 'Sistem Informasi', 'https://drive.google.com/file/d/1bKqK5pWCL6rjaS5q5EENmWiy7UNzvV8p/view?usp=sharing'),
            array('002', 'Teknik Informatika', 'https://drive.google.com/file/d/1cHLcOUt88N6ONoYkVNPZuybwKB7NbWJv/view?usp=sharing')
        );
        ?>

        <div class="row mb-100">
            <!-- Post Details Content Area -->
            <div class="col-12">
                <div class="post-details-content mb-50">
                    <div class="row justify-content-center">
                        <?php for ($i = 0; $i < count($kurikulum); $i++) { ?>
                            <div class="col-5 col-md-2 my-1 mx-1 py-2 border kurikulum-child">
                                <a target="_blank" href="{{ $kurikulum[$i][2] }}">
                                    <div>{{ $kurikulum[$i][0] }}</div>
                                    {{ $kurikulum[$i][1] }}
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