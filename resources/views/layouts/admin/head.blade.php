<head>
	<meta charset="utf-8" />
	<title>PustakaManga @yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="icon" href="{{asset('image/logopm.png')}}">

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/bootstrap/4.1.3/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/font-awesome/5.3/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('css/admin/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('css/admin/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('css/admin/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	@stack('styles')
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
