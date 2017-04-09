<?php
session_start();
include 'query.php';

if(isset($_GET["page"])) 
	{

		if($_GET["page"]== '0')
			$_SESSION["PageNumber"] = 0;
		
		else if ($_GET["page"]== '1')
			$_SESSION["PageNumber"] = 1;
		
		else if ($_GET["page"]== '2')
			$_SESSION["PageNumber"] = 2;

		else if($_GET["page"]== '3')
			$_SESSION["PageNumber"] = 3;

		else if($_GET["page"]== '4')
			$_SESSION["PageNumber"] = 4;
	}
	init();

?>

<!--!DOCTYPE html> -->
<html> 
	<head lang="en">
		<meta charset="utf-8">
		<title>Statistical Data Page</title>
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->
	<!--<script type="text/javascript" src="bmi.js"></script> -->
	<link rel="stylesheet" href="style.css">
	</head> 
	
	<body > 
	<ul>
	<li><a class="active" href="admin.php?page=0">Project Home</a></li>
	<li><a class="active" href="register.php?page=1">Register Employee</a></li>
	<li><a class="active" href="displayDB.php?page=5">View Employee Database</a></li>
	<li><a class="active" href="accessControl.php?page=2">Real-Time Access</a></li>
	<li><a class="active" href="statisticalInfo.php?page=4">Statistical Info</a></li>
    <li><a class="active" href="accessHistory.php?page=3">Access History</a></li>
    </ul>


	<h2>Statistical Data Page</h2>
	<img src="ComingSoon.jpg" alt="Coming Soon" style="width:304px;height:228px;">

	


	</body>
</html>