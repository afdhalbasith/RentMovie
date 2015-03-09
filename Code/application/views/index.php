<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
    <link href="<?=base_url()?>css/style.css" rel="stylesheet" type="text/css">
    <title>Movie Rent</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
</head>
<body>

	

	
		<div id="wrapper">
			<div id="inner">
		        <div id="header">
		              <div class="login">
		              		<?php echo form_open("auth/cek_login"); ?>	
							<p><input type="text" placeholder="Username" name="username"></p>
							<p><input type="password" placeholder="Password" name="password"></p>
							<p><button type="submit">Sign In</button></p>

							<!--
							<a class="softleft" /><a href="signup.html"/><input type="image" src="images/singup.png" width="70" height="30"/>
							<a class="softright" /><a href="index.html"/><input type="image" src="images/signin.png" width="70" height="30"/>
							-->
							<?php echo form_close(); ?>
		              </div>
		              <a href="#"><img src="<?=base_url()?>images/login.jpg" width="744" height="500" alt="Harry Potter cd" /></a>
		        </div>

		          <div class="clear"></div>

		          <div id="footer">
		              Kelompok (07) MPPL-E
		          </div>

		    </div>
		</div>
		  
</body>
</html>
