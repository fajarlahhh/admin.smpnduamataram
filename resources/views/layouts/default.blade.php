<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

	    @include('includes.header')

		@include('includes.sidebar')

        @yield('content')

		@include('includes.footer')
	</div>

	@include('includes.page-js')
</body>
</html>
