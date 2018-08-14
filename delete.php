<?php
	require 'dbconnect.php';
		if(!empty($_POST['iddel']))
		{
			$id = $_POST['iddel'];
			$sql = 'DELETE FROM student WHERE ID = ';
			$sql .= $id;
			///get the max id of the database
			$maxSql ="SELECT MAX(ID) FROM student";	
			$result  = $Connection->query($maxSql);
			$max_id = $result->fetch_array();

			$valueMax_id =  $max_id[0] + 1;
			
			if($id < $valueMax_id)
			{
				
				if ($Connection->query($sql) === TRUE) 
				{
					echo "Student has successfully been deleted" . "<br>";
					$resizeSql = "ALTER TABLE student DROP ID; ";
					$resizeSql .= "ALTER TABLE student AUTO_INCREMENT = 1; ";
					$resizeSql .= "ALTER TABLE student ADD ID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";
					
					///echo $resizeSql;
						if ($Connection->multi_query($resizeSql) === TRUE)
						{	
							//querry for display

							echo "resize successfully made";

						}
						
							
					}else{
						 echo "Error: " . $sql . "<br>" . $Connection->error;
					}
				
			}else{
				echo "<br><br>" . "Record is not avaible! Please enter a record that is avaible.";
			}
		
		}else{
				echo "Please Input id of the data you want to delete" ; 
		}
  ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>View new Database</title>
 </head>
 <body>
    <hr>
    <h2>Click <a href="display.php">here</a> to view New data base</h2>

 </body>
 </html>