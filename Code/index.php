<?php
SESSION_START();
include 'koneksi.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script type="text/javascript" src="jquery.js"></script>
  <script type='text/javascript' src='jquery.autocomplete.js'></script>
  <link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />

  <script type="text/javascript">
  $().ready(function() {
    $("#course").autocomplete("searchbox-ctrl.php", {
      width: 175,
      matchContains: true,
      //mustMatch: true,
      //minChars: 0,
      //multiple: true,
      //highlight: false,
      //multipleSeparator: ",",
      selectFirst: false
    });
  });
  </script>
	<title>Movie Rent</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="wrapper">
      <div id="inner">
          <div id="header">
          
              <div class="login">
            <form method = "GET" action = "index-ctrl.php">

            <?php
              if(isset($_GET['status']) && $_GET['status']=="gagal")
              {
                echo "<div>
                <b>Gagal!</b> Silahkan coba lagi
                </div>";
              }
              else if(isset($_GET['status']) && $_GET['status']=="signup")
              {
                echo "<div>
                <b>Terimakasih telah melakukan pendaftaran</b><br>
                Silahkan Melakukan Log In
                </div>"; 
              } 
            ?>             

					<p><input type="text" placeholder="Username" name="username"></p>
					<p><input type="password" placeholder="Password" name="password"></p>
					<p></p>
					<a class="softleft" /><a href="index-ctrl.php"/><input type="image" src="images/signin.png" width="70" height="30"/>
          </form>
          <br><br>
          <a class="softleft" /><a href="signup.php"/><input type="image" src="images/singup.png" width="70" height="30"/> 
              </div>
          
              <a href="#"><img src="images/login.jpg" width="744" height="500" alt="Harry Potter cd" /></a>
          </div><!-- end header -->
          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
      </div><!-- end inner -->
  </div><!-- end wrapper -->
</body>
</html>
