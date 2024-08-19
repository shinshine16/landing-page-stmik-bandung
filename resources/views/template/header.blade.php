    <!-- ##### Header Area Start ##### -->
    <header class="header-area bg-dark-blue">
        <div class="container">
            <div class="row align-items-center py-2">
                <div class="col-6 d-none d-lg-block text-left text-light">
                    <nav role="navigation">
                        <ul class="list-inline d-flex">
                            <li class="pr-3 cursor-pointer font-small"><a target="_blank" href="https://visimisi.stmik-bandung.ac.id" class="text-light">VisiMisi</a></li>
                            <li class="pr-3 cursor-pointer font-small"><a href="{{ URL::to('/mahasiswa') }}" class="text-light">Mahasiswa</a></li>
                            <li class="pr-3 cursor-pointer font-small"><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSfiWUzbydr971B54Ry1gi10qgATRqRdSnxJv8N2K5DH_l18-A/viewform" class="text-light">TraceStudy</a></li>
                            
                            <li class="pr-3 cursor-pointer font-small"><a href="{{ URL::to('/kurikulum') }}" class="text-light">Kurikulum</a></li>
                            <li class="pr-3 cursor-pointer font-small"><a target="_blank" href="https://journal.stmik-bandung.ac.id/index.php/JurnalTI" class="text-light">Jurnal</a></li>
                            <li class="pr-3 cursor-pointer font-small"><a href="https://docs.google.com/spreadsheets/d/17HLWsVrrH_X6CiQ87e2bcgTTcoS0LwKk/edit?usp=sharing&ouid=107487131162841811975&rtpof=true&sd=true" class="text-light">Kalender Akademik</a></li>
                            <li class="pr-3 cursor-pointer font-small"><a href="http://spmi.stmik-bandung.ac.id/" class="text-light">SPMI</a></li>
                            <li class="pr-3 cursor-pointer font-small"><a target="_blank" href="https://pmb.stmik-bandung.ac.id/" class="text-light">PMB</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-8 text-left d-block d-md-none text-light">
                    <a href="https://api.whatsapp.com/send?phone=6281911505060&text=Hallo" target="_blank">
                        <ion-icon size="small" class="text-dark rounded-circle px-1 py-1 bg-yellow ml-1" name="logo-whatsapp"></ion-icon>
                    </a>
                    <a href="https://facebook.com/BandungSTMIK/" target="_blank">
                        <ion-icon size="small" class="text-dark rounded-circle px-1 py-1 bg-yellow ml-1" name="logo-facebook"></ion-icon>
                    </a>
                    <a href="https://www.instagram.com/stmikbandung/" target="_blank">
                        <ion-icon size="small" class="text-dark rounded-circle px-1 py-1 bg-yellow ml-1" name="logo-instagram"></ion-icon>
                    </a>
                    <a href="#" target="_blank">
                        <ion-icon size="small" class="text-dark rounded-circle px-1 py-1 bg-yellow ml-1" name="logo-twitter"></ion-icon>
                    </a>
                    <a href="https://www.youtube.com/channel/UCquRaRrD-VR2sWhHNHDLV5g" target="_blank">
                        <ion-icon size="small" class="text-dark rounded-circle px-1 py-1 bg-yellow ml-1" name="logo-youtube"></ion-icon>
                    </a>
                    <a href="https://www.linkedin.com/in/stmik-bandung-158330207/" target="_blank">
                        <ion-icon size="small" class="text-dark rounded-circle px-1 py-1 bg-yellow ml-1" name="logo-linkedin"></ion-icon>
                    </a>
                </div>
                <div class="col-4 col-lg-6 text-right text-light">
                    <a class="pl-1" href="{{ @URL::to('/id') }}" title="Indonesia">
                        <img src="{{ asset('assets/img/lang-img/Indonesia.png') }}" width="25" height="auto" />
                    </a>
                    <a class="pl-1" href="{{ @URL::to('/en') }}" title="English">
                        <img src="{{ asset('assets/img/lang-img/English.png') }}" width="25" height="auto" />
                    </a>
                </div>
            </div>
        </div>
        <!-- Top Header Area 
        <div class="top-header-area d-none d-lg-block">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-3">
                        <!-- Logo Area 
                        <div class="logo">
                            <a href="{{ @URL::to('/') }}">
                                <img src="{{ asset('assets/img/core-img/logo-title.png') }}" width="150" />
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 my-3" align="center">
                        <!-- Logo Area 
                        <div class="logo">
                            <a href="{{ @URL::to('/') }}">
                                <img src="{{ asset('assets/img/core-img/subtitle.png') }}" width="500" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->

        <!-- Navbar Area -->
        <div class="credit-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <div class="row no-gutters align-items-center">
                        <nav class="col-2 d-none d-lg-block">
                            <a href="{{ @URL::to('/') }}">
                                <img src="{{ asset('assets/img/core-img/logo_stmik_kampusmerdeka.png') }}" />
                            </a>
                        </nav>
                        <!-- Menu -->
                        <nav class="col-12 col-lg-9 classy-navbar justify-content-center" id="creditNav">

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>
                            <div class="d-block d-lg-none w-100" align="center">
                                <a class="pr-2" href="{{ @URL::to('/') }}">
                                    <img width="80" src="{{ asset('assets/img/core-img/logo-title.png') }}" />
                                </a>
                                <a class="pl-2" href="{{ @URL::to('/') }}">
                                    <img width="80" src="{{ asset('assets/img/logo-img/kampus_merdeka.png') }}" />
                                </a>
                            </div>
                            <div class="d-block d-lg-none">
                                <a href="#">
                                    <ion-icon size="large" class="my-3 d-block d-lg-none text-light search-btn" name="search-outline"></ion-icon>
                                </a>
                            </div>
                            <!-- Menu -->
                            <div class="classy-menu">

                                <!-- Close Button -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>

                                <!-- Nav Start -->
                                <div class="classynav">
                                    <ul>
                                        <li><a href="{{ @URL::to('/') }}">{{ __('lang.beranda') }}</a></li>
                                        <li><a href="#">{{ __('lang.profil.title') }}</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ @URL::to('/profil') }}">{{ __('lang.profil.profil_stmik') }}</a></li>
                                                <li><a href="{{ @URL::to('/visimisi') }}">{{ __('lang.profil.visi_misi') }}</a></li>
                                                <li><a href="{{ @URL::to('/pimpinan') }}">{{ __('lang.profil.pimpinan') }}</a></li>
                                                <li><a href="{{ @URL::to('/struktur-organisasi') }}">{{ __('lang.profil.struktur_organisasi') }}</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">{{ __('lang.prodi.prodi_stmik') }}</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ @URL::to('/teknik-informatika') }}">{{ __('lang.prodi.ti') }}</a></li>
                                                <li><a href="{{ @URL::to('/sistem-informasi') }}">{{ __('lang.prodi.si') }}</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">{{ __('lang.knowledge_center.title') }}</a>
                                            <ul class="dropdown">
                                                <li><a target="_blank" href="https://journal.stmik-bandung.ac.id/index.php/JurnalTI">{{ __('lang.knowledge_center.jurnal') }}</a></li>
                                                <li><a target="_blank" href="https://stmik-bandung.merdeka.academy/">{{ __('lang.knowledge_center.materi_kuliah') }}</a></li>
                                                <li><a target="_blank" href="http://perpus.stmik-bandung.ac.id:18090/eperpus/">{{ __('lang.knowledge_center.kumpulan_skripsi') }}</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">{{ __('lang.kemahasiswaan.kemahasiswaan_stmik') }}</a>
                                            <ul class="dropdown">
                                                <li><a href="#">{{ __('lang.kemahasiswaan.dasar_hukum') }}</a></li>
                                                <li><a href="#">{{ __('lang.kemahasiswaan.visi_misi_tujian') }}</a></li>
                                                <li><a href="#">{{ __('lang.kemahasiswaan.unit_kegiatan') }}</a>
                                                    <ul class="dropdown">
                                                        <li><a>BEM</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">{{ __('lang.layanan.layanan_stmik') }}</a>
                                            <ul class="dropdown">
                                                <li><a href="https://stmik-bandung.ac.id/lppm/">LPPM</a></li>
                                                <li><a href="https://www.facebook.com/groups/38217701596">{{ __('lang.layanan.forum_alumni') }}</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Download</a>
                                            <ul class="dropdown">
                                                <li><a target="_blank" href="https://pmb.stmik-bandung.ac.id/biaya/kuliah">Brosur</a></li>
                                                <li><a href="{{ URL::to('/akreditasi-ban-pt') }}">Akreditasi BAN-PT</a></li>
                                        <li><a href="#">Aplikasi</a></li>        
                                            </ul>
                                        </li>
                                        <li class="d-block d-lg-none"><a href="#">Lainnya</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ URL::to('/staff') }}">Staff</a></li>
                                                <li><a href="{{ URL::to('/pimpinan') }}">Pimpinan</a></li>
                                                <li><a href="{{ URL::to('/mahasiswa') }}">Mahasiswa</a></li>
                                                <li><a href="{{ URL::to('/alumni') }}">Alumni</a></li>
                                                <li><a href="{{ URL::to('/kurikulum') }}">Kurikulum</a></li>
                                                <li><a target="_blank" href="https://journal.stmik-bandung.ac.id/index.php/JurnalTI">Jurnal</a></li>
                                                <li><a href=" https://docs.google.com/spreadsheets/d/17HLWsVrrH_X6CiQ87e2bcgTTcoS0LwKk/edit?usp=sharing&ouid=107487131162841811975&rtpof=true&sd=true">Kalender Akademik</a></li>
                                                <li><a href="{{ URL::to('/spmi') }}">SPMI</a></li>
                                                <li><a target="_blank" href="https://pmbonline.stmik-bandung.ac.id/">PMB</a></li>
                                            </ul>
                                        </li>
                                        <!--
                                        
                                        <li><a href="#">PMB</a></li>-->
                                    </ul>
                                </div>
                                <!-- Nav End -->
                            </div>

                            <!-- Search Bar 
                        <div class="contact">
                            <div style="width: 155px;" align="right">
                                <a href="#">
                                    <ion-icon size="large" class="my-4 d-none d-lg-block search-btn" name="search-outline"></ion-icon>
                                    <ion-icon size="large" class="my-3 d-block d-lg-none search-btn" name="search-outline"></ion-icon>
                                </a>
                            </div>
                        </div>
                        -->
                        </nav>
                        <nav class="col-1 text-right d-none d-lg-block">
                            <a href="#">
                                <ion-icon size="large" class="my-3 text-light float-right search-btn" name="search-outline"></ion-icon>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <!--
            <div class="position-absolute logo-center">
                <a href="{{ @URL::to('/') }}">
                    <img src="{{ asset('assets/img/core-img/logo.png') }}" alt="" style="margin: 25px;">
                </a>
            </div>
            -->
        </div>

        <!-- Top Header Area -->
        <div class="top-header-area d-block d-md-none" style="z-index: -1;">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="d-none d-lg-block col-12 col-md-3">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="{{ @URL::to('/') }}">
                                <img src="{{ asset('assets/img/core-img/logo-title.png') }}" width="150" />
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 my-3" align="center">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="{{ @URL::to('/') }}">
                                <img src="{{ asset('assets/img/core-img/subtitle.png') }}" width="500" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->