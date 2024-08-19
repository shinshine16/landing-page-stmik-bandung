@extends('template.layout')

@section('content')
@include('components.breadcrumb')

<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        <div class="row">
            <!-- Post Details Content Area -->
            <div class="col-12">
                <div class="post-details-content">
                    <h4>{{ $title }}</h4>
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
                    <img src="<?= asset('assets/img/bg-img/') ?>/{{ $thumbnail }}" alt="">
                </div>

            </div>
            <div class="col-12">
                <div class="post-details-content mb-100">
                    <?= $content; ?>
                </div>
            </div>
            
    </div>
</section>
<!-- ##### Post Details Area End ##### -->
@endsection