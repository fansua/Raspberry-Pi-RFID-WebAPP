<?php
include 'databaseConn.php';


if(isset($_POST['eData']) && $_POST['eData'] != 'RF_NULL'){

         $tempId = $_POST['eData'];

         $commandDBsql = "SELECT AccessStatus from commandDB.instructions";
          $accessdata = mysqli_query($conn, $commandDBsql);

            //   date_default_timezone_set('America/Toronto');
  
            //while($record = mysqli_fetch_assoc($accessdata))
            //{
             $record = mysqli_fetch_assoc($accessdata);
             $aStatus = $record['AccessStatus'];
             if($aStatus == 'false')
             {
             	$sql = "SELECT EmployeeID, FirstName, LastName, JobTitle, TelephoneNumber from EMPLOYEEDB.EMPLOYEEINFO WHERE EmployeeID='$tempId'";
				$resultSet = mysqli_query($conn, $sql);

//while($row = mysqli_fetch_assoc($resultSet)){
    			$row = mysqli_fetch_assoc($resultSet);
    			  $currentID = $row['EmployeeID'];
                  $curretFName = $row['FirstName'];
                  $currentLName = $row['LastName'];
				$jsonData= json_encode($row);
				echo($jsonData);   // send as json data  so that the side can  retrieve it  easiler 
				sendEmployeeInfo($currentID,$curretFName,$currentLName);


             }


           // }

		//$sql = "SELECT ReaderStatus,ErrorCode,ErrorExplain,CardID from commandDB.instructions";
//$sql = "SELECT EmployeeID, FirstName, LastName, JobTitle, TelephoneNumber from EMPLOYEEDB.EMPLOYEEINFO WHERE EmployeeID='$tempId'";
//$resultSet = mysqli_query($conn, $sql);

//while($row = mysqli_fetch_assoc($resultSet)){
    //$row = mysqli_fetch_assoc($resultSet);
	//$jsonData= json_encode($row);
	//echo($jsonData);   // send as json data  so that the side can  retrieve it  easiler 



}

function sendEmployeeInfo($currentID,$curretFName,$currentLName)
{
	include 'databaseConn.php';


              $duplicateSql = "SELECT * from ACCESSHISTORY.RECORDS";

               
                $data = mysqli_query($conn, $duplicateSql);
                while($existingData = mysqli_fetch_assoc($data))
                {
                  $existingID = $existingData['EmployeeID'];
                  $existingfname = $existingData['FirstName'];
                  $existinglname = $existingData['LastName'];
                  $existingTime = $existingData['CurrentTime'];
                }

                 
            
                  if($existingID!=$currentID&&$existingfname!=$curretFName&&$existinglname!=$currentLName)
                  {
                        

                            $sql = "INSERT INTO ACCESSHISTORY.RECORDS (EmployeeID,FirstName,LastName)
                            VALUES('$currentID','$curretFName', '$currentLName')";

                             mysqli_query($conn, $sql);

                  }




}
?>