<?php 

function id_data_aspirasi() {
    include('../koneksi/koneksi.php');
    $sql = mysqli_query($db, "SELECT max(id_pelapor) as id FROM input_aspirasi");
    $data = mysqli_fetch_array($sql);
        $id_pelapor = $data['id'];
        $urutan = (int) substr($id_pelapor, 3, 3);
        $urutan++;
        $huruf = "P";
        $id_pelapor = $huruf . sprintf("%03s", $urutan);
    return $id_pelapor;
}
function data_aspirasi() {
    include('../koneksi/koneksi.php');
    $sql = mysqli_query($db, "SELECT * FROM input_aspirasi ");
    return $sql;
}
function penduduk() {
    include('../koneksi/koneksi.php');
    $sql = mysqli_query($db, "SELECT * FROM penduduk");
    $data_penduduk[] = mysqli_fetch_array($sql);
    return $data_penduduk;
}



?>