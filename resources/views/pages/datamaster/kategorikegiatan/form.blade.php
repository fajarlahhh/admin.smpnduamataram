@extends('pages.main')

@section('title', ' | '.$aksi.' Kategori Kegiatan')

@section('page')
<li class="breadcrumb-item">Kategori Kegiatan</li>
<li class="breadcrumb-item active">{{ $aksi }} Kategori Kegiatan</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Kategori Kegiatan</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('kategorikegiatan.simpan') }}" method="post">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->kategori_kegiatan_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Kegiatan</label>
                                        <input class="form-control" type="text" name="kategori_kegiatan_uraian" value="{{ old('kategori_kegiatan_uraian')? old('kategori_kegiatan_uraian'): ($aksi == "Edit"? $data->kategori_kegiatan_uraian: "") }}" autocomplete="off" id="kategori_kegiatan_uraian" data-parsley-minlength="2" required />
                                    </div>
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
