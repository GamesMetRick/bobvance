<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta brand="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Vance Refrigerators</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
        .card{height: 230px; width: 200px;}

    </style>
</head>
<?php include_once "config.php"; 
 if (isset($_POST['opslaan'])) {
  $update = $_POST['brand'];
  $update1 = $_POST['articlenumber'];
  $update2 = $_POST['price'];
  $update3 = $_POST['description'];
  $update4 = $_POST['photo'];
  $connect = "UPDATE refrigerator SET brand = '$update', articlenumber = '$update1', price = '$update2', description = '$update3', 
          photo = '$update4' WHERE brand . 
          id = " . $_GET["refrigeration"];
  $stmt = $pdo->exec("$connect");
  header('Location:info.php');
}
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
<h2 class="h2">
        <?php
        if (isset($_GET["id"])) {
            $connect = "SELECT brand FROM refrigeration WHERE id = " . $_GET["id"];
            $stmt = $pdo->query($connect);
            while ($title = $stmt->fetch()) {
                echo $title['title'];
            }
        }
        ?>
    </h2>
    <form action="" method="post">
        <table class="table">
            <?php $connect = "SELECT brand, articlenumber, price, description, photo FROM refrigeration WHERE id = " . $_GET["id"];
            $stmt = $pdo->query($connect);
            while ($series = $stmt->fetch()) {
                ?>
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?= $series["brand"] ?>">

                    </td>
                </tr>
                <tr>
                    <td>Duur</td>
                    <td>
                        <input type="text" name="tijd" value="<?= $series["articlenumber"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Datum van uitkomst</td>
                    <td>
                        <input type="text" name="datum" value="<?= $series["price"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Land van uitkomst</td>
                    <td>
                        <input type="text" name="land" value="<?= $series["description"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>beschrijving</td>
                    <td>
                        <input type="text" name="beschrijving" value="<?= $series["photo"] ?>">
                    </td>
                </tr>
        </table>
            <?php } ?>


    <button type="submit" name="opslaan">opslaan</button>
    </form>

</body>
</html>