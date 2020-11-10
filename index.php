<?php 
   
require_once 'connection.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post It</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
    <main>
       
        <div class="add-container">

        <!-- ADD TODO -->

            <div class="add-todo">
                <form action="app/add.php" method="POST" autocomplete="off">

                    <!-- no text in input -->

                    <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') {?>
                        <input type="text"
                    name="title"
                    placeholder="Field Required!!!"
                    class="error">

                    <!-- correct input -->

                    <?php } else{?>

                    <input type="text"
                    name="title"
                    placeholder="Start Planning!">
                   
                    <?php } ?>

                    <button type="submit">+</button>

                    
                    <div>
                      <span class="custom-dropdown">
                        <select name="priority">
                            <option>High Priority</option>
                            <option>Medium Priority</option>  
                            <option>Low Priority</option>
                        
                        </select>
                        </span>
                        <span class="custom-dropdown type">
                            <select name="type">
                                <option>Works</option>
                                <option>Hobbies</option>  
                                
                            
                            </select>
                        </span>
                    </div>
                   
                </form>
                
            </div> 
        </div>
             
            <?php
                $todos = $dbh -> query("SELECT * FROM `todos` ORDER BY `id` DESC");
            ?>

            <?php if($todos -> rowCount() === 0) {?>

              <!-- No TODOS to display -->

               <div class="todo">              
                    
                    <img class="empty" src="img/pexels-breakingpic-3299.jpg">
                    
                    </img>
                    
                </div>
            <?php }?>
             


                <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) {?>
                    <div class="todo">

                        <!-- completed TODO -->

                        <div class="todo_title" >
                            <!-- <?php if($todo['completed']){ ?> -->
                            <div class="checkmark check"><i class="fas fa-calendar-check" data-todo-id = "<?php echo $todo['id'] ?>"></i></div>
                            <h2 class="completed"><?php echo $todo['title']?></h2>
                            
                            
                            <!--  UNcompleted TODO -->

                            <!-- <?php }else{ ?> -->

                            <div class="checkmark check" ><i class="fas fa-calendar-check" data-todo-id = "<?php echo $todo['id'] ?>"></i></div>
                            <h2 ><?php echo $todo['title']?></h2>

                            <?php } ?>

                             <!--  rest of TODO -->
                             
                            <div class="checkmark trash" ><i class="fas fa-trash-alt"id="<?php echo $todo['id'] ?>" ></i></div>
                        </div>
                        </br>
                        <hr>
                        <div class="todo_info">
                            <p class="date">Created: <?php echo $todo['date_time']?></p>
                            <p class="date">Priority: <?php echo $todo['priority']?></p>
                            <p class="date">Type: <?php echo $todo['type']?></p>
                        </div>
                        
                    </div>
                            
                <?php } ?>
         
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script type="text/javascript">

       $(document).ready(function(){

           $('.fa-trash-alt').click(function(){
               const id = $(this).attr('id');

               $.post("app/remove.php",
               {
                   id:id
               },
               (data)=>{
                   if(data){
                       $(this).parents('.todo').hide('drop', "slow" , function(){
                           location.reload()
                       });
                       
                   }
           })
           
       });

       $('.fa-calendar-check').click(function(){
           
           const id = $(this).attr('data-todo-id');
           $.post('app/check.php',
           {
               id:id
           },
           (data) => {
               if(data != 'error'){
                    const h2 = $(this).next();
                    if(data==='1'){
                        h2.removeClass('completed')
                        location.reload()
                    }else{
                        h2.addClass('completed')
                        location.reload()
                    }
               }
            
            });
           });
    });

</script>
</body>
</html>