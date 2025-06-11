<?php
 include 'connect.php';
 ?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Display Data</title>
  </head>
  
  <body>
    <style>
      body {
  background-color: #2c2c2c;
  font-family: "Courier New", Courier, monospace;
  padding: 20px;
  color: white;
}

table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 2px;
  border: none;
}

thead th {
  background-color: #FFDB58;
  color: black;
  font-weight: bold;
  text-align: center;
  padding: 10px;
  border: none;
}

tbody tr {
  background: rgb(44, 44, 44);
  border-radius: 12px 12px 4px 4px;
  overflow: hidden;
  display: table;
  width: 100%;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

tbody td {
  border: none;
  padding: 10px;
  font-size: 0.85rem;
  text-align: center;
  color: black;
  background-color: white;
}

tbody td:nth-child(even) {
  background-color: rgb(234, 235, 234);
}

tbody td:first-child {
  border-top-left-radius: 12px;
}

tbody td:last-child {
  border-top-right-radius: 12px;
}

a[name="update"],
a[name="delete"],
a[name="search"],
a[name="add"],
a[name="chart"] {
  background-color: beige;
  border: 2px solid gray;
  border-radius: 10px;
  color: black;
  padding: 6px 12px;
  font-weight: bold;
  margin: 2px;
  display: inline-block;
  text-decoration: none;
}

.btn.btn-primary,
.btn.btn-danger,
.btn.btn-secondary {
  border-radius: 10px;
  font-weight: bold;
}

.center {
  text-align: center;
}

thead {
  display: table;
  width: 100%;
  table-layout: fixed;
}

tbody {
  display: block;
  width: 100%;
}

tr {
  display: table;
  width: 100%;
  table-layout: fixed;
}

    </style>
 
        <a name="search"href= "search.php"class="btn btn-secondary my-3">Search</a> 
         <a name="add" href="pagination.php" class = "btn btn-secondary my-3" >pagination.php</a>
          <a name="chart" href="chart.php" class = "btn btn-secondary my-3" >Pie chart</a>
     
    
    <div class="contaier my-2">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Subjects</th>
      <th scope="col">Gender</th>
      <th scope="col">Place</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql="Select * from `seriescrud`";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $ID = $row['ID']; 
    $Fname = $row['Fname'];
    $Lname = $row['Lname'];
    $Email = $row['Email'];
    $Mobile = $row['Mobile'];
    $datas=$row['multipleData'];
    $Gender=$row['gender'];
    $place=$row['place'];
  //  $allData=implode(",",$datas);
    echo '<tr>
        <td scope="row">'.$ID.'</td>
        <td>'.$Fname.'</td>
        <td>'.$Lname.'</td>
        <td>'.$Email.'</td>
        <td>'.$Mobile.'</td>
        <td>'.$datas.'</td>
        <td>'.$Gender.'</td>
        <td>'.$place.'</td>
        <td>
        <a name="update" href="update.php?updateid='.$ID.'" class="btn btn-primary">Update</a>
        <a name="delete" href="delete.php?deleteid='.$ID.'" class="btn btn-danger">Delete</a>
      </td>
        
      </tr>';
}
?>

  </tbody>
</table>
      <center>
         <a name="add" href="index.php" class = "btn btn-secondary my-3" >Add New</a>
      </center>
    </div>
  </body>
</html>