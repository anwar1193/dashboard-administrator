<?php

// Load file koneksi.php
include "koneksi.php";

// Hapus dulu semua data
mysqli_query($koneksi, "DELETE FROM tbl_coll_payment") or die ('error2');

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
			$id = NULL; // Ambil data Target Cabang
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

			// Tambahkan value yang akan di insert ke variabel $query
			// Buat query Insert
			$query = "INSERT INTO tbl_coll_payment VALUES('".$id."','".$cabang."','".$target_all."','".$target_cabang."','".$pers_all_cabang."','".$pencapaian."','".$pers_pencapaian."','".$selisih."','".$tanggal."')";
			mysqli_query($koneksi, $query);
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

header('location: import_collection.php'); // Redirect ke halaman awal
?>
