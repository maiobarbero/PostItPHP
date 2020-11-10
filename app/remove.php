<?php 


if(isset($_POST['id'])){
    require '../connection.php';

    $id = $_POST['id'];
   
    

  if (empty($id)){
      echo 0;
  }else{
      $stmt = $dbh ->prepare("DELETE FROM todos WHERE id = ?");
  
      $res = $stmt->execute([$id]);
    


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