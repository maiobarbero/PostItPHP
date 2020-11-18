<?php 


if(isset($_POST['id'])){
    require '../connection.php';

    $id = $_POST['id'];
   
    

  if (empty($id)){
      echo 0;
  }else{
      $sql = "DELETE FROM todos WHERE id = ?";
      $stmt = $dbh ->prepare($sql);
      $stmt -> bindParam(1,$id,PDO::PARAM_INT);
      $res = $stmt->execute();
    


      if($res){
          echo 1;
      }else{
          echo 0;
      }
      $dbh = null;
      exit();
  }
}else{
      header("Location: ../index.php?mess=error");
}



?>