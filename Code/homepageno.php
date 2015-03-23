<?php
SESSION_START();
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
                  
                  <div class="leftbox">
                      <h3><b>Scary Movie</b></h3>
                      <img src="images/5000.jpg" width="93" height="115" alt="photo 1" class="left" />
                      <p> Film ini merupakan film yang dibintangi oleh dengan meceritakan peristiwa 
					 <!--<p><b>Harga:</b> $350-->
                      <p><b>Availability:</b> Yes</p>
					  <p class="readmore"><a href="comment.html"><b></b></a>
                      <a class="readmore"><a href="movie.php?fid=5000"><b>RENT NOW</b></a></a></p>
                      <div class="clear"></div>
                  </div><!-- end .leftbox -->
                  <div class="rightbox">
                      <h3><b>Batman - The Animated Series (New Platinum Series)</b></h3>
                      <img src="images/5001.jpg" width="93" height="115" alt="photo 4" class="left" />
					  <p> Film ini merupakan film yang dibintangi oleh dengan meceritakan peristiwa 
                      <!--<p><b>Harga:</b> $350-->
                      <p><b>Availability:</b> Yes</p>
					  <p class="readmore"><a href="#"><b></b></a>
                      <a class="readmore"><a href="movie.php?fid=5001"><b>RENT NOW</b></a></a></p>
                      <div class="clear"></div>
                  </div><!-- end .rightbox -->
                  
                  <div class="clear br"></div>

                  <div class="leftbox">
                      <h3><b>Harry Potter and the Prisoner of Azkaban</b></h3>
                      <img src="images/5002.jpg" width="93" height="115" alt="photo 2" class="left" />
					  <p> Film ini merupakan film yang dibintangi oleh dengan meceritakan peristiwa 
                      <!--<p><b>Harga:</b> $350-->
                      <p><b>Availability:</b> Yes</p>
                      <p class="readmore"><a href="#"><b></b></a>
                      <a class="readmore"><a href="movie.php?fid=5002"><b>RENT NOW</b></a></a></p>
                      <div class="clear"></div>
                  </div><!-- end .leftbox -->
                  <div class="rightbox">
                      <h3><b>Blade - Trinity (New Platinum Series)</b></h3>
                      <img src="images/5003.jpg" width="93" height="115" alt="photo 5" class="left" />
					  <p> Film ini merupakan film yang dibintangi oleh dengan meceritakan peristiwa 
                      <!--<p><b>Harga:</b> $350-->
                      <p><b>Availability:</b> Yes</p>
                      <p class="readmore"><a href="#"><b></b></a>
                      <a class="readmore"><a href="movie.php?fid=5003"><b>RENT NOW</b></a></a></p>
                      <div class="clear"></div>
                  </div><!-- end .rightbox -->

                  <div class="clear br"></div>

                  <div class="leftbox">
                      <h3><b>Million Dollar Baby (Widescreen Edition)</b></h3>
                      <img src="images/5004.jpg" width="93" height="115" alt="photo 3" class="left" />
					  <p> Film ini merupakan film yang dibintangi oleh dengan meceritakan peristiwa 
                      <!--<p><b>Harga:</b> $350-->
                      <p><b>Availability:</b> Yes</p>
                      <p class="readmore"><a href="#"><b></b></a>
                      <a class="readmore"><a href="movie.php?fid=5004"><b>RENT NOW</b></a></a></p>
                      <div class="clear"></div>
                  </div><!-- end .leftbox -->
                  <div class="rightbox">
                      <h3><b>The Matrix Reloaded (Full Screen Edition)</b></h3>
                      <img src="images/5005.jpg" width="93" height="115" alt="photo 6" class="left" />
					  <p> Film ini merupakan film yang dibintangi oleh dengan meceritakan peristiwa 
                      <!--<p><b>Harga:</b> $350-->
                      <p><b>Availability:</b> Yes</p>
                      <p class="readmore"><a href="#"><b></b></a>
                      <a class="readmore"><a href="movie.php?fid=5005"><b>RENT NOW</b></a></a></p>
                      <div class="clear"></div>
                  </div><!-- end .rightbox -->

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
