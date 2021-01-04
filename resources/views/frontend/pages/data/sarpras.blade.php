@extends('frontend.pages.main')

@section('subcontent')
<!--Start breadcrumb area-->
<section class="breadcrumb-area style2" style="background-image: url(assets/frontend/images/resources/breadcrumb-bg-2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content-box clearfix">
                    <div class="title-s2 text-center">

                        <h1>Fasilitas & Sarana Prasarana Sekolah</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start Main project area-->
<section class="main-project-area">
    <div class="container">
        <ul class="project-filter post-filter has-dynamic-filters-counter">
            <li data-filter=".filter-item" class="active"><span class="filter-text">Semua fasilitas</span></li>
            @foreach ($kategori as $row)
            <li data-filter=".{{ $row->fasilitas_kategori }}"><span class="filter-text">{{ $row->fasilitas_kategori }}</span></li>
            @endforeach

        </ul>
        <div class="row filter-layout masonary-layout">
            @foreach ($data as $row)
            <!--Start single project item-->
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 filter-item {{ $row->fasilitas_kategori }}">
                <div class="single-project-style4">
                    <div class="img-holder">
                        <div class="inner">
                            <img src="{{ $row->fasilitas_gambar }}" alt="Awesome Image">
                            <div class="overlay-box">
                                <div class="box">
                                    <div class="link">
                                        <a href="project-single.html"><span class="icon-out"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overlay-content">
                            <div class="title">
                                <h3><a href="#">{{ $row->fasilitas_judul }}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single project item-->
            @endforeach
        </div>
    </div>
</section>
<!--End Main project area-->
@endsection
