<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization or Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    require_once('db.php');
    
    if (!isset($_COOKIE['User'])) {
        ?>
        <div class="container text-center mt-5">
            <a href="/registration.php" class="btn btn-primary">Register</a>
            or
            <a href="/login.php" class="btn btn-secondary">Log in</a>
            to view the content!
        </div>
        <?php
    } else {
        // Connect to the database
        $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

        if (!$link) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        // Query to get all posts
        $sql = "SELECT * FROM posts";
        $res = mysqli_query($link, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($post = mysqli_fetch_array($res)) {
                echo "<a href='/posts.php?id=" . $post["id"] . "'>" . htmlspecialchars($post['title']) . "</a><br>";
            }
        } else {
            echo "No posts available";
        }

        mysqli_close($link);
    }
    ?>
</body>
</html>
