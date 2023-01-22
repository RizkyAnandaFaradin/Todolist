<?php 

session_start();


if (!isset($_SESSION["login"])) {
      header('Location: login/login.php');
      exit;
}

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
<nav class="navbar navbar-expand-lg navbar-light bg-transparent" style="
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
    
    "

>
  <div class="container">
    <a class="navbar-brand" href="https://rizkyanandafaradin.github.io/rizkyanandafweb/">
      <img class ="rounded-circle" style="width: 50px" src="img/logoRANF.png" alt="">
    </a>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-collapse collapse" id="collapse">
      <ul class="navbar-nav">
        <li class="nav-item"  >
          <a class="nav-link" style="color: white;" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="https://github.com/RizkyAnandaFaradin/Todolist">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="logout.php">Logout</a>
        </li>
        
 




          <!-- <li class="nav-item">
               <form>
                  <div class="form-group">
                     <div class="input-group" >
                       <input type="text" class="form-control" placeholder="Search" id="search" style="width: 100px; height: 30px">
                      
                     </div>
                  </div>
               </form>
         
        </li> -->


      </ul>
      
    </div>
     <form class="form-inline navbar-collapse collapse" id="collapse">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" id="search">
  </form>
  </div>
</nav>



  <main class="container container-sm " " >
  <br>
      <h1 style="color: white">
         Todo List Application with PHP and MySQL 
      </h1>

      <div class="container text-center scrollbar" >
         <div class="row">
            <div class="col-sm-8">
         
         
            <!-- Start tabel todolist -->
            <table class="table ">
               <thead>
                  <tr class="table-primary" id="primary" style="font-weight: bold">
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
         
         </div>
      
         
      </div>
   </main>
   <script src="js/index.js"></script> 
   <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script> 

</body>
</html>