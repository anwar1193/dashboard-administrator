<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Target Sales</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>

		<!-- Load File jquery.min.js yang ada difolder js -->
		<script src="js2/jquery.min.js"></script>

		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script>
	</head>
	<body>
		<!--
		-- START HEADER
		-- Membuat Menu Header / Navbar
		-- Hapus saja jika tidak diperlukan
		-->
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="color: white;"><b>Dashboard Administrator</b></a>
				</div>
			</div>
		</nav>
		<!-- END HEADER -->

		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
			<a href="target_sales.php" class="btn btn-danger pull-right">
				Kembali
			</a>

			<h3>Import Data Target Sales</h3>
			<hr>

			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="" enctype="multipart/form-data">
				<a href="upload_csv/format_target_sales.csv" class="btn btn-primary">
					Download Format
				</a>

                <a href="upload_csv/contoh_target_sales.csv" class="btn btn-warning">
					Download Contoh Pengisian
				</a>
                
                <br><br>

				<!--
				-- Buat sebuah input type file
				-- class pull-left berfungsi agar file input berada di sebelah kiri
				-->
				<input type="file" name="file" class="pull-left">

				<button type="submit" name="preview" class="btn btn-success btn-sm">
					Preview
				</button>
			</form>

			<hr>

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

				// Cek apakah file yang diupload adalah file CSV
				if($ext == "csv"){
					// Upload file yang dipilih ke folder tmp
					move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

					// Load librari PHPExcel nya
					require_once 'PHPExcel/PHPExcel.php';

					$inputFileType = 'CSV';
					$inputFileName = 'tmp/data.csv';

					$reader = PHPExcel_IOFactory::createReader($inputFileType);
					$excel = $reader->load($inputFileName);

					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='upload_target_sales_exec.php'>";

					// Buat sebuah div untuk alert validasi kosong
					echo "<div class='alert alert-danger' id='kosong'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum lengkap diisi.
					</div>";

					echo "<table class='table table-bordered'>
					<tr>
						<th colspan='8' class='text-center'>Preview Data</th>
					</tr>

					<tr>
                        <th style='text-align:center'>Cabang</th>
                        <th style='text-align:center'>Tahun</th>
                        <th style='text-align:center'>JAN</th>
                        <th style='text-align:center'>FEB</th>
                        <th style='text-align:center'>MAR</th>
                        <th style='text-align:center'>APR</th>
                        <th style='text-align:center'>MEI</th>
                        <th style='text-align:center'>JUN</th>
                        <th style='text-align:center'>JUL</th>
                        <th style='text-align:center'>AGU</th>
                        <th style='text-align:center'>SEP</th>
                        <th style='text-align:center'>OKT</th>
                        <th style='text-align:center'>NOV</th>
                        <th style='text-align:center'>DES</th>
                    </tr>";

					$numrow = 1;
					$kosong = ''; //definisikan apa itu kosong
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
							$cabang = $get[0]; 
                            $tahun = $get[1]; 
                            $jan = $get[2]; 
                            $feb = $get[3]; 
                            $mar = $get[4]; 
                            $apr = $get[5]; 
                            $mei = $get[6]; 
                            $jun = $get[7]; 
                            $jul = $get[8]; 
                            $agu = $get[9]; 
                            $sep = $get[10]; 
                            $okt = $get[11]; 
                            $nov = $get[12];
                            $des = $get[13];

							// Cek jika semua data tidak diisi
							if($cabang == "" && $tahun == "" && $jan == "" && $feb == "" && $mar == "" && $apr == "" && $mei == "" && $jun == "" && $jul == "" && $agu == "" && $sep == "" && $okt == "" && $nov == "" && $des == "")
                                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

							 // Validasi apakah semua data telah diisi
                             $cabang_td = ($cabang == "")? " style='background: #E07171;'" : "";
                             $tahun_td = ($tahun == "")? " style='background: #E07171;'" : "";
                             $jan_td = ($jan == "")? " style='background: #E07171;'" : "";
                             $feb_td = ($feb == "")? " style='background: #E07171;'" : "";
                             $mar_td = ($mar == "")? " style='background: #E07171;'" : ""; 
                             $apr_td = ($apr == "")? " style='background: #E07171;'" : ""; 
                             $mei_td = ($mei == "")? " style='background: #E07171;'" : ""; 
                             $jun_td = ($jun == "")? " style='background: #E07171;'" : "";
                             $jul_td = ($jul == "")? " style='background: #E07171;'" : "";
                             $agu_td = ($agu == "")? " style='background: #E07171;'" : "";
                             $sep_td = ($sep == "")? " style='background: #E07171;'" : "";
                             $okt_td = ($okt == "")? " style='background: #E07171;'" : "";
                             $nov_td = ($nov == "")? " style='background: #E07171;'" : "";
                             $des_td = ($des == "")? " style='background: #E07171;'" : "";

							// Jika salah satu data ada yang kosong
                            if($cabang == "" or $tahun == "" or $jan == "" or $feb == "" or $mar == "" or $apr == "" or $mei == "" or $jun == ""  or $jul == ""  or $agu == ""  or $sep == ""  or $okt == ""  or $nov == ""  or $des == ""){
                                $kosong++; // Tambah 1 variabel $kosong
                            }

							echo "<tr>";
                            echo "<td style='text-align:center'".$cabang_td.">".$cabang."</td>";
                            echo "<td style='text-align:center'".$tahun_td.">".$tahun."</td>";
                            echo "<td".$jan_td.">".$jan."</td>";
                            echo "<td".$feb_td.">".$feb."</td>";
                            echo "<td".$mar_td.">".$mar."</td>";
                            echo "<td".$apr_td.">".$apr."</td>";
                            echo "<td".$mei_td.">".$mei."</td>";
                            echo "<td".$jun_td.">".$jun."</td>";
                            echo "<td".$jul_td.">".$jul."</td>";
                            echo "<td".$agu_td.">".$agu."</td>";
                            echo "<td".$sep_td.">".$sep."</td>";
                            echo "<td".$okt_td.">".$okt."</td>";
                            echo "<td".$nov_td.">".$nov."</td>";
                            echo "<td".$des_td.">".$des."</td>";
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

						<?php echo "<button type='submit' name='import' class='btn btn-primary'> Import Data</button>"; ?>
						
					<?php
					}else{ // Jika semua data sudah diisi
						echo "<hr>";

						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import' class='btn btn-primary'> Import Data</button>";
					}

					echo "</form>";
				}else{ // Jika file yang diupload bukan File CSV
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File CSV (.csv) yang diperbolehkan
					</div>";
				}
			}
			?>
		</div>
	</body>
</html>