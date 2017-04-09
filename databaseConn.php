<?php
$serverName = "localhost";
$userName = "root";
$password = "password321";

$conn = mysqli_connect($serverName, $userName, $password);
if(!$conn)
	die("Connection Failed: ". mysqli_connect_error());
//else{
//echo("Connected Successfully"."<br>");}

?>