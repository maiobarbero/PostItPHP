<?php 


if(isset($_POST['title'])){
    require_once '../connection.php';

$title = $_POST['title'];
$priority = $_POST['priority'];
$type = $_POST['type'];

$sql = "INSERT INTO todos (title, priority, `type`) VALUES (?,?,?)";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(1, $title, PDO::PARAM_STR);
$stmt->bindParam(2, $priority, PDO::PARAM_STR);
$stmt->bindParam(3, $type, PDO::PARAM_STR);

$res = $stmt->execute();

if($res){
 header("Location: ../index.php?mess=success");
}else{
    header("Location: ../index.php");
}
     

$dbh = null;
exit();
}else{
      header("Location: ../index.php?mess=error");
}
 ?>
