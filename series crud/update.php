<?php
include 'connect.php';
$ID=$_GET['updateid'];

$sql="Select * from `seriescrud` WHERE id=$ID";
$result=mysqli_query($con,$sql);

$row= mysqli_fetch_assoc($result);
$Fname= $row['Fname'];
$Lname= $row['Lname'];
$Email= $row['Email'];
$Mobile= $row['Mobile'];
$datas= $row['multipleData'];
$Gender=$row['gender'];
if(isset($_POST['update'])){
$Fname= $_POST['Fname'];
$Lname= $_POST['Lname'];
$Email= $_POST['Email'];
$Mobile= $_POST['Mobile'];
$datas= $_POST['data'];
$Gender=$_POST['gender'];           
$allData=implode(",",$datas);
$place=$_POST['place'];
$sql="update `seriescrud` set Fname='$Fname',Lname='$Lname',Email='$Email',
Mobile='$Mobile',multipleData='$allData',Gender='$Gender',place='$place' where id=$ID";
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
    <style>
  body {
    background-color: #212121;
    font-family: "Courier New", Courier, monospace;
  }

  .card {
    width: 100%;
    max-width: 600px;
    background: rgb(44, 44, 44);
    font-family: "Courier New", Courier, monospace;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    overflow: hidden;
    padding: 30px;
    margin: auto;
    color: white;
  }

  .card__title {
    color: white;
    font-weight: bold;
    padding: 5px 10px;
    border-bottom: 1px solid rgb(167, 159, 159);
    font-size: 1.2rem;
    margin-bottom: 20px;
  }

  .form-control, select {
    background-color: beige;
    border: 2px solid gray;
    border-radius: 7px;
    margin-bottom: 10px;
    color: black;
  }

  input[type="checkbox"],
  input[type="radio"] {
    margin-right: 8px;
    margin-left: 5px;
  }

  .btn-primary {
    background-color: beige;
    border: 2px solid gray;
    border-radius: 10px;
    color: black;
    padding: 10px 20px;
  }

  label {
    margin-top: 10px;
    font-weight: bold;
  }

  .form-group {
    color: white;
  }
</style>
<div class="card">
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
  <div class="my-3">
    Gender:
    <input type = "radio" name = "gender" value = "male">Male
    <input type = "radio" name = "gender" value = "female">Female
    <input type = "radio" name = "gender" value = "kids">Kids
</div>
 <div class="container ">
        <form method = "post">
            <div>
        <select name="place">
            <option value="">Select Place</option>
            <option value="Sabang">Sabang</option>
            <option value="Timalan-Balsahan">Timalan-Balsahan</option>
            <option value="Halang">Halang</option>
            <option value="Muzon">Muzon</option>
        </select>
    </div>
    <div class="my-5"><center>
  <button type="submit" class="btn btn-lg my-5" name='update'>Update</button>
</center></div>
</form>
    </div>
  </body>
</html>