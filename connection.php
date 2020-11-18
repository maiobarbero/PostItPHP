<?php 
require "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $dbh = new PDO("mysql:dbname=".$_ENV['DBNAME'].";host=".$_ENV['HOST'], $_ENV['USER'], $_ENV['PASSWORD']);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
/*Create DB Table*/
$sql = "CREATE TABLE todos (
id INT(11) AUTO_INCREMENT PRIMARY KEY, 
title VARCHAR(200) NOT NULL,
priority TEXT NOT NULL,
type TEXT NOT NULL,
date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
completed TINYINT(1) NOT NULL DEFAULT 0
)";

if ($dbh->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $dbh->error;
}


?>
