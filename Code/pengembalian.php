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
              <div id="nav">
                   <?php
                  
                  $idsession = $_SESSION['idm'];

                  $lol = mysql_query("SELECT NAMA FROM PENGGUNA WHERE UID='$idsession'");
                  while($row = mysql_fetch_array($lol)){
                  echo "Helloo ".$row["NAMA"]."<br>";}
                  ?>
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
					  <p></p>
							<div class="menu3">
							<a href="account.php">My Account</a>
							<a href="history.php">History</a>
							<a href="pengembalian.php" class="current">Pengembalian Film</a>
							</div>
						<p><h3><b>Film yang mau Dikembalikan</b></h3></p>
						<?php
                
                $uidd = $idsession;

                $query = "SELECT PID,WAKTUPINJAM,WAKTUKEMBALI FROM PEMINJAMAN WHERE
                          UID='$uidd' AND STATUSPJ='Rented'";

                /*
                $query = "SELECT peminjaman.PENGEMBALIAN, peminjaman.WAKTUPINJAM, peminjaman.WAKTUKEMBALI, film.FNAMA, peminjaman.pid ".
                "FROM pengguna,peminjaman,film,detil_peminjaman ".
                "WHERE pengguna.uid='$uidd' and pengguna.uid=peminjaman.uid and film.fid=detil_peminjaman.fid and peminjaman.pid=detil_peminjaman.pid and peminjaman.statuspj='Rented'";
                */
                $result = mysql_query($query);

                print "<table border='1' style='width: 540px;'><tbody>";
                print "<tr><th>ID Peminjaman</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Kembalikan</th></tr>";
                while($row = mysql_fetch_array($result)){
                  print "<tr>";
                  //print "<td>".$row['PENGEMBALIAN']."</td>";
                  print "<td>".$row['PID']."</td>";
                  print "<td>".$row['WAKTUPINJAM']."</td>";
                  print "<td>".$row['WAKTUKEMBALI']."</td>";
                  $lel = $row['PID'];
                  //$lel = "ctrl-pengembalian.php?id=".$row['PID'];
                  print "<td><a href='pengembalian-ctrl.php?id=".$lel."'>Kembalikan</a></td>";
                  print "</tr>";

                }print "</tbody></table>";
				
				if(isset($_GET['denda']))
				{
					$ppidd = $_GET['pid'];
					$dendasql = mysql_query("SELECT * FROM PEMINJAMAN WHERE PID='$ppidd'");
					$row = mysql_fetch_array($dendasql);
					$denda = $row['DENDA'];
					echo "Peminjaman dengan ID ".$ppidd." menghasilkan denda sebesar Rp ".$denda."<br>";
				}
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