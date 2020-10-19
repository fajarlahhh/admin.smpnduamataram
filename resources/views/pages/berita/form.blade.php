@extends('pages.main')

@section('title', ' | '.$aksi.' Berita')

@push('css')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Berita</li>
<li class="breadcrumb-item active">{{ $aksi }} Berita</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Berita</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('berita.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->berita_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Judul Berita</label>
                                        <input class="form-control" type="text" name="berita_judul" value="{{ old('berita_judul')? old('berita_judul'): ($aksi == "Edit"? $data->berita_judul: "") }}" autocomplete="off" id="berita_judul" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Isi Berita</label>
                                        <textarea class="textarea" name="berita_isi">{{ old('berita_isi')? old('berita_isi'): ($aksi == "Edit"? $data->berita_isi: "") }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="control-label">Kategori</label>
                                        <select class="form-control selectpicker" name="kategori_berita_id" data-live-search="true" data-style="btn-aqua" data-size="3" data-width="100%">
                                            <option value="">-- Tidak Ada Kategori --</option>
                                            @foreach($kategori as $row)
                                            @php
                                                $selected = '';
                                                if($aksi == 'Edit'){
                                                    if ($data->kategori_berita_id == $row->kategori_berita_id) {
                                                        $selected =  'selected';
                                                    }
                                                }else{
                                                    if(old('kategori_berita_id') == $row->kategori_berita_id){
                                                        $selected =  'selected';
                                                    }
                                                }
                                            @endphp
                                            <option value="{{ $row->kategori_berita_id }}" {{ $selected }}>{{ $row->kategori_berita_uraian }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gambar Utama</label>
                                        <input class="form-control" type="file" name="berita_gambar" accept="image/x-png,image/gif,image/jpeg" {{ $aksi == "Edit"? "": "required" }} autocomplete="off" />
                                    </div>
                                    @if ($aksi == 'Edit')
                                    <a href="{{ $data->berita_gambar }}" target="_blank">Gambar Lama</a>
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
