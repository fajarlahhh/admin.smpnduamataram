@extends('pages.main')

@section('title', ' | '.$aksi.' Ekstrakurikuler')

@push('css')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Ekstrakurikuler</li>
<li class="breadcrumb-item active">{{ $aksi }} Ekstrakurikuler</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Ekstrakurikuler</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('ekskul.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->ekskul_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Nama Ekstrakurikuler</label>
                                        <input class="form-control" type="text" name="ekskul_nama" value="{{ old('ekskul_nama')? old('ekskul_nama'): ($aksi == "Edit"? $data->ekskul_nama: "") }}" autocomplete="off" id="ekskul_nama" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Uraian</label>
                                        <textarea class="textarea" name="ekskul_uraian">{{ old('ekskul_uraian')? old('ekskul_uraian'): ($aksi == "Edit"? $data->ekskul_uraian: "") }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gambar Utama</label>
                                        <input class="form-control" type="file" name="ekskul_foto" accept="image/x-png,image/gif,image/jpeg" {{ $aksi == "Edit"? "": "required" }} autocomplete="off" />
                                    </div>
                                    @if ($aksi == 'Edit')
                                    <a href="{{ $data->ekskul_foto }}" target="_blank">File Lama</a>
                                    @endif
                                    @include('includes.component.error')
                                </div>
                            </div>
                        </div>
                        <div class="card-footer form-inline">
                            <input type="submit" value="Simpan" class="btn btn-sm btn-success"/>
                            &nbsp;
                            <a href="{{ $back }}" class="btn btn-sm btn-danger">Batal</a>
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
            height: 400
        })
    })
</script>
@endpush
