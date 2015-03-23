<?php
SESSION_START();
include 'koneksi.php';

$pid =$_GET['id'];
//echo "$id";

$update = mysql_query("UPDATE peminjaman SET STATUSPJ='Finished' where PID='$pid'");
//cek denda
$sysdate = date("Y-m-d");
echo $sysdate."<br>";
$waktukembalisql = mysql_query("SELECT * FROM peminjaman WHERE PID='$pid'");
$row = mysql_fetch_array($waktukembalisql);
$waktukembali = $row['WAKTUKEMBALI'];
echo $waktukembali."<br>";
$denda;
if($sysdate > $waktukembali)
{
	$denda = ((strtotime($sysdate) - strtotime($waktukembali))/86400) * 1000;
	$update = mysql_query("UPDATE peminjaman SET DENDA='$denda' where PID='$pid'");
	header("Location:pengembalian.php?denda=yes&&pid=$pid");
}
else
{
header("Location:pengembalian.php");
}
echo "$denda";


//$hmm = mysql_query("UPDATE film SET 'STATUSFL'='Available' WHERE ")
?>