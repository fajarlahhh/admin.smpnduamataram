@extends('pages.main')

@section('title', ' | '.$aksi.' Kategori Berita')

@section('page')
<li class="breadcrumb-item">Kategori Berita</li>
<li class="breadcrumb-item active">{{ $aksi }} Kategori Berita</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Kategori Berita</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('kategoriberita.simpan') }}" method="post">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->kategori_berita_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Berita</label>
                                        <input class="form-control" type="text" name="kategori_berita_uraian" value="{{ old('kategori_berita_uraian')? old('kategori_berita_uraian'): ($aksi == "Edit"? $data->kategori_berita_uraian: "") }}" autocomplete="off" id="kategori_berita_uraian" data-parsley-minlength="2" required />
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
