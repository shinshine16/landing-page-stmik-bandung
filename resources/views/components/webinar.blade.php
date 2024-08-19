<!--
<section class="section-padding-100-0 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mb-100">
                    <div class="line"></div>
                    <p>STMIK Bandung</p>
                    <h2>Webinar</h2>
                    <a class="link" href="{{ @URL::to('/kategori/Webinar') }}">Lihat Semua</a>
                </div>
            </div>
            <div class="col-12 owl-carousel agenda">
                @foreach(DB::table('stmik_v_post')->where('post_category', 'bRin4cX8pR')->orderByDesc('post_date_created')->limit(6)->get() as $webinar)
                <div class="item">
                    <div class="single-news-area d-flex align-items-center">
                        <div class="news-thumbnail">
                            <img src="{{ asset('assets/img/bg-img/') }}/{{ $webinar->post_thumbnail }}" alt="">
                        </div>
                        <div class="news-content">
                            <span>{{ date('F d, Y', strtotime($webinar->post_date_created)) }}</span>
                            <a href="{{ @URL::to('/p/') }}/{{ $webinar->$slugLang }}">{{ @Str::substr($webinar->$titleLang, 0, 30) }}...</a>
                            <div class="mt-2">
                                <a href="#" class="post-author"><small>{{ $webinar->users_name }}</small></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
-->
<!-- ##### Call To Action Start ###### -->
<section class="cta-2-area bg-blue wow fadeInUp" data-wow-delay="100ms">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Cta Content -->
                <div class="cta-content d-flex flex-wrap align-items-center justify-content-between">
                    <div class="cta-text">
                        <h4>{{ __('lang.banner1.title') }}</h4>
                        <span class="text-light">{{ __('lang.banner1.subtitle') }}</span>
                    </div>
                    <div class="cta-btn">
                        <a target="_blank" href="https://webinar.stmik-bandung.ac.id/" class="btn credit-btn box-shadow">{{ __('lang.banner1.btn') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action End ###### -->