<?php
session_start();
if($_SESSION['level']==""){
	header("location:..\login_page.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>list kurir</title>
    <link rel="stylesheet" href="..\kurir\kurir.css?version=51">
</head>
<body>
    <div class="judul">		
		<h1>LIST KURIR</h1>
	</div>
	<br/>
    <table style="margin-left:auto;margin-right:auto" width="50%" class="table">
		<tr>
		 	<th>Nama</th>
		 	<th>No Telp</th>
         	<th>Alamat</th>
            <th>Paket</th>	
		</tr>
		<?php 
		include '..\koneksi.php';
		$join           = "SELECT nama_kurir, notelp_kurir, alamat_kurir, COUNT(status_pengiriman) AS jmlh FROM kurir LEFT JOIN transaksi ON kurir.kode_kurir=transaksi.kode_kurir GROUP BY nama_kurir DESC";
		$select         = mysqli_query($koneksi, $join);
		while($data = mysqli_fetch_array($select)){
		?>
		<tr>
			<td><?php echo $data['nama_kurir']; ?></td>
			<td><?php echo $data['notelp_kurir']; ?></td>
			<td><?php echo $data['alamat_kurir']; ?></td>
			<td><?php echo $data['jmlh']; ?></td>
            <td>
				<a class="confirm" href="detail.php?nama_kurir=<?php echo $data['nama_kurir']; ?>">DETAIL</a> 				
			</td>
		</tr>
		<?php } ?>
	</table>
    <a class="logout" href='halaman_administrasi.php'>KEMBALI</a>
</body>