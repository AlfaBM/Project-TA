<?php
session_start();
if($_SESSION['level']==""){
	header("location:..\login_page.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>administrasi</title>
	    <link rel="stylesheet" href="administrasi.css?version=51">
    </head>
    <body>
        <div class="judul">		
		    <h1>ADMINISTRASI</h1>
	    </div> 
        <div class="text-center">
            <section class="menu t b">
            <a class="logo tambah_logo" href="tambah_data.php">
                <img class= "tambah"src="..\images\tambah.png"></img>
                TAMBAH PAKET
            </a>
            <a class="logo kurir_logo" href="kurir_list.php">
                <img src="..\images\orang.png"></img>
                KURIR
            </a>
            <a class="logo paket_logo" href="paket_list.php">
                <img src="..\images\paket.png"></img>
                PAKET
            </a>
            </section>
        </div>
        <a class='logout' href='..\logout.php'>LOGOUT</a>
    </body>
</html>