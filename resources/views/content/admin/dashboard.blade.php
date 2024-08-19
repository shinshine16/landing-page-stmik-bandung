<?php

use App\Http\Controllers\AdminController;
?>
@extends('template.adminLayout')

@section('admincontent')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dasbor</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-2 bg-blue">
                    <div class="icon">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="content">
                        <div class="text">Visitor</div>
                        <div class="number count-to" data-from="0" data-to="{{ $visitorCount }}" data-speed="1000" data-fresh-interval="5">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-2 bg-light-blue">
                    <div class="icon">
                        <i class="material-icons">library_books</i>
                    </div>
                    <div class="content">
                        <div class="text">Artikel</div>
                        <div class="number count-to" data-from="0" data-to="{{ $postCount }}" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-2 bg-blue">
                    <div class="icon">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="content">
                        <div class="text">Agenda</div>
                        <div class="number count-to" data-from="0" data-to="{{ $agendaCount }}" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-2 bg-light-blue">
                    <div class="icon">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="content">
                        <div class="text">Pimpinan</div>
                        <div class="number count-to" data-from="0" data-to="{{ $pimpinanCount }}" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="body">
                        <canvas id="graphVisitorPerMinggu" height="auto"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body bg-indigo">
                        <div class="font-bold m-b--35">Total Visitor</div>
                        <ul class="dashboard-stat-list">
                            <li>
                                Hari Ini
                                <span class="pull-right"><b><?= AdminController::TotalVisitor(0) ?></b> <small>Pengguna</small></span>
                            </li>
                            <li>
                                Minggu Ini
                                <span class="pull-right"><b><?= AdminController::TotalVisitor(5) ?></b> <small>Pengguna</small></span>
                            </li>
                            <li>
                                Bulan Ini
                                <span class="pull-right"><b><?= AdminController::TotalVisitor(6) ?></b> <small>Pengguna</small></span>
                            </li>
                            <li>
                                Tahun Ini
                                <span class="pull-right"><b><?= AdminController::TotalVisitor(7) ?></b> <small>Pengguna</small></span>
                            </li>
                            <hr style="margin-bottom: 0;"/>
                            <li>
                                Kemarin
                                <span class="pull-right"><b><?= AdminController::TotalVisitor(1) ?></b> <small>Pengguna</small></span>
                            </li>
                            <li>
                                Minggu Lalu
                                <span class="pull-right"><b><?= AdminController::TotalVisitor(2) ?></b> <small>Pengguna</small></span>
                            </li>
                            <li>
                                Bulan Lalu
                                <span class="pull-right"><b><?= AdminController::TotalVisitor(3) ?></b> <small>Pengguna</small></span>
                            </li>
                            <li>
                                Tahun Lalu
                                <span class="pull-right"><b><?= AdminController::TotalVisitor(4) ?></b> <small>Pengguna</small></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="body bg-blue">
                        <div class="m-b--35 font-bold">Log Aktivitas</div>
                        <ul class="dashboard-stat-list" style="font-size: 12px;">
                            @foreach ($logPost as $log)
                            <li>
                                {{ $log->log_date_created }}
                                <span class="pull-right">
                                    <b>{{ $log->log_user }}</b> <?= $log->log_message; ?>
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body bg-orange">
                        <ul class="dashboard-stat-list" style="margin-top: 0;">
                            <li>
                                User
                                <span class="pull-right"><b>{{ Session::get('stmik_adm_user') }}</b></span>
                            </li>
                            <li>
                                Level
                                <span class="pull-right"><b>{{ Session::get('stmik_adm_level') }}</b></span>
                            </li>
                            <li>
                                IP Address
                                <span class="pull-right"><b>{{ $ip }}</b></span>
                            </li>
                            <li>
                                User Agent
                                <span class="pull-right"><b>{{ Str::substr($userAgent, 0, 20) }}...</b></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('assets/admin/plugins/jquery-countto/jquery.countTo.js') }}"></script>
<!-- Chart JS-->
<script src="{{ asset('assets/admin/plugins/chartjs/Chart.bundle.js') }}"></script>

<script>
    $(function() {
        initCounters();
        initCharts();
    });

    //Widgets count plugin
    function initCounters() {
        $('.count-to').countTo();
    }

    function initCharts() {
        var graphVisitor = document.getElementById('graphVisitorPerMinggu').getContext('2d');
        var label = <?= AdminController::GraphVisitorPerWeek('label') ?>;
        var data = <?= AdminController::GraphVisitorPerWeek('data') ?>;

        var chart = new Chart(graphVisitor, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: label,
                datasets: [{
                    label: 'Pengunjung/Visitor',
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 0.6)',
                    fill: true,
                    data: data
                }]
            },

            // Configuration options go here
            options: {
                title: {
                    display: true,
                    text: 'Grafik Total Visitor/Pengunjung Perminggu Tahun <?= date('Y') ?>'
                }
            }
        });
    }
</script>
@endsection