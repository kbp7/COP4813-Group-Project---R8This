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
  $row = $result->fetch_assoc();
  //echo $row[0];
  //echo $row[1];
  mysql_close($mysql_access);

?>
