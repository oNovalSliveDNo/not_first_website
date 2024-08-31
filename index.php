<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <?php
            // Redirect to profile page if the user is logged in
            if (isset($_COOKIE['User'])) {
                echo "<h1 class='text-center'>Welcome back, " . $_COOKIE['User'] . "!</h1>";
                
                // Include the database connection
                require_once('db.php');
                
                // Fetch all posts from the 'posts' table
                $sql = "SELECT * FROM posts";
                $res = mysqli_query($link, $sql);

                // Check if there are any posts
                if (mysqli_num_rows($res) > 0) {
                    echo "<h2 class='text-center'>User Posts</h2>";
                    while ($post = mysqli_fetch_array($res)) {
                        echo "<a href='/posts.php?id=" . $post['id'] . "'>" . $post['title'] . "</a><br>";
                    }
                } else {
                    echo "<p class='text-center'>No posts available yet.</p>";
                }
                
                // Close the database connection
                mysqli_close($link);
            } else {
                echo "<h1 class='text-center'>Please log in to view posts.</h1>";
            }
            ?>
        </div>
    </body>
</html>
