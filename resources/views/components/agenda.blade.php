<section class="section-padding-100-0 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center mb-100">
                    <div class="line"></div>
                    <p>STMIK Bandung</p>
                    <h2>Agenda</h2>
                    <a class="link" href="#">Lihat Semua</a>
                </div>
            </div>
            <div class="col-12 owl-carousel agenda">
                @foreach($agenda as $A)
                <div class="item">
                    <div class="single-news-area d-flex align-items-center">
                        <div class="news-thumbnail">
                            <div class="row no-gutters justify-content-start text-center">
                                <div class="col-12 font-weight-bold bg-yellow py-3" style="font-size: x-large;">
                                    {{ date('d', strtotime($A->agenda_start)) }}
                                </div>
                                <div class="col-12 bg-blue text-light py-1" style="font-size: 12px;">
                                    {{ date('F', strtotime($A->agenda_start)) }}
                                </div>
                            </div>
                        </div>
                        <div class="news-content">
                            <a href="<?= URL::to('/agenda/'.$A->$agendaSlugLang) ?>">{{ @Str::substr($A->$agendaTitleLang, 0, 30) }}...</a>
                            <div class="mt-2">
                                <a href="#"><small>Admin</small></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>