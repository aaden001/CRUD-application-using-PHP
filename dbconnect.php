<?php
	$Servername = "localhost";
	$Username = "root";
	$Password = "passWORD12!";
	$Database = "student_info";

	///connect to database
	$Connection = new mysqli($Servername, $Username, $Password, $Database);


	if($Connection -> connect_error)
	{
		die("Failed to establish connection to MYSQL");
	}
	//echo "Connection established ";

?>