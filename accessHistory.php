<?php
session_start();
include 'query.php';
include 'databaseConn.php';

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

	$sql = "SELECT * FROM ACCESSHISTORY.RECORDS";
    $data = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title> Access History </title>
	<link rel="stylesheet" href="style.css">

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
		
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript">

$(document).ready(function(){
    $('#accesstable').DataTable({
     "dom": '<"top" f><"bottom" tlp><"clear">'


    });
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
<div class="container">
<header>
<h1>Access History log </h1>
</header>

</div>

<?php

echo "<table border=1 id=accesstable style=width:100%>
<thead>
<tr>
<th>Record#</th>
<th>Card ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Access Time</th>
</tr>
</thead>";


echo "<tbody>";
while($record = mysqli_fetch_assoc($data)){


	echo"<tr>";
    echo "<td>".$record['Record']."</td>";
    echo "<td>".$record['EmployeeID']."</td>";
    echo "<td>".$record['FirstName']."</td>";
    echo "<td>".$record['LastName']."</td>";
    echo "<td>".$record['CurrentTime']."</td>";
    echo "</tr>";

}
echo "</tbody>";

echo "</table>";

?>

</body>
</html>
