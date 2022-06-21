<?php
session_start();
if($_SESSION['level']==""){
	header("location:..\login_page.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>tambah paket</title>
    <link rel="stylesheet" href="administrasi.css?version=51">
</head>
<body>
    <div class="judul">		
		    <h1>TAMBAH PAKET</h1>
	</div>
    <div style="border:0; padding:10px; width:760px; height:auto;">
<form action="action-input-data.php" method="POST" name="form-input-data">
    <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="46">
                <td width="10%"> </td>
                <td width="25%"> </td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>NAMA PENGIRIM</td>
            <td><input type="text" name="nama_pengirim" size="35" maxlength="50" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>NO TELP PENGIRIM</td>
            <td><input type="text" name="notelp_pengirim" size="35" maxlength="20" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>ALAMAT PENGIRIM</td>
            <td><input type="text" name="alamat_pengirim" size="50" maxlength="150" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>BARANG</td>
            <td><input type="text" name="nama_barang" size="35" maxlength="50" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>BERAT</td>
            <td><input type="text" name="berat" size="20" maxlength="10" value="-kg-"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>NAMA PENERIMA</td>
            <td><input type="text" name="nama_penerima" size="35" maxlength="50" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>ALAMAT TUJUAN</td>
            <td><input type="text" name="alamat_tujuan" size="50" maxlength="150" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>KODE POS</td>
            <td><input type="text" name="kode_pos" size="10" maxlength="10" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>KURIR</td>
            <td><select name="nama_kurir">
                    <option value="">- Pilih Kurir -
                    <option value="bima setya">bima setya
                    <option value="bejo">bejo
                </select></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td> </td>
            <td><input type="submit" name="Submit" value="Submit">   
                <input type="reset" name="reset" value="Reset"></td>
            <td><a href="halaman_administrasi.php">kembali</a></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>