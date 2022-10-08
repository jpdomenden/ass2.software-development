<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Vehicle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="header&footer.html">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: rgb(05,32,04);
  color: white;
  /* text-align: center; */
}
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}


.fa-instagram {
  background: #125688;
  color: white;
}


</style>
</head>
<body>
<div class="header" style="width:100%;" >
    <nav class="navbar navbar-inverse" style="background-color: rgb(05,32,04); height:100px"  >
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#"><img src="logo.jpg" style="width:70px; height:60px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Vehicles</a></li>           
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <p style="color:white">Hi, Admin!</p>
            <button>Log out</button>
           
        </ul>
        </div>
    </div>
    </nav>
</div>

<?php
$errors = [];
$Vehicle_id = $Make = $Model = $Year = $Stock_number= $Doors = $Engine = $Color = $Mileage = $Seats = $Safety_rating = $Price = ""; //continue
require_once(__DIR__ . '/connection.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
if(isset($_POST['submit'])){


  $Vehicle_id = $_POST['Vehicle_id'];
  $Make = $_POST['Make'];
  $Model = $_POST['Model'];
  $Year = $_POST['Year'];
  $Stock_number = $_POST['Stock_number'];
  $Doors = $_POST['Doors'];
  $Engine = $_POST['Engine'];
  $Color = $_POST['Color'];
  $Mileage = $_POST['Mileage'];
  $Seats = $_POST['Seats'];
  $Safety_rating = $_POST['Safety_rating'];
  $Price = $_POST['Price']; 
$sql = "insert into `vehicles` (`Vehicle_id`, `Make`, `Model`, `Year`, `Stock_number`, `Doors`, `Engine`, `Color`, `Mileage`, `Seats`, `Safety_rating`, `Price`) 
values (:Vehicle_id, :Make, :Model, :Year, :Stock_number, :Doors, :Engine, :Color, :Mileage, :Seats, :Safety_rating, :Price)";

  $stmt = $pdo -> prepare($sql);
  $stmt -> bindParam(":Vehicle_id", $Vehicle_id); 
  $stmt -> bindParam(":Make", $Make);
  $stmt -> bindParam(":Model", $Model);
  $stmt -> bindParam(":Year", $Year);
  $stmt -> bindParam(":Stock_number", $Stock_number);
  $stmt -> bindParam(":Doors", $Doors);
  $stmt -> bindParam(":Engine", $Engine);
  $stmt -> bindParam(":Color", $Color);
  $stmt -> bindParam(":Mileage", $Mileage);
  $stmt -> bindParam(":Seats", $Seats);
  $stmt -> bindParam(":Safety_rating", $Safety_rating);
  $stmt -> bindParam(":Price", $Price);
  $stmt->execute();
  header('location: vehiclecopy.php');
}

}
?>

  <div style="width:50%; height:30%">

  <form style="width:50%; border:1px solid black;" method="POST">
     <h1>Add vehicle</h1> <br> <br>
     Vehicle ID <input type="number" name="Vehicle_id">  <br> <br>
     Make:<input type="text" name="Make"> <br> <br>
     Model:<input type="text" name="Model"> <br> <br>
     Year: <input type="number" name="Year"> <br> <br>
     Stock number: <input type="number" name="Stock_number">  <br> <br>
     Doors:<input type="number" name="Doors"> <br> <br>
     Engine: <input type="text" name="Engine">  <br> <br>
     Color: <input type="text" name="Color">  <br> <br>
     Mileage: <input type="number" name="Mileage"> <br> <br>
     Seats: <input type="number" name="Seats"><br> <br>
     Safety Rating: <input type="number" name="Safety_rating"> <br> <br>
     Price: <input type="number" name="Price">  <br> <br>
    <button name="submit"> Add vehicle</button>
    
    
</form>
</div>

<div class="footer" style="text-align:left; padding-left:10px">
    <h2>Carland</h2>
    <p>123 New Zealand Road, Hamilton, 3200</p>
    <p>0800 815 6458</p>
    <p>carland@gmail.com</p>

   

    <div style="text-align:right; padding-right:100px">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-instagram"></a>        
    </div>
</div>
</body>
</html>
