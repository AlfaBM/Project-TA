<?php 
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"select * from login where username='$username' and password='$password'");

$cek = mysqli_num_rows($login);

if($cek > 0){
	$data = mysqli_fetch_array($login);

    if($data['level']=="kurir"){
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['level'] = "kurir";
	header("location:kurir\halaman_kurir.php");

    }else if($data['level']=="administrasi"){
	$_SESSION['level'] = "administrasi";
	header("location:administrasi\halaman_administrasi.php");

    }else{
	header("location:login_page.php?pesan=gagal");
    }
}else{
	header("location:login_page.php?pesan=gagal");
}
?>