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
          <div>
                      <p><h3><b>Laporan Transaksi</b></h3></p>
                      <?php
                    
                		$uidd = $idsession;

                    $tglterkecil = $_GET['tglawal'];
                    $tglterbesar = $_GET['tglakhir'];
                    $sysdate = date("Y-m-d");
                    $denda = 0;

                    if(($tglterkecil>$tglterbesar) | ($tglterkecil>$sysdate) | ($tglterbesar>$sysdate) | ($tglterbesar==NULL) | ($tglterkecil==NULL))
                    {
                      //header("Location:pgw-transaksi.php?status=gagal"); 
					  echo '<script> self.location="pgw-transaksi.php?status=gagal"; </script>';
                    }

                		$query = "SELECT PEMINJAMAN.PID,
                                     PEMINJAMAN.PENGEMBALIAN,
                                     PEMINJAMAN.TOTAL,
                                     PEMINJAMAN.WAKTUPINJAM,
                                     PEMINJAMAN.WAKTUKEMBALI,
                                     PEMINJAMAN.DENDA,
                                     PENGGUNA.NAMA 
                              FROM PENGGUNA,
                                   PEMINJAMAN
                              WHERE PENGGUNA.uid = PEMINJAMAN.uid AND PEMINJAMAN.WAKTUPINJAM <= '$tglterbesar' AND PEMINJAMAN.WAKTUPINJAM >= '$tglterkecil' ORDER BY PEMINJAMAN.WAKTUPINJAM";

                    
                    $result = mysql_query($query);

                    $nomor = 0;
                    $total = 0;

                		print "<table border='1' style='width: 540px;'><tbody>";
                    print "<tr><th>Nomor</th><th>ID Peminjaman</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Total</th><th>Denda</th><th>Peminjam</th></tr>";
                    while($row = mysql_fetch_array($result)){
                      print "<tr>";
                      $nomor = $nomor + 1;
                      if($nomor==1)
                      {
                        $tglterkecil = $row['WAKTUPINJAM'];
                      }
                      else
                      {
                        $tglterbesar = $row['WAKTUPINJAM'];
                      }
                      print "<td>".$nomor."</td>"; 
                      print "<td>".$row['PID']."</td>";
                      print "<td>".$row['WAKTUPINJAM']."</td>";
                      print "<td>".$row['WAKTUKEMBALI']."</td>";
                      print "<td>Rp. ".$row['TOTAL']."</td>";
                      
                      $total = $total + $row['TOTAL'];

                      $temp = $row['DENDA'];
                      if ($temp==null){print "<td>0</td>";}
                      else
                        {
                          print "<td>Rp. ".$row['DENDA']."</td>";
                          $denda = $denda + $row['DENDA'];
                        }
                      print "<td>".$row['NAMA']."</td>";
                      print "</tr>";
                    }print "</tbody></table>";
                    ?>
					  <p></p>
            </div>
            <div>
            <?php
              echo "<b>Periode Transaksi : </b>".$tglterkecil." - ";
              echo $tglterbesar."<br>";
              echo "<b>Jumlah Transaksi : </b>".$nomor."<br>";
              echo "<b>Jumlah Total Pembayaran : </b>".$total."<br>";
              echo "<b>Jumlah Total Denda : </b>".$denda."<br>";
              $hasil = $total + $denda;
              echo "<b>Total Pemasukan : </b>Rp. ".$hasil."<br>";
              
            ?>
            </div>
            </div><!-- end .inner -->
          </div><!-- end body -->
          
          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>