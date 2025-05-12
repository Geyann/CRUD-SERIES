<?php
include 'connect.php';
$ID=$_GET['updateid'];

$sql="Select * from seriescrud WHERE id=$ID";
$result= mysqli_query($con,$sql);

$row= mysqli_fetch_assoc($result);
$Fname= $row['Fname'];
$Lname= $row['Lname'];
$Email= $row['Email'];
$Mobile= $row['Mobile'];
$datas= $row['multipleData'];
if(isset($_POST['update'])){
$Fname= $_POST['Fname'];
$Lname= $_POST['Lname'];
$Email= $_POST['Email'];
$Mobile= $_POST['Mobile'];
$datas= $_POST['data'];           
$allData=implode(",",$datas);

$sql="update `seriescrud` set Fname='$Fname',Lname='$Lname',Email='$Email',
Mobile='$Mobile',multipleData='$allData' where id=$ID";
$result=mysqli_query($con,$sql);
if($result){
    //echo "updated successfully";
    header('location:read.php');
}else{
    die(mysqli_error($con));
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Update Data</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" autocomplete="off" name="Fname" value=<?php echo $Fname?>>
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" autocomplete="off" name="Lname" value=<?php echo $Lname?>>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" autocomplete="off" name="Email" value=<?php echo $Email?>>
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" autocomplete="off" name="Mobile" value=<?php echo $Mobile?>>
  </div>
  <div>
  <input type="checkbox" name="data[]" value="Javascript">Javascript
  <input type="checkbox" name="data[]" value="React">React
  <input type="checkbox" name="data[]" value="CSS">CSS
  <input type="checkbox" name="data[]" value="HTML">HTML
  </div>
  <button type="submit" class="btn btn-dark btn-lg my-3" name='update'>Update</button>
        </form>

  </body>
</html>