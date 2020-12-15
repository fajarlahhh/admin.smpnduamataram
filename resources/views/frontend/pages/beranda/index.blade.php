@extends('frontend.pages.main')

@section('subcontent')
@include('frontend.includes.carousel')
<!--Start Highlights Area-->
<section class="highlights-area">
    <div class="container">
        <div class="row">
            <!--Start single highlight box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-highlight-box text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1200ms">
                    <div class="icon-holder">
                        <span class="icon-concept"></span>
                    </div>
                    <div class="inner-content">
                        <div class="text">
                            <h3>Ekstrakurikuler</h3>
                            <p>Ragam ekstrakurikuler bagi peserta didik<br>yang dikembangkan oleh sekolah</p>
                        </div>
                        <a class="btn-one" href="/ekskul">Selengkapnya...<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
            <!--End single highlight box-->
            <!--Start single highlight box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-highlight-box text-center wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                    <div class="icon-holder">
                        <span class="icon-target"></span>
                    </div>
                    <div class="inner-content">
                        <div class="text">
                            <h3>Prestasi & Prestise</h3>
                            <p>Ragam prestasi yang diraih oleh sekolah<br> merupakan prestasi dan prestise</p>
                        </div>
                        <a class="btn-one" href="/prestasi">Selengkapnya...<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
            <!--End single highlight box-->
            <!--Start single highlight box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-highlight-box text-center wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1200ms">
                    <div class="icon-holder">
                        <span class="icon-productive"></span>
                    </div>
                    <div class="inner-content">
                        <div class="text">
                            <h3>Event / Kegiatan Sekolah</h3>
                            <p>Ragam kegiatan atau event yang diselenggarakan oleh sekolah.</p>
                        </div>
                        <a class="btn-one" href="/kegiatan">Selengkapnya...<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
            <!--End single highlight box-->
        </div>
    </div>
</section>
<!--End Highlights Area-->
<!--Start about area-->
<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="about-image-box">
                    <div class="inner-box">
                        <img src="{{ $profil->profil_gambar }}" alt="Awesome Image">
                        <div class="overlay">
                            <div class="box">

                            </div>
                        </div>
                    </div>
                    <div class="text-box">
                        <h3>{{ $kepalasekolah->struktur_organisasi_pejabat }} <br> <span>{{ $kepalasekolah->struktur_organisasi_jabatan }} SMPN 2 Mataram</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="about-text">
                    <div class="sec-title">
                        <p>Profil Sekolah</p>
                        <div class="title">Be a good quality<br> minded <span>person</span></div>
                    </div>
                    <div class="inner-content">
                        <div class="text">
                            {!! $profil->profil_uraian !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End about Area-->

<!--Start Working Area-->
<section class="working-area" style="background-image:url(assets/frontend/images/parallax-background/working-bg.jpg);">
    <div class="container">
        <div class="sec-title with-text max-width text-center wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1200ms">
            <p>Konsep Materi</p>
            <div class="title clr-white">Belajar Dari <span>Rumah</span></div>

        </div>
        <div class="row">
            @foreach ($video as $video)
            <!--Start Single Working Box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-working-box wow fadeInDown" data-wow-delay="0ms">
                    <div>
                        <div class="inner">
                            {!! $video->video_link !!}
                        </div>
                    </div>
                    <div class="text-holder">
                        <div class="plus-icon-box"><span class="icon-plus"></span></div>
                        <div class="outer-box">
                            <div class="icon">
                                <div class="inner">
                                    <div class="box">
                                        <span class="icon-architecture-and-city1"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h3>{{ $video->video_judul }}</h3>
                                <p>{{ $video->video_uraian }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Single Working Box-->
            @endforeach
            <!--Start Single Working Box-->
        </div>
    </div>
</section>

<section class="working-process-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="sec-title float-left">
                    <div class="title">Galeri</div>
                </div>
            </div>
            @foreach ($kegiatan as $row)
            <!--Start single blog post-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-blog-post wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="img-holder">
                        <img src="{{ $row->kegiatan_gambar }}" alt="Awesome Image">
                        <div class="overlay-style-two"></div>
                        <div class="overlay">
                            <div class="box">
                                <div class="link-icon">
                                    <a href="#"><span class="flaticon-zoom"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-holder">
                        <div class="meta-box">
                            <ul class="meta-info">
                                <li>{{ $row->kategori->kategori_kegiatan_uraian }}</li>
                                <li> <a href="#">{{ $row->kegiatan_nama }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single blog post-->
            @endforeach
        </div>
    </div>
</section>
<!--End slogan area-->


<!--Start latest blog area-->
<section class="latest-blog-area">
    <div class="container inner-content">
        <div class="sec-title text-center">
            <p>Informasi Terkini</p>
            <div class="title">Berita <span>Sekolah</span></div>
        </div>
        <div class="row">
            @foreach ($berita as $row)
            <!--Start single blog post-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-blog-post wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="img-holder">
                        <img src="{{ $row->berita_gambar }}" alt="Awesome Image">
                        <div class="overlay-style-two"></div>
                        <div class="overlay">
                            <div class="box">
                                <div class="link-icon">
                                    <a href="#"><span class="flaticon-zoom"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-holder">
                        <div class="post-date">
                                <h3>{!! $row->created_at !!}</h3>
                        </div>
                        <div class="meta-box">
                            <ul class="meta-info">
                            <li>Oleh <a href="#">: {{ $row->berita_author }}</a></li>
                                <li> <a href="#">SMPN 2 Mataram</a></li>
                            </ul>
                        </div>
                        <h3 class="blog-title"><a href="berita?id={{ $row->berita_id }}">{{ $row->berita_judul }}</a></h3>
                        <div class="text">
                            {!! $row->berita_isi_selengkapnya !!}
                        </div>
                    </div>
                </div>
            </div>
            <!--End single blog post-->
            @endforeach
        </div>
    </div>
</section>
<!--End latest blog area-->

<!--Start Brand area-->
<section class="brand-area">
    <div class="container">
        <div class="sec-title">

        </div>
        <div class="row">
            <div class="col-xl-12">
                <ul class="brand-items-carousel owl-carousel owl-theme">
                    <!--Start Single Brand Item-->
                    <li class="single-brand-item wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <a href="#"><img src="assets/frontend/images/brand/1.png" alt="Awesome Brand Image"></a>
                        <div class="overlay-content">
                            <p>Kemdikbud RI</p>
                        </div>
                    </li>
                    <!--End Single Brand Item-->
                    <!--Start Single Brand Item-->
                    <li class="single-brand-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <a href="#"><img src="assets/frontend/images/brand/2.png" alt="Awesome Brand Image"></a>
                        <div class="overlay-content">
                            <p>Pemprov NTB</p>
                        </div>
                    </li>
                    <!--End Single Brand Item-->
                    <!--Start Single Brand Item-->
                    <li class="single-brand-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <a href="#"><img src="assets/frontend/images/brand/3.png" alt="Awesome Brand Image"></a>
                        <div class="overlay-content">
                            <p>Pemkot Mataram</p>
                        </div>
                    </li>
                    <!--End Single Brand Item-->
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Brand area-->
@endsection
