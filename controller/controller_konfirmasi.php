<?php 
include "../koneksi/koneksi.php";
$id_pelapor = $_POST['id_pelapor'];
$status = $_POST['status'];
mysqli_query($db, "UPDATE input_aspirasi SET status='$status' where id_pelapor='$id_pelapor'");
mysqli_query($db, "UPDATE status_aspirasi SET status='$status' where id_pelapor='$id_pelapor'");
header("location:../admin/index.php?pesan=berhasil-konfirmasi");
?>