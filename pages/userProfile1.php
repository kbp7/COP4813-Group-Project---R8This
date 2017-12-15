<?php
session_start();
  //pulling latest 4 comments
  // Create connection
  $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
  // Check connection
  // Check for Error  if(!$mysql_access)
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

  //Access row contents
  $row1 = mysql_fetch_row($result);
  $comment1 = $row1["Comment"]);
  echo $comment1;

  $row1 = mysql_fetch_row($result);
  $comment1 = $row1["Comment"]);
  echo $comment1;

  $row1 = mysql_fetch_row($result);
  $comment1 = $row1["Comment"]);
  echo $comment1;

  $row1 = mysql_fetch_row($result);
  $comment1 = $row1["Comment"]);
  echo $comment1;

  mysql_close($mysql_access);

?>
