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
<div class="container">
  <div class="row">
    <div class="col-sm-4 col-md-4 user-details">
            <div class="user-image">
                <img src="" alt="Huu Huynh" title="User profile" class="img-circle">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3>Huu Huynh</h3>
                    <span class="help-block">Jacksonville, FL</span>
                </div>
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#email">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#events">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </a>
                    </li>
                </ul>
                <div class="user-body">
                    <div class="tab-content">
                        <div id="information" class="tab-pane active">
                            <h4>Account Information</h4>
                        </div>
                        <div id="settings" class="tab-pane">
                            <h4>Settings</h4>
                        </div>
                        <div id="email" class="tab-pane">
                            <h4>Send Message</h4>
                        </div>
                        <div id="review" class="tab-pane">
                            <h4>Review</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</body>
  <?php
    //pulling latest 4 comments
    // Create connection
    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    // Check connection
    // Check for Error  if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

    $select_comments2 = $db->query ("SELECT * FROM Comment WHERE UserID=$userID ORDER BY ID DESC LIMIT 4";
    $result = mysql_query($query, $mysql_access);

    if(!$result)
    {
      die("Error processing data: ". mysql_error());
    }

    //Access row contents
    $row = mysql_fetch_row($result);
    echo $row[0];
    echo $row[1];

    mysql_close($mysql_access);

  ?>
</html>