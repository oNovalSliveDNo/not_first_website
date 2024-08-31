<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Registration</h2>
            <form method="POST" action="/registration.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Username</label>
                    <input type="text" class="form-control" id="login" name="login" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
            </form>
        </div>
    </body>
</html>

<?php
require_once('db.php'); // Include the database connection file

// Connect to the database
$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

// Check if the form was submitted
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];

    // Check if all fields are filled
    if (!$email || !$username || !$password) {
        die('Please enter all fields!');
    }

    // Insert the user data into the 'users' table
    $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$password')";

    // Check for errors during insertion
    if (!mysqli_query($link, $sql)) {
        echo "Failed to add user: " . mysqli_error($link);
    }
}

// Close the database connection
mysqli_close($link);
?>
