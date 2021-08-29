<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Ayda</title>

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
			<a href="ayda.php" class="btn btn-danger pull-right">
				Kembali
			</a>

			<h3>Import Data Ayda</h3>
			<hr>

			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="" enctype="multipart/form-data">
				<a href="upload_csv/format_ayda.csv" class="btn btn-primary">
					Download Format
				</a>

                <a href="upload_csv/contoh_ayda.csv" class="btn btn-warning">
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
					echo "<form method='post' action='upload_ayda_exec.php'>";

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
                        <th style='text-align:center'>Bulan</th>
                        <th style='text-align:center'>Tahun</th>
                        <th style='text-align:center'>OS Awal</th>
                        <th style='text-align:center'>Unit Awal</th>
                        <th style='text-align:center'>Penambahan OS</th>
                        <th style='text-align:center'>Penambahan Unit</th>
                        <th style='text-align:center'>Pengurangan OS</th>
                        <th style='text-align:center'>Pengurangan Unit</th>
                        <th style='text-align:center'>OS Akhir</th>
                        <th style='text-align:center'>Unit Akhir</th>
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
                            $bulan = $get[1]; 
                            $tahun = $get[2]; 
                            $os_awal = $get[3]; 
                            $unit_awal = $get[4]; 
                            $penambahan_os = $get[5]; 
                            $penambahan_unit = $get[6]; 
                            $pengurangan_os = $get[7]; 
                            $pengurangan_unit = $get[8]; 
                            $os_akhir = $get[9]; 
                            $unit_akhir = $get[10]; 

							// Cek jika semua data tidak diisi
							if($cabang == "" && $bulan == "" && $tahun == "" && $os_awal == "" && $unit_awal == "" && $penambahan_os == "" && $penambahan_unit == "" && $pengurangan_os == "" && $pengurangan_unit == "" && $os_akhir == "" && $unit_akhir == "")
                                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

							 // Validasi apakah semua data telah diisi
                             $cabang_td = ($cabang == "")? " style='background: #E07171;'" : "";
                             $bulan_td = ($bulan == "")? " style='background: #E07171;'" : "";
                             $tahun_td = ($tahun == "")? " style='background: #E07171;'" : "";
                             $os_awal_td = ($os_awal == "")? " style='background: #E07171;'" : "";
                             $unit_awal_td = ($unit_awal == "")? " style='background: #E07171;'" : ""; 
                             $penambahan_os_td = ($penambahan_os == "")? " style='background: #E07171;'" : ""; 
                             $penambahan_unit_td = ($penambahan_unit == "")? " style='background: #E07171;'" : ""; 
                             $pengurangan_os_td = ($pengurangan_os == "")? " style='background: #E07171;'" : "";
                             $pengurangan_unit_td = ($pengurangan_unit == "")? " style='background: #E07171;'" : "";
                             $os_akhir_td = ($os_akhir == "")? " style='background: #E07171;'" : "";
                             $unit_akhir_td = ($unit_akhir == "")? " style='background: #E07171;'" : "";

							// Jika salah satu data ada yang kosong
                            if($cabang == "" or $bulan == "" or $tahun == "" or $os_awal == "" or $unit_awal == "" or $penambahan_os == "" or $penambahan_unit == "" or $pengurangan_os == ""  or $pengurangan_unit == ""  or $os_akhir == ""  or $unit_akhir == ""){
                                $kosong++; // Tambah 1 variabel $kosong
                            }

							echo "<tr>";
                            echo "<td style='text-align:center'".$cabang_td.">".$cabang."</td>";
                            echo "<td style='text-align:center'".$bulan_td.">".$bulan."</td>";
                            echo "<td style='text-align:center'".$tahun_td.">".$tahun."</td>";
                            echo "<td style='text-align:right'".$os_awal_td.">".number_format($os_awal, 0, '.', ',')."</td>";
                            echo "<td style='text-align:center'".$unit_awal_td.">".$unit_awal."</td>";
                            echo "<td style='text-align:right'".$penambahan_os_td.">".number_format($penambahan_os, 0, '.', ',')."</td>";
                            echo "<td style='text-align:center'".$penambahan_unit_td.">".$penambahan_unit."</td>";
                            echo "<td style='text-align:right'".$pengurangan_os_td.">".number_format($pengurangan_os, 0, '.', ',')."</td>";
                            echo "<td style='text-align:center'".$pengurangan_unit_td.">".$pengurangan_unit."</td>";
                            echo "<td style='text-align:right'".$os_akhir_td.">".number_format($os_akhir, 0, '.', ',')."</td>";
                            echo "<td style='text-align:center'".$unit_akhir_td.">".$unit_akhir."</td>";
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