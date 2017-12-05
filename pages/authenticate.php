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

	$query = "SELECT * FROM User WHERE Username='$username'";
	$result = mysql_query($query, $mysql_access);

	$row = mysql_fetch_assoc($result);
	$ID = $row['ID'];
	$pass = $row['Password'];
	$isAdmin = $row['Admin'];
	echo "Given username: $username <br>";
	echo "Given password: $password <br>";

	echo "DB password: $pass";
	if($pass === $password)
	{
		$_SESSION['username'] = $username;
		$_SESSION['ID'] = $ID;
		echo "Hello $username";
		echo "your password is: $password";
		if($isAdmin != null) {
			$_SESSION['admin'] = $isAdmin;
		}
		else { $_SESSION['admin'] = 0; }
		header("Location: ../index.php");

	}else{

		echo "Invalid Password";

	}
	mysql_close($mysql_access);
?>
