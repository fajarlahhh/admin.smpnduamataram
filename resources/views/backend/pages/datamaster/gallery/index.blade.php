@extends('backend.pages.main')

@section('title', ' | File Gambar')

@push('css')
<link rel="stylesheet" href="/assets/backend/plugins/ekko-lightbox/ekko-lightbox.css">
@endpush

@section('page')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item active">File Gambar</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">File Gambar</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/admin-area/gallery/tambah" class="btn btn-sm btn-primary">Tambah</a>
                        <div class="card-tools">
                            <form action="/admin-area/gallery" method="GET">
                                <div class="input-group input-group">
                                    <select class="form-control selectpicker" name="file">
                                        <option value="semua" {{ $file == 'semua'? 'selected': '' }}>Semua File</option>
                                        <option value="tampil" {{ $file == 'tampil'? 'selected': '' }}>Tampil</option>
                                        <option value="tersembunyi" {{ $file == 'tersembunyi'? 'selected': '' }}>Tersembunyi</option>
                                    </select>
                                    <input type="text" class="form-control float-right" value="{{ $cari }}" name="cari" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="filter-container p-0 row">
                            @foreach ($data as $i => $row)
                            <div class="filtr-item col-sm-2 text-center">
                                <label>{{ ++$i }}</label><br>
                                <a href="{{ $row->gallery_gambar }}" data-toggle="lightbox" data-title="{{ $row->gallery_judul }}">
                                    <img src="{{ $row->gallery_gambar }}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                                <input type="text" value="{{ $row->gallery_gambar }}" class="w-100" readonly>
                                <a href="javascript:;" data-id="{{ $row->gallery_id }}" data-no="{{ $i }}" class="btn-danger btn-xs btn btn-hapus w-100" > Hapus</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer form-inline">
                        <div class="col-md-6 col-lg-8 col-xl-8 col-xs-12">
                            {{ $data->links() }}
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-4 col-xs-12">
                            <label class="float-right">Jumlah Data : {{ $data->total() }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(".btn-hapus").on('click', function () {
        var no = $(this).data('no');
        var id = $(this).data('id');
        var r = confirm('Anda akan menghapus data no ' + no);
        if (r == true) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin-area/gallery/hapus",
                type: "POST",
                data: {
                    "_method": 'DELETE',
                    "id" : id
                },
                success: function(data){
                    location.reload(true);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseJSON.message);
                }
            });
        }
    });
</script>
@endpush

@push('scripts')
<script src="/assets/backend/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="/assets/backend/plugins/filterizr/jquery.filterizr.min.js"></script>

<script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    })
</script>
@endpush
