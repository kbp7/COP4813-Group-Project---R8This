<?php
session_start();
/* this PHP is used to add records to the Media table */

 if($_SESSION['username'] !== "" || $_SESSION['username'] !== NULL) {
    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

  $comment = $_GET['addComment'];
  $mediaID = $_GET['mediaID'];
	

	mysql_select_db('group8');
	$query = "INSERT INTO comment (MediaID, UserID, CreatedOn, Comment")
    VALUES ('$mediaID', '$_SESSION['ID']', '$_SERVER['REQUEST_TIME']' , '$comment',)";

	$result = mysql_query($query, $mysql_access);
  if(!$result)
	{
		die("Error processing data: ". mysql_error());
	}
  echo ("SUCCESS");
	//Close connection
	mysql_close($mysql_access);
	header('Location: ../pages/admin.php');

?>
