<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vehicle</title>
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
            
        </ul>
        </div>
    </div>
    </nav>
</div> 
<div>
  <button><a href="addvehicle.php"> Add Vehicle </a> </button>
</div>



<table style="width:90%; border:1px solid black;">
<tr style="border:1px solid black;">
    <th>Select</th>
    <th> Vehicle</th>
    <th> Make</th>
    <th> Model</th>
    <th> Year</th>
    <th> Stock number</th>
    <th> Doors</th>
    <th> Engine</th>
    <th> Color</th>
    <th> Mileage</th>
    <th> Seats</th>
    <th> Safety Rating</th>
    <th> Price</th>
    


  </tr> 
<?php
require_once (__DIR__ . '/connection.php');
?>
<?php


?>



<?php
$Vehicle="";
  $sql= "select * from vehicles";
  $results=[];
  $stmt = $pdo->query($sql);


 if($stmt->execute()){
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 }

  foreach($results as $result){ 
    echo "<tr>" . "<td>"  ?> <a href="2deletevehicle.php?Vehicle_id=<?php echo $result['Vehicle_id']; ?> "> Delete  </a> 
      <a href="2editvehicle.php?Vehicle_id=<?php echo $result['Vehicle_id']; ?> "> Edit  </a> 
    <?php echo "</td>" . 
    "<td>" . $result['Vehicle_id'] . "</td>" . 
    "<td>" . $result['Make'] . "</td>" .
    "<td>" . $result['Model'] . "</td>" .
    "<td>" . $result['Year'] . "</td>" .
    "<td>" . $result['Stock_number'] . "</td>" .
    "<td>" . $result['Doors'] . "</td>" .
    "<td>" . $result['Engine'] . "</td>" .
    "<td>" . $result['Color'] . "</td>" .
    "<td>" . $result['Mileage'] . "</td>" .
    "<td>" . $result['Seats'] . "</td>" .
    "<td>" . $result['Safety_rating'] . "</td>" .
    "<td>" . $result['Price'] . "</td>" .

    "</tr>";
?>

  <?php } ?>
 <?php
 if($_SERVER['REQUEST_METHOD'] == "POST"){ //match the code
  $sql = "Delete from vehicles where Vehicle_id = :Vehicle_id";
  $stmt =$pdo->prepare($sql);
  $param_id = $_POST['Vechicle_id'];
  $stmt->bindParam(":Vehicle_id", $param_id);
  $stmt->execute();
  header("location: vehicle.php");
}
 
 ?>


</table>
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


