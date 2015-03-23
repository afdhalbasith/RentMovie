<?php
include "koneksi.php";
SESSION_START();
$id = $_SESSION['idm'];
$pid = $_SESSION['idpeminjaman'];

$did = $_GET['did'];
echo $did;

//ambil harga
$total = mysql_query("SELECT film.HARGA FROM film, detil_peminjaman WHERE detil_peminjaman.DID = '$did' AND detil_peminjaman.FID = film.FID");
$row = mysql_fetch_array($total);
$harga = $row['HARGA'];

//ambil total
$sql = mysql_query("SELECT peminjaman.TOTAL FROM peminjaman, detil_peminjaman WHERE detil_peminjaman.DID = '$did' AND detil_peminjaman.PID = peminjaman.PID");
$row = mysql_fetch_array($sql);
$totalharga = $row['TOTAL'];

//dikurangin
$hargabaru = $totalharga - $harga;

//update
$update = "UPDATE peminjaman SET TOTAL = '$hargabaru' WHERE PID = '$pid'";
$jalankan = mysql_query($update);

//hapus
$hapus = mysql_query("DELETE FROM detil_peminjaman WHERE DID='$did'");

header("Location:chart.php");

?>