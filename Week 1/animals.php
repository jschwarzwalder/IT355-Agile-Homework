<?php
 /*Jami Schwarzwalder
  *6/19/2016
  *http://jschwarzwalder.greenrivertech.net/it355/W1/animals.php
  */
  
  //Connect to database
  require '../../../db.php';

    
   //Define the SELECT query
    $sql = "SELECT * FROM animals ORDER BY animal_name";

	//Send the query to the database
    $result = @mysqli_query($cnxn, $sql);

	
	echo '<ul>';
	//Process the rows
    while ($row = mysqli_fetch_assoc($result)) {

        $name = $row['animal_name'];
        $type = $row['animal_type'];
        
        
		echo  "<li>$name - $type</li>";        
	}
	
	echo '</ul>';
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>List of Animals</title>
  </head>
  <body>
	<p><a href="new-animal.php">Add a new Animal</a></p>

 
  </body>
</html>    