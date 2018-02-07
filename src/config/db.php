<?php
	$dbhost = 'example.dbs.host.co.uk'; //the server hosting the database
	$dbuser = 'exampleuser'; //your username and password to access the database
	$dbpass = 'yrR3nu7dJlxml';
	
  //connect to the databse using the host, username and passowrd
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
  
  //if the connection doesn't work, stop connecting and display an error
	if(!$conn)
	{
		die('Could not connect: ' .mysql_errpr());
	}
  
  //if it does connect, select your database by passing your database name and connection
	mysql_select_db("exampleuser_0", $conn);
?>
