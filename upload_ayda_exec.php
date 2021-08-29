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

            // Validasi Mundur Max 1 Bulan
            $tanggal_sekarang = date('d');
            $bulan_sekarang = date('m');
            $tahun_sekarang = date('Y');

            $waktu_input = mktime(0,0,0,$bulan,$tanggal_sekarang, $tahun);
            $waktu_sekarang = mktime(0,0,0,$bulan_sekarang,$tanggal_sekarang, $tahun_sekarang);

            $selisih_hari0 = $waktu_sekarang - $waktu_input;
            $selisih_hari = $selisih_hari0 / (60*60*24);

            if($selisih_hari > 31){
                echo '<script>
                    alert("Inputan Bulan Maksimal Mundur 1 Bulan");
                    window.location="ayda.php";
                </script>';
                exit;
            }

            // Penutup validasi mundur max 1 Bulan

            // Cek Apakah Data Sudah Ada Sebelumnya
            $q_cek = "SELECT * FROM tbl_ayda_asli WHERE BranchName='$cabang' AND bulan='$bulan' AND tahun='$tahun'";
            $res_cek = mysqli_query($koneksi, $q_cek) or die('error 1');
            $cek = mysqli_num_rows($res_cek);
            $data = mysqli_fetch_array($res_cek);

            if($cek>0){ //kalo data sudah ada sebelumnya
                // Hapus Data Sebelumnya
                mysqli_query($koneksi, "DELETE FROM tbl_ayda_asli WHERE BranchName='$cabang' AND bulan='$bulan' AND tahun='$tahun'") or die ('error2');

                // Masukan Data
                $query = "INSERT INTO tbl_ayda_asli VALUES('".$id."','".$cabang."','".$bulan."','".$tahun."','".$os_awal."','".$unit_awal."','".$penambahan_os."','".$penambahan_unit."','".$pengurangan_os."','".$pengurangan_unit."','".$os_akhir."','".$unit_akhir."')";
			    mysqli_query($koneksi, $query);
            }else{
                // Masukan Data
                $query = "INSERT INTO tbl_ayda_asli VALUES('".$id."','".$cabang."','".$bulan."','".$tahun."','".$os_awal."','".$unit_awal."','".$penambahan_os."','".$penambahan_unit."','".$pengurangan_os."','".$pengurangan_unit."','".$os_akhir."','".$unit_akhir."')";
			    mysqli_query($koneksi, $query);
            }
			
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

// header('location: ayda.php'); // Redirect ke halaman awal
echo '<script>
    alert("Upload Data Ayda Berhasil");document.location.href="ayda.php";
</script>';
?>
