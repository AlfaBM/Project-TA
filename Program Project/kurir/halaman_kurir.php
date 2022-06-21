<?php
session_start();

if($_SESSION['level']==""){
	header("location:..\login_page.php");
}

$nama			= $_SESSION['nama'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kurir</title>
	<link rel="stylesheet" href="kurir.css">
</head>
<body>
	<div class="judul">		
		<h1>PAKET</h1>
	</div>
	<br/>

		<form action="halaman_kurir.php" method="get">
			<input type="text" name="cari_nama_penerima" Value="-nama penerima-">
			<input type="submit" Value="cari">
		</form>
	
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
		
		if(isset($_GET['cari_nama_penerima'])){
			if($_GET['cari_nama_penerima']==""||$_GET['cari_nama_penerima']=="-nama penerima-"){
				$join           = "SELECT * FROM kurir LEFT JOIN barang INNER JOIN transaksi ON barang.id_barang = transaksi.id_barang ON kurir.kode_kurir = transaksi.kode_kurir WHERE status_pengiriman='proses' AND nama_kurir='$nama' ORDER BY no_resi DESC";
				$select         = mysqli_query($koneksi, $join);
			}else{
			$cari = $_GET['cari_nama_penerima'];
			$join = "SELECT * FROM kurir LEFT JOIN barang INNER JOIN transaksi ON barang.id_barang = transaksi.id_barang ON kurir.kode_kurir = transaksi.kode_kurir WHERE status_pengiriman='proses' AND nama_kurir='$nama' AND nama_penerima='$cari' ORDER BY no_resi DESC";
			$select = mysqli_query($koneksi, $join);
			}
		}else{
			$join           = "SELECT * FROM kurir LEFT JOIN barang INNER JOIN transaksi ON barang.id_barang = transaksi.id_barang ON kurir.kode_kurir = transaksi.kode_kurir WHERE status_pengiriman='proses' AND nama_kurir='$nama' ORDER BY no_resi DESC";
			$select         = mysqli_query($koneksi, $join);
		}
		while($data = mysqli_fetch_array($select)){
		?>
		<tr>
			<td><?php echo $data['nama_penerima']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['alamat_tujuan']; ?></td>
			<td><?php echo $data['kode_pos']; ?></td>
			<td><?php echo $data['status_pengiriman']; ?></td>
			<td>
				<a class="confirm" href="confirm.php?no_resi=<?php echo $data['no_resi']; ?>">CONFIRM</a> 				
			</td>
		</tr>
		<?php } ?>
	</table>
	<a class='logout' href='..\logout.php'>LOGOUT</a>
</body>
</html>