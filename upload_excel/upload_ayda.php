<?php
include('koneksi.php');
require 'vendor/autoload.php';
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        $cabang = $sheetData[$i]['1'];
        $bulan = $sheetData[$i]['2'];
        $tahun = $sheetData[$i]['3'];
        $os_awal = $sheetData[$i]['4'];
        $unit_awal = $sheetData[$i]['5'];
        $penambahan_os = $sheetData[$i]['6'];
        $penambahan_unit = $sheetData[$i]['7'];
        $pengurangan_os = $sheetData[$i]['8'];
        $pengurangan_unit = $sheetData[$i]['9'];
        $os_akhir = $sheetData[$i]['10'];
        $unit_akhir = $sheetData[$i]['11'];

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
                window.location="http://10.20.0.30/dashboard-administrator/ayda.php";
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
            mysqli_query($koneksi, "DELETE FROM tbl_ayda_asli WHERE cabang='$cabang' AND bulan='$bulan' AND tahun='$tahun'") or die ('error2');

            // Masukan Data
            mysqli_query($koneksi, "INSERT INTO tbl_ayda_asli(BranchName, bulan, tahun, os_awal, unit_awal, penambahan_os, penambahan_unit, pengurangan_os, pengurangan_unit, os_akhir, unit_akhir) 
            VALUES ('$cabang', '$bulan', '$tahun', '$os_awal', '$unit_awal', '$penambahan_os', '$penambahan_unit', '$pengurangan_os', '$pengurangan_unit', '$os_akhir', '$unit_akhir')") or die ('error3');
        }else{
           // Masukan Data
           mysqli_query($koneksi, "INSERT INTO tbl_ayda_asli(BranchName, bulan, tahun, os_awal, unit_awal, penambahan_os, penambahan_unit, pengurangan_os, pengurangan_unit, os_akhir, unit_akhir) 
           VALUES ('$cabang', '$bulan', '$tahun', '$os_awal', '$unit_awal', '$penambahan_os', '$penambahan_unit', '$pengurangan_os', '$pengurangan_unit', '$os_akhir', '$unit_akhir')") or die ('error3');
        }

    }



    // Redirect Di Laptop Local
     echo '<script>
        alert("Data Berhasil Diupload");window.location="http://10.20.0.30/dashboard-administrator/ayda.php";
    </script>';

}
?>