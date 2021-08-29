<?php  
	
	require 'koneksi.php';
	require 'function_admin.php';

	$id = $_GET['id'];

	if(hapus_portfolio($id) > 0){
		echo "<script>
			alert('Data Portfolio Berhasil Dihapus');
			document.location.href = 'portfolio.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Portfolio Gagal Dihapus');
			document.location.href = 'portfolio.php';
		</script>";
	}

?>