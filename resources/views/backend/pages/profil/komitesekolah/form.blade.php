@extends('backend.pages.main')

@section('title', ' | Komite Sekolah')

@push('css')
<link rel="stylesheet" href="/assets/backend/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Profil</li>
<li class="breadcrumb-item active">Komite Sekolah</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">Komite Sekolah</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('komitesekolah.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="textarea" name="profil_uraian">{{ old('profil_uraian')? old('profil_uraian'): ($data ? $data->profil_uraian: "") }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gambar</label>
                                        <input class="form-control" type="file" name="profil_gambar" accept="image/x-png,image/gif,image/jpeg" autocomplete="off" />
                                    </div>
                                    @if ($data)
                                    <a href="{{ $data->profil_gambar }}" target="_blank">Gambar Lama</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer form-inline">
                            <input type="submit" value="Simpan" class="btn btn-sm btn-success"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="/assets/backend/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        $('.textarea').summernote({
            height: 400,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
        })
    })
</script>
@endpush
