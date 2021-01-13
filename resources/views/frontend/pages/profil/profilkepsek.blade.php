@extends('frontend.pages.main')

@section('subcontent')
<!--Start about area-->
<section class="about-area">
    @if ($data)
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="about-image-box">
                    <div class="inner-box">
                        <img src="{{ $data->profil_gambar }}" alt="Awesome Image">
                        <div class="overlay">
                            <div class="box">

                            </div>
                        </div>
                    </div>
                    <div class="text-box">
                        <h3>{{ $struktur->struktur_organisasi_pejabat }}, <span>Kepala SMPN 2 Mataram</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="about-text">
                    <div class="sec-title">
                        <div class="title">Kepala Sekolah</div>
                    </div>
                    <div class="inner-content">
                        <div class="text">
                            {!! $data->profil_uraian !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif
</section>
<!--End about Area-->
@endsection
