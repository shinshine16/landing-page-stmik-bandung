<?php 
use App\Http\Controllers\LanguageController; 
$titleLang = LanguageController::FieldLang('post_title_', $getLanguage);
$subtitleLang = LanguageController::FieldLang('post_subtitle_', $getLanguage);
?>

<!-- ##### Slider Area Start ##### -->
<div class="hero-area">
    <div class="hero-slideshow owl-carousel">

        @foreach($slider as $slide)
        <!-- Single Slide -->
        <div class="single-slide bg-img">
            <!-- Background Image-->
            <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(<?=asset('assets/img/bg-img')."/".$slide->post_thumbnail ?>);">
            </div>
            <!-- Welcome Text -->
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="welcome-text">
                            <h6 data-animation="fadeInLeft" data-delay="100ms">{{ date('F d, Y', strtotime($slide->post_date_created)) }}</h6>
                            <h3 class="text-light" data-animation="fadeInUp" data-delay="300ms">{{ $slide->$titleLang }}</h2>
                                <p data-animation="fadeInUp" data-delay="500ms">{{ $slide->$subtitleLang }}</p>
                                <a href="{{ @URL::to('/p/') }}/{{ $slide->$slugLang }}" class="btn credit-btn mt-50" data-animation="fadeInUp" data-delay="700ms">{{ __('lang.about.btn') }}</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-none d-lg-block">
                        <img style="width: 80%;" data-animation="fadeInRight" data-delay="100ms" class="rounded" src="{{ asset('assets/img/bg-img') }}/{{ $slide->post_thumbnail }}" />
                    </div>
                </div>
            </div>
            <!-- Slide Duration Indicator -->
            <div class="slide-du-indicator"></div>
        </div>
        @endforeach

    </div>
</div>
<!-- ##### Slider Area End ##### -->