<?php
SESSION_START();
include "koneksi.php";

$id = $_SESSION['idm'];
$pid = $_SESSION['idpeminjaman'];

$did = $_GET['did'];
echo $did;

//ambil harga
$total = mysql_query("SELECT FILM.HARGA FROM FILM, DETIL_PEMINJAMAN WHERE DETIL_PEMINJAMAN.DID = '$did' AND DETIL_PEMINJAMAN.FID = FILM.FID");
$row = mysql_fetch_array($total);
$harga = $row['HARGA'];

//ambil total
$sql = mysql_query("SELECT PEMINJAMAN.TOTAL FROM PEMINJAMAN, DETIL_PEMINJAMAN WHERE DETIL_PEMINJAMAN.DID = '$did' AND DETIL_PEMINJAMAN.PID = PEMINJAMAN.PID");
$row = mysql_fetch_array($sql);
$totalharga = $row['TOTAL'];

//dikurangin
$hargabaru = $totalharga - $harga;

//update
$update = "UPDATE PEMINJAMAN SET TOTAL = '$hargabaru' WHERE PID = '$pid'";
$jalankan = mysql_query($update);

//hapus
$hapus = mysql_query("DELETE FROM DETIL_PEMINJAMAN WHERE DID='$did'");

//header("Location:chart.php");
echo '<script> self.location="chart.php"; </script>';

?>