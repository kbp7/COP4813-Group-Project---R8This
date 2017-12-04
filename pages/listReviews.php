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

    $Type = $_GET['Type'];

    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

    $query = "SELECT * FROM Media WHERE MediaType =" . $Type;
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
      <li><a href="listReviews.php?Type= 'Movie'">Movies</a></li>
      <li><a href="listReviews.php?Type= 'Game'">Games</a></li>
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

  <!-- Full width -->
  <div class="container-fluid">
    <div class="row align-middle" style="height: 175px;">
      <div class="col-xs-12" style="z-index: 1;">
        <div class="col-xs-2 col-xs-offset-5 text-center bannerDivPink" style="margin-bottom: -25px;">
          <center>
            <?php
                if(strpos($Type, 'Movie') !== FALSE){
                  echo '<h3 style="color: white;">Movie Reviews</h3>';
                }
                else{
                  echo '<h3 style="color: white;">Game Reviews</h3>';
                }
             ?>
          </center>
        </div>
      </div>
    </div>
  </div>
    <div class="row" style="margin-top: 50px;">
      <div class="col-xs-12">
        <form action='' name='myForm' id='myForm' method='get'>
        <?php
        	echo "<table>";
        	echo "<th></th><th>Title</th><th>Rating</th><th>Genre</th><th>Age Rating</th><th>Release Date</th>";

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
            echo '<td><img src="../images/' . $coverFile . '"height="75" width="150"> </td>';
        		echo '<td><a href="viewReview.php?mediaID='. $mediaID . '">' . $title . '</a></td>';
            echo "<td>$rating</td>";
            echo "<td>$genre</td>";
          	echo "<td>$ageRating</td>";
            echo "<td>$releaseDate</td>";
          	echo "</tr>";
          }
          echo "</table>";
          mysql_close($mysql_access);
        ?>

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
