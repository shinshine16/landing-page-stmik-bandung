@extends('template.layout')

@section('content')

<!-- ##### News Area Start ##### -->
<section class="news-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-heading text-center">
                            <div class="line"></div>
                            <p>STMIK Bandung</p>
                            <h2>{{ $title }} Admin/Staff</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{ @URL::to('/auth') }}">
                            {{ csrf_field() }}
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <input type="text" class="form-control rounded-0" placeholder="Username" name="user" style="font-size: 13px;" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <input type="password" class="form-control rounded-0" placeholder="Password" name="pass" style="font-size: 13px;" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <button type="submit" class="btn btn-block credit-btn btn-2 box-shadow mt-2">Masuk</button>
                        </form>
                        @if (Session::get('action') == 'error')
                        <div class="alert alert-danger mt-3">
                            {{ Session::get('result') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### News Area End ##### -->

@endsection