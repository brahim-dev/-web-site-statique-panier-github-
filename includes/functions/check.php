<?php
	$admin = "test";
	$pwd= "test";
	session_start();
			if ($_POST['username'] == $admin && $_POST['password']==$pwd) {
				$_SESSION['username'] = $admin;
				$_SESSION['password'] = $pwd;
				echo"<script>location.href='../../index.php'</script>";
			}else{
				echo "<script>alert('username or password incorrect !')</script>";
				echo"<script>location.href='../../login.php'</script>";
			}

?>