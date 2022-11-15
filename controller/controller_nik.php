<?php 
   include '../koneksi/koneksi.php';
       $id_penduduk = $_POST['id_penduduk'];
       $sql = mysqli_query($db, "SELECT * FROM penduduk where id_penduduk = '$id_penduduk'");
       $cek = mysqli_num_rows($sql);
           if($cek > 0){
                   $_SESSION['id_penduduk'] = $id_penduduk;
                   header("location:../masyarakat/index.php?id_penduduk=$id_penduduk");
               } else{
                   header('location: ../index.php?gagal');
               } 
?>