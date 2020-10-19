@extends('pages.main')

@section('title', ' | '.$aksi.' Prestasi')

@section('page')
<li class="breadcrumb-item">Prestasi</li>
<li class="breadcrumb-item active">{{ $aksi }} Prestasi</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Prestasi</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('prestasi.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->prestasi_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Judul</label>
                                        <input class="form-control" type="text" name="prestasi_judul" value="{{ old('prestasi_judul')? old('prestasi_judul'): ($aksi == "Edit"? $data->prestasi_judul: "") }}" autocomplete="off" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="control-label">Kategori</label>
                                        <select class="form-control selectpicker" name="prestasi_kategori" data-live-search="true" data-style="btn-aqua" data-size="3" data-width="100%">
                                            @foreach($kategori as $row)
                                            @php
                                                $selected = '';
                                                if($aksi == 'Edit'){
                                                    if ($data->prestasi_kategori == $row) {
                                                        $selected =  'selected';
                                                    }
                                                }else{
                                                    if(old('prestasi_kategori') == $row){
                                                        $selected =  'selected';
                                                    }
                                                }
                                            @endphp
                                            <option value="{{ $row }}" {{ $selected }}>{{ $row }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gambar</label>
                                        <input class="form-control" type="file" name="prestasi_gambar" accept="image/x-png,image/gif,image/jpeg" {{ $aksi == "Edit"? "": "required" }} autocomplete="off" />
                                    </div>
                                    @if ($aksi == 'Edit')
                                    <a href="{{ $data->prestasi_gambar }}" target="_blank">Gambar Lama</a>
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
