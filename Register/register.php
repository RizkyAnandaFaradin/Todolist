<?php
session_start();
require '../functions.php';

if (isset($_SESSION["login"])) {
      header('Location: ../index.php');
}



if (isset($_POST["register"])) {
   if(registrasi($_POST)>0){
      $success = true;
   } else {
      echo mysqli_error($conn);
   }
}





?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="login.css">
   <link rel="stylesheet" href="../bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="../index.css">
   <title>Register</title>
</head>
<body>

<div class="container container-sm login position-absolute top-50 start-50 translate-middle " style="width:20%;">
   <div class="card">
      <div class="card-header">
         <h2 class="text-center">Register</h2>
  
   <?php if (isset($success)) : ?>
      <p style="color:blue; font-style: italic;">User Created Successfully </p>
   <?php  endif; ?>
   
         <form action="" method="post">
            <div class="form-group">
               <label for="username">Username:</label>
               <input type="text" class="form-control form-control-sm" id="username" placeholder="Enter Username" name="username">
            </div>
            <div class="form-group">
               <label for="password">Password:</label>
               <input type="password" class="form-control form-control-sm" id="password" placeholder="Enter password" name="password">
            </div>
             <div class="form-group">
               <label for="password2">Confirm Password:</label>
               <input type="password" class="form-control form-control-sm" id="password2" placeholder="Enter password" name="password2">
            </div>
               <div class="text-center d-flex justify-content-center" >
               <button type="submit" class="btn btn-primary btn-sm " style="margin-top: 10px;" name="register" id="register">Register</button>
            </div>
            <div class="text-center d-flex justify-content-center">
               <a href="../Login/login.php" >Already Have an Acccout? Login</a>
            </div>
         </form>
      </div>
   </div>
</div>
</body>
</html>
