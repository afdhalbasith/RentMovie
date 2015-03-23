<?php
include 'koneksi.php';
SESSION_START();
$id = $_SESSION['idm'];
//$id = '100';
$nama = $_SESSION['namam'];
//$nama = 'Adhi Nurilham';
$pid = $_SESSION['idpeminjaman'];
//$pid = '2040';
$waktukembali = $_GET['waktukembali'];
//$waktukembali = '10-11-12';
$sysdate = date("Y-m-d");
if($waktukembali < $sysdate)
{
  header("Location:chart.php?status=gagal"); 
}

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
      width: 260,
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
         <div class="header">

              <p><h3><b>Laporan Pengiriman</b></h3></p>

              <?php
                /* -----------------------------------------------------------------------------------------------------------
                                              LAPORAN PENGIRIMAN
                -------------------------------------------------------------------------------------------------------------*/
                $sqle = mysql_query("SELECT * FROM peminjaman WHERE PID='$pid'");

                $row = mysql_fetch_array($sqle);
              
                  echo "<b>ID Peminjaman : </b>".$row['PID']."<br>";
                  echo "<b>Waktu Pinjam  : </b>".$row['WAKTUPINJAM']."<br>";
                  echo "<b>Waktu Kembali : </b>".$waktukembali."<br>";
                  //echo "<b>Total         : </b>".$row['TOTAL']."<br>";
                  $total = $row['TOTAL'];
                  $uid = $row['UID'];
                  echo "<br>";
                

              /* ----------------------------------------------------------------------------------------------------------------
                                                DATA PEMINJAM
              -------------------------------------------------------------------------------------------------------------------- */
              $peminjam = mysql_query("SELECT * FROM pengguna WHERE UID='$uid'");
              $row = mysql_fetch_array($peminjam);
              
                echo "<b>Nama Peminjam : </b>".$row['NAMA']."<br>";
                echo "<b>Nomor HP : </b>".$row['NOHP']."<br>";
                echo "<b>Alamat Pengiriman : </b>".$row['ALAMAT']."<br>";
              

              /* ----------------------------------------------------------------------------------------------------------------
                                                DATA FILM
              -------------------------------------------------------------------------------------------------------------------- */
              echo "<div class= 'login1'>";
              echo "<br><b>Film yang dipinjam :</b><br>";

              $nomer = 1;

              $sql = mysql_query("SELECT detil_peminjaman.FID, film.FNAMA, film.HARGA FROM film, detil_peminjaman WHERE detil_peminjaman.FID=film.FID and detil_peminjaman.PID='$pid'");
              while($row = mysql_fetch_array($sql))
              {
                echo $nomer.". ".$row['FNAMA']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['HARGA']."<br>";
                $nomer = $nomer + 1;
              }
               echo "</div>";
               echo "<div class= 'login2'>";
               echo "Total Harga: ".$total."<br>";
               echo "</div>";

              /* ----------------------------------------------------------------------------------------------------------------
                                                INPUT & TOMBOL PEMBAYARAN
              -------------------------------------------------------------------------------------------------------------------- */
              echo "<p></p>";
              $waktu = $waktukembali;
              echo "<form method='GET' action='pembayaran.php'>";
              echo "<input type='hidden' name='waktu' value='".$waktu."'>";
              
              ?>
 
             <class="softleft"><a href="bayar.html"><input type="image" src="images/bayar.png" width="80" height="30"/>
             </a>
             </class="softleft">
             </form>


              <!--
              <form method="GET" action="pembatalan.php">
              <table border="1" style="width: 540px;">
              <tbody>
              <tr><th>ID Film</th><th>Nama Film</th><th>Harga</th><th>Pembatalan</th></tr>
              
              <?php
              /*
              $sql = mysql_query("SELECT detil_peminjaman.FID, film.FNAMA, film.HARGA FROM film, detil_peminjaman WHERE detil_peminjaman.FID=film.FID and detil_peminjaman.PID='$pid'");
              while($row = mysql_fetch_array($sql))
              {
              echo '<tr><td>'.$row['FID'].'</td><td>'.$row['FNAMA'].'</td><td>'.$row['HARGA'].'</td>
                                                                                                <td>
                                                                                          
                                                                                                <input name="fid" type="hidden" id="kirim" value="'.$row['FID'].'"/>
                                                                                                <input name="submit" type="submit" id="kirim" value="Pilih"/>
                                                                                                
                                                                                                </td>
                                                                                                </tr>';
              }
              */
              ?>
              </tbody>
              </table>
              </form>
            

            <p></p>
            <form method="GET" action="pembayaran.php">
            <b>Waktu Kembali</b>
            <input type="date" name="waktukembali" value="" placeholder="Alamat"></p>
            <class="softleft"><a href="bayar.html"><input type="image" src="images/bayar.png" width="80" height="30"/>
            </a>
            </class="softleft">
            </form>
            --></div>
            </div><!-- end .inner -->
          </div><!-- end body -->

          <?php //} ?>

          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>