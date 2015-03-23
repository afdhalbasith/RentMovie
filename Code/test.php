	<?php
	include 'koneksi.php'; 
	//kalo udah ada masukin ke variable baru
	$pid = 2039;
	$fid = 5000;
	echo $pid."<br>";

	$insertdetil = "INSERT INTO detil_peminjaman(PID,FID) VALUES ('$pid','$fid')";
	$exec = mysql_query($insertdetil);

	//ambil harga
	$getharga = "SELECT HARGA FROM film WHERE FID='$fid'";
	$executeharga = mysql_query($getharga);
	$row = mysql_fetch_array($executeharga);
	$harga = $row['HARGA'];
	echo $harga."<br>";

	//ambil total
	$gettotal = "SELECT TOTAL FROM peminjaman WHERE PID='$pid'";
	$executetotal = mysql_query($gettotal);
	$row = mysql_fetch_array($executetotal);
	$total = $row['TOTAL'];
	echo $total."<br>";

	//penjumlahan menghasilkan total harga baru
	$hasil = $harga + $total;
	echo $hasil."<br>";

	//query update total harga
	$update = "UPDATE peminjaman SET TOTAL = '$hasil' WHERE PID = '$pid'";
	$jalankan = mysql_query($update);

	//header("Location:chart.php");
	?>