<?php
	require 'dbconnect.php';
	session_start();

	if (isset($_POST['back'])){
		header("location: loginPage.php");
		die("oops");
	}
	if (isset($_POST['signup'])){
		header("location: signUp.php");
		die("oops");
	}

	//login
	if (isset($_POST['login'])){
		if ($_POST['uname'] == null || $_POST['pword'] == null) {
			$_SESSION['loginErr'] = "Invalid Login!";
			header("location: loginPage.php");
		}
		else{
			$query = "SELECT * FROM users WHERE uname = '".$_POST['uname']."' and pword = '" . $_POST['pword']."';";
			$result = login($query);
			$rows = array();
			//transferring value from the database to normal array	
			foreach ($result as $values) {
				$rows[] = $values;		
			}	

			if (empty($rows)) {
				$_SESSION['loginCtr']++;
				$_SESSION['loginErr'] = "Incorrect Username/Password!";

				if ($_SESSION['loginCtr'] == 3) {
					$_SESSION['loginCtr'] = null;
					$_SESSION['loginErr'] = null;
					header("location: index.php");
				}
				else{
					header("location: loginPage.php");
				}
			}
			else if($rows[0]['status'] == 2){
				$_SESSION['loginErr'] = "Blocked!";
				header("location: loginPage.php");
			}
			else{
				$_SESSION['loginCtr'] = null;
				$_SESSION['loginErr'] = null;
				echo "Welcome {$rows[0]['fname']} {$rows[0]['lname']}";

			}
		}
	}

	//signup
	if (isset($_POST['create'])){
		if ($_POST['fname'] == null || $_POST['mname'] == null || $_POST['lname'] == null || $_POST['address'] == null || $_POST['date'] == null || $_POST['username'] == null || $_POST['password'] == null || $_POST['cpassword'] == null ) {
			$_SESSION['signUpErr'] = "Fillout all textbox!";
			header("location: signUp.php");
		}
		else if($_POST['password'] != $_POST['cpassword']){
			$_SESSION['signUpErr'] = "Password didn't match!";
			header("location: signUp.php");
		}
		else{
			$query = "SELECT * FROM users WHERE uname = '".$_POST['username']."';";
			$result = register($query);
			$rows = array();

			foreach ($result as $values) {
				$rows[] = $values;		
			}

			if (!empty($rows)) {
				$_SESSION['signUpErr'] = "Username already exist!";
				header("location: signUp.php");
			}
			else{
				$query = "INSERT INTO `users` (`user_id`, `fname`, `mname`, `lname`, `address`, `date`, `uname`, `pword`, `status`) VALUES (NULL,'". $_POST['fname'] . "', '" . $_POST['mname'] . "',  '" . $_POST['lname'] . "', '" . $_POST['address'] ."', '" . $_POST['date'] . "', '" . $_POST['username'] . "', '" . $_POST['password'] . "', " . 1 . ");";
				$result = register($query);
				$_SESSION['signUpSuc'] = "Account successfully registered!";
				header("location: signUp.php");
			}
		}
	}

?>