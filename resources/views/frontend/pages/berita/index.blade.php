@extends('frontend.pages.main')

@section('subcontent')
   <!--Start blog area-->
<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            @foreach ($data as $row)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <!--Start single blog post-->
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
                            <h3><span>{!! $row->created_at !!}</span></h3>
                        </div>
                        <h3 class="blog-title"><a href="berita?id={{ $row->berita_id }}">{{ $row->berita_judul }}</a></h3>
                        <div class="meta-box">
                            <ul class="meta-info">
                                <li>By <a href="#">{{ $row->berita_author }}</a></li>
                                <li><a href="#">{{ $row->kategori? "In ".$row->kategori->kategori_berita_uraian: '' }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--End single blog post-->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--End blog area-->

@endsection
