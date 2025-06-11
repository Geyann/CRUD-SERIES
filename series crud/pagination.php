<?php
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>
<body>
<style>
/* Mimic card style for table rows */
.table {
  font-family: "Courier New", Courier, monospace;
  border-collapse: separate;
  border-spacing: 0 15px;
}

.table thead.btn-dark {
  background: rgb(44, 44, 44) !important;
  border-radius: 12px 12px 0 0;
}

.table thead th {
  color: white;
  font-size: 0.95rem;
  border: none;
  padding: 10px;
}

.table tbody tr {
  background: rgb(44, 44, 44);
  color: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  transition: transform 0.2s;
}

.table tbody tr:hover {
  transform: scale(1.01);
}

.table td, .table th {
  vertical-align: middle;
  padding: 12px;
  border: none;
}

.table tbody td {
  font-size: 0.85rem;
  border-right: 1px solid rgb(203, 203, 203);
}

.table tbody td:last-child {
  border-right: none;
}

/* Pagination buttons */
button.btn a {
  text-decoration: none;
  color: white;
}

button.btn:hover a {
  color: #ddd;
}
</style>
  
<div class="container my-5">
    <table class="table">
  <thead class="btn-dark  text-light">
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = "Select * from `seriescrud` limit 0,5";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    $numberPages=4;
    $totalPages=ceil($num/$numberPages) ;

    for($btn=1;$btn<=$totalPages;$btn++){
      echo '<button class ="btn btn-dark mx-1 mb-3">
      <a href="pagination.php?page='.$btn.'"class="text-light">'.$btn.'</a></button>';
    }
    if(isset($_GET['page'])){
      $page=$_GET['page'];
      // echo $page; 
    }else{
      $page=1;
    }
  //  1-----> 0,5
  //  2------>5,5
  //  3------>10,5
  //  (pnum-1)*$numberPages
    // echo $totalPages;
    $startinglimit=($page-1)*$numberPages;
    $sql="Select * from `seriescrud` limit " .$startinglimit.','.$numberPages;

    $result=mysqli_query($con,$sql);
    // echo $num;
    while($row=mysqli_fetch_assoc($result)){
      echo'
    <tr>
      <th scope="row">'.$row['ID'].'</th>
      <td>'.$row['Fname'].'</td>
      <td>'.$row['Lname'].'</td>
      <td>'.$row['Mobile'].'</td>
    </tr>';
    }
     ?>
  </tbody>
</table>
    

    </div>
    </div>
</body>
</html>