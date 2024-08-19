@extends('template.layout')

@section('content')
@include('components.title')

<!-- ##### Features Area Start ###### -->
<section class="wow fadeInUp" data-wow-delay="100ms" style="background-color: #003679;">
    <div class="container-fluid">
        <div class="row justify-content-center py-2">
            <div class="col-12 text-white px-3 py-3">
                <div class="container">
                    <small class="text-white">Aplikasi Yang Dapat Digunakan Dilingkungan STMIK Bandung.</small>
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
        <img class="bg-overlay jarallax" src="{{ asset('assets/img/bg-img/CS.jpg') }}" />
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
            Daftar Layanan Aplikasi dan Sistem intormasi yang terintegrasi.
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
            <h2>Daftar aplikasi</h2>
        </div>
        <div class="row mb-100">
            
            <!-- Post Details Content Area -->
             @for($i = 0; $i < count($aplikasi); $i++)
            <div class="col-12 col-md-3 px-0"> 
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#{{ $collapsapk[$i] }}" aria-expanded="false" aria-controls="multiCollapseExample2">{{ $aplikasi[$i] }}</button>
                <div class="collapse multi-collapse" id="{{ $collapsapk[$i] }}">
                    <div class="card card-body" style="background-color:#FFBB38 ;">
                        <p style="color: #070807">{{$desc[$i]}}</p>
                        <a href="{{ $linkAplikasi[$i] }}">
                            <div class="btn credit-btn btn-2 btn-block box-shadow" style="border-radius: 0;">
                                Klik Disini
                            </div>
                        </a>
                    </div>
                </div>       
            </div>
            @endfor
        </div>
    </div>
</section>

@endsection