@extends('pages.main')

@section('title', ' | '.$aksi.' Jadwal Belajar')

@push('css')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Ruang Belajar</li>
<li class="breadcrumb-item">Jadwal Belajar</li>
<li class="breadcrumb-item active">{{ $aksi }} Jadwal Belajar</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Jadwal Belajar</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('jadwalbelajar.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                <input type="hidden" name="posting_jenis" value="jadwalbelajar">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->posting_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Judul Jadwal Belajar</label>
                                        <input class="form-control" type="text" name="posting_judul" value="{{ old('posting_judul')? old('posting_judul'): ($aksi == "Edit"? $data->posting_judul: "") }}" autocomplete="off" id="posting_judul" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Isi Jadwal Belajar</label>
                                        <textarea class="textarea" name="posting_uraian">{{ old('posting_uraian')? old('posting_uraian'): ($aksi == "Edit"? $data->posting_uraian: "") }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">File Upload</label>
                                        <input class="form-control" type="file" name="posting_file" accept="application/pdf"autocomplete="off" />
                                    </div>
                                    @if ($aksi == 'Edit')
                                    <a href="{{ $data->posting_file }}" target="_blank">File Lama</a>
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
