<?php

	include ("db.php");
	$pagename= "Index";
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //include stylesheet
	
	echo "<title>".$pagename."</title>"; //page title 
	
	include ("headfile.html"); //include headfile html template
	
	echo "<p></p>"; //break
	
	// page heading and brief description
	echo "<h2>".$pagename."</h2>"; 
	echo "<p> Amazing products for your home, for your work, for you! <br><br><hr>";
	
	//query database for all product information from the product table and execute the query 
	$SQL="select prodId, prodName, prodPicName, prodPrice from product";
	$exeSQL=mysql_query($SQL) or die (mysql_error());
	
	//create an array of the executed query and perform a while loop to display the data
	while($arrayprod=mysql_fetch_array($exeSQL))
	{
		echo "<br>";
		echo "<p><a href=prodinfo.php?u_prodid=".$arrayprod['prodId'].">";
		echo $arrayprod['prodName']."<br>";
		echo "</a>";
		echo "<img src=images/".$arrayprod['prodPicName'].">";
		echo "<br>";
		echo "<p> &pound;".$arrayprod['prodPrice']."</p>";		
		echo "<hr>";
	}
	
	include("footfile.html"); //include the footfile html template
?>
