<!-- ##### Artikel Area Start ###### -->
<section class="miscellaneous-area bg-light section-padding-100-0">
    <div class="container">
        <div class="row align-items-start justify-content-center">
            @if ($labelKtg)
            @foreach($labelKtg->get() as $label)
            <!-- Berita Area -->
            <div class="col-12 col-md-4">
                <div class="news--area mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <!-- Section Heading -->
                    <div class="section-heading mb-50">
                        <div class="line"></div>
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h2>{{ $label->$categoryTitleLang }}</h2>
                            </div>
                            <div class="col-6 text-right">
                                <a class="link" href="{{ @URL::to('/kategori/') }}/{{ $label->$categoryTitleLang }}">Lihat Semua</a>
                            </div>
                        </div>
                    </div>

                    @foreach(DB::table('stmik_v_post')->where('post_category', $label->category_id)->orderByDesc('post_date_created')->limit(5)->get() as $post)
                    <!-- Single News Area -->
                    <div class="single-news-area d-flex align-items-start">
                        <div class="news-thumbnail">
                            <img src="{{ asset('assets/img/bg-img/') }}/{{ $post->post_thumbnail }}" alt="">
                        </div>
                        <div class="news-content">
                            <span>{{ date('F d, Y', strtotime($post->post_date_created)) }}</span>
                            <a href="{{ @URL::to('/p/') }}/{{ $post->$slugLang }}">{{ @Str::substr($post->$titleLang, 0, 30) }}...</a>
                            <div class="mt-2">
                                <a href="#"><small>{{ $post->users_name }}</small></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<!-- ##### Artikel Area End ###### -->