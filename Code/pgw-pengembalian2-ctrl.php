<?php
SESSION_START();
include 'koneksi.php';

$id =$_GET['id'];
//echo "$id";

$query = mysql_query("SELECT * FROM film,detil_peminjaman WHERE film.FID=detil_peminjaman.FID");
while($row = mysql_fetch_array($query)){
  $jancuk = $row['FID'];
  mysql_query("UPDATE film SET STATUSFL='Available' where FID='$jancuk'");
  mysql_query("UPDATE peminjaman SET STATUSPJ='Returned' where PID='$id'");
}
header("Location:pgw-pengembalian.php");

//$hmm = mysql_query("UPDATE film SET 'STATUSFL'='Available' WHERE ")
?>