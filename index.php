<?php 
require 'functions.php';


$list = query("SELECT *  FROM task");

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
  <main class="container container-sm" " >
   <h1>
      Todo List Application with PHP and MySQL 
   </h1>

   <div class="container text-center">
      <div class="row">
         <div class="col-sm-8">


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
                  <tr>
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
                        Change | Delete
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
         <h5>Add Task</h5>
          <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">Date</span>
             <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
         </div>
         <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">Task</span>
             <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
         </div>
         <button type="button" class="btn btn-outline-info">Info</button>
      </div>
   </div>
   </div>





</main>

<script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
</body>
</html>