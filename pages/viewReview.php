<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Use this page as a reference for the visual style of the website. Be mindful of our color pallette!!! -->

<head>
  <title>R8This.com</title>
  <link rel="stylesheet" href="../libraries/bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../css/style.css"></link>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <!-- ///////////// Navbar ////////////// -->
  <div class="nav solidShadow">
    <ul>
      <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> R8This</a></li>
      <li><a href="###">Movies</a></li>
      <li><a href="###">Games</a></li>
      <?php
        if($_SESSION['admin'] === 1) {
          echo '<li><a href="pages/admin.php">Admin</a></li>';
        }
      ?>
      <li><a href="pages/admin.php">Admin</a></li>
      <li><a href="###"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a></li>
      <?php
        if($_SESSION['username'] === "" || $_SESSION['username'] === null) {
          echo '<li style="float:right"><a href="pages/login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a></li>';
        }
        else {
          $currentUser = $_SESSION['username'];
          echo '<li style="float:right"><a href="pages/userProfile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $currentUser . '</a></li>';
          echo '<li style="float:right"><a href="pages/logout.php">Logout</a></li>';
        }
      ?>
	  <ul>
  </div>
  <!-- Full width -->
  <div class="container-fluid">
    <div class="row align-middle" style="height: 175px;">
      <div class="col-xs-12" style="z-index: 1;">
        <div class="col-xs-2 col-xs-offset-5 text-center bannerDivPink" style="margin-bottom: -25px;">
          <center>
            <h3 style="color: white;">Movie Review</h3>
          </center>
        </div>
      </div>
    </div>
  </div>
<?php

  $mediaID = $_GET['mediaID'];

  $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
  if(!$mysql_access)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db('group8');

  $query = "SELECT * FROM Review WHERE MediaID = " . $mediaID;
  $result = mysql_query($query, $mysql_access);

  if(!$result)
  {
    die("Error processing data: ". mysql_error());
  }

  $row = mysql_fetch_row($result);

  $ID = $row[0];
  $UserID = $row[1];
  $CreatedOn = $row[2];
  $MediaID = $row[3];
  $Review = $row[4];

  $query2 = "SELECT * FROM Media WHERE ID = " . $mediaID;
  $result2 = mysql_query($query2, $mysql_access);

  if(!$result2)
  {
    die("Error processing data: ". mysql_error());
  }

  $row2 = mysql_fetch_row($result2);

  $ID_Media = $row2[0];
  $Title_Media = $row2[1];
  $Genre_Media = $row2[2];
  $AgeRating_Media = $row2[3];
  $Cover_Media = $row2[4];
  $ReleaseDate_Media = $row2[5];
  $MediaType_Media = $row2[6];
  $Rating_Media = $row2[7];

  $query4 = "SELECT * FROM User WHERE ID = " . $UserID;
  $result4 = mysql_query($query4, $mysql_access);

  if(!$result4)
  {
    die("Error processing data: ". mysql_error());
  }

  $row4 = mysql_fetch_row($result4);

  $ID_User = $row4[0];
  $Username_User = $row4[1];
  $Email_User = $row4[2];
  $Password_User = $row4[3];
  $Admin_User = $row4[4];

  mysql_close($mysql_access);

  ?>
  <div class="container">
    <div style="background: url('../images/BabyDriver.jpg') no-repeat center center; position:fixed; width: 100%; height: 1000px; top:0; left:0; z-index: -1; filter:blur(5px); filter:brightness(50%);"></div>
    <div class="wumbotron">
      <!--h1 class="bigHeader lobster vertical-align">Baby Driver(2017)</h1-->
      <!--h2 class="tealAccent" style="margin-top: 215px; text-align: center; font-weight: normal;">Review</h2-->
    </div>
  </div>

  <!-- Movie review -->
  <div class="container">
    <div class="row">
      <!--div class="col-xs-12">
        <img src="../images/BabyDriver.jpg" alt="Thumbnail" class="img-responsive img-rounded imgCropper center-block" height="500" width="1000">
      </div-->
    </div>
    <div class="row" style="background:white;">
      <div class="col-xs-12 rounded">

        <img src="../images/<?php echo $Cover_Media ?>" align="left" class="img-thumbnail" height="400" width="200">

        <h2><?php echo $Title_Media ?></h2>
        <a href="###"><h3><?php echo $Username_User ?></h3></a>
        <?php echo $Review;?>
      </div>
    </div>
  </div>
  </div>

<h2> Comments </h2>
<?php
  $mediaID = $_GET['mediaID'];

  $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
  if(!$mysql_access)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db('group8');

  $query3 = "SELECT * FROM Comment WHERE MediaID = " . $mediaID;
  $result3 = mysql_query($query3, $mysql_access);

  if(!$result3)
  {
    die("Error processing data: ". mysql_error());
  }

  while ($row3 = mysql_fetch_row($result3)){

  $ID_Com = $row3[0];
  $MediaID_Com = $row3[1];
  $UserID_Com = $row3[2];
  $CreatedOn_Com = $row3[3];
  $Comment_Com = $row3[4];

  $query5 = "SELECT * FROM User WHERE ID = " . $UserID;
  $result5 = mysql_query($query5, $mysql_access);

  if(!$result5)
  {
    die("Error processing data: ". mysql_error());
  }

  $row5 = mysql_fetch_row($result5);

  $ID_User2 = $row5[0];
  $Username_User2 = $row5[1];
  $Email_User2 = $row5[2];
  $Password_User2 = $row5[3];
  $Admin_User2 = $row5[4];

echo <<<END
<div class="container">
    <div class="row">
      <div class="col-xs-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="float: left image">
              <p style="float: left;"><span class="glyphicons glyphicons-user"></span></p>
            </div>
            <div class="float: left">
              <div class="title h5">
                <a href="###"><b>$Username_User2</b></a>
              </div>
            </div>
          </div>
          <div class="panel-body">
            $Comment_Com;
          </div>
        </div>
      </div>
    </div>
END;
  }
      mysql_close($mysql_access);
?>
<form action='../hiddenPHP/addComment.php' method="get">
<div class="container">
    <div class="row">
      <div class="col-xs-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="float: left">
              <div class="title h5">
                <a href="###"><b>Add Comment:</b></a>
				<?php $mediaID = $_GET['mediaID']; 
				<input type="hidden" name="mediaID" value="php echo $mediaID;">
				?>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <input name="addComment" id="addComment" type="text">
			<button type="submit" class="btn btn-default" value="Add" >Add</button>
          </div>
        </div>
      </div>
 </div>		
</div> 
	</form>	  
  <!-- Info and contact links -->
  <div id="footer" class="container-fluid footer">
    <div class="row">
      <div class="col-xs-12">
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


  <!-- Include jQuery and scripts -->
  
  <script src="libraries/jquery.min.js"></script>
  <script src="libraries/anime-master/anime.min.js"></script>
  <script src="animation.js"></script>
</body>

</html>
