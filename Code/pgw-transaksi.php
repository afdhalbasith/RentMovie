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
              <a href="pgw-pengembalian.php"><img src="images/header_1.jpg" width="744" height="223" alt="Harry Potter cd" /></a>
              <!--<a href="#"><img src="images/header_2.jpg" width="744" height="48" alt="" /></a>-->
          </div><!-- end header -->
          
			<div class="inner">
					<div class="menu3">
						<a href="pgw-datafilm.php">Data Film</a>
						<a href="pgw-tambahfilm.php">Tambah Film</a>
						<a href="pgw-transaksi.php" class="current">Transaksi</a>
						<a href="pgw-pengembalian.php">Pengembalian</a>
					</div>
                      <p><h3><b>Laporan Transaksi</b></h3></p>

                      
                      <form method="GET" action="pgw-transaksi-all.php" >
                      <p><b>Semua Transaksi</b></p>
                      <input type="submit" value="Pilih">
                      </form>

                      <form method="GET" action="pgw-transaksi-tgl.php" >
                      <p><b>Transaksi berdasarkan tanggal</b></p>
                      <b>Tanggal Awal: </b>
                      <input type="date" name="tglawal">&nbsp;&nbsp;
                      <b>Tanggal Akhir: </b>
                      <input type="date" name="tglakhir">

                      <?php
                        if(isset($_GET['status']))
                        {
                          if($_GET['status'] == 'gagal')
                          {
                            echo "&nbsp;&nbsp;Input Tanggal Salah!";
                          }
                        }
                      ?>
                      <br>
                      <input type="submit" value="Pilih">
                      </form>
                      <p><b>Graph Transaksi Berdasarkan Kategori Film</b></p>
                      <img src="graphtest.php" />
                      
					  <p></p>
            </div><!-- end .inner -->
          </div><!-- end body -->
          
          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>