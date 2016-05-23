<?php
include "koneksi.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	
if (empty($username)) {
	echo "<script>alert('Username cannot be empty.')</script>";
	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}

else if (empty($password)){
	echo "<script>alert('Password cannot be empty.')</script>";
	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}	

else {
	session_start();
	$login = mysql_query("select * from users where username='$username' and password='$password'");
	$type = mysql_query("select type from users where username='$username' and password='$password'");
	$type1=mysql_fetch_object($type);
	$flag=$type1->type;
    
	if (mysql_num_rows($login) > 0) {
		if ($flag == "member") {
            $_SESSION['username'] = $username;
		    header('Location : ../HTML/HOMEmember.php',true,301);
            exit();    
        }
        else if ($flag == "admin") {
            $_SESSION['username'] = $username;
		    header('Location : ../HTML/HOMEadmin.php',true,301);
            exit();    
        }
        
	}
	
	else {
		echo "<script>alert('Username or Password is incorrect.')</script>";
		echo "<meta http-equiv='refresh' content='1 url=login.php'>";
	}
}
?>