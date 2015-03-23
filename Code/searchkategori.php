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
                  SESSION_START();
                  include 'koneksi.php';
                  //$idsession = '100';
                  $idsession = $_SESSION['idm'];
                  //$kategori = 'Action';
                  $kategori = $_GET['kategori'];

                  $lol = mysql_query("SELECT NAMA from pengguna where uid='$idsession'");
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
                  <?php
                  $lolz = mysql_query("SELECT * from film WHERE KATEGORI='$kategori' order by FNAMA");
                  while($row = mysql_fetch_array($lolz)){$judul = $row['FNAMA']."<br>"; $sinopsis = $row['SINOPSIS']."<br>";$harga = $row['HARGA']."<br>";$stausfl = $row['STATUSFL']."<br>";
                  
                  echo "<div class='boxed'>";
                  echo "    <h3><b>".$judul."</b></h3>";
                  echo "    <img src='images/".$row['FID'].".jpg' width='93' height='130' alt='photo 1' class='left' />";
                  echo "    <p class='sinop'>".$sinopsis;
                  echo "    <p><b>Harga :  </b>Rp. " .$harga;
                  echo "    <p><b>Availability :</b>".$stausfl."</p>";
                  
                  echo "    <a class='readmore'><a href='movie.php?fid=".$row['FID']."'><b>RENT NOW</b></a></a></p>";
                  echo "    <div class='clear'></div>";
                  echo "</div>";

                  }
                  ?>

                  <div class="clear br"></div>

                 

                  <div class="clear"></div>
                  
              </div><!-- end .inner -->
          </div><!-- end body -->
          
          <div class="clear"></div>
          <div id="footer">
              Kelompok (07) MPPL-E
          </div><!-- end footer -->
      </div><!-- end inner -->
  </div><!-- end wrapper -->
</body>
</html>
