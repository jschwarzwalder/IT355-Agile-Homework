<?php 
#print_r(PDO::getAvailableDrivers());

	$user = '';
    $pass = '';
    $host = 'localhost';
    $dbname = '';

try {
  # MS SQL Server and Sybase with PDO_DBLIB
  $DBH = new PDO("mssql:host=$host;dbname=$dbname, $user, $pass");
  $DBH = new PDO("sybase:host=$host;dbname=$dbname, $user, $pass");
 
  # MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
 
  # SQLite Database
  $DBH = new PDO("sqlite:my/database/path/database.db");
}
catch(PDOException $e) {
    echo $e->getMessage();
}


if ($DBH->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
    $stmt = $DBH->prepare('select * from foo',
        array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
} else {
    die("my application only works with mysql; I should use \$stmt->fetchAll() instead");
}

?>