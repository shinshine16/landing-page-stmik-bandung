@extends('template.layout')

@section('content')
@include('components.title')
<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area mt-5">
    <div class="container">
        <div class="row mb-100">
            <!-- Post Details Content Area -->
            <div class="col-12" align="center">
                <div class="post-details-content mb-50">
                    <img src="{{ asset('assets/img/bg-img/SB.png') }}" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Post Details Area End ##### -->

@endsection