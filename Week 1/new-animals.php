<?php
	/*Jami Schwarzwalder
	*6/19/2016
	*http://jschwarzwalder.greenrivertech.net/it355/W1/new-animals.php
	*Form to add new animals to database
	*/
  
     //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
  
	//Connect to database
	require '../../../PDO_db_Connection.php';
?>  
<!DOCTYPE html>

<html>
<head>
 <meta charset="UTF-8">
    <!-- IE Edge Meta Tag -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>New Animals</title>
</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="text-center"> Enter a new Animal</h3>
				</div>
				<div class="panel-body">
	<?php
	
	$name = '' ;
    $type = '';
	
	
       
    //Form has been submitted 
    if (isset($_POST['submit'])) {
		

	 $isValid = true;
	 $name = '';
	 $type = '';

 	 //Validate first name
        if (!empty($_POST['animal_name'])) {
            $name = $_POST['animal_name'];
        } else {
            echo '<p class="text-center">Please enter the animal\'s name.</p>';
            $isValid = false;
			$name="";
	    }

	 //Validate last name
        
		if (!empty($_POST['animal_type'])) {
            $type = $_POST['animal_type'];
        } else {
            echo '<p class="text-center">Please enter the animal\'s type.</p>';
            $isValid = false;
			$type ="";
        }
		
	
		
		
		//Send to Database
		if ($isValid) {
            
            //Escape the data
            //$name = mysqli_real_escape_string($cnxn, $name);
           // $type = mysqli_real_escape_string($cnxn, $type);
           
            /* 	PDO insert statement*/
			//Define the query
			$sql = "INSERT INTO `animals`(`animal_type`, `animal_name`) VALUES (:type, :name)";
				
			//Prepare the statement
			$statement = $dbh->prepare($sql);

			//Bind the parameters
			$statement->bindParam(':type', $type, PDO::PARAM_STR);
			$statement->bindParam(':name', $name, PDO::PARAM_STR);

			//Execute
			$statement->execute();
			
           
            
			 //Display summary
            		echo '<h3 class="text-center">New animal added!</h3>';
            		echo '<p class="text-center" >Name: $name</p>';
			echo '<p class="text-center">Type: $type</p>';
			echo '<p class="text-center"><a href="animals.php">See results</a></p>';
			echo '</div></div></div></div></div>';
            return;
        }
		
	}
?>

				   <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
					
						<div class="form-group text-center">     
							<label for="animal_name">Animal Name:</label>
								<input type="text" name="animal_name" size="20" value="<?php echo $name; ?>"  >
							<br>
						</div>
						<div class="form-group text-center">
						<label for="animal_type">Animal Type:</label>
							<input type="text" name="animal_type" size="20" value="<?php echo $type; ?>" >
						<br>
						
						<br>
						</div>
					
							<button type="submit" value="Validate" name="submit" class="btn btn-default pull-right">Submit</button>
					</form>
				</div>  
			</div>	
		</div>
	</div>  
</div>	
</body>

</html>
