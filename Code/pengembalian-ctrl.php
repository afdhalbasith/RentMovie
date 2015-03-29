<?php
SESSION_START();
include 'koneksi.php';

$pid =$_GET['id'];
//echo "$id";

$update = mysql_query("UPDATE PEMINJAMAN SET STATUSPJ='Finished' WHERE PID='$pid'");
//cek denda
$sysdate = date("Y-m-d");
echo $sysdate."<br>";
$waktukembalisql = mysql_query("SELECT * FROM PEMINJAMAN WHERE PID='$pid'");
$row = mysql_fetch_array($waktukembalisql);
$waktukembali = $row['WAKTUKEMBALI'];
echo $waktukembali."<br>";
$denda;
if($sysdate > $waktukembali)
{
	$denda = ((strtotime($sysdate) - strtotime($waktukembali))/86400) * 1000;
	$update = mysql_query("UPDATE PEMINJAMAN SET DENDA='$denda' WHERE PID='$pid'");
	//header("Location:pengembalian.php?denda=yes&&pid=$pid");
	echo '<script> self.location="pengembalian.php?denda=yes&&pid='.$pid.'"; </script>';
}
else
{
//header("Location:pengembalian.php");
echo '<script> self.location="pengembalian.php"; </script>';
}
echo "$denda";


//$hmm = mysql_query("UPDATE film SET 'STATUSFL'='Available' WHERE ")
?>