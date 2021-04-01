<!DOCTYPE>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="/" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >

	<meta name="description" content="A corporate company established in 1980. The Head Office is located in Cairo Festival City - Ring Road - Fifth Settlement - Beside Police Academy" >
	<meta name="copyright" content="Copyright &copy; 2021 Egypt Honda Motor Co., Inc." >
	<meta name="keywords" content="honda, official website for honda in egypt, honda egypt, honda motorcycles, honda cars, honda city, honda civic, honda services, honda locations, honda dealers" >
	<meta name="robots" content="NOODP" >
	<meta name="author" content="Bahaa Samir" >
	<meta property="og:image" content="http://hondaegypt.com.eg/structure/so/ogp.png" >
	<meta property="og:image:secure_url" content="https://hondaegypt.com.eg/structure/so/ogp.png" >
	<title>@yield('title') | Official Honda Egypt Website </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" >
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >
	<link href="{{ asset( 'assets/styles/reset.css?v=' . config('app.version') )}}" rel="stylesheet" type="text/css" media="screen" >
	<link href="{{ asset( 'assets/styles/' . resolve('lang') . '_layout.css?v=' . config('app.version'))}}" rel="stylesheet" type="text/css" media="screen" >
	<link href="{{ asset( 'assets/lightbox/css/lightbox.css')}}" rel="stylesheet" />
	
	
	<link href="{{ asset( 'assets/styles/invade_responsive.css?v='  . config('app.version'))}}" rel="stylesheet" type="text/css" >
	
	@if(resolve('lang') == 'ar')
		<link href="{{ asset( 'assets/styles/ar_invade_responsive.css?v='  . config('app.version'))}}" rel="stylesheet" type="text/css" >
	@endif
	<script>
		window.lang = "{{resolve('lang')}}";
	</script>

</head>

<body id="main" class="{{resolve('lang')}} @yield('body_class')">


    @include('partials.header')

    @yield('content')



    @include('partials.footer')




	@yield('jquery')
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="{{ asset( 'assets/javascript/jquery.easing.1.3.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/jquery.transit.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/jquery.uncachedimg.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/jquery.HondaSlider.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/' . resolve('lang') . '_functions.js?v=' . config('app.version') )}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/' . resolve('lang') . '_script.js?v='  . config('app.version'))}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/responsive_scripts.js?v='  . config('app.version') )}}"></script>
    <script>
    $("#toggle_menu").click(function() {
        $(this).toggleClass("on");
        // $("#menu").slideToggle();
    });
	$(document).ready(function(){
		$("#responvsive_nav").HondaScrollAnimate('ResponsiveNav');
	});
    </script>

    @yield('scripts')








</body>
</html>
