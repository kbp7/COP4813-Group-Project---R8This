<?php
  session_start();
  //this php script adds likes to database only if user is logged in. Can only like 1 thing once.

  if($_SESSION['username'] !== "" || $_SESSION['username'] !== NULL) {
    $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
    if(!$mysql_access)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('group8');

    $query = "SELECT count(*) FROM Likes WHERE UserID = $_SESSION['ID']";
    $likeresult = mysql_query($query, $mysql_access);

    if(!$likeresult)
    {
      die("Error processing data: ". mysql_error());
    }

    //Access row contents
    $lrow = mysql_fetch_row($likeresult);
    $count0 = $lrow[0];

    if($count0 === 0) {
      $query = "UPDATE count(*) FROM Likes WHERE UserID = $_SESSION['ID']";
      $likeresult = mysql_query($query, $mysql_access);
    }
    mysql_close($mysql_access);
  }

 ?>