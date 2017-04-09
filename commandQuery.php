<?php
include 'databaseConn.php';

	if(isset($_POST['display'])){

		$sql = "SELECT ReaderStatus,ErrorCode,ErrorExplain,CardID,Temperature from commandDB.instructions";
		//$sql = "SELECT FirstName, LastName, JobTitle, TelephoneNumber, from EMPLOYEEDB.EMPLOYEEINFO WHERE EmployeeID = tempID";
$resultSet = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($resultSet);
	$jsonData= json_encode($row);
	echo($jsonData);   // send as json data  so that the side can  retrieve it  easiler 
}

?>
