<?php
		require 'dbconnect.php';
  ///Updating
	if(!empty($_POST['id']))
		{	
			$g = " WHERE id =";
			$id = $_POST['id'];
			$qID =$g.$id;		
				

			$radioFirstCheck = $_POST['checkFirst'];
			$radioLastCheck =$_POST['checkLast'];
			$radioClass = $_POST['checkClass'];
			$radioAge = $_POST['checkAge'];
		 	if($radioFirstCheck == "yes")
				{
			 		if($radioFirstCheck == "yes" && $radioLastCheck =="no"&& $radioClass =="no" && $radioAge == "no")
				 		{
				 			$firstName = $_POST['firstName'];
				 			$a = "firstName ='";		///process query
				 			$qF = $a.$firstName;
				 			$qF .= "'";
				 		}else{
				 			$firstName = $_POST['firstName'];
				 			$a = "firstName ='";		///process query
				 			$qF = $a.$firstName;
				 			$qF .= "',";
				 		}

				}else{
				 	$firstName ="";
				 	$qF ="";
				 }
			if($radioLastCheck == "yes")
				{
				 	if($radioLastCheck =="yes"&& $radioClass =="no" && $radioAge == "no")
				 		{
				 		$lastName = $_POST['lastName'];
				 		$b =" lastName ='";
				 		$qL =$b.$lastName;
				 		$qL .= "'";
				 		}else{
				 			$lastName = $_POST['lastName'];
				 			$b =" lastName ='";
				 			$qL =$b.$lastName;
				 			$qL .= "',";
				 		}
				}else{
				 	$lastName = "";
				 	$qL ="";
				}
			if($radioClass == "yes")
				{
				 	if($radioClass =="yes" && $radioAge == "no")
				 		{
				 			$class = $_POST['class'];
				 			$c =" class = '";
				 			$qC = $c.$class;
				 			$qC .= "'";
				 		}else{
				 		$class = $_POST['class'];
				 		$c =" class = '";
				 		$qC = $c.$class;
				 		$qC .= "',";
				 		}
				}else{
				 	$class = "";
				 	$qC = "";
				}
			if($radioAge == "yes")
				{
				 	$age = $_POST['age'];
				 	$d = " age = '";
				 	$qA = $d.$age;
				 	$qA .= "'";
				 	
				 }else{
				 	$age = "";
				 	$qA = "";
				 }
				 
				 echo "<br>"; echo "<br>";
				 ///final build query
			$e ="UPDATE student SET ";
			$sql =$e.$qF.$qL.$qC.$qA.$qID;  /// final sql query
				 
			// echo $sql;
			//run query that extracts from the database
			if ($Connection->query($sql) === TRUE) 
				{
  			  		echo "Record has successfully been Updated";
  			  		$Sql = "SELECT * FROM  student";   //querry for display
					$Records = $Connection->query($Sql);
				}else{
   					echo "Error: " . $sql . "<br>" . $Connection->error;
				}
		}else{
			echo "Please Input id of the data you want to update" ;
		}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Updated Dabase</title>
 </head>
 <body>
    <hr>
    <h2>Updated data base</h2>
      <table width="600" border="1" cellpadding="1" cellspacing="1" align="center">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Classification</th>
      <th>Age</th>
      <th>UIN</th>
      <th>ID</th>
    </tr>
      <?php
      while ( $student = $Records->fetch_assoc()){
        # code...
        echo "<tr>";
        echo "<td>".$student['firstName']."</td>";
        echo "<td>".$student['lastName']."</td>";
        echo "<td>".$student['class']."</td>";
        echo "<td>".$student['age']."</td>";
        echo "<td>".$student['UIN']."</td>";
        echo "<td>".$student['ID']."</td>";
        echo "</tr>";
      }  ///End loop
      ?>
  </table>
 </body>
 </html>