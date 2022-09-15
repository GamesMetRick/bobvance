<?php 
session_start(); ?>
<!doctype html>
<html>

<head>
    <title>Vance Refrigeration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 260px; padding: 20px;}
    </style>
</head>
<body>

<?php
 $servername = "localhost";
 $username = "bit_academy";
 $password = "bit_academy";
 $dbname = "bob_vance";
 $charset = "utf8mb4";
try {  
      $connect = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
      catch (PDOException $error) {  
        $message = $error->getMessage();  
    }  
$addME = "Toevoegen";
if (!isset($_GET['username'])) {

} else {
    $username = $_GET['username'];
}
if (!isset($_GET['password'])) {
    $password = null;
} else {
    $password = $_GET['password'];
}

$sql = "INSERT INTO login VALUES ('value','$username','$password','no')";
if (isset($_GET['UserAdd']) == true && $_GET['UserAdd'] == $addME) {
    $movies = $connect->query($sql)
    ->fetchAll();
}
if(empty($username))
?>

<h1>Register</h1>

<form class="wrapper" action='register.php' method="GET">
    <label>Username </label>
    <input class="form-control" name="username" type="text" value="" required><br>
    <label>Password</label>
    <input class="form-control" name="password" type="password" required><br>

    <input type="submit" name="UserAdd" class="btn btn-info" value="<?php echo $addME ?>">
</form>
<form action='login.php' method="GET"><input type='submit' class="btn btn-danger" name='terug' value='terug'></form>
</body>
</html>