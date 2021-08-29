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
        $tahun = $sheetData[$i]['2'];
        $jan = $sheetData[$i]['3'];
        $feb = $sheetData[$i]['4'];
        $mar = $sheetData[$i]['5'];
        $apr = $sheetData[$i]['6'];
        $mei = $sheetData[$i]['7'];
        $jun = $sheetData[$i]['8'];
        $jul = $sheetData[$i]['9'];
        $agu = $sheetData[$i]['10'];
        $sep = $sheetData[$i]['11'];
        $okt = $sheetData[$i]['12'];
        $nov = $sheetData[$i]['13'];
        $des = $sheetData[$i]['14'];
        $total = $jan + $feb + $mar + $apr + $mei + $jun + $jul + $agu + $sep + $okt + $nov + $des;

        // Cek Apakah Data Sudah Ada Sebelumnya
        $q_cek = "SELECT * FROM tbl_target WHERE BranchName='$cabang' AND tahun='$tahun'";
        $res_cek = mysqli_query($koneksi, $q_cek) or die('error 1');
        $cek = mysqli_num_rows($res_cek);
        $data = mysqli_fetch_array($res_cek);

        if($cek>0){ //kalo data sudah ada sebelumnya
            // Hapus Data Sebelumnya
            mysqli_query($koneksi, "DELETE FROM tbl_target WHERE BranchName='$cabang' AND tahun='$tahun'") or die ('error2');

            // Masukan Data
            mysqli_query($koneksi, "INSERT INTO tbl_target(BranchName, tahun, JAN, FEB, MAR, APR, MEI, JUN, JUL, AGU, SEP, OKT, NOV, DES, TOTAL) 
            VALUES ('$cabang','$tahun','$jan','$feb','$mar','$apr','$mei','$jun','$jul','$agu','$sep','$okt','$nov','$des','$total')") or die ('error3');
        }else{
            // Masukan Data
             mysqli_query($koneksi, "INSERT INTO tbl_target(BranchName, tahun, JAN, FEB, MAR, APR, MEI, JUN, JUL, AGU, SEP, OKT, NOV, DES, TOTAL) 
            VALUES ('$cabang','$tahun','$jan','$feb','$mar','$apr','$mei','$jun','$jul','$agu','$sep','$okt','$nov','$des','$total')") or die('error4');
        }

    }



    // Redirect Di Laptop Local
     echo '<script>
        alert("Data Berhasil Diupload");window.location="http://10.20.0.30/dashboard-administrator/target_sales.php";
    </script>';

}
?>