<?php 

function home() {
    include('koneksi/koneksi.php');
    $sql = mysqli_query($db, "SELECT * FROM history ORDER BY id_pelapor");
    return $sql;
}
?>