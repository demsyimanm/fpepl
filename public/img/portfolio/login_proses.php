<?php
include "header.php";
// 	$username = $_POST['username'];
// 	$password = $_POST['password'];
	
// if (empty($username)) {
// 	echo "<script>alert('Username cannot be empty.')</script>";
// 	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
// }

// else if (empty($password)){
// 	echo "<script>alert('Password cannot be empty.')</script>";
// 	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
// }	

// else {
// 	session_start();
// 	$login = mysql_query("select * from users where username='$username' and password='$password'");
	
// 	if (mysql_num_rows($login) > 0) {
// 		$_SESSION['username'] = $username;
// 		header('Location : library/HTML/HOMEmember.php');
// 		exit();
// 	}
	
// 	else {
// 		echo "<script>alert('Username or Password is incorrect.')</script>";
// 		echo "<meta http-equiv='refresh' content='1 url=login.php'>";
// 	}
// }
header('Location : http://www.google.com'); ?>