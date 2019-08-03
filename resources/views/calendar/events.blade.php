
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
					<div class="potlet">
						<div class="d-block potlet-header">
							<h3>Calendar</h3>					
						</div>

						<div class="row box-shadow-container">
						
							<div class="col-md-3">
								<form>
									<div class="form-group">
										<label for="event">Event</label>
										<input type="email" class="form-control" id="event" placeholder="My Event">
									</div>

									<div class="form-group row">
										<div class="col-sm-6">
											<label for="from">From</label>
											<input type="text" class="form-control" id="from" placeholder="2018-07-01">
										</div>
										<div class="col-sm-6">
											<label for="to">to</label>
											<input type="text" class="form-control" id="to" placeholder="2018-07-01">
										</div>
									</div>

									<div class="form-group ">
										<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="mon">
											<label class="form-check-label" for="mon">Mon</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="tue">
											<label class="form-check-label" for="tue">Tue</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="wed">
											<label class="form-check-label" for="wed">Wed</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="thur">
											<label class="form-check-label" for="thur">Thur</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="fri">
											<label class="form-check-label" for="fri">Fri</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="Sat">
											<label class="form-check-label" for="sat">Sat</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="sun">
											<label class="form-check-label" for="sun">Sun</label>
										</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Save</button>
									</div>
								</form>
							</div>

							<div class="col-md-9">
								<h2>Jul 2018</h2>
								<div class="scrollable">
									<!--<div id="app">
										<events-calendar-component></events-calendar-component>
									</div>-->
									<table class="table content-scroll">
										<tbody>
										<tr class="success">
											<td>1 Sun</td>
											<td>This is my event</td>
										</tr>
										<tr>
											<td>2 Mon</td>
											<td></td>
										</tr>
										<tr>
											<td>3 Tue</td>
											<td></td>
										</tr>
										<tr class="success">
											<td>4 Wed</td>
											<td>This is my event</td>
										</tr>
										<tr class="success">
											<td>5 Thur</td>
											<td>This is my event</td>
										</tr>
										<tr class="success">
											<td>6 Fri</td>
											<td>This is my event</td>
										</tr>
										<tr>
											<td>7 Sat</td>
											<td></td>
										</tr>
										<tr>
											<td>8 Sun</td>
											<td></td>
										</tr>
										<tr>
											<td>9 Mon</td>
											<td></td>
										</tr>
										<tr>
											<td>10 Tue</td>
											<td></td>
										</tr>
										<tr class="success">
											<td>11 Wed</td>
											<td>This is my event</td>
										</tr>
										<tr>
											<td>12 Thur</td>
											<td></td>
										</tr>
										<tr>
											<td>13 Fri</td>
											<td></td>
										</tr>
										<tr>
											<td>14 Sat</td>
											<td></td>
										</tr>
										</tbody>
									</table>
								</div>
								
							</div><!--box-shadow-container -->

						</div><!-- Portlet -->

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