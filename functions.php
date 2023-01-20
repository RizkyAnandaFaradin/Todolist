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
$tanggal = $data['tanggal'];
$tasks = htmlspecialchars($data['tasks']); 


$query = "INSERT INTO task 
            VALUES
            ('', '$tanggal', '$tasks')
               ";
            mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}



?>