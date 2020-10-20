@extends('pages.main')

@section('title', ' | '.$aksi.' Struktur Organisasi')

@section('page')
<li class="breadcrumb-item">Struktur Organisasi</li>
<li class="breadcrumb-item active">{{ $aksi }} Struktur Organisasi</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Struktur Organisasi</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('strukturorganisasi.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->struktur_organisasi_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label">Kategori</label>
                                        <select class="form-control selectpicker" name="struktur_organisasi_jabatan" data-live-search="true" data-style="btn-aqua" data-size="3" data-width="100%">
                                            @foreach($jabatan as $row)
                                            @php
                                                $selected = '';
                                                if($aksi == 'Edit'){
                                                    if ($data->struktur_organisasi_jabatan == $row) {
                                                        $selected =  'selected';
                                                    }
                                                }else{
                                                    if(old('struktur_organisasi_jabatan') == $row){
                                                        $selected =  'selected';
                                                    }
                                                }
                                            @endphp
                                            <option value="{{ $row }}" {{ $selected }}>{{ $row }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama Pejabat</label>
                                        <input class="form-control" type="text" name="struktur_organisasi_pejabat" value="{{ old('struktur_organisasi_pejabat')? old('struktur_organisasi_pejabat'): ($aksi == "Edit"? $data->struktur_organisasi_pejabat: "") }}" autocomplete="off" id="struktur_organisasi_pejabat" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">NIP</label>
                                        <input class="form-control" type="text" name="struktur_organisasi_pejabat_nip" value="{{ old('struktur_organisasi_pejabat_nip')? old('struktur_organisasi_pejabat_nip'): ($aksi == "Edit"? $data->struktur_organisasi_pejabat_nip: "") }}" autocomplete="off" id="struktur_organisasi_pejabat_nip" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Urutan</label>
                                        <input class="form-control" type="number" name="struktur_organisasi_urutan" value="{{ old('struktur_organisasi_urutan')? old('struktur_organisasi_urutan'): ($aksi == "Edit"? $data->struktur_organisasi_urutan: "") }}" autocomplete="off" id="struktur_organisasi_urutan" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Foto</label>
                                        <input class="form-control" type="file" name="struktur_organisasi_foto" accept="image/x-png,image/gif,image/jpeg" {{ $aksi == "Edit"? "": "required" }} autocomplete="off" />
                                    </div>
                                    @if ($aksi == 'Edit')
                                    <a href="{{ $data->struktur_organisasi_foto }}" target="_blank">Foto Lama</a>
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
