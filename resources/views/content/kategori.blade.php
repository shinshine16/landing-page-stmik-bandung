@extends('template.layout')

@section('content')

<!-- ##### News Area Start ##### -->
<section class="news-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-50">
                <div class="section-heading text-center mb-50">
                    <div class="line"></div>
                    <p>STMIK Bandung</p>
                    <h2>{{ $title }}</h2>
                </div>
            </div>
            @foreach($listPost as $lPost)
            <!-- Single News Area -->
            <div class="col-12 col-lg-4">

                <!-- Single Blog Area -->
                <div class="single-blog-area mb-70">
                    <div class="blog-thumbnail">
                        <a href="{{ @URL::to('p') }}/{{ $lPost->$slugLang }}"><img class="img-thumbnail" src="{{ asset('assets/img/bg-img/') }}/{{ $lPost->post_thumbnail }}" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <span>{{ date('F d, Y', strtotime($lPost->post_date_created)) }}</span>
                        <a href="{{ @URL::to('p') }}/{{ $lPost->$slugLang }}" class="post-title">{{ $lPost->$titleLang }}</a>
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
        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="Page navigation" class="float-right">
                    <ul class="pagination">
                        <li class="page-item">{{ $listPost->links() }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ##### News Area End ##### -->

@endsection