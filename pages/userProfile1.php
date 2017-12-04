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
