<?php
 /*Jami Schwarzwalder
  *6/19/2016
  *http://jschwarzwalder.greenrivertech.net/it355/W1/animals.php
  */
  
  //Connect to database
  require '../../../PDO.php';

?>



<!DOCTYPE html>
<head>
 <meta charset="UTF-8">
    <!-- IE Edge Meta Tag -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Animals</title>
</head>

<body>
  <div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center"> List of Animals</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group">
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
							  echo '<li  class="list-group-item ">'. $row['animal_type']. ' - ' . $row['animal_name']. '</li>';
							}

						?>
					</ul>
					<p><a href="new-animals.php">Add a new Animal</a></p>

				</div>
			</div>
		</div>
	</div>
</div>
					
 
  </body>
</html>    