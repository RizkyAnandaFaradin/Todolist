<?php 
require 'functions.php';


$list = query("SELECT *  FROM task");


if (isset($_POST['submit'])) {
   if (tambah($_POST)>0) {
      
   } else {
      echo "
      <script> 
      alert('data gagal ditambahkan');
      document.location.href = 'tambah.php';
      </script>
      ";
  
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
               </div>
             












      
         </div>
      </div>
   



    


</main>

<h1>dsaasdas</h1>


<script src="index.js"></script>

</body>
</html>