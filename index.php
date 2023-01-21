<?php 
require 'functions.php';

$list = query("SELECT *  FROM task");

if (isset($_POST['submit'])) {
   if (tambah($_POST)>0) {
         echo "
      <script>
       document.location.href = 'index.php';
      </script> " ;
 
   }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="index.css">
   <title>Todo List</title>
</head>
<body>
  <main class="container container-sm " " >
      <h1>
         Todo List Application with PHP and MySQL 
      </h1>

      <div class="container text-center scrollbar" >
         <div class="row">
            <div class="col-sm-8">
               <form>
                  <div class="form-group">
                     <div class="input-group">
                       <input type="text" class="form-control" placeholder="Search" id="search">
                        <button class="btn btn-secondary" type="button">
                           <i class="fa fa-search">Search</i>
                         </button>
                        </div>
                     </div>
               </form>
               <br>
              
            <!-- Start tabel todolist -->
            <table class="table ">
               <thead>
                  <tr class="table-primary">
                     <th scope="col">No</th>
                     <th scope="col">Date</th>
                     <th scope="col">Tasks</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>

                  
               <?php 
               $i = 1;  
               foreach ($list as $lis) {
               ?>

               <tbody class="table-secondary">
                  <tr : nth-child>
                     <th scope="row">
                        <?= $i;  ?>
                     </th>

                     <td>
                        <?php echo $lis["tanggal"];  ?>
                     </td>                 

                     <td>                        
                        <?php echo $lis["tasks"];  ?>
                     </td>

                      <td>
                      <a href="hapus.php?id= <?= $lis["id"]?>" class="btn btn-danger action">Delete</a>  
                     
                      <a href="ubah.php?id=<?= $lis["id"] ?>" class="btn btn-secondary action" id="ubah" >Change</a>
                     </td>
                  </tr>                  
               </tbody>

               <?php 
               $i++;
               }  
               ?>          
            </table>
         </div>
         <!-- End tabel todolist -->
      
      
               <!-- Start tabel todolist -->
         <div class="col-sm-4">
            <form action="" method="post">
               <div class="card border-info mb-3" style="max-width: 18rem;">
                  <div class="card-header" style="font-weight: bold" >Add Task</div>
                  <div class="card-body">
                     <div class="input-group mb-3">
                        <label class="input-group-text" for="tanggal">Date</label>
                        <input type="date" class="form-control"  aria-label="date"  name="tanggal" id="tanggal">
                     </div>
                     <div class="input-group mb-3">
                        <label class="input-group-text" for="task">Task</label>
                        <input type="text" class="form-control" placeholder="Task" aria-label="Username"  name="task" id="task">
                     </div>
                      <div id="liveAlertPlaceholder"></div>            
                     <button type="submit" class="btn btn-outline-info" name="submit" id="liveAlertBtn" >Add</button>
                  </div>
               </div>
            </form>   
               <a href="logout.php" class="btn btn-danger action" style="float:left" >Logout</a>  
         
         </div>
      
         
      </div>
   </main>
   <script src="js/index.js"></script> 
</body>
</html>