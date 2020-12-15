@extends('backend.layouts.default')

@section(config("app.name"))

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @yield('header')
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    @yield('page')
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	@yield('subcontent')
    <section class="content">
        @include('backend.includes.component.error')
    </section>
</div>
@endsection

@push('scripts')
<!-- Sparkline -->
<script src="/assets/backend/plugins/sparklines/sparkline.js"></script>
@endpush
