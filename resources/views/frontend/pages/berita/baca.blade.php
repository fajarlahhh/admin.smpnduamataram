@extends('frontend.pages.main')

@section('subcontent')
<!--Start Single Post Info Area-->
<section class="single-post-info-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-post-info-content text-center">
                    <div class="meta-box">
                        <ul class="meta-info">
                            <li>Oleh <a href="#">{{ $data->berita_author }}</a></li>
                            <li>Tanggal <a href="#">{!! $data->created_at !!}</a></li>
                            <li>In <a href="#">{{ $data->kategori? $data->kategori->kategori_berita_uraian: '-' }}</a></li>
                        </ul>
                    </div>
                    <h1 class="blog-title">{{ $data->berita_judul }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Single Post Info Area-->

<!--Start blog single area-->
<section id="blog-area" class="blog-single-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                <div class="blog-post">
                    <div class="single-blog-post">
                        <div class="main-image-box">
                            <img src="{{ $admin.$data->berita_gambar }}" alt="Awesome Image">
                        </div>
                        <div class="top-text-box">
                            {!! $data->berita_isi !!}
                        </div>
                    </div>
                </div>
            </div>

            <!--Start sidebar Wrapper-->
            <div class="col-xl-3 col-lg-4 col-md-7 col-sm-12">
                <div class="sidebar-wrapper">
                    <div class="sidebar-search-box">
                        <form class="search-form" action="/berita">
                            <input placeholder="Your Keyword..." type="text" name="cari">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <!--Start single sidebar-->
                    <div class="single-sidebar categories-box">
                        <div class="sidebar-title">
                            <div class="title">Categories</div>
                        </div>
                        <ul class="categories clearfix">
                            @foreach ($kategori as $row)
                            <li><a href="#">{{ $row->kategori_berita_uraian }}<sup>({{ $row->berita->count() }})</sup></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--End single sidebar-->
                    <!--Start single sidebar-->
                    <div class="single-sidebar">
                        <div class="sidebar-title">
                            <div class="title">Recent Post</div>
                        </div>
                        <ul class="recent-post">
                            @foreach ($terbaru as $row)
                            <li>
                                <div class="img-holder">
                                    <img src="{{ $admin.$row->berita_gambar }}" alt="Awesome Image">
                                    <div class="overlay-style-one">
                                        <div class="box">
                                            <div class="content">
                                                <a href="#"><span class="icon-link"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-holder">
                                    <span>{!! $row->created_at !!}</span>
                                    <h5 class="post-title"><a href="/berita?id={{ $row->berita_id }}">{{ $row->berita_judul }}</a></h5>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--End single sidebar-->
                </div>
            </div>
            <!--End Sidebar Wrapper-->


        </div>
    </div>

</section>
<!--End blog single area-->

@endsection
