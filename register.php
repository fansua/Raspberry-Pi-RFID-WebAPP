<?php
session_start();
include 'query.php';
	
	if(isset($_GET["page"])) 
	{

		if($_GET["page"]== '0')
			$_SESSION["PageNumber"] = 0;
	
		else if($_GET["page"]== '1')
			$_SESSION["PageNumber"] = 1;
	
		else if ($_GET["page"]== '2')
			$_SESSION["PageNumber"] = 2;

		else if($_GET["page"]== '3')
			$_SESSION["PageNumber"] = 3;

		else if($_GET["page"]== '4')
			$_SESSION["PageNumber"] = 4;

		else if($_GET["page"]== '5')
			$_SESSION["PageNumber"] = 5;
	}
	init();
	/*if(isset($_GET['pic']))
	{
		takePic(); 

	}*/
	if(isset($_POST['pic']))
	{
		takePic(); 

	}

?>


<!--!DOCTYPE html> -->
<html> 
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Registration Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style>
			body {
    				background-image: url("page3.jpg");
    				background-repeat: no-repeat;
   					 background-size: cover;
   					background-attachment: fixed;
				}

	</style>

	<script type="text/javascript">

       
		function getConnectionData()
		{
		
			 $.ajax({
			 	url: "commandQuery.php",
				type: "POST",
				async: false,
				data: {
					"display": 1

				},
				success: function(databaseData){


					parsedJSON = $.parseJSON(databaseData);  // take the JSON string data to convert it to obj to access key->value 
					
						//$('#statusID').html($.type(databaseData);
						$('#ReaderStatusID').val(parsedJSON.ReaderStatus);
						//$('#ErrorCodeID').val(parsedJSON.ErrorCode);
						//$('#ErrorExplainID').val(parsedJSON.ErrorExplain);
						$('#CardNumID').val(parsedJSON.CardID);  // return the value attribute 
						$('#employeeId').val(parsedJSON.CardID);
					
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
					//$('#statusID').append("Status: " + textStatus); 
					alert("Status: " + textStatus);
					alert("Error: " + errorThrown);
				}
				
			}); 
			//$('#statusID').load("commandQuery.php");
			
		}

		$(document).ready(function(){
			setInterval(function(){getConnectionData();},100);  // 2000 /100

		});


	</script>

	</head> 

	<body> 
		<ul>
		<li><a class="active" href="admin.php?page=0">Home</a></li>
		<li><a class="active" href="register.php?page=1">Register</a></li>
		<li><a class="active" href="displayDB.php?page=5">Employee Database</a></li>
		<li><a class="active" href="accessControl.php?page=2">Access Control</a></li>
	    <li><a class="active" href="accessHistory.php?page=3">Access History</a></li>
	    </ul>
	<header>
       <h1>Registration Form </h1>
      </header>
			<nav class="nav">
			
				<div align="center"><img src="unknown.jpg" width="256" height="256"></div>
				<!-- <button class="button">Take Photo</button>  -->
				<!--<a href="?pic=true" class ="button"> Take Photo</a> -->
				<form method="POST" action="register.php" class="registerC" id="registerId" autocomplete="on">
				<input type="submit" name="pic" class="btn btn-primary btn-xs" style="padding: 7px 10px;" value="Take Photo" id="photo">
				</form>
				<div id="statusID"> 

						
				</div>
		     	
			     <h3 style="color: white">READER STATUS<br>
					<input readonly type="text" name="id" id="ReaderStatusID" value="" placeholder="Not Connected">
					<br><br>
					<!--ERROR CODE
					<br>
					<input readonly type="text" name="id"  id="ErrorCodeID" value="" placeholder="RF_NULL">
					<br><br>
					ERROR EXPLANATION
					<br>
					<input readonly type="text" name="id"  id="ErrorExplainID" value="" placeholder="RF_NULL">
					<br><br> -->
					Card ID
					<br>
					<input readonly type="text" name="id"  id="CardNumID" value="" placeholder="RF_NULL">
			   </h3>
					
			</nav>
			<article>
	
				<div id="registerformId" class="registerformC" style="min-width:250px;">
				<form method="POST" action="process.php" class="registerC" id="registerId" autocomplete="on">
					<h3 style="color: white">
					<input type="hidden"  name="employeeNum" id="employeeId" required><br><br>
					<label for="fname" class="fname">First Name:</label><input type="text" name="fname" id="fnameId" required autofocus><br><br>
					<label for="lname" class="lname">Last Name:</label><input type="text" name="lname" id="lnameId" required><br><br>
					<label for="jobtitle" class="jobtitle">Job Title:</label><input type="text" name="jobtitle" id="jobtitleId" required><br><br>
					<label for="address" class="address">Address:</label><input type="text" name="address" id="addressId" required><br><br>
					<label for="tel" class="tel">Telephone#: </label><input type="text"  name="tel" id="telId" required><br><br>
					<input type="submit" class="btn btn-primary btn-lg" value="Register Employee" id="registerInfoId">
			</form>
				
		</div>
		</article>

	</body>
</html>