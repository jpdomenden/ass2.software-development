<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Vehicle</title>
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

<?php
require_once(__DIR__ . '/connection.php');
$Vehicle_id = "";
$errors = [];
if($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['Vehicle_id'])){
    $sql = "select * from vehicles where Vehicle_id = :Vehicle_id";
    $stmt = $pdo->prepare($sql);
    $Vehicle_id = trim($_GET['Vehicle_id']);
    $stmt -> bindParam(":Vehicle_id", $Vehicle_id);
    if($stmt ->execute() && $stmt->rowCount() ==1){
        $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);
        $Vehicle_id = $vehicle['Vehicle_id'];
    }
    else{
        array_push($errors, "Vehicle not found");
    }


}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "Delete from vehicles where Vehicle_id = :Vehicle_id";
    $stmt = $pdo->prepare($sql);
    $param_id = $_POST['Vehicle_id'];
    $stmt->bindParam(":Vehicle_id", $param_id);
    $stmt->execute();
    header("location: vehiclecopy.php");

}
?>

<div id="page-wrapper">
  <div class="container py-5">
    <div id="content" class="border rounded bg-white shadow-sm px-3 pt-2 pb-4 text-center">
      <h1 class="display-4 mb-4 text-center">Delete?</h1>
      <?php if(!count($errors) > 0) { ?>
      <p>Are you sure you want to delete vehicle:
        <?php echo $Vehicle_id; ?>
        <!-- Echo the task here -->
      </p>
      <?php } else{
        foreach($errors as $error){
            echo "<p style='color:red'> $error </p>";
        }
            
        }    ?>
        <a href="vehicle.php" class="btn btn-success">&lt; No</a>
      <?php if(!count($errors) > 0) { //delete "delete" button?>
      <form method="POST" class="d-inline-block">
        <input type="hidden" name="id" value="<?php echo trim($_GET['Vehicle_id']) ?>">
        <button type="submit" class="btn btn-danger" name="delete" value="true">🗑 Delete</button>
      </form>
      <?php } ?>
    </div>

  </div>
</div>
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
