@extends('pages.main')

@section('title', ' | '.$aksi.' Kalender Akademik')

@push('css')
<link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
@endpush

@section('page')
<li class="breadcrumb-item">Akademik</li>
<li class="breadcrumb-item">Kalender Akademik</li>
<li class="breadcrumb-item active">{{ $aksi }} Kalender Akademik</li>
@endsection

@section('header')
<h1 class="m-0 text-dark">{{ $aksi }} Kalender Akademik</h1>
@endsection

@section('subcontent')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('kalenderakademik.simpan') }}" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ $back }}">
                            <div class="row">
                                @if($aksi == 'Edit')
                                <input type="hidden" name="ID" value="{{ $data->kalender_akademik_id }}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggalr</label>
                                        <div class="input-group" id="default-daterange">
                                            <input type="text" name="kalender_akademik_tanggal" class="form-control" value="{{ date('d F Y').' - '.date('d F Y') }}" placeholder="Pilih Tanggal" readonly />
                                            <span class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Keterangan</label>
                                        <input class="form-control" type="text" name="kalender_akademik_uraian" value="{{ old('kalender_akademik_uraian')? old('kalender_akademik_uraian'): ($aksi == "Edit"? $data->kalender_akademik_uraian: "") }}" autocomplete="off" data-parsley-minlength="2" required />
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
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<script>

	$('#default-daterange').daterangepicker({
		opens: 'right',
		format: 'DD MMMM YYYY',
		startDate: moment('{{ date('Y-m-d') }}'),
		endDate: moment('{{ date('Y-m-d') }}'),
    	dateLimit: { days: 365 },
	}, function (start, end) {
		$('#default-daterange input').val(start.format('DD MMMM YYYY') + ' - ' + end.format('DD MMMM YYYY'));
	});
</script>
@endpush
