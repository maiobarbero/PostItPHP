<?php
// required headers
header("Access-Control-Allow-Origin: *"); //everyone can read
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/todo.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$todo = new Todo($db);
  
// query products
$stmt = $todo->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $todo=array();
    $todos_arr["todos"]=array();
  
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       
        // extract row
        // this will make $row['name'] to
       
        // just $name only
        extract($row);
  
        $todo_item=array(
            "id" => $id,
            "title" => $title,
            "priority" =>$priority,
            "type" => $type,
            "date_time" => $date_time,
            "completed" => $completed
        );
  
        array_push($todos_arr["todos"], $todo_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($todos_arr);
}
  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No todos found.")
    );
}

?>
