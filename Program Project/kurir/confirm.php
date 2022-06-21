<?php 
session_start();

include '..\koneksi.php';

$data = $_GET['no_resi'];
$tgl = date('Y-m-d');

$quer = mysqli_query($koneksi,"UPDATE transaksi SET status_pengiriman='terkirim', tgl_pengiriman='$tgl' WHERE no_resi='$data'");

header("location:halaman_kurir.php");
?>