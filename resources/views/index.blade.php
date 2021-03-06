
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Calendar</title>

		<!-- Custom fonts for this template-->
		<link rel="stylesheet" href="{{asset('css/lib/fontawesome-free/css/all.min.css')}}">

		<!-- Custom styles for this template-->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('js/lib/jquery-ui-1.12.1/jquery-ui.css')}}">
	</head>
	
	<body id="page-top sidebar-toggled" >
		<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
			<a class="navbar-brand mr-1" href="#"></a>

			<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
				<i class="fas fa-bars"></i>
			</button>
		</nav>
		
		<div id="wrapper">
			<ul class="sidebar navbar-nav toggled">

			</ul>
            <div id="content-wrapper">
                <div class="container-fluid">
                    <div id="app">
                        <events-calendar-component></events-calendar-component>
                    </div>
                </div>
            </div>
		</div>

		<!-- Bootstrap core JavaScript-->
        <script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script>
        
		<script src="{{asset('css/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		
		<!-- Custom scripts for all pages-->
        <script src="{{asset('js/custom.js')}}"></script>

        <script src="js/app.js"></script>
	</body>
</html>