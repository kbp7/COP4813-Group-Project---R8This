<?php
/* this PHP is used to add records to the Media table */

	$title = $_GET['title'];
	$genre = $_GET['genre'];
	$ageRating = $_GET['ageRating'];
  $cover = $_GET['cover'];
  $mediaType = $_GET['mediaType'];
  $releaseDate = $_GET['releaseDate'];
  $rating = $_GET['rating'];
	$mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');

  //check for mysql error
	if(!$mysql_access)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('group8');
	$query = "INSERT INTO Media (Title, Genre, AgeRating, Cover, ReleaseDate, MediaType, Rating";
	$query = $query . ") VALUES ('$title', '$genre', '$ageRating', '$cover', '$releaseDate', '$mediaType', $rating)";

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
