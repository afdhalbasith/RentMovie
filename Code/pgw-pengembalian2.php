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
                  SESSION_START();
                  include 'koneksi.php';
                  $idsession = $_SESSION['ida'];
                  $id =$_GET['PID'];
                  //echo "$id";

                  $lol = mysql_query("SELECT NAMA from pengguna where uid='$idsession'");
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
            <a href="pgw-datafilm.php">Data Film</a>
            <a href="pgw-tambahfilm.php">Tambah Film</a>
            <a href="pgw-transaksi.php">Transaksi</a>
            <a href="pgw-pengembalian.php" class="current">Pengembalian</a>
          </div>
                      <p><h3><b>Detail Pengambilan</b></h3></p>
                    <?php

                     print "ID Peminjaman : "."$id";
                     echo "<br>";
                    $query = "SELECT pengguna.NAMA, pengguna.ALAMAT, pengguna.NOHP FROM pengguna, detil_peminjaman, peminjaman where detil_peminjaman.pid=peminjaman.pid and peminjaman.uid=pengguna.uid and detil_peminjaman.pid='$id'";
                    $result = mysql_query($query);
                    $row = mysql_fetch_array($result);
                    echo "Nama: ".$row["NAMA"]."<br>";
                    echo "Alamat: ".$row["ALAMAT"]."<br>";
                    echo "No HP:".$row["NOHP"]."<br>";
                    

                    $hmm = mysql_query("SELECT detil_peminjaman.FID, film.FNAMA FROM film, detil_peminjaman WHERE detil_peminjaman.FID=film.FID and detil_peminjaman.PID='$id'");
                    print "<table border='1' style='width: 540px;'><tbody>";
                    print "<tr><th>ID Film</th><th>Nama Film</th></tr>";
                    while($row = mysql_fetch_array($hmm)){
                    print "<tr>";
                      print "<td>".$row['FID']."</td>";
                      print "<td>".$row['FNAMA']."</td>";
                    print "</tr>";

                    }print "</tbody></table>";
                    ?>

            <p></p>
            <a class="softleft" /><a href="pgw-pengembalian2-ctrl.php?id=<?php echo $id ?>"/><input type="image" src="images/kembali.jpg" width="70" height="30"/>
            </div><!-- end .inner -->
          </div><!-- end body -->
          
          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>

