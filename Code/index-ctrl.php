<?php 
SESSION_START();

include 'koneksi.php';

		$username = $_GET['username'];
		$password = $_GET['password'];

		//query
		$sql = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'";
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

				header("Location:homepage.php");

				echo "member";
			}
			else if($level == 'admin')
			{
				$_SESSION['ida'] = $row["UID"];
				$_SESSION['namaa'] = $row["NAMA"];

				header("Location:pgw-pengembalian.php");

				echo "admin";
			}

			echo $usercek." ".$passcek;

			$flag = 1;
		}
		
	  	if($flag == 0) 
	   	{ 
    		header("Location:index.php?status=gagal");
       	} 

mysql_close();
?>