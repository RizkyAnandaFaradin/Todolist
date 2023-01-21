<?php
session_start();

require '../functions.php';

if (isset($_COOKIE['id'])&& isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

 
  $result = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");

  $row = mysqli_fetch_assoc($result);
  
  if ($key===hash('sha256', $row["username"])) {
    $_SESSION["login"]=true;
  }

}




if (isset($_SESSION["login"])) {
      header('Location: ../index.php');
}






if (isset($_POST['login'])){
  $password = $_POST['password'];
  $username = $_POST['username'];

  $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
  


  if(mysqli_num_rows($result)>0){

    $row = mysqli_fetch_assoc($result);
    
    if(password_verify($password, $row["password"])){
      $_SESSION['login'] = true;

      if (isset($_POST["remember"])) {
        setcookie('id', $row['id'], time()+60);
        setcookie('key', hash('sha256', $row['username']), time()+60);

      }

      header('Location: ../index.php');
      exit;
    }
  }
  $error = true;

}
  















?>












<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="login.css">

   <link rel="stylesheet" href="../bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../index.css">
   <title>Login</title>
  

</head>
<body>

<div class="container container-sm login position-absolute top-50 start-50 translate-middle " style="width:20%;">

<div class="card">
  <div class="card-header">
  <h2 class="text-center">Login</h2>
    <?php 
//jika password salah atau username salah, maka akan menampilkan dibawah ini
if (isset($error)) : ?>
   <p style="color:red; font-style: italic;">username / password salah </p>
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
    <div class="checkbox">
      <input type="checkbox" name="remember" id="remember">
      <label for="remember"> Remember me</label>
    </div>

    <div class="text-center d-flex justify-content-center" >
    <button type="submit" class="btn btn-primary btn-sm " style="margin-top: 10px;" name="login" id="login">Login</button>
</div>
    <div class="text-center d-flex justify-content-center">
    <a href="../register/register.php" >Create New Account</a>
</div>
  </form>
</div>
</div>

</div>
</body>
</html>



