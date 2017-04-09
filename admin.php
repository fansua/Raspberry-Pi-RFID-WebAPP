<?php
	session_start(); 
	include 'query.php';
	
	if(!isset($_SESSION["loginName"]) && !isset($_SESSION["password"]))
	{
		header("location:loginform.php");
	}
	if(isset($_POST["registerInfo"]))
	{
	
		//$_SESSION["registerInfo"] = $_POST["registerInfo"];
		$_SESSION["PageNumber"] = 1;
		header("location:register.php");
		exit;
	}
	
	else if (isset($_POST["accessInfo"])){
		$_SESSION["PageNumber"] = 2;
		header("location:accessControl.php");
	}
	
	
	else if(isset($_POST["historyInfo"])){
		$_SESSION["PageNumber"] = 4;
		header("location:accessHistory.php");
	}
	else if(isset($_POST["editdb"])){
		$_SESSION["PageNumber"] = 5;
		header("location:displayDB.php");
	}
	else if (isset($_POST["logout"]))
	{
		header("location:loginform.php");
		session_destroy();
	}
	
	else
	{
		$_SESSION["PageNumber"] = 0;
	}

init();
		
	
	
		
?>

<!--!DOCTYPE html> -->
<html>
	<head  lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>TapLook Menu Page</title> 
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="https://maxcdn.bootstrapcdnc.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!--<script type="text/javascript" src="change.js"></script> -->
		<style>
			body {
    				background-image: url("page3.jpg");
    				background-repeat: no-repeat;
   					background-size: cover;
   					background-attachment: fixed;
				}
		</style>
	</head> 
	
	<body>
	
		
		<header style="background-color:#333;"><h1 align="center" style="">TapLook™ </h1></header>
		<form name="menuForm" method="POST" id="formMenuID"><br><br><br>
		<div align=center>
			<div>
				<a href="register.php" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-user"></span> Register Page</a>
			</div><br><br>

			<div>
				<a href="accessControl.php" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-lock"></span> Real-Time Access Control Page</a>
			</div><br><br>

			<div>
				<a href="displayDB.php" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-hdd"></span> Employee Database</a>
			</div><br><br>

			<div>
				<a href="accessHistory.php" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-folder-close"></span> Access History page</a>
			</div><br><br>
	
			<div>
				<input type="submit" name="logout" class="btn btn-lg btn-danger" value="Log Out">
			</div>

		</div>
	
	</body>
</html>
