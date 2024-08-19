@extends('template.layout')

@section('content')
@include('components.title')
<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        <div class="row mb-100">
            <!-- Post Details Content Area -->
            <div class="col-12 col-md-2">
                <div class="post-details-content">
                    <img src="{{ asset('assets/img/core-img/logo-big.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-10">
                <div class="post-details-content">
                    <h2>Sekolah Tinggi Manajemen Informatika & Komputer (STMIK) Bandung</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="post-details-content mb-50">
                    <p class="text-justify">STMIK Bandung merupakan STMIK pertama di Jawa Barat dan pelopor pendidikan
                        tinggi informatika
                        swasta dengan fokus untuk mencetak tenaga profesional dan technopreneur IT.
                    </p>
                    <p class="text-justify">Dalam upaya memberikan kesempatan kepada masyarakat yang tidak mempunyai
                        waktu luang mengikuti
                        pendidikan di hari kerja. STMIK BANDUNG membuka Program Kelas Karyawan atau Program Kuliah
                        Karyawan jenjang S1. Kualitas dan proses pendidikan di STMIK BANDUNG sama
                        dirancang sama dengan Kualitas dan proses pendidikan pada hari biasa. Setiap perkuliahaan diatur
                        secara terstruktur dan terjadwal dengan pemilihan tenaga pengajar terbaik dan berpengalaman di
                        bidangnya. Proses belajar didukung oleh fasilitas terbaik.</p>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- ##### Post Details Area End ##### -->

@endsection
