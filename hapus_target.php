<?php  
	
	require 'koneksi.php';
	require 'function_admin.php';

	$id = $_GET['id'];

	if(hapus_target($id) > 0){
		echo "<script>
			alert('Data Target Sales Berhasil Dihapus');
			document.location.href = 'target_sales.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Target Sales Gagal Dihapus');
			document.location.href = 'target_sales.php';
		</script>";
	}

?>