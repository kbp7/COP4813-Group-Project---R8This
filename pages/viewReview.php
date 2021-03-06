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
      <li><a href="listReviews.php?Type= 'Movie'">Movies</a></li>
      <li><a href="listReviews.php?Type= 'Game'">Games</a></li>
      <?php
        if($_SESSION['admin'] != null) {
          echo '<li><a href="admin.php">Admin</a></li>';
        }
      ?>
      <?php
        if($_SESSION['username'] === "" || $_SESSION['username'] === null) {
          echo '<li style="float:right"><a href="login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a></li>';
        }
        else {
          $currentUser = $_SESSION['username'];
          echo '<li style="float:right"><a href="userProfile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $currentUser . '</a></li>';
          echo '<li style="float:right"><a href="logout.php">Logout</a></li>';
        }
      ?>
	  <ul>
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

  $countlikequery = "SELECT count(*) FROM Likes WHERE MediaID = " . $ID_Media;
  $likeresult = mysql_query($countlikequery, $mysql_access);
  if(!$likeresult)
  {
    die("Error processing data: ". mysql_error());
  }
  //Get Like count
  $likerow = mysql_fetch_row($likeresult);
  $likecount = $likerow[0];

  mysql_close($mysql_access);

  ?>
<!-- Full width -->

  <div class="row align-middle" style="height: 25px;">
    <div class="col-xs-12" style="z-index: 1; margin-top: 50px;">
      <div class="col-xs-2 col-xs-offset-5 text-center bannerDivPink">
        <center>
          <?php
              if(strpos($MediaType_Media, 'Movie') !== FALSE){
                echo '<h3 style="color: white;">Movie Review</h3>';
              }
              else{
                echo '<h3 style="color: white;">Game Review</h3>';
              }
           ?>
        </center>
      </div>
    </div>
  </div>


  <div class="container-fluid" style="background: url('../images/<?php echo $Cover_Media ?>'); background-size: cover; position:fixed; width: 100%; height: 100%; top:0; z-index: -1; filter:brightness(50%);">

  </div>

  <!-- Movie review -->
<div class="container">
  <div class="row reviewContent">
    <div class="col-md-12 rounded">
      <img src="../thumbIMG/<?php echo $Cover_Media ?>" align="left" class="img-thumbnail" height="400" width="200" style="margin-right: 25px;">
      <h2><?php echo $Title_Media ?></h2>
      <p>Reviewed by - <?php echo $Username_User ?></p>
      <h3><a href="../hiddenPHP/likeVR.php?id=<?php echo $mediaID; ?>"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a> <?php echo $likecount; ?>
      </h3>
      <?php echo $Review;?>
      <div align="right">
      <h3>R8This Score: <?php echo $Rating_Media; ?></h3>
      <?php
        if($Rating_Media === '8'){
          echo '<h4> Certified Octopi!</h4>';
        }
       ?>
    </div>
    </div>
  </div>


<div class="row reviewContent">
  <div class="col-md-12" align="center">
    <h2> Comments </h2>
  </div>

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

  $query5 = "SELECT * FROM User WHERE ID = " . $UserID_Com;
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


      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="float: left image">
              <p style="float: left;"><span class="glyphicons glyphicons-user"></span></p>
            </div>
            <div class="float: left">
              <div class="title h5">
                <b>$Username_User2</b></a>
              </div>
            </div>
          </div>
          <div class="panel-body">
            $Comment_Com
          </div>
        </div>
      </div>

END;
  }
      mysql_close($mysql_access);
?>
<div class="col-md-12">
  <form action='../hiddenPHP/addComment.php' method="get" style="background:none;">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="float: left">
            <div class="title h5">
              <b>Add Comment:</b>
                <?php $mediaID = $_GET['mediaID']; ?>
              <input type="hidden" name="mediaID" value="<?php echo $mediaID;?>"/>
            </div>
          </div>
        </div>
        <div class="panel-body">
            <input name="addComment" id="addComment" type="text" maxlength="300" size="100"/>
             <button type="submit" class="btn btn-default" value="Add" >Add</button>
        </div>
      </div>
    </div>
</form>
</div>

</div>




</div>
  <!-- Info and contact links -->
  <div id="footer" class="container-fluid footer">
    <div class="row">
      <div class="col-xs-12">
        <center>
          <p>
            <a href="about.html"><span class="glyphicon glyphicon-info-sign contactGlyphs" aria-hidden="true"></span></a>
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

  <script src="../libraries/jquery.min.js"></script>
  <script src="../libraries/anime-master/anime.min.js"></script>
</body>

</html>
