<?php
SESSION_START();
include 'koneksi.php';

$idsession = $_SESSION['idm'];
$idfilm = $_GET['fid'];
$komentar =$_GET['komentar'];
echo "$komentar";echo "$idfilm";echo "$idsession";
$result = mysql_query("INSERT INTO MEREVIEW(UID, FID, REVIEW) VALUES ('$idsession','$idfilm','$komentar')");

//header("Location:movie.php?fid=".$idfilm."");
echo '<script> self.location="movie.php?fid='.$idfilm.'"; </script>';
mysql_close();
?>