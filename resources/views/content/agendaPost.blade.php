@extends('template.layout')

@section('content')
@include('components.breadcrumb')
<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12">
                <div class="post-details-content">
                    <h4>{{ $title }}</h4>
                </div>
                <div class="row align-items-center no-gutters py-3" style="color: #838383;">
                    <div class="col-6 col-md-2 d-flex">
                        <ion-icon style="font-size: 20px" name="time-outline"></ion-icon>
                        <div class="mb-2 px-2">{{ $date }}</div>
                    </div>
                    <div class="col-6 col-md-2 d-flex">
                        <ion-icon style="font-size: 20px" name="bookmark-outline"></ion-icon>
                        <div class="mb-2 px-2">{{ $kategori }}</div>
                    </div>
                    <div class="col-6 col-md-2 d-flex">
                        <ion-icon style="font-size: 20px" name="person-outline"></ion-icon>
                        <div class="mb-2 px-2">{{ $author }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <!-- Agenda Area -->
                <div class="align-items-center mb-50">
                    <div class="news-thumbnail">
                        <div class="row no-gutters justify-content-center text-center">
                            <div class="col-12 font-weight-normal py-3" style="font-size: 60px; background: #FFBB38;">
                                {{ $dS }}
                            </div>
                            <div class="col-6 text-light py-1" style="font-size: 12px; background: #003679;">
                                {{ $moS }}
                            </div>
                            <div class="col-6 text-light bg-primary py-1" style="font-size: 12px;">
                                {{ $yS }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-10">
                <div class="post-details-content mb-100">
                    <div class="row no-gutters align-items-center bg-primary py-3">
                        <div class="col-2 col-md-1 text-light text-center">
                            <ion-icon size="large" name="locate-outline"></ion-icon>
                        </div>
                        <div class="col-10 col-md-11 text-light">
                            <p class="my-0 text-yellow">Tempat</p>
                            {{ $locate }}
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 bg-dark-blue text-light text-center py-1">
                            <div class="font-weight-normal">
                                Waktu Pelaksanaan
                            </div>
                        </div>
                        <div class="col-6 bg-yellow text-dark text-center py-3">
                            <div class="font-weight-normal">
                                {{ $dS }} {{ $moS }} {{ $yS }}
                            </div>
                            <div class="font-weight-normal">
                                ({{ $hS }} : {{ $miS }})
                            </div>
                        </div>
                        <div class="col-6 bg-blue text-light text-center py-3">
                            <div class="font-weight-normal">
                                {{ $dE }} {{ $moE }} {{ $yE }}
                            </div>
                            <div class="font-weight-normal">
                                ({{ $hE }} : {{ $miE }})
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <?= $desc; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ##### Post Details Area End ##### -->
@endsection