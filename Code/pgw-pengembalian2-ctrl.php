<?php
SESSION_START();
include 'koneksi.php';

$id =$_GET['id'];
//echo "$id";

$query = mysql_query("SELECT * FROM FILM,DETIL_PEMINJAMAN WHERE FILM.FID=DETIL_PEMINJAMAN.FID");
while($row = mysql_fetch_array($query)){
  $jancuk = $row['FID'];
  mysql_query("UPDATE FILM SET STATUSFL='Available' WHERE FID='$jancuk'");
  mysql_query("UPDATE PEMINJAMAN SET STATUSPJ='Returned' WHERE PID='$id'");
}
//header("Location:pgw-pengembalian.php");
echo '<script> self.location="pgw-pengembalian.php"; </script>';
//$hmm = mysql_query("UPDATE film SET 'STATUSFL'='Available' WHERE ")
?>