<?php 
	$ip = "127.0.0.1";
	$usrname = "root";
	$password = "";
	$db = "football_db";
	$conn = mysqli_connect("$ip", "$usrname", "$password", "$db");

	if ($conn->connect_error) {
		die("Failed to connect, error: " . mysqli_connect_error());
	}
?>