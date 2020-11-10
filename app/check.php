<?php 


if(isset($_POST['id'])){
    require '../connection.php';

    $id = $_POST['id'];
   
    

  if (empty($id)){
      echo 'error';
  }else{
      $todos = $dbh->prepare("SELECT id, completed FROM todos WHERE id=?");
      $todos->execute([$id]);
      $todo = $todos->fetch();
      $uId = $todo['id'];
      $checked = $todo['completed'];

        
    $uChecked = $checked ? 0 : 1;

    $res = $dbh->query("UPDATE todos SET completed=  $uChecked WHERE id=$uId");

    if ($res){
        echo $checked;
    }else{
        echo 'error';
    }

      $dbh = null;
      exit();
  }
}else{
      header("Location: ../index.php?mess=error");
}



?>