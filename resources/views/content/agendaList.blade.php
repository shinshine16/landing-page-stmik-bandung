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
            @for ($i = 0; $i < 6; $i++) <!-- Single News Area -->
                <div class="col-12 col-lg-4">

                    <!-- Single Blog Area -->
                    <div class="single-blog-area mb-70">
                        <div class="blog-thumbnail">
                            <div class="row no-gutters justify-content-center text-center px-5">
                                <div class="col-12 font-weight-normal py-3" style="font-size: 60px; background: #FFBB38;">
                                    21
                                </div>
                                <div class="col-6 text-light py-1" style="font-size: 12px; background: #003679;">
                                    Oktober
                                </div>
                                <div class="col-6 text-light bg-primary py-1" style="font-size: 12px;">
                                    2021
                                </div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <span>July 18, 2018</span>
                            <a href="#" class="post-title">How to get the best loan online</a>
                            <div class="blog-meta">
                                <a href="#" class="post-author">Admin</a>
                                <a href="#" class="post-date">April 26</a>
                            </div>
                        </div>
                    </div>

                </div>
                @endfor
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="Page navigation" class="float-right">
                    <ul class="pagination">
                        <li class="page-item mx-1 active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item mx-1"><a class="page-link" href="#">2</a></li>
                        <li class="page-item mx-1"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ##### News Area End ##### -->

@endsection