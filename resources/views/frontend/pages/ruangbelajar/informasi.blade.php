@extends('frontend.pages.main')

@section('subcontent')
<!--Start about area-->
<section class="about-area">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="about-text">
                    <div class="sec-title">
                        <div class="title">INFORMASI<br><span>SMPN 2 Mataram</span></div>
                    </div>
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="additional-info-content-box">
                                    <div class="accordion-box">
                                        @foreach ($data as $row)
                                        <!--Start single accordion box-->
                                        <div class="accordion accordion-block">
                                            <div class="accord-btn active">
                                                <h4>{{ $row->posting_judul }}</h4>
                                            </div>
                                            <div class="accord-content">
                                                {!! $row->posting_uraian !!}
                                                <br>
                                                <div class="text-center">

                                                <a href="{{ $row->posting_file }}" class="btn btn-primary">Download File</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End single accordion box-->
                                        @endforeach

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
<!--End about Area-->
@endsection
