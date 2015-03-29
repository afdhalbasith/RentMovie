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
						<a href="pgw-datafilm.php">Data Film</a>
						<a href="pgw-tambahfilm.php">Tambah Film</a>
						<a href="pgw-transaksi.php">Transaksi</a>
						<a href="pgw-pengembalian.php" class="current">Pengembalian</a>
					</div>
                      <p><h3><b>List Pengembalian FILM</b></h3></p>

                      <!--<?php
                
                		//$uidd = $idsession;
                		//$query = "SELECT peminjaman.PENGEMBALIAN,film.FNAMA,peminjaman.WAKTUPINJAM,peminjaman.WAKTUKEMBALI,pengguna.NAMA,film.STATUSFL FROM pengguna, film, peminjaman, detil_peminjaman WHERE pengguna.uid = peminjaman.uid AND  detil_peminjaman.pid = peminjaman.pid AND film.fid = detil_peminjaman.fid AND peminjaman.statuspj ='Finished'";
                		//$result = mysql_query($query);

                		//print "<table border='1' style='width: 540px;'><tbody>";
                		//print "<tr><th>Tanggal</th><th>Nama Film</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Peminjam</th><th>Pilihan</th></tr>";
                		//while($row = mysql_fetch_array($result)){
                  	//	print "<tr>";
                    //  print "<td>".$row['PENGEMBALIAN']."</td>";
                    //  print "<td>".$row['FNAMA']."</td>";
                    //  print "<td>".$row['WAKTUPINJAM']."</td>";
                    //  print "<td>".$row['WAKTUKEMBALI']."</td>";
                    //  print "<td>".$row['NAMA']."</td>";
                    //  print "<td><a href='pgw-pengembalian2.php?id=".$row['']."'> PILIH </td>";
                    //  print "</tr>";
                		//}print "</tbody></table>";
                		?>-->

                    <?php 
                    $hmm = mysql_query("SELECT * FROM PEMINJAMAN,PENGGUNA WHERE PENGGUNA.UID=PEMINJAMAN.UID AND PEMINJAMAN.STATUSPJ='Finished' ORDER BY WAKTUKEMBALI ");
                    print "<table border='1' style='width: 540px;'><tbody>";
                    print "<tr><th>ID Peminjaman</th><th>Nama Peminjam</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Denda</th><th>Pilihan</th></tr>";
                    while($row = mysql_fetch_array($hmm)){
                    print "<tr>";
                      print "<td>".$row['PID']."</td>";
                      print "<td>".$row['NAMA']."</td>";
                      //print "<td>".$row['FNAMA']."</td>";
                      print "<td>".$row['WAKTUPINJAM']."</td>";
                      print "<td>".$row['WAKTUKEMBALI']."</td>";
					  if($row['DENDA']==NULL)
					  {
						print "<td>0</td>";
					  }
					  else
					  {
					   print "<td>".$row['DENDA']."</td>";
                      }
					  print "<td><a href='pgw-pengembalian2.php?PID=".$row['PID']."'> PILIH </td>";
                      print "</tr>";

                    }print "</tbody></table>";
                    ?>

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