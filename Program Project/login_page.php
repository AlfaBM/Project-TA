<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
   
    <body>
        <div class="container">
          <h1>Login</h1>
            <?php 
	        if(isset($_GET['pesan'])){
		        if($_GET['pesan']=="gagal"){
			        echo "Username atau Password tidak sesuai";
		        }
	        }
	        ?>
            <form method="post" action="cek_login.php">
                <label>Username</label>
			        <input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			        <label>Password</label>
			        <input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			        <button>Log in</button>
 
			        <br/>
			        <br/>
            </form>
        </div>     
    </body>
</html>