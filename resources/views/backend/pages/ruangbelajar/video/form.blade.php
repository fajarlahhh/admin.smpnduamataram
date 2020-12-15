@extends('pages.main')

@section('title', ' | '.$aksi.' Video Ruang Belajar')

@push('css')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Ruang Belajar</li>
<li class="breadcrumb-item">Video</li>
<li class="breadcrumb-item active">{{ $aksi }} Video Ruang Belajar</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Video Ruang Belajar</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('video.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->video_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Judul</label>
                                        <input class="form-control" type="text" name="video_judul" value="{{ old('video_judul')? old('video_judul'): ($aksi == "Edit"? $data->video_judul: "") }}" autocomplete="off" id="video_judul" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Deskripsi</label>
                                        <input class="form-control" type="text" name="video_uraian" value="{{ old('video_uraian')? old('video_uraian'): ($aksi == "Edit"? $data->video_uraian: "") }}" autocomplete="off" id="video_uraian" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Embed Code</label>
                                        <input class="form-control" type="text" name="video_link" value="{{ old('video_link')? old('video_link'): ($aksi == "Edit"? $data->video_link: "") }}" autocomplete="off" id="video_link" data-parsley-minlength="2" required />
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
