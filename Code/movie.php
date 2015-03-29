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
                  $fid = $_GET['fid'];

                  echo "Helloo ".$_SESSION['namam']."<br>";
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
            <?php
            //$fid = '5001';
            $zxc = mysql_query("SELECT * FROM FILM WHERE FID='$fid'");
            while($row = mysql_fetch_array($zxc)){
                      print "<h3><b>".$row['FNAMA']."</b></h3>";
                      print "<img src='images/".$fid.".jpg' width='180' height='230' alt='photo 1' class='left' />";
                      print "<p>" .$row['SINOPSIS']."</p>";
                      print "<p><b>Harga : </b>Rp. ". $row['HARGA']."</p>";
                      print "<p><b>Availability : </b>" .$row['STATUSFL']."</p>";
                      $aa =$row['STATUSFL'];

                      }
            ?>          

                       <form action="rent-ctrl.php" method="get">
                        <!-- <div><p><b>Tanggal Penyewaan :</p></b><input name="q" type="text" placeholder="TTTT/MM/DD" class="text" /></div> -->
                        <input name="fid" type="hidden" value="<?php echo $fid; ?>"/>
            <?php
                        if($aa=='Available'){
                        print '<input type="image" src="images/chart.png" width="70" height="30"/>';
                        }
            ?>            
                        </p></form>
            
                  
            </div><!-- end .inner -->
          </div><!-- end body -->
      <div id="body">
      <div class="inner">
         <form action="comment-ctrl.php" method="get">
            <p><b>Komentar :</b></p>
              <p><textarea name="komentar" cols="30" rows="5" id="komentar" placeholder="Comment Here..."></textarea></p>
              <input name="kirim" type="submit" id="kirim" value="Kirim" />
              <input name="fid" type="hidden" value="<?php echo "$fid" ?>" />
              <input name="uid" type="hidden" value="<?php echo "$idsession"?>" />
         </form>
        <div class="clear"></div><div class="clear"></div><div class="clear"></div><div class="clear"></div><div class="clear"></div>
                      <?php
                      $queryy = ("SELECT PENGGUNA.NAMA,MEREVIEW.REVIEW FROM PENGGUNA,MEREVIEW WHERE PENGGUNA.UID=MEREVIEW.UID AND FID='$fid'");
                      $komen = mysql_query($queryy);
                      while($row = mysql_fetch_array($komen)){
                        print "<b>".$row['NAMA']."</b> says...<br>";
                        print "".$row['REVIEW']."<br><br>";                      }
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
