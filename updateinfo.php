<?php
session_start();
include 'query.php';
include 'databaseConn.php';

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

if(isset($_POST['update']))
{

	$queryupdate = "UPDATE EMPLOYEEDB.EMPLOYEEINFO SET FirstName='$_POST[firstname]', LastName='$_POST[lastname]',JobTitle = '$_POST[position]', Address='$_POST[address]', TelephoneNumber='$_POST[telephone]' WHERE EmployeeID = '$_POST[hidden]'";

		mysqli_query($conn, $queryupdate);
}

if(isset($_POST['delete']))
{

	$deleteqry = "DELETE FROM EMPLOYEEDB.EMPLOYEEINFO WHERE EmployeeID = '$_POST[hidden]'";

	mysqli_query($conn, $deleteqry);
}

$sql = "SELECT * FROM EMPLOYEEDB.EMPLOYEEINFO";
$data = mysqli_query($conn, $sql);

?>

<html>
<head lang="en">
		<meta charset="utf-8">
		<title>Edit Employee Database</title>
		<link rel="stylesheet" type="text/css" href="style.css">
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
    	$('#employeeTable').DataTable({
     	"dom": '<"top" f><"bottom" t><"clear">'

   	 });
});

</script>
</head>
<body>
<ul>
	<li><a class="active" href="admin.php?page=0">Project Home</a></li>
  <li><a class="active" href="register.php?page=1">Register Employee</a></li>
  <li><a class="active" href="displayDB.php?page=5">View Employee Database</a></li>
  <li><a class="active" href="accessControl.php?page=2">Real-Time Access</a></li>
    <li><a class="active" href="accessHistory.php?page=3">Access History</a></li>
    </ul>
<header>
       <h1>Edit Employee Database</h1>
      </header>


<?php



echo "<table border=1 id=employeeTable style=width:100%>
<thead>
<tr>
<th>Employee ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Job Title</th>
<th>Address</th>
<th>Telephone</th>
<th>Image Url</th>
</th>
</tr>
</thead>";


echo "<tbody>";
while($dbinfo = mysqli_fetch_assoc($data)){
	echo"<tr>";

	echo"<form action=updateinfo.php method=post>";
	echo "<tbody>";
	echo "<tr>";
	echo "<td>".$dbinfo['EmployeeID']."</td>";
	echo "<td>"."<input type=text name=firstname value=" . $dbinfo['FirstName']."></td>";
	echo "<td>"."<input type=text name=lastname value=" . $dbinfo['LastName']."></td>";
	echo "<td>"."<input type=text name=position value=" . $dbinfo['JobTitle']."></td>";
	echo "<td>"."<input type=text name=address value=" . $dbinfo['Address']."></td>";
	echo "<td>"."<input type=text name=telephone value=" . $dbinfo['TelephoneNumber']."></td>";
  echo "<td>"."<input type=text name=image value=" . $dbinfo['imageUrl']."></td>";
	echo "<input type=hidden name=hidden value=". $dbinfo['EmployeeID'].">";
	echo "<td>"."<input type=submit name=update value=Update>"."</td>";
	echo "<td>"."<input type=submit name=delete value=Delete>"."</td>";

	echo "</tr>";



	echo "</form>";
}
echo "</tbody>";

echo "</table>";


?>

</body>
</html>


