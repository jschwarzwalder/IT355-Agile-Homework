<?php
 /*Jami Schwarzwalder
  *6/19/2016
  *http://jschwarzwalder.greenrivertech.net/it355/W1/animals.php
  */
  
  //Connect to database
  require '../../../PDO.php';

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>List of Animals</title>
  </head>
  <body>
  <?php 
	  /* Multiple Rows  */
		//Define the query
		$sql = "SELECT animal_name, animal_type FROM animals;";
		
		// echo $sql;
		
		//Prepare the statement
		$statement = $dbh->prepare($sql);
		
		//print_r($dbh->errorInfo());
		
		//Execute the statement
		$statement->execute(); 
		//print_r($dbh->errorInfo());
		//print_r( $statement->fetchAll(PDO::FETCH_ASSOC));
		
		//Process the result
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		//print_r($statement->errorInfo());
		
		//print_r ($result);
		
		foreach ($result as $row) {
		  echo $row['animal_type']. ' - ' . $row['animal_name'];
		}

	?>
	<p><a href="new-animals.php">Add a new Animal</a></p>

 
  </body>
</html>    