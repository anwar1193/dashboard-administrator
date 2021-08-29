



















<?php

	error_reporting(0);
	session_start();
	include 'koneksi.php';
	include 'function_admin.php';
	if($_SESSION['admin']){

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

    <!-- Load File jquery.min.js yang ada difolder js -->
	<script src="js2/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
        // Sembunyikan alert validasi kosong
        $("#kosong").hide();
    });
    </script>

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
					<h3 class="text-primary">Import Collection (Payment)</h3> </div>
				<div class="col-md-7 align-self-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Import Collection Payment</li>
					</ol>
				</div>
			</div>
			<!-- End Bread crumb -->

			<!-- Container fluid  -->
			<div class="container-fluid">
				<!-- Start Page Content -->
				<div class="row">

					<div class="col-md-6 offset-3">
					
						<h4 class="text-center">UPLOAD DATA COLLECTION</h4>
					    <hr>

					    <form method="post" action="" enctype="multipart/form-data">
					      
					      <center>
					      <a href="upload_csv/format_collection.csv" class="btn btn-info btn-xs">
					        <i class="fa fa-download"></i> Download Format
					      </a><br><br>

					      <div class="form-group">
					        <input type="file" name="file" class="form-control" id="exampleInputFile" required>
					      </div>  

                          <a href="import_collection.php" class="btn btn-danger btn-sm">
                              <i class="fa fa-backward"></i> Kembali
                          </a>

					      <button type="submit" name="preview" class="btn btn-success btn-sm" style="margin-right: 0">
					        <i class="fa fa-eye"></i> Preview Hasil
					      </button>
					      </center>

					    </form>

					</div>


                    <!-- Hasil Validasi Inputan -->

                    <!-- Buat Preview Data -->
                    <?php
                    // Jika user telah mengklik tombol Preview
                    if(isset($_POST['preview'])){
                        $nama_file_baru = 'data.csv';

                        // Cek apakah terdapat file data.xlsx pada folder tmp
                        if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
                            unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

                        $nama_file = $_FILES['file']['name']; // Ambil nama file yang akan diupload
                        $tmp_file = $_FILES['file']['tmp_name'];
                        $ext = pathinfo($nama_file, PATHINFO_EXTENSION); // Ambil ekstensi file yang akan diupload

                            // Upload file yang dipilih ke folder tmp
                            move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

                            // Load librari PHPExcel nya
                            require_once 'PHPExcel/PHPExcel.php';

                            $inputFileType = 'CSV';
                            $inputFileName = 'tmp/data.csv';

                            $reader = PHPExcel_IOFactory::createReader($inputFileType);
                            $excel = $reader->load($inputFileName);

                            // Buat sebuah tag form untuk proses import data ke database
                            echo "<form method='post' action='import.php'>";

                            // Buat sebuah div untuk alert validasi kosong
                            echo "<div class='alert alert-danger' id='kosong'>
                            Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum lengkap diisi.
                            </div>";

                            echo "<table class='table table-bordered'>
                            
                            <tr>
                                <th colspan='5' class='text-center'>Preview Data</th>
                            </tr>

                            <tr>
                                <th>Cabang</th>
                                <th>Target All</th>
                                <th>Target Cabang</th>
                                <th>% All Cabang</th>
                                <th>Pencapaian</th>
                                <th>% Pencapaian</th>
                                <th>Selisih</th>
                                <th>Tanggal</th>
                            </tr>";

                            $numrow = 1;
                            $kosong = 0;
                            $worksheet = $excel->getActiveSheet();
                            foreach ($worksheet->getRowIterator() as $row) { // Lakukan perulangan dari data yang ada di csv
                                // Cek $numrow apakah lebih dari 1
                                // Artinya karena baris pertama adalah nama-nama kolom
                                // Jadi dilewat saja, tidak usah diimport
                                if($numrow > 1){
                                    // START -->
                                    // Skrip untuk mengambil value nya
                                    $cellIterator = $row->getCellIterator();
                                    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set

                                    $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
                                    foreach ($cellIterator as $cell) {
                                        array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
                                    }
                                    // <-- END

                                    // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
                                    $cabang = $get[0]; // Ambil data Target Cabang
                                    $target_all = $get[1]; // Ambil data target_all
                                    $target_cabang = $get[2]; // Ambil data target cabang
                                    $pers_all_cabang = $get[3]; // Ambil data % All Cabang
                                    $pencapaian = $get[4]; // Ambil data pencapaian
                                    $pers_pencapaian = $get[5]; // Ambil data % pencapaian
                                    $selisih = $get[6]; // Ambil data selisih
                                    $tanggal = $get[7]; // Ambil data tanggal

                                    // Cek jika semua data tidak diisi
                                    if($cabang == "" && $target_all == "" && $target_cabang == "" && $pers_all_cabang == "" && $pencapaian == "" && $pers_pencapaian == "" && $selisih == "" && $tanggal == "")
                                        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                                    // Validasi apakah semua data telah diisi
                                    $cabang_td = ($cabang == "")? " style='background: #E07171;'" : ""; // Jika Cabang kosong, beri warna merah
                                    $target_all_td = ($target_all == "")? " style='background: #E07171;'" : ""; // Jika Target All kosong, beri warna merah
                                    $target_cabang_td = ($target_cabang == "")? " style='background: #E07171;'" : ""; // Jika Target Cabang kosong, beri warna merah
                                    $pers_all_cabang_td = ($pers_all_cabang == "")? " style='background: #E07171;'" : ""; // Jika % All Cabang kosong, beri warna merah
                                    $pencapaian_td = ($pencapaian == "")? " style='background: #E07171;'" : ""; // Jika Pencapaian kosong, beri warna merah
                                    $pers_pencapaian_td = ($pers_pencapaian == "")? " style='background: #E07171;'" : ""; // Jika pers_pencapaian kosong, beri warna merah
                                    $selisih_td = ($selisih == "")? " style='background: #E07171;'" : ""; // Jika Selisih kosong, beri warna merah
                                    $tanggal_td = ($tanggal == "")? " style='background: #E07171;'" : ""; // Jika tanggal kosong, beri warna merah
                                    

                                    // Jika salah satu data ada yang kosong
                                    if($cabang == "" or $target_all == "" or $target_cabang == "" or $pers_all_cabang == "" or $pencapaian == "" or $pers_pencapaian == "" or $selisih == "" or $tanggal == ""){
                                        $kosong++; // Tambah 1 variabel $kosong
                                    }

                                    echo "<tr>";
                                    echo "<td".$cabang_td.">".$cabang."</td>";
                                    echo "<td".$target_all_td.">".$target_all."</td>";
                                    echo "<td".$target_cabang_td.">".$target_cabang."</td>";
                                    echo "<td".$pers_all_cabang_td.">".$pers_all_cabang."</td>";
                                    echo "<td".$pencapaian_td.">".$pencapaian."</td>";
                                    echo "<td".$pers_pencapaian_td.">".$pers_pencapaian."</td>";
                                    echo "<td".$selisih_td.">".$selisih."</td>";
                                    echo "<td".$tanggal_td.">".$tanggal."</td>";
                                    echo "</tr>";
                                }

                                $numrow++; // Tambah 1 setiap kali looping
                            }

                            echo "</table>";

                            // Cek apakah variabel kosong lebih dari 1
                            // Jika lebih dari 1, berarti ada data yang masih kosong
                            if($kosong > 1){
                            ?>
                                <script>
                                $(document).ready(function(){
                                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                                    $("#kosong").show(); // Munculkan alert validasi kosong
                                });
                                </script>
                            <?php
                            }else{ // Jika semua data sudah diisi
                                echo "<hr>";

                                // Buat sebuah tombol untuk mengimport data ke database
                                echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
                            }

                            echo "</form>";

                    }
                    ?>
                    <!-- Penutup Hasil Validasi Inputan -->


				</div>
				<!-- Penutup row -->


				<!-- End PAge Content -->
			</div>
			<!-- End Container fluid  -->
			<!-- footer -->
			<!-- <footer class="footer"> © 2018 All rights reserved. PT Procar Int'l Finance</footer> -->
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