
<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $Email=$_POST['Email'];
    $Mobile=$_POST['Mobile'];
    $datas=$_POST['data'];
    $Gender=$_POST['gender'];
    $allData=implode(",",$datas);
    $place = $_POST['place'];
    $sql="INSERT INTO `seriescrud` (Fname,Lname,Email,Mobile,multipleData,Gender,place) 
    values ('$Fname','$Lname','$Email','$Mobile','$allData','$Gender','$place')";
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
<style>
   body {
  background-color: #2c2c2c;
  font-family: "Courier New", Courier, monospace;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding: 20px;
}

.container {
  background: rgb(44, 44, 44);
  border-radius: 12px 12px 4px 4px;
  width: 320px;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

.form-label {
  color: white;
  font-weight: bold;
  font-size: 0.9rem;
}

.form-control,
select[name="place"] {
  background-color: white;
  color: black;
  font-size: 0.85rem;
  border: 1px solid gray;
  border-radius: 5px;
  padding: 6px;
}

.checkBox,
.gender {
  margin-top: 15px;
  font-size: 0.85rem;
  color: white;
}

.checkBox input,
.gender input {
  margin-right: 6px;
}

.checkBox label,
.gender label {
  display: block;
  margin-bottom: 4px;
}

select[name="place"] {
  width: 100%;
  height: 35px;
}

.btn {
  background-color: white !important;
  color: black;
  border: 2px solid gray;
  border-radius: 10px;
  font-weight: bold;
  width: 100%;
  transition: background-color 0.3s;
}

.btn:hover {
  background-color: lightgray !important;
}

</style>
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
<div class="checkBox">
<input type="checkbox" name="data[]" value="Javascript"> Javascript
<input type="checkbox" name="data[]" value="React"> React
<input type="checkbox" name="data[]" value="CSS"> CSS
<input type="checkbox" name="data[]" value="HTML"> HTML
</div>
<div class="my-3">
    Gender:
    <input type = "radio" name = "gender" value = "male"> Male
    <input type = "radio" name = "gender" value = "female"> Female
    <input type = "radio" name = "gender" value = "kids"> Kids
</div>
      <div>
        <select name="place" >
            <option value="">Select Place</option>
            <option value="Sabang">Sabang</option>
            <option value="Timalan-Balsahan">Timalan-Balsahan</option>
            <option value="Halang">Halang</option>
            <option value="Muzon">Muzon</option>
        </select>
    </div>
<div class="my-5">
    <button class="btn btn-lg my-5 btn-primary" name="submit" 
    style="background-color:white;border:2px solid gray;
    border-radius:10px;">Submit</button>
</div>
    </div>
    
</form>

</div>

</body>
</html>
