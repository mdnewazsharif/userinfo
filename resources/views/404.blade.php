<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title>আশ শেফা - 404 Page not found </title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

	<!-- Style-->
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backendcss/skin_color.css')}}">

</head>
<body class="hold-transition theme-primary">

	<section class="error-page h-p100 bg-gradient-primary">
		<div class="container h-p100">
		  <div class="row h-p100 align-items-center justify-content-center text-center">
			  <div class="col-lg-7 col-md-10 col-12">
				  <div class="b-double border-white rounded30">
					  <h1 class="text-white font-size-180 font-weight-bold error-page-title"> 404</h1>
					  <h1 class="text-white">Page Not Found !</h1>
					  <h3 class="text-white">looks like, page doesn't exist</h3>
					  <div class="my-30"><a href="{{route('admin.dashboard')}}" class="btn btn-danger btn-rounded">Back to dashboard</a></div>

				  </div>
			  </div>
		  </div>
		</div>
	</section>


	<!-- Vendor JS -->
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>


</body>
</html>
