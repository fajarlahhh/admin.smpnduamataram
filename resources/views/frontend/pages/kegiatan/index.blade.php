@extends('frontend.pages.main')

@section('subcontent')

<!--Start Main project area-->
<section class="main-project-area">
    <div class="container">
        <ul class="project-filter post-filter has-dynamic-filters-counter">
            <li data-filter=".filter-item" class="active"><span class="filter-text">Semua Kegiatan</span></li>
            @foreach ($kategori as $row)
            <li data-filter=".kegiatan{{ $row->kategori_kegiatan_id }}"><span class="filter-text">{{ $row->kategori_kegiatan_uraian }}</span></li>
            @endforeach

        </ul>
        <div class="row filter-layout masonary-layout">
            @foreach ($data as $row)
            <!--Start single project item-->
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 filter-item kegiatan{{ $row->kategori_kegiatan_id }}">
                <div class="single-project-style4">
                    <div class="img-holder">
                        <div class="inner">
                            <img src="{{ $row->kegiatan_gambar }}" alt="Awesome Image">
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
                                <h3><a href="#">{{ $row->kegiatan_nama }}</a></h3>
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
