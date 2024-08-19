<?php
use App\Http\Controllers\LandingPageController;
?>

@extends('template.layout')

@section('content')
@include('components.breadcrumb')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 mt-5">
            <div class="news--area mb-100">
                <div class="border">
                    <table style="width: 100%; font-size: 13px;">
                        <tr bgcolor="#003679" class="py-1">
                            <td align="center" class="text-warning py-2">Minggu</td>
                            <td align="center" class="text-light py-2">Senin</td>
                            <td align="center" class="text-light py-2">Selasa</td>
                            <td align="center" class="text-light py-2">Rabu</td>
                            <td align="center" class="text-light py-2">Kamis</td>
                            <td align="center" class="text-light py-2">Jumat</td>
                            <td align="center" class="text-light py-2">Sabtu</td>
                        </tr>
                        <?= LandingPageController::SetKalenderAkademik(date('d'), date('m'), date('Y')) ?>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center mt-2 px-3">

                            <div class="col-1 py-1" style="background-color: #003679;"></div>
                            <div class="col-5">
                                Perayaan Ulang Tahun STMIK
                            </div>

                            <div class="col-1 py-1" style="background-color: #7F2AFF;"></div>
                            <div class="col-5">
                                Perayaan Ulang Tahun STMIK
                            </div>

                            <div class="col-1 py-1" style="background-color: #FFAA7F;"></div>
                            <div class="col-5">
                                Perayaan Ulang Tahun STMIK
                            </div>

                            <div class="col-1 py-1" style="background-color: #FF55FF;"></div>
                            <div class="col-5">
                                Perayaan Ulang Tahun STMIK
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
