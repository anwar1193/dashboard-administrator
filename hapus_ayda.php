<?php  
	
	require 'koneksi.php';
	require 'function_admin.php';

	$id = $_GET['id'];

	if(hapus_ayda($id) > 0){
		echo "<script>
			alert('Data Ayda Berhasil Dihapus');
			document.location.href = 'ayda.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Ayda Gagal Dihapus');
			document.location.href = 'ayda.php';
		</script>";
	}

?>