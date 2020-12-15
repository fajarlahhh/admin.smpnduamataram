@extends('frontend.pages.main')

@section('subcontent')

<!--Start Main project area-->
<section class="main-project-area">
    <div class="container">
        <div class="row filter-layout masonary-layout">
            @foreach ($data as $index => $row)
            <!--Start single project item-->
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 filter-item {{ $index }}">
                <div class="single-project-style4">
                    <div class="img-holder">
                        <div class="inner">
                            <img src="{{ $row->ekskul_foto }}" alt="Awesome Image">
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
                                <h3><a href="#">{{ $row->ekskul_nama }}</a></h3>
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
