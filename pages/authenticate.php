<?php
	session_start();

	if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=2");
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	$_SESSION['username'] = $username;

	if($username == "UNF" && $password == "Hi")
	{
		header("Location: main.php");
	}else{
		header("Location: index.php?error=1");
	}

?>
