<!-- ##### Pimpinan Area Start ##### -->
<section class="team-area section-padding-100-0 bg-yellow">
    <div class="container">
        <!--
        <div class="row">
            <div class="col-12">
                <-- Section Heading 
                <div class="section-heading text-center mb-100">
                    <div class="line"></div>
                    <p>STMIK Bandung</p>
                    {{-- <h2>{{ __('lang.pimpinan.title') }}</h2> --}}
                </div>
            </div>
        </div>
        -->

        <div class="col-12 owl-carousel quote">

            @foreach($pimpinan as $P)
            <div class="item">
                <div class="row justify-content-center">

                    <!-- Single Team Member Area -->
                    <div class="col-12">
                        <div class="mb-100 row justify-content-center align-items-center">
                            <div class="col-12 col-md-2">
                                <img class="rounded" src="{{ asset('assets/img/leader-img/') }}/{{ $P->pimpinan_image }}" alt="">
                            </div>
                            <div class="col-12 col-md-7 mt-2">
                                <blockquote class="blockquote">
                                    <i class="fas fa-quote-left text-light"></i>
                                    <p class="mb-0 text-light">{{ $P->$leaderQuoteLang }}</p>
                                    <div class="mt-2">
                                        <p class="mb-0 font-weight-bold text-white">{{ $P->pimpinan_name }}</p>
                                        <p title="Ketua STMIK Bandung" class="text-light" style="margin-top: -8px">{{ $P->$leaderJabatanLang }}</p>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- ##### Pimpinan Area End ##### -->