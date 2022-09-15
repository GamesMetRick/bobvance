<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vance Refrigeration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 260px; padding: 20px;}
    </style>
</head>
<?php  
include_once "config.php";
    if (isset($_POST["login"])) {  
        if (empty($_POST["username"]) || empty($_POST["password"])) {  
                $message = '<label>All fields are required</label>';  
        } else {  
                $query = "SELECT * FROM login WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                    array(  
                        'username'     =>     $_POST["username"],  
                        'password'     =>     $_POST["password"]
                    )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    $_SESSION["username"] = $_POST["username"];  
                    header("location:index.php");  
                } else {  
                $message = '<label>Wrong Data</label>';  
            }  
        } 
    }  
?>
<body>
<h1>Login</h1>
<div class="wrapper">
<?php  
if (isset($message)) {  
    echo '<label class="text-danger">' . $message . '</label>';  
}  
?>
<form method="post">   
                     <input type="text" name="username" class="form-control" placeholder="username"/>  
                     <input type="password" name="password" class="form-control" placeholder="wachtwoord"/>  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                     <p>registreer <a href="register.php"> hier</a></p>
                </form>  
</div> 
</body>
</html>
