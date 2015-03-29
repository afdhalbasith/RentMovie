<?php
SESSION_START();
include 'koneksi.php';


$id = $_SESSION['ida'];
$nama = $_SESSION['namaa'];

?>

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
              <div id="nav">
              	  <?php echo "Heloo ".$nama."<br>" ?>
                  <a href="logout.php">Log Out</a>
              </div><!-- end nav -->
              <a href="pgw-pengembalian.php"><img src="images/header_1.jpg" width="744" height="223" alt="Harry Potter cd" /></a>
              <!--<a href="#"><img src="images/header_2.jpg" width="744" height="48" alt="" /></a>-->
          </div><!-- end header -->
          
			<div class="inner">
				<div class="menu3">
            	<a href="pgw-datafilm.php">Data Film</a>
            	<a href="pgw-tambahfilm.php">Tambah Film</a>
            	<a href="pgw-transaksi.php">Transaksi</a>
            	<a href="pgw-pengembalian.php" class="current">Pengembalian</a>
          		</div>
				<dd class="searchform">
                <p></p>
                	<form method = "GET" action = "pgw-tambahfilm-ctrl.php">
					<input type="text" name="namaf" value="" placeholder="Nama Film"></p>
					<input type="text" name="kategori" value="" placeholder="Category"></p>
					<input type="text" name="harga" value="" placeholder="Harga"></p>
					<p><b>Sinopsis</b></p>
					<p><textarea name="sinopsis" cols="30" rows="5" id="komentar"></textarea></p>
					<p></p>
					<input name="kirim" type="submit" id="kirim" value="Simpan" />
				</form>
				</dd>
            </div><!-- end .inner -->
          
          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>