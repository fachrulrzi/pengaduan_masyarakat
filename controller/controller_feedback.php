<?php 
include('../../pengaduan_masyarakat/koneksi/koneksi.php');
$id_pelapor =$_POST['id_pelapor'];
$id_penduduk = $_POST['id_penduduk'];
$status = $_POST['status'];
$feedback = $_POST['feedback'] ;
$jenis_aspirasi = $_POST['jenis_aspirasi'];
$alamat = $_POST['alamat'];
$keluhan = $_POST['keluhan'];
$tanggal = $_POST['tanggal'];
$tanggapan = $_POST['tanggapan'];
$bukti = $_POST['bukti'];
$bukti_admin = $_POST['bukti_admin'];
$tanggal_pengerjaan = $_POST['tanggal_pengerjaan'];
echo "
$id_pelapor <br>
$id_penduduk <br>
$status <br>
$feedback <br>
$jenis_aspirasi <br>
$alamat <br>
$keluhan <br>
$tanggal <br>
$tanggapan <br>
$bukti <br>
bukti admin
$bukti_admin <br>
$tanggal_pengerjaan <br>
";
mysqli_query($db, "UPDATE input_aspirasi SET status='$status' where id_pelapor='$id_pelapor'");
mysqli_query($db, "UPDATE status_aspirasi SET status='$status', feedback='$feedback' where id_pelapor='$id_pelapor'");
mysqli_query($db, "INSERT INTO history (id_pelapor, status, feedback, jenis_aspirasi, alamat, keluhan, tanggal, tanggapan, bukti, id_penduduk, bukti_admin, tanggal_pengerjaan) VALUES ('$id_pelapor', '$status', '$feedback', '$jenis_aspirasi', '$alamat', '$keluhan', '$tanggal', '$tanggapan', '$bukti', '$id_penduduk', '$bukti_admin', '$tanggal_pengerjaan')");
header("location: ../../pengaduan_masyarakat/masyarakat/history.php?id_penduduk=$id_penduduk");
?>