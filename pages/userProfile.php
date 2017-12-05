
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
    <div class="col-md-12 user-details" align="center">
      <?php

        $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
        // Check connection
        if(!$mysql_access)
        {
          die('Could not connect: ' . mysql_error());
        }

        mysql_select_db('group8');
        $userID = $_SESSION['ID'];
        $query = "SELECT * FROM Comment WHERE UserID=$userID ORDER BY ID DESC LIMIT 4";
        $result = mysql_query($query, $mysql_access);

        if(!$result)
        {
          die("Error processing data: ". mysql_error());
        }

        $avatarID = $userID % 4;


        ?>
            <div class="thumb2">
                <img src='../images/avatars/<?php echo $avatarID ?>.jpg' alt="Picture" title="User profile" class="img-circle">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h1 class="lobster bigHeader"><?php echo $_SESSION['username']; ?></h1>

                </div>


            </div>
        </div>
  </div>
<div class="row">
  <div class="col-md-12" align="center">
    <h3>Latest Comments</h3>
  </div>
  <div class="col-md-6 col-md-offset-3">

  <?php
  //$four = 0;
    while($row = mysql_fetch_assoc($result)) {
      $comment = $row["Comment"];
      $mediaID = $row["MediaID"];
      $query2 = "SELECT * FROM Media WHERE ID=$mediaID";
      $result2 = mysql_query($query2, $mysql_access);
      $media = mysql_fetch_assoc($result2);
      $commentTitle = $media["Title"];
      echo '
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">'.$commentTitle.'</h3>
          </div>
          <div class="panel-body">'.
            $comment . '
          </div>
        </div>
      ';
    }


    mysql_close($mysql_access);

  ?>
</div>
</div>
</body>







</html>
