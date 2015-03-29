<?php 
SESSION_START();

include 'koneksi.php';

		$username = $_GET['username'];
		$password = $_GET['password'];

		//query
		$sql = "SELECT * FROM PENGGUNA WHERE USERNAME = '$username' AND PASSWORD = '$password'";
		$result = mysql_query($sql);

		$flag = 0;
		while($row = mysql_fetch_array($result))
		{
			$usercek = $row["USERNAME"];
			$passcek = $row["PASSWORD"];
			
			$level = $row['LEVEL'];

			if($level == 'member')
			{
				$_SESSION['idm'] = $row["UID"];
				$_SESSION['namam'] = $row["NAMA"];

				//header("Location:homepage.php");
				echo '<script> self.location="homepage.php"; </script>';

				echo "member";
			}
			else if($level == 'admin')
			{
				$_SESSION['ida'] = $row["UID"];
				$_SESSION['namaa'] = $row["NAMA"];

				//header("Location:pgw-pengembalian.php");
				echo '<script> self.location="pgw-pengembalian.php"; </script>';

				echo "admin";
			}

			echo $usercek." ".$passcek;

			$flag = 1;
		}
		
	  	if($flag == 0) 
	   	{ 
    		//header("Location:index.php?status=gagal");
    		echo '<script> self.location="index.php?status=gagal"; </script>';
       	} 

mysql_close();
?>