<?php
	session_start();

	if($_SESSION['username'] === "")
	{
		header("Location: ../index.php?error=2");
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	$mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');

	if (!$mysql_access){
		die('Could not connect');
	}
	mysql_select_db('group8');

	$query = "SELECT Password FROM User WHERE Username='$username'";
	$result = mysql_query($query, $mysql_access);
	mysql_close($mysql_access);

	$row = mysql_fetch_assoc($result);
	$pass = $row[0];
	if($pass === $password)
	{
		$_SESSION['username'] = $username;
		header("Location: userProfile.html");

	}else{

		echo "Invalid Password";

	}

?>
