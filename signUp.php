<?php 
	session_start();
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Sign-Up Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>

		<form action="process.php" method="post" class="cont-form">
			<table>
				<tr>
					<td><input type="text" name="fname" placeholder="First Name" class="txtbox"></td>	
				</tr>
				<tr>
					<td><input type="text" name="mname" placeholder="Middle Name" class="txtbox"></td>	
				</tr>
				<tr>
					<td><input type="text" name="lname" placeholder="Last Name" class="txtbox"></td>	
				</tr>
				<tr>
					<td><input type="text" name="address" placeholder="Address" class="txtbox"></td>	
				</tr>
				<tr>
					<td><input type="date" name="date" class="txtbox"></td>	
				</tr>
				<tr>
					<td><input type="text" name="username" placeholder="Username" class="txtbox"></td>	
				</tr>
				<tr>
					<td><input type="password" name="password" placeholder="Password" class="txtbox"></td>	
				</tr>
				<tr>
					<td><input type="password" name="cpassword" placeholder="Confirm Password" class="txtbox"></td>	
				</tr>
				<tr>
					<td>
						<input type="submit" value="Create" class="btn1" name="create">
						<input type="submit" value="back" class="btn2" name="back">
					</td>	
				</tr>
			</table>

<?php 
	if(isset($_SESSION['signUpErr'])){
		if ($_SESSION['signUpErr'] != null) {
?>
			<span><?= $_SESSION['signUpErr'] ?></span>

<?php 
			$_SESSION['signUpErr'] = null; 
		}
	}
	if(isset($_SESSION['signUpSuc'])){
		if ($_SESSION['signUpSuc'] != null) {
?>
			<p class = "signUpSuc"><?= $_SESSION['signUpSuc'] ?></p>
<?php 
			$_SESSION['signUpSuc'] = null; 
		}
	}
?>
		</form>

	</body>

</html>