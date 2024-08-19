@extends('template.layout')

@section('content')
@include('components.title')

<!-- ##### Features Area Start ###### -->
<section class="wow fadeInUp" data-wow-delay="100ms" style="background-color: #003679;">
    <div class="container-fluid">
        <div class="row justify-content-center py-2">
            <div class="col-12 text-white px-3 py-3">
                <div class="container">
                    <small class="text-white">S1 Teknik Informatika berfokus pada perkembangan teknologi informasi yang menuntut tenaga ahli yang cerdas dan andal di bidangnya. Program Studi S1 Teknik Informatika mempersiapkan lulusan yang sigap menjawab tantangan global ini. Mahasiswa Program Studi S1 Teknik Informatika (S1 IT) akan mempelajari konsep ilmu computer science serta implementasi praktis software engineering.</small>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Features Area End ###### -->

<!-- ##### Special Feature Area Start ###### -->
<section class="special-feature-area bg-yellow align-items-center style-2 d-flex flex-wrap wow fadeInUp" data-wow-delay="100ms">
    <!-- Special Feature Thumbnail -->
    <div class="special-feature-thumbnail">
        <img class="bg-overlay jarallax" src="{{ asset('assets/img/bg-img/teknik-informatika.jpg') }}" />
    </div>
    <!-- Special Feature Content -->
    <div class="special-feature-content">
        <div class="feature-text">
            <!-- Section Heading -->
            <div class="section-heading white mb-50 mt-50">
                <div class="line"></div>
                <p>STMIK Bandung</p>
                <h2>Ringkasan</h2>
            </div>
            <h6>
                Lulusan Program Studi Teknik Informatika STMIK BANDUNG adalah generasi muda yang memiliki kecakapan dalam rekayasa perangkat lunak, implementasi jaringan, robotik dan multimedia, sehingga mampu dalam merancang dan mengimplementasikan solusi teknologi intormasi yang terintegrasi.
            </h6>
        </div>
    </div>
</section>
<!-- ##### Special Feature Area End ###### -->

<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        <div class="section-heading text-center mb-50">
            <div class="line"></div>
            <p>STMIK Bandung</p>
            <h2>Peluang Profesi</h2>
        </div>
        <div class="row mb-100">
            <!-- Post Details Content Area -->
            @for($i = 0; $i < count($peluangProfesi); $i++)
            <div class="col-12 col-md-3 px-0">
                <div class="btn credit-btn btn-2 btn-block box-shadow" style="border-radius: 0;">
                    {{ $peluangProfesi[$i] }}
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

@endsection