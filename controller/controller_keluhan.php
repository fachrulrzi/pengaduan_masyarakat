<?php 
include('../koneksi/koneksi.php');
include('controller_function.php');
$id_pelapor = $_POST['id_pelapor'];
$id_penduduk = $_POST['id_penduduk'];
$status = $_POST['status'];
$jenis_aspirasi = $_POST['jenis_aspirasi'];
$alamat = $_POST['alamat'];
$keluhan = $_POST['keluhan'];
$tanggal = $_POST['tanggal'];
// input gambar
	$ekstensi_diperbolehkan	= array('png','jpg');
	$bukti = $_FILES['file']['name'];
	$tipe_file = $_FILES['file']['type'];
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$path = "../assets/img/".$bukti;
	if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
		if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, $path);
				$query = mysqli_query($db, "INSERT INTO input_aspirasi (id_pelapor, id_penduduk, jenis_aspirasi,tanggal,alamat,keluhan,status, bukti) VALUES ('$id_pelapor', '$id_penduduk','$jenis_aspirasi', '$tanggal', '$alamat', '$keluhan', '$status', '$bukti')");
				$query	= mysqli_query($db, "INSERT INTO status_aspirasi (id_pelapor, status) VALUES ('$id_pelapor', '$status')");
                    header("location:../../pengaduan_masyarakat/masyarakat/index.php?id_penduduk=$id_penduduk&&pesan=berhasil");
			if($query){
				echo 'FILE BERHASIL DI UPLOAD';
			}else{
				echo 'GAGAL MENGUPLOAD GAMBAR';
			}
		    }else{
				header("location:../masyarakat/index.php?id_penduduk=$id_penduduk&&pesan=ukuran");
		    }
			}else{
			header("location:../masyarakat/index.php?id_penduduk=$id_penduduk&&pesan=ektensi");

	       }

		   




?>