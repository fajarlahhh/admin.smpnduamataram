@extends('pages.main')

@section('title', ' | '.$aksi.' Tata Usaha')

@section('page')
<li class="breadcrumb-item">Tata Usaha</li>
<li class="breadcrumb-item active">{{ $aksi }} Tata Usaha</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Tata Usaha</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('tatausaha.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->tata_usaha_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label">Kategori</label>
                                        <select class="form-control selectpicker" name="tata_usaha_jabatan" data-live-search="true" data-style="btn-aqua" data-size="3" data-width="100%">
                                            @foreach($jabatan as $row)
                                            @php
                                                $selected = '';
                                                if($aksi == 'Edit'){
                                                    if ($data->tata_usaha_jabatan == $row) {
                                                        $selected =  'selected';
                                                    }
                                                }else{
                                                    if(old('tata_usaha_jabatan') == $row){
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
                                        <input class="form-control" type="text" name="tata_usaha_pejabat" value="{{ old('tata_usaha_pejabat')? old('tata_usaha_pejabat'): ($aksi == "Edit"? $data->tata_usaha_pejabat: "") }}" autocomplete="off" id="tata_usaha_pejabat" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">NIP</label>
                                        <input class="form-control" type="text" name="tata_usaha_pejabat_nip" value="{{ old('tata_usaha_pejabat_nip')? old('tata_usaha_pejabat_nip'): ($aksi == "Edit"? $data->tata_usaha_pejabat_nip: "") }}" autocomplete="off" id="tata_usaha_pejabat_nip" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Foto</label>
                                        <input class="form-control" type="file" name="tata_usaha_foto" accept="image/x-png,image/gif,image/jpeg" {{ $aksi == "Edit"? "": "required" }} autocomplete="off" />
                                    </div>
                                    @if ($aksi == 'Edit')
                                    <a href="{{ $data->tata_usaha_foto }}" target="_blank">Foto Lama</a>
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
