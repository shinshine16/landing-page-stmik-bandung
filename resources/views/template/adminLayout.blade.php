<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>
        Admin Panel STMIK Bandung
    </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/core-img/logo.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.css') }}">

    <!-- Waves -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/node-waves/waves.css') }}">

    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/animate-css/animate.css') }}">

    <!-- JQuery DataTable Css -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Croppie CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/themes/all-themes.css') }}">

    <style>
        .sidebar .menu .list a {
            padding: 2px 13px;
        }
        .sidebar .menu .list .ml-menu li a {
            padding-top: 4px;
            padding-bottom: 4px;
        }
    </style>

</head>

<body class="theme-blue">
    @include('template.adminHeader')

    @yield('admincontent')

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves JS -->
    <script src="{{ asset('assets/admin/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!--
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    -->

    <!-- CKEditor JS -->
    <script src="{{ asset('assets/admin/plugins/ckeditor5/build/ckeditor.js') }}"></script>

    <!-- Croppie JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
    @yield('js')

    <!-- Demo JS -->
    <script src="{{ asset('assets/admin/js/demo.js') }}"></script>

    <!-- Editor JS -->
    <script src="{{ asset('assets/admin/js/editor.js') }}"></script>

</body>