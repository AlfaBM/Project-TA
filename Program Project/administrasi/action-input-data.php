<?php

if ($_POST['Submit'] == "Submit") {
    $nama_pengirim    = $_POST['nama_pengirim'];
    $notelp_pengirim  = $_POST['notelp_pengirim'];
    $alamat_pengirim  = $_POST['alamat_pengirim'];
    $nama_barang      = $_POST['nama_barang'];
    $berat            = $_POST['berat'];
    $nama_penerima    = $_POST['nama_penerima'];
    $alamat_tujuan    = $_POST['alamat_tujuan'];
    $kode_pos         = $_POST['kode_pos'];
    $nama_kurir       = $_POST['nama_kurir'];

    
    if (empty($_POST['nama_pengirim'])||empty($_POST['notelp_pengirim'])||empty($_POST['alamat_pengirim'])||empty($_POST['nama_barang'])
    ||empty($_POST['berat'])||empty($_POST['nama_penerima'])||empty($_POST['alamat_tujuan'])||empty($_POST['kode_pos'])
    ||empty($_POST['nama_kurir'])) {
        ?>
            <script language="JavaScript">
                alert('Data Harap Dilengkapi!');
                document.location='tambah_data.php';
            </script>
        <?php
    }else{
        include '..\koneksi.php';
        
        $query_cek_nama = mysqli_query($koneksi, "SELECT * FROM data_customer WHERE nama_pengirim='$nama_pengirim'");
        $cek_nama = mysqli_num_rows($query_cek_nama);
        if($cek_nama > 0){
            $data_nama = mysqli_fetch_array($query_cek_nama);
            if($notelp_pengirim != $data_nama['notelp_pengirim']||$alamat_pengirim != $data_nama['alamat_pengirim']){
                $querycek = mysqli_query($koneksi, "UPDATE data_cutomer SET notelp_pengirim='$notelp_pengirim', alamat_pengirim='$alamat_pengirim' WHERE nama_pengirim='$nama_pengirim'");
            }else{
            $nama_pengirim = $data_nama['nama_pengirim'];
            $notelp_pengirim  = $data_nama['notelp_pengirim'];
            $alamat_pengirim  = $data_nama['alamat_pengirim'];
            }
        }else{
            $query_input_nama = mysqli_query($koneksi, "INSERT INTO data_customer VALUES ('','$nama_pengirim','$notelp_pengirim','$alamat_pengirim')");
        }

        $query_cek_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang='$nama_barang' AND berat='$berat'");
        $cek_barang = mysqli_num_rows($query_cek_barang);
        if($cek_barang > 0){
            $data_barang = mysqli_fetch_array($query_cek_barang);
            $nama_barang = $data_barang['nama_barang'];
            $berat  = $data_barang['berat'];
        }else{
            $query_input_barang = mysqli_query($koneksi, "INSERT INTO barang VALUES ('','$nama_barang','$berat')");
        }
        
        $query_total_barang = mysqli_query($koneksi, "SELECT id_barang, (berat * 5000) AS total FROM barang WHERE nama_barang='$nama_barang' AND berat ='$berat'");
        $data_total_barang = mysqli_fetch_array($query_total_barang);
        $id_barang = $data_total_barang['id_barang'];
        $total = $data_total_barang['total'];

        
        $query_data_kurir = mysqli_query($koneksi, "SELECT kode_kurir FROM kurir WHERE nama_kurir='$nama_kurir'");
        $data_kurir = mysqli_fetch_array($query_data_kurir);
        $kode_kurir = $data_kurir['kode_kurir'];

        $query_transaksi = mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('','$kode_kurir','$id_barang','$nama_penerima','$alamat_tujuan','$kode_pos','','proses','$total')");
                
        $query_noresi = mysqli_query($koneksi, "SELECT no_resi FROM transaksi WHERE kode_kurir='$kode_kurir' AND id_barang='$id_barang'");
        $data_noresi = mysqli_fetch_array($query_noresi);
        $no_resi = $data_noresi['no_resi'];
        $query_idpengirim = mysqli_query($koneksi, "SELECT id_pengirim FROM data_customer WHERE nama_pengirim='$nama_pengirim' AND notelp_pengirim='$notelp_pengirim' AND alamat_pengirim='$alamat_pengirim'");
        $dataid_pengirim = mysqli_fetch_array($query_idpengirim);
        $id_pengirim = $dataid_pengirim['id_pengirim'];
        $query_detail_transaksi = mysqli_query($koneksi, "INSERT INTO detail_transaksi VALUES ('$no_resi','$id_pengirim')");

        header("location:halaman_administrasi.php");
    }
}

?>