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
                   <?php
                if (isset($_GET['course']))
                {
                
                $lol = $_GET['course'];
                $sql = "SELECT * FROM FILM WHERE FNAMA='$lol'";
                $result = mysql_query($sql) or die ("fail to insert");

                while($row = mysql_fetch_array($result)){
                $a = $row['FNAMA'];$b = $row['SINOPSIS'];$c = $row['HARGA'];$d = $row['STATUSFL'];
                
                  echo "<div class='boxed'>";
                  echo "<h3><b>".$a."</b></h3>";
                  echo "<img src='images/".$row['FID'].".jpg' width='93' height='130' alt='photo 1' class='left' />";
                  echo "<p class='sinop'>".$b;
                  echo "<p><b>Harga :  </b>Rp. " .$c;
                  echo "<p><b>Availability :</b>".$d."</p><br>";
                  echo "<p class='readmore'><a href='comment.html'><b></b></a>";
                  echo "<a class='readmore'><a href='movie.php?fid=".$row['FID']."'><b>RENT & COMMENT</b></a></a></p>";
                  echo "<div class='clear'></div>";
                  echo "</div>";
                }
                }

                ?>
               
                  <!--<?php
                  //$action = mysql_query("SELECT * FROM film WHERE KATEGORI='action' order by FNAMA");
                  //while($row = mysql_fetch_array($action)){
                  //$judul = $row['FNAMA']."<br>"; $sinopsis = $row['SINOPSIS']."<br>";$harga = $row['HARGA']."<br>";$stausfl = $row['STATUSFL']."<br>";
                  
                  //echo "<div class='boxed'>";
                  //echo "<h3><b>".$judul."</b></h3>";
                  //echo "<img src='images/photo.jpg' width='93' height='130' alt='photo 1' class='left' />";
                  //echo "<p class='sinop'>".$sinopsis;
                  //echo "<p><b>Harga :  </b>Rp. " .$harga;
                  //echo "<p><b>Availability :</b>".$stausfl."</p><br>";
                  //echo "<p class='readmore'><a href='comment.html'><b></b></a>";
                  //echo "<a class='readmore'><a href='rental.html'><b>RENT & COMMENT</b></a></a></p>";
                  //echo "<div class='clear'></div>";
                  //echo "</div>";

                  //print "<div class='br'></div>";
                  //}
                  ?>-->
                  
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
