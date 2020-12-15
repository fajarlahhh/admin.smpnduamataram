@extends('frontend.pages.main')

@section('subcontent')
<!--Start about area-->
<section class="about-area">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="about-text">
                    <div class="sec-title">
                        <div class="title">Kalender Akademik<br><span>SMPN 2 Mataram</span></div>
                    </div>
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="additional-info-content-box">
                                    <div class="accordion-box">
                                        <!--Start single accordion box-->
                                        <div class="accordion accordion-block">
                                            <div class="accord-btn active">
                                                <h4>Kalender Akademik</h4>
                                            </div>
                                            <div class="accord-content">
                                                @foreach ($data as $index => $row)
                                                    <p>{{ ++$index.". ".$row->kalender_akademik_tanggal }} - {{ $row->kalender_akademik_uraian }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!--End single accordion box-->
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
