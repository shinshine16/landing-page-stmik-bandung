@extends('template.layout')

@section('content')
<style>
    .staff-characther {
        min-width: auto;
        padding: 0 10px;
    }
</style>
<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{ asset('assets/img/bg-img/stmikbdg-bg1.jpg') }}); height: 20vh;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $kategori }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        <?php

        use Illuminate\Support\Facades\DB;

        $char = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $charAJ = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $charKT = array('K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T');
        $charUZ = array('U', 'V', 'W', 'X', 'Y', 'Z');
        ?>

        <div class="row no-gutters">
            <div class="col-md-1 col-3 bg-blue text-light text-center py-2">
                List Staff
            </div>

            <div class="col-md-11 col-9 bg-yellow d-flex" style="overflow-x: auto;">
                <?php for ($i = 0; $i < count($char); $i++) { ?>
                    <button class="btn btn-link text-light" onclick="urutanStaff('{{ $char[$i] }}')">{{ $char[$i] }}</button>
                <?php } ?>
            </div>

            <div class="col-12 mt-3">
                <div class="progress rounded-0" style="height: 2.5vh;">
                    <div class="progress-bar progress-bar-striped bg-blue py-1" id="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters list-staff mb-100">

        </div>
    </div>
</section>
<!-- ##### Post Details Area End ##### -->

@endsection

@section('js')
<script>
    $(function() {
        urutanStaff('A');
    });

    function urutanStaff(id) {
        $('#progress-bar').html('<i class="fas fa-circle-notch fa-spin"></i>');
        document.getElementById('progress-bar').classList.add('progress-bar-animated');

        $.ajax({
            type: "GET",
            url: "/staff/" + id,
            data: {},
            success: function(data) {
                $('#progress-bar').html(null);
                document.getElementById('progress-bar').classList.remove('progress-bar-animated');
                $('.list-staff').html(data);
            }
        });
    }
</script>
@endsection