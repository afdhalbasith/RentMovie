<?php
SESSION_START();
include "koneksi.php";

$pid = $_SESSION['idpeminjaman'];

//hapus detil peminjamanannya
$hapus1 = mysql_query("DELETE FROM DETIL_PEMINJAMAN WHERE PID='$pid'");

//hapus peminjamannya
$hapus2 = mysql_query("DELETE FROM PEMINJAMAN WHERE PID='$pid'");

unset($_SESSION['idpeminjaman']);

echo '<script> self.location="chart.php"; </script>';

//header("Location:chart.php");

?>