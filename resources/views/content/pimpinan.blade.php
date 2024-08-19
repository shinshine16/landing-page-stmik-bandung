@extends('template.layout')

@section('content')
@include('components.title')
<?php

use App\Http\Controllers\LandingPageController as LP; ?>
<!-- ##### Pimpinan Area Start ##### -->
<section class="team-area mt-5">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-12 py-5 mb-100">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-6 col-md-4 mt-4">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('761b3b421d', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <div class="section-heading text-dark">
                                        <div class="line"></div>
                                        <p>{{ LP::getPimpinan('761b3b421d', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold mb-3">{{ LP::getPimpinan('761b3b421d', 'pimpinan_name') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 mt-4">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('e6c6908020', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <div class="section-heading text-dark">
                                        <div class="line"></div>
                                        <p>{{ LP::getPimpinan('e6c6908020', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold mb-3">{{ LP::getPimpinan('e6c6908020', 'pimpinan_name') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 mt-4">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('acd792343c', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <div class="section-heading text-dark">
                                        <div class="line"></div>
                                        <p>{{ LP::getPimpinan('acd792343c', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold mb-3">{{ LP::getPimpinan('acd792343c', 'pimpinan_name') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 mt-4">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('d9c6a99872', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <div class="section-heading text-dark">
                                        <div class="line"></div>
                                        <p>{{ LP::getPimpinan('d9c6a99872', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold mb-3">{{ LP::getPimpinan('d9c6a99872', 'pimpinan_name') }}</div>
                                        {{ LP::getPimpinan('d9c6a99872', 'pimpinan_quote_' . $getLanguage) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div class="row justify-content-center mt-50 py-5 bg-blue">

            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center mb-50">
                    <div class="line"></div>
                    <p class="text-light">STMIK Bandung</p>
                    <h2 class="text-light">Wakil Ketua STMIK Bandung</h2>
                </div>
            </div>

            <div class="col-12">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-7 mt-4">
                            <div class="row justify-content-center" align="center">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('6c600ae5d0', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <div class="section-heading text-light">
                                        <div class="line"></div>
                                        <p class="text-light">{{ LP::getPimpinan('6c600ae5d0', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold text-light mb-3">{{ LP::getPimpinan('6c600ae5d0', 'pimpinan_name') }}</div>
                                        {{ LP::getPimpinan('6c600ae5d0', 'pimpinan_quote_' . $getLanguage) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mt-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('9a5fc59d89', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <div class="section-heading text-light">
                                        <div class="line"></div>
                                        <p class="text-light">{{ LP::getPimpinan('9a5fc59d89', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold text-light mb-3">{{ LP::getPimpinan('9a5fc59d89', 'pimpinan_name') }}</div>
                                        {{ LP::getPimpinan('9a5fc59d89', 'pimpinan_quote_' . $getLanguage) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mt-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('5d86297213', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <div class="section-heading text-light">
                                        <div class="line"></div>
                                        <p class="text-light">{{ LP::getPimpinan('5d86297213', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold text-light mb-3">{{ LP::getPimpinan('5d86297213', 'pimpinan_name') }}</div>
                                        {{ LP::getPimpinan('5d86297213', 'pimpinan_quote_' . $getLanguage) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="container">
            <div class="row justify-content-center mt-50 mb-100">

                <div class="col-lg-6">
                    <div class="section-heading mb-50">
                        <div class="line"></div>
                        <h5>Ketua Prodi</h5>
                    </div>

                    <div class="row justify-content-center">

                        <div class="col-12 mt-4">
                            <div class="row justify-content-center">
                                <div class="col-4 col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('8588e47604', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-8 col-lg-8">
                                    <div class="section-heading text-dark">
                                        <div class="line"></div>
                                        <p>{{ LP::getPimpinan('8588e47604', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold mb-3">{{ LP::getPimpinan('8588e47604', 'pimpinan_name') }}</div>
                                        {{ LP::getPimpinan('8588e47604', 'pimpinan_quote_' . $getLanguage) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="row justify-content-center">
                                <div class="col-4 col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('1378cc7154', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-8 col-lg-8">
                                    <div class="section-heading text-dark">
                                        <div class="line"></div>
                                        <p>{{ LP::getPimpinan('1378cc7154', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold mb-3">{{ LP::getPimpinan('1378cc7154', 'pimpinan_name') }}</div>
                                        {{ LP::getPimpinan('1378cc7154', 'pimpinan_quote_' . $getLanguage) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading mb-50">
                        <div class="line"></div>
                        <h5>Ketua LPPM</h5>
                    </div>

                    <div class="row justify-content-center">

                        <div class="col-12 mt-4">
                            <div class="row justify-content-center">
                                <div class="col-4 col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('99c5daf92f', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-8 col-lg-8">
                                    <div class="section-heading text-dark">
                                        <div class="line"></div>
                                        <p>{{ LP::getPimpinan('99c5daf92f', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold mb-3">{{ LP::getPimpinan('99c5daf92f', 'pimpinan_name') }}</div>
                                        {{ LP::getPimpinan('99c5daf92f', 'pimpinan_quote_' . $getLanguage) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading mb-50">
                        <div class="line"></div>
                        <h5>Kepala SDI</h5>
                    </div>

                    <div class="row justify-content-center">

                        <div class="col-12 mt-4">
                            <div class="row justify-content-center">
                                <div class="col-4 col-lg-4">
                                    <img src="{{ asset('assets/img/leader-img') }}/{{ LP::getPimpinan('5554d1f9ef', 'pimpinan_image') }}" />
                                </div>
                                <div class="col-8 col-lg-8">
                                    <div class="section-heading text-dark">
                                        <div class="line"></div>
                                        <p>{{ LP::getPimpinan('5554d1f9ef', 'pimpinan_jabatan_' . $getLanguage) }}</p>
                                        <div class="font-weight-bold mb-3">{{ LP::getPimpinan('5554d1f9ef', 'pimpinan_name') }}</div>
                                        {{ LP::getPimpinan('5554d1f9ef', 'pimpinan_quote_' . $getLanguage) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ##### Pimpinan Area End ##### -->

@endsection