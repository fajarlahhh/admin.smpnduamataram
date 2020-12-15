@extends('frontend.pages.main')

@section('subcontent')
<!--Start about area-->
<section class="about-area">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="about-text">
                    <div class="sec-title">
                        <div class="title">UPLOAD BAHAN AJAR<br><span>KELAS {{ $kelas }} SMPN 2 Mataram</span></div>
                    </div>
                    <div class="inner-content">
                        <div class="row">
                            @foreach ($data as $row)
                            <div class="col-xl-4 col-lg-4">
                                <div class="single-working-box wow fadeInDown" data-wow-delay="400ms">
                                    <div>
                                        <div class="inner">
                                            {!! $row->video_link !!}
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="plus-icon-box"><span class="icon-plus"></span></div>
                                        <div class="outer-box">
                                            <div class="icon">
                                                <div class="inner">
                                                    <div class="box">
                                                        <span class="icon-shop"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h3>{{ $row->video_judul }}</h3>
                                                <p>{{ $row->video_uraian }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--End about Area-->
@endsection



