<?php
SESSION_START();
include 'koneksi.php';

$id = $_SESSION['idm'];
$nama = $_SESSION['namam'];

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
              <form autocomplete="off" action="searchbox.php" method="get">   
			  <p><div><input name="course" type="teksbox" placeholder="Judul Film" id="course" /></div></p>
              <p><div class="softsearch"><input type="image" src="images/cari.png" width="68" height="20"/></div></p>
              </form>
              </dd>
          </dl>
          
          <div id="body">
			<div class="inner">
              <p><h3><b>Chart Penyewaan</b></h3></p>

              <?php


              if(!isset($_SESSION['idpeminjaman']))
              {
                echo "Anda belum melakukan peminjaman pada sesi ini.<br>";
              }
              else 
              {
                $pid = $_SESSION['idpeminjaman'];
                $sqle = mysql_query("SELECT * FROM PEMINJAMAN WHERE PID='$pid'");

                while($row = mysql_fetch_array($sqle))
                {
                  echo "<b>ID Peminjaman : </b>".$row['PID']."<br>";
                  echo "<b>Waktu Pinjam  : </b>".$row['WAKTUPINJAM']."<br>";
                  //echo "<b>Waktu Kembali : </b>".$row['WAKTUKEMBALI']."<br>";
                  echo "<b>Total         : </b>".$row['TOTAL']."<br>";
                  echo "<br>";
                }
              ?>
              
              <table border="1" style="width: 540px;">
              <tbody>
							<tr><th>ID Film</th><th>Nama Film</th><th>Harga</th><th>Pembatalan</th></tr>
							
              <?php

              $sql = mysql_query("SELECT DETIL_PEMINJAMAN.DID, DETIL_PEMINJAMAN.FID, FILM.FNAMA, FILM.HARGA FROM FILM, DETIL_PEMINJAMAN WHERE DETIL_PEMINJAMAN.FID=FILM.FID and DETIL_PEMINJAMAN.PID='$pid'");
              while($row = mysql_fetch_array($sql))
              {
              echo '<tr><td>'.$row['FID'].'</td><td>'.$row['FNAMA'].'</td><td>'.$row['HARGA'].'</td>
                                                                                                <td>
                                                                                                <form method="GET" action="chart-pembatalan.php">
                                                                                                <input name="did" type="hidden" id="kirim" value="'.$row['DID'].'"/>
                                                                                                <input type="submit" id="kirim" value="Pilih"/>
                                                                                                </form>
                                                                                                </td>
                                                                                                </tr>';
							}

              ?>
              </tbody>
					    </table>

					  <p></p>
            <form method="GET" action="chart-laporan.php">
            <b>Waktu Kembali</b>
            <input type="date" name="waktukembali" value="" placeholder="Alamat">
            <?php
              if(isset($_GET['status']))
              {
                if($_GET['status']=="gagal")
                {
                  echo "<style='font-color: red;'>Waktu Pengembalian Salah.</style><br>";
                }
              }
            ?>
            </p>
					  <class="softleft">
            <input type = "submit" value="Lanjutkan">
            </class="softleft">
            </form>

            <p></p>
            <form method="GET" action="chart-batalpinjam.php">
            </p>
            <class="softleft">
            <input type = "submit" value="Batal">
            </class="softleft">
            </form>
			<?php } ?>
            </div><!-- end .inner -->
          </div><!-- end body -->

          

          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>