
<?php
include 'connect.php';

if(isset($_POST['submit'])){
$place = $_POST['place'];

$sql="INSERT INTO `selectData` (place) values ('$place')"; 
$result=mysqli_query($con,$sql);
if($result){
    echo "data inserted successfully";

}else{
    die(mysqli_error($con));
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Select </title>
</head>
<body>
    <div class="container my-5">
        <form method = "post">
            <div>
        <select name="place" >
            <option value="">Select Place</option>
            <option value="Sabang">Sabang</option>
            <option value="Timalan-Balsahan">Halang</option>
            <option value="Muzon">Muzon</option>

        </select>
    </div><div class="my-5">
    <button type="submit" name="submit" class="btn btn-dark mx-3 my-3">Submit</button>
</div> 

</form>
</div>
</body>
</html>