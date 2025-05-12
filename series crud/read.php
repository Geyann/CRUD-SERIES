<?php
 include 'connect.php';

 ?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Display Data</title>
  </head>
  <body>
    <div class="contaier my-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Subjects</th>
      <th scope="col">Operations</th>


    </tr>
  </thead>
  <tbody>
<?php
//select query
$sql="Select * from `seriescrud`";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $ID = $row['ID']; 
    $Fname = $row['Fname'];
    $Lname = $row['Lname'];
    $Email = $row['Email'];
    $Mobile = $row['Mobile'];
    $datas=$row['multipleData'];
  //  $allData=implode(",",$datas);
    echo '<tr>
        <th scope="row">'.$ID.'</th>
        <td>'.$Fname.'</td>
        <td>'.$Lname.'</td>
        <td>'.$Email.'</td>
        <td>'.$Mobile.'</td>
        <td>'.$datas.'</td>
        <td>
        <a href="update.php?updateid='.$ID.'" class="btn btn-dark">Update</a>
        <a href="delete.php?deleteid='.$ID.'" class="btn btn-danger">Delete</a>
      </td>
        
      </tr>';
}
?>

  </tbody>
</table>
    </div>
    <div>
      <center>
        <a href="index.php" class = "btn btn-dark" >Add New</a>
      </center>
    </div>

    
  </body>
</html>