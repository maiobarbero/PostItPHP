<?php 


if(isset($_POST['title'])){
    require_once '../connection.php';

    $title = $_POST['title'];
    $priority = $_POST['priority'];
    $type = $_POST['type'];
    

  if (empty($title)){
      header("Location: ../index.php?mess=error");
  }else{
      $stmt = $dbh ->prepare("INSERT INTO todos (title, priority, type) VALUES ('$title','$priority','$type')");
  
      $res = $stmt->execute([$title,$priority,$type]);
    


      if($res){
          header("Location: ../index.php?mess=success");
      }else{
          header("Location: ../index.php");
      }
      $dbh = null;
      exit();
  }
}else{
      header("Location: ../index.php?mess=error");
}



?>