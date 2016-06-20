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

/* Single Row Display */

//Define the query
$sql = "SELECT animal_name, animal_type FROM animals 
	  WHERE animal_id = :id";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$id = 3;
$statement->bindParam(':id', $id, PDO::PARAM_INT);

//Execute the statement
$statement->execute(); 

//Process the result
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['animal_name']." - ".$row['animal_type'];

/* Multiple Rows
//Define the query
$sql = "SELECT animal_name, animal_type FROM animals";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Execute the statement
$statement->execute(); 

//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {	echo $row['animal_type'] . ' - ' 	. $row['animal_name'];
}
 */
?>

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
	<p><a href="new-animals.php">Add a new Animal</a></p>

 
  </body>
</html>    