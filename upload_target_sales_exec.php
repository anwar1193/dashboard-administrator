<?php

// Load file koneksi.php
include "koneksi.php";


if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';

	$inputFileType = 'CSV';
	$inputFileName = 'tmp/data.csv';

	$reader = PHPExcel_IOFactory::createReader($inputFileType);
	$excel = $reader->load($inputFileName);

	$numrow = 1;
	$worksheet = $excel->getActiveSheet();
	foreach ($worksheet->getRowIterator() as $row) {
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
			$id = NULL; 
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
            $total = $jan+$feb+$mar+$apr+$mei+$jun+$jul+$agu+$sep+$okt+$nov+$des;

			// Cek jika semua data tidak diisi
			if($cabang == "" && $tahun == "" && $jan == "" && $feb == "" && $mar == "" && $apr == "" && $mei == "" && $jun == "" && $jul == "" && $agu == "" && $sep == "" && $okt == "" && $nov == "" && $des == "")
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

            // Cek Apakah Data Sudah Ada Sebelumnya
            $q_cek = "SELECT * FROM tbl_target WHERE BranchName='$cabang' AND tahun='$tahun'";
            $res_cek = mysqli_query($koneksi, $q_cek) or die('error 1');
            $cek = mysqli_num_rows($res_cek);
            $data = mysqli_fetch_array($res_cek);

            if($cek>0){ //kalo data sudah ada sebelumnya
                // Hapus Data Sebelumnya
                mysqli_query($koneksi, "DELETE FROM tbl_target WHERE BranchName='$cabang' AND tahun='$tahun'") or die ('error2');

                // Masukan Data
                $query = "INSERT INTO tbl_target VALUES('".$id."','".$cabang."','".$tahun."','".$jan."','".$feb."','".$mar."','".$apr."','".$mei."','".$jun."','".$jul."','".$agu."','".$sep."','".$okt."','".$nov."','".$des."','".$total."')";
			    mysqli_query($koneksi, $query);
            }else{
                // Masukan Data
                $query = "INSERT INTO tbl_target VALUES('".$id."','".$cabang."','".$tahun."','".$jan."','".$feb."','".$mar."','".$apr."','".$mei."','".$jun."','".$jul."','".$agu."','".$sep."','".$okt."','".$nov."','".$des."','".$total."')";
			    mysqli_query($koneksi, $query);
            }
			
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

header('location: target_sales.php'); // Redirect ke halaman awal
?>
