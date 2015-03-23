<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Movie Rent</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="wrapper">
      <div id="inner">
          <div id="header">
          <div class="login" >
          <?php
          if(isset($_GET['status']))
          {
            echo "<b>Data harus diisi secara lengkap</b>";
            echo "<br>";
            echo "<br>";
          }
          ?>
          <form method = "GET" action = "signup-ctrl.php">
          <b>Name</b>
          <input type="text" name="name" value="" placeholder="Name"></p>
          <b>Username</b>
          <input type="text" name="username" value="" placeholder="Username"></p>
					<b>Password</b>
          <input type="password" name="password" value="" placeholder="Password"></p>
					<b>Email</b>
          <input type="text" name="email" value="" placeholder="Email"></p>
          <b>Alamat</b>
          <input type="text" name="alamat" value="" placeholder="Alamat"></p>
					<b>No HP</b>
          <input type="text" name="nohp" value="" placeholder="No Hp"></p>
					<p></p>
					<span class="softright" /><a href="index.php?status=signup"/><input type="image" src="images/singup.png" width="70" height="30"/></a></span>
              </div>
          </form>
              <img src="images/sign up.jpg" width="744" height="800 alt="Harry Potter cd" />
          </div><!-- end header -->
          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
          }
      </div><!-- end inner -->
  </div><!-- end wrapper -->
</body>
</html>
