@extends('frontend.pages.main')

@section('subcontent')
<!--Start about area-->
<section class="about-area">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="about-text">
                    <div class="sec-title">
                        <div class="title">Data Guru Honorer<br><span>SMPN 2 Mataram</span></div>
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
                                                <h4>Guru {{ $row->mapel_nama }}</h4>
                                            </div>
                                            <div class="accord-content">
                                                @foreach ($row->tenaga_pendidik as $guru)
                                                <p>{{ $guru->tenaga_pendidik_nama }}<br>
                                                NIP : {{ $guru->tenaga_pendidik_nip }}</p>
                                                <hr>
                                                @endforeach
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
