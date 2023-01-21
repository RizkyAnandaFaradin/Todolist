<?php 
$conn = mysqli_connect("localhost", "root", "", "todolist"); 


function query($query){
   //untuk mengacu pada $conn yang ada di atas
   global $conn;
   //$result akan mengambil data dari koneksi database ($connn), dan isi dari database tersebut ($query)
   $result = mysqli_query($conn, $query);   
   //$rows akan menampung nilai dari $result
   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}



function tambah($data)
{
global $conn;
//htmlspecialchars untuk menghalangi input yang tidak sesuai atau memasukkan char yang aneh
$tanggal = $data["tanggal"];
$tasks = htmlspecialchars($data["task"]); 


$query = "INSERT INTO task 
            VALUES
            ('', '$tanggal', '$tasks')
               ";
            mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}


function hapus($id)
{
   global $conn;

   mysqli_query($conn, "DELETE FROM task WHERE id = $id");
}

function ubah($data)
{
 global $conn;
//htmlspecialchars untuk menghalangi input yang tidak sesuai atau memasukkan char yang aneh
$id = $data['id'];
$tanggal = $data['tanggal'];
$tasks = htmlspecialchars($data['tasks']); 


$query = "UPDATE task SET id = '$id', tanggal = '$tanggal', tasks = '$tasks' WHERE id =$id";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function registrasi($data)
{
global $conn;
$username = strtolower(stripslashes($data["username"]));
$password = mysqli_real_escape_string($conn, $data["password"]);
$password2 = mysqli_real_escape_string($conn, $data["password2"]);


$cariUsername = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
$hasilUsername = mysqli_fetch_assoc($cariUsername);


if ($hasilUsername) {
   echo "<script>
      alert('Username Alread Exists') 
      </script>";
      return false;
    
}

if ($password !== $password2) {
   echo "<script>
      alert('passwords are not the same') 
      </script>";
      return false;
    
}
else {

$password = password_hash($password, PASSWORD_DEFAULT);   
$query = "INSERT INTO user 
            VALUES
            ('', '$username', '$password')
               ";
            mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}
}
   


?>