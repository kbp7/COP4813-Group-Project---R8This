<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Use this page as a reference for the visual style of the website. Be mindful of our color pallette!!! -->

<head>
  <title>R8This.com</title>
  <link rel="stylesheet" href="libraries/bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="css/style.css"></link>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <!-- ///////////// Navbar ////////////// -->
  <div class="nav solidShadow">
    <ul>
      <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> R8This</a></li>
      <li><a href="pages/listReviews.php?Type= 'Movie'">Movies</a></li>
      <li><a href="pages/listReviews.php?Type= 'Game'">Games</a></li>
      <?php
        if($_SESSION['admin'] != null) {
          echo '<li><a href="pages/admin.php">Admin</a></li>';
        }
      ?>
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
    </ul>
  </div>
  <!-- Full width -->
  <div class="container-fluid">
    <div class="row align-middle mobile-hide" id="banner" style="height: 175px;">
      <div class="col-xs-4" style="height: 150px; margin-left: 100px; margin-right: -100px;">
        <h1 class="bigHeader lobster text-right" style="color: white; padding-top: 90px;">R8This</h1>
      </div>
      <!-- Logo -->
      <div class="col-xs-4" style="height: 225px; margin-top: -75px; margin-right:-100px;">
        <center>
          <canvas id="myCanvas" height="300" width="300"></canvas>
        </center>
      </div>
      <div class="col-xs-4" style="height: 150px;">
        <h1 class="bigHeader lobster text-left" style="color: white; padding-top: 90px;">Reviews</h1>
      </div>
      <div class="col-xs-12" style="z-index: 1;"><center>
        <div class="bannerDivPink" style="margin-bottom: -25px;height:50px;width: 250px;padding: 0px;" align="center">
            <h3 style="color: white; padding-top: 15px;">Latest Reviews</h3>
        </div>
      </center></div>
    </div>

  </div>
  <!-- List of latest 4 reviews -->
  <?php

    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

    $query = "SELECT * FROM Media ORDER BY ID DESC LIMIT 4";
    $result = mysql_query($query, $mysql_access);

    if(!$result)
    {
      die("Error processing data: ". mysql_error());
    }

    $row1 = mysql_fetch_assoc($result);
    $mediaID1 = $row1["ID"];
    $date1 = explode("-", $row1["ReleaseDate"]);
    $year1 = $date1[0];
    $row2 = mysql_fetch_assoc($result);
    $mediaID2 = $row2["ID"];
    $date2 = explode("-", $row2["ReleaseDate"]);
    $year2 = $date2[0];
    $row3 = mysql_fetch_assoc($result);
    $mediaID3 = $row3["ID"];
    $date3 = explode("-", $row3["ReleaseDate"]);
    $year3 = $date3[0];
    $row4 = mysql_fetch_assoc($result);
    $mediaID4 = $row4["ID"];
    $date4 = explode("-", $row4["ReleaseDate"]);
    $year4 = $date4[0];

	$countquery1 = "SELECT count(*) FROM Comment WHERE MediaID = $mediaID1";
    $commentresult1 = mysql_query($countquery1, $mysql_access);
    //Access row contents
    $commentrow1 = mysql_fetch_row($commentresult1);
    $commentcount1 = $commentrow1[0];

	$countquery2 = "SELECT count(*) FROM Comment WHERE MediaID = $mediaID2";
    $commentresult2 = mysql_query($countquery2, $mysql_access);
    //Access row contents
    $commentrow2 = mysql_fetch_row($commentresult2);
    $commentcount2 = $commentrow2[0];

	$countquery3 = "SELECT count(*) FROM Comment WHERE MediaID = $mediaID3";
    $commentresult3 = mysql_query($countquery3, $mysql_access);
    //Access row contents
    $commentrow3 = mysql_fetch_row($commentresult3);
    $commentcount3 = $commentrow3[0];

	$countquery4 = "SELECT count(*) FROM Comment WHERE MediaID = $mediaID4";
    $commentresult4 = mysql_query($countquery4, $mysql_access);
    //Access row contents
    $commentrow4 = mysql_fetch_row($commentresult4);
    $commentcount4 = $commentrow4[0];



	//Get Likes for each Review
	$countlikequery1 = "SELECT count(*) FROM Likes WHERE MediaID = $mediaID1";
    $likeresult1 = mysql_query($countlikequery1, $mysql_access);
    //Get Like count
    $likerow1 = mysql_fetch_row($likeresult1);
    $likecount1 = $likerow1[0];

	$countlikequery2 = "SELECT count(*) FROM Likes WHERE MediaID = $mediaID2";
    $likeresult2 = mysql_query($countlikequery2, $mysql_access);
    //Get Like count
    $likerow2 = mysql_fetch_row($likeresult2);
    $likecount2 = $likerow2[0];

	$countlikequery3 = "SELECT count(*) FROM Likes WHERE MediaID = $mediaID3";
    $likeresult3 = mysql_query($countlikequery3, $mysql_access);
    //Get Like count
    $likerow3 = mysql_fetch_row($likeresult3);
    $likecount3 = $likerow3[0];

	$countlikequery4 = "SELECT count(*) FROM Likes WHERE MediaID = $mediaID4";
    $likeresult4 = mysql_query($countlikequery4, $mysql_access);
    //Get Like count
    $likerow4 = mysql_fetch_row($likeresult4);
    $likecount4 = $likerow4[0];



    mysql_close($mysql_access);
?>
<?php
    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

    $reviewquery1 = "SELECT * FROM Review WHERE MediaID = " . $mediaID1;
    $reviewresult1 = mysql_query($reviewquery1, $mysql_access);
    if(!$reviewresult1)
      {
        die("Error processing data: ". mysql_error());
      }
	  //Get Review contents
    $reviewrow1 = mysql_fetch_row($reviewresult1);
    $ID1_Rev = $reviewrow1[0];
    $UserID1_Rev = $reviewrow1[1];
    $CreatedOn1_Rev = $reviewrow1[2];
    $MediaID1_Rev = $reviewrow1[3];
    $Review1_Rev = $reviewrow1[4];

    $reviewquery2 = "SELECT * FROM Review WHERE MediaID = " . $mediaID2;
    $reviewresult2 = mysql_query($reviewquery2, $mysql_access);
    if(!$reviewresult2)
      {
        die("Error processing data: ". mysql_error());
      }
    $reviewrow2 = mysql_fetch_row($reviewresult2);
    $ID2_Rev = $reviewrow2[0];
    $UserID2_Rev = $reviewrow2[1];
    $CreatedOn2_Rev = $reviewrow2[2];
    $MediaID2_Rev = $reviewrow2[3];
    $Review2_Rev = $reviewrow2[4];

	$reviewquery3 = "SELECT * FROM Review WHERE MediaID = " . $mediaID3;
    $reviewresult3 = mysql_query($reviewquery3, $mysql_access);
    if(!$reviewresult3)
      {
        die("Error processing data: ". mysql_error());
      }
    $reviewrow3 = mysql_fetch_row($reviewresult3);
    $ID3_Rev = $reviewrow3[0];
    $UserID3_Rev = $reviewrow3[1];
    $CreatedOn3_Rev = $reviewrow3[2];
    $MediaID3_Rev = $reviewrow3[3];
    $Review3_Rev = $reviewrow3[4];

    $reviewquery4 = "SELECT * FROM Review WHERE MediaID = " . $mediaID4;
    $reviewresult4 = mysql_query($reviewquery4, $mysql_access);
    if(!$reviewresult4)
      {
        die("Error processing data: ". mysql_error());
      }
    $reviewrow4 = mysql_fetch_row($reviewresult4);
    $ID4_Rev = $reviewrow4[0];
    $UserID4_Rev = $reviewrow4[1];
    $CreatedOn4_Rev = $reviewrow4[2];
    $MediaID4_Rev = $reviewrow4[3];
    $Review4_Rev = $reviewrow4[4];

		//Get username for each Review
	$usernamequery1 = "SELECT * FROM User WHERE ID='$UserID1_Rev'";
	$usernameresult1 = mysql_query($usernamequery1, $mysql_access);
	$usernamerow1 = mysql_fetch_assoc($usernameresult1);
	$userName1 = $usernamerow1['Username'];

	$usernamequery2 = "SELECT * FROM User WHERE ID='$UserID2_Rev'";
	$usernameresult2 = mysql_query($usernamequery2, $mysql_access);
	$usernamerow2 = mysql_fetch_assoc($usernameresult2);
	$userName2 = $usernamerow2['Username'];

	$usernamequery3 = "SELECT * FROM User WHERE ID='$UserID3_Rev'";
	$usernameresult3 = mysql_query($usernamequery3, $mysql_access);
	$usernamerow3 = mysql_fetch_assoc($usernameresult3);
	$userName3 = $usernamerow3['Username'];

	$usernamequery4 = "SELECT * FROM User WHERE ID='$UserID4_Rev'";
	$usernameresult4 = mysql_query($usernamequery4, $mysql_access);
	$usernamerow4 = mysql_fetch_assoc($usernameresult4);
	$userName4 = $usernamerow4['Username'];

    mysql_close($mysql_access);
  ?>

<div class="container">
    <div class="row reviewRows vcenter">
      <div class="col-xs-6 imgContainerLeft">
        <i class="material-icons largeIcon alignIcon"><?php if($row1["MediaType"] === "Movie") { echo "movie"; } else { echo "videogame_asset"; } ?></i>
        <img src="images/<?php echo $row1['Cover']; ?>" alt="Thumbnail" class="img-responsive img-rounded imgCropper">
      </div>
      <div class="col-xs-6 reviewQuote">
        <h3><a href="pages/viewReview.php?mediaID= <?php echo $mediaID1 ?>"><?php echo $row1["Title"];?> (<?php echo $year1; ?>)</a></h3>
        <blockquote>
          <p><?php
            function custom_echo($x)
              {
                if(strlen($x)<=200)
                {
                  echo $x;
                }
                else
                {
                  $y=substr($x,0,200) . '...';
                  echo $y;
                }
              }
            custom_echo($Review1_Rev, 200);
            //echo $Review1_Rev;
          ?>
          </p>
          <footer><?php echo $userName1; ?><cite title="Source Title">    Reviewer</cite></footer>
        </blockquote>
        <p style="float: left;"><a href="hiddenPHP/like.php?id=<?php echo $mediaID1; ?>"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a> <?php echo $likecount1; ?>
        </p>
        <p style="float: left; margin-left: 50px;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $commentcount1; ?>
        </p>
      </div>
    </div>

    <div class="row reviewRows vcenter">
      <div class="col-xs-6 imgContainerLeft">
        <i class="material-icons largeIcon alignIcon"><?php if($row2["MediaType"] === "Movie") { echo "movie"; } else { echo "videogame_asset"; } ?></i>
        <img src="images/<?php echo $row2['Cover']; ?>" alt="Thumbnail" class="img-responsive img-rounded imgCropper">
      </div>
      <div class="col-xs-6 reviewQuote">
        <h3><a href="pages/viewReview.php?mediaID= <?php echo $mediaID2 ?>"><?php echo $row2["Title"]; ?> (<?php echo $year2; ?>)</a></h3>
        <blockquote>
          <p><?php
          //echo $Review2_Rev;
          custom_echo($Review2_Rev, 200);
          ?></p>
          <footer><?php echo $userName2; ?><cite title="Source Title">    Reviewer</cite></footer>
        </blockquote>
        <p style="float: left;"><a href="hiddenPHP/like.php?id=<?php echo $mediaID2; ?>"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a> <?php echo $likecount2; ?>
        </p>
        <p style="float: left; margin-left: 50px;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $commentcount2; ?>
        </p>
      </div>
    </div>

    <div class="row reviewRows vcenter">
      <div class="col-xs-6 imgContainerLeft">
        <i class="material-icons largeIcon alignIcon"><?php if($row3["MediaType"] === "Movie") { echo "movie"; } else { echo "videogame_asset"; } ?></i>
        <img src="images/<?php echo $row3['Cover']; ?>" alt="Thumbnail" class="img-responsive img-rounded imgCropper">
      </div>
      <div class="col-xs-6 reviewQuote">
        <h3><a href="pages/viewReview.php?mediaID= <?php echo $mediaID3 ?>"><?php echo $row3["Title"]; ?> (<?php echo $year3; ?>)</a></h3>
        <blockquote>
          <p><?php
          //echo $Review2_Rev;
          custom_echo($Review3_Rev, 200);
          ?></p>
          <footer><?php echo $userName3; ?><cite title="Source Title">    Reviewer</cite></footer>
        </blockquote>
        <p style="float: left;"><a href="hiddenPHP/like.php?id=<?php echo $mediaID3; ?>"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a> <?php echo $likecount3; ?>
        </p>
        <p style="float: left; margin-left: 50px;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $commentcount3; ?>
        </p>
      </div>
    </div>

    <div class="row reviewRows vcenter">
      <div class="col-xs-6 imgContainerLeft">
        <i class="material-icons largeIcon alignIcon"><?php if($row4["MediaType"] === "Movie") { echo "movie"; } else { echo "videogame_asset"; } ?></i>
        <img src="images/<?php echo $row4['Cover']; ?>" alt="Thumbnail" class="img-responsive img-rounded imgCropper">
      </div>
      <div class="col-xs-6 reviewQuote">
        <h3><a href="pages/viewReview.php?mediaID= <?php echo $mediaID4 ?>"><?php echo $row4["Title"]; ?> (<?php echo $year4; ?>)</a></h3>
        <blockquote>
          <p><?php
          //echo $Review2_Rev;
          custom_echo($Review4_Rev, 200);
          ?></p>
          <footer><?php echo $userName4; ?><cite title="Source Title">    Reviewer</cite></footer>
        </blockquote>
        <p style="float: left;"><a href="hiddenPHP/like.php?id=<?php echo $mediaID4; ?>"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a> <?php echo $likecount4; ?>
        </p>
        <p style="float: left; margin-left: 50px;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $commentcount4; ?>
        </p>
      </div>
    </div>

  </div>
  <!-- Info and contact links -->
  <div id="footer" class="container-fluid footer">
    <div class="row">
      <div class="col-xs-12">
        <center>
          <p>
            <a href="pages/about.html"><span class="glyphicon glyphicon-info-sign contactGlyphs" aria-hidden="true"></span></a>
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
  <!--script src="libraries/anime-master/anime.min.js"></script-->
  <script src="animation.js"></script>
  <!--script>
    $(document).ready(function() {
        var mobile = (/iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));
        $('.mobile-hide').css('display', 'none');
    });
  </script-->
</body>

</html>
