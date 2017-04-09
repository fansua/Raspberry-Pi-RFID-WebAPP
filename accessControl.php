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

<!DOCTYPE html>
<html>
<head>
<title> Real time employee access </title>
	<link rel="stylesheet" href="style.css">
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

     function getEmployeeData(id)
     {
       $.ajax({
        url: "employeeQuery.php",
        type: "POST",
        async: false,
        data: {
            eData: id

        },
        success: function(databaseData){

          parsedJSON = $.parseJSON(databaseData);  // take the JSON string data to convert it to obj to access key->value 
        
            //setTimeout(function(){
            $('#personID').val(parsedJSON.EmployeeID);
            $('#personLName').val(parsedJSON.LastName);
            $('#personFName').val(parsedJSON.FirstName);
             $('#personJobT').val(parsedJSON.JobTitle);
            $('#personTele').val(parsedJSON.TelephoneNumber);

            currentTime = new Date($.now());
            $('#timeNow').html(currentTime.toLocaleTimeString());
             disp = "ACCESS GRANTED"+"<br>"+"@"+"<br>";
               $('#display').html(disp);
               imagepath='<img src="'+url+'"width="256" height="256">';
                $('#image').html(imagepath);
        
         setTimeout(function(){$("#AccessControlFormID")[0].reset();},5000); // works in some kind of way 

       
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          
          alert("Status: " + textStatus);
          alert("Error: " + errorThrown);
        }
      
      }); 

     } 
     
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
          
            $('#ReaderStatusID').val(parsedJSON.ReaderStatus);
          //  $('#ErrorCodeID').val(parsedJSON.ErrorCode);
            //$('#ErrorExplainID').val(parsedJSON.ErrorExplain);
            $('#CardNumID').val(parsedJSON.CardID);
            $('#temperatureID').val(parsedJSON.Temperature);
            cardID = parsedJSON.CardID;
           getEmployeeData(cardID); 
          
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
      setInterval(function(){getConnectionData();},100);  // 2000 
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
       <h1>Real-Time Employee Access </h1>
      </header>
	</div>

     <nav class="nav">
	      <h2 style="text-align:center color: white"><div id="display"></div></h2>
        
       <h2 style="text-align:center color: white"> <div id="timeNow"></div></h2>

       <div id="image"></div>
	
 
     
	 <div id="statusID"> 
     <h3 style="color: white">
        READER STATUS<br>
       <input readonly type="text" name="id" id="ReaderStatusID" value="" placeholder="Not Connected" size="30"><br><br>
        CARD ID<br>
        <input readonly type="text" name="id"  id="CardNumID" value="" placeholder="RF_NULL" size="30"><br><br>
          TEMPERATURE READING<br>
        <input readonly type="text" name="id"  id="temperatureID" value="" placeholder="RF_NULL" size="30"><br><br>
        
         </h3>
    </div>
	

      </nav>

<div>
<article>
 <br><br>
 
  <h3 style="color: white">Employee ID:
  <input readonly type="text" name="id" id="personID" value="" placeholder="Not Connected">
  <br><br>
  Last name:
  <input readonly type="text" name="lastname" id="personLName" value="" placeholder="Not Connected">
  <br><br>
  First name:
  <input readonly type="text" name="firstname" id="personFName" value="" placeholder="Not Connected">
  <br><br>
  Job Title:
  <input readonly type="text" name="pos" id="personJobT" value="" placeholder="Not Connected">
  <br><br>
  Telephone Number:
  <input readonly type="text" name="tele" id="personTele" value="" placeholder="Not Connected">
  <br><br>
  </h3>
</article>

</div>


</body>
</html>
