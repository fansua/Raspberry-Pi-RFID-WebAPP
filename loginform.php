<?php
	session_start();
	if(isset($_POST["loginName"]) && isset($_POST["password"]))
	{
		$_SESSION["loginName"] = $_POST["loginName"];
		$_SESSION["password"] = $_POST["password"];
		if( $_SESSION["loginName"] ==("Admin") && $_SESSION["password"] == ("password")){
		header("Location: admin.php");}
		else{
		header("Location: loginform.php");  // change to index.php
		}
		exit;
	}
?>


<!--!DOCTYPE html> -->
<html> 
	<head lang="en">
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style.css"> 
		<script src="https://maxcdn.bootstrapcdnc.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  		  <style>
				body {
	    				background-image: url("login.jpg");
	    				background-repeat: no-repeat;
	   					background-size: cover;
	   					background-attachment: fixed;
					}
				ul {
				    list-style-type: none;
				    margin: 0;
				    padding: 0;
				    overflow: hidden;
				    background-color: #333;
				    font-family: arial,sans-serif;
				}
				nav {
				    float: left;
				    max-width: 300px;
				    margin: 0;
				    padding: 30px;
				    height: 100%;
				    
				    border: 1px solid gray;
				}

				nav ul {
				    list-style-type: none;
				    padding: 1em;
				    text-align: center;
				}
				   
				nav ul a {
				    text-decoration: none;
				}

				li a:hover, .dropdown:hover .dropbtn {
				    background-color: #fff ;
				}
		</style>
		


  	</head>
	
	<body> 
	<ul>
	<li><a>TapLook™</a></li>
    </ul>

  	
		
		<form name="loginForm" method="POST" id="loginFormID">
				
					<h1 style="color: white;" align="center">Login</h2></th><br>
	
					<div align="center" class="form-group has-feedback">
					<!-- <h2 style="color: white; font-size: 130%">Username </h2> -->
					 <input type="text" name ="loginName" id="loginID" class="login_box" placeholder="Username" required autofocus>
					 
					</div>
					<br>

					<div align = center>
					<!-- <h2 style="color: white; font-size: 130%">Password </h2> -->
					 <input type="password" name="password" id="passwordID" placeholder="Password">
					</div>
					<br>
					<div align = center><input type="submit" class="btn btn-primary btn-lg" value="Login" id="submitId"></div>
		</form>
	
		
	</body> 
	

</html> 