<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>

<div class="overlay"></div>

<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ @URL::to('/dashboard') }}" style="display: flex; padding: 5px;">
                <img src="{{ asset('assets/img/core-img/logo.png') }}" style="padding-left: 8px;" />
                <label style="font-size: 15px; margin-left: 12px;">STMIK Bandung <br />Admin Panel</label>
            </a>
        </div>
    </div>
</nav>

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                @if (Session::get('stmik_adm_level') == 'Pimpinan')
                @foreach(DB::table('stmik_pimpinan')->where('pimpinan_id', Session::get('stmik_adm_id'))->get() as $p)
                <img src="{{ asset('assets/img/leader-img') }}/{{ $p->pimpinan_image }}" width="48" height="auto" alt="User" />
                @endforeach
                @else
                <img src="{{ asset('assets/admin/images/user.png') }}" width="48" height="auto" alt="User" />
                @endif
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Session::get('stmik_adm_user') }}</div>
                <div class="email">{{ Session::get('stmik_adm_level') }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ @URL::to('/profilUser') }}"><i class="material-icons">person</i>Profil</a></li>
                        <li><a href="{{ @URL::to('/gantiFPUser') }}"><i class="material-icons">camera_alt</i>Ganti Foto Profil</a></li>
                        <li><a href="{{ @URL::to('/gantiPassword') }}"><i class="material-icons">lock</i>Ubah Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ @URL::to('/logout') }}"><i class="material-icons">input</i>Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li>
                    <a href="{{ @URL::to('/dashboard') }}">
                        <i class="material-icons">home</i>
                        <span>Dasbor</span>
                    </a>
                </li>
                @if (Session::get('stmik_adm_level') == 'Administrator')
                <li class="header">Pengguna</li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>Data User</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/allUser') }}">Semua User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>Data Staff</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/allStaff') }}">Semua Staff</a>
                        </li>
                        <li>
                            <a href="{{ @URL::to('/addStaff') }}">Tambah Staff</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>Data Pimpinan</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/allLeader') }}">Semua Pimpinan</a>
                        </li>
                        <li>
                            <a href="{{ @URL::to('/addLeader') }}">Tambah Pimpinan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>Data Pendidikan</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/addPendidikan') }}">Tambah/Ubah Pendidikan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>Data Jabatan Fungsional</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/addPendidikan') }}">Tambah/Ubah Jabatan Fungsional</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="header">Menu Utama</li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">library_books</i>
                        <span>Data Artikel</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/listPost') }}">Semua Artikel</a>
                        </li>
                        <li>
                            <a href="{{ @URL::to('/addPost') }}">Tambah Artikel</a>
                        </li>
                    </ul>
                </li>
                @if (Session::get('stmik_adm_level') == 'Administrator')
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">label_outline</i>
                        <span>Data Kategori</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/allCategory') }}">Semua Kategori</a>
                        </li>
                        <li>
                            <a href="{{ @URL::to('/addCategory') }}">Tambah Kategori</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">date_range</i>
                        <span>Data Agenda</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/allAgenda') }}">Semua Agenda</a>
                        </li>
                        <li>
                            <a href="{{ @URL::to('/addAgenda') }}">Tambah Agenda</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">today</i>
                        <span>Data Kalender Akademik</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/allKA') }}">Semua Kalender Akademik</a>
                        </li>
                        <li>
                            <a href="{{ @URL::to('/addKA') }}">Tambah Acara/Schedule</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">attach_file</i>
                        <span>Data Dokumen</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="{{ @URL::to('/allDokumen') }}">Semua Dokumen</a>
                        </li>
                        <li>
                            <a href="{{ @URL::to('/addDokumen') }}">Tambah Dokumen</a>
                        </li>
                    </ul>
                </li>
                <li class="header">Lainnya</li>
                <li>
                    <a href="{{ @URL::to('/log') }}">
                        <i class="material-icons">history</i>
                        <span>Log Aktivitas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ @URL::to('/log_visitor') }}">
                        <i class="material-icons">history</i>
                        <span>Log Visitor</span>
                    </a>
                </li>
                <li>
                    <a href="{{ @URL::to('/logout') }}">
                        <i class="material-icons">input</i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2021 <a href="javascript:void(0);">STMIK Bandung</a>.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>