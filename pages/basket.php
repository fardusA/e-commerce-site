<?php
	session_start(); //start session 
	include("db.php"); //include database 
	
	//name of the page and total
	$pagename= "Ordering Basket";
	$total = 0;
	
	//product id and quantity passed through the POST method (form data)
	$newprodid = $_POST['h_prodid'];
	$reququantity = $_POST['quantity'];
	
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //link stylesheet
	
	echo "<title>".$pagename."</title>"; //page title
	
	include ("headfile.html"); // include headfile html template
	
	echo "<p></p>"; //break
	
	echo "<h2>".$pagename."</h2>"; // heading of page 
	
	/*if a new item has been added to the basket, add newprodid and reququantity as index and value pairs
  	of the basket session array and display the message "your basket has been updated"*/
	if($newprodid){
	 
		$_SESSION['basket']['$newprodid'] = $reququantity;
		echo "<p> Your basket has been updated";
		
	}
	
    //if the basket session array is not empty, display the array items (prod name, price, quantity) and total price in a table 	
	if (isset($_SESSION['basket'])){
		
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>Product Name</th>";
		echo "<th>Price</th>";		
		echo "<th>Quantity</th>";
		echo "<th>Subtotal</th>";
		echo "</tr>";
		
		
		//for each index and value pair in the basket session array, display each value in a separate table row
		foreach($_SESSION['basket'] as $index => $value)
		{
			echo "<tr>";
			echo $value;
			echo "</tr>";
		}
				
		echo "</table>";
		
	}
		
	//if no item has been added to the basket session array, display message "basket is empty"		
	else{
		echo "<p> Basket is empty</p>";
	
	}

	include("footfile.html"); //include footfile html template
?>
