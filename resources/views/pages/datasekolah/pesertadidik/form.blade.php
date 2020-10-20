@extends('pages.main')

@section('title', ' | Tambah Peserta Didik')

@push('css')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Peserta Didik</li>
<li class="breadcrumb-item active">Tambah Peserta Didik</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">Tambah Peserta Didik</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pesertadidik.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Nama Kelas</label>
                                        <input class="form-control" type="text" name="peserta_didik_nama" value="{{ old('peserta_didik_nama')? old('peserta_didik_nama'): ($aksi == "Edit"? $data->peserta_didik_nama: "") }}" autocomplete="off" id="peserta_didik_nama" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="control-label">Kelas</label>
                                        <select class="form-control selectpicker" name="peserta_didik_kelas" data-live-search="true" data-style="btn-aqua" data-size="3" data-width="100%">
                                            @foreach($kelas as $row)
                                            @php
                                                $selected = '';
                                                if(old('peserta_didik_kelas') == $row){
                                                    $selected =  'selected';
                                                }
                                            @endphp
                                            <option value="{{ $row }}" {{ $selected }}>{{ $row }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">File</label>
                                        <input class="form-control" type="file" name="peserta_didik_file" accept="application/pdf" required autocomplete="off" />
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
