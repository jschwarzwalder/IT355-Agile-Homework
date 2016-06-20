<?php
 /*Jami Schwarzwalder
  *6/19/2016
  *http://jschwarzwalder.greenrivertech.net/it355/W1/animals.php
  */
  
  //Connect to database
  require '../../../db.php';

    
   //Define the query
$sql = "INSERT INTO animals(animal_type, animal_name) 
	VALUES (:type, :name)";

//Prepare the statement
$statement = $cnxn->prepare($sql);

//Bind the parameters
$type = 'kangaroo';
$name = 'Joey';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);

//Execute
$statement->execute();

//Bind the parameters
$type = 'snake';
$name = 'Slitherin';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);

//Execute
$statement->execute();

/* UPDATE */

//Define the query
$sql = "UPDATE animals SET animal_name = :new 
	WHERE animal_name = :old";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$old = 'Joey';
$new = 'Troy';
$statement->bindParam(':old', $old, PDO::PARAM_STR);
$statement->bindParam(':new', $new, PDO::PARAM_STR);

//Execute
$statement->execute();

/* DELETE  */

//Define the query
$sql = "DELETE FROM animals 
	WHERE animal_type = :type";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$type = 'kangaroo';
$statement->bindParam(':type', $type, PDO::PARAM_STR);

//Execute
$statement->execute();

?>