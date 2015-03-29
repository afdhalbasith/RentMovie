<?php
SESSION_START();
include "koneksi.php";


	if(isset($_SESSION['idpeminjaman']))
	{
		$pid = $_SESSION['idpeminjaman'];

		//hapus detil peminjamanannya
		$hapus1 = mysql_query("DELETE FROM DETIL_PEMINJAMAN WHERE PID='$pid'");

		//hapus peminjamannya
		$hapus2 = mysql_query("DELETE FROM PEMINJAMAN WHERE PID='$pid'");

		unset($_SESSION['idpeminjaman']);
	}
	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy();
	
	echo "<script>window.location.replace(\"index.php\");</script>";
		
?>