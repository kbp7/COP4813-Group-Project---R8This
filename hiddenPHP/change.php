<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin - Change Record</title>
  <link rel="stylesheet" href="../libraries/bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../css/style.css"></link>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  	$mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');

  	if(!$mysql_access)
  	{
  		die('Unable to connect: ' . mysql_error());
  	}

  	mysql_select_db('group8');

    $mediaID = $_GET['mediaID'];
    $_SESSION["editMediaID"] = $mediaID;
  	$query = "SELECT * FROM Media WHERE mediaID=" . $mediaID;
  	$result = mysql_query($query, $mysql_access);

    if(!$result)
  	{
  		die("Error processing data: ". mysql_error());
  	}

    $row = mysql_fetch_row($result);
    $editMediaID = $row[0];

    mysql_close($mysql_access);
  ?>
</head>

<body>
  <!-- ///////////// Navbar ////////////// -->
  <div class="nav solidShadow">
    <ul>
      <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
      <li><a href="###">Movies</a></li>
      <li><a href="###">Games</a></li>
      <li><a href="###"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a></li>
      <?php
        if($_SESSION['username'] === "" || $_SESSION['username'] === null) {
          echo '<li style="float:right"><a href="pages/login.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a></li>';
        }
        else {
          echo '<li style="float:right"><a href="../pages/userProfile.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>';
          echo '<li style="float:right"><a href="../pages/logout.php">Logout</a></li>';
        }
      ?>
    </ul>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <center><h2>Admin Actions</h2></center>

        <form action="update.php" method="get">
          <div class="form-group">
            <label for="movieTitle">Movie Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Genre</label>
            <select class="form-control" name="genre" id="genre">
              <option value="Action">Action</option>
              <option value="Drama">Drama</option>
              <option value="Horror">Horror</option>
              <option value="Animation">Animation</option>
              <option value="Comedy">Comedy</option>
              <option value="Documentary">Documentary</option>
              <option value="Shooter">Shooter</option>
              <option value="RPG">RPG</option>
              <option value="Fighting">Fighting</option>
              <option value="Sports">Sports</option>
              <option value="Puzzle">Puzzle</option>
              <option value="Platformer">Platformer</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Age Rating</label>
            <select class="form-control" name="ageRating" id="ageRating">
              <option value="G">G</option>
              <option value="PG">PG</option>
              <option value="PG-13">PG-13</option>
              <option value="R">R</option>
              <option value="E">E</option>
              <option value="E10">E10</option>
              <option value="T">T</option>
              <option value="M">M</option>
            </select>
          </div>
          <div class="form-group">
            <label for="directorName">Cover Image URL</label>
            <input type="text" class="form-control" name="cover" id="cover" placeholder="Enter URL of file on server">
          </div>
          <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="mediaType" id="mediaType" value="Movie" checked> Movie
            <input class="form-check-input" type="radio" name="mediaType" id="mediaType" value="Game"> Game
          </label>
          </div>
          <button type="submit" class="btn btn-default" method="get">Change</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
