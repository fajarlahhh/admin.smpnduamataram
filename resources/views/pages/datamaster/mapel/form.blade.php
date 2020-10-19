@extends('pages.main')

@section('title', ' | '.$aksi.' Mata Pelajaran')

@section('page')
<li class="breadcrumb-item">Mata Pelajaran</li>
<li class="breadcrumb-item active">{{ $aksi }} Mata Pelajaran</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Mata Pelajaran</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('mapel.simpan') }}" method="post">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->mapel_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Mata Pelajaran</label>
                                        <input class="form-control" type="text" name="mapel_nama" value="{{ old('mapel_nama')? old('mapel_nama'): ($aksi == "Edit"? $data->mapel_nama: "") }}" autocomplete="off" id="mapel_nama" data-parsley-minlength="2" required />
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
