<?php
session_start();
/* this PHP is used to add records to the Media table */

 if($_SESSION['ID'] > 0 || $_SESSION['admin'] != null) {
    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

  $comment = $_GET['addComment'];
  $mediaID = $_GET['mediaID'];
	
  $currentUserID = $_SESSION['ID'];
	$currentDate = date("Y-m-d H:i:s");
	
	$query = "INSERT INTO Comment (MediaID, UserID, CreatedOn, Comment) VALUES ($mediaID, $currentUserID, '$currentDate', '$comment')";

	$result = mysql_query($query, $mysql_access);
  if(!$result)
	{
		die("Error processing data: ". mysql_error());
	}
  
  echo ("SUCCESS");
  header("Location: ../pages/viewReview.php?mediaID=".$mediaID);
	//Close connection
	mysql_close($mysql_access);

 }
 else{
	 header("Location: ../pages/login.php");
 }
?>
