@extends('pages.main')

@section('title', ' | Denah Sekolah')

@push('css')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Data Sekolah</li>
<li class="breadcrumb-item active">Denah Sekolah</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">Denah Sekolah</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('denahsekolah.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="halaman_jenis" value="denahsekolah" required />
                                    <div class="form-group">
                                        <label class="control-label">Gambar Denah</label>
                                        <input class="form-control" type="file" name="halaman_gambar" accept="image/x-png,image/gif,image/jpeg" required autocomplete="off" />
                                    </div>
                                    @if ($data)
                                    <img src="{{ $data->halaman_gambar }}" alt="">
                                    @endif
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
