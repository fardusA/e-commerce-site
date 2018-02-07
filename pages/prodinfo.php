<?php
	
	include("db.php"); //include database
	$pagename= "Product Information"; //name of the web page
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //link stylesheet
	
	echo "<title>".$pagename."</title>"; //title of web page
	
	include ("headfile.html"); //include headfile html template
	
	echo "<p></p>"; //break
	
	echo "<h2>".$pagename."</h2>"; //page heading
	$prodid=$_GET['u_prodid']; //product id passed through GET method and set to the variable named prodid
	
	//query database for all product information from the product table that is related to the product id that was passed through the GET method 
	$prodSQL="select prodId, prodName, prodPicName, 
	prodDescrip , prodPrice, prodQuantity from product
	where prodId=".$prodid;
	
	$exeprodSQL=mysql_query($prodSQL) or die(mysql_error()); //execute the query or die if there is an error

	$thearrayprod=mysql_fetch_array($exeprodSQL); //fetch the query as an array and set it to the variable thearrayprod
	
	//display the data from the array 
	echo "<center><b>".strtoupper($thearrayprod['prodName'])."</b></center>";
	echo "<img src=images/".$thearrayprod['prodPicName'].">";
	echo "<p>".$thearrayprod['prodDescrip']."</p>";
	echo "<p>GBP ".$thearrayprod['prodPrice']."</p>";
	echo "<p>Number in stock ".$thearrayprod['prodQuantity'];
	
	//display form made of one text box and one button for user to enter quantity
	//pass the product id to the next page, basket.php, as a hidden value
	echo "<form action=basket.php method=post style=float:left>";
	echo "<center>Enter required quantity: ";
	//echo "<input type=text name=p_quantity size=5 maxlength=3>";
	
	/*create a drop down menu that is dynamically populated depending on the product's available quantity as noted on the database, 
	prodQuantity field, and thearrayprod array*/
	echo "<select name= 'quantity'>";
		for($i = 1; $i <= $thearrayprod['prodQuantity']; $i++)
		{
			echo "<option value='.$i'>".$i."</option>";
		
		}
	echo "</select>";
	
	echo "<input type=submit value='Add to Basket'>"; //form submit button
	echo "<input type=hidden name=h_prodid value=".$prodid.">"; //hidden value containing the current product id
	echo "</center>";
	echo "</form></p><br>";

	include("footfile.html"); //include footfile html template
?>
