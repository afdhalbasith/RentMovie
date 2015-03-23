<?php
include "koneksi.php";
SESSION_START();
$pid = $_SESSION['idpeminjaman'];

//hapus detil peminjamanannya
$hapus1 = mysql_query("DELETE FROM detil_peminjaman WHERE PID='$pid'");

//hapus peminjamannya
$hapus2 = mysql_query("DELETE FROM peminjaman WHERE PID='$pid'");

unset($_SESSION['idpeminjaman']);

header("Location:chart.php");

?>