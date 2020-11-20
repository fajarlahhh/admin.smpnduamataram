@extends('pages.main')

@section('title', ' | '.$aksi.' Sarana Prasarana')

@section('page')
<li class="breadcrumb-item">Sarana Prasarana</li>
<li class="breadcrumb-item active">{{ $aksi }} Sarana Prasarana</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Sarana Prasarana</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('fasilitas.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->fasilitas_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Judul</label>
                                        <input class="form-control" type="text" name="fasilitas_judul" value="{{ old('fasilitas_judul')? old('fasilitas_judul'): ($aksi == "Edit"? $data->fasilitas_judul: "") }}" autocomplete="off" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Kategori</label>
                                        <input class="form-control" type="text" name="fasilitas_kategori" value="{{ old('fasilitas_kategori')? old('fasilitas_kategori'): ($aksi == "Edit"? $data->fasilitas_kategori: "") }}" autocomplete="off" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gambar</label>
                                        <input class="form-control" type="file" name="fasilitas_gambar" accept="image/x-png,image/gif,image/jpeg" {{ $aksi == "Edit"? "": "required" }} autocomplete="off" />
                                    </div>
                                    @if ($aksi == 'Edit')
                                    <a href="{{ $data->fasilitas_gambar }}" target="_blank">Gambar Lama</a>
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
