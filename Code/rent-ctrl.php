<?php
include 'koneksi.php';
SESSION_START();
$uid = $_SESSION['idm'];
echo $uid."<br>";
$fid = $_GET['fid'];
echo $fid."<br>";

//kalo ga ada idpj dibikin dulu
if(!isset($_SESSION['idpeminjaman']))
{
	echo "belom ada peminjaman<br>";
	$totalinit = 0;
	$sysdate = date("Y-m-d");
	$pjgenerate = "INSERT INTO peminjaman(UID,TOTAL,WAKTUPINJAM) VALUES('$uid','$totalinit','$sysdate')";
	$result = mysql_query($pjgenerate);
	//if($result) {echo "Masok<br>";}
	//else {echo "Taik<br>";}

	$getpj = "SELECT * FROM peminjaman WHERE UID='$uid' AND TOTAL=0";
	$result2 = mysql_query($getpj);
	while($row = mysql_fetch_array($result2))
	{$pid = $row['PID'];}
	if($pid == NULL)
	{
		header("Location:error.php"); 
		//echo "jancukkkkkkkkkkkk";
	}
	else
	{
		$_SESSION['idpeminjaman'] = $pid;
	}

}

if(isset($_SESSION['idpeminjaman']))
{

	//kalo udah ada masukin ke variable baru
	$pid = $_SESSION['idpeminjaman'];
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

	header("Location:chart.php");
}
?>