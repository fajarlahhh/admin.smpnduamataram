@extends('pages.main')

@section('title', ' | Sarana Prasarana')

@section('page')
<li class="breadcrumb-item active">Sarana Prasarana</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">Sarana Prasarana</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/fasilitas/tambah" class="btn btn-sm btn-primary">Tambah</a>
                        <div class="card-tools">
                            <form action="/fasilitas" method="GET">
                                <div class="input-group input-group" style="width: 150px;">
                                    <input type="text" class="form-control float-right" value="{{ $cari }}" name="cari" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Gambar</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->fasilitas_judul }}</td>
                                        <td>{{ $row->fasilitas_kategori }}</td>
                                        <td><a href="{{ $row->fasilitas_gambar }}" target="_blank">Gambar</a></td>
                                        <td class="text-right" nowrap>
                                            <div class="btn-group">
                                                <a href="javascript:;" data-id="{{ $row->fasilitas_id }}" data-no="{{ $i }}" class="btn-danger btn btn-hapus" > Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                url: "/fasilitas/hapus",
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
