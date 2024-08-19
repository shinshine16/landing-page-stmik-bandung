@extends('template.layout')

@section('content')

<!-- ##### News Area Start ##### -->
<section class="news-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-50">
                <h3>{{ $title }}</h3>
            </div>
            @foreach($listPost as $lPost)
            <!-- Single News Area -->
            <div class="col-12 col-lg-4">

                <!-- Single Blog Area -->
                <div class="single-blog-area mb-70">
                    <div class="blog-thumbnail">
                        <a href="#"><img class="img-thumbnail" src="{{ asset('assets/img/bg-img/') }}/{{ $lPost->post_thumbnail }}" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <span>{{ date('F d, Y', strtotime($lPost->post_date_created)) }}</span>
                        <a href="#" class="post-title">{{ $lPost->$titleLang }}</a>
                        <div class="blog-meta">
                            <a href="#" class="post-author">{{ $lPost->users_name }}</a>
                            <a href="#" class="post-date">{{ $lPost->$categoryLang }}</a>
                        </div>
                        <p>{{ $lPost->$subtitleLang }}</p>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ##### News Area End ##### -->

@endsection