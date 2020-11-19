<?php
class Todo{
  
    // database connection and table name
    private $conn;
    private $table_name = "todos";
  
    // object properties
    public $id;
    public $title;
    public $priority;
    public $type;
    public $date_time;
    public $completed;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    function read(){
  
        // select all query
        $query = "SELECT
                    title, id, priority, type, date_time, completed
                FROM
                    " . $this->table_name . " todos
                    
                ORDER BY
                    id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    // create todo
function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                title=:title, priority=:priority, type=:type";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->priority=htmlspecialchars(strip_tags($this->priority));
    $this->type=htmlspecialchars(strip_tags($this->type));

    // bind values
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":priority", $this->priority);
    $stmt->bindParam(":type", $this->type);
   
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
// update todo
// update the product
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
             
                completed = :completed
               
            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    
    $this->completed=htmlspecialchars(strip_tags($this->completed));
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind new values
   
    $stmt->bindParam(':completed', $this->completed);
    $stmt->bindParam(':id', $this->id);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
// delete the product
function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
}
?>