<?php 
$koneksi = mysqli_connect("localhost","root","","db_ekspedisi");
 

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>