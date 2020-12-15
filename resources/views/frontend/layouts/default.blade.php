<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('frontend.includes.head')
</head>
<body>
    <div class="boxed_wrapper">
        <div class="preloader"></div>

	    @include('frontend.includes.header')

        @yield('content')

		@include('frontend.includes.footer')
    </div>
	@include('frontend.includes.page-js')
</body>
</html>
