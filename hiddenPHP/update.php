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
  if ($_GET['mediaType'] == 0) {
    $mediaType = 0;
  }
  else {
    $mediaType = 1;
  }
  $releaseDate = $_GET['releaseDate'];

  INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES
	$query = "UPDATE Media SET Title='$title', Genre='$genre', AgeRating='$ageRating', ";
  $query = $query . "Cover='$cover', MediaType='$mediaType', ReleaseDate='$releaseDate' WHERE movieID='$movieID'";
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
<a href="../pages/admin.php">Back</a>
