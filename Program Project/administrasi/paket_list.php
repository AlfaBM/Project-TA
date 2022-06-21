<?php
session_start();
if($_SESSION['level']==""){
	header("location:..\login_page.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Paket List</title>
	<link rel="stylesheet" href="..\kurir\kurir.css?version=51">
</head>
<body>
	<div class="judul">		
		<h1>PAKET LIST</h1>
	</div>
	<br/>
	<table style="margin-left:auto;margin-right:auto" width="50%" class="table">
		<tr>
            <th>Nama Penerima</th>
            <th>Nama Barang</th>
         	<th>Berat(KG)</th>
            <th>Total Harga</th>
            <th>Status Pengiriman</th>
			<th>Tanggal Pengiriman</th>	
		</tr>
		<?php 
		include '..\koneksi.php';
		$join           = "SELECT nama_penerima, nama_barang, berat, total_biaya, status_pengiriman, tgl_pengiriman FROM transaksi INNER JOIN barang ON transaksi.id_barang=barang.id_barang ORDER BY nama_penerima ASC";
		$select         = mysqli_query($koneksi, $join);
		while($data = mysqli_fetch_array($select)){
		?>
		<tr>
            <td><?php echo $data['nama_penerima']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['berat']; ?></td>
			<td><?php echo $data['total_biaya']; ?></td>
			<td><?php echo $data['status_pengiriman']; ?></td>
			<td><?php echo date('d-m-Y', strtotime($data["tgl_pengiriman"])) ?></td>
		</tr>
		<?php } ?>
	</table>
	<a class="logout" href='halaman_administrasi.php'>KEMBALI</a>
</body>
</html>