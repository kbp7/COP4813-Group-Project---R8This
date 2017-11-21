<?php
	session_start();

	if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=2");
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	$_SESSION['username'] = $username;
	
	$mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
	
	if (!$mysql_access){
		die('Could not connect'); 
	}
	mysql_select_db('group8');

	$query = "SELECT Password FROM User WHERE Username='$username'";
	$result = mysql_query($query, $mysql_access);
	mysql_close($mysql_access);
	

	if($result == $password)
	{
		header("Location: userProfile.html");
	}else{
		echo(Invalid Password);
	}

?>
