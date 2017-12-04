<?php
	session_start();

	if($_SESSION['username'] === "")
	{
		header("Location: ../index.php?error=2");
	}

	else {
    $_SESSION['username'] = "";
  }

  session_destroy();
	{
		header("Location: ../index.php");
	}

?>
