<?php 
  ///Connect to database
  require 'dbconnect.php';
  

  // Query database
  $Sql = "SELECT * FROM  student";
  $Records = $Connection->query($Sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Information</title>
</head>
<body>
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

  <hr>
  <h1>UPDATE YOUR DATA above</h1>
    <form action="update.php" method="post">
      <h4>Input ID you want to edit</h4> 
      <input type="number" name="id">
      <h4>Select records you are trying to update</h4>
    
            <table> 
              <tbody>
                <tr>
                    <th></th>
                  <th align="left">First Name:</th>
                  <th align="left">Last Name:</th>
                  <th align="left">Classification:</th>
                  <th align="left">Age:</th>
              </tr>
          
    
              <tr>
                    <td>  Yes  </td>
                  <td> <input type="radio" name="checkFirst" value="yes"></td>
                  <td> <input type="radio" name="checkLast" value="yes"></td>
                  <td> <input type="radio" name="checkClass" value="yes"></td>
                  <td> <input type="radio" name="checkAge" value="yes"></td>
              </tr>
        
              <tr>
                  <td>  No  </td>
                  <td> <input type="radio" name="checkFirst" value="no"></td>
                  <td> <input type="radio" name="checkLast" value="no"></td> 
                  <td> <input type="radio" name="checkClass" value="no"></td> 
                  <td> <input type="radio" name="checkAge" value="no"></td>     
              </tr>
            
              <tr>
                  <td></td>
                  <td> <input type="text" name="firstName" <="" td="">
                  </td><td> <input type="text" name="lastName" <="" td="">
                  </td><td> <input type="text" name="class" <="" td="">
                  </td><td> <input type="text" name="age" <="" td="">                 
                </td>
              </tr>     
          </tbody>
        </table>
      <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
  <hr>
  <h1>Delete Selected above</h1>
  <form action="delete.php" method="post">
    <h4>Please select the record you want to delete by ID</h4>
      <input type="number" name="iddel">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>
</html>
