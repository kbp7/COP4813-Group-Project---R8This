<?php
  session_start();
	$mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');

	if(!$mysql_access)
	{
		die('Unable to connect: ' . mysql_error());
	}

	mysql_select_db('group8');
  $mediaID = $_SESSION["editMediaID"];
  $title = $_GET['title'];
	$genre = $_GET['genre'];
  $ageRating = $_GET['ageRating'];
  $cover = $_GET['cover'];
  $mediaType = $_GET['mediaType'];
  $releaseDate = $_GET['releaseDate'];

  INSERT INTO Media (Title, Genre, AgeRating, Cover, ReleaseDate, MediaType) VALUES
	$query = "UPDATE Media SET Title='$title', Genre='$genre', AgeRating='$ageRating', ";
  $query = $query . "Cover='$cover', ReleaseDate='$releaseDate', MediaType='$mediaType' WHERE ID='$mediaID'";

	$result = mysql_query($query, $mysql_access);

  if(!$result)
	{
		die("Error processing data: ". mysql_error());
	}
  echo ("update success");

	mysql_close($mysql_access);
  session_destroy();
	header('Location: ../pages/admin.php');

?>
