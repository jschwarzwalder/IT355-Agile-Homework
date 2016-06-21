<?php
 /*Jami Schwarzwalder
  *6/19/2016
  *http://jschwarzwalder.greenrivertech.net/it355/W1/animals.php
  */
  
  //Connect to database
  require '../../../PDO_db_Connection.php';



/* Single Row Display 



//Define the query
$sql = "SELECT animal_name, animal_type FROM animals 
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

*/

/* Multiple Rows  */
//Define the query
$sql = "SELECT * FROM animals";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Execute the statement
$statement->execute(); 

//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {	
	echo $row['animal_type'] . ' - ' . $row['animal_name'];
}


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