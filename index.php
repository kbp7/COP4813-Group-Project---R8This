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
      <li><a href="###">Movies</a></li>
      <li><a href="###">Games</a></li>
      <li><a href="###"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a></li>
      <?php
        if($_SESSION['username'] === "" || $_SESSION['username'] === null) {
          echo '<li style="float:right"><a href="pages/login.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a></li>';
        }
        else {
          echo '<li style="float:right"><a href="pages/userProfile.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>';
          echo '<li style="float:right"><a href="pages/userProfile.html">Logout</a></li>';
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
    //write logic to pull last 4 reviews info from database
    //Assign info to variables

    //gets first row (latest review)
    //SELECT * FROM (SELECT [Column] FROM [Table] ORDER BY [ID] DESC) WHERE ROWNUM = 1

    // Create connection
    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    // Check connection
    //check for mysql error
    if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

    $query = "SELECT * FROM Media ORDER BY ID LIMIT 1";
    $result = mysql_query($query, $mysql_access);

    if(!$result)
    {
      die("Error processing data: ". mysql_error());
    }

    //Access row contents
    $row = mysql_fetch_row($result);
    //echo $row[0]; //ID
    //echo $row[1]; //title

    mysql_close($mysql_access);

  ?>
  <div class="container">
    <div class="row reviewRows vcenter">
      <div class="col-xs-6 imgContainerLeft">
        <i class="material-icons largeIcon alignIcon">movie</i>
        <img src="images/BabyDriver.jpg" alt="Thumbnail" class="img-responsive img-rounded imgCropper">
      </div>
      <div class="col-xs-6 reviewQuote">
        <h3><a href="###">Baby Driver (2017)</a></h3>
        <blockquote>
          <p>If you want to see John Hamm going HAM then this is the movie for you. Just try not to think about Kevin Spacey.</p>
          <footer>Credible Critic, <cite title="Source Title">Reviewer</cite></footer>
        </blockquote>
        <p style="float: left;"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 847
        </p>
        <p style="float: left; margin-left: 50px;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 56
        </p>
      </div>
    </div>

    <div class="row reviewRows vcenter">
      <div class="col-xs-6 imgContainerLeft">
        <i class="material-icons largeIcon alignIcon">movie</i>
        <img src="images/BladeRunner2049.jpg" alt="Thumbnail" class="img-responsive img-rounded imgCropper">
      </div>
      <div class="col-xs-6 reviewQuote">
        <h3><a href="###">Blade Runner 2049 (2017)</a></h3>
        <blockquote>
          <p>The best film no one went out to see. Another cult classic in the making, much like its predecessor.</p>
          <footer>Roger Ebert's Ghost, <cite title="Source Title">Reviewer</cite></footer>
        </blockquote>
        <p style="float: left;"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 516
        </p>
        <p style="float: left; margin-left: 50px;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 77
        </p>
      </div>
    </div>

    <div class="row reviewRows vcenter">
      <div class="col-xs-6 imgContainerLeft">
        <i class="material-icons largeIcon alignIcon">videogame_asset</i>
        <img src="images/Hellblade.jpg" alt="Thumbnail" class="img-responsive img-rounded imgCropper">
      </div>
      <div class="col-xs-6 reviewQuote">
        <h3><a href="###">Hellblade: Senua's Sacrifice (2017)</a></h3>
        <blockquote>
          <p>An accurate and immersive way to experience Schizophrenia. I'm already hearing voices!</p>
          <footer>Socrates, <cite title="Source Title">Reviewer</cite></footer>
        </blockquote>
        <p style="float: left;"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 308
        </p>
        <p style="float: left; margin-left: 50px;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 40
        </p>
      </div>
    </div>

    <div class="row reviewRows vcenter">
      <div class="col-xs-6 imgContainerLeft">
        <i class="material-icons largeIcon alignIcon">movie</i>
        <img src="images/ItAlt.jpg" alt="Thumbnail" class="img-responsive img-rounded imgCropper">
      </div>
      <div class="col-xs-6 reviewQuote">
        <h3><a href="###">It (2017)</a></h3>
        <blockquote>
          <p>Mike Myers' absolutely chilling performance elevates this classic Dr. Seuss adaptation to terrifying levels.</p>
          <footer>Hambone Fakenamington, <cite title="Source Title">Reviewer</cite></footer>
        </blockquote>
        <p style="float: left;"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 947
        </p>
        <p style="float: left; margin-left: 50px;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 84
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
