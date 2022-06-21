<?php
session_start();
if($_SESSION['level']==""){
	header("location:..\login_page.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
	<link rel="stylesheet" href="..\kurir\kurir.css?version=51">
</head>
<body>
	<div class="judul">		
		<h1>DETAIL KURIR</h1>
	</div>
	<br/>
	<table style="margin-left:auto;margin-right:auto" width="50%" class="table">
		<tr>
		 	<th>Nama Penerima</th>
		 	<th>Nama barang</th>
         	<th>Alamat</th>
            <th>kode pos</th>
            <th>Status Pengiriman</th>		
		</tr>
		<?php 
		include '..\koneksi.php';
        $nama           = $_GET['nama_kurir'];
		$join           = "SELECT * FROM kurir LEFT JOIN barang INNER JOIN transaksi ON barang.id_barang = transaksi.id_barang ON kurir.kode_kurir = transaksi.kode_kurir WHERE nama_kurir='$nama' ORDER BY no_resi DESC";
		$select         = mysqli_query($koneksi, $join);
		while($data = mysqli_fetch_array($select)){
		?>
		<tr>
			<td><?php echo $data['nama_penerima']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['alamat_tujuan']; ?></td>
			<td><?php echo $data['kode_pos']; ?></td>
			<td><?php echo $data['status_pengiriman']; ?></td>
		</tr>
		<?php } ?>
	</table>
	<a class="logout" href='kurir_list.php'>KEMBALI</a>
</body>
</html>