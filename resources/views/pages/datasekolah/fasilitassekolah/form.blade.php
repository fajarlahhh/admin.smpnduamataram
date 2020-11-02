@extends('pages.main')

@section('title', ' | Fasilitas Sekolah')

@push('css')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Data Sekolah</li>
<li class="breadcrumb-item active">Fasilitas Sekolah</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">Fasilitas Sekolah</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('fasilitassekolah.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="halaman_jenis" value="fasilitassekolah" required />
                                    <div class="form-group">
                                        <label class="control-label">Judul</label>
                                        <input class="form-control" type="text" name="halaman_judul" value="{{ old('halaman_judul')? old('halaman_judul'): ($data ? $data->halaman_judul: "") }}" autocomplete="off" id="halaman_judul" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Uraian</label>
                                        <textarea class="textarea" name="halaman_uraian">{{ old('halaman_uraian')? old('halaman_uraian'): ($data ? $data->halaman_uraian: "") }}</textarea>
                                    </div>
                                    @include('includes.component.error')
                                </div>
                            </div>
                        </div>
                        <div class="card-footer form-inline">
                            <input type="submit" value="Simpan" class="btn btn-sm btn-success"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        $('.textarea').summernote({
            height: 300
        })
    })
</script>
@endpush
