<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Search Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
.jumbotron {
  max-width: 350px;
  margin: 50px auto;
  background: rgb(44, 44, 44) !important;
  color: white;
  font-family: "Courier New", Courier, monospace;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  padding: 20px 25px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
}

.jumbotron .display-4 {
  font-size: 1.5rem;
  color: white !important;
  font-weight: bold;
  margin-bottom: 15px;
}

.jumbotron .lead.text-danger {
  color: #ff6b6b !important;
  font-size: 0.9rem;
}
.jumbotron hr {
  border-top: 1px solid rgb(167, 159, 159);
  margin: 1rem 0;
}
.jumbotron .btn {
  font-family: "Courier New", Courier, monospace;
  padding: 8px 16px;
  border-radius: 6px;
}
body{
    background-color:#212121;
}
</style>

    <?php
$data=$_GET['data'];
$sql="Select * from `seriescrud` where ID=$data";
$result=mysqli_query($con,$sql);
if($result){
    $row=mysqli_fetch_assoc($result);
    echo '<div class="container">
        <div class="jumbotron">
        <h1 class="display-4 text-center text-success">'.$row['Fname'].'</h1>
        <p class="lead text-center text-danger">Your Email ID is : '.$row['Email'].'</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-dark btn-lg" href="search.php"
            role="button">Back</a>
        </p>
        </div>
        </div>';
}
?>

</div>
</body>
</html>