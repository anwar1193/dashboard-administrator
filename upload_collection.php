<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Collection</title>

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
			<a href="import_collection.php" class="btn btn-danger pull-right">
				Kembali
			</a>

			<h3>Import Data Collection</h3>
			<hr>

			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="" enctype="multipart/form-data">
				<a href="upload_csv/format_collection.csv" class="btn btn-primary">
					Download Format
				</a>

                <a href="upload_csv/contoh_collection.csv" class="btn btn-warning">
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
					echo "<form method='post' action='upload_collection_exec.php'>";

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
                        <th style='text-align:center'>Target All</th>
                        <th style='text-align:center'>Target Cabang</th>
                        <th style='text-align:center'>% All Cabang</th>
                        <th style='text-align:center'>Pencapaian</th>
                        <th style='text-align:center'>% Pencapaian</th>
                        <th style='text-align:center'>Selisih</th>
                        <th style='text-align:center'>Tanggal</th>
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
                            echo "<td style='text-align:center'".$cabang_td.">".$cabang."</td>";
                            echo "<td style='text-align:right'".$target_all_td.">".number_format($target_all, 0, '.', ',')."</td>";
                            echo "<td style='text-align:right'".$target_cabang_td.">".number_format($target_cabang, 0, '.', ',')."</td>";
                            echo "<td style='text-align:center'".$pers_all_cabang_td.">".$pers_all_cabang."</td>";
                            echo "<td style='text-align:right'".$pencapaian_td.">".number_format($pencapaian, 0, '.', ',')."</td>";
                            echo "<td style='text-align:center'".$pers_pencapaian_td.">".$pers_pencapaian."</td>";
                            echo "<td style='text-align:right'".$selisih_td.">".number_format($selisih, 0, '.', ',')."</td>";
                            echo "<td style='text-align:center'".$tanggal_td.">".$tanggal."</td>";
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