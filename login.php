<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method='POST' action='login.php'>
                    <div class="row mb-3">
                        <input class="form-control" type="text" name="login" placeholder="Login">
                    </div>
                    <div class="row mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-danger" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once('db.php');
if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
    exit; 
}

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];

    if (!$username || !$password) die('Please enter both username and password!');
    
    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        setcookie("User", $username, time() + 3600);
        header('Location: profile.php');
        exit; 
    } else {
        echo "Incorrect username or password";
    }
}

mysqli_close($link); 
?>
