<?php
include('koneksi.php');
require 'vendor/autoload.php';
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

mysqli_query($koneksi, "DELETE FROM tbl_coll_payment") or die ('error2');

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
        $cabang = $sheetData[$i]['0'];
        $target_all = $sheetData[$i]['1'];
        $target_cabang = $sheetData[$i]['2'];
        $pers_all_cabang = $sheetData[$i]['3'];
        $pencapaian = $sheetData[$i]['4'];
        $pers_pencapaian = $sheetData[$i]['5'];
        $selisih = $sheetData[$i]['6'];
        $tanggal = $sheetData[$i]['7'];

        // Cek Apakah Data Sudah Ada Sebelumnya
        $q_cek = "SELECT * FROM tbl_coll_payment";
        $res_cek = mysqli_query($koneksi, $q_cek) or die('error 1');
        $cek = mysqli_num_rows($res_cek);
        $data = mysqli_fetch_array($res_cek);

        if($cek>0){ //kalo data sudah ada sebelumnya
            // Hapus Data Sebelumnya

            // Masukan Data
            mysqli_query($koneksi, "INSERT INTO tbl_coll_payment(cabang, target_all, target_cabang, pers_all_cabang, pencapaian, pers_pencapaian, selisih, tanggal) 
            VALUES ('$cabang','$target_all','$target_cabang', '$pers_all_cabang', '$pencapaian', '$pers_pencapaian', '$selisih', '$tanggal')") or die ('error3');
        }else{
            // Masukan Data
             mysqli_query($koneksi, "INSERT INTO tbl_coll_payment(cabang, target_all, target_cabang, pers_all_cabang, pencapaian, pers_pencapaian, selisih, tanggal) 
            VALUES ('$cabang','$target_all','$target_cabang', '$pers_all_cabang', '$pencapaian', '$pers_pencapaian', '$selisih', '$tanggal')") or die('error4');
        }

    }



    // Redirect Di Laptop Local
     echo '<script>
        alert("Data Berhasil Diupload");window.location="http://10.20.0.30/dashboard-administrator/import_collection.php";
    </script>';

}
?>