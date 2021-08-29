<?php  

	function tampil_data($query){
		global $koneksi;
		$result = mysqli_query($koneksi, $query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah_user($data){
		global $koneksi;
		$nama_lengkap = htmlspecialchars($data['nama_lengkap']);
		$username = htmlspecialchars(strtolower($data['username']));
		$password = htmlspecialchars(mysqli_real_escape_string($koneksi,$data['password']));
		$password2 = htmlspecialchars($data['password2']);
		$level = htmlspecialchars($data['level']);

		// Cek Apakah Ada Username yang Sama
		$q_sama = "SELECT username FROM tbl_user WHERE username='$username'";
		$res_sama = mysqli_query($koneksi, $q_sama);
		$cek_sama = mysqli_num_rows($res_sama);
		if($cek_sama > 0){
			echo "<script>
				alert('Username Yang Anda Masukkan Sudah Terdaftar');
				document.location.href = 'tambah_user.php';
			</script>";
			return false;
		}

		// Cek Apakah Password dan Konfirmasinya sama
		if($password != $password2){
			echo "<script>
				alert('Password & Konfirmasinya Tidak Sesuai');
				document.location.href = 'tambah_user.php';
			</script>";
			return false;
		}

		// Enkripsi Password
		$password = md5($password);

		// Masukkan data user ke database
		mysqli_query($koneksi, "INSERT INTO tbl_user VALUES('', '$nama_lengkap', '$username', '$password', '$level', '', '', '')");

		return mysqli_affected_rows($koneksi);

	}


	function update_user($data){
		global $koneksi;
		$id = $data['id'];
		$nama_lengkap = htmlspecialchars($data['nama_lengkap']);
		$username = htmlspecialchars(strtolower($data['username']));
		$level = htmlspecialchars($data['level']);


		// Masukkan data user ke database
		mysqli_query($koneksi, "UPDATE tbl_user SET nama_lengkap='$nama_lengkap', username='$username', level='$level' WHERE id=$id");

		return mysqli_affected_rows($koneksi);

	}

	function hapus_user($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id=$id");
		return mysqli_affected_rows($koneksi);
	}

	// ................................................................................................................................ 

	function tambah_target($data){
		global $koneksi;
		$cabang = $data['cabang'];
		$tahun = $data['tahun'];
		$jan = $data['jan'];
		$feb = $data['feb'];
		$mar = $data['mar'];
		$apr = $data['apr'];
		$mei = $data['mei'];
		$jun = $data['jun'];
		$jul = $data['jul'];
		$agu = $data['agu'];
		$sep = $data['sep'];
		$okt = $data['okt'];
		$nov = $data['nov'];
		$des = $data['des'];
		$total = $jan + $feb + $mar + $apr + $mei + $jun + $jul + $agu + $sep + $okt + $nov + $des;

		$query = "INSERT INTO tbl_target VALUES('', '$cabang', $tahun, '$jan', '$feb', '$mar', '$apr', '$mei', '$jun', '$jul', '$agu', '$sep', '$okt', '$nov', '$des', '$total')";
		mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
	}

	function update_target($data){
		global $koneksi;
		$id = $data['id'];
		$cabang = $data['cabang'];
		$tahun = $data['tahun'];
		$jan = $data['jan'];
		$feb = $data['feb'];
		$mar = $data['mar'];
		$apr = $data['apr'];
		$mei = $data['mei'];
		$jun = $data['jun'];
		$jul = $data['jul'];
		$agu = $data['agu'];
		$sep = $data['sep'];
		$okt = $data['okt'];
		$nov = $data['nov'];
		$des = $data['des'];
		$total = $jan + $feb + $mar + $apr + $mei + $jun + $jul + $agu + $sep + $okt + $nov + $des;

		$query = "UPDATE tbl_target SET BranchName='$cabang', tahun=$tahun, JAN='$jan', FEB='$feb', MAR='$mar', APR='$apr', MEI='$mei', JUN='$jun', JUL='$jul', AGU='$agu', SEP='$sep', OKT='$okt', NOV='$nov', DES='$des', TOTAL='$total' WHERE id=$id";

		mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
	}

	function hapus_target($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM tbl_target WHERE id=$id");
		return mysqli_affected_rows($koneksi);
	}

	// ................................................................................................................................ 

	function tambah_portfolio($data){
		global $koneksi;
		$cabang = $data['cabang'];
		$tahun = $data['tahun'];
		$jan = $data['jan'];
		$feb = $data['feb'];
		$mar = $data['mar'];
		$apr = $data['apr'];
		$mei = $data['mei'];
		$jun = $data['jun'];
		$jul = $data['jul'];
		$agu = $data['agu'];
		$sep = $data['sep'];
		$okt = $data['okt'];
		$nov = $data['nov'];
		$des = $data['des'];

		$query = "INSERT INTO tbl_portfolio VALUES('', '$cabang', $tahun, '$jan', '$feb', '$mar', '$apr', '$mei', '$jun', '$jul', '$agu', '$sep', '$okt', '$nov', '$des')";
		mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
	}

	function update_portfolio($data){
		global $koneksi;
		$id = $data['id'];
		$cabang = $data['cabang'];
		$tahun = $data['tahun'];
		$jan = $data['jan'];
		$feb = $data['feb'];
		$mar = $data['mar'];
		$apr = $data['apr'];
		$mei = $data['mei'];
		$jun = $data['jun'];
		$jul = $data['jul'];
		$agu = $data['agu'];
		$sep = $data['sep'];
		$okt = $data['okt'];
		$nov = $data['nov'];
		$des = $data['des'];

		$query = "UPDATE tbl_portfolio SET cabang='$cabang', tahun=$tahun, jan='$jan', feb='$feb', mar='$mar', apr='$apr', mei='$mei', jun='$jun', jul='$jul', agu='$agu', sep='$sep', okt='$okt', nov='$nov', des='$des' WHERE id=$id";
		mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
	}

	function hapus_portfolio($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM tbl_portfolio WHERE id=$id");
		return mysqli_affected_rows($koneksi);
	}


	// ................................................................................................................................ 

	function tambah_ayda($data){
		global $koneksi;
		$cabang = $data['cabang'];
		$bulan = $data['bulan'];
		$tahun = $data['tahun'];
		$os_awal = $data['os_awal'];
		$unit_awal = $data['unit_awal'];
		$penambahan_os = $data['penambahan_os'];
		$penambahan_unit = $data['penambahan_unit'];
		$pengurangan_os = $data['pengurangan_os'];
		$pengurangan_unit = $data['pengurangan_unit'];

		$os_akhir = $os_awal + $penambahan_os - $pengurangan_os;
		$unit_akhir = $unit_awal + $penambahan_unit - $pengurangan_unit;

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
			</script>';
			return false;
		}

		// Penutup validasi mundur max 1 Bulan

		$query = "INSERT INTO tbl_ayda_asli VALUES('', '$cabang', '$bulan', '$tahun', '$os_awal', '$unit_awal', '$penambahan_os', '$penambahan_unit', '$pengurangan_os', '$pengurangan_unit', '$os_akhir', '$unit_akhir')";
		mysqli_query($koneksi, $query);

		// Ubah tbl_tgl_ayda
		$tanggal = date('d/m/Y');
		mysqli_query($koneksi, "UPDATE tbl_tgl_ayda SET tanggal='$tanggal' WHERE id != ''");

		return mysqli_affected_rows($koneksi);
	}


	function update_ayda($data){
		global $koneksi;
		$id = $data['id'];
		$cabang = $data['cabang'];
		$bulan = $data['bulan'];
		$tahun = $data['tahun'];
		$os_awal = $data['os_awal'];
		$unit_awal = $data['unit_awal'];
		$penambahan_os = $data['penambahan_os'];
		$penambahan_unit = $data['penambahan_unit'];
		$pengurangan_os = $data['pengurangan_os'];
		$pengurangan_unit = $data['pengurangan_unit'];

		$os_akhir = $os_awal + $penambahan_os - $pengurangan_os;
		$unit_akhir = $unit_awal + $penambahan_unit - $pengurangan_unit;

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
			</script>';
			return false;
		}

		// Penutup validasi mundur max 1 Bulan

		$query = "UPDATE tbl_ayda_asli SET BranchName='$cabang', bulan='$bulan', tahun='$tahun', os_awal='$os_awal', unit_awal='$unit_awal', penambahan_os='$penambahan_os', penambahan_unit='$penambahan_unit', pengurangan_os='$pengurangan_os', pengurangan_unit='$pengurangan_unit', os_akhir='$os_akhir', unit_akhir='$unit_akhir' WHERE id=$id";
		
		mysqli_query($koneksi, $query);

		// Ubah tbl_tgl_ayda
		$tanggal = date('d/m/Y');
		mysqli_query($koneksi, "UPDATE tbl_tgl_ayda SET tanggal='$tanggal' WHERE id != ''");

		return mysqli_affected_rows($koneksi);
	}


	function hapus_ayda($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM tbl_ayda_asli WHERE id=$id");
		return mysqli_affected_rows($koneksi);
	}


?>