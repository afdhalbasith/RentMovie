<?php
	include 'koneksi.php';

	$name = $_GET['name'];
	$username = $_GET['username'];
	$password = $_GET['password'];
	$email = $_GET['email'];
	$alamat = $_GET['alamat'];
	$nohp = $_GET['nohp'];
	$level = "member";

	if ($name==NULL || $username==NULL || $password==NULL || $email==NULL || $alamat==NULL || $nohp==null )
	{
		//header("Location:signup.php?status=gagal");
		echo '<script> self.location="signup.php?status=gagal"; </script>';
	}

	else
	{

	$sql = "INSERT INTO PENGGUNA(NAMA,USERNAME,PASSWORD,EMAIL,ALAMAT,NOHP,LEVEL) VALUES('$name','$username','$password','$email','$alamat','$nohp','$level')";
	$result = mysql_query($sql);

	if($result)
	{
		//header("Location:index.php?status=signup");
		echo '<script> self.location="index.php?status=signup"; </script>';
	}
	}

?>