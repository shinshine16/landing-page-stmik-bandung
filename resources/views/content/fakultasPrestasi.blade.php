@extends('template.layout')

@section('content')
<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        <div class="section-heading text-center mb-100">
            <div class="line"></div>
            <p>STMIK Bandung</p>
            <h2>{{ $title }}</h2>
        </div>


    </div>
</section>

<!-- ##### Special Feature Area Start ###### -->
<section class="special-feature-area style-2 d-flex flex-wrap wow fadeInUp" data-wow-delay="100ms">
    <!-- Special Feature Thumbnail -->
    <div class="special-feature-content">
        <img src="{{ asset('assets/img/bg-img/5.jpg') }}" style="height: auto; width: 100%;" />
    </div>
    <!-- Special Feature Content -->
    <div class="special-feature-content py-5 bg-yellow">
        <div class="feature-text">
            <!-- Section Heading -->
            <div class="section-heading white mb-50">
                <div class="line"></div>
                <p>STMIK Bandung</p>
                <h2>Mengapa STMIK Bandung ?</h2>
            </div>
            <ul class="text-light ml-3 mb-50">
                <li>Tersedia Beasiswa pendidikan</li>
                <li>Inkubator Bisnis untuk Mahasiswa</li>
                <li>Workshop IT & Entrepreneurship</li>
                <li>Lokasi kampus strategis</li>
                <li>Biaya tidak mahal dan dapat diangsur</li>
                <li>Kerjasama dengan perusahaan IT</li>
            </ul>
        </div>
    </div>
</section>
<!-- ##### Special Feature Area End ###### -->

<!-- ##### Special Feature Area Start ###### -->
<section class="special-feature-area d-flex flex-wrap wow fadeInUp" data-wow-delay="100ms">
    <!-- Special Feature Content -->
    <div class="special-feature-content py-5 bg-yellow">
        <div class="feature-text">
            <!-- Section Heading -->
            <div class="section-heading white mb-50 mt-70">
                <div class="line"></div>
                <p>STMIK Bandung</p>
                <h2>Fasilitas</h2>
            </div>
            <ul class="text-light ml-3 mb-50">
                <li>Gedung Kampus (Milik Sendiri)</li>
                <li>Laboratorium Komputer & Jaringan</li>
                <li>Laboratorium Multimedia</li>
                <li>Laboratorium Robotik</li>
                <li>Ruang Konsultasi</li>
                <li>Perpustakaan</li>
                <li>Studio Band</li>
                <li>Akses Internet</li>
                <li>Mushola</li>
            </ul>
        </div>
    </div>
    <!-- Special Feature Thumbnail -->
    <div class="special-feature-content">
        <img src="{{ asset('assets/img/bg-img/fasilitas_prestasi.jpg') }}" style="height: auto; width: 100%;" />
    </div>
</section>
<!-- ##### Special Feature Area End ###### -->

<!-- ##### Call To Action Start ###### -->
<section class="cta-2-area bg-blue wow fadeInUp" data-wow-delay="100ms">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Cta Content -->
                <div class="row cta-content d-flex flex-wrap align-items-center justify-content-start">
                    <div class="col-2 cta-btn" align="center">
                        <ion-icon style="font-size: 8vh;" class="text-light" name="business-outline"></ion-icon>
                    </div>
                    <div class="col-9 cta-text">
                        <h4>Lokasi Kampus</h4>
                        <span class="text-light">Jl. Cikutra No.113, Cikutra, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40124</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action End ###### -->
@endsection