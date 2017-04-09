<?php
	include 'databaseConn.php';
	$quit = false; 
?>
<?php

	$employeeID = $_POST['employeeNum'];
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	$jobTitle = $_POST['jobtitle'];
	$address = $_POST['address'];
	$teleNum = $_POST['tel'];
	
	$sql = "CREATE DATABASE IF NOT EXISTS EMPLOYEEDB";
	if(mysqli_query($conn, $sql))
	{
		echo("DATABASE CREATED SUCCESSFULLY". "<br>");
	}
	else
	{ 
		echo("Error creating database: ". mysqli_error($conn). "<br>"); 
	}
	$sql = "CREATE TABLE IF NOT EXISTS EMPLOYEEDB.EMPLOYEEINFO (
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	EmployeeID VARCHAR(10) NOT NULL UNIQUE, 
	FirstName VARCHAR(30) NOT NULL,
	LastName VARCHAR(30) NOT NULL,
	JobTitle VARCHAR(30) NOT NULL,
	Address VARCHAR(50) NOT NULL,
	TelephoneNumber VARCHAR(50) NOT NULL,
	DateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	imageUrl VARCHAR(255) DEFAULT 'images/unknown.jpg')";
	if (mysqli_query($conn, $sql)) 
	{
		echo("Table created successfully". "<br>");
	} 
	else 
	{
		echo ("Error creating table: " . mysqli_error($conn). "<br>");
	}
	$sql = "INSERT INTO EMPLOYEEDB.EMPLOYEEINFO (EmployeeID,FirstName,LastName,JobTitle,Address,TelephoneNumber) 
            VALUES ('$employeeID','$firstName','$lastName','$jobTitle','$address',$teleNum)"; # check out the prepared statement function for safety 
			
	if (mysqli_query($conn, $sql))
	{
		echo("New record created successfully". "<br>");
		//$quit = true; 
	} 
	else 
	{
		echo("Error: " . $sql . "<br>" . mysqli_error($conn). "<br>");
	}

	// Creating ACCESS History 
	
	$sql = "CREATE DATABASE IF NOT EXISTS ACCESSHISTORY"; //Create access history database

	if(mysqli_query($conn, $sql))
	{
		echo("HISTORY DB CREATED SUCCESSFULLY". "<br>");
	}
	else
	{ 
		echo("Error creating database: ". mysqli_error($conn). "<br>"); 
	}

  
	$sql = "CREATE TABLE IF NOT EXISTS ACCESSHISTORY.RECORDS (
	Record INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	EmployeeID VARCHAR(10) NOT NULL, 
	FirstName VARCHAR(30) NOT NULL,
	LastName VARCHAR(30) NOT NULL,
	CurrentTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

	if (mysqli_query($conn, $sql)) 
	{
		echo("history Table created successfully". "<br>");
	} 
	else 
	{
		echo ("Error creating table: " . mysqli_error($conn). "<br>");
		
	}
	$quit = true; 



     if( $quit){
	
		header("location:register.php");
		exit;
	}
?>