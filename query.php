<?php
include 'databaseConn.php';

	function init()
	{
		include 'databaseConn.php';

		if(isset($_SESSION["PageNumber"]))
		{
			$pageNum = $_SESSION["PageNumber"];
			$sql = "UPDATE commandDB.instructions SET PageNumber='$pageNum'"; # 
				
			if (mysqli_query($conn, $sql))
			{
				//echo("New record created successfully". "<br>");
			//$quit = true; 
			} 
			else 
			{
				echo("Error: " . $sql . "<br>" . mysqli_error($conn). "<br>");
			}
		}
	}

	function takePic()
	{
		if(!($soc  = socket_create(AF_INET,SOCK_STREAM,0)))
		{
			$errorCode = socket_last_error();
			$errorMsg = socket_strerror($errorCode);

			die("Couldn't create socket: [$errorCode] $errorMsg \n");
		}
		if(!socket_connect($soc, '192.168.2.3',5060))
		{
			$errorCode = socket_last_error();
			$errorMsg = socket_strerror($errorCode);

			//die("Couldn't connect: [$errorCode] $errorMsg \n");
			//echo("Couldnt connect"."<br>");
		}
		$msg = "T";

		if(!socket_send($soc,$msg,strlen($msg),0))
		{
			$errorCode = socket_last_error();
			$errorMsg = socket_strerror($errorCode);

			//die("Couldn't send data: [$errorCode] $errorMsg \n");
			//echo("couldn't send data"."<br>");

		}


	}

?>