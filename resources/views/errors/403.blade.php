<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>
        403 - Sekolah Tinggi Manajemen Informatika &amp; Komputer Bandung (STMIK Bandung)
    </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/core-img/logo.png') }}">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('core/public/style.css') }}">

</head>

<body class="bg-blue">
    @include('template.preloader')
    <section class="section-padding-50-0 mt-50 mb-50 wow fadeInUp" data-wow-delay="100ms">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-50 mb-50 text-center">
                    <h1 class="text-light mb-5 wow fadeInUp" data-wow-delay="100ms" style="font-size: 100px">403</h1>
                    <hr class="bg-yellow wow fadeInUp" data-wow-delay="150ms" />
                </div>
                <div class="col-12 text-center">
                    <h4 class="text-light wow fadeInLeft" data-wow-delay="200ms">Halaman Ini Dilarang</h4>
                    <p class="text-light wow fadeInRight" data-wow-delay="200ms">Maaf, halaman yang Anda minta tidak bisa dibuka.</p>
                    <a href="{{ @URL::to('/') }}" class="btn credit-btn btn-2 m-2 wow fadeInDown" data-wow-delay="300ms">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('assets/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('assets/js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/js/active.js') }}"></script>
    <!-- Ionicons js -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
