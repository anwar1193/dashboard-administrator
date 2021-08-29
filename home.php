<?php

	error_reporting(0);
	session_start();
	include 'koneksi.php';
	if($_SESSION['admin']){

	require 'function_admin.php';
	$data_kunjungan = tampil_data("SELECT * FROM tbl_user WHERE last_login!='' ORDER BY last_login DESC limit 0,10");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<title>Halaman Administrator</title>

	<link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
	<link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
	<!-- Bootstrap Core CSS -->
	<link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/helper.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
	<!--[if lt IE 9]>
	<script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
	<!-- Preloader - style you can find in spinners.css -->
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
	</div>
	<!-- Main wrapper  -->
	<div id="main-wrapper">
		<!-- header header  -->
		<div class="header">
			<nav class="navbar top-navbar navbar-expand-md navbar-light">
				<!-- Logo -->
				<div class="navbar-header">
					<a class="navbar-brand" href="home.php">
						<!-- Logo icon -->
						<b><img src="images/logo_pro.png" alt="homepage" width="40px"/></b> &nbsp;<font color="orange">Procar Finance</font>
						<!--End Logo icon -->
					</a>
				</div>
				<!-- End Logo -->
				<div class="navbar-collapse">
					<!-- toggle and nav items -->
					<ul class="navbar-nav mr-auto mt-md-0">
						<!-- This is  -->
						<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
						<li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
						<!-- Messages -->
						<li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
							<div class="dropdown-menu animated zoomIn">
								<ul class="mega-dropdown-menu row">


									<li class="col-lg-3  m-b-30">
										<h4 class="m-b-20">CONTACT US</h4>
										<!-- Contact -->
										<form>
											<div class="form-group">
												<input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Enter email"> </div>
											<div class="form-group">
												<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
											</div>
											<button type="submit" class="btn btn-info">Submit</button>
										</form>
									</li>
									<li class="col-lg-3 col-xlg-3 m-b-30">
										<h4 class="m-b-20">List style</h4>
										<!-- List style -->
										<ul class="list-style-none">
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
										</ul>
									</li>
									<li class="col-lg-3 col-xlg-3 m-b-30">
										<h4 class="m-b-20">List style</h4>
										<!-- List style -->
										<ul class="list-style-none">
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
										</ul>
									</li>
									<li class="col-lg-3 col-xlg-3 m-b-30">
										<h4 class="m-b-20">List style</h4>
										<!-- List style -->
										<ul class="list-style-none">
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</li>
						<!-- End Messages -->
					</ul>
					<!-- User profile and search -->
					<ul class="navbar-nav my-lg-0">

						<!-- Search -->
						<li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
							<form class="app-search">
								<input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
						</li>
						<!-- Comment -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
							<div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
								<ul>
									<li>
										<div class="drop-title">Notifications</div>
									</li>
									<li>
										<div class="message-center">
											<!-- Message -->
											<a href="#">
												<div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
												<div class="mail-contnet">
													<h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="#">
												<div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
												<div class="mail-contnet">
													<h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="#">
												<div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
												<div class="mail-contnet">
													<h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="#">
												<div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
												<div class="mail-contnet">
													<h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
												</div>
											</a>
										</div>
									</li>
									<li>
										<a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</div>
						</li>
						<!-- End Comment -->
						<!-- Messages -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
							<div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
								<ul>
									<li>
										<div class="drop-title">You have 4 new messages</div>
									</li>
									<li>
										<div class="message-center">
											<!-- Message -->
											<a href="#">
												<div class="user-img"> <img src="images/users/5.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
												<div class="mail-contnet">
													<h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="#">
												<div class="user-img"> <img src="images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
												<div class="mail-contnet">
													<h5>John Doe</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="#">
												<div class="user-img"> <img src="images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
												<div class="mail-contnet">
													<h5>Mr. John</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="#">
												<div class="user-img"> <img src="images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
												<div class="mail-contnet">
													<h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
												</div>
											</a>
										</div>
									</li>
									<li>
										<a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</div>
						</li>
						<!-- End Messages -->
						<!-- Profile -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/user_pro.jpg" width="400px" alt="user" class="profile-pic" /></a>
							<div class="dropdown-menu dropdown-menu-right animated zoomIn">
								<ul class="dropdown-user">
									<li><a href="#"><i class="ti-user"></i> Profile</a></li>
									<li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
									<li><a href="#"><i class="ti-email"></i> Inbox</a></li>
									<li><a href="#"><i class="ti-settings"></i> Setting</a></li>
									<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- End header header -->

		<!-- sidebar -->
		<?php require 'sidebar.php'; ?>

		<!-- Page wrapper  -->
		<div class="page-wrapper">
			<!-- Bread crumb -->
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h3 class="text-primary">Dashboard</h3> </div>
				<div class="col-md-7 align-self-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
			<!-- End Bread crumb -->

			<!-- Container fluid  -->
			<div class="container-fluid">
				<!-- Start Page Content -->
				<div class="row">
					<div class="col-md-3">
						<div class="card bg-primary p-20">
							<div class="media widget-ten">
								<div class="media-left meida media-middle">
									<span><i class="ti-bag f-s-40"></i></span>
								</div>
								<div class="media-body media-text-right">
									<h2 class="color-white">0</h2>
									<p class="m-b-0">DATA-1</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card bg-pink p-20">
							<div class="media widget-ten">
								<div class="media-left meida media-middle">
									<span><i class="ti-comment f-s-40"></i></span>
								</div>
								<div class="media-body media-text-right">
									<h2 class="color-white">0</h2>
									<p class="m-b-0">DATA-2</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card bg-success p-20">
							<div class="media widget-ten">
								<div class="media-left meida media-middle">
									<span><i class="ti-vector f-s-40"></i></span>
								</div>
								<div class="media-body media-text-right">
									<h2 class="color-white">0</h2>
									<p class="m-b-0">DATA-3</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card bg-danger p-20">
							<div class="media widget-ten">
								<div class="media-left meida media-middle">
									<span><i class="ti-location-pin f-s-40"></i></span>
								</div>
								<div class="media-body media-text-right">
									<h2 class="color-white">0</h2>
									<p class="m-b-0">DATA-4</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-title">
								<h4>Kunjungan Terakhir Di Aplikasi Dashboard</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover ">
										<thead>
											<tr>
												<th>NO</th>
												<th>Waktu</th>
												<th>Nama Pengunjung</th>
												<th>Username</th>
												<th>IP Address</th>
												<th>Browser</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$no=1;
												foreach($data_kunjungan as $row_kunjungan) : 
											?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= date('d-m-Y H:i:s', strtotime($row_kunjungan['last_login'])) ?></td>
												<td><?= $row_kunjungan['nama_lengkap'] ?></td>
												<td><?= $row_kunjungan['username'] ?></td>
												<td><?= $row_kunjungan['ip_login'] ?></td>
												<td><?= $row_kunjungan['browser_login'] ?></td>
											</tr>
											<?php endforeach; ?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- End PAge Content -->
			</div>
			<!-- End Container fluid  -->
			<!-- footer -->
			<footer class="footer"> © 2018 All rights reserved. PT Procar Int'l Finance</footer>
			<!-- End footer -->
		</div>
		<!-- End Page wrapper  -->
	</div>
	<!-- End Wrapper -->
	<!-- All Jquery -->
	<script src="js/lib/jquery/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="js/lib/bootstrap/js/popper.min.js"></script>
	<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="js/jquery.slimscroll.js"></script>
	<!--Menu sidebar -->
	<script src="js/sidebarmenu.js"></script>
	<!--stickey kit -->
	<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


	<script src="js/lib/datamap/d3.min.js"></script>
	<script src="js/lib/datamap/topojson.js"></script>
	<script src="js/lib/datamap/datamaps.world.min.js"></script>
	<script src="js/lib/datamap/datamap-init.js"></script>

	<script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
	<script src="js/lib/weather/weather-init.js"></script>
	<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/lib/owl-carousel/owl.carousel-init.js"></script>


	<script src="js/lib/chartist/chartist.min.js"></script>
	<script src="js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
	<script src="js/lib/chartist/chartist-init.js"></script>
	<!--Custom JavaScript -->
	<script src="js/custom.min.js"></script>

</body>

</html>

<?php

	}else{
		header('location:index.php');
	}

?>