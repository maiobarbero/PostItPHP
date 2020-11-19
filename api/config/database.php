<?php

    

class Database{
    
    
     private $host =  'localhost';
     private $db_name =  'post';
     private $username =  'root';
     private $password =  'mysql';
        public $conn;

  
    // get the database connection
    public function getConnection(){

    
        
        $this->conn = null;
        
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
                    /*Create DB Table*/
            $sql = "CREATE TABLE IF NOT EXISTS todos (
            id INT(11) AUTO_INCREMENT PRIMARY KEY, 
            title VARCHAR(200) NOT NULL,
            priority TEXT NOT NULL,
            type TEXT NOT NULL,
            date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            completed TINYINT(1) NOT NULL DEFAULT 0
            )";
            $this->conn->exec($sql);

        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }

}

?>