<?php 	
	session_start(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		
		<form action="process.php" method="post" class="cont-form">
		<img src="images/icon.png" class="avatar">
			<table>
				<tr>
					<td><input type="text" name="uname" placeholder="Username" class="txtbox"></td>	
				</tr>
				<tr>
					<td><input type="password" name="pword" placeholder="Password" class="txtbox"></td>	
				</tr>
				<tr>
					<td>
						<input type="submit" value="Login" class="btn1" name="login">
						<input type="submit" value="Sign-up" class="btn2" name="signup">
					</td>	
				</tr>
			</table>
<?php  
	if ($_SESSION['loginErr'] != null) {
?>
			<span><?= $_SESSION['loginErr']?></span>
<?php 
		$_SESSION['loginErr'] = null;
	} 
?>
		</form>
		
	</body>

</html>