<?php
include 'connect.php'; 
if(isset($_POST['submit'])){
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $Email=$_POST['Email'];
    $Mobile=$_POST['Mobile'];
    $datas=$_POST['data'];
    $allData=implode(",",$datas);

    //insert query
                        
    $sql="insert into `seriescrud` (Fname,Lname,Email,Mobile,multipleData) 
    values ('$Fname','$Lname','$Email','$Mobile','$allData')";

    $result=mysqli_query($con,$sql);
    if($result){
        header('location:read.php');
    }else{
        die(mysqli_error($con));
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>PHP CrudSeries</title>
  </head>
<body>
    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
        <label class="form-label">First name</label>
        <input type="text" class="form-control"
        placeholder="Enter your first name" name="Fname"
        autocomplete="off">
    </div>
        <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" class="form-control"
            placeholder="Enter your last name" name="Lname"
            autocomplete="off">
    </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control"
            placeholder="Enter your email" name="Email"
            autocomplete="off">
    </div>
        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="text" class="form-control"
            placeholder="Enter your mobile" name="Mobile"
            autocomplete="off">
    </div>
<div>
<input type="checkbox" name="data[]" value="Javascript">Javascript
<input type="checkbox" name="data[]" value="React">React
<input type="checkbox" name="data[]" value="CSS">CSS
<input type="checkbox" name="data[]" value="HTML">HTML
</div>


    <button class="btn btn-dark btn-lg my-3" name="submit">Submit</button>
</form>

</div>

</body>
</html>