@extends('backend.pages.main')

@section('title', ' | Tambah Alumni')

@push('css')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endpush

@section('page')
<li class="breadcrumb-item">Data Sekolah</li>
<li class="breadcrumb-item">Alumni</li>
<li class="breadcrumb-item active">Tambah Alumni</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">Tambah Alumni</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('alumni.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Keterangan</label>
                                        <input class="form-control" type="text" name="alumni_keterangan" value="{{ old('alumni_keterangan')? old('alumni_keterangan'): ($aksi == "Edit"? $data->alumni_keterangan: "") }}" autocomplete="off" id="alumni_keterangan" data-parsley-minlength="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">File</label>
                                        <input class="form-control" type="file" name="alumni_file" accept="application/pdf" required autocomplete="off" />
                                    </div>

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
