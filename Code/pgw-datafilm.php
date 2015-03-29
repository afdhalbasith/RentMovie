<?php
SESSION_START();
include 'koneksi.php';
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
              	<?php
                  
                  $idsession = $_SESSION['ida'];

                  $lol = mysql_query("SELECT NAMA FROM PENGGUNA WHERE UID='$idsession'");
                  while($row = mysql_fetch_array($lol)){
                  echo "Helloo ".$row["NAMA"]."<br>";}
                  ?>
                  <a href="logout.php">Log Out</a>
              </div><!-- end nav -->
              <a href="#"><img src="images/header_1.jpg" width="744" height="223" alt="Harry Potter cd" /></a>
              <!--<a href="#"><img src="images/header_2.jpg" width="744" height="48" alt="" /></a>-->
          </div><!-- end header -->
          
          
			<div class="inner">
					<div class="menu3">
						<a href="pgw-datafilm.php" class="current">Data Film</a>
						<a href="pgw-tambahfilm.php">Tambah Film</a>
						<a href="pgw-transaksi.php">Transaksi</a>
						<a href="pgw-pengembalian.php">Pengembalian</a>
					</div>
                      <p><h3><b>DATA FILM</b></h3></p>
                      <?php
                
                		$uidd = $idsession;
                		$query = "SELECT * FROM FILM";
                		$result = mysql_query($query);

                		print "<table border='1' style='width: 540px;'><tbody>";
                		print "<tr><th>Nama Film</th><th>Kategory</th><th>Sinopsis</th><th>Harga</th><th>Status</th></tr>";
                		while($row = mysql_fetch_array($result)){
                  		print "<tr><td>".$row["FNAMA"]. "</td><td>".$row['KATEGORI']."</td><td>".$row['SINOPSIS']. "</td><td>Rp. ".$row['HARGA']. "</td><td>".$row['STATUSFL']."</td></tr>";
                		}print "</tbody></table>";
                		?>
            </div><!-- end .inner -->
          </div><!-- end body -->
          
          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>