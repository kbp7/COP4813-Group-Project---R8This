<?php
  // Create connection
  $mysql_access = mysql_connect(localhost, 'group8', 'fall2017887766');

  //check for mysql error
  if(!$mysql_access)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db('group8');

  //your query
  $query = "SELECT Comment FROM Comments where userID = '123' ORDER BY ID desc";
  $result = mysql_query($query, $mysql_access);

  if(!$result)
  {
    die("Error processing data: ". mysql_error());
  }

  //Access row contents
  $row = mysql_fetch_row($result);
  echo $row[0]; //ID
  echo $row[1]; //title
  //....
  mysql_close($mysql_access);

?>
