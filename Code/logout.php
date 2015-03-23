<?php
include "koneksi.php";
SESSION_START();

	if(isset($_SESSION['idpeminjaman']))
	{
		$pid = $_SESSION['idpeminjaman'];

		//hapus detil peminjamanannya
		$hapus1 = mysql_query("DELETE FROM detil_peminjaman WHERE PID='$pid'");

		//hapus peminjamannya
		$hapus2 = mysql_query("DELETE FROM peminjaman WHERE PID='$pid'");

		unset($_SESSION['idpeminjaman']);
	}
	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy();
	
	echo "<script>window.location.replace(\"index.php\");</script>";
		
?>