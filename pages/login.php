<?php session_start(); ?>
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
      <li><a href="./listReviews.php?Type= 'Movie'">Movies</a></li>
      <li><a href="./listReviews.php?Type= 'Game'">Games</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="row" style="padding-top:50px;">
      <div class="col-md-6 col-md-offset-3">
        <form action="authenticate.php" method="post" style="padding: 50px;">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-lg">Sign In</button>
          <button type="button" class="btn btn-lg"><a href="register.php">Register</a></button>
          <button type="button" class="btn btn-lg"><a href="../index.php">Cancel</a></button>
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
                <a href="about.html"><span class="glyphicon glyphicon-info-sign contactGlyphs" aria-hidden="true"></span>
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
      <script src="../animation.js"></script>
</body>

</html>
