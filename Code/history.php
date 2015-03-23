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
                  $idsession = $_SESSION['idm'];

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
					  <p></p>
							<div class="menu3">
							<a href="account.php">My Account</a>
							<a href="history.php" class="current">History</a>
							<a href="pengembalian.php">Pengembalian Film</a>
							</div>
						<p><h3><b>History Penyewaan</b></h3></p>
            <?php
                
                $uidd = $idsession;
				/*
                $query = "SELECT peminjaman.PENGEMBALIAN, peminjaman.WAKTUPINJAM, peminjaman.WAKTUKEMBALI, film.FNAMA, film.HARGA ".
                          "FROM pengguna,peminjaman,film,detil_peminjaman ".
                          "WHERE pengguna.uid='$uidd' and pengguna.uid=peminjaman.uid and film.fid=detil_peminjaman.fid and peminjaman.pid=detil_peminjaman.pid";
                */
				$query = "SELECT * FROM peminjaman WHERE UID='$uidd'";
				$result = mysql_query($query);
				
				$nomor = 1;
                print "<table border='1' style='width: 540px;'><tbody>";
                print "<tr><th>Nomor</th><th>ID Peminjaman</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Total Harga</th><th>Denda</th></tr>";
                while($row = mysql_fetch_array($result)){
                  print "<tr><td>".$nomor.
						"</td><td>".$row['PID'].
						"</td><td>".$row['WAKTUPINJAM'].
						"</td><td>".$row['WAKTUKEMBALI'].
						"</td><td>".$row['TOTAL'].
						"</td>";
				if($row['DENDA']==NULL || $row['DENDA']==0)
				{
					print "<td>0</td>";
				}
				else
				{
				  print	    "<td>
							<form method='GET' action='denda-ctrl.php'>
								<input type='hidden' name='pid' value='".$row['PID']."'>
								<input type='submit' value='".$row['DENDA']."'>
							</form>
							</td>";
				}
				
				print "</tr>";
				  $nomor = $nomor + 1;
                }print "</tbody></table>";
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