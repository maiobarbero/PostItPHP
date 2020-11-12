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
