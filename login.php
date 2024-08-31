<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    require_once('db.php');

    // Redirect to profile if the user is already logged in
    if (isset($_COOKIE['User'])) {
        header("Location: profile.php");
        exit();
    }

    // Handle the login form submission
    if (isset($_POST['submit'])) {
        $username = $_POST['login'];
        $password = $_POST['password'];

        if (!$username || !$password) {
            die('Please enter both username and password!');
        }

        // Connect to the database
        $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

        // Check for connection errors
        if (!$link) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        // Use prepared statements to prevent SQL injection
        $stmt = $link->prepare("SELECT * FROM users WHERE username = ? AND pass = ?");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Set a cookie and redirect to profile
            setcookie("User", $username, time() + 7200);
            header('Location: profile.php');
            exit();
        } else {
            echo "Incorrect username or password";
        }

        $stmt->close();
        mysqli_close($link);
    }
    ?>

    <div class="container text-center mt-5">
        <h2>Login</h2>
        <form method='POST' action='/login.php'>
            <div class="mb-3">
                <label for="login" class="form-label">Username</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
