<?php
SESSION_START();
include 'koneksi.php';

$id = $_SESSION['idm'];
$nama = $_SESSION['namam'];
$pid = $_SESSION['idpeminjaman'];

$waktukembali = $_GET['waktu'];


$update = "UPDATE PEMINJAMAN SET WAKTUKEMBALI = '$waktukembali' WHERE PID = '$pid'";
$jalankan = mysql_query($update);

$update = "UPDATE PEMINJAMAN SET STATUSPJ = 'Rented' WHERE PID = '$pid'";
$jalankan = mysql_query($update);

unset($_SESSION['idpeminjaman']);

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
              <?php echo "Hello, ".$nama; ?> <br>
                  <a href="account.php">My Account</a> | <a href="chart.php">Chart Sewa</a> | <a href="logout.php">Log Out</a>
              </div><!-- end nav -->
              <a href="homepage.php"><img src="images/header_1.jpg" width="744" height="223" alt="Harry Potter cd" /></a>
              <!--<a href="#"><img src="images/header_2.jpg" width="744" height="48" alt="" /></a>-->
          </div><!-- end header -->
          <dl id="browse">
              <dt>Full Category Lists</dt>
			        <dd><a href="searchall.php">All Movie</a></dd>
              <dd><a href="searchkategori.php?kategori=Action">Action</a></dd>
              <dd><a href="searchkategori.php?kategori=Anime">Anime</a></dd>
              <dd><a href="searchkategori.php?kategori=Adventure">Adventure</a></dd>
              <dd><a href="searchkategori.php?kategori=Drama">Drama</a></dd>
              <dd><a href="searchkategori.php?kategori=Horror">Horror</a></dd>
              <dd><a href="searchkategori.php?kategori=Musicals">Musicals</a></dd>
              <dd><a href="searchkategori.php?kategori=Mystery">Mystery</a></dd>
              <dd><a href="searchkategori.php?kategori=Fiction">Fiction</a></dd>
              
              <dt>Search Your Favourite Movie</dt>
              <dd class="searchform">
                <form action="?" method="get">
					<p><div><input name="q" type="teksbox" placeholder="Judul FIlm" class="text" /></div></p>
                    <p><div><select name="cat">
                        <option value="-" selected="selected">CATEGORIES</option>
                        <option value="-">Action</option>
						<option value="-">Anime</option>
						<option value="-">Adventure</option>
						<option value="-">Drama</option>
						<option value="-">Horror</option>
						<option value="-">Musicals</option>
						<option value="-">Mystery</option>
						<option value="-">Fiction</option>
                    </select></div>
                    <p><div class="softsearch"><input type="image" src="images/cari.png" width="68" height="20"/></div></p>
                </form>
              </dd>
          </dl>
          
          <div id="body">
			<div class="inner">

			<h3>Terimakasih telah menggunakan jasa kami!</h3>
			<form action="homepage.php">
			<h3><input type="submit" value="Continue" /></h3>
			</form>

			</div><!-- end .inner -->
          </div><!-- end body -->

          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>
