<?php 
require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "todolist"); 

$id = $_GET['id'];
$list = query("SELECT * FROM task WHERE id = $id");

if (isset($_POST['submit'])) {
   if (ubah($_POST)>0) {
      echo "
      <script>
      alert('data berhasil diubah');
      document.location.href = 'index.php';
      </script> " ;
   } else {
      echo "
      <script> 
      alert('data gagal diubah');
      document.location.href = 'ubah.php';
      </script>
      ";
  
   }
  }

?>

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
                      <a href="index.php" class="btn btn-danger action">Cancel</a>  
                     
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
      
        <?php 
           
               foreach ($list as $lis) {
               ?>
               <!-- Start tabel todolist -->
               <div class="col-sm-4">
                  <form action="" method="POST">
                          <input type="text" name="id"  required value="<?=($lis["id"]) ?>" hidden="hidden">
                     <div class="card border-info mb-3" style="max-width: 18rem;">
                        <div class="card-header" style="font-weight: bold" >Change Task</div>
                        <div class="card-body">
                           <div class="input-group mb-3">
                              <label class="input-group-text" for="tanggal">Date</label>
                              <input type="date" class="form-control"  aria-label="date"  name="tanggal" id="tanggal" required value="<?=($lis["tanggal"])?>">
                           </div>
                           <div class="input-group mb-3">
                              <label class="input-group-text" for="task">Task</label>
                              <input type="text" class="form-control" placeholder="Task" aria-label="Username"  name="task" id="task" required  value="<?=($lis["tasks"])?>">
                           </div>
                            <div id="liveAlertPlaceholder"></div>
                           
                           <button type="submit" class="btn btn-outline-info" name="submit" id="liveAlertBtn" >Change</button>
                        </div>
                     </div>
                  </form>

               <?php 
               
               }  
               ?>  


             



           








      
         </div>
      </div>
   



    


</main>


<script src="index.js"></script>

</body>
</html>
