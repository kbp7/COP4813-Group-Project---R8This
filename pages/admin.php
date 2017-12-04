<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>R8This.com</title>
  <link rel="stylesheet" href="../libraries/bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../css/style.css"></link>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php

    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

    $query = "SELECT * FROM Media ORDER BY ID DESC";
    $result = mysql_query($query, $mysql_access);

    if(!$result)
    {
      die("Error processing data: ". mysql_error());
    }

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
          echo '<li style="float:right"><a href="pages/login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a></li>';
        }
        else {
          $currentUser = $_SESSION['username'];
          echo '<li style="float:right"><a href="pages/userProfile.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $currentUser . '</a></li>';
          echo '<li style="float:right"><a href="pages/logout.php">Logout</a></li>';
        }
      ?>
    </ul>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-6">
        <center><h2>Access Media Table</h2></center>

        <form action="../hiddenPHP/add.php" method="get">
          <div class="form-group">
            <label for="title">Title</label>
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
          <div class="form-group">
            <label for="releaseDate">Release Date : </label>
            <input name="releaseDate" id="releaseDate" type="date">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Score Rating</label>
            <select class="form-control" name="rating" id="rating">
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="0">0</option>
            </select>
          </div>
          <button type="submit" class="btn btn-default" method="get">Add</button>
        </form>
      </div>
      <div class="col-xs-6">
        <center><h2>Tools</h2>
          <form action='' name='myForm' method='get'>
            <button type="button" class="btn btn-default"><a href="upload.html">Image Upload Tool</a></button>
          </form>
        </center>
      </div>
    </div>

    <div class="row" style="margin-top: 50px;">
      <div class="col-xs-12">
        <form action='' name='myForm' id='myForm' method='get'>
        <?php
        	echo "<table>";
        	echo "<th></th><th>Title</th><th>Genre</th><th>Age Rating</th><th>Cover File</th><th>Release Date</th><th>Media Type</th><th>Rating</th>";

        	while ($row = mysql_fetch_row($result))
        	{
        		$mediaID = $row[0];
        		$title = $row[1];
        		$genre = $row[2];
        		$ageRating = $row[3];
        		$coverFile = $row[4];
        		$releaseDate = $row[5];
            $mediaType = $row[6];
            $rating = $row[7];

        		echo "<tr>";
        		echo "<td><input type='radio' name='mediaID' value='$mediaID'></td>";
        		echo "<td>$title</td>";
            echo "<td>$genre</td>";
          	echo "<td>$ageRating</td>";
          	echo "<td>$coverFile</td>";
            echo "<td>$releaseDate</td>";
            echo "<td>$mediaType</td>";
            echo "<td>$rating</td>";
          	echo "</tr>";
          }
          echo "</table>";
          mysql_close($mysql_access);
        ?>
        <br>
        <input type='button' class="btn btn-default" value='Change Record' onClick='changeRecord()'>
      	<input type='button' class="btn btn-default" value='Delete Record' onClick='deleteRecord()'>

        </form>
      </div>
    </div>

  </div>

  <!-- Info and contact links -->
  <div id="footer" class="container-fluid footer">
    <div class="row">
      <div class="col-md-12">
        <center>
          <p>
            <span class="glyphicon glyphicon-info-sign contactGlyphs" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-envelope contactGlyphs" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-bitcoin contactGlyphs" aria-hidden="true"></span>
          </p>
        </center>
      </div>
      <div class="col-xs-12">
        <p>
          Designed by Team 8: The Ocho
        </p>
      </div>
    </div>
  </div>

<script>
function changeRecord()
{
  document.getElementById("myForm").action='../hiddenPHP/change.php';
  document.getElementById("myForm").submit();
}
function deleteRecord()
{
  document.getElementById("myForm").action='../hiddenPHP/delete.php';
  document.getElementById("myForm").submit();
}

</script>
</body>
</html>
