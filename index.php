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
        .card {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
  height: 10%;
  width: 90%;
}
.card img{
  position: relative;
  left: 50%;
  height: 200px;
  width: 160px;
}

    </style>
</head>
<?php include_once "config.php"; 
if ($_SESSION["username"] == null) {
        header("location:login.php");
}
$query = $connect->query("SELECT * FROM refrigerator")
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="Vance.png" alt="Vance Refrigeration logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
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
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a class="nav-link" href="koelkast.php">Voeg toe</a>
      </li>
    </ul>
    <a href="logout.php"> <button type="button" class="btn btn-danger">Logout</button></a>
    </form>
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
            while ($data = $query->fetch()) {
                $brand = $data["brand"];
                $photo = $data["photo"];
                $description = $data["description"];
                $price = $data["price"];
                $id = $data["id"];
        ?>
      <div class="card fs-2 fw-bold">
            <div> <br><h2><?php echo $brand; ?></h2> <br><br>
            <img src="<?php echo $photo; ?>"  alt="koelkast" style="height: 10%;">
            <p class="prijs"><?php echo "Price:     "; echo $price; echo ",-";?></p><br> <br><br>
            <p class="beschrijving"><?php echo $description; echo"<br>" ;?></p>
            <a href="info.php" class="btn btn-info">Edit</a>
            </div>
            </a>
        <?php
        }
        ?>
        
</body>
</html>