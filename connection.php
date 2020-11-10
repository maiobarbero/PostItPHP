<?php 
   
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=post_it;host=localhost';
$user = 'root';
$password = 'mysql';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


?>