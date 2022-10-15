<?php  
	define("dbhost", "localhost");
	define("dbuser", "root");
	define("dbpass", "");
	define("dbname", "grubpanda");

	$connect = mysqli_connect(dbhost, dbuser, dbpass, dbname);

	if(!$connect){
		echo mysqli_connect_errno(). " " .mysqli_connect_error();
	}

	function register($query){
		global $connect;
		$result = mysqli_query($connect, $query);
		return $result;
	}

	function login($query){
		global $connect;
		$result = mysqli_query($connect, $query);
		return $result;
	}

?>