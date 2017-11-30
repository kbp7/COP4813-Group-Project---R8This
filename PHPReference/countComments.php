<?php
  //counts # of comments associated with review
  //need to assign value to $mediaID
  // Create connection
  $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');
  // Check connection
  //check for mysql error
  if(!$mysql_access)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db('group8');

  $query = "SELECT count(MediaID) FROM Comment WHERE MediaID = $mediaID";
  $result = mysql_query($query, $mysql_access);

  if(!$result)
  {
    die("Error processing data: ". mysql_error());
  }

  //Access row contents
  $row = mysql_fetch_row($result);
  $count = $row[0];

  mysql_close($mysql_access);

?>
