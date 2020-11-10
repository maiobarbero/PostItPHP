<?php 
   
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=URDBNAME;host=YOURHOST';
$user = 'USER';
$password = 'PASSWORD';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


?>
