@extends('pages.main')

@section('title', ' | '.$aksi.' Pengguna')

@section('page')
<li class="breadcrumb-item">Pengguna</li>
<li class="breadcrumb-item active">{{ $aksi }} Pengguna</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Pengguna</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pengguna.simpan') }}" method="post">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->pengguna_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">ID</label>
                                        <input class="form-control" type="text" name="pengguna_id" value="{{ old('pengguna_id')? old('pengguna_id'): ($aksi == "Edit"? $data->pengguna_id: "") }}" autocomplete="off" id="pengguna_id" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input class="form-control" type="text" name="pengguna_nama" value="{{ old('pengguna_nama')? old('pengguna_nama'): ($aksi == "Edit"? $data->pengguna_nama: "") }}" autocomplete="off" id="pengguna_nama" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Kata Sandi</label>
                                        <input class="form-control" type="password" name="pengguna_sandi" autocomplete="off" id="pengguna_sandi" data-parsley-minlength="5" {{ $aksi == 'Tambah'? 'required': '' }} />
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
