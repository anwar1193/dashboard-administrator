<?php  
	
	require 'koneksi.php';
	require 'function_admin.php';

	$id = $_GET['id'];

	if(hapus_user($id) > 0){
		echo "<script>
			alert('Data User Berhasil Dihapus');
			document.location.href = 'manajemen_user.php';
		</script>";
	}else{
		echo "<script>
			alert('Data User Gagal Dihapus');
			document.location.href = 'manajemen_user.php';
		</script>";
	}

?>