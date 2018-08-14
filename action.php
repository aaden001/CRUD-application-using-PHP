<?php 
	require 'dbconnect.php';
	print_r($_POST);
	if (!empty($_POST))
	{
		///keep track for validation errors
		 
				
		/// Get data from UI
		if(! get_magic_quotes_gpc())
		{
		$Fname = addslashes($_POST['fname']);
		$Lname = addslashes($_POST['lname']);
		} else {
			$Fname = $_POST['fname'];
			$Lname = $_POST['lname'];
		}

		$Class = $_POST['classify'];
		$Age = $_POST['age'];
		$UIN = $_POST['uin'];

		/*  Use this for validation
		 $FnameError = null;
		 $LnameError = null;
		 $ClassError = null;
		 $AgeError = null;
		 $UINError = null;

		//validate user input
		$valid = true;
			if(empty($Fname)){
				$FnameError = 'Please Enter Your First Name';
				//$valid = false;
			}
			if(empty($Lname)){
				$LnameError = 'Please Enter Your Last Name';
				//$valid = false;
			}
			if(empty($Class)){
				$ClassError = 'Please specify you classification';
			}
			if($Age > 16 || $Age<25)
			{
				$AgeError = 'Please you must be of age bracket 16 -25';
				//$valid = false;
			}
			if(UIN < 0)
			{
				$UINError = 'UIN should be positive';
				//$valid = false;
			}
				$valid = false;
			*/
		
		///inserting data into database

		$Sql ="INSERT INTO student (firstName,lastName,class, age, UIN)
		VALUES ('$Fname','$Lname','$Class','$Age', '$UIN')";
		
		//run query
		if ($Connection->query($Sql) === TRUE) {
  			  echo "New record created successfully";
			} else {
   					 echo "Error: " . $Sql . "<br>" . $Connection->error;
					}
	
	}
	

	//echo "<br>"; echo "<br>";
	///o 'You name ' , $Fname , ' ' , $Lname , '. You are a ' , $Class , '. Your are ', $Age , ' year old.  Your Universitiy Idenitifcation number is ', $UIN, '.' ;
	

?>
