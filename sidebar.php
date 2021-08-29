<?php  

	// Ambil URL yang sedang aktif
	$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$page_sekarang = explode('/', $url);

	// Ambil Level Yang Sedang Login
	$level = $_SESSION['admin'];

?>
<!-- Left Sidebar  -->
<div class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="nav-devider"></li>
				<li class="nav-label">Home</li>

				<li> <a href="home.php"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
				
				
				<li class="nav-label">Data</li>
				
	
				<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Import Data</span></a>
					<ul aria-expanded="false" class="collapse">
						<!-- Pembagian Hak Akses -->
						
						<?php if($level=='operation' || $level=='admin'){ ?>
							<li><a href="import_sales_tunggakan.php">Sales & Tunggakan</a></li>
							<li><a href="closing_akhir_bulan.php">Closing Akhir Bulan</a></li>
							<li><a href="portfolio.php">Portfolio (OS)</a></li>
						<?php } ?>
						
						<?php if($level=='collection' || $level=='admin'){ ?>
							<li><a href="import_collection.php">Collection (Payment)</a></li>
							<li><a href="ayda.php">AYDA</a></li>
						<?php } ?>

						<?php if($level=='marketing' || $level=='admin'){ ?>
							<li><a href="target_sales.php">Target Sales</a></li>
						<?php } ?>
						
						<!-- Penutup Pembagian Hak Akses -->
					</ul>
				</li>

				<?php if($level == 'admin'){ ?>
					<li> <a href="manajemen_user.php"><i class="fa fa-user"></i><span class="hide-menu">Manajemen User</span></a></li>
				<?php } ?>
				
				<li class="nav-label">System</li>
				
				<li> <a href="logout.php"><i style="color: red" class="fa fa-times"></i><span class="hide-menu">Logout </span></a></li>
				

			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->