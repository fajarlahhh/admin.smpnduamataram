@extends('frontend.pages.main')

@section('subcontent')
<!--Start breadcrumb area-->
<section class="breadcrumb-area style2" style="background-image: url(assets/frontend/images/resources/breadcrumb-bg-2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content-box clearfix">
                    <div class="title-s2 text-center">

                        <h1>Denah Sekolah</h1>
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
        <img src="{!! $admin.$data->halaman_gambar !!}" alt="" width="100%">
    </div>
</section>
<!--End Main project area-->
@endsection
