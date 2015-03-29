<?php include("koneksi.php");

$namaf = $_GET['namaf'];
$kategori = $_GET['kategori'];
$harga = $_GET['harga'];
$sinopsis = $_GET['sinopsis'];
$statusfl = 'Available';

$insert = "INSERT INTO FILM (FNAMA,KATEGORI,HARGA,SINOPSIS,STATUSFL) VALUES ('$namaf','$kategori','$harga','$sinopsis','$statusfl')";
mysql_query($insert) or die ("fail to insert");

mysql_close();
//header("Location:pgw-datafilm.php");
echo '<script> self.location="pgw-datafilm.php"; </script>';
?>

