@extends('frontend.pages.main')

@section('subcontent')
<!--Start about area-->
<section class="about-area">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="about-text">
                    <div class="sec-title">
                        <div class="title">Struktur Organisasi<br><span>SMPN 2 Mataram</span></div>
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
                                                <h4>{{ $row->struktur_organisasi_jabatan }}</h4>
                                            </div>
                                            <div class="accord-content">
                                                <p>{{ $row->struktur_organisasi_pejabat }}
                                                    <br>NIP : {{ $row->struktur_organisasi_pejabat_nip }}</p>
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
