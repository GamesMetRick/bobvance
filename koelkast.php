<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Vance Refrigerators</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
        .container{ display: flex; flex-direction: column;}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="Vance.png" alt="Vance Refrigeration logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about-us.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a href="logout.php"> <button type="button" class="btn btn-danger">Logout</button></a>
    </form>
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="text-center">
<h1>Add Product</h1>
</div>
<?php 
include_once "config.php"; 
if ($_SESSION["username"] == null) {
        header("location:login.php");
}
$addME = "Toevoegen";
if (!isset($_GET['brand'])) {
    $brand = null;
} else {
    $brand = $_GET['brand'];
}
if (!isset($_GET['articlenumber'])) {
    $articlenumber = null;
} else {
    $articlenumber = $_GET['articlenumber'];
}
if (!isset($_GET['price'])) {
    $price = null;
} else {
    $price = $_GET['price'];
}
if (!isset($_GET['description'])) {
  $description = null;
} else {
  $description = $_GET['description'];
}
if (!isset($_GET['photo'])) {
  $photo = null;
} else {
  $photo = $_GET['photo'];
}

$sql = "INSERT INTO refrigerator VALUES ('value','$brand','$articlenumber','$price','$description', '$photo')";
if (isset($_GET['UserAdd']) == true && $_GET['UserAdd'] == $addME) {
    $movies = $connect->query($sql)
    ->fetchAll();
}
?>

<form class="wrapper" action='koelkast.php' method="GET">
    <label>Brand </label>
    <input class="form-control" name="brand" type="text" required><br>
    <label>Articlenumber</label>
    <input class="form-control" name="articlenumber" type="number" required><br>
    <label>Price</label>
    <input class="form-control" name="price" type="number" required><br>
    <label>Description</label>
    <input class="form-control" name="description" type="text" required><br>
    <label>Photo</label>
    <input class="form-control" name="photo" type="text" required><br>

    <input type="submit" name="UserAdd" class="btn btn-info" value="<?php echo $addME ?>">
</form>
</body>