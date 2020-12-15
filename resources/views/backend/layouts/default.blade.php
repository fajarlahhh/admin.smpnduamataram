<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('backend.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

	    @include('backend.includes.header')

		@include('backend.includes.sidebar')

        @yield('content')

		@include('backend.includes.footer')
	</div>

	@include('backend.includes.page-js')
</body>
</html>
