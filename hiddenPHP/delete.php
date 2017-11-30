<?php
	$mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');

	if(!$mysql_access)
	{
		die('Unable to connect: ' . mysql_error());
	}

	mysql_select_db('group8');
  $mediaID = $_GET['mediaID'];
	$query = "DELETE FROM Media WHERE ID=" . $mediaID;
	$result = mysql_query($query, $mysql_access);

  if(!$result)
	{
		die("Error processing data: ". mysql_error());
	}
  echo ("SUCCESS");

	mysql_close($mysql_access);
	header('Location: ../pages/admin.php');

?>
