<?php 
include('../../pengaduan_masyarakat/koneksi/koneksi.php');
$id_pelapor = $_POST['id_pelapor'];
$tanggapan = $_POST['tanggapan'];
$status = $_POST['status'];
$tanggal_pengerjaan = $_POST['tanggal_pengerjaan'];
echo( "$tanggapan <br> $tanggal_pengerjaan <br> $bukti_admin <br>  $status <br> $id_pelapor ");
// input gambar
$ekstensi_diperbolehkan	= array('png','jpg');
$bukti_admin = $_FILES['bukti_admin']['name'];
	$tipe_file = $_FILES['bukti_admin']['type'];
	$ukuran	= $_FILES['bukti_admin']['size'];
	$file_tmp = $_FILES['bukti_admin']['tmp_name'];
	$path = "../assets/img/".$bukti_admin;
	if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
		if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, $path);
				$query = mysqli_query($db, "UPDATE input_aspirasi SET tanggapan='$tanggapan', bukti_admin = '$bukti_admin', tanggal_pengerjaan='$tanggal_pengerjaan', bukti_admin='$bukti_admin', status='$status' where id_pelapor='$id_pelapor'");

				$query	= mysqli_query($db, "UPDATE status_aspirasi SET status='$status' where id_pelapor='$id_pelapor'");
                header("location: ../../pengaduan_masyarakat/admin/history.php");
			if($query){
				echo 'FILE BERHASIL DI UPLOAD';
			}else{
				echo 'GAGAL MENGUPLOAD GAMBAR';
			}
		    }else{
				header("location:../../pengaduan_masyarakat/admin/index.php?pesan=ukuran");
		    }
			}else{
			header("location:../../pengaduan_masyarakat/admin/index.php?pesan=ektensi");

	       }





?>