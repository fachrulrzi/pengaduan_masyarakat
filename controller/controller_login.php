<?php 
include('../koneksi/koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($db,"SELECT * FROM admin where username='$username' and password='$password'");
 $d= mysqli_fetch_array($data);
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
    header('location: ../admin/index.php?pesan=berhasil');
}else{
	header("location:../login/login.php?pesan=gagal");
	
}
?>