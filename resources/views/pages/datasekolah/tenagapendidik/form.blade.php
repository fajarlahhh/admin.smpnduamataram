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
                <form action="{{ route('tenagapendidik.simpan') }}" method="post">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->tenaga_pendidik_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input class="form-control" type="text" name="tenaga_pendidik_nama" value="{{ old('tenaga_pendidik_nama')? old('tenaga_pendidik_nama'): ($aksi == "Edit"? $data->tenaga_pendidik_nama: "") }}" autocomplete="off" id="tenaga_pendidik_nama" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="control-label">Kategori</label>
                                        <select class="form-control selectpicker" name="mapel_id" data-live-search="true" data-style="btn-aqua" data-size="3" data-width="100%">
                                            @foreach($mapel as $row)
                                            @php
                                                $selected = '';
                                                if($aksi == 'Edit'){
                                                    if ($data->mapel_id == $row->mapel_id) {
                                                        $selected =  'selected';
                                                    }
                                                }else{
                                                    if(old('mapel_id') == $row->mapel_id){
                                                        $selected =  'selected';
                                                    }
                                                }
                                            @endphp
                                            <option value="{{ $row->mapel_id }}" {{ $selected }}>{{ $row->mapel_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="control-label">Kategori</label>
                                        <select class="form-control selectpicker" name="tenaga_pendidik_kriteria">
                                            <option value="PNS" {{ $aksi == 'Edit' && $data->tenaga_pendidik_kriteria == "PNS"? 'selected': (old('tenaga_pendidik_kriteria') ==
                                                'PNS'? 'selected': '') }}>PNS</option>
                                            <option value="Non PNS" {{ $aksi == 'Edit' && $data->tenaga_pendidik_kriteria == "Non PNS"? 'selected': (old('tenaga_pendidik_kriteria') ==
                                                'Non PNS'? 'selected': '') }}>Non PNS</option>
                                        </select>
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
